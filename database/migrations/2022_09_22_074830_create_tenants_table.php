<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id()->foreignkey();
            $table->string("full_name");
            $table->string("email");
            $table->string("number");
            $table->string("identity")->nullable();
            $table->string("image")->nullable();
            $table->string("address");
            $table->string("occupation")->nullable();
            $table->string("place")->nullable();
            $table->string("emrgency_name")->nullable();
            $table->string("emrgency_number")->nullable();
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
        Schema::dropIfExists('tenants');
    }
}
