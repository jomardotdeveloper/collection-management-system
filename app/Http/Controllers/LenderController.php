<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lenders = User::where("role", "lender")->get()->all();
        return view("backend.lender.index", compact("lenders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.lender.create");
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
            "role" => "lender",
            "email" => $request->email,
            "position" => $request->position,
            "password" => Hash::make($request->password),
        ]);

        Log::create([
            "user_id" => auth()->user()->id,
            "action" => "Created a new user with the name of " . $user->full_name,
        ]);

        return redirect()->route("lenders.show", ["lender" => $user])->with([
            "message" => "Lender created successfully",
            "type" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $lender)
    {
        return view("backend.lender.show", compact("lender"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $lender)
    {
        return view("backend.lender.edit", ["lender" => $lender]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $lender)
    {
        $values = [
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "contact_no" => $request->contact_no,
            'position' => $request->position
        ];

        if($request->password != "DEFAULT_PASSWORD") {
            $values["password"] = Hash::make($request->password);
        }

        $lender->update($values);

        Log::create([
            "user_id" => auth()->user()->id,
            "action" => "Update a user with the name of " . $lender->full_name,
        ]);
        
        return redirect()->route("lenders.show", ["lender" => $lender])->with([
            "message" => "Lender updated successfully",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $lender)
    {
        Log::create([
            "user_id" => auth()->user()->id,
            "action" => "Deleted a user with the name of " . $lender->full_name,
        ]);
        $lender->delete();
        return redirect()->route("lenders.index");
    }
}
