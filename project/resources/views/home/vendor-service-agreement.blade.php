@extends('vendor.includes.master-vendor')
@section('title','Service Agreement')
@section('content')
<div class="page-title row">
  <form action="{{route('vendor.complete_sa')}}" method="post">
    {{ csrf_field() }}
    <input name="order_id" id="order_id" value="{{ $order->id }}" hidden>
    <div class="row clearfix mb-1">
      <div class="main-title mt-4 ml-1 col-md-6">
        <h3 class="font-montserrat bold fs-16 bold all-caps no-margin">Client info</h3>
      </div>
    </div>
    <div class="row clearfix mb-1">
      <div class="col-md-3">
        <div class="form-group form-group-default required">
          <label>Company Name (*)</label>
          <input type="text" class="form-control client_info" id="companyName" name="company_name" placeholder="Company Name" value="<?php echo $user->business_name?>" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group form-group-default required">
          <label>Contact Name (*)</label>
          <input type="text" class="form-control client_info" id="contactName" name="contact_name" placeholder="Contact Name" value="<?php echo $order->customer_name?>" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group form-group-default required">
          <label>Phone (*)</label>
          <input id="phone" type="tel" pattern="\d{3}\-\d{3}\-\d{4}" name="phone_number" class="form-control telephone client_info" data-mask="(999)-999-9999" placeholder="(999)-999-9999" value="<?php echo $order->customer_phone?>"  required />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group form-group-default required">
          <label>Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $order->customer_email?>"  placeholder="joan@lifeforcephysio.com">
        </div>
      </div>
    </div>
    <div class="row clearfix mb-1">
    <br />
      <div class="main-title mt-4 ml-1 col-md-6">
        <h3 class="font-montserrat bold fs-16 bold all-caps no-margin">Billing Address</h3>
      </div>
    </div>
    <div class="row clearfix mb-1">
      <div class="col-md-3">
        <div class="form-group form-group-default required">
          <label>Addresss Line 1 (*)</label>
          <input type="text" class="form-control client_info" id="bill-firstName" name="billing_address_1" placeholder="577" value="<?php echo $customer->address?>"  required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group form-group-default required">
          <label>Addresss Line 2</label>
          <input type="text" class="form-control" id="bill-lastName" name="billing_address_2" placeholder="Burnhamthorpe Road">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group form-group-default required">
          <label>City (*)</label>
          <input type="text" class="form-control client_info" id="bill-city" name="billing_city" value="<?php echo $customer->city?>"  placeholder="Toronto" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group form-group-default required">
          <label>State/Province/Region</label>
          <input type="text" class="form-control" id="bill-state" name="billing_state" value="<?php echo $customer->Province_State?>"  placeholder="Ontario">
        </div>
      </div>
    </div>
    
    <div class="row clearfix mb-1">
      
      <div class="col-md-4">
        <div class="form-group form-group-default required">
          <label>Postal Code (*)</label>
          <input type="text" class="form-control client_info" id="bill-postal" name="billing_postal_code"  placeholder="M9C 2Y3" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group form-group-default required">
          <label>Phone (*)</label>
          <input type="text" class="form-control" id="bill-phoneNumber" name="billing_phone" value="<?php echo $customer->phone?>"  id="phoneNumber2" value="" placeholder="(999)-999-9999" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group form-group-default required">
        <label>Email</label>
           <input type="email" class="form-control" id="bill-email" name="billing_email" value="<?php echo $customer->email?>"  placeholder="joan@lifeforcephysio.com">
          </div>
      </div>
    </div>
    
    <div class="row clearfix mt-1 pt-2">
      <br />
      <div class="main-title mt-4 ml-1 col-md-6">
        <h3 class="font-montserrat bold fs-16 bold all-caps no-margin">Shipping Address</h3>
      </div>
      <div class="serv-check justify-content-between d-inline-flex w-100 col-md-6">
        <div class="form-check primary mt-1">
          <input type="checkbox" onclick="checkBox(this)" id="defaultCheck">
          <label for="defaultCheck" class="bold">
            Same as Billing
          </label>
        </div>
      </div>
    </div>
    <div class="row clearfix mb-1">
      
      <div class="col-md-4">
        <div class="form-group form-group-default required">
          <label>Addresss Line 1 (*)</label>
          <input type="text" class="form-control client_info" id="shipp-firstName" name="shipp_address_1" placeholder="577" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group form-group-default required">
          <label>Addresss Line 2</label>
          <input type="text" class="form-control" id="shipp-lastName" name="shipp_address_2" placeholder="Burnhamthorpe Road">
        </div>
      </div>
    </div><div class="row">
      <div class="col-md-4">
        <div class="form-group form-group-default required">
          <label>City (*)</label>
          <input type="text" class="form-control client_info" id="shipp-city" name="shipping_city" placeholder="Toronto" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group form-group-default required">
          <label>State/Province/Region</label>
          <input type="text" class="form-control" id="shipp-state" name="shipping_state" placeholder="Ontario">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group form-group-default required">
          <label>Postal Code (*)</label>
          <input type="text" class="form-control client_info" id="shipp-postal" name="shipping_postal_code" placeholder="M9C 2Y3" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group form-group-default required">
          <label>Phone (*)</label>
          <input type="text" class="form-control" id="shipp-phoneNumber" name="shippig_phone" id="phoneNumber3" value="" placeholder="(999)-999-9999" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group form-group-default required">
          <label>Email</label>
            <input type="email" class="form-control" id="shipp-email" name="shippig_email" placeholder="joan@lifeforcephysio.com">
          </div>
      </div>
    </div>
    <div class="row">
      <button  aria-label="" id="confirm_form" class="btn btn-primary btn-cons from-left pull-right" type="submit">
        <span>Confirm</span>
      </button>
    </div>
    
  </form>
</div>
<div class="page-title">
  <div class="row sm-p-0">
    <div class="main-title mt-4 ml-1">
      <h3 class="font-montserrat bold fs-16 bold all-caps no-margin">Order info</h3>
    </div>
  </div>
  <div class="row mb-3 sm-p-0 mt-4"> 
    <div class="col-md-6 mb-2">
      <!--label>Pick Up Date</label>
      <div class="input-group date">
        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
          <input class="form-control" type="text" readonly />
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      </div>
      </div-->
      <h5 class="all-caps fs-14 mt-1 mb-1">Service Date</h5>
      <div class="form-group form-group-default input-group col-md-10">
        <div class="form-input-group">
          <label>Pick Up Date</label>
          <input type="text" class="form-control" value="{{date('m/d/Y', strtotime($order->booking_date))}}" placeholder="Pick Up Date" id="datepicker-component2" disabled>
        </div>
        <div class="input-group-append ">
          <span class="input-group-text"><i class="pg-icon">calendar</i></span>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <h5 class="all-caps fs-14 mt-1 mb-1">Hours of operations</h5>
      <div class="row">
        <div class="col-md-6 mb-2">
          <div class="form-group form-group-default input-group col-md-12 time-group">
            <div class="form-input-group">
              <label>From</label>
              <div id="selector">
                <select class="form-control input-lg" id="operation_from">
                  <option>7.00AM</option>
                  <option>8.00AM</option>
                  <option>9.00AM</option>
                  <option>10.00AM</option>
                  <option>11.00AM</option>
                  <option>12.00PM</option>
                  <option>1.00PM</option>
                  <option>2.00PM</option>
                  <option>3.00PM</option>
                  <option>4.00PM</option>
                  <option>5.00PM</option>
                  <option>6.00PM</option>
                  <option>7.00PM</option>
                </select>
                <i class="icon-clock1"></i>
                </div>
              </div>
          </div>
        </div>  
        <div class="col-md-6 mb-2">
          <div class="form-group form-group-default input-group col-md-12 time-group">
            <div class="form-input-group">
              <label>To</label>
              <div id="selector">
                <select class="form-control input-lg" id="operation_to">
                  <option>7.00AM</option>
                  <option>8.00AM</option>
                  <option>9.00AM</option>
                  <option>10.00AM</option>
                  <option>11.00AM</option>
                  <option>12.00PM</option>
                  <option>1.00PM</option>
                  <option>2.00PM</option>
                  <option>3.00PM</option>
                  <option>4.00PM</option>
                  <option>5.00PM</option>
                  <option>6.00PM</option>
                  <option>7.00PM</option>
                </select>
                <i class="icon-clock1"></i>
                </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-sm-12">
      <div class="row sm-p-0">
        <div class="table-responsive table-orderinfo">
          <table class="table borderless no-margin">
            <thead>
              <tr>
                <th class="fs-14 font-montserrat text-center bold">QTY</th>
                <th class="fs-14 font-montserrat text-center bold">Item</th>
                <th class="fs-14 font-montserrat text-center bold">Rate</th>
                <th class="fs-14 font-montserrat text-left bold" width="5%">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $sub_total=0;?>
              @foreach($order_details as $item)
              <tr>
                <td class="text-center"><?php echo $item->quantity?></td>
                <td class="text-center"><?php echo $item->title?></td>
                <td class="text-center">$<?php echo number_format($item->cost/$item->quantity,2,'.', '') ?></td>
                <td class="text-left">$<?php echo number_format($item->cost,2,'.', '')?></td>
              </tr>
                <?php $sub_total+=$item->cost; ?>
              @endforeach
              
              <tr>
                <td class="text-right" colspan="3">Sub Total</td>
                <td class="text-left bold">$<?php echo number_format((float)$sub_total,2,'.', '');?></td>
              </tr>
              <tr>
                <td class="text-center" colspan="2"></td>
                <td class="text-right">HST(13%)</td>
                <?php $hst = $sub_total*0.13;?>
                <td class="text-left">$<?php echo number_format((float)$hst,2,'.','');?></td>
              </tr>
              <tr>
                <td class="text-center" colspan="3">
                  <div class="popdiv text-right">
                    <img class="makeitcounticon" src="/assets/img/ribon.png"> Make It Count <a id="popover-div"  target="_blank" rel="popover" title="Make It Count"><i class="icon-info1 fs-16 bold color-danger"></i></a> 
                  </div>
                </td>
                <td class="text-left">
                  <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bold">$</span>
                    </div>
                    <input type="number" id="makeitcount" min="0" step="0.01" value="0.75" class="form-control">
                </div>
                </td>
              </tr>
              <tr>
                <td class="text-right bold" colspan="3">
                  Estimated Grand Total
                </td>
                <td class="text-left font-montserrat demo-fs-23 bold fs-sm-18">$<?php echo number_format((float)$sub_total+$hst,2,'.','');?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="fs-14 mt-5">The Grand Total and Line amounts displayed are estimates based on the quantity displayed. The final amount for invoicing and payment may change
          depending on the final quantity of materials received and if there are any applicable surcharges as outlined in the Terms and Conditions of this agreement.</p>
        </div> 
        </div>  
  </div>
</div>

<script>
  function checkBox(){
  if ($('#defaultCheck').is(':checked')) {
     $('#shipp-firstName').val($('#bill-firstName').val());
     $('#shipp-lastName').val($('#bill-lastName').val());
     $('#shipp-city').val($('#bill-city').val());
     $('#shipp-state').val($('#bill-state').val());
     $('#shipp-postal').val($('#bill-postal').val());
     $('#shipp-phoneNumber').val($('#bill-phoneNumber').val());
     $('#shipp-email').val($('#bill-email').val());
     
  } else {
    $('#shipp-firstName,#shipp-lastName,#shipp-city,#shipp-state,#shipp-postal,#shipp-phoneNumber,#shipp-email').val('');
  }

}
</script>
@endsection