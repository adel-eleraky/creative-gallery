@extends("layouts.dashboard")

@section("content")


<!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        @if(session("success"))
            <div class="success-message alert alert-success" role="alert">
                {{ session("success") }}
            </div>
        @endif
        <div class="content-header">
            <div class="container-fluid">
                <h3 class="mb-3 text-center">Edit profile</h3>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- main content -->
        <div class="main-content p-3">

        <form class="needs-validation " novalidate action="{{ route('profile.editProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="input col-12 col-sm-6">
                    <label for="name" class="form-label"> Username</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"  placeholder="{{ old('name' , $user->name) }}" value="{{ $user->name }}" >
                    @if($errors->has("name"))
                        <div class="alert alert-danger" role="alert" >
                            {{ $errors->first("name") }}
                        </div>
                    @endif
                </div>
                <div class="input col-12 col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{ old('email' , $user->email) }}" value="{{ $user->email }}">
                    @if($errors->has("email"))
                        <div class="alert alert-danger" role="alert" >
                            {{ $errors->first("email") }}
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- edit password form -->
        <h2 class="my-5 text-center">Edit password</h2>
        <form class="needs-validation edit-pass-form" novalidate action="{{ route('profile.editPassword') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="input col-12 col-sm-6">
                    <label for="password" class="form-label"> Old password</label>
                    <input type="password"  name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="enter old password">
                    @if($errors->has("password"))
                        <div class="alert alert-danger" role="alert" >
                            {{ $errors->first("password") }}
                        </div>
                    @endif
                </div>
                <div class="input col-12 col-sm-6">
                    <label for="new_password" class="form-label">New password</label>
                    <input type="password" name="new_password" class="form-control" id="new_password" aria-describedby="emailHelp" placeholder="enter new password">
                    @if($errors->has("new_password"))
                        <div class="alert alert-danger" role="alert" >
                            {{ $errors->first("new_password") }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-4">
                <div class="input col-12 col-sm-6">
                    <label for="confirm_new_pass" class="form-label"> Confirm new password</label>
                    <input type="password"  name="confirm_new_pass" class="form-control" id="confirm_new_pass" aria-describedby="emailHelp" placeholder="confirm old password">
                    @if($errors->has("confirm_new_pass"))
                        <div class="alert alert-danger" role="alert" >
                            {{ $errors->first("confirm_new_pass") }}
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    <!-- /.content-wrapper -->
@endsection
