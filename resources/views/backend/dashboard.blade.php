@extends("layouts.master")
@section("content")
<div class="row g-gs">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Dashboard</h3>
                <div class="nk-block-des text-soft">
                    <p>Welcome to Dashboard.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            @if(auth()->user()->role != "loaner")
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="{{ route('loans.create') }}" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>NEW TRANSACTION</span></a></li>
                            <li class="nk-block-tools-opt"><a href="{{ route('payments.create') }}" class="btn btn-primary"><em class="icon ni ni-wallet"></em><span>REGISTER PAYMENT</span></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
            @endif
        </div><!-- .nk-block-between -->
    </div>
    @if(auth()->user()->role != "loaner")
    <div class="col-lg-3 col-xxl-3">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group align-start mb-2">
                    <div class="card-title">
                        <h6 class="title">Users</h6>
                    </div>
                </div>
                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                        <div class="nk-sale-data">
                            <span class="amount">{{ $lenders }}</span>
                            <span class="sub-title">Metrics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xxl-3">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group align-start mb-2">
                    <div class="card-title">
                        <h6 class="title">Clients</h6>
                    </div>
                </div>
                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                        <div class="nk-sale-data">
                            <span class="amount">{{ $loaners }}</span>
                            <span class="sub-title">Metrics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xxl-3">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group align-start mb-2">
                    <div class="card-title">
                        <h6 class="title">Loans</h6>
                    </div>
                </div>
                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                        <div class="nk-sale-data">
                            <span class="amount">{{ $loans }} </span>
                            <span class="sub-title">Metrics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xxl-3">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group align-start mb-2">
                    <div class="card-title">
                        <h6 class="title">Payments</h6>
                    </div>
                </div>
                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                        <div class="nk-sale-data">
                            <span class="amount">{{ $payments }}</span>
                            <span class="sub-title">Metrics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-3 col-xxl-3">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group align-start mb-2">
                    <div class="card-title">
                        <h6 class="title">CBU Balance</h6>
                    </div>
                </div>
                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                        <div class="nk-sale-data">
                            <span class="amount">{{ auth()->user()->cbu_balance }}</span>
                            <span class="sub-title">Metrics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xxl-3">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group align-start mb-2">
                    <div class="card-title">
                        <h6 class="title">LCBU Balance</h6>
                    </div>
                </div>
                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                        <div class="nk-sale-data">
                            <span class="amount">{{ auth()->user()->lcbu_balance }}</span>
                            <span class="sub-title">Metrics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count(auth()->user()->active_financing_agreements) > 0)
    <div class="col-lg-3 col-xxl-3">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group align-start mb-2">
                    <div class="card-title">
                        <h6 class="title">Loan Balance</h6>
                    </div>
                </div>
                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                        <div class="nk-sale-data">
                            <span class="amount">{{ auth()->user()->active_financing_agreements[0]->remaining_balance }}</span>
                            <span class="sub-title">Metrics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
    
</div>
@endsection