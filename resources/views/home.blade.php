@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"> <h2>Your Order History</h2> </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Phone/Email</th>
                                <th>Date/Time </th>
                                <th>Meal</th>
                                <th>S.Meal</th>
                                <th>M.Meal</th>
                                <th>L.Meal</th>
                                <th>Total($)</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }} <br> {{ $order->user->phone }} </td>
                                    <td>{{ $order->date }} <br> {{ $order->time }} </td>
                                    <td>{{ $order->meal->name }}  </td>
                                    <td>{{ $order->small_meal}}  </td>
                                    <td>{{ $order->medium_meal }}</td>
                                    <td>{{ $order->large_meal }}</td>
                                    <td> ${{ ($order->meal->small_meal_price * $order->small_meal)  +
                                        ($order->meal->medium_meal_price * $order->medium_meal)  +
                                        ($order->meal->large_meal_price * $order->large_meal) }}</td>

                                        <td scope="col">{{ $order->body }}</td>
                                        <td scope="col">{{ $order->status }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-12 -->
    </div>
</div>
@endsection
