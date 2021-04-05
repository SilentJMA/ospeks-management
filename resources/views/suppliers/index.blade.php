@extends('app')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ ucfirst( Request::segment(1)) }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">{{ ucfirst( Request::segment(1)) }}</a></li>
            </ol>
        </div>
    </div>
    </div>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('suppliers.create') }}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add {{ ucfirst( Request::segment(1)) }}</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>URL</th>
                                    <th>Note</th>
                                    <th style="width: auto">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse( $suppliers as $supplier)
                                    <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>{{ $supplier->country }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->url }}</td>
                                    <td>{{ $supplier->note }}</td>
                                    <td class="project-actions text-center">
                                       <a class="btn btn-info btn-sm" href="{{ route('suppliers.edit', $supplier->id) }}">
                                           <i class="fas fa-pencil-alt"></i>Edit</a>
                                       <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display: inline">
                                           @method('DELETE')
                                           @csrf
                                       <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure ?')">
                                       </form>
                                    </td>
                                </tr>
                                @empty
                                    <td coclspan="4">No suppliers found</td>
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
