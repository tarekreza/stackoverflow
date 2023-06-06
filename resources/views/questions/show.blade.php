@extends('layouts.app')
@section('content')
<div class="row">

    <div class="card col-12">
        <div class="card-body">
            <h3>{{ $question->title }}</h3>
            <p class="card-text">{{ $question->description }}</p>
        </div>
    </div>
    @forelse ($answers as $answer)
        <div class="card col-12">
            <div class="card-body clearfix">
                <blockquote class="{{ $answer->is_correct==1 ? 'quote-success' : 'quote-secondary' }}">
                    <p>{{ $answer->answer }}</p>
                    <small>{{ $answer->user->username }}</small>
                </blockquote>
                @if ($answer->is_correct == 0)
                <a href="{{ route('correct.answer',$answer->id) }}">Correct answer</a>
                @endif
                <form class="text-right" action="{{ route('answer.destroy', $answer->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn  bg-gradient-danger " type="submit"
                        value="Delete">
                </form>
            </div>
        </div>
    @empty
    <div class="card col-12">
        <div class="card-body">
            <p class="card-text">Oops! It seems like this question has not received any answers yet. 😕 But don't worry, you can be the one to brighten someone's day by providing an answer! 🌟 </p>
        </div>
    </div>
    @endforelse


</div>
@endsection
