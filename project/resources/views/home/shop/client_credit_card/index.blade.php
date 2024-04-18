@extends('home.shop.user.new_main')

@section('title','| Billing Setting')


    
@section('content')
    <!-- START PAGE CONTENT -->
    <div class="content ">
        <!-- START JUMBOTRON -->
       
        <!-- END JUMBOTRON -->
        <!-- START CONTAINER FLUID -->
        <div class=" container-fluid m-t-40">
            <!-- START card -->
            <div class="card card-default">
                <!-- <div class="card-header separator">
                     <div class="card-title">
                         <h5><strong>Transaction Details</strong></h5>

                     </div>
                 </div>-->
                <!-- <div class="card-body p-t-20">-->
                <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="invoice padding-20 sm-padding-10">
                                @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                                @if(Session::has('errors'))
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="card-body p-t-20">
                                    <form action="{{route('home.credit.add')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="font-clr" style="color: #a832a4">ADD NEW CARD</label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-left">
                                        
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="font-clr font-sz">Cardholder_Name </label>
                                                            <div class="form-group form-group-default">
                                                                <input type="text" name="cardholder_name" id="cardholder_name" value="" class="form-control" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="font-clr font-sz">Card_Number </label>
                                                            <div class="form-group form-group-default">
                                                                <!-- <input type="password" name="card_number" id="card_number" value="" class="form-control" > -->
                                                                <input type="text" class="form-control card-no" name="card_number" placeholder="8888 8888 8888 8888" size="18" id="cr_no" minlength="19" maxlength="19" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="font-clr font-sz">EXPIRY(MM) </label>
                                                            <div class="form-group form-group-default">
                                                                <!-- <input type="text" nname="route" id="route" value="" class="form-control"> -->
                                                                <select class="form-control" name="exp_month" required>
                                                                    <option value="1">Jan (01)</option>
                                                                    <option value="2">Feb (02)</option>
                                                                    <option value="3">Mar (03)</option>
                                                                    <option value="4">Apr (04)</option>
                                                                    <option value="5">May (05)</option>
                                                                    <option value="6">Jun (06)</option>
                                                                    <option value="7">Jul (07)</option>
                                                                    <option value="8">Aug (08)</option>
                                                                    <option value="9">Sep (09)</option>
                                                                    <option value="10">Oct (10)</option>
                                                                    <option value="11">Nov (11)</option>
                                                                    <option value="12">Dec (12)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="font-clr font-sz">EXPIRY(YY) </label>
                                                            <div class="form-group form-group-default">
                                                                <!-- <input type="text" nname="route" id="route" value="" class="form-control"> -->
                                                                <select class="form-control" name="exp_year" required>
                                                                    <option>2024</option>
                                                                    <option>2025</option>
                                                                    <option>2026</option>
                                                                    <option>2027</option>
                                                                    <option>2028</option>
                                                                    <option>2029</option>
                                                                    <option>2030</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="font-clr font-sz">CCV Code</label>
                                                            <div class="form-group form-group-default">
                                                                <input type="text" name="ccv" id="ccv" placeholder="000" minlength="3" maxlength="3" value="" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!-- <h4 style="color: #6232a8!important;">$84.67</h4> -->
                                                            <div class="btn-group">
                                                                <button type="submit" style="background-color: #6232a8!important;" class="btn btn-success"><font style="font-size: 10px !important;">ADD CARDS</font>
                                                                </button>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="font-clr" style="color: #a832a4">MANAGE CARDS </label>
                                        </div>

                                    </div>
                                    @foreach($card_details as $card)
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="checkbox check-primary checkbox-circle">
                                                    <label style="font-size: 10px !important;">CARD# {{$card -> card_number}}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="font-clr">&nbsp</label>
                                                <div class="btn-group">
                                                    <a href="{{url('/shop-billing-setting/edit_credit/')}}/{{$card->id}}" style="background-color: #6232a8!important;" class="btn btn-success btn-size"><font style="font-size: 10px !important;">Edit</font>
                                                    </a>
                                                    @if($card->is_primary == "0")
                                                    <a href="{{url('/shop-billing-setting/set_primary/')}}/{{$card->id}}" style="background-color: #6232a8!important;" class="btn btn-success btn-size"><font style="font-size: 10px !important;">Set as Primary</font>
                                                    </a>
                                                    <a href="{{url('/shop-billing-setting/delete_credit/')}}/{{$card->id}}" style="background-color: #a832a4!important;" class="btn btn-success btn-size"><font style="font-size: 10px !important;">REMOVE</font>
                                                    </a>
                                                    @else
                                                    <a href="#!" class=""><font style="font-size: 12px !important;">Primary Account</font>
                                                    </a>
                                                    <a href="{{url('/shop-billing-setting/delete_credit/')}}/{{$card->id}}" style="background-color: #a832a4!important;" class="btn btn-success btn-size"><font style="font-size: 10px !important;">REMOVE</font>
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <br>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="invoice padding-20 sm-padding-10">
                                
                                <div class="card-body p-t-20">
                                    <form action="">
                                        <div class="row justify-content-left">
                                            <div class="col-md-6">
                                                <div class="form-group" style="display: inline-block">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4><b>Credit Cards</b></h4>
                                                            <p>Details</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="row">
                                                       <!-- <div class="col-md-12">
                                                            <input style="border-color:#8533ff !important " type="text" class="form-control" placeholder="SEARCH BY PRODUCT NAME">
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" style="display: inline-block">

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="font-cl1">SHOW</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select style="border-color:#8533ff !important " class="form-control">
                                                                <option value="" selected disabled>25</option> ;
                                                                <option value="">25</option>
                                                                <option value="">50</option>
                                                                <option value="">75</option>
                                                                <option value="">100</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="font-cl1">ITEMS</label>
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
                <!-- </div>-->
        </div>
            <!-- </div> -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection 
@section('scripts')
<!-- BEGIN VENDOR JS -->
<script src="{{ URL::asset('new_assets/assets/plugins/pace/pace.min.js')}}"  type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/modernizr.custom.js')}}"  type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-ui/jquery-ui.min.js')}}"  type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/popper/umd/popper.min.js')}}"  type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/bootstrap/js/bootstrap.min.js')}}"  type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery/jquery-easy.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-unveil/jquery.unveil.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-ios-list/jquery.ioslist.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-actual/jquery.actual.min.js')}}"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/select2/js/select2.full.min.js')}}" type="text/javascript" src=""></script>
<script src="{{ URL::asset('new_assets/assets/plugins/classie/classie.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/switchery/js/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/nvd3/lib/d3.v3.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/nvd3/nv.d3.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/nvd3/src/utils.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/nvd3/src/tooltip.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/nvd3/src/interactiveLayer.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/nvd3/src/models/axis.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/nvd3/src/models/line.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/nvd3/src/models/lineWithFocusChart.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/mapplic/js/hammer.min.js')}}"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/mapplic/js/jquery.mousewheel.js')}}"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/mapplic/js/mapplic.js')}}"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-metrojs/MetroJs.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/skycons/skycons.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}"
    type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}"
    type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/datatables-responsive/js/datatables.responsive.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('new_assets/assets/plugins/jquery-inputmask/jquery.inputmask.min.js')}}" type="text/javascript"></script>
<!-- END VENDOR JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="{{ URL::asset('new_assets/pages/js/pages.js')}}"></script>
<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ URL::asset('new_assets/assets/js/scripts.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->
<!-- <script src="assets/js/dashboard.js" type="text/javascript"></script> -->
<script src="{{ URL::asset('new_assets/assets/js/scripts.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function (e) {
    //For Card Number formatted input
        var cardNum = document.getElementById('cr_no');
        cardNum.onkeyup = function (e) {
            if (this.value == this.lastValue) return;
            var caretPosition = this.selectionStart;
            var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
            var parts = [];
            
            for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
                parts.push(sanitizedValue.substring(i, i + 4));
            }
            
            for (var i = caretPosition - 1; i >= 0; i--) {
                var c = this.value[i];
                if (c < '0' || c > '9') {
                    caretPosition--;
                }
            }
            caretPosition += Math.floor(caretPosition / 4);
            
            this.value = this.lastValue = parts.join(' ');
            this.selectionStart = this.selectionEnd = caretPosition;
        }

        //For Date formatted input
        var expDate = document.getElementById('exp');
        expDate.onkeyup = function (e) {
            if (this.value == this.lastValue) return;
            var caretPosition = this.selectionStart;
            var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
            var parts = [];
            
            for (var i = 0, len = sanitizedValue.length; i < len; i += 2) {
                parts.push(sanitizedValue.substring(i, i + 2));
            }
            
            for (var i = caretPosition - 1; i >= 0; i--) {
                var c = this.value[i];
                if (c < '0' || c > '9') {
                    caretPosition--;
                }
            }
            caretPosition += Math.floor(caretPosition / 2);
            
            this.value = this.lastValue = parts.join('/');
            this.selectionStart = this.selectionEnd = caretPosition;
        }


        var table = $('#tableTransactions');
        table.dataTable({
            "sDom": "<t><'row'<p i>>",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            },
            "iDisplayLength": 5
        })

        // var _format = function (d) {
        //     // `d` is the original data object for the row
        //     return '<table class="table table-inline">' +
        //         '<tr>' +
        //         '<td>Learn from real test data <span class="label label-important">ALERT!</span></td>' +
        //         '<td>USD 1000</td>' +
        //         '</tr>' +
        //         '<tr>' +
        //         '<td>PSDs included</td>' +
        //         '<td>USD 3000</td>' +
        //         '</tr>' +
        //         '<tr>' +
        //         '<td>Extra info</td>' +
        //         '<td>USD 2400</td>' +
        //         '</tr>' +
        //         '</table>';
        // }

        // // Add event listener for opening and closing details
        // $('#tableTransactions tbody').on('click', 'tr', function () {
        //     //var row = $(this).parent()
        //     if ($(this).hasClass('shown') && $(this).next().hasClass('row-details')) {
        //         $(this).removeClass('shown');
        //         $(this).next().remove();
        //         return;
        //     }
        //     var tr = $(this).closest('tr');
        //     var row = table.DataTable().row(tr);

        //     $(this).parents('tbody').find('.shown').removeClass('shown');
        //     $(this).parents('tbody').find('.row-details').remove();

        //     row.child(_format(row.data())).show();
        //     tr.addClass('shown');
        //     tr.next().addClass('row-details');
        // });

        //Date Pickers
        $('#daterangepicker').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>
<!-- END PAGE LEVEL JS -->
@endsection 