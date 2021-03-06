@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-1">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>

                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @foreach ($questions as $question)
                    <div class="media mb-2">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{ $question->votes }}</strong> {{ str_plural('vote', $question->votes) }}
                            </div>
                            <div class="status {{ $question->status }}">
                                <strong>{{ $question->answers_count }}</strong> {{ str_plural('answer', $question->answers_count) }}
                            </div>
                            <div class="view">
                                {{ $question->views . ' ' . str_plural('view', $question->views) }}
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                <div class="ml-auto">

                                    @can('update', $question)
                                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info mr-1">Edit</a>
                                    @endcan

                                    @can('delete', $question)
                                        <form action="{{ route('questions.destroy', $question->id) }}" method="post" class="form-delete">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger mr-1" onclick="return confirm('Are you sure you want to delete question with title:\n{{ $question->title }}');">Delete</button>
                                        </form>
                                    @endcan

                                </div>
                            </div>
                            <p class="lead">
                                Asked by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                <small class="text-muted">{{ $question->created_date }}</small>
                            </p>
                            {{ str_limit($question->body, 100) }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{ $questions->links() }}
        </div>
    </div>
</div>
@endsection
