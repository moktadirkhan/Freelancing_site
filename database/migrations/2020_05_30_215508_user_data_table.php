<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
          $table->increments('id');
          //  $table->integer('number_of_work')->nullable();
            $table->string('skills');
            $table->string('image');
            $table->string('work_link');
            $table->string('type_of_developer');
            $table->string('bio');
          //  $table->string('status');
            $table->integer('user_id');
          //  $table->boolean('completed')-nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
}
