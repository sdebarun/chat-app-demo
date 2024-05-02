<!-- resources/views/chat/index.blade.php -->
@extends('layouts.main')
@section('content')
<div class="container">
    <slider></slider>
    <h3 class="my-4 font-family-philosopher">Astrologers</h3>
    
        <consultant :consultants="{{ json_encode($consultants) }}" class="font-family-philosopher"></consultant>
   
</div>
@endsection