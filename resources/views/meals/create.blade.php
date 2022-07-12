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
                   <h3>New Meal</h3>
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

                    <form action="{{ route('meals.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Name Of Meal</label>
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Name Of Meal">
                        </div><!-- Name Of Meal -->

                        <div class="form-group  mb-3">
                            <label>Description Of Meal</label>
                            <textarea name="description" class="form-control form-control-lg" placeholder="Description Of Meal" rows="5"></textarea>
                        </div><!-- Description Of Meal -->

                        <div class="form-inline  mb-3">
                            <label> Meals Price(LE) </label>
                            <input type="number"  name="small_meal_price" placeholder="Small Meal Price">
                            <input type="number"  class="mx-3" name="medium_meal_price" placeholder="Medium Meal Price">
                            <input type="number"  name="large_meal_price" placeholder="Large Meal Price">
                        </div><!-- Meals Price   -->

                        <div class="form-group mb-3">
                            <label>Meal Category</label>
                            <select name="category" class="form-control form-control-lg"  >
                                <option></option>
                                <option value="shawarma">Shawarma</option>
                                <option value="burger">Burger</option>
                                <option value="pizza">Pizza</option>
                            </select>
                        </div><!-- Category Of Meal -->

                        <div class="form-group mb-3">
                            <label>Meal Image </label>
                            <input type="file" class="form-control form-control-lg form-control-file" name="image">
                        </div><!--  Meal Image -->

                        <div class="form-group text-center d-grid">

                            <button type="submit" class="btn btn-lg btn-primary" > Save </button>
                        </div><!--  Meal Image -->

                    </form>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- 9 -->

    </div><!-- row -->
</div><!-- container -->
@endsection
