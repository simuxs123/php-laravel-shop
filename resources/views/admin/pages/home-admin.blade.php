@extends('admin/main-admin')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Komponentai</span>
            <h3 class="page-title">Produktų sąrašas</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        @forelse ($products as $product)
            <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-small card-post card-post--1">
                    <div class="card-post__image" style="background-image: url('{{asset($product->path)}}');">
                        <p class="card-post__category badge badge-pill badge-danger">{{$product->categories->name}}</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-fiord-blue" href="/product/{{$product->id}}">{{$product->title}}</a>
                        </h5>
                        <p class="card-text d-inline-block mb-3 prod-content">{{$product->content}}</p>

                    </div>
                    <div class="text-center pb-3">
                        <a type="submit" href="/admin-update/{{$product->id}}" class="btn btn-sm btn-warning ">
                            <i class="material-icons">upgrade</i> Update</a>
                        <a type="submit" href="/delete/{{$product->id}}" class="btn btn-sm btn-danger ">
                            <i class="material-icons">delete</i> Delete</a>
                    </div>
                    <div><small class="text-muted p-2">{{$product->created_at}}</small></div>
                </div>
            </div>
        @empty
            <p class="bg-danger text-white p-1">Šiuo metu neturite produktų. Prašome pridėti <a class="font-weight-bold text-white" href="/admin-add">ČIA</a></p>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
