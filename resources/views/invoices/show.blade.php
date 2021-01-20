@extends('layouts.app')

@section('content')

    <div class="receipt-content">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-wrapper">
                        <div class="intro">
                            Hi <strong> {{ auth()->user()->name}}</strong>,
                            <br>
                            {{ $invoice->id }}
                            This is the receipt for a payment of <strong> R {{ $invoice->amount }}</strong> for your services
                        </div>

                        <div class="payment-info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Payment No.</span>
                                    <strong>434334343</strong>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Payment Date</span>
                                    <strong>{{ $invoice->created_at }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="payment-details">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Client</span>
                                    <strong>
                                        {{ $invoice->name }}
                                    </strong>
                                    <p>
                                        989 5th Avenue <br>
                                        City of monterrey <br>
                                        55839 <br>
                                        USA <br>
                                        <a href="#">
                                            jonnydeff@gmail.com
                                        </a>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="line-items">
                            <div class="headers clearfix">
                                <div class="row">
                                    <div class="col-xs-4">Description</div>
                                    <div class="col-xs-3">Quantity</div>
                                    <div class="col-xs-5 text-right">Amount</div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        {{ $invoice->description}}
                                    </div>
                                    <div class="col-xs-3 qty">
                                        3
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        $60.00
                                    </div>
                                </div>
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        Bootstrap snippet
                                    </div>
                                    <div class="col-xs-3 qty">
                                        1
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        $20.00
                                    </div>
                                </div>
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        Snippets on bootdey
                                    </div>
                                    <div class="col-xs-3 qty">
                                        2
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        $18.00
                                    </div>
                                </div>
                            </div>
                            <div class="total text-right">
                                <p class="extra-notes">
                                    <strong>Extra Notes</strong>
                                    Please send use your account number as reference
                                    When making payment
                                </p>
                                <div class="field">
                                    Subtotal <span>$379.00</span>
                                </div>
                                <div class="field">
                                    Shipping <span>$0.00</span>
                                </div>
                                <div class="field">
                                    Discount <span>4.5%</span>
                                </div>
                                <div class="field grand-total">
                                    Total <span>$312.00</span>
                                </div>
                            </div>

                            <div class="print">
                                <form method="POST" action="/payment">
                                    @csrf
                                    <button class="btn btn-primary" type="submit" formmethod="post">Pay Invoice</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="footer">
                        Copyright © 2014. company name
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
