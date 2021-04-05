@extends('app')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit {{ $shipping->name }} </h3>
                </div>
                <form action="{{ route('shippings.update', $shipping->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="name" class="form-control">
                                <option value="{{ $shipping->name }}" selected> Current : {{ $shipping->name }}</option>
                                <option value="dhl">DHL</option>
                                    <option value="ups">UPS</option>
                                    <option value="fedex">Fedex</option>
                                    <option value="tnt">TNT</option>
                            </select>
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
