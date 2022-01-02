<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // ada 3 status , yakni Agen/Jama'ah, Manager dan Senior Manager
        User::create([
            'name' => 'Super Admin',
            'email' => 'riskialamzah1@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role_id' => 1,
            'status_user_id' => 1,
            'password' => Hash::make('superadmin12345'),
            'gender' => 'L',
            'avatar' => 'default.png',
            'address' => 'Jalan Kertanegara No 10 a RT 04 RW 11, Gedangan, Sidoarjo, Jawa Timur, 61254'
        ]);

        // end super admin

        // admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@himmah.co.id',
            'email_verified_at' => Carbon::now(),
            'role_id' => 2,
            'status_user_id' => 1,
            'password' => Hash::make('admin12345'),
            'gender' => 'L',
            'avatar' => 'default.png',
            'address' => 'Jalan Kertanegara No 10 a RT 04 RW 11, Gedangan, Sidoarjo, Jawa Timur, 61254'
        ]);

        // end of admin


        User::create([
            'name' => 'User 1',
            'email' => 'user1@himmah.co.id',
            'email_verified_at' => Carbon::now(),
            'role_id' => 3,
            'status_user_id' => 1,
            'password' => Hash::make('user1-12345'),
            'gender' => 'P',
            'avatar' => 'default.png',
            'address' => 'Jalan Kertanegara No 10 a RT 04 RW 11, Gedangan, Sidoarjo, Jawa Timur, 61254'
        ]);
    }
}
