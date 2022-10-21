<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user= [
          ['name'=>'admin','email'=>'admin@gmail.com','password'=>Hash::make('admin'),'role'=>1,'email_verified_at'=>Carbon::now()],
          ['name'=>'anuj','email'=>'anuj@gmail.com','password'=>Hash::make('12345678'),'role'=>2,'email_verified_at'=>Carbon::now()],
          ['name'=>'vivek','email'=>'vivek@gmail.com','password'=>Hash::make('12345678'),'role'=>2,'email_verified_at'=>Carbon::now()]
        ];
        foreach ($user as $u){
            User::create([
                'name'=>$u['name'],
                'email'=>$u['email'],
                'password'=>$u['password'],
                'role'=>$u['role'],
                'email_verified_at'=>$u['email_verified_at'],
            ]);

        }

    }
}
