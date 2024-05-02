<!-- resources/views/chat/index.blade.php -->
@extends('layouts.main')
@section('content')
<div class="container">
    <slider></slider>
    <h3 class="my-4 font-family-philosopher">Astrologers</h3>
    
        <consultant :consultants="{{ json_encode($consultants) }}" class="font-family-philosopher"></consultant>
        <div class="text-center"><a class="btn all-consultant-btn font-family-philosopher" href="consultants">View All Consultants</a></div>
        <faq></faq>
   
</div>
@endsection