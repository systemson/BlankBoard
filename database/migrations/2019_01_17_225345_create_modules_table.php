<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('resource', 120)->unique();
            $table->string('description', 120)->nullable();
            $table->smallInteger('can_create')->default(0);
            $table->smallInteger('can_read')->default(0);
            $table->smallInteger('can_update')->default(0);
            $table->smallInteger('can_delete')->default(0);
            $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('modules');
    }
}
