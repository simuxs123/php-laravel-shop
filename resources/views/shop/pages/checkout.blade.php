@extends('shop/main')
@section('content')
<div class="text-center">
    <img class="d-block mx-auto mb-4" src="{{asset('img/logo.png')}}" alt="" width="72" height="72">
    <h2>Užsakymo forma</h2>
</div>
@if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif
<div class="row pb-5">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Krepšelis</span>
            <span class="badge badge-secondary badge-pill">1</span>
        </h4>
        <ul class="list-group mb-3 sticky-top">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0 text-capitalize">{{$product->title}}</h6>
                    <small class="text-muted">{{$product->title}}</small>
                </div>
                <span class="text-muted">{{number_format($product->price/100,2)}}Eur</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Kaina</span>
                <strong>{{number_format($product->price/100,2)}}Eur</strong>
            </li>
        </ul>
    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Užsakymo adresas</h4>
        <form class="needs-validation" novalidate="" method="post" action="/storeorder/{{$product->id}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Vardas</label>
                    <input type="text" class="form-control" id="firstName" name="vardas" placeholder="" value="" required="">
                    <div class="invalid-feedback"> Blogai įvestas vardas </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Pavardė</label>
                    <input type="text" class="form-control" id="lastName" name="pavarde" placeholder="" value="" required="">
                    <div class="invalid-feedback"> Blogai įvesta pavardė </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="" required="" placeholder="you@example.com">
                <div class="invalid-feedback"> Įveskite teisingą el. paštą </div>
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="adresas" placeholder="1234 Main St" required="">
                <div class="invalid-feedback"> Įveskite pristatymo adresą </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Užsakyti</button>
        </form>
    </div>
</div>

@endsection
