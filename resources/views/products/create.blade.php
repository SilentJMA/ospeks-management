@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add product</h1>
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
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">{{ ucfirst( Request::segment(1)) }}</a></li>
                    <li class="breadcrumb-item active">{{ ucfirst( Request::segment(2)) }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add product</h3>
                </div>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name" />
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">SKU</label>
                                <input type="text" class="form-control" name="sku" value="{{ old('sku') }}" placeholder="SKU"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Price</label>
                                <input class="form-control" name="price" value="{{ old('price') }}" type="number" min="1" step="any" placeholder="Price" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" placeholder="Quantity"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name ="description" rows="3" placeholder="Description ..." id="ckeditor">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="url" class="form-control" name="image" value="{{ old('image') }}" placeholder="Image Link"/>
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
