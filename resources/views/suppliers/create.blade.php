@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add {{ ucfirst( Request::segment(1)) }}</h1>
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
                    <li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">{{ ucfirst( Request::segment(1)) }}</a></li>
                    <li class="breadcrumb-item active">{{ ucfirst( Request::segment(2)) }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add {{ ucfirst( Request::segment(1)) }}</h3>
                </div>
                <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter address" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input class="form-control" name="email" value="{{ old('email') }}" type="email"  />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Country</label>
                            <input type="country" class="form-control" name="country" value="{{ old('country') }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">URL</label>
                            <input type="url" class="form-control" name="url" value="{{ old('url') }}" />
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" name ="note" rows="3" placeholder="Enter ...">{{ old('address') }}</textarea>
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
