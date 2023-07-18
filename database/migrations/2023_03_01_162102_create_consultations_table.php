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
            $table->bigInteger('patient_id')->nullable();
            $table->bigInteger('infirmier_id')->nullable();
            $table->bigInteger('medecin_id')->nullable();
            $table->timestamp('date')->nullable();
            $table->text('motif')->nullable();
            $table->string('tension')->nullable();
            $table->string('temperature')->nullable();
            $table->string('spo2')->nullable();
            $table->string('glycemie')->nullable();
            $table->string('poids')->nullable();
            $table->string('taille')->nullable();
            $table->text('observations')->nullable();
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
