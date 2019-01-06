<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 124);
            $table->integer('category_id')->unsigned();
            $table->string('url_alias', 50)->nullable();
            $table->string('author_alias', 50)->nullable();
            $table->string('description', 256)->nullable();
            $table->string('image', 50)->nullable();
            $table->longText('content');
            $table->smallInteger('status')->default(1);
            $table->smallInteger('highlighted')->default(0);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')
            ->references('id')
            ->on('users');

            $table->foreign('updated_by')
            ->references('id')
            ->on('users');

            $table->foreign('category_id')
            ->references('id')
            ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
