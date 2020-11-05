@extends('layouts.teacher-main')
@section('title')
    Teachify - Dashboard
@endsection
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Wallet</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

        <div class="row">
            <div class="card walletcard">
                <div class="card-header wallet-text">Account Number : {{$wallet->account_number}}</div>
                <div class="card-body wallet-text">Account Status : {{$wallet->status}}</div>
                <div class="card-footer wallet-text">Balance: &#8358;{{number_format($wallet->balance)}}</div>
            </div>
            <div class="pt-100 container-fluid table-responsive">
                <div style="display:flex; justify-content: space-between;">
                    <div>
                        <h2>Recent Transactions</h2>
                    </div>
                    <div>
                        <a href="#" class="btn btn-success btn-sm">Top Up</a>
                        <a href="{{url('/wallet/transfer')}}" class="btn btn-default btn-sm">Transfer</a>
                        <a href="#" class="btn btn-danger btn-sm">View Transactions</a>
                    </div>
                </div>


                <table id="example" class="table align-items-center" style="width:100%">
                    @include('partials.alerts')
                    <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Info</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>&#8358; {{number_format($transaction->amount)}}</td>
                            <td>{{$transaction->type}}</td>
                            <td>{{$transaction->info}}</td>
                            <td>{{$transaction->created_at->format('Y-m-d')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
{{--                    <tfoot>--}}
{{--                    <tr>--}}
{{--                        <th>Amount</th>--}}
{{--                        <th>Type</th>--}}
{{--                        <th>Date</th>--}}
{{--                    </tr>--}}
{{--                    </tfoot>--}}
                </table>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2020 <a href="{{ route('home') }}" class="font-weight-bold ml-1" target="_blank">Teachify</a> Powered by <img src="{{ url('') }}/CAPIFLEX.png" class="img-fluid" width="100px">
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
