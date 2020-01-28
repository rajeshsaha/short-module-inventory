@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif

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
                                                <h3 class="card-title"><a href="{{ route( 'admin.product.create' ) }}">Add
                                                        Product</a></h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                @if(count($products) != 0)
                                                    <table id="productTable"
                                                           class="table table-bordered table-striped text-center table-responsive-xl">
                                                        <thead>
                                                        @if(isset($supplier_name)) <p>All products from supplier:
                                                            <b>{{ $supplier_name }}</b><p/>
                                                        @endif
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>Photo</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Supplier</th>
                                                            <th>Added Date</th>
                                                            <th>Actions</th>
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
                                                                <td>
                                                                    <a href="{{ url('admin/product/supplier/' . $product->supplier_id) }}"
                                                                       title="View all products of this Supplier">
                                                                        @if(isset($product->supplier_name)){{ $product->supplier_name }} @else {{ $supplier_name }} @endif </a>
                                                                </td>
                                                                <td>{{ date('M j, Y h:ia', strtotime($product->created_at)) }}</td>
                                                                <td>...</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>

                                                    </table>
                                                @else
                                                    Didn't create any product yet!
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
