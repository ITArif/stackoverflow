<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //question_tag er kichu data lage tai ata comment krsi na hole atow abr insert hobe
        //$this->call(MetaData::class);
//        for ($i=0;$i<20;$i++){
//            DB::table('question_tags')->insert([
//                'question_id'=>rand(3,7),
//                'tag_id'=>rand(1,3),
//                'created_at'=>date('y-m-d h:i:s'),
//                'updated_at'=>date('y-m-d h:i:s')
//            ]);
//        }

        $this->call(AdminSeeder::class);
        //$this->call(permissionSeeder::class);
        //$this->call(MetaData::class);
    }
}
