
@extends('layouts.main')
@section('content')
<div class="font-family-philosopher bg-orange">
    <h3 class="py-4 px-4 text-white">Consultants</h3>
    <consultant :consultants="{{ json_encode($consultants) }}" class="font-family-philosopher px-4"/>
</div>
@endsection