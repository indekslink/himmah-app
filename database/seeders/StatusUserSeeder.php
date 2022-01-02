<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusUser;

class StatusUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_user = [
            [
                'name' => "Agen/Jama'ah",
                'description' => "Isi tentang status agen/jama'ah"
            ],
            [
                'name' => "Manager",
                'description' => "Isi tentang status manager"
            ],
            [
                'name' => "Senior Manager",
                'description' => "Isi tentang status senior manager"
            ],
        ];

        foreach ($status_user as $key => $value) {
            StatusUser::create([
                'name' => $value['name'],
                'description' => $value['description'],
            ]);
        }
    }
}
