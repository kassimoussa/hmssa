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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('fonction_id')->nullable();
            $table->bigInteger('departement_id')->nullable();
            $table->bigInteger('grade_id')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('matricule')->nullable();
            $table->string('date_embauche')->nullable();
            $table->string('sexe')->nullable();
            $table->timestamp('date_naissance')->nullable();
            $table->string('filename')->nullable();
            $table->string('public_path')->nullable();
            $table->string('storage_path')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
