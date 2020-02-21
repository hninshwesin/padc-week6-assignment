@extends('layouts.app')

@section('content')

    @if($posts->count())

        @foreach($posts as $post)
            <div>
                <h2><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></h2>
                <div class="row">
                    <p class="col-4">Written by : <strong>{{$post->author->name}}</strong> </p>
                    <p class="col-4">Category : <strong>{{$post->category->name ?? ""}}</strong> </p>
                    <p class="col-4 text-right">Created by : <strong>{{$post->created_at}}</strong></p>
                </div>
                <p>Is Published Post : <strong>{{$post->is_published ? 'Yes' : 'No' }}</strong></p>
                <p>{{$post->excerpt}}</p>
            </div>
            <hr>
        @endforeach
    @else
        <h2>No Posts found</h2>
    @endif

    {{ $posts->links() }}

@endsection
