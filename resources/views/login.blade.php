@extends('master')

@section('body')
    <form action="/login" method="POST">
        <input type="text" name="username" placeholder="Username"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" value="Login"/>
    </form>
@endsection