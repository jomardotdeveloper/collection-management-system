@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">New record</h4>
        </div>
    </div>
    <div class="card card-bordered card-preview mt-2 bg-info">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Client Personal Information</span>
                <form class="row gy-4" action="{{ route('clients.store') }}" method="POST">
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
                            <label class="form-label" for="email">Email</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-mail"></em>
                                </div>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-lock"></em>
                                </div>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-lock"></em>
                                </div>
                                <input type="password" class="form-control" id="password_confirmation" placeholder="Password" name="password_confirmation" required/>
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
                                <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" required/>
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
                                <input type="text" class="form-control" id="middle_name" placeholder="Middle Name" name="middle_name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="last_name">Last Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="contact_no">Contact #</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="contact_no" placeholder="Contact #" name="contact_no" />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="birthdate">Birthdate</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="date" class="form-control" id="birthdate" placeholder="Birthdate" name="birthdate" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="birthplace">Birthplace</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="birthplace" placeholder="Birthplace" name="birthplace" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="civil_status">Civil Status</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <select name="civil_status" id="civil_status" class="form-control" required>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <span class="preview-title-lg overline-title">Client Address</span>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="street">No. / Street / Purok</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-contact"></em>
                                </div>
                                <input type="text" class="form-control" id="street" placeholder="No. / Street / Purok" name="street" />
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
                                <input type="text" class="form-control" id="barangay" placeholder="Barangay" name="barangay" required/>
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
                                <input type="text" class="form-control" id="city" placeholder="City" name="city" required/>
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
                                <input type="text" class="form-control" id="province" placeholder="Province" name="province" required/>
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
                                <input type="text" class="form-control" id="zip" placeholder="Zip Code" name="zip" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Save" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection