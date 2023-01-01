@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Payment from {{ $payment->user->full_name }}</h4>
        </div>
    </div>
    @if(auth()->user()->role != "loaner")
    <button class="btn btn-info" onclick="window.print()">Print</button>
    @endif
    <div class="card card-bordered card-preview mt-2 bg-info">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Payment</span>
                <form class="row gy-4" action="#" method="POST">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="payment_date">Date</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar"></em>
                                </div>
                                <input type="date" class="form-control" value="{{ $payment->payment_date }}" id="payment_date" placeholder="Payment Date" name="payment_date" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="loan_cycle">Cycle</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="loan_cycle" value="{{ $payment->loan_cycle }}" placeholder="Loan Cycle" name="loan_cycle" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="instance">Instance</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="instance" value="{{ $payment->instance }}" placeholder="Instance" name="instance" disabled/>
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
                                <input type="text" class="form-control" id="mfo_name" value="{{ $payment->mfo_name }}" placeholder="MFO Name" name="mfo_name" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="member_name">Member Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="member_name" value="{{ $payment->member_name }}" placeholder="Member Name" name="member_name" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="payment_amount">Payment Amount</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-money"></em>
                                </div>
                                <input type="number" class="form-control" id="payment_amount" value="{{ $payment->payment_amount }}" placeholder="Payment Amount" name="payment_amount" disabled/>
                            </div>
                        </div>
                    </div>
                    <span class="preview-title-lg overline-title">CBU & LCBU</span>
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Deposit</th>
                                <th scope="col">Withdraw/Refund</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">CBU</th>
                                <td>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-money"></em>
                                            </div>
                                            <input type="number" class="form-control" value="{{ $payment->cbu_debit }}" id="cbu_debit" placeholder="Amount" name="cbu_debit" disabled/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-money"></em>
                                            </div>
                                            <input type="number" class="form-control" value="{{ $payment->cbu_credit }}" id="cbu_credit" placeholder="Amount" name="cbu_credit" disabled/>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">LCBU</th>
                                <td>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-money"></em>
                                            </div>
                                            <input type="number" class="form-control" id="lcbu_debit" value="{{ $payment->lcbu_debit }}" placeholder="Amount" name="lcbu_debit" disabled/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-money"></em>
                                            </div>
                                            <input type="number" class="form-control" id="lcbu_credit" value="{{ $payment->lcbu_credit }}" placeholder="Amount" name="lcbu_credit" disabled/>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection