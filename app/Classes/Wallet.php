<?php
/**
 * Created by Canaan Etai.
 * Date: 1/25/20
 * Time: 9:36 AM
 */

namespace App\Classes;

use App\Classes\Sms\Text;
use App\Models\User;
use App\Notifications\NotifyUser;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet as WalletModel;

class Wallet
{

    public static function generateAccountNumber()
    {
        $no = (string) random_int(00000000, 99999999);

        $no = "20$no";

        if ( strlen($no) != 10 ) {

            return self::generateAccountNumber();
        }

        if ( \App\Models\Wallet::where('account_number', $no)->count() > 0 ) {

            return self::generateAccountNumber();
        }

        return $no;
    }


    /**
     * Credit Wallet
     *
     * @param $user
     * @param $amount
     * @param $info
     * @return array
     */
    public static function credit($userWallet , $user , $amount, $info)
    {
        try {

            $info  ;
            // Check if wallet is active
            if ($userWallet->status !== 'ACTIVE') {

                return [
                    'success' => false,
                    'message' => "Wallet is {$userWallet->status->status}"
                ];

            }

            $response = [
                'success' => false,
                'message' => 'Error crediting wallet'
            ];

            DB::transaction(function () use ($userWallet, $user, $amount, $info , &$response) {

                    $prev_bal         =    $userWallet->balance;
                    $newBalance       =    $userWallet->balance + $amount;
                    $walletOwner      =    User::where('id',$userWallet->owner['id'])->first();
                    $info             =    'Wallet transfer from '. $user->name . 'to'.$userWallet;
                    $wallet  = WalletModel::where('account_number',$userWallet->account_number)->first();

                    if($wallet){

                        $wallet->balance = $newBalance;
                        $wallet->updated_at = now();
                        $wallet->save();
                    }

                  $wallet->transactions()->create([

                        'amount' => $amount,
                        'type' => 'CREDIT',
                        'prev_balance' => $prev_bal,
                        'new_balance' => $newBalance,
                        'user_id'   => $walletOwner->id,
                        'info' => 'Wallet Transfer from  ' .$user->name .' to ' .$userWallet->owner['name'],
                    ]);

                // send notification
//                Notification::sendToDevice($user, 'Credit Alert', $info, ['type' => 'NOTIFICATION']);

                $response = [
                    'success' => true,
                    'message' => 'Wallet crediting was successful.'
                ];
            });

            return $response;
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => 'Wallet Transfer failed, please try again later'
//                    $exception->getMessage()
            ];
        }
    }


    /**
     * Debit Wallet
     *
     * @param $user
     * @param $amount
     * @param $info
     * @param bool $allow_negative
     * @param bool $isCommission
     * @return array
     */
    public static function debit($user,$beneficiary, $amount, $info = '', $allow_negative = false, $isCommission = false)
    {
        try {


            $wallet = $user->wallet;
            $info = 'Wallet transfer form '. $user->name . ' to '.$beneficiary->owner['name'];

            // Check if wallet is active
            if ($wallet->status !== 'ACTIVE') {
                return [
                    'success' => false,
                    'message' => "Wallet is {$wallet->status}"
                ];
            }

            // validate wallet balance
            // Check if wallet is active

                if ($amount > $wallet->balance) {
                    if ( !$allow_negative) {
                        return [
                            'success' => false,
                            'message' => "Insufficient Fund!"
                        ];
                    }
                }


            $response = [
                'success' => false,
                'message' => 'Error with debit'
            ];

            DB::transaction(function () use ($user, $wallet, $amount, $info, &$response, $isCommission) {

                    $prev_bal = $wallet->balance;
                    $wallet->balance -= $amount;
                    $wallet->updated_at = now();
                    $wallet->save();
                    $wallet->transactions()->create([

                        'amount' => $amount,
                        'type' => 'DEBIT',
                        'prev_balance' => $prev_bal,
                        'new_balance' => $wallet->balance,
                        'user_id' => $user->id,
                        'info' => $info
                    ]);


                $response = [
                    'success' => true,
                    'message' => 'Wallet debit was successful.'
                ];
            });

            return $response;
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
