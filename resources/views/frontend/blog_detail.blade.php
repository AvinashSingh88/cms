@extends('frontend.layouts.master');
@section('title') Blog Detail @endsection

@section('meta_tags')
  <meta name="title" content="{{$data['blog']->meta_title}}">
  <meta name="keywords" content="$data['blog']->meta_tag">
  <meta name="description" content="$data['blog']->meta_description">
@endsection 

@section('content')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Blog Details</h2>
            </div>
        </div>

        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8">
                        <img src="{{$data['blog']->blog_image}}" class="img-fluid" alt="">
                        <h3>{{$data['blog']->title}}</h3>
                        <p> {!! $data['blog']->description !!} </p>
                    </div>
                    
                    <div class="col-lg-4">
                        @foreach($data['sub_category_list'] AS $key => $value)
                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5><a href="{{ route('blogs.slug',$value->slug) }}">{{$value->title}}</a></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection