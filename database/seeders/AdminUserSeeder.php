<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'first_name' =>'admin',
           'last_name' =>'admin1',
           'date_of_birth'=>'2000-02-25',
           'country' => 'Egypt',
           'address' => 'Cairo',

           'email' =>'admin@gmail.com',
           'password' => Hash::make('12345678'),
            'role'=>'admin',
        ]);
    }
}
