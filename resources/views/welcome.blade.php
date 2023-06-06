@extends('layouts.home')

@section('home.content')
    <div class="row">

        <div class="col-sm-6">
            <form action="{{ route('filterByCategory') }}" method="post" class="form-horizontal col-sm-12">
                @csrf
                <div class="form-group row">
                    <label for="category" class="col-sm-3 col-form-label">Filter by category</label>
                    <div class="col-sm-6">
                        <select name="category_id" class="form-control ">
                            <option selected>All category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2 ml-auto">
            <a href="{{ route('user.questions.create') }}" class="btn btn-block btn-primary float-end">Ask
                Question</a>
        </div>
        @forelse ($questions as $question)
            <div class="card col-12">
                <div class="card-body">
                    <a style="color:black" href="{{ route('questionShow', $question->id) }}">
                        <p class="card-text">{{ Str::words($question->title, 20, '...') }}</p>
                    </a>
                    <br>
                    <p><small>category : {{ $question->category->name }}</small></p>
                    <a href="{{ route('answers.create', $question->id) }}" class="card-link">Reply</a>
                </div>
            </div>
        @empty
            <div class="card col-12">
                <div class="card-body">
                    <h5 class="card-title">There are no questions right now.</h5>
                </div>
            </div>
        @endforelse

        {{ $questions->links() }}

    </div>
    <!-- /.row -->

@endsection
