@extends('frontend.layouts.master');
@section('title') Blogs @endsection

@section('content')

<main id="main" data-aos="fade-in">

    <div class="breadcrumbs">
        <div class="container">
            <h2>Blogs</h2>
        </div>
    </div>

    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach($blogs AS $key => $value)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="course-item">
                        <img src="{{$value->blog_image}}" class="img-fluid" alt="{{$value->title}}">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>{{$value->parent_name}}</h4>
                            </div>

                            <h3><a href="{{ route('blog.detail',$value->slug) }}">{{$value->title}}</a></h3>
                            <p>{!! $value->description !!}</p>
                            <div class="trainer d-flex justify-content-between align-items-center">
                                <div class="trainer-profile d-flex align-items-center">
                                    <!-- <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt=""> -->
                                    <span>{{$value->first_name}}</span>
                                </div>
                                <div class="trainer-rank d-flex align-items-center">
                                    @if(session('LoggedCustomer'))
                                        <a class="like_btn"> 
                                            <i class="bx bx-heart"></i> 
                                            <div data-userId="{{session('LoggedCustomer')->id}}" data-blogId="{{$value->id}}"></div>
                                        </a>
                                    @else
                                        <a href="{{ url('login') }}"><i class="bx bx-heart"></i></a>
                                    @endif
                                    &nbsp;50
                                    &nbsp;&nbsp;
                                    <i class="bx bx-comment"></i>&nbsp;65
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </section>
  </main>

  @endseection
  @section('script')
  <script type="text/javascript">
    $(".like_btn").click(function (event) {
        event.preventDefault();

        var blog_id = $(this).data("blogid");
        var user_id = $(this).data("userid");

        console.log(blog_id);
        console.log(user_id);
        console.log("Clicked function");
        alert("I am clicked");

       
    })
</script>
@endsection

