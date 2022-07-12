@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"> <h2>Customers</h2> </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Member Since </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($customer->create_at)->format('d M Y')}}</td>

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
