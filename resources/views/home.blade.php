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
                                    <a class="btn btn-success" href="{{ route('create') }}" title="Create a invoice"> <i class="fas fa-plus-circle"></i>
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
                                <th>Password</th>
                                <th>Balance</th>
                                <th>Date Created</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->username }}</td>
                                    <td>{{ $customer->password }}</td>
                                    <td>R {{ $customer->balance }}</td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">

                                            <a href="{{ route('customers.show', $customer->id) }}" title="show">
                                                <i class="far fa-list-alt"></i>
                                            </a>

                                            <a href="{{ route('customers.edit', $customer->id) }}">
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
