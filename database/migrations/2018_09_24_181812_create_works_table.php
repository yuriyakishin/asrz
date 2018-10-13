<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort')->nullable();
            $table->string('title');
            $table->text('value')->nullable();
            $table->string('uri',100);
            $table->string('image')->nullable();
            $table->string('preview')->nullable();
            $table->timestamps();
            $table->index('sort');
            $table->index('uri');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
