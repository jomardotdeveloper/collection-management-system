<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::where("role", "loaner")->get()->all();
        return view("backend.loaner.index", compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.loaner.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "email" => "unique:users|required",
            "password" => "required|confirmed",
        ]);


        $user = User::create([
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "contact_no" => $request->contact_no,
            "role" => "loaner",
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        $profile = Profile::create([
            "birthdate" => $request->birthdate,
            "civil_status" => $request->civil_status,
            "birthplace" => $request->birthplace,
            "street" => $request->street,
            "barangay" => $request->barangay,
            "city" => $request->city,
            "province" => $request->province,
            "zip" => $request->zip,
            "user_id" => $user->id,
        ]);


        return redirect()->route("clients.show", ["client" => $user])->with([
            "message" => "Client created successfully",
            "type" => "success"
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $client)
    {
        return view("backend.loaner.show", compact("client"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $client)
    {
        return view("backend.loaner.edit", compact("client"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $client)
    {
        $values = [
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "contact_no" => $request->contact_no,
        ];

        if($request->password != "DEFAULT_PASSWORD") {
            $values["password"] = Hash::make($request->password);
        }

        $client->update($values);

        $client->profile->update([
            "birthdate" => $request->birthdate,
            "civil_status" => $request->civil_status,
            "birthplace" => $request->birthplace,
            "street" => $request->street,
            "barangay" => $request->barangay,
            "city" => $request->city,
            "province" => $request->province,
            "zip" => $request->zip,
        ]);

        return redirect()->route("clients.show", ["client" => $client])->with([
            "message" => "Client updated successfully",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route("clients.index")->with([
            "message" => "Client deleted successfully",
            "type" => "success"
        ]);
    }


    public function data($id){
        $client = User::find($id);
        $cbu_balance = $client->cbu_balance;
        $lcbu_balance = $client->lcbu_balance;

        $data = [
            "cbu_balance" => $cbu_balance,
            "lcbu_balance" => $lcbu_balance,
        ];
        return response()->json($data);
    }
}
