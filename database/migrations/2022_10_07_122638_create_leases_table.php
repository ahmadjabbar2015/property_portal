<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("property_id")->unsigned();
            $table->foreign('property_id')->references('id')->on('propertydetails')->onDelete('cascade');
            $table->bigInteger('propertyunit_id')->unsigned()->nullable();
            $table->foreign('propertyunit_id')->references('id')->on('propertyunits')->onDelete('cascade');
            $table->string('rent');
            $table->string('get_dmy')->nullable();
            $table->string('advance_payments');
            $table->bigInteger('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->string('new_teanants_id');
            $table->string('lease_start');
            $table->string('lease_end');
            $table->string('due_date');
            $table->string('frequency_collection');
            $table->string('total_payment');
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
        Schema::dropIfExists('leases');
    }
}
