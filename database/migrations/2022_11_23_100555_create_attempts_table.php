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
        Schema::create('attempts', function (Blueprint $table) {
            $table->id();
           
            $table->bigInteger("lead_id")->unsigned();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->string("client_name");
            $table->string("client_contact");
            $table->string("client_mail");
            $table->string("clinet_location")->nullable();
            $table->bigInteger("propertytype_id")->unsigned();
            $table->foreign('propertytype_id')->references('id')->on('propertytype')->onDelete('cascade');

            $table->string("area_minimum")->nullable();
            $table->string("area_maximum")->nullable();

            $table->bigInteger("source_id")->unsigned();
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');

            $table->string("budget_minimum")->nullable();
            $table->string("budget_maximum")->nullable();
            $table->string("lead_status");
            $table->string("class_status");
            $table->string("next_follow_date")->nullable();
            $table->string("aad_remark")->nullable();
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
        Schema::dropIfExists('attempts');
    }
};
