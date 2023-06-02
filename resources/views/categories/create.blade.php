@extends('layouts.app')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('categories.store') }}" method="post" class="form-horizontal">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Category name</label>
                    <div class="col-sm-10">
                        <input autofocus type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}" placeholder="Category name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Create</button>
                <a href="{{ route('categories.index') }}"class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
