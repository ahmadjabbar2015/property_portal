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
        Schema::create('saletransactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("sale_lease_id")->unsigned();
            $table->foreign('sale_lease_id')->references('id')->on('saleleases')->onDelete('cascade');

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
        Schema::dropIfExists('saletransactions');
    }
};
