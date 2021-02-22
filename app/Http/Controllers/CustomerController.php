<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
    	return response()
    		->json([
    			'model' =>Customer::filterPaginateOrder()
    			]);
    }

    public function create()
    {
    	return response()
    		->json([
    			'form' =>Customer::form(),
    			'option' =>[]
    		]);	
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name'  => 'required',
    		'phone' =>'required',
    		]);
    	$customer = Customer::create($request->all());

    	return response()
    		->json([
    			'saved' => true
    			]);
    }

    public function show($id)
    {
    	$customer = Customer::findOrFail($id);

    	return response()
    		->json([
    			'model' => $customer
    			]);
    }

    public function edit($id)
    {
    	$customer = Customer::findOrFail($id);

    	return response()
    		->json([
    			'form' =>$customer,
    			'option' => []
    			]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'name'  => 'required',
    		'phone' =>'required',
    		]);
    	$customer = Customer::findOrFail($id);
    	$customer->update($request->except(['created_at','updated_at']));

    	return response()
    		->json([
    			'saved' => true
    			]);
    }

    public function destroy($id)
    {
    	$customer = Customer::findOrFail($id);
    	$customer->delete();

    	return response()
    		->json([
    			'deleted' => true
    			]);
    }

    public function admBladeIndex(){

        return view('backEnd.customer.index');

    }

    public function admBladeShow(){

        return view('backEnd.customer.show');

    }

    public function admBladeForm(){

        return view('backEnd.customer.form');

    }

    
}