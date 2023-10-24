<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->updateOrCreate(['email' => 'admin@gmail.com'],[
                         'name' => 'ADMIN',
                         'email' => 'admin@gmail.com',
                         'password' => Hash::make('12345678'),
                     ]);

        User::query()->updateOrCreate(['email' => 'sales@binhminhtmc.com'],[
                         'name' => 'Binh minh TMC',
                         'email' => 'sales@binhminhtmc.com',
                         'password' => Hash::make('12345678'),
                     ]);
    }
}
