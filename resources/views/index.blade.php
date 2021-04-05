<!-- This is the home page-->
@extends('master')

<!-- this will go whever @ yield('meta') is. Usually in the head-->
@section('meta')
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection

<!-- this will go whenever @ yield('content') is. Usually in the body-->
@section('content')
    <p>Hello, {{ $name }}</p>
@endsection
