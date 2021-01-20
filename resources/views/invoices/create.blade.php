@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-6">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Generate New Invoice</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('customers.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('customers.store') }}" method="POST" >
                        @csrf

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name="invoice_id" readonly="readonly" value="<?php
                                function gen_random_number($length=5)
                                {
                                    $chars ="1234567890";
                                    $final_rand ='ENV';
                                    for($i=0;$i<$length; $i++)
                                    {
                                        $final_rand .= $chars[ rand(0,strlen($chars)-1)];
                                    }
                                    return $final_rand;
                                }
                                echo gen_random_number()."\n"; //generates a string
                                ?>" hidden/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="description" class="form-control" placeholder="Description">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Address:</strong>
                                    <textarea class="form-control" style="height:50px" name="address"
                                              placeholder="Address"></textarea>
                                </div>
                            </div>
{{--                            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <strong>Location:</strong>--}}
{{--                                    <input type="text" name="location" class="form-control" placeholder="Location">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Amount:</strong>
                                    <input type="number" name="amount" class="form-control" placeholder="Amount">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
