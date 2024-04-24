
@extends('layouts.main')
@section('content')
<div class="container">
    <h3 class="my-4">Consultants</h3>
    <consultant :consultants="{{ json_encode($consultants) }}">
</div>
@endsection