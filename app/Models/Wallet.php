<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{

    use HasFactory;

    protected  $fillable = ['account_number', 'balance','updated_at'];


        public function owner()
        {
            return $this->hasOne(User::class, 'id', 'user_id')
                ->select(['id', 'name']);
        }

        public function transactions(){

            return $this->hasMany(WalletTransaction::class);
        }
}
