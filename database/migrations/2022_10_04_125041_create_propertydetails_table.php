<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propertydetails', function (Blueprint $table) {
            $table->id()->foreignkey();;
            $table->string("name");
            $table->string("rent");
            $table->bigInteger("propertytype_id")->unsigned();
            $table->foreign('propertytype_id')->references('id')->on('propertytype')->onDelete('cascade');
            $table->bigInteger("landlord_id")->unsigned();
            $table->foreign('landlord_id')->references('id')->on('landlords')->onDelete('cascade');
            $table->string("area")->nullable();
            $table->string("agency")->nullable();
            $table->string("deposit")->nullable();
            $table->string("description");
            $table->integer("property_status")->default(0);
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
        Schema::dropIfExists('propertydetails');
    }
}
