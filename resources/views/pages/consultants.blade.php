
@extends('layouts.main')
@section('content')
<div class="container font-family-philosopher">
    <h3 class="my-4">Consultants</h3>
    <consultant :consultants="{{ json_encode($consultants) }}" class="font-family-philosopher"/>
</div>
@endsection