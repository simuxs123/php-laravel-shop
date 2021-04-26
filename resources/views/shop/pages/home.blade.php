@extends('shop/main')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="row">
        @forelse ($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{asset($product->path)}}" alt="">
                        <p class=" badge badge-pill badge-danger">{{$product->categories->name}}</p>
                        <div class="card-body">
                            <h4 class="card-title">
                                {{$product->title}}
                            </h4>
                            <div class="d-flex justify-content-between">
                                <h5>Kaina: {{number_format($product->price/100,2)}}Eur</h5>
                                <h6 class="text-secondary">Likutis: {{$product->quantity}}</h6>
                            </div>
                            <p class="card-text prod-content"> {{$product->content}}</p>
                            <a href="/product/{{$product->id}}" class="btn btn-sm btn-warning ">
                                <i class="material-icons">view_list</i> Plačiau</a>
                        </div>
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
