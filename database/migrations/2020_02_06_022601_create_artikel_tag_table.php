<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            // php artisan make:migration
            // create_artikel_tag_table --create:artikel_tag
            $table->unsignedBigInteger('artikel_id');
             $table->foreign('artikel_id')->references('id')
                            ->on('artikels')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')
                            ->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('artikel_tag');
    }
}
