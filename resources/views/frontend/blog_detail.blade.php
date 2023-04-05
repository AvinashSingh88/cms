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
                        
                        <div class="trainer d-flex justify-content-end align-items-center w-100">
                            <div class="trainer-profile d-flex align-items-center me-5">
                                <!-- <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt=""> -->
                                <span>Admin</span>
                            </div>
                            <div class="trainer-rank d-flex justify-content-between align-items-center" style="width:100px">
                                @if(session('LoggedCustomer'))
                                    <a class="like_btn " data-userId="{{session('LoggedCustomer')->id}}" data-blogId="{{$data['blog']->id}}"> 
                                        <i class="heart_class bx bx-heart d-flex">
                                            <div class="show_total_like">{{$data['blog']->total_like}}</div>
                                        </i> 
                                    </a>
                                @else
                                    <a href="{{ url('login') }}">
                                        <i class="bx bx-heart">
                                            <div class="show_total_like">{{$data['blog']->total_like}}</div>
                                        </i>
                                    </a>
                                    
                                @endif 
                                <i class="bx bx-comment"></i>&nbsp;{{$data['blog']->total_comment}}
                            </div>
                        </div>

                        <h3>{{$data['blog']->title}}</h3>
                        <p> {!! $data['blog']->description !!} </p>

                        <form method="post">
                            @csrf
                            <textarea class="form-control" id="comment" name="comment" placeholder="Comment" col="4"></textarea>
                            <button class="btn btn-success" id="comment_id" type="submit">Comment</button>
                        </form>
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

@section('script')
    <script type="text/javascript">
        $( document ).ready(function() {
            // alert("I am ready function");
            show_blog_comment();
        });

        $(".like_btn").click(function (event) {
            event.preventDefault();
            var blog_id = $(this).data("blogid");
            var user_id = $(this).data("userid");

            $.ajax({
                url: "{{url('blog/action')}}",
                type: "POST",
                data: {
                    blog_id: blog_id,
                    user_id: user_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',

                success: function (result) {
                    if(result.status == 1){
                        $(event.target).removeClass('bx bx-heart');
                        $(event.target).addClass('fa fa-heart');
                    }else{
                        $(event.target).removeClass('fa fa-heart');
                        $(event.target).addClass('bx bx-heart');                        
                    }
                    var like_html = '<div class="show_total_like">'+ result.total_like +'</div>';
                    $(event.target).html(like_html);
                    
                }
            });

        
        })

        //Store Comment in db
        $("#comment_id").click(function (event) {   
            event.preventDefault();
            var comment = $('#comment').val();
            var blog_id = {{$data['blog']->id}};

            $.ajax({
                url: "{{url('blog/store_comment')}}",
                type: "POST",
                data: {
                    blog_id: blog_id,
                    comment: comment,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',

                success: function (result) {
                    console.log(result);
                }
            });

        
        })

        function show_blog_comment(){
            // alert("I am comment function");
            var blog_id = {{$data['blog']->id}};
            $.ajax({
                url: "{{url('blog/show_comments')}}",
                type: "GET",
                data: {
                    blog_id: blog_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                }
            });
        }   
            



    </script>
@endsection