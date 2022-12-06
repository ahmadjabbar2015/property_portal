<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propertyimages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("property_id")->unsigned();
            $table->foreign('property_id')->references('id')->on('propertydetails')->onDelete('cascade');
            $table->string('propertyimage')->nullable();
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
        Schema::dropIfExists('propertyimages');
    }
}
