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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string("client_name");
            $table->string("client_contact")->unique();
            $table->string("client_mail")->nullable();
            $table->string("clinet_location")->nullable();
            $table->bigInteger("propertytype_id")->unsigned();
            $table->foreign('propertytype_id')->references('id')->on('propertytype')->onDelete('cascade');
            $table->bigInteger("source_id")->unsigned();
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
            $table->string("status");
            $table->bigInteger("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("remark")->nullable();
            $table->integer("attempt_status")->default(0);
            $table->integer("customer_status")->default(0);
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
        Schema::dropIfExists('leads');
    }
};