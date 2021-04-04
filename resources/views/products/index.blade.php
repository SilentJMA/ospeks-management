@extends('app')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Products</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">{{ ucfirst( Request::segment(1)) }}</a></li>
            </ol>
        </div>
    </div>
    </div>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('products.create') }}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add {{ ucfirst( Request::segment(1)) }}</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>SKU</th>
                                    <th>Price - <i class="fas fa-euro-sign"></i></th>
                                    <th>Quantity</th>
                                    <th style="width: auto">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse( $products as $product)
                                    <tr>
                                    <td><img src="{{ $product->image }}" title="{{ $product->name }}" alt="{{ $product->name }}" width="50" height="50"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('products.show', $product->id) }}"><i class="fas fa-folder"></i> View</a>
                                        <a class="btn btn-info btn-sm" href="{{ route('products.edit', $product->id) }}">
                                            <i class="fas fa-pencil-alt"></i>Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure ?')">
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <td coclspan="4">No products found</td>
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
