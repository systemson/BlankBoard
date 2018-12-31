<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('email_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('status')->default(1);
            $table->integer('is_read')->default(0);

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('email_id')
            ->references('id')
            ->on('emails')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_user');
    }
}
