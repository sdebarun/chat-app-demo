@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5 mx-0 pl-0">
            <img src="{{asset('assets/images/zodiac.jpg')}}" class="cover mx-0" />
        </div>
        <div class="col-md-7 my-0 mx-0 py-2">
            <registration />
        </div>
    </div>
</div>
@endsection