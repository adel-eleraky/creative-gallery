@extends('layouts.dashboard')

@section("content")
    <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <h3 class="mb-3 text-center">create new image</h3>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- main content -->
        <div class="main-content p-3">

        <form class="needs-validation" novalidate action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="input col-12 col-sm-6">
                    <label for="title" class="form-label"> Image title</label>
                    <input type="text" value="{{ old('title') }}"  name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="enter image title">
                    @if($errors->has("title"))
                        <div class="alert alert-danger" role="alert" >
                            {{ $errors->first("title") }}
                        </div>
                    @endif
                </div>
                <div class="input col-12 col-sm-6">
                    <label for="price" class="form-label">price</label>
                    <input type="number" value="{{ old('price') }}" name="price" class="form-control" id="price" aria-describedby="emailHelp" placeholder="enter image price">
                    @if($errors->has("price"))
                        <div class="alert alert-danger" role="alert" >
                            {{ $errors->first("price") }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-4">
                <div class="input col-12 col-sm-6">
                    <label for="type" class="form-label">Image type</label>
                    <select name="type" id="type" class="form-select" aria-label="Select image type">
                        <option value="">Choose image type</option>
                        <option value="wedding">Wedding</option>
                        <option value="nature">Nature</option>
                        <option value="ai">AI</option>
                        <option value="graphic">Graphic</option>
                    </select>
                    @if($errors->has("type"))
                        <div class="alert alert-danger" role="alert" >
                            {{ $errors->first("type") }}
                        </div>
                    @endif
                </div>
                <div class="input col-12 col-sm-6">
                    <label for="image" class="form-label">upload image without watermark</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @if($errors->has("image"))
                        <div class="alert alert-danger" role="alert" >
                            {{ $errors->first("image") }}
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    <!-- /.content-wrapper -->
@endsection
