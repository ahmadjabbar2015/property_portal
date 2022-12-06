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
        Schema::create('salepayments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("sale_lease_id")->unsigned();
            $table->foreign('sale_lease_id')->references('id')->on('saleleases')->onDelete('cascade');
            $table->bigInteger("sale_transactions_id")->unsigned();
            $table->foreign('sale_transactions_id')->references('id')->on('saletransactions')->onDelete('cascade');

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
        Schema::dropIfExists('salepayments');
    }
};
