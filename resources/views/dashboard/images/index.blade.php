@extends("layouts.dashboard")

@section("css")
<link rel="stylesheet" href={{ asset('dist/css/dashboard.css') }}>

@endsection
@section("content")

    <!-- Content Wrapper. Contains page content -->
            <!-- Content Header (Page header) -->
            <div class="dashboard">
            @if(session("success"))
                <div class="success-message alert alert-success" role="alert">
                    {{ session("success") }}
                </div>
            @endif
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">

                            <div class="col-12 col-sm-6">
                                <h1>Images</h1>
                            </div>
                            <div class="col-12 col-sm-6 text-right">
                                <a href="{{ route('images.create') }}" class="btn btn-primary "> Add Image </a>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- main content -->
                <div class="images-main-content p-3">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">title</th>
                            <th scope="col">type</th>
                            <th scope="col">price</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                                <tr>
                                    <td>{{ $image->id }}</td>
                                    <td><img src="{{ asset('storage/images/' .$image->type . '/' . $image->image) }}" alt="image"></td>
                                    <td>{{ $image->title }}</td>
                                    <td>{{ $image->type }}</td>
                                    <td>{{ $image->price }}</td>
                                    <td>{{ $image->created_at }}</td>
                                    <td>
                                        <a href="{{ route('images.delete', $image->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- /.content-wrapper -->
            </div>
@endsection

