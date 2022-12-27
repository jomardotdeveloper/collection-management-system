@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Lenders</h4>
        </div>
    </div>
    <a href="{{ route('lenders.create') }}" class="btn btn-primary">Create</a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact #</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lenders as $lender)
                        <tr>
                            <td>
                                <a href="{{ route('lenders.show', ["lender" => $lender]) }}">
                                    {{ $lender->token}}
                                </a>
                            </td>
                            <td>{{ $lender->full_name }}</td>
                            <td>{{ $lender->email }}</td>
                            <td>{{ $lender->contact_no }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection