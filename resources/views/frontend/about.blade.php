@extends('frontend.layouts.master');
@section('title') {{$data->title}} @endsection

@section('meta_tags')
  <meta name="title" content="{{$data->meta_title}}">
  <meta name="keywords" content="$data->meta_tag">
  <meta name="description" content="$data->meta_description">
@endsection 

@section('content')

  {!! $data->description !!}

@endsection 
