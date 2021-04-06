@extends('app')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                                    <small class="float-right">Date: {{ $order->order_date }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>{{ $order->supplier->name }}</strong><br>
                                    {{ $order->supplier->address }}<br>
                                    Phone: {{ $order->supplier->phone }}<br>
                                    Email: {{ $order->supplier->email }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>Brand Name</strong><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Order ID:</b> {{ $order->id }}<br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>SKU #</th>
                                        <th>Description</th>
                                        <th>Unit Price</th>
                                        <th>Shipping Carrier</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $order->product_quantity }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>{{ $order->product->sku }}</td>
                                        <td>{{ $order->product->description }}</td>
                                        <td>{{ $order->product_price }} <i class="fas fa-euro-sign"></i></td>
                                        <td>{{ $order->shipping->name }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Shipping Methods:</p><br>
                                <i class="fab fa-{{ $order->shipping->name }} fa-5x"></i>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Amount Due Date</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Quantity :</th>
                                            <td>{{ $order->product_quantity}}</td>
                                        </tr>
                                        <tr>
                                            <th>Price :</th>
                                            <td>{{ $order->product_price}} <i class="fas fa-euro-sign"></i></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>{{ $order->shipping_cost}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>{{ ($order->product_quantity*$order->product_price) + $order->shipping_cost}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="button" class="btn btn-success float-right"><i class="fas fa-print"></i> Print Payment</button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
@endsection
