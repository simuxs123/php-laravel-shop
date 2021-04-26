@extends('shop/main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Patvirtink savo el. paštą) }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Naujas patvirtinimo linkas buvo išsiųstas i jūsų paštą') }}
                        </div>
                    @endif

                    {{ __('Prieš tęsdami, patikrinkite el. paštą į kurį turėjote gauti patvirtinimo laišką') }}
                    {{ __('Jeigu negavote laiško') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
