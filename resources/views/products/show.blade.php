@extends('layouts.admin')

@section('title')
    <title>Detail pesanan</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">View Order</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Detail Product
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Product Name</th>
                                            <td>{{$product->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Product Image</th>
                                            <td>
                                            	<img src="{{ asset('storage/products/' . $product->image) }}" width="200px" height="200px" alt="{{ $product->name }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>Rp {{ number_format($product->price) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Stock</th>
                                            <td>{{$product->stock}}</td>
                                        </tr>
                                    </table>
                                    <a href="/listproduct" class="btn btn-danger btn-sm">Back
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
