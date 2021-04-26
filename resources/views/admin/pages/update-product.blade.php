@extends('admin/main-admin')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Produktai</span>
            <h3 class="page-title">Atnaujinti produktą</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    <form class="add-new-post" method="post" action="/storeupdate/{{$product->id}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input class="form-control @error('title') is-invalid @enderror " value="{{$product->title}}" type="text"  name="title" placeholder="Produkto pavadinimas">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group custom-file mb-3 " lang="es">
                            <input type="file" class="custom-file-input @error('img') is-invalid @enderror" value="{{$product->path}}" id="customFile" name="img">
                            <label class="custom-file-label" for="customFile">Pasirinkite nuotrauką</label>
                            @error('img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select class="form-control @error('category-name') is-invalid @enderror" name="category-name" id="caregory">
                                <option value="">Pasirinkti kategoriją</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ ( $product->category_id === $category->id) ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category-name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control @error('quantity') is-invalid @enderror" value="{{$product->quantity}}" type="text" name="quantity" placeholder="Produktų kiekis">
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control @error('price') is-invalid @enderror" value="{{number_format($product->price/100,2)}}" type="text" name="price" placeholder="Produkto kaina">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('content') is-invalid @enderror"  name="content" placeholder="Produkto aprašymas" rows="8">{{$product->content}}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-accent ml-auto">
                            <i class="material-icons">file_copy</i> Atnaujinti</button>
                    </form>
                </div>
            </div>
            <!-- / Add New Post Form -->
        </div>
        <div class="col-lg-3 col-md-12">
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Actions</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">flag</i>
                          <strong class="mr-1">Status:</strong> Draft
                        </span>
                            <span class="d-flex mb-2">
                          <i class="material-icons mr-1">visibility</i>
                          <strong class="mr-1">Visibility:</strong>
                          <strong class="text-success">Public</strong>
                        </span>
                            <span class="d-flex mb-2">
                          <i class="material-icons mr-1">calendar_today</i>
                          <strong class="mr-1">Schedule:</strong> Now
                        </span>
                            <span class="d-flex">
                          <i class="material-icons mr-1">score</i>
                          <strong class="mr-1">Readability:</strong>
                          <strong class="text-warning">Ok</strong>
                        </span>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- / Post Overview -->
            <!-- Post Overview -->
            <!-- / Post Overview -->
        </div>
    </div>
@endsection
