@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex justify-content-between align-items-center">
            <h1>Edit Book</h1>
        </div>
        <form method="POST" action="{{route('book.update', $book->id)}}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="coverBook" class="form-label">Cover</label>
                <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" id="coverBook">
                @error('cover')
                    <div id="coverBook" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titleBook" class="form-label">Title <span class="dot">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="titleBook" value="{{ old('title', $book->title) }}" required>
                @error('cover')
                    <div id="coverBook" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="publishYearBook" class="form-label">Publish Year <span class="dot">*</span></label>
                <input type="text" class="form-control @error('publish_year') is-invalid @enderror" name="publish_year" id="publishYearBook" value="{{ old('publish_year', $book->publish_year) }}" required>
                @error('publish_year')
                    <div id="coverBpublishYearBookook" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="publisherBook" class="form-label">Publisher <span class="dot">*</span></label>
                <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" id="publisherBook" value="{{ old('publisher', $book->publisher) }}" required>
                @error('publisher')
                    <div id="publisherBook" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection