@extends('layouts.main')

@section('content')
<single-consultant :consultant="{{json_encode($consultant)}}" class="font-family-philosopher"></single-consultant>
@endsection