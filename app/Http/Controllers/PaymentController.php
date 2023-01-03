<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        if(auth()->user()->role == "loaner")
            $payments = Payment::where("user_id", auth()->user()->id)->get()->all();

        return view("backend.payment.index", compact("payments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actual_clients = [];
        $clients = User::where("role", "loaner")->get()->all();

        foreach ($clients as $client) {
            if(count($client->active_financing_agreements) > 0)
                array_push($actual_clients, $client);
        }
        return view("backend.payment.create", ["clients" => $actual_clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $financing_agreement_id = $user->active_financing_agreements[0];

        $payment = Payment::create([
            "payment_date" => $request->payment_date,
            "loan_cycle" => $request->loan_cycle, 
            "instance" => $request->instance, 
            "mfo_name"  => $request->mfo_name, 
            "member_name" => $request->member_name, 
            "payment_amount" => $request->payment_amount,
            "cbu_debit" => $request->cbu_debit ? $request->cbu_debit : 0,
            "lcbu_debit" => $request->lcbu_debit ? $request->lcbu_debit : 0,
            "cbu_credit" => $request->cbu_credit ? $request->cbu_credit : 0,
            "lcbu_credit" => $request->lcbu_credit ? $request->lcbu_credit : 0,
            'user_id' => $request->user_id,
            'financing_agreement_id' => $financing_agreement_id->id
        ]);

        if($user->contact_no)
            $response = Http::post('https://api.semaphore.co/api/v4/messages', [
                'apikey' => 'c5a7b2b3099bd6768aeccc057052f5ad',
                'number' => $user->contact_no,
                'message' => "Pumasok na ang bayad mo",
                'sendername' => 'SEMAPHORE'
            ]);
       

        return redirect()->route("payments.show", ["payment" => $payment])->with([
            "message" => "Payment created successfully",
            "type" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view("backend.payment.show", ["payment" => $payment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
