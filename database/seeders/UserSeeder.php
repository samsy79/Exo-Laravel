<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use  App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            'firstname'=>'super',
            'lastname'=>'admin',
            'email'=>'admin229@gmail.com',
            'password'=> Hash::make('superadmi77@'),
            'email_verified_at'=>now(),
            'email_verified'=>true,

        ];
        User::create($data);
    }
}
