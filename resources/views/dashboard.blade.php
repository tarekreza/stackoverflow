@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalUser }}</h3>

                    <p>User Registered</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalCategory }}</h3>

                    <p>Category Created</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalQuestion }}</h3>

                    <p>Question submitted</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('questions.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
