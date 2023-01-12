@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">{{ $lender->full_name }}</h4>
        </div>
    </div>
    
    <form action="{{ route('lenders.destroy', ['lender' => $lender]) }}" method="POST">
        @csrf
        @method("DELETE")
        <a href="{{ route('lenders.edit', ['lender' => $lender]) }}" class="btn btn-success">Edit</a>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    {{-- <a href="{{ route('lenders.destroy', ['lender' => $lender]) }}" class="btn btn-success">Delete</a> --}}
    <div class="card card-bordered card-preview mt-2 bg-info">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">User</span>
                <form class="row gy-4" action="#" method="POST">
                    @if(Session::has("type"))
                    <div class="alert alert-success" role="alert">
                        <ul>
                            <li>{{ Session::get("message") }}</li>
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
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email"  value="{{ $lender->email }}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="position">Position</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="position" placeholder="Position" value="{{ $lender->position }}" name="position" disabled/>
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
                                <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="{{ $lender->first_name }}"  disabled/>
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
                                <input type="text" class="form-control" id="middle_name" placeholder="Middle Name" name="middle_name" value="{{ $lender->middle_name }}" disabled/>
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
                                <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{ $lender->last_name }}" disabled/>
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
                                <input type="text" class="form-control" id="contact_no" placeholder="Contact #" name="contact_no" value="{{ $lender->contact_no }}" disabled/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection