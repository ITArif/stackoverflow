<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name'=>'edit'],
            ['name'=>'add'],
            ['name'=>'update'],
            ['name'=>'delete']
        ]);
    }
}
