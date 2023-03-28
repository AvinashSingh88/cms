@extends('frontend.layouts.master');
@section('title') Testimonial @endsection

@section('content')

<main id="main">
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Testimonial</h2>
        </div>
    </div>

    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Testimonials</h2>
                <p>What are they saying</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $key => $value)
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{$value->img}}" class="testimonial-img" alt="">
                                    <h3>{{$value->name}}</h3>
                                    <h4>{{$value->designation}}</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{$value->message}}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>

  </main>


@endsection