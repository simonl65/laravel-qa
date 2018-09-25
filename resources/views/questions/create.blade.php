@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-1">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Question</h2>

                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to All Questions</a>
                        </div>
                    </div>{{--d-flex --}}
                </div>{{-- card-header --}}

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="title">Question title</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" aria-describedby="helptitle" placeholder="Your question here" value="{{ old('title') }}">

                            @if ( $errors->has('title') )
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @else
                                <small id="helptitle" class="form-text text-muted">Keep it short!</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="body">Your question</label>
                            <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body" rows="10">{{ old('body') }}</textarea>

                            @if ( $errors->has('body') )
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success btn-lg">Ask the question</button>
                        </div>
                    </form>
                </div>{{-- card-body --}}
            </div>{{-- card --}}
        </div>{{-- col --}}
    </div>{{-- row --}}
</div>{{-- container --}}
@endsection
