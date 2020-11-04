<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wallet::create([
            'account_number' => 211133344,
            'balance' => 10000,
            'user_id' => 1,
        ]);
    }
}
