<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use PDO;


class InvoiceController extends Controller
{
    //
    public function testing(){
        $invoices = DB::table('invoices')->get();
        print_r($invoices);
    }

    public function index(Request $request){

//        SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
//FROM Orders
//INNER JOIN Customers
//ON Orders.CustomerID=Customers.CustomerID;
        $invoices = DB::select('select invoices.id,description,amount,invoices.created_at, customers.name,username  from invoices
                    inner join customers on invoices.customer_id = customers.id');

        return view('invoices.index', compact('invoices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create(){

        return view('invoices.create');
    }

    public function store(Request $request){
        $name = $request->input('description');
        $amount = $request->input('amount');
        DB::insert('insert into invoices (description,amount) values(?,?)',[$name,$amount]);
        return redirect()->route('invoices.index')
            ->with('success', 'Customer created successfully');

    }

    public function show(Invoice $invoice){

        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice){
        return view('invoices.edit', compact('invoice'));
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
