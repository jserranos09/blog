@extends('master')

@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$website['description']}}">
    <meta name="author" content="Eric Hu">
@endsection

@section('title')
    <!-- gets website from tagController -->
    <title>{{$website['website_title']}} - Tag:{{$tag['name']}}</title>
@endsection

@section('content')
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Tag:
                <!-- from tagController -->
                <small>{{$tag['name']}}</small>
            </h1>

            @include('vender.posts-list')

        </div>
        @include('vender.sidebar')
    </div>
@endsection
