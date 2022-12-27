<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'ewp_23', 
        'ewp_46', 
        'subsidiary_financing',
        "mfo_name",
        "branch",
        "area_name",
        "group_name",
        "date_of_release",
        "date_joined",
        "cbu_balance",
        "amount_of_release",
        "reg_fin_amount",
        "lcbu_balance",
        "current_pn_no",
        "regular_pn_no",
        "family_member_no",
        "business_type",
        "family_member_no",
        'spouse_first_name',
        'spouse_middle_name',
        'spouse_last_name',
        'mother_first_name',
        'mother_middle_name',
        'mother_last_name',
        'father_first_name',
        'father_middle_name',
        'father_last_name',
        'proposed_project',
        'national_id',
        'family_monthly_income',
        'proposed_amount',
        'tin',
        'family_monthly_expense',
        'prev_project',
        'other_id',
        'is_balik_client',
        'prev_release_amount',
        'is_bank_ac',
        'reason_for_living',
        "landmark_project",
        "spouse_contact_no",
        "facebook",
        "project_financed_cost",
        "project_cost_plus",
        "project_total_amount",
        "rep_principal",
        "rep_cost_plus",
        "rep_total_repayment",
        "rep_weekly_payment",
        "no_of_weeks",
        "spouse_full_name",
        "surety_full_name",
        "spouse_address",
        "surety_address",
        "spouse_occupation",
        "surety_occupation",
        "spouse_monthly_income",
        "surety_monthly_income",
        "spouse_relationship_client",
        "surety_relationship_client",
        "spouse_birthdate",
        "surety_birthdate",
        "spouse_contact_no",
        "surety_contact_no",
        "total_working_capital",
        "total_repayment_week",
        "no_of_weeks",
        "cycle_no",
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTokenAttribute(){
        $id = strval($this->id);
        return "L" . str_pad($id, 4, "0", STR_PAD_LEFT);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function getTotalLoanAttribute(){
        // FORMULA 
        $idx = 0;
        $interest = [.15, .3];

        if($this->ewp_23){
            $idx = 0;
        }else if($this->ewp_46){
            $idx = 1;
        }else{
            $idx = 0;
        }
        $total_loan = floatval($this->amount_of_release) + (floatval($this->amount_of_release) * $interest[$idx]);
        return $total_loan;
    }

    public function getRemainingBalanceAttribute(){
        $payments = $this->payments;
        $total_payments = 0;
        foreach($payments as $payment){
            $total_payments += $payment->payment_amount;
        }
        $remaining_balance = $this->total_loan - $total_payments;
        return $remaining_balance;
    }

    public function getIsActiveAttribute(){
        $remaining_balance = $this->remaining_balance;
        if($remaining_balance > 0){
            return true;
        }else{
            return false;
        }
    }
    
}
