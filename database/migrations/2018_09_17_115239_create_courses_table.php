<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('courses',function(Blueprint $table){
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('courses_list_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('certificate_name')->nullable();
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->string('place')->nullable();
            $table->bigInteger('price')->default(0);
            $table->bigInteger('dp')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('courses_list_id')->references('id')->on('courses_lists')->onDelete('cascade')->onUpdate('cascade');
        });    
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
