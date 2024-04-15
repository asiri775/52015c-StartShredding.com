<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\UserProfile;
use App\AddressMultiple;
use App\Clients;
use App\Mail\UserRegistrationMail;
use App\Models\EmailSubject;
use App\Models\EmailTemplate;
use App\Mail\UserRegisterVerification;
use App\VendorCustomers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Crypt;

use App\ClientCreditCard;

class clientCreditcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        if (Auth::guard('profile')->guest()) {
            return redirect('/shop-signin');
        }
    }

     
    public function index()
    {
        $userInfo = Auth::guard('profile')->user();
        $user = Clients::find($userInfo->id);
        $card_details = ClientCreditCard::where('client_id', $userInfo->id)->orderBy('id', 'desc')->get();
        
        return view('home.shop.client_credit_card.index', compact('user', 'card_details'));
        // return redirect('/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userInfo = Auth::guard('profile')->user();
        $user = Clients::find($userInfo->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect('/shop-billing-setting')->withErrors($validator);
        }
        $userInfo = Auth::guard('profile')->user();
        $user = Clients::find($userInfo->id);
        $credit = new ClientCreditCard;
        $credit['client_id'] = $userInfo->id;
        $credit['card_holder_name'] = $request->cardholder_name;
        $credit['card_number'] = $request->card_number;
        $credit['exp_month'] = $request->exp_month;
        $credit['exp_year'] = $request->exp_year;
        $credit['ccv'] = $request->ccv;
        $is_primary = ClientCreditCard::where('client_id', $userInfo->id)->get();
        if(empty($is_primary)){
            $credit['is_primary'] = '1';
        }
        else {
            $credit['is_primary'] = '0';
        }
        
        $credit->save();
        return redirect('/shop-billing-setting')->with('message', 'Credit Card updated Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userInfo = Auth::guard('profile')->user();
        $user = Clients::find($userInfo->id);
        $card_detail = ClientCreditCard::find($id);
        return view('home.shop.client_credit_card.edit', compact('user', 'card_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect('/shop-billing-setting')->withErrors($validator);
        }
        $userInfo = Auth::guard('profile')->user();
        $user = Clients::find($userInfo->id);
        $credit = ClientCreditCard::find($id);
        $credit['card_holder_name'] = $request->cardholder_name;
        $credit['card_number'] = $request->card_number;
        $credit['exp_month'] = $request->exp_month;
        $credit['exp_year'] = $request->exp_year;
        $credit['ccv'] = $request->ccv;
        $credit->update();
        return redirect('/shop-billing-setting')->with('message', 'Credit Card updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userInfo = Auth::guard('profile')->user();
        $user = Clients::find($userInfo->id);
        $del_card = ClientCreditCard::find($id);
        $del_card->delete();
        return redirect('/shop-billing-setting')->with('message', 'Credit Card deleted Successfully.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cardholder_name' => 'required|max:255',
            'card_number' => 'required|max:255|unique:client_credit_cards',
            'exp_month' => 'required|max:255',
            'exp_year' => 'required|max:255',
            'ccv' => 'required|max:255'
        ]);
    }
    public function set_primary($id)
    {
        $userInfo = Auth::guard('profile')->user();
        $user = Clients::find($userInfo->id);
        $old_primary = ClientCreditCard::where('client_id', $userInfo->id)->where('is_primary', '1')->first();
        $old_primary['is_primary'] = '0';
        $old_primary->update();
        $new_primary = ClientCreditCard::find($id);
        $new_primary['is_primary'] = '1';
        $new_primary->update();
        return redirect('/shop-billing-setting')->with('message', 'Primary Account set Successfully.');
    }
}
