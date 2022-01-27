<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id'=>1,
               'name'=>'superadmin'
            ],
            [
             'id'=>2,
            'name'=>'admin'
           ],
           [
             'id'=>3,
            'name'=>' inventory manager'
         ],
         [
             'id'=>4,
            'name'=>'order manager'
         ],
         [
             'id'=>5,
            'name'=>'customer'
         ],
         
         ]);
    }
}
