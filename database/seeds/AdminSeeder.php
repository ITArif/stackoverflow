<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        //DB query builder
    {
        DB::table('admins')->insert([
            'name'=>'Arif islam',
            'email'=>'arif@gmail.com',
            'password'=>Hash::make('123456'),
            'active'=>1,
            'role'=>'sub-admin'
        ]);

        // eloquent model
//        $admin = new Admin();
//        $admin->name='sharukh khan';
//        $admin->email='srk@gmail.com';
//        $admin->password=Hash::make('123456');
//        $admin->active=1;
//        $admin->role='master-admin';
//        $admin->save();
    }
}
