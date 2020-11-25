<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Tom',
            'email' => 'tom@gmail.com',
            'password' => Hash::make('12345'),
            'phoneno'=>'9876543211',
            'address'=>'Trivandrum',
            'usertype'=>'1'
        ]);
    }
}
