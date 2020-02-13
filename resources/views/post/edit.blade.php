@extends('layouts.app')

@section('content')
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('post.update',$post->id)}}" method="POST">
            @csrf
            @method('PUT')
            <text-input name="title" placeholder="Enter Title" label="Title :" value="{{$post->title}}"></text-input>
            <textarea-input name="content" placeholder="Awesome Content Here" label="Content :" value="{{$post->content}}"></textarea-input>
            <form-group label="Publish Post : ">
                <radio-item name="is_published" @if($post->is_published) checked=1 @endif label="Yes" id="is_published_yes" value="1"></radio-item>
                <radio-item name="is_published" @if(!$post->is_published) checked=1 @endif id="is_published_no" label="No" value="0"></radio-item>
            </form-group>
            <button class='btn btn-primary'>Save</button>
            <a href="{{route('post.show',$post->id)}}" class='btn'>Cancel</a>
        </form>
    </div>

@endsection
