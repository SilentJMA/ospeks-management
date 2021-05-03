@extends('app')
@section('content')

    @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ ucfirst( Request::segment(1)) }}</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-1">
            <a class="btn btn-app" href="{{ route('orders.index') }}">
                <span class="badge bg-danger">{{ $orders }}</span>
                <i class="fas fa-shopping-basket"></i> Orders
            </a>
            <a class="btn btn-app" href="{{ route('products.index') }}">
                <span class="badge bg-teal">{{ $products }}</span>
                <i class="fas fa-layer-group"></i> Products
            </a>
            <a class="btn btn-app" href="{{ route('suppliers.index') }}">
                <span class="badge bg-success">{{ $suppliers }}</span>
                <i class="fas fa-warehouse"></i> Suppliers
            </a>
            <a class="btn btn-app" href="{{ route('categories.index') }}">
                <span class="badge bg-purple">{{ $categories }}</span>
                <i class="fas fa-object-group"></i> Categories
            </a>
            <!-- small box -->
        </div>
    </div>

    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Sales
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="revenue-chart-canvas" height="600" style="height: 300px; display: block; width: 770px;" width="1540" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
@endsection
