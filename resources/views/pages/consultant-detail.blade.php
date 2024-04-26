@extends('layouts.main')

@section('content')
<single-consultant :consultant="{{json_encode($consultant)}}"></single-consultant>
@endsection