<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleleases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("property_id")->unsigned();
            $table->foreign('property_id')->references('id')->on('propertydetails')->onDelete('cascade');
            $table->bigInteger('propertyunit_id')->unsigned()->nullable();
            $table->foreign('propertyunit_id')->references('id')->on('propertyunits')->onDelete('cascade');
            $table->string("total_sale_price");
            $table->string("sale_advance_payment");
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string("remaing_payment");
            $table->string("lease_start");
            $table->string("lease_end");
            $table->string("due_date");
            $table->string("frequency_collection");
            $table->string("number_of_years_month");
            $table->string("payment_per_frequency");
            $table->string('image')->nullable();
            $table->string('terms')->nullable();
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
        Schema::dropIfExists('saleleases');
    }
};
