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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('sexe')->nullable();
            $table->string('gp_sanguin')->nullable();
            $table->string('adresse')->nullable();
            $table->string('matricule')->nullable();
            $table->string('affiliation')->nullable();
            $table->string('telephone')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('filename')->nullable();
            $table->string('public_path')->nullable();
            $table->string('storage_path')->nullable();
            $table->bigInteger('user_id')->nullable();
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
        Schema::dropIfExists('patients');
    }
};
