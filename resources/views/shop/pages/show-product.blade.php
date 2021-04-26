@extends('shop/main')
@section('content')

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 pt-5">
                            <img src="{{asset($product->path)}}" alt="">
                        </div>
                        <div class="col-md-6 pt-5">
                            <h4 class="card-title">{{$product->title}}</h4>
                            <p>{{$product->content}}</p>
                            <div class="product_meta">
                                <span class="posted_in"> <strong>Kategorija:</strong> <a rel="tag" href="/kategorija/{{$product->categories->name}}">{{$product->categories->name}}</a></span>
                            </div>
                            <div class="m-bot15"> <strong>Kaina : </strong> <span class="pro-price"> {{number_format($product->price/100,2)}}Eur</span></div>
                            <div class="form-group">
                                <span><strong>Kiekis: </strong>{{$product->quantity}}</span>
                            </div>
                            <p>
                                <a href="/checkout/{{$product->id}}" class="btn btn-round btn-danger" type="button"><i class="fa fa-shopping-cart"></i> Užsakyti</a>
                            </p>
                        </div>
                    </div>
                </div>

@endsection
