@extends('layouts.admin')

@section('title')
    <title>List Product</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                List Product
                               
                            </h4>
                        </div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                             <form method="GET" action="/listproduct">
                                <div class="input-group mb-3 col-md-3 float-right">
                                    <input name="q" type="text" value="" class="form-control" placeholder="Search Product">
                                        <div class="input-group-append">
                                            <input type="submit" value="Search" class="btn btn-primary">
                                        </div> 
                                </div>                             
                            </form>     
                            <br/><br/><br/>
                            <div class="table-responsive">
                                 <div class="float-right">
                                    <a href="/products/create" class="btn btn-success btn-sm">Add Product</a>
                                </div>
                                <p><font color="red"><b>Total Product : {{ $product->total() }}</font></b></p>
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=$product->firstItem(); ?>
                                        @foreach ($product as $row)
                                        <tr>
                                           <td>{{ $no }}</td>
                                            <td> {{$row->name}}</td>
                                             <td>
                                                <img src="{{ asset('storage/products/' . $row->image) }}" width="100px" height="100px" alt="{{ $row->name }}">  
                                            </td>
                                            <td>Rp {{ number_format($row->price) }}</td>
                                            <td>{{ $row->stock}}</td>
                                            <td> 
                                                 <a href="/products/{{$row->id}}/show" class="btn btn-info btn-sm">Show
                                                </a>
                                                <a href="/products/{{$row->id}}/edit" class="btn btn-warning btn-sm">Edit
                                                </a>
                                                <a href="/products/{{$row->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus {{$row->name}}?')">Delete
                                                </a>

                                            </td>
                                        </tr>

                                        <?php $no++ ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                            <tr>
                                                <td colspan="10">
                                                    {{$product->appends(Request::all())->links()}}
                                                </td>
                                            </tr>
                                     </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection