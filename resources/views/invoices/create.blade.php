@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-6">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">



                <<div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Add New Product</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('invoices.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
                    <form action="{{ route('invoices.store') }}" method="POST" >
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="description" class="form-control" placeholder="Description">
                                </div>
                            </div>
{{--                            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <strong>Introduction:</strong>--}}
{{--                                    <textarea class="form-control" style="height:50px" name="introduction"--}}
{{--                                              placeholder="Introduction"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
