@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-2">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                    <a href="{{ route('meals') }}" class="list-group-item list-group-item-action">Display All Meals</a>
                    <a href="{{ route('meals.create') }}" class="list-group-item list-group-item-action">Create New Meal </a>
                    <a href="{{route("orders")}}" class="list-group-item list-group-item-action">User order</a>
                    </ul>
                </div> <!-- card-body -->
            </div><!-- card -->
        </div> <!-- col-md-3 -->

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Meals
                    <a href="{{ route('meals.create') }}">
                        <button class="btn btn-success" style="float: right">Add Meal</button>
                    </a>
                </div><!-- card-header -->

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                    <th scope="col">Phone/Email</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Meal</th>
                                    <th scope="col">S.Meal</th>
                                    <th scope="col">M.Meal</th>
                                    <th scope="col">L.Meal</th>
                                    <th scope="col">Total($)</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Accept</th>
                                    <th scope="col">Reject</th>
                                    <th scope="col">Order<br>Completed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)


                            <tr>
                                    <td scope="col">{{$order->user->name}}</td>
                                    <td scope="col">{{$order->phone}}/{{$order->user->email}}</td>
                                    <td scope="col">{{$order->date}}/{{$order->time}}</td>
                                    <td scope="col">{{$order->meal->name}}</td>
                                    <td scope="col">{{$order->small_meal}}</td>
                                    <td scope="col">{{$order->medium_meal}}</td>
                                    <td scope="col">{{$order->large_meal}}</td>
                                    <td scope="col">
                                        ${{ ($order->meal->small_meal_price * $order->small_meal) +
                                            ($order->meal->medium_meal_price * $order->medium_meal )+
                                            ($order->meal->large_meal_price * $order->large_meal)
                                        }}
                                    </td>
                                    <td scope="col">{{$order->body}}</td>
                                    <td scope="col">{{$order->status}}</td>
                                    <form action="{{ route('order.status', ['id'=>$order->id]) }}" method="POST">
                                    @csrf
                                    <td>
                                        <input type="submit" name="status" value="accepted" class="btn btn-primary btn-sm">
                                    </td>
                                    <td>
                                        <input type="submit" name="status" value="rejected" class="btn btn-danger btn-sm">
                                    </td>
                                    <td>
                                        <input type="submit" name="status" value="completed" class="btn btn-success btn-sm">
                                    </td>
                                    </form>
                            </tr>
   @endforeach

                        </tbody>
                    </table>

                </div><!-- card-body -->

            </div><!--  card -->
         </div><!--  col-md-9 -->

    </div><!-- row  -->
</div><!--  container-fluid -->
@endsection
