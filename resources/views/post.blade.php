@extends('master')

@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$website['description']}}">
    <meta name="author" content="Eric Hu">
@endsection

@section('title')
    <!-- gets website from PostController -->
    <title>{{$post['title']}}{{$website['website_title']}}</title>
@endsection

@section('content')
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- gets website from tagController -->
            <h1 class="mt-4">{{$post['title']}}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#">{{$post->user['name']}}</a>
            </p>
            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$post->created_at->format('M d, Y')}}</p>
            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{\Illuminate\Support\Facades\Storage::url($post->featured_image)}}" alt="">
            <hr>

            <!-- Post Content. {!! !!} must be used or the HTML tags will not work.-->
            {!! $post->content !!}
            <hr>

        </div>
        @include('vender.sidebar')

    </div>
@endsection
