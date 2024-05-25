@extends('layouts.dashboard')

@section('content')

<div class="container py-3">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="small-box bg-info">
                <div class="inner">
                <h3>{{ $imagesNum }}</h3>

                <p>Images created</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
