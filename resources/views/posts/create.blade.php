@extends('posts.layout')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <input type="text" name="subject" placeholder="Subject">
        <textarea name="content" placeholder="Content"></textarea>
        <input type="submit" value="Submit">
    </form>
@endsection
