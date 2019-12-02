@extends('layouts.adminDashboard')
@section('content')
    <div class="card">	#is this a comment?
        <div class="card-header">
            View Sales
        </div>
        <div class="card-body">
{{--            <div style="padding: 10px; margin-left: 50px;">--}}
{{--                <button type="button" class="btn btn-danger" id="clear-view-sales">Clear All</button>--}}
{{--            </div>--}}
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th>Casher</th>
                        <th>Customer</th>
                        <th>Total Cash</th>
                        <th>Sale Time</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($total = 0)
                    @foreach($transactions as $key => $transaction)
                        <tr>
                            <td>
                                {{ $transaction->actor->name ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->customer_name ?? '' }}
                            </td>
                            <td>
                                {{ '$ ' }}{{ $transaction->total ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->updated_at}}
                            </td>
                            <td>
                                <button class="btn btn-xs btn-primary" data-toggle="collapse"
                                        data-target="#collapse{{$transaction->id}}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    Details
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" style="padding: 0px">
                                <div id="collapse{{$transaction->id}}" class="collapse" aria-labelledby="headingOne">
                                    <div class="card-body">
                                        <div class="row" style="font-weight: bold;">
                                            <div class="col-md-4 col-lg-3">Product Name</div>
                                            <div class="col-md-4 col-lg-3">Price</div>
                                        </div>
                                        @foreach($transaction->products as $key1 => $product)
                                            <div class="row">
                                                <div class="col-md-4 col-lg-3">
                                                    {{ $product->name }}
                                                </div>
                                                <div class="col-md-4 col-lg-3">{{ '$ ' }}{{ $product->price }}</div>
                                            </div>
                                        @endforeach
                                        <hr>
                                        <div class="row" style="font-weight: bold;">
                                            <div class="col-md-4 col-lg-3">Total</div>
                                            <div class="col-md-4 col-lg-3">{{ '$ ' }}{{ $transaction->total }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr style="text-align: center; font-weight: bold">
                        <td colspan="3">Total</td>
                        <td colspan="2">{{'$ '}}{{$transactions->sum('total')}}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
