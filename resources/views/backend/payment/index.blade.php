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
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Loan ID</th>
                        <th>Payment Date</th>
                        <th>Payment Amount</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($payments as $payment)
                      <tr>
                        <td>
                            <a href="{{ route('payments.show', ["payment" => $payment]) }}">
                            {{ $payment->user->full_name }}
                            </a>
                        </td>
                        <td>
                            {{ $payment->financing_agreement->token }}
                        </td>
                        <td>
                            {{ $payment->payment_date }}
                        </td>
                        <td>{{ $payment->payment_amount }}</td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection