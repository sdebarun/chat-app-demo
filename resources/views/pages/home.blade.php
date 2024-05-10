<!-- resources/views/chat/index.blade.php -->
@extends('layouts.main')
@section('content')
<div class="container">
    <slider></slider>
    <h3 class="my-4 font-family-philosopher text-white">Why Rudraganga? </h3>
    <div class="text-left text-white">
        <p>RUDRA GANGA brings together astrologers and their boundless knowledge
            about the occult science of Astrology on one platform and lets you connect with
            them 24*7. Apart from the best future predictions that help you get through the
            difficult phase of life, RUDRA GANGA also offers Live astrology sessions, Daily
            horoscope, Kundli matching service, Spiritual store and much more.</p>
    </div>
    <h3 class="my-4 font-family-philosopher text-white">Astrologers</h3>
    <consultant :consultants="{{ json_encode($consultants) }}" class="font-family-philosopher"></consultant>
    <div class="text-center"><a class="btn all-consultant-btn font-family-philosopher text-white border-white" href="consultants">View All Consultants</a></div>
    <h3 class="my-4 font-family-philosopher text-white">Our Products</h3>
    <products class="font-family-philosopher" :limit="{{ json_encode($limit) }}"></products>
    <div class="text-center my-5"><a class="btn all-products-btn font-family-philosopher" href="astro-shop">View All Products</a></div>

    <!-- <faq class="text-white"></faq> -->

</div>
@endsection