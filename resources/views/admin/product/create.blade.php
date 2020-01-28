@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.product.index') }}">All Products</a>
                    </div>

                    <div class="card-body">

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-12">
                                        <!-- general form elements -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Product entry</h3>
                                            </div>

                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form role="form" action="{{ route('admin.product.store') }}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Name</label>

                                                                <input type="text" class="form-control" name="name"
                                                                       value="{{ old('name') }}"
                                                                       placeholder="Enter Product Name">
                                                                {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea name="description" class="form-control"
                                                                          rows="2" cols="40"
                                                                          placeholder="Enter Product Description">{{ old('description') }}</textarea>
                                                                {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="photoInputFile">Product Photo</label>
                                                                <input type="file" name="photo" class=""
                                                                       id="photoInputFile">
                                                                {!! $errors->first('photo', '<p class="text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Price</label>
                                                                <input type="text" class="form-control"
                                                                       name="price"
                                                                       value="{{ old('price') }}"
                                                                       placeholder="Enter Price">
                                                                {!! $errors->first('price', '<p class="text-danger">:message</p>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Quantity</label>
                                                                <input type="text" class="form-control"
                                                                       name="quantity"
                                                                       value="{{ old('quantity') }}"
                                                                       placeholder="Enter Quantity">
                                                                {!! $errors->first('quantity', '<p class="text-danger">:message</p>') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Supplier Name</label>
                                                                <select name="supplier_id" class="form-control">
                                                                    <option value="" disabled selected>Select a
                                                                        Supplier
                                                                    </option>
                                                                    @foreach($suppliers as $supplier)
                                                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                {!!  $errors->first('supplier_id', '<p class="text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                                
                                                <button type="submit" class="btn btn-primary float-md-right">Add Product</button>
                                            </form>
                                            
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-link btn-md float-left">
                                                    <a href="{{ route('admin.product.index') }}">Cancel</a>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!--/.col (left) -->
                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
