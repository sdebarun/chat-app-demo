@extends('layouts.main')

@section('content')
<div class="bg0">
<single-consultant :consultant="{{json_encode($consultant)}}" class="font-family-philosopher"></single-consultant>
</div>
@endsection