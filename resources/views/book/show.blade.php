@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex justify-content-between align-items-center">
            <h1>Detail Book</h1>
        </div>
        <form action="javascript:void(0)">
            @if($book->cover)
                <div class="mb-3 d-flex justify-content-center">
                    <img src="{{ asset('storage/image/book/'.$book->cover) }}" class="figure-img img-fluid rounded" width="400px" alt="Image">
                </div>
            @endif
            <div class="mb-3">
                <label for="titleBook" class="form-label">Title <span class="dot">*</span></label>
                <input type="text" class="form-control" name="title" id="titleBook" value="{{ $book->title }}" readonly>
            </div>
            <div class="mb-3">
                <label for="publishYearBook" class="form-label">Publish Year <span class="dot">*</span></label>
                <input type="text" class="form-control" name="publish_year" id="publishYearBook" value="{{ $book->publish_year }}" readonly>
            </div>
            <div class="mb-3">
                <label for="publisherBook" class="form-label">Publisher <span class="dot">*</span></label>
                <input type="text" class="form-control" name="publisher" id="publisherBook" value="{{ $book->publisher }}" readonly>
            </div>
        </form>
    </div>
@endsection