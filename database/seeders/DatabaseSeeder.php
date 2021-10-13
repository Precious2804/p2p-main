<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user1 = \App\Models\User::create([
            'fname' => 'Admin',
            'lname' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@pycrest.com',
            'phone' => '0000000',
            'gender' => 'Male',
            'ref_id' => 'admin',
            'password' => Hash::make('yetAnotherSecretKey'),
            'isAdmin' => '1'
        ]);

        $user2 = \App\Models\SettingTable::create([
            'rate'=>'50',
            'beforeGet'=>'2'
        ]);

        $user3 = \App\Models\AllAmountProvidavle::create([
            'amountProv'=>'5000'
        ]);
        $user4 = \App\Models\AllAmountProvidavle::create([
            'amountProv'=>'10000'
        ]);
        $user5 = \App\Models\AllAmountProvidavle::create([
            'amountProv'=>'20000'
        ]);

    }
}
