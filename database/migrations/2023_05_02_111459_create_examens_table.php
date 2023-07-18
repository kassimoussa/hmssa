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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id')->nullable();
            $table->bigInteger('consultation_id')->nullable();
            $table->bigInteger('patient_id')->nullable();
            $table->bigInteger('medecin_id')->nullable();
            $table->bigInteger('laborantin_id')->nullable();
            $table->text('resultats')->nullable();
            $table->string('status')->default('NON');
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
        Schema::dropIfExists('examens');
    }
};
