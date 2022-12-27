@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Financing Agreements</h4>
        </div>
    </div>
    @if(auth()->user()->role != "loaner")
        <a href="{{ route('loans.create') }}" class="btn btn-primary">Create</a>
        
    @endif
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Loan ID</th>
                        <th>Client</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loans as $loan)
                        <tr>
                            <td>
                                <a href="{{ route('loans.show', ["loan" => $loan]) }}">
                                    {{ $loan->token}}
                                </a>
                            </td>
                            <td>{{ $loan->user->full_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection