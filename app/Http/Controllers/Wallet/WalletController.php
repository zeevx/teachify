<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Classes\Wallet as WalletClass;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(){

        $user = auth()->user();
        $wallet = $user->wallet;
        return view('Teacher.wallet' , compact('user','wallet'));
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

        if($user->wallet['account_number'] != $request['account_number'] ){

            if($request['amount'] > 1){

                $debit =  WalletClass::debit($user,$beneficiary, $request['amount'],$info ='');


                if ($debit['success']) {

                    $credit  =  WalletClass::credit($beneficiary, $user, $request['amount'] , $info='');
                    return back()->with('success','Wallet transfer to '.$beneficiary->owner['name'].'was successful');

                }

                if(!$debit['success']){

                   return back()->with('success','Insufficient Balance');
                }


            }else{

                return back()->with('success', 'You cant transfer a value that is below 1 Naira');
            }

        }else{

            return back()->with('success', 'You cant fund your own wallet with wallet to wallet transfer, use top up');

        }


    }

    public function verifyAccountNumber($accountNumber){

        $verifyAccount = Wallet::with('owner')->where('account_number',$accountNumber)->first();
//dd($verifyAccount);
        return response()->json([
            'data' => $verifyAccount
        ]);
    }
}
