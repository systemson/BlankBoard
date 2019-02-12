<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 32);
            $table->text('description')->nullable();
            $table->string('url', 120);
            $table->smallInteger('status')->default(1);
            $table->smallInteger('order')->unsigned()->default(1);
            $table->integer('menu_id')->unsigned();
            $table->timestamps();

            $table->foreign('menu_id')
            ->references('id')
            ->on('menus')
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
        Schema::dropIfExists('menu_items');
    }
}
