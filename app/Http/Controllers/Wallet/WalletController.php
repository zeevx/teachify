<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Classes\Wallet as WalletClass;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(){

        $user = auth()->user();
        $wallet = $user->wallet;
        $transactions = WalletTransaction::where('user_id',$user->id)->orderby('created_at','desc')->take(5)->get();

        return view('Teacher.wallet' , compact('user','wallet', 'transactions'));
    }

    public function walletTransfer(){

        $user = auth()->user();
        $wallet = $user->wallet;

        return view('Teacher.wallet-wallet-transfer', compact('wallet'));
    }

    public function transfer(Request $request){

        request()->validate([
            'account_number'=> 'required',
            'amount' => 'required',
        ]);

        $user = auth()->user();


        $beneficiary = Wallet::with('owner')->where('account_number',$request['account_number'])->first();


        /***
         * Ensure the user wont is not trying fund is own wallet through wallet to wallet transfer method
         *
         * Ensure the beneficiary account number exists;
         *
         * Ensure the use is not trying to pay an amount that is below 1 Naita
         *
         */

        if($user->wallet['account_number'] != $request['account_number'] ) {

            if ($beneficiary) {

                if ($request['amount'] > 1) {

                    $debit = WalletClass::debit($user, $beneficiary, $request['amount'], $info = '');


                    if ($debit['success']) {

                        $credit = WalletClass::credit($beneficiary, $user, $request['amount'], $info = '');

                        return back()->with('success', 'Wallet transfer to ' . $beneficiary->owner['name'] . ' was successful');

                    }

                    if (!$debit['success']) {

                        return back()->with('failure', 'Insufficient Balance');
                    }

                } else {

                    return back()->with('failure', 'You cant transfer a value that is below 1 Naira');
                }

            }else{
                return back()->with('failure','The beneficiary does not exist');
            }
            } else {

                return back()->with('failure', 'You cant fund your own wallet with wallet to wallet transfer, use top up');

            }


    }

    public function verifyAccountNumber($accountNumber){

        $verifyAccount = Wallet::with('owner')->where('account_number',$accountNumber)->first();

        return response()->json([
            'data' => $verifyAccount
        ]);
    }
}
