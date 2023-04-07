@extends('frontend.layouts.master');
@section('title') Register @endsection

@section('content')

<main id="main">
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Register</h2>
      </div>
    </div>

    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="row mt-5">
                <div class="col-lg-8 mt-5 mt-lg-0 mx-auto">
                    <form action="{{ route('register.post') }}" method="post" role="form" class="">
                        @csrf

                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="first_name" class="form-control"  placeholder="Your First Name" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" name="last_name" class="form-control"  placeholder="Your Last Name">
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="mobile" placeholder="Your Mobile Number" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control" name="password" placeholder="Your Password" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Your Confirm Password" required>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit">Register</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
  </main>


@endsection 
