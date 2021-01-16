<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class CustomerController extends Controller
{
    public function index(){

        $customers = DB::select('select * from customers');

        return view('invoices.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('invoices.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'username' => 'required',
            'password' => 'required',
            'balance' =>  'required'
        ]);

        Customer::create($request->all());

        return redirect()->route('invoices.index')
            ->with('success', 'Customer created successfully');
    }

    public function show(Customer $customer){
        return view('invoices.show', compact('customer'));
    }

    public function edit(Customer $customer){
        return view('invoices.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'username' => 'required',
            'password' => 'required',
            'balance' =>  'required'
        ]);

        Customer::update($request->all());

        return redirect()->route('invoices.index')
            ->with('success', 'Customer created successfully');

    }

    public function destroy(Customer $customer){
        $customer->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Customer created successfully');
    }

}
