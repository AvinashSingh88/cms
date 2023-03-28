@extends('frontend.layouts.master');
@section('title') Blog Detail @endsection

@section('meta_tags')
  <meta name="title" content="{{$blog->meta_title}}">
  <meta name="keywords" content="$blog->meta_tag">
  <meta name="description" content="$blog->meta_description">
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
                        <img src="{{$blog->blog_image}}" class="img-fluid" alt="">
                        <h3>{{$blog->title}}</h3>
                        <p> {!! $blog->description !!} </p>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Trainer</h5>
                            <p><a href="#">Walter White</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Course Fee</h5>
                            <p>$165</p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Available Seats</h5>
                            <p>30</p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Schedule</h5>
                            <p>5.00 pm - 7.00 pm</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection