<!-- resources/views/chat/index.blade.php -->
@extends('layouts.main')
@section('content')
<div class="container">
    <slider></slider>
    <h3 class="my-4">Astrologers</h3>
    
        <consultant :consultants="{{ json_encode($consultants) }}"></consultant>
   
</div>
@endsection