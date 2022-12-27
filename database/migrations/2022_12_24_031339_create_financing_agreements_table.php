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
        Schema::create('financing_agreements', function (Blueprint $table) {
            $table->id();
            // FIRST SECTION
            $table->enum('ewp_23', ['regular', 'pwd', 'agriculture'])->nullable();
            $table->enum('ewp_46', ['regular', 'pwd', 'agriculture'])->nullable();
            $table->enum('subsidiary_financing', ['water_sanitation', 'home', 'solar_home_system', 'education', 'malasakit_20', 'malasakit_40'])->nullable();
            $table->string("mfo_name")->nullable();
            $table->string("branch")->nullable();
            $table->string("area_name")->nullable();
            $table->string("group_name")->nullable();
            $table->date("date_of_release")->nullable();
            $table->date("date_joined")->nullable();
            $table->string("cbu_balance")->nullable();
            $table->string("amount_of_release")->nullable();
            $table->string("reg_fin_amount")->nullable();
            $table->string("lcbu_balance")->nullable();
            $table->string("current_pn_no")->nullable();
            $table->string("regular_pn_no")->nullable();

            // SECOND SECTION CLIENTS DETAILS APPLICATION
            $table->string("family_member_no")->nullable();
            $table->string("business_type")->nullable();
            $table->string('spouse_first_name')->nullable();
            $table->string('spouse_middle_name')->nullable();
            $table->string('spouse_last_name')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('proposed_project')->nullable();
            $table->string('national_id')->nullable();
            $table->string('family_monthly_income')->nullable();
            $table->string('proposed_amount')->nullable();
            $table->string('tin')->nullable();
            $table->string('family_monthly_expense')->nullable();
            $table->string('prev_project')->nullable();
            $table->string('other_id')->nullable();
            $table->boolean('is_balik_client')->nullable();
            $table->string('prev_release_amount')->nullable();
            $table->boolean('is_bank_ac')->nullable();
            $table->string('reason_for_living')->nullable();

            //ADDRESS & CONTACT DETAILS
            $table->string("landmark_project")->nullable();
            $table->string("spouse_contact_no_2")->nullable();
            $table->string("facebook")->nullable();


            // financing and repayment
            $table->string("project_financed_cost")->nullable();
            $table->string("project_cost_plus")->nullable();
            $table->string("project_total_amount")->nullable();
            $table->string("rep_principal")->nullable();
            $table->string("rep_cost_plus")->nullable();
            $table->string("rep_total_repayment")->nullable();
            $table->string("rep_weekly_payment")->nullable();
            $table->string("no_of_weeks")->nullable();

            // agreement of spouse
            $table->string("spouse_full_name")->nullable();
            $table->string("surety_full_name")->nullable();
            $table->string("spouse_address")->nullable();
            $table->string("surety_address")->nullable();
            $table->string("spouse_occupation")->nullable();
            $table->string("surety_occupation")->nullable();
            $table->string("spouse_monthly_income")->nullable();
            $table->string("surety_monthly_income")->nullable();
            $table->string("spouse_relationship_client")->nullable();
            $table->string("surety_relationship_client")->nullable();
            $table->date("spouse_birthdate")->nullable();
            $table->date("surety_birthdate")->nullable();
            $table->string("spouse_contact_no")->nullable();
            $table->string("surety_contact_no")->nullable();

            // RECEIPT OF WORKING CAPITAL
            $table->string("total_working_capital")->nullable();
            $table->string("total_repayment_week")->nullable();
            $table->string("receipt_no_of_weeks")->nullable();
            $table->string("cycle_no")->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // MAG0001
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financing_agreements');
    }
};
