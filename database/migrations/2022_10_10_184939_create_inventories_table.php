<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("property_id")->unsigned();
            $table->foreign('property_id')->references('id')->on('propertydetails')->onDelete('cascade');
            $table->bigInteger('propertyunit_id')->unsigned()->nullable();
            $table->foreign('propertyunit_id')->references('id')->on('propertyunits')->onDelete('cascade');
            $table->string('description');
            $table->string('unit');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
