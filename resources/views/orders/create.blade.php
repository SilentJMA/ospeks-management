@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add order</h1>
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
                    <li class="breadcrumb-item"><a href="{{route('orders.index')}}">{{ ucfirst( Request::segment(1)) }}</a></li>
                    <li class="breadcrumb-item active">{{ ucfirst( Request::segment(2)) }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add order</h3>
                </div>
                <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="mb-3">Supplier</h4>
                        <div class="form-group">
                            <label>Supplier</label>
                            <select name="supplier_id" class="form-control">
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @if($supplier->id == old('supplier_id')) selected @endif>{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr class="my-4">
                        <h4 class="mb-3">Product</h4>
                        <div class="row">
                            <div class="form-group col-md-4">
                            <label>Product Name</label>
                            <select name="product_id" class="form-control">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" @if($product->id == old('product_id')) selected @endif>{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input class="form-control" name="product_price" value="{{ old('product_price') }}" type="number" min="1" step="any" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Product Quantity</label>
                            <input class="form-control" name="product_quantity" value="{{ old('product_quantity') }}" type="number" min="1" step="any" />
                        </div>
                             </div>
                        <hr class="my-4">
                        <h4 class="mb-3">Shipping</h4>
                        <div class="row">
                        <div class="form-group  col-md-2">
                            <label>Shipping Method</label>
                            <select name="shipping_id" class="form-control">
                                @foreach($shippings as $shipping)
                                <option value="{{ $shipping->id }}" @if($shipping->id == old('shipping_method')) selected @endif>{{ $shipping->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Shipping Price</label>
                            <input class="form-control" name="shipping_cost" value="{{ old('shipping_cost') }}" type="number" min="1" step="any" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Shipping Country</label>
                            <input type="text" class="form-control" name="shipping_country" value="{{ old('shipping_country') }}" placeholder="Shipping Country" />
                        </div>
                        <div class="form-group  col-md-4">
                            <label for="exampleInputFile">Shipping Tracking</label>
                            <input type="url" class="form-control" name="shipping_tracking" value="{{ old('shipping_tracking') }}" />
                        </div>
                        </div>

                        <hr class="my-4">
                        <h4 class="mb-3">Order Preferences</h4>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Order Date:</label>
                                    <input type="date" name="order_date" class="form-control">
                            </div>
                        <div class="form-group col-md-4">
                            <label>Order Status</label>
                            <select name="status_id" class="form-control">
                                @foreach($status as $sta)
                                <option value="{{ $sta->id }}" @if($sta->id == old('status_id')) selected @endif>{{ $sta->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Order Note</label>
                            <textarea class="form-control" name ="note" rows="3" placeholder="Enter ..." id="ckeditor">{{ old(' note ') }}</textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success">Create</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>            <!-- /.row -->
        <!-- /.container-fluid -->
@endsection
