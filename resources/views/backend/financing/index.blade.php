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
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        <th>Loan ID</th>
                        <th>Full Name</th>
                        <th>Area Name</th>
                        <th>Birthdate</th>
                        <th>Age</th>
                        <th>Birthplace</th>
                        <th>Co-Maker</th>
                        <th>Address</th>
                        <th>Contact #</th>
                        <th>Total Repayment Weeks</th>
                        <th>Date Approved</th>
                        <th>Amount Release</th>
                        <th>Loan Cycle</th>
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
                            <td>
                                {{ $loan->area_name }}
                            </td>
                            <td>
                                {{ $loan->user->profile->birthdate }}
                            </td>
                            <td>
                                {{ $loan->user->profile->age }}
                            </td>
                            <td>
                                {{ $loan->user->profile->birthplace  }}
                            </td>
                            <td>
                                {{ $loan->spouse_full_name }}
                            </td>
                            <td>
                                {{ $loan->user->profile->full_address }}
                            </td>
                            <td>
                                {{ $loan->user->contact_no }}
                            </td>
                            <td>
                                {{ $loan->total_repayment_week }}
                            </td>
                            <td>
                                {{ $loan->created_at }}
                            </td>
                            <td>
                                {{ $loan->amount_of_release }}
                            </td>
                            <td>
                                {{ $loan->cycle_no }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection
@push('scripts')
<script src="{{ asset('assets/js/libs/datatable-btns.js?ver=3.0.0') }}"></script>
@endpush