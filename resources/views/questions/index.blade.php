@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-1">
                <div class="card-header">All Questions <span class="order-1"></span></div>

                <div class="card-body">
                    @foreach ($questions as $question)
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mt-0">{{ $question->title }}</h3>
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
