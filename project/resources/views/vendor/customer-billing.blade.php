@extends('vendor.includes.master-vendor')

@section('content')
    <link href="{{ URL::asset('assets/map/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/map/css/custom.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/map/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/map/css/bootstrap-4-utilities.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></script>

    <style>
        .w-100 {
            width: 100% !important;
        }

        .order-id {
            max-width: 150px;
            padding-right: 15px;
        }

        .order-id label {
            margin: 8px 0px;
        }

        div.dt-buttons {
            float: unset;
            margin: 48px 14px 0 0;
        }

        .buttons-select-all, .buttons-select-none {
            text-transform: capitalize;
        }

        .btn-warning {
            color: #fff!important;
            background-color: #f0ad4e!important;
            border-color: #eea236!important;
            background-image: unset!important;
        }
        .btn-info {
            color: #fff!important;
            background-color: #5bc0de!important;
            border-color: #46b8da!important;
            background-image: unset!important;
        }
        .form-inline select.form-control {
         min-width: 100%!important;
      }
      .custom-calendar {
    margin-top: unset;
       }
        
    </style>
    <script src="{{ URL::asset('assets/map/js/jquery1.11.3.min.js')}}"></script>
    <script src="{{ URL::asset('assets/map/js/jquery.blockUI.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="page-title row">
        <h2>{{$client->first_name." ".$client->last_name}}</h2>
    </div>
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="container row">
        <div class="row main-row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left-table">
                <div class="bg-white row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div id="exTab2" class="col-12">
                            <ul class="nav nav-tabs">
                                <li><a href="{{url('/vendor/customer/'.$client->id)}}">Overview</a></li>
                                <li><a href="{{url('/vendor/customer/'.$client->id.'/templates')}}">Templates</a></li>
                                <li><a href="{{url('/vendor/customer/'.$client->id.'/orders')}}">Orders</a></li>
                                <li class="active"><a href="{{url('/vendor/customer/'.$client->id.'/billing')}}">Billing</a></li>
                                <li><a href="{{url('/vendor/customer/'.$client->id.'/documents')}}">Documents</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane  mt-3" id="1"></div>
                                <div class="tab-pane mt-3" id="2"></div>
                                <div class="tab-pane mt-3" id="3"></div>
                                <div class="tab-pane active mt-3" id="4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="top-title">
                                                <h3>Credit Card</h3>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="invoice padding-20 sm-padding-10">
                                                    
                                                    <div class="card-body p-t-20">
                                                        <form action="">
                                                            <div class="row justify-content-left">
                                                                <div class="col-md-12">
                                                                    <div class="form-group" style="display: inline-block">

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <h4><b>Credit Cards</b></h4>
                                                                                <p>Details</p>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <hr>
                                                        <div class="">
                                                            <table class="table table-hover table-condensed table-responsive table-responsive"
                                                                id="tableTransactions">
                                                                <thead bgcolor="#1f217d">
                                                                <tr>
                                                                    <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
                                                                    Comman Practice Followed
                                                                    -->
                                                                    <th style="width:20%;"><font color="#fc7b03">id</font></th>
                                                                    <th style="width:20%;"><font color="#fc7b03">Cardholder_Name</font></th>
                                                                    <th style="width: 20%;"><font color="#fc7b03">Card_Number</font></th>
                                                                    <th style="width: 20%;"><font color="#fc7b03">Expiry</font></th>
                                                                    <th style="width: 20%;"><font color="#fc7b03">CCV</font></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($card_details as $card)
                                                                        <tr class="text-center">
                                                                            <td class="fs-12">{{ $card->id}}</td>
                                                                            <td class="fs-12">{{ $card->card_holder_name}}</td>
                                                                            <td class="fs-12">{{ $card->card_number}}</td>
                                                                            <td class="fs-12">{{$card->exp_month.'/'.$card->exp_year}}</td>
                                                                            <td class="fs-12">{{ $card->ccv}}</td>
                                                                        

                                                                            <!-- <td class="fs-12">{{ $card->is_primary }}</td> -->
                                                                            <!-- <td class="fs-12">{{$settings[0]->currency_sign}}{{ $card->amount }}</td> -->
                                                                            
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--<div class="row">
                                                            <div class="col-md-2">
                                                                <input type="checkbox" value="1" id="checkbox1" required name="terms">
                                                                <label for="checkbox1" class="text-info small"> <a href="http://backpocket.ca/terms.html"
                                                                                                                class="text-info ">SELECT ALL</a></label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="checkbox" value="1" id="checkbox1" required name="terms">
                                                                <label for="checkbox1" class="text-info small"> <a href="http://backpocket.ca/terms.html"
                                                                                                                class="text-info ">
                                                                    DESELECT</a></label>
                                                            </div>

                                                        </div>-->

                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane mt-3" id="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="http://cdn.datatables.net/plug-ins/1.10.15/dataRender/datetime.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

@stop

@section('footer')

@stop