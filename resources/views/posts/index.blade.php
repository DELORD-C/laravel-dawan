@extends('posts.layout')

@section('content')
    <h2>Laravel App - Dawan</h2>
    <a href="{{ route('posts.create') }}">Create a new Post</a>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <table>
        <tr>
            <th>Id</th>
            <th>Subject</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->subject }}</td>
            <td>{{ $post->user->name }}</td>
            <td>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
