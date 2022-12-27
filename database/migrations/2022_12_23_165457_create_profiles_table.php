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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->date("birthdate"); #
            $table->enum('civil_status', ['single', 'married', 'widowed'])->nullable(); #
            $table->string("birthplace")->nullable();
            $table->string("street")->nullable();
            $table->string("barangay")->nullable();
            $table->string("city")->nullable();
            $table->string("province")->nullable();
            $table->string("zip")->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
};
