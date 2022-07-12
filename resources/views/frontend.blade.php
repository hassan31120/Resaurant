@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Menu</h3>
                    </div><!-- card-header -->

                    <div class="card-body">

                        <form action="" method="get">
                            <div class="list-group">
                                <a href="/" class="list-group-item list-group-item-action"> All Categories</a>

                                <input type="submit" name="category" value="shawarma"
                                    class="list-group-item list-group-item-action">
                                <input type="submit" name="category" value="burger"
                                    class="list-group-item list-group-item-action">
                                <input type="submit" name="category" value="pizza"
                                    class="list-group-item list-group-item-action">

                            </div>
                        </form>


                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- 4 -->

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">

                        <h3> Meals : ( {{ count($meals) }} )</h3>

                    </div><!-- card-header -->

                    <div class="card-body">
                        <div class="row">
                            @forelse ($meals as $meal)
                    <div class="col-md-4 mt-2 text-center" >
                        <img src=" {{ Storage::url($meal->image) }}" class="img-thumbnail w-100">
                            <h3 class="mt-2">{{ $meal->name }}</h3>
                            <p>{{ $meal->description }}</p>
                        <a href="{{ route('meal.show', ['id'=>$meal->id] ) }}">
                             <button class="btn btn-danger mb-1"> Order Now </button>
                        </a>
                    </div><!--  -->
                            @empty
                                <div class="alert alert-danger text-center">
                                    <h1>No meals</h1>
                                </div>
                            @endforelse
                        </div><!-- row -->
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- 8 -->



        </div><!-- row -->
    </div><!-- container -->
@endsection
