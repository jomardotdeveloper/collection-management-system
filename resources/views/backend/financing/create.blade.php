@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">New record</h4>
        </div>
    </div>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <div class="preview-block">
                <?php
                    if(isset($_GET["client_id"]))
                    {
                        $client_id = $_GET["client_id"];
                        $client = App\Models\User::find($client_id);
                        $first_client = $client;
                    }
                ?>
                @if(!$first_client)
                There are no available clients. Please create a client first.
                @else
                <span class="preview-title-lg overline-title">Financing Agreement</span>
                <form class="row gy-4" action="{{ route('loans.store') }}" method="POST">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="user_id">Clients</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-users"></em>
                                </div>
                                <select name="user_id" id="user_id" class="form-control" required onchange="ref()">
                                    @foreach ($clients as $client)
                                        @if(!$first_client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->full_name }}
                                        </option>
                                        @else
                                            @if($first_client->id == $client->id)
                                            <option value="{{ $client->id }}" selected>
                                                {{ $client->full_name }}
                                            </option>
                                            @else
                                            <option value="{{ $client->id }}">
                                                {{ $client->full_name }}
                                            </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="ewp_23">23 EWP</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-users"></em>
                                </div>
                                <select name="ewp_23" id="ewp_23" class="form-control">
                                    <option value="" selected>Select your option</option>
                                    <option value="regular">Regular</option>
                                    <option value="pwd">PWD</option>
                                    <option value="agriculture">Agriculture</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="ewp_46">46 EWP</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-users"></em>
                                </div>
                                <select name="ewp_46" id="ewp_46" class="form-control">
                                    <option value="" selected>Select your option</option>
                                    <option value="regular">Regular</option>
                                    <option value="pwd">PWD</option>
                                    <option value="agriculture">Agriculture</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="subsidiary_financing">Subsidiary Financing</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-users"></em>
                                </div>
                                <select name="subsidiary_financing" id="subsidiary_financing" class="form-control">
                                    <option value="water_sanitation">Water & Sanitation</option>
                                    <option value="home">Home</option>
                                    <option value="solar_home_system">Solar Home System</option>
                                    <option value="education">Education</option>
                                    <option value="malasakit_20">MalASakit / Qard Hassan (20 EWP)</option>
                                    <option value="malasakit_40">MalASakit / Qard Hassan (40 EWP)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="mfo_name">MFO Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="mfo_name" placeholder="MFO Name" name="mfo_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="branch">Branch w/ Code</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="branch" placeholder="Branch" name="branch" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="area_name">Area Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="area_name" placeholder="Area Name" name="area_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="group_name">Group Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="group_name" placeholder="Group Name" name="group_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="date_of_release">Date of Release</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="date" class="form-control" id="date_of_release" name="date_of_release" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="date_joined">Date Joined</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="date" class="form-control" id="date_joined" name="date_joined" required/>
                            </div>
                        </div>
                    </div>
                    {{-- TO BE UPDATE AFTER THE PAYMENT --}}
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="cbu_balance">CBU Balance</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="number" class="form-control" id="cbu_balance" placeholder="CBU Balance" name="cbu_balance" value="0" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="amount_of_release">Amount of Release</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="number" class="form-control" id="amount_of_release" placeholder="Amount of Release" name="amount_of_release" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="reg_fin_amount">Current Reg. Fin. Amount</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="number" class="form-control" id="reg_fin_amount" placeholder="Current Reg. Fin. Amount" name="reg_fin_amount" required/>
                            </div>
                        </div>
                    </div>
                    {{-- TO BE UPDATE AFTER THE PAYMENT --}}
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="lcbu_balance">LCBU Balance</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="number" class="form-control" id="lcbu_balance" placeholder="LCBU Balance" name="lcbu_balance" value="0" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="current_pn_no">Current PN No.</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="current_pn_no" placeholder="Current PN No." name="current_pn_no" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="regular_pn_no">Regular PN No.</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="regular_pn_no" placeholder="Regular PN No." name="regular_pn_no" required/>
                            </div>
                        </div>
                    </div>
                    {{-- CLIENTS DETAILS AND APPLICATION --}}
                    <span class="preview-title-lg overline-title">Client's details and application</span>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="last_name">Last Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{ $first_client->last_name }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="first_name">First Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="{{ $first_client->first_name }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="middle_name">Middle Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="middle_name" placeholder="Middle Name" name="middle_name"  value="{{ $first_client->middle_name }}" disabled/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="birthdate">Birthdate</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="date" class="form-control" id="birthdate"  name="birthdate" value="{{ $first_client->profile->birthdate }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="age">Age</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="age" placeholder="Age" name="age" value="{{ $first_client->profile->age }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="civil_status">Civil Status</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="civil_status" placeholder="Civil Status" name="civil_status"  value="{{ $first_client->profile->civil_status }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="birthplace">Birthplace</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="birthplace" placeholder="Birthplace" name="birthplace" value="{{ $first_client->profile->birthplace }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="family_member_no"># of Family Members</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="family_member_no" placeholder="# of Family Members" name="family_member_no" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="business_type">Business Type</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="business_type" placeholder="Business Type" name="business_type" required/>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="surety_last_name">surety Last Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="surety_last_name" placeholder="Last Name" name="surety_last_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="first_name">surety First Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="surety_first_name" placeholder="First Name" name="surety_first_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="surety_middle_name">surety Middle Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="surety_middle_name" placeholder="Middle Name" name="surety_middle_name" required/>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="mother_last_name">Mother's Last Name (Maiden Name)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="mother_last_name" placeholder="Last Name" name="mother_last_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="mother_first_name">Mother's First Name (Maiden Name)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="mother_first_name" placeholder="First Name" name="mother_first_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="mother_middle_name">Mother's Middle Name (Maiden Name)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="mother_middle_name" placeholder="Middle Name" name="mother_middle_name" required/>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="father_last_name">Father's Last Name </label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="father_last_name" placeholder="Last Name" name="father_last_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="father_first_name">Father's First Name </label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="father_first_name" placeholder="First Name" name="father_first_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="father_middle_name">Father's Middle Name </label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="father_middle_name" placeholder="Middle Name" name="father_middle_name" required/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="proposed_project">Proposed Project/Business</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="proposed_project" placeholder="Proposed Project/Business" name="proposed_project" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="national_id">National ID (PhilSys No.)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="national_id" placeholder="National ID (PhilSys No.)" name="national_id" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="family_monthly_income">Family Monthly Income</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="number" class="form-control" id="family_monthly_income" placeholder="Family Monthly Income" name="family_monthly_income" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="proposed_amount">Proposed Amount</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="number" class="form-control" id="proposed_amount" placeholder="Proposed Amount" name="proposed_amount" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="tin">TIN</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="tin" placeholder="TIN" name="tin" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="family_monthly_expense">Family Monthly Expenses</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="number" class="form-control" id="family_monthly_expense" placeholder="Family Monthly Expenses" name="family_monthly_expense" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="prev_project">Previous Project/Business</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="prev_project" placeholder="Previous Project/Business" name="prev_project" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="other_id">Other ID Type & Number</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="other_id" placeholder="Other ID Type & Number" name="other_id" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="is_balik_client">Balik Client?</label>
                            <div class="form-control-wrap">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="is_balik_client_yes" name="is_balik_client" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="is_balik_client_yes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="is_balik_client_no" name="is_balik_client" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="is_balik_client_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="prev_release_amount">Prev. Release Amount</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="number" class="form-control" id="prev_release_amount" placeholder="Prev. Release Amount" name="prev_release_amount" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="is_bank_ac">Bank A/C if available</label>
                            <div class="form-control-wrap">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="is_bank_ac_yes" name="is_bank_ac" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="is_bank_ac_yes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="is_bank_ac_no" name="is_bank_ac" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="is_bank_ac_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="reason_for_living">Reason for Living</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="reason_for_living" placeholder="Reason for Living" name="reason_for_living" required/>
                            </div>
                        </div>
                    </div>
                    <span class="preview-title-lg overline-title">Address and contact details</span>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="street">No. / Street / Purok</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="street" placeholder="No. / Street / Purok" name="street" value="{{ $first_client->profile->street }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="barangay">Barangay</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="barangay" placeholder="Barangay" name="barangay" value="{{ $first_client->profile->barangay }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="city">City</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{ $first_client->profile->city }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="province">Province</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="province" placeholder="Province" name="province" value="{{ $first_client->profile->province }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="zip">Zip Code</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="zip" placeholder="Zip Code" name="zip" value="{{ $first_client->profile->zip }}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="landmark_project">Landmark Project / Business</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="landmark_project" placeholder="Landmark Project / Business" name="landmark_project" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="contact_no">Client Contact #</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="contact_no" placeholder="Client Contact #" name="contact_no" value="{{ $first_client->contact_no }}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="spouse_contact_no_2">Spouse Contact #</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="spouse_contact_no_2" placeholder="Client Contact #" name="spouse_contact_no_2" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="facebook">Facebook a/c</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="facebook" placeholder="Facebook a/c" name="facebook" required />
                            </div>
                        </div>
                    </div>
                    <span class="preview-title-lg overline-title">Financing and repayment agreement</span>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="project_financed_cost">Financed Cost (Project Cost)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="number" class="form-control" id="project_financed_cost" placeholder="Financed Cost (Project Cost)" name="project_financed_cost" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="project_cost_plus">Cost Plus (Project Cost)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="number" class="form-control" id="project_cost_plus" placeholder="Cost Plus (Project Cost)" name="project_cost_plus" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="project_total_amount">Total Amount (Project Cost)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="number" class="form-control" id="project_total_amount" placeholder="Total Amount (Project Cost)" name="project_total_amount" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="rep_principal">Principal (Repayment to ASA Philippines)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="number" class="form-control" id="rep_principal" placeholder="Principal (Repayment to ASA Philippines)" name="rep_principal" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="rep_total_repayment">Total Repayment (Repayment to ASA Philippines)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="number" class="form-control" id="rep_total_repayment" placeholder="Total Repayment (Repayment to ASA Philippines)" name="rep_total_repayment" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="no_of_weeks"> # Weeks of Amortization (Repayment to ASA Philippines)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="no_of_weeks" placeholder="# Weeks of Amortization (Repayment to ASA Philippines)" name="no_of_weeks" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="rep_weekly_payment">Weekly Payment (Repayment to ASA Philippines)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="rep_weekly_payment" placeholder="# Weeks of Amortization (Repayment to ASA Philippines)" name="rep_weekly_payment" required />
                            </div>
                        </div>
                    </div>
                    <span class="preview-title-lg overline-title">Agreement of spouse (Co-Maker) and surety maker (co-member)</span>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="spouse_full_name">Spouse / Co-Maker Full Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="spouse_full_name" placeholder="Spouse / Co-Maker Full Name" name="spouse_full_name" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="spouse_occupation">Spouse / Co-Maker Occupation / Company</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="spouse_occupation" placeholder="Spouse / Co-Maker Occupation / Company" name="spouse_occupation" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="spouse_address">Spouse / Co-Maker Address</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="spouse_address" placeholder="Spouse / Co-Maker Address" name="spouse_address" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="spouse_monthly_income">Spouse / Co-Maker Monthly Income</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="number" class="form-control" id="spouse_monthly_income" placeholder="Spouse / Co-Maker Monthly Income" name="spouse_monthly_income" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="spouse_relationship_client">Spouse / Co-Maker Relationships to Client</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="spouse_relationship_client" placeholder="Spouse / Co-Maker Relationships to Client" name="spouse_relationship_client" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="spouse_birthdate">Spouse / Co-Maker Birthdate</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="date" class="form-control" id="spouse_birthdate" placeholder="Spouse / Co-Maker Birthdate" name="spouse_birthdate" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="spouse_contact_no">Spouse / Co-Maker Contact #</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="spouse_contact_no" placeholder="Spouse / Co-Maker Contact #" name="spouse_contact_no" required />
                            </div>
                        </div>
                    </div>



                    {{-- SURETY --}}
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="surety_full_name">surety / Co-Maker Full Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="surety_full_name" placeholder="surety / Co-Maker Full Name" name="surety_full_name" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="surety_occupation">surety / Co-Maker Occupation / Company</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="surety_occupation" placeholder="surety / Co-Maker Occupation / Company" name="surety_occupation" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="surety_address">surety / Co-Maker Address</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="surety_address" placeholder="surety / Co-Maker Address" name="surety_address" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="surety_monthly_income">surety / Co-Maker Monthly Income</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="number" class="form-control" id="surety_monthly_income" placeholder="surety / Co-Maker Monthly Income" name="surety_monthly_income" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="surety_relationship_client">surety / Co-Maker Relationships to Client</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="surety_relationship_client" placeholder="surety / Co-Maker Relationships to Client" name="surety_relationship_client" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="surety_birthdate">surety / Co-Maker Birthdate</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="date" class="form-control" id="surety_birthdate" placeholder="surety / Co-Maker Birthdate" name="surety_birthdate" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="surety_contact_no">surety / Co-Maker Contact #</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="surety_contact_no" placeholder="surety / Co-Maker Contact #" name="surety_contact_no" required />
                            </div>
                        </div>
                    </div>
                    <span class="preview-title-lg overline-title">Receipt of workign capital (Finance) by client</span>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="full_name">Client's name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="full_name" placeholder="Client's name" name="full_name" value="{{ $first_client->full_name }}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="total_working_capital">Total Working Capital</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="number" class="form-control" id="total_working_capital" placeholder="Total Working Capital" name="total_working_capital" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="total_repayment_week">Total Repayment Week</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="total_repayment_week" placeholder="Total Repayment Week" name="total_repayment_week" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="receipt_no_of_weeks">Term (# of weeks)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="receipt_no_of_weeks" placeholder="Term (# of weeks)" name="receipt_no_of_weeks" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="cycle_no">Cycle No.</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="cycle_no" placeholder="Cycle No." name="cycle_no" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Save" class="btn btn-primary"/>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div> 
<script>
    function ref(){
        var ref = document.getElementById('user_id').value;
        window.location.href = "{{ route("loans.create") }}" + "?client_id=" + ref;; 
    }
</script>
@endsection