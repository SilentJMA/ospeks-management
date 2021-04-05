@extends('app')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>orders</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('orders.index')}}">{{ ucfirst( Request::segment(1)) }}</a></li>
            </ol>
        </div>
    </div>
    </div>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('orders.create') }}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add {{ ucfirst( Request::segment(1)) }}</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Order Total - <i class="fas fa-euro-sign"></i></th>
                                    <th>Supplier</th>
                                    <th>Country</th>
                                    <th>Carrier</th>
                                    <th>Note</th>
                                    <th style="width: auto">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse( $orders as $order)
                                    <tr>
                                    <td>{{ $order->product_name }}</td>
                                    <td>{{ $order->product_quantity }}</td>
                                    <td>{{ $order->product_price * $order->product_quantity}}</td>
                                    <td>{{ $order->supplier_name }}</td>
                                    <td>{{ $order->shipping_country }}</td>
                                    <td><i class="fab fa-{{ $order->shipping_method }} fa-3x"></i></td>
                                    <td>{{ $order->note }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('orders.show', $order->id) }}"><i class="fas fa-folder"></i> View</a>
                                        <a class="btn btn-info btn-sm" href="{{ route('orders.edit', $order->id) }}">
                                            <i class="fas fa-pencil-alt"></i>Edit</a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure ?')">
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <td coclspan="4">No orders found</td>
                                @endforelse
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        <!-- /.container-fluid -->
@endsection
