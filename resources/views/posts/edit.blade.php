@extends('posts.layout')

@section('content')
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="subject" placeholder="Subject" value="{{ $post->subject }}">
        <textarea name="content" placeholder="Content">{{ $post->content }}</textarea>
        <input type="submit" value="Submit">
    </form>
@endsection
