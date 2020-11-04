@extends('layouts.teacher-main')
@section('title')
    Teachify - Wallet To Wallet Transfer
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
                                <li class="breadcrumb-item active" aria-current="page">Wallet To Wallet Transfer</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
{{--        @include('partials.alerts')--}}
        <div class="row">
            <div class="row">
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <div class="card-body pt-100">
                            <div class="text-center">
                                <h5 class="h3">
                                  Account Number :  {{ $wallet->account_number }}
                                </h5>
                                <div class="h4 font-weight-300">
                                    Balance: &#8358; {{ number_format($wallet->balance) }}
                                </div>
                                <div>
                                    <form action="{{ route('verify') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="id" name="id" value="">
                                        <button class="btn-sm btn-default"> Top Up  </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                        <div class="card-header">

                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Wallet Transfer</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ni ni-user-run"></i>
                                </div>
                            </div>
                            <br>
                            @include('partials.alerts')
                        </div>
                        <div class="card-body">

                                <div class="pl-lg-4">

                                        <form action="{{url('/wallet/transfer')}}" method="post">
                                            @csrf
                                            <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group transfer">
                                                    <label class="form-control-label" for="input-account_number">Account Number</label>
                                                    <input type="text" id="input-account_number" class="form-control number" placeholder="Acount Number"  name="account_number" required>
                                                    <a class="text-secondary" data-toggle="modal" id="verifyAccount" data-target="#verify_account"
                                                       data-attr="">
                                                    <i class="far fa-eye fa-lg text-primary"  id="checkAccountNumber"></i>
                                                    </a>
                                                    <div class="text-danger">{{$errors->first('account_number')}}</div>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-amount">Amount</label>
                                                    <input type="number" step="0.01" id="input-amount" class="form-control" placeholder="Amount" name="amount" required>
                                                </div>
                                                <div class="text-danger">{{$errors->first('amount')}}</div>
                                                <br>
                                            </div>
                                            <button class="btn btn-default">Transfer</button>
                                            </div>
                                        </form>

                                </div>
                    </div>
                </div>
            </div>
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

{{--    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"--}}
{{--         aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body" id="mediumBody">--}}
{{--                    <div>--}}
{{--                        <!-- the result to be displayed apply here -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="modal fade" id="verify_account">
        <div class="modal-dialog">

                <div class="modal-content">
                    <h5 style="margin:14px;color:#ea7832;" >Account Details</h5>
{{--                    <input type="hidden" id="staff_id" name="staff_id" value="">--}}
                    <div class="modal-body">

                            <span style="color:#ea7832;">Account Name</span> : <span style="color:#ea7832;" id="verify_account_name"> </span>
                            <br>
                            <span style="color:#ea7832;">Account Number</span> :  <span style="color:#ea7832;" id="verify_account_number"> </span>

                    </div>
                    <br>
                </div>

        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#verifyAccount').on('click', function (event) {

            event.preventDefault();
            var accountVerification = $("#input-account_number").val();
            $.ajax({
                url: '/wallet/verify/accountnumber/' + accountVerification,
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    displayAccountDetails(data);
                }

            });
        });

        $("#input-account_number").keyup( function() {
           if( $("#input-account_number").val() < 11){
               $("#verify_account_name").val('');
               $("#verify_account_number").val('');
           }
        });
        function displayAccountDetails(data){

            let accountName = document.getElementById("verify_account_name");
            let accountNumber = document.getElementById("verify_account_number");

                accountName.innerHTML = data.data.owner.name;
                accountNumber.innerHTML = data.data.account_number;

        }
    });


</script>
