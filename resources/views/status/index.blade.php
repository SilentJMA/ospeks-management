@extends('app')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Stauts</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('status.index') }}">{{ ucfirst( Request::segment(1)) }}</a></li>
            </ol>
        </div>
    </div>
    </div>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('status.create') }}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add {{ ucfirst( Request::segment(1)) }}</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse( $status as $st)
                                    <tr>
                                    <td>{{ $st->name }}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('status.edit', $st->id) }}">
                                            <i class="fas fa-pencil-alt"></i>Edit</a>
                                        <form action="{{ route('status.destroy', $st->id) }}" method="POST" style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure ?')">
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <td coclspan="4">No status found</td>
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
