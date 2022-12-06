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
        Schema::create('renttransactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("rent_leases_id")->unsigned();
            $table->foreign('rent_leases_id')->references('id')->on('leases')->onDelete('cascade');

            $table->string("due_date");
            $table->string("status")->default('0');
            $table->string("monthly");
            $table->string("payment");
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
        Schema::dropIfExists('renttransactions');
    }
};
