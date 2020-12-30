<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadatapostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadataposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('isserie');
            $table->integer('views');
            $table->boolean('published');
            $table->integer('preview')->default(0);
            $table->integer('next')->default(0);
            $table->bigInteger('post_id')->unsigned();
            $table->timestamps();
            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
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
        Schema::dropIfExists('metadataposts');
    }
}
