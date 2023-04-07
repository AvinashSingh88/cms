@extends('frontend.layouts.master');
@section('title') {{$data->title}} @endsection

@section('meta_tags')
  <meta name="title" content="{{$data->meta_title}}">
  <meta name="keywords" content="$data->meta_tag">
  <meta name="description" content="$data->meta_description">
@endsection 

@section('content')

  {!! $data->description !!}

  @if($testimonials->isNotEmpty())
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
  @endif

@endsection 
