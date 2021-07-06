@extends('layouts.admin')

@section('title')
    <title>Edit Product</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
          
            <!-- TAMBAHKAN ENCTYPE="" KETIKA MENGIRIMKAN FILE PADA FORM -->
            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Produk</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>

                                 <div class="form-group">
                                    <label for="image">Foto Produk</label>
                                    <br>
                                    <!--  TAMPILKAN GAMBAR SAAT INI -->
                                    <img src="{{ asset('storage/products/' . $product->image) }}" width="100px" height="100px" alt="{{ $product->name }}">
                                    <hr>
                                    <input type="file" name="image" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>

                                 <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="price">Stock</label>
                                    <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                                    <p class="text-danger">{{ $errors->first('stock') }}</p>
                                </div>
                                <td> 
                                    <a href="/listproduct" class="btn btn-danger btn-sm">Back
                                        </a>
                                    <button class="btn btn-success btn-sm">Update</button>
                                 </td>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
