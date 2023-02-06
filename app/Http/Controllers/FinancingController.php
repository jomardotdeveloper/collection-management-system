<?php

namespace App\Http\Controllers;

use App\Models\FinancingAgreement;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;

class FinancingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = FinancingAgreement::all();

        if(auth()->user()->role == "loaner")
            $loans = FinancingAgreement::where("user_id", auth()->user()->id)->get()->all();

        return view("backend.financing.index", compact("loans"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::where("role", "loaner")->get()->all();
        $new_clients = [];
        
        foreach($clients as $client){
            if (count($client->financing_agreements) < 1){
                array_push($new_clients, $client);
            }
        }
        $clients = $new_clients;

        if($clients)
            $first_client = $clients[0];
        else
            $first_client = null;
        return view("backend.financing.create", compact("clients", "first_client"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->get("is_balik_client"));
        $financing = FinancingAgreement::create([
            'ewp_23' => $request->get("ewp_23"), 
            'ewp_46' => $request->get("ewp_46"), 
            'subsidiary_financing' => $request->get("subsidiary_financing"),
            "mfo_name"  => $request->get("mfo_name"),
            "branch" => $request->get("branch"),
            "area_name" => $request->get("area_name"),
            "group_name" => $request->get("group_name"),
            "date_of_release" => $request->get("date_of_release"),
            "date_joined" => $request->get("date_joined"),
            "cbu_balance" => $request->get("cbu_balance"),
            "amount_of_release" => $request->get("amount_of_release"),
            "reg_fin_amount" => $request->get("reg_fin_amount"),
            "lcbu_balance" => $request->get("lcbu_balance"),
            "current_pn_no" => $request->get("current_pn_no"),
            "regular_pn_no" => $request->get("regular_pn_no"),
            "family_member_no" => $request->get("family_member_no"),
            "business_type" => $request->get("business_type"),
            "family_member_no" => $request->get("family_member_no"),
            'spouse_first_name' => $request->get("spouse_first_name"),
            'spouse_middle_name' => $request->get("spouse_middle_name"),
            'spouse_last_name' => $request->get("spouse_last_name"),
            'mother_first_name' => $request->get("mother_first_name"),
            'mother_middle_name' => $request->get("mother_middle_name"),
            'mother_last_name' => $request->get("mother_last_name"),
            'father_first_name' => $request->get("father_first_name"),
            'father_middle_name' => $request->get("father_middle_name"),
            'father_last_name' => $request->get("father_last_name"),
            'proposed_project' => $request->get("proposed_project"),
            'national_id' => $request->get("national_id"),
            'family_monthly_income' => $request->get("family_monthly_income"),
            'proposed_amount' => $request->get("proposed_amount"),
            'tin' => $request->get("tin"),
            'family_monthly_expense' => $request->get("family_monthly_expense"),
            'prev_project' => $request->get("prev_project"),
            'other_id' => $request->get("other_id"),
            'is_balik_client' => $request->get("is_balik_client") == "1" ? true : false,
            'prev_release_amount' => $request->get("prev_release_amount"),
            'is_bank_ac' => $request->get("is_bank_ac") == "1" ? true : false,
            'reason_for_living' => $request->get("reason_for_living"),
            "landmark_project" => $request->get("landmark_project"),
            "spouse_contact_no" => $request->get("spouse_contact_no"),
            "facebook" => $request->get("facebook"),
            "project_financed_cost" => $request->get("project_financed_cost"),
            "project_cost_plus" => $request->get("project_cost_plus"),
            "project_total_amount" => $request->get("project_total_amount"),
            "rep_principal" => $request->get("rep_principal"),
            "rep_cost_plus" => $request->get("rep_cost_plus"),
            "rep_total_repayment" => $request->get("rep_total_repayment"),
            "rep_weekly_payment" => $request->get("rep_weekly_payment"),
            "no_of_weeks" => $request->get("no_of_weeks"),
            "spouse_full_name" => $request->get("spouse_full_name"),
            "surety_full_name" => $request->get("surety_full_name"),
            "spouse_address" => $request->get("spouse_address"),
            "surety_address" => $request->get("surety_address"),
            "spouse_occupation" => $request->get("spouse_occupation"), 
            "surety_occupation" => $request->get("surety_occupation"),
            "spouse_monthly_income" => $request->get("spouse_monthly_income"),
            "surety_monthly_income" => $request->get("surety_monthly_income"),
            "spouse_relationship_client" => $request->get("spouse_relationship_client"),
            "surety_relationship_client" => $request->get("surety_relationship_client"),
            "spouse_birthdate" => $request->get("spouse_birthdate"),
            "surety_birthdate" => $request->get("surety_birthdate"),
            "spouse_contact_no" => $request->get("spouse_contact_no"),
            "surety_contact_no" => $request->get("surety_contact_no"),
            "total_working_capital" => $request->get("total_working_capital"),
            "total_repayment_week" => $request->get("total_repayment_week"),
            "no_of_weeks" => $request->get("no_of_weeks"),
            "cycle_no" => $request->get("cycle_no"),
            'user_id' => $request->get("user_id"),
        ]);
        $first_client = User::find($request->get("user_id"));

        Log::create([
            "user_id" => auth()->user()->id,
            "action" => "Created a new loan record for " . $first_client->full_name,
        ]);

        return redirect()->route("loans.show", ["loan" => $financing, "first_client" => $first_client])->with([
            "message" => "Record created successfully",
            "type" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FinancingAgreement $loan)
    {
        // dd($loan->mfo_name);
        $first_client = User::find($loan->user_id);
        return view("backend.financing.show", compact("loan", "first_client"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancingAgreement $loan)
    {
        $first_client = User::find($loan->user_id);
        return view("backend.financing.edit", compact("loan", "first_client"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinancingAgreement $loan)
    {
        $loan->update([
            'ewp_23' => $request->get("ewp_23"), 
            'ewp_46' => $request->get("ewp_46"), 
            'subsidiary_financing' => $request->get("subsidiary_financing"),
            "mfo_name"  => $request->get("mfo_name"),
            "branch" => $request->get("branch"),
            "area_name" => $request->get("area_name"),
            "group_name" => $request->get("group_name"),
            "date_of_release" => $request->get("date_of_release"),
            "date_joined" => $request->get("date_joined"),
            "cbu_balance" => $request->get("cbu_balance"),
            "amount_of_release" => $request->get("amount_of_release"),
            "reg_fin_amount" => $request->get("reg_fin_amount"),
            "lcbu_balance" => $request->get("lcbu_balance"),
            "current_pn_no" => $request->get("current_pn_no"),
            "regular_pn_no" => $request->get("regular_pn_no"),
            "family_member_no" => $request->get("family_member_no"),
            "business_type" => $request->get("business_type"),
            "family_member_no" => $request->get("family_member_no"),
            'spouse_first_name' => $request->get("spouse_first_name"),
            'spouse_middle_name' => $request->get("spouse_middle_name"),
            'spouse_last_name' => $request->get("spouse_last_name"),
            'mother_first_name' => $request->get("mother_first_name"),
            'mother_middle_name' => $request->get("mother_middle_name"),
            'mother_last_name' => $request->get("mother_last_name"),
            'father_first_name' => $request->get("father_first_name"),
            'father_middle_name' => $request->get("father_middle_name"),
            'father_last_name' => $request->get("father_last_name"),
            'proposed_project' => $request->get("proposed_project"),
            'national_id' => $request->get("national_id"),
            'family_monthly_income' => $request->get("family_monthly_income"),
            'proposed_amount' => $request->get("proposed_amount"),
            'tin' => $request->get("tin"),
            'family_monthly_expense' => $request->get("family_monthly_expense"),
            'prev_project' => $request->get("prev_project"),
            'other_id' => $request->get("other_id"),
            'is_balik_client' => $request->get("is_balik_client") == "yes" ? true : false,
            'prev_release_amount' => $request->get("prev_release_amount"),
            'is_bank_ac' => $request->get("is_bank_ac") == "yes" ? true : false,
            'reason_for_living' => $request->get("reason_for_living"),
            "landmark_project" => $request->get("landmark_project"),
            "spouse_contact_no" => $request->get("spouse_contact_no"),
            "facebook" => $request->get("facebook"),
            "project_financed_cost" => $request->get("project_financed_cost"),
            "project_cost_plus" => $request->get("project_cost_plus"),
            "project_total_amount" => $request->get("project_total_amount"),
            "rep_principal" => $request->get("rep_principal"),
            "rep_cost_plus" => $request->get("rep_cost_plus"),
            "rep_total_repayment" => $request->get("rep_total_repayment"),
            "rep_weekly_payment" => $request->get("rep_weekly_payment"),
            "no_of_weeks" => $request->get("no_of_weeks"),
            "spouse_full_name" => $request->get("spouse_full_name"),
            "surety_full_name" => $request->get("surety_full_name"),
            "spouse_address" => $request->get("spouse_address"),
            "surety_address" => $request->get("surety_address"),
            "spouse_occupation" => $request->get("spouse_occupation"), 
            "surety_occupation" => $request->get("surety_occupation"),
            "spouse_monthly_income" => $request->get("spouse_monthly_income"),
            "surety_monthly_income" => $request->get("surety_monthly_income"),
            "spouse_relationship_client" => $request->get("spouse_relationship_client"),
            "surety_relationship_client" => $request->get("surety_relationship_client"),
            "spouse_birthdate" => $request->get("spouse_birthdate"),
            "surety_birthdate" => $request->get("surety_birthdate"),
            "spouse_contact_no" => $request->get("spouse_contact_no"),
            "surety_contact_no" => $request->get("surety_contact_no"),
            "total_working_capital" => $request->get("total_working_capital"),
            "total_repayment_week" => $request->get("total_repayment_week"),
            "no_of_weeks" => $request->get("no_of_weeks"),
            "cycle_no" => $request->get("cycle_no"),
        ]);

        return redirect()->route("loans.show", ["loan" => $loan, "first_client" => $loan->user])->with([
            "message" => "Record updated successfully",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinancingAgreement $loan)
    {
        $loan->delete();
        return redirect()->route("loans.index")->with([
            "message" => "Record deleted successfully",
            "type" => "success"
        ]);
    }
}
