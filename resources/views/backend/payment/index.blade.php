@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Payments</h4>
        </div>
    </div>
    @if(auth()->user()->role != "loaner")
    <a href="{{ route('payments.create') }}" class="btn btn-primary">Create</a>
    
    @endif
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        
                        <th>Loan ID</th>
                        <th>Full Name</th>
                        <th>Addresss</th>
                        <th>Contact #</th>
                        <th>Deposit (LCBU & CBU)</th>
                        <th>Payment Date</th>
                        <th>Payment Amount</th>
                        <th>Withdrawal</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($payments as $payment)
                      <tr>
                        <td>
                            <a href="{{ route('payments.show', ["payment" => $payment]) }}">
                                {{ $payment->financing_agreement->token }}
                            </a>
                        </td>
                        <td>
                            {{ $payment->user->full_name }}
                        </td>
                        <td>
                            {{ $payment->user->profile->full_address }}
                        </td>
                        <td>
                            {{ $payment->user->contact_no }}
                        </td>
                        <td>
                            {{ $payment->lcbu_debit }} & {{ $payment->cbu_debit  }}
                        </td>
                        <td>
                            {{ $payment->payment_date }}
                        </td>
                        <td>{{ $payment->payment_amount }}</td>
                        <td>
                            {{ $payment->lcbu_credit }} & {{ $payment->cbu_credit  }}
                        </td>
                        <td>
                            {{ $payment->user->active_financing_agreements[0]->remaining_balance }} 
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