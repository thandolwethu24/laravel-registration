<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class CustomerController extends Controller
{
    public function index(){

        $customers = DB::select('select * from customers');

        return view('index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(Invoice $invoice){

        return view('invoices.create', compact('invoice'));
    }

    public function store(Request $request){
        $desc = $request->input('description');
        $amount = $request->input('amount');
        $id = $request->input('invoice_id');
        $cust_id = $request->user()->id;

        DB::insert('insert into invoices (customer_id,description,amount) values(?,?,? )',[$cust_id,$desc,$amount]);
        DB::insert('insert into invoice_lines (invoice_id,description,amount) values(?,?,?)',[$id,$desc,$amount]);

        return redirect()->route('invoices.index')
            ->with('success', 'Invoices created successfully');
    }

    public function show(Invoice $invoice){

        return view('invoices.show', compact('invoice'));
    }

    public function edit(Customer $customer){
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Invoice $invoice){
        $request->validate([
            'description' => 'required',
            'amount' => 'required',
//            'username' => 'required',
//            'password' => 'required',
//            'balance' =>  'required'
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')
            ->with('success', 'Customer created successfully');

    }

    public function destroy(Invoice $invoice){

        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Customer created successfully');
    }

}
