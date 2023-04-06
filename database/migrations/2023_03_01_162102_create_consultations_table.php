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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('patient_id')->nullable();
            $table->timestamp('date')->nullable();
            $table->text('antecedents')->nullable();
            $table->text('symptomes')->nullable();
            $table->string('tension_arterielle')->nullable();
            $table->string('temperature_corporelle')->nullable();
            $table->string('glycemie')->nullable();
            $table->string('poids')->nullable();
            $table->string('taille')->nullable();
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
        Schema::dropIfExists('consultations');
    }
};
