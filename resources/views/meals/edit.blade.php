@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Menu</h3>
                </div><!-- card-header -->

                <div class="card-body">
                    <div class="list-group">

                        <a href="{{ route('meals') }}" class="list-group-item list-group-item-action">Display All Meals</a>
                        <a href="{{ route('meals.create') }}" class="list-group-item list-group-item-action">Create New Meal</a>

                      </div>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- 3 -->

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                   <h3>Edit Meal</h3>
                </div><!-- card-header -->

                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form action="{{ route('meals.update', ['id'=>$meal->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label>Name Of Meal</label>
                            <input type="text" value="{{ $meal->name }}" class="form-control form-control-lg" name="name" placeholder="Name Of Meal">
                        </div><!-- Name Of Meal -->

                        <div class="form-group  mb-3">
                            <label>Description Of Meal</label>
                            <textarea name="description" class="form-control form-control-lg" placeholder="Name Of Meal" rows="5">{{ $meal->description }}</textarea>
                        </div><!-- Description Of Meal -->

                        <div class="form-inline  mb-3">
                            <label> Meals Price(LE) </label>
                            <input type="number" value="{{ $meal->small_meal_price }}"  name="small_meal_price" placeholder="Small Meal Price">
                            <input type="number"  value="{{ $meal->medium_meal_price }}"  class="mx-3" name="medium_meal_price" placeholder="Medium Meal Price">
                            <input type="number" value="{{ $meal->large_meal_price }}"  name="large_meal_price" placeholder="Large Meal Price">
                        </div><!-- Meals Price   -->

                        <div class="form-group mb-3">
                            <label>Meal Category</label>
                            <select name="category" class="form-control form-control-lg"  >
                                <option value="{{ $meal->category }}"> {{ $meal->category }} </option>
                                <option value="shawarma">Shawarma</option>
                                <option value="burger">Burger</option>
                                <option value="pizza">Pizza</option>
                            </select>
                        </div><!-- Category Of Meal -->

                        <div class="form-group mb-3">
                            <label>Meal Image </label>
                            <input type="file" class="form-control form-control-lg form-control-file" name="image">
                            <img src="{{ Storage::url( $meal->image )}} " width="80" alt="">
                        </div><!--  Meal Image -->

                        <div class="form-group text-center d-grid">

                            <button type="submit" class="btn btn-lg btn-danger" > Save </button>
                        </div><!--  Meal Image -->
                    </form>

                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- 9 -->

    </div><!-- row -->
</div><!-- container -->
@endsection
