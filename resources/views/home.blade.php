@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(auth()->user()->user_type == 1)
                            <a href="{{ route('admin.product.index') }}">Products</a>
                        @elseif(auth()->user()->user_type == 2)
                            <a href="{{ route('delivered') }}">Product Delivered</a>
                        @else
                            You are logged in!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
