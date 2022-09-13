@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex justify-content-between align-items-center">
            <h1>Books</h1>
            <a href="{{route('book.create')}}" class="btn btn-primary">Add Book</a>
        </div>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <td>Cover</td>
                <td>Title</td>
                <td>Publish Year</td>
                <td>Publisher</td>
                <td>Actions</td>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach($books as $book)
                <tr>
                    <td>{{ $i }}</td>
                    <td>
                        @if($book->cover)
                            <img src="{{ asset('storage/image/book/'.$book->cover) }}" class="figure-img img-fluid rounded" width="400px" alt="Image">
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->publish_year }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td class="t-actions">
                        <form action="{{ route('book.destroy', $book) }}" method="POST">
                            @csrf @method('DELETE')
                            <a href="{{ route('book.show', $book->id) }}" class="btn btn-light">Detail</a>
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-secondary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </table>
    </div>
@endsection