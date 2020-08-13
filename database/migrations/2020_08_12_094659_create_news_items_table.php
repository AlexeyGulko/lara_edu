<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('slug')->unique();
            $table->string('title', 100);
            $table->string('description', 255);
            $table->text('body');
            $table->boolean('published')->default(false);
            $table->timestamps();

            $table
                ->foreign('owner_id')
                ->references('id'
                )->on('users')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_items');
    }
}
