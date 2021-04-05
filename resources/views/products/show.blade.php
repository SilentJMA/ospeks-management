@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $product->name }}</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index')  }}">{{ ucfirst( Request::segment(1)) }}</a></li>
                    <li class="breadcrumb-item active">{{ $product->name }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6">
                    <div class="col-12"><img src="{{ $product->image }}" class="product-image" ></div>
        </div>
    <div class="col-md-6">
            <div class="card border-light mb-3">
                <div class="card-header bg-info text-white text-uppercase"><i class="fa fa-align-justify"></i> Details</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless mb-0">
                            <tbody>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Category</strong></th>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Price</strong></th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>SKU</strong></th>
                                <td>{{ $product->sku}}</td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Quantity</strong></th>
                                <td>{{ $product->quantity}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card border-light mb-3">
                <div class="card-header bg-secondary text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                <div class="card-body">
                    <p class="card-text">{{ $product->description }}</p>
                </div>
            </div>
        </div>
            <!-- Description -->
    </div>
@endsection
