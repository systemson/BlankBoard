<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user', 50);
            $table->string('name', 50);
            $table->string('last_name', 50)->nullable();
            $table->string('email', 100);
            $table->string('password', 255);
            $table->integer('status')->default(1);
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();
            $table->dateTime('last_password_change')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
