@extends('master')

@section('body')
    <form action="/login" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="submit" value="Login" />
    </form>
@endsection
