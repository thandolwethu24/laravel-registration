@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>{{ __('Welcome') }} {{auth()->user()->name}} </h2>
                                </div>
                                <div class="pull-right mb-4">
                                    <a class="btn btn-success" href="{{ route('invoices.create') }}" title="Create a invoice"> <i class="fas fa-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered table-responsive-lg">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Username</th>
                                <th>Balance</th>
                                <th>Date Created</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $invoice->name }}</td>
                                    <td>{{ $invoice->description }}</td>
                                    <td>{{ $invoice->username }}</td>
                                    <td>R {{ $invoice->amount }}</td>
                                    <td>{{ $invoice->created_at }}</td>
                                    <td>
                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST">

                                            <a href="{{ route('invoices.show', $invoice->id) }}" title="show">
                                                <i class="far fa-list-alt"></i>
                                            </a>

                                            <a href="{{ route('invoices.edit', $invoice->id) }}">
                                                <i class="fas fa-edit"></i>

                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" title="delete" style="border: none; background-color:transparent; color: red" >
                                                <i class="fas fa-trash-alt"></i>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
