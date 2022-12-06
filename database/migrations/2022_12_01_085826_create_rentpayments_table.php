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
        Schema::create('rentpayments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("rent_lease_id")->unsigned();
            $table->foreign('rent_lease_id')->references('id')->on('leases')->onDelete('cascade');
            $table->bigInteger("rent_transactions_id")->unsigned();
            $table->foreign('rent_transactions_id')->references('id')->on('renttransactions')->onDelete('cascade');

            $table->string('due_date');
            $table->string('payment');
            $table->string('current_date');
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
        Schema::dropIfExists('rentpayments');
    }
};
