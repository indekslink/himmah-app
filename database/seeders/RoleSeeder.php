<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [];
        $role = ['super_admin', 'admin', 'user'];
        for ($i = 0; $i < count($role); $i++) {
            $user[$i]['name'] = $role[$i];
            $user[$i]['created_at'] = Carbon::now();
        }
        DB::table('roles')->insert($user);
    }
}
