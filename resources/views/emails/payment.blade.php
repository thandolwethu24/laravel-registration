@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="/payment">
        @csrf
        <button class="btn btn-primary" type="submit" formmethod="post"> Pay Our Money</button>
    </form>

</div>
@endsection
