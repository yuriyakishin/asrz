<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('path_id');
            $table->string('path',100);
            $table->string('uuid',36);
            $table->boolean('temp');
            $table->integer('sort');
            $table->boolean('active');
            $table->string('image',200);
            $table->string('image_name',200);
            $table->string('image_dir',200);
            $table->string('image_size',10);
            $table->string('image_width',10);
            $table->string('image_height',10);
            $table->string('comment')->nullable();
            $table->string('type',100)->nullable();
            $table->timestamps();
            $table->index(['path_id','path']);
            $table->index('uuid');
            $table->index('temp');
            $table->index('sort');
            $table->index('active');
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
