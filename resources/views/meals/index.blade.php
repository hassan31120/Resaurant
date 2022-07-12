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
                        <a href="" class="list-group-item list-group-item-action">User Order</a>

                      </div>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- 3 -->

        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center">
                    @if (session('message'))
                    <div class="alert alert-success">
                        <h2>{{ session('message') }}</h2>
                    </div>
                    @endif
                </div><!-- card-header -->

                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>S.Price</th>
                                <th>M.Price</th>
                                <th>L.Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
@if(count($meals) > 0)
@foreach ($meals as $key => $meal)
<tr>
    <td>{{$key+1}}</td>
    <td><img src="{{ Storage::url($meal->image) }}" width="80" height="50" alt=""></td>
    <td>{{$meal->name}}</td>
    <td>{{$meal->description}}</td>
    <td>{{$meal->category}}</td>
    <td>{{$meal->small_meal_price}}</td>
    <td>{{$meal->medium_meal_price}}</td>
    <td>{{$meal->large_meal_price}}</td>
    <td> <a href="{{ route('meals.edit', ['id'=>$meal->id]) }}"><i class="fa fa-edit"></i></a></td>

    <td>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$meal->id}}">
            <i class="fa fa-trash"></i>
          </button>
    </td>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $meal->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('meals.delete', ['id' => $meal->id]) }}"
        method="post">
        @csrf
        @method('DELETE')

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div><!-- modal-header -->

                  <div class="modal-body">
                    <h1 class="text-center text-danger">Are You Sure?</h1>
                  </div><!-- modal-body -->

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </div><!--  modal-footer -->

            </div><!--  modal-content -->
        </div><!-- modal-dialog -->
    </form>
</div><!-- modal -->

</tr>
@endforeach
@else
    <div class="alert alert-danger text-center">
    <h2>No Meals To Show</h2>
    </div>
@endif


</tbody>
</table>

{{ $meals->links() }}

</div><!-- card-body -->
</div><!-- card -->
</div><!-- 9 -->



</div><!-- row -->
</div><!-- container -->
@endsection
