<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Invoice;
use App\Account;
use App\Subaccount;
use App\Company;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *991118G
	 * @return Response
	 */
	public function index()
    {
        $invoices = Invoice::All();
        return view('invoices.index', compact('invoices'));
    }


	public function create()
	{
		$user = \Auth::user();
        $account = Account::lists('name','id');
        $account = array(''=>'') + $account;

        $companies = $user->companies->where('client', 1)->lists('ruc','id');
        $companies = array(''=>'') + $companies;

        $products = $user->products->where('active', 1)->lists('name','id');
        $products = array(''=>'') + $products;

		return view('invoices.create', compact('account','companies','products'));        
	}


	public function store()
	{
		//
	}


	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


    // public function subcategoria($id){
    //     if(Request::ajax()){
    //         $subcat = \DB::table('subaccount')->select('id','name')->where('account_id','=','id')->get();
    //         return Response::json($subcat);
    //     }
    // }

     public function subaccount($id){
      
            $subaccount = Subaccount::where('account_id',$id)->lists('name','id');
            $subaccount = array('' => '') + $subaccount;
            return view('invoices.partials.subaccount', compact('subaccount'));
            
    }

}
