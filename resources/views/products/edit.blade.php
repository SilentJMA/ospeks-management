@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit {{ $product->name }}</h1>
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
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ ucfirst( Request::segment(1)) }}</a></li>
                    <li class="breadcrumb-item active">Edit : {{ $product->name }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit {{ ucfirst( Request::segment(1)) }}</h3>
                </div>
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}" />
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-z">
                                <label for="exampleInputEmail1">SKU</label>
                                <input type="text" class="form-control" name="sku" value="{{ $product->sku}}" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Price</label>
                                <input class="form-control" name="price" value="{{ $product->price }}" type="number" min="1" step="any" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name ="description" rows="3" placeholder="Enter ..." id="ckeditor">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="url" class="form-control" name="image" value="{{ $product->image }}" />
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary">Back</a>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>            <!-- /.row -->
        <!-- /.container-fluid -->
@endsection
