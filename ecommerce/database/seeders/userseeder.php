<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
                'id'=>1,
               'firstname'=>'Admin',
               'lastname'=>'admin',
               'status'=>'1',
               'email'=>'admin@gmail.com',
               'password'=>Hash::make('admin@123'),
               'roleid'=>2,

            ]);
    
    }
}
