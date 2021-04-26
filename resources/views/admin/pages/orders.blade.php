@extends('admin/main-admin')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Užsakymai</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Nauji užsakymai</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0">Vardas</th>
                            <th scope="col" class="border-0">Pavardė</th>
                            <th scope="col" class="border-0">El. paštas</th>
                            <th scope="col" class="border-0">Adresas</th>
                            <th scope="col" class="border-0">Kaina</th>
                            <th scope="col" class="border-0">Produktas</th>
                            <th scope="col" class="border-0">Statusas</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($orders[1])
                        @foreach ($orders[1] as $key=> $order)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->surname}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{number_format($order->total_price/100,2)}}Eur</td>
                                <td class="text-capitalize">{{$order->product->title}}</td>
                                <td class="d-flex">
                                    <form method="post" action="{{ route('updateStatus', ['id'=>$order->id]) }}" class="mr-1">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pav" value="new">
                                        <input type="submit" class="btn btn-primary px-2 py-1" value="N">
                                    </form>
                                    <form method="post" action="{{ route('updateStatus', ['id'=>$order->id]) }}" class="mr-1">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pav" value="prepare">
                                        <input type="submit" class="btn btn-warning px-2 py-1" value="R">
                                    </form>
                                    <form method="post" action="{{ route('updateStatus', ['id'=>$order->id]) }}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pav" value="sent">
                                        <input type="submit" class="btn btn-success px-2 py-1" value="I">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->
    <!-- Default Dark Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small overflow-hidden mb-4">
                <div class="card-header bg-dark">
                    <h6 class="m-0 text-white">Ruošiami užsakymai</h6>
                </div>
                <div class="card-body p-0 pb-3 bg-dark text-center">
                    <table class="table table-dark mb-0">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0">Vardas</th>
                            <th scope="col" class="border-0">Pavardė</th>
                            <th scope="col" class="border-0">El. paštas</th>
                            <th scope="col" class="border-0">Adresas</th>
                            <th scope="col" class="border-0">Kaina</th>
                            <th scope="col" class="border-0">Produktas</th>
                            <th scope="col" class="border-0">Statusas</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($orders[2])
                            @foreach ($orders[2] as $key=> $order)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->surname}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{number_format($order->total_price/100,2)}}Eur</td>
                                    <td class="text-capitalize">{{$order->product->title}}</td>
                                    <td class="d-flex">
                                        <form method="post" action="{{ route('updateStatus', ['id'=>$order->id]) }}" class="mr-1">
                                            {{csrf_field()}}
                                            <input type="hidden" name="pav" value="new">
                                            <input type="submit" class="btn btn-primary px-2 py-1" value="N">
                                        </form>
                                        <form method="post" action="{{ route('updateStatus', ['id'=>$order->id]) }}" class="mr-1">
                                            {{csrf_field()}}
                                            <input type="hidden" name="pav" value="prepare">
                                            <input type="submit" class="btn btn-warning px-2 py-1" value="R">
                                        </form>
                                        <form method="post" action="{{ route('updateStatus', ['id'=>$order->id]) }}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="pav" value="sent">
                                            <input type="submit" class="btn btn-success px-2 py-1" value="I">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Išsiųsti užsakymai</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0">Vardas</th>
                            <th scope="col" class="border-0">Pavardė</th>
                            <th scope="col" class="border-0">El. paštas</th>
                            <th scope="col" class="border-0">Adresas</th>
                            <th scope="col" class="border-0">Kaina</th>
                            <th scope="col" class="border-0">Produktas</th>
                            <th scope="col" class="border-0">Statusas</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($orders[3])
                        @foreach ($orders[3] as $key=> $order)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->surname}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{number_format($order->total_price/100,2)}}Eur</td>
                                <td class="text-capitalize">{{$order->product->title}}</td>
                                <td class="d-flex">
                                    <form method="post" action="{{ route('updateStatus', ['id'=>$order->id]) }}" class="mr-1">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pav" value="new">
                                        <input type="submit" class="btn btn-primary px-2 py-1" value="N">
                                    </form>
                                    <form method="post" action="{{ route('updateStatus', ['id'=>$order->id]) }}" class="mr-1">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pav" value="prepare">
                                        <input type="submit" class="btn btn-warning px-2 py-1" value="R">
                                    </form>
                                    <form method="post" action="{{ route('updateStatus', ['id'=>$order->id]) }}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pav" value="sent">
                                        <input type="submit" class="btn btn-success px-2 py-1" value="I">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
