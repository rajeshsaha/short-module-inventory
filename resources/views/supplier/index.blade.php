@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product Delivered</div>

                    <div class="card-body">

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-12">
                                        <!-- general form elements -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title"></h3>
                                                <h3 class="card-title"></h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                @if(count($products) != 0)
                                                    <table id="suppliedTable"
                                                           class="table table-bordered table-striped text-center table-responsive-xl">
                                                        <thead>
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>Photo</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Delivery date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($products as $key => $product)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $product->name }}</td>
                                                                <td>{{ Str::limit($product->description, 20) }}</td>
                                                                <td>
                                                                    @if(!is_null($product->photo))
                                                                        <img class="img-rounded"
                                                                             style="height:35px; width: 35px;"
                                                                             src="{{ asset("storage/".$product->photo) }}"
                                                                             alt="{{ $product->name }}">
                                                                    @endif
                                                                </td>

                                                                <td>{{ number_format($product->price, 2) }}</td>
                                                                <td>{{ $product->quantity }}</td>
                                                                <td>{{ date('M j, Y h:ia', strtotime($product->created_at) )}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    Didn't deliver any product yet!
                                                @endif
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!--/.col (left) -->

                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
