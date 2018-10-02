<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_lists',function(Blueprint $table){
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('type')->nullable();
            $table->integer('price')->unsigned();
            $table->timestamps();
            $table->softDeletes();

          
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses_lists');
    }
}
