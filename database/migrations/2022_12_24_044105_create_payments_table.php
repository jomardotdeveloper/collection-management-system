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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->date("payment_date");
            $table->string("loan_cycle")->nullable();
            $table->string("instance")->nullable();
            $table->string("mfo_name")->nullable();
            $table->string("member_name")->nullable();
            $table->float("payment_amount")->nullable();
            $table->float("cbu_debit")->default(0);
            $table->float("lcbu_debit")->default(0);
            $table->float("cbu_credit")->default(0);
            $table->float("lcbu_credit")->default(0);
            $table->foreignId('financing_agreement_id')->constrained("financing_agreements")->onDelete('cascade');
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
        Schema::dropIfExists('payments');
    }
};
