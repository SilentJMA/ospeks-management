@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit {{ $supplier->name }}</h1>
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
                    <li class="breadcrumb-item"><a href="/suppliers">{{ ucfirst( Request::segment(1)) }}</a></li>
                    <li class="breadcrumb-item active">Edit : {{ $supplier->name }}</li>
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
                <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $supplier->name }}" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name ="address" rows="3" placeholder="Enter ...">{{ $supplier->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Country</label>
                            <input type="text" class="form-control" name="country" value="{{ $supplier->country}}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input class="form-control" name="phone" value="{{ $supplier->phone }}" type="tel" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $supplier->email }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">URL</label>
                            <input type="url" class="form-control" name="url" value="{{ $supplier->url }}" />
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" name ="note" rows="3" placeholder="Enter ...">{{ $supplier->note }}</textarea>
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
