@extends('layouts.app')

@section('content')
<div class="row">

    <div class="card col-12">
        <div class="card-body">
            <a style="color:black" href="{{ route('user.questions.show', $question->id) }}">
                <h3>{{ $question->title }}</h3>
            </a>

          
            <p class="card-text">{{ $question->description }}</p>
        </div>
    </div>
    <div class="card col-12">
        <form action="{{ route('reply.store',$question->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Reply</label>
                    <textarea class="form-control" name="answer" required rows="3" placeholder="Enter your reply here..."></textarea>
                </div>
                @error('answer')
        <p class="text-danger">{{ $message }}</p>
    @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection