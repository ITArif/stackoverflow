<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('company_name');
            $table->string('job_role');
            $table->string('tag');
            $table->string('job_type');
            $table->text('job_description');
            $table->string('visa_sponsor');
            $table->string('location');
            $table->string('remote_job');
            $table->integer('status',false,false)->default(false);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')
                ->on('users')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
