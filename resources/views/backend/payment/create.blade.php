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
                <span class="preview-title-lg overline-title">Payment</span>
                <form class="row gy-4" action="{{ route('payments.store') }}" method="POST">
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
                            <label class="form-label" for="user_id">Client</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <select  class="form-select js-select2" name="user_id" id="user_id" data-search="on" required onchange="clientOnChange()">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="payment_date">Date</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar"></em>
                                </div>
                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="payment_date" placeholder="Payment Date" name="payment_date" required/>
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
                                <input type="text" class="form-control" id="loan_cycle" placeholder="Loan Cycle" name="loan_cycle" required/>
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
                                <input type="text" class="form-control" id="instance" placeholder="Instance" name="instance" required/>
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
                            <label class="form-label" for="member_name">Member Name</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="member_name" placeholder="Member Name" name="member_name" required/>
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
                                <input type="number" class="form-control" id="payment_amount" placeholder="Payment Amount" name="payment_amount" required/>
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
                                <th scope="col">Balance</th>
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
                                            <input type="number" class="form-control" id="cbu_debit" placeholder="Amount" name="cbu_debit" required/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-money"></em>
                                            </div>
                                            <input type="number" class="form-control" id="cbu_credit" placeholder="Amount" name="cbu_credit" required/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-money"></em>
                                            </div>
                                            <input type="number" class="form-control" id="cbu_balance" placeholder="Amount" value="0" name="cbu_balance" disabled/>
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
                                            <input type="number" class="form-control" id="lcbu_debit" placeholder="Amount" name="lcbu_debit" required/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-money"></em>
                                            </div>
                                            <input type="number" class="form-control" id="lcbu_credit" placeholder="Amount" name="lcbu_credit" required/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-money"></em>
                                            </div>
                                            <input type="number" class="form-control" id="lcbu_balance" placeholder="Amount" value="0" name="lcbu_balance" disabled/>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Save" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var cbu = document.getElementById('cbu_balance');
    var lcbu = document.getElementById('lcbu_balance');
    var cbu_deposit = document.getElementById('cbu_debit');
    var cbu_withdraw = document.getElementById('cbu_credit');
    var lcbu_deposit = document.getElementById('lcbu_debit');
    var lcbu_withdraw = document.getElementById('lcbu_credit');

    async function clientOnChange(){
        var client_id = document.getElementById('user_id').value;
        var data = await getData(client_id);
        cbu.value = data.cbu_balance;
        lcbu.value = data.lcbu_balance;
        if(data.cbu_balance <= 0){
            cbu_withdraw.setAttribute("disabled", "");
            lcbu_withdraw.setAttribute("disabled", "");
        }else{
            cbu_withdraw.removeAttribute("disabled", "");
            lcbu_withdraw.removeAttribute("disabled", "");
        }

        
        // console.log(data.cbu_balance)
        // console.log(data.cbu_balance < 0);
    }


    async function getData(client_id){
        var response = await axios.get("data/" + client_id);
        var data = response.data;
        return data;
    }

    clientOnChange();
</script>
@endsection