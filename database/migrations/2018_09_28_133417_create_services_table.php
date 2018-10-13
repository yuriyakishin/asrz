<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort')->nullable();
            $table->string('title');
            $table->text('value')->nullable();
            $table->text('anons')->nullable();
            $table->string('preview')->nullable();
            $table->string('uri',100);
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
        Schema::dropIfExists('services');
    }
}