@csrf
<div class="form-group">
    <label for="title">Question title</label>
    <input
        type="text"
        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
        name="title"
        id="title"
        aria-describedby="helptitle"
        placeholder="Your question here"
        value="{{ old('title', $question->title) }}"
    >

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
    <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body" rows="10">{{ old('body', $question->body) }}</textarea>

    @if ( $errors->has('body') )
    <div class="invalid-feedback">
        <strong>{{ $errors->first('body') }}</strong>
    </div>
    @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-outline-success btn-lg">{{ $buttonText }}</button>
</div>
