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
        Schema::create('pres_medocs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prescription_id')->nullable(); 
            $table->bigInteger('medicament_id')->nullable(); 
            $table->string('quantite')->nullable(); 
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
        Schema::dropIfExists('pres_medocs');
    }
};
