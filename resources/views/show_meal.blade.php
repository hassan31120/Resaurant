@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Now</h3>
                    </div><!-- card-header -->

                    <div class="card-body">

                        @if (Auth::check())
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <p>Name  : {{ auth()->user()->name }}</p>
                            <p>Email : {{ auth()->user()->email }}</p>
                            <p>Phone Number : <input type="number" name="phone" class="form-control" required></p>

                            <p>Small Meal Order : <input type="number" name="small_meal" class="form-control" value="0"></p>
                            <p>Medium Meal Order : <input type="number" name="medium_meal" class="form-control" value="0"></p>
                            <p>Large Meal Order : <input type="number" name="large_meal" class="form-control" value="0"></p>

                            <p> <input type="hidden" name="meal_id"  value="{{ $meal->id }}"></p>

                            <p>Date : <input type="date" name="date" class="form-control" required></p>
                            <p>Time : <input type="time" name="time" class="form-control" required></p>

                            <p>Message : <textarea name="body" class="form-control"  rows="3"></textarea></p>
                            <button type="submit" class="btn btn-primary">Make Order</button>

                            @if (session('message'))
                            <div class="alert alert-success">
                                <h2>{{ session('message') }}</h2>
                            </div>
                        @endif

                        @if (session('errmessage'))
                            <div class="alert alert-danger">
                                <h2>{{ session('errmessage') }}</h2>
                            </div>
                        @endif
                        </form>
                        @else
                        <p class="text-center"><a href="/login" class="btn btn-danger">Login To Make Order</a></p>
                        @endif


                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- 4 -->

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Meal</h3>
                    </div><!-- card-header -->

                    <div class="card-body">

 <img src=" {{ Storage::url($meal->image) }}" class="img-thumbnail w-100">
    <h3>{{ $meal->name }}</h3>
    <p>{{ $meal->description }}</p>
    <p class="badge bg-secondary">{{ $meal->category }}</p>
    <p class="lead">small meal price : {{ $meal->small_meal_price }}</p>
    <p class="lead">medium meal price : {{ $meal->medium_meal_price }}</p>
    <p class="lead">large meal price : {{ $meal->large_meal_price }}</p>
                        </div><!-- row -->
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- 8 -->



        </div><!-- row -->
    </div><!-- container -->
@endsection
