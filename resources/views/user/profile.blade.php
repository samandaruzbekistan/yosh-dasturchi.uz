@extends('user.header_footer_light')

@section('about') active @endsection


@section('main')
<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="comment-form  col-md-12">
                        <div class="blog_info text-left">
                            <div class="post_tag">
                                <a href="#">{{ $user->region->name }}, {{ $user->district->name }}, {{ $user->quarter->name }}, </a>
                            </div>
                            <ul class="blog_meta list">
                                <li><a href="#" >F.I.Sh: {{ $user->name }}<i class="ti-user"></i></a></li>
                                <li><a href="#">Ro'yhatdan o'tgan: {{ $user->created_at }}<i class="ti-calendar"></i></a></li>
                                <li><a href="#">Email: {{ $user->email }}<i class="ti-email"></i></a></li>
                                <li><a href="#">Maktab: {{ $user->school_number }}<i class="ti-archive"></i></a></li>
                            </ul>
                        </div>
                        <h4>Ma'lumotlarni yangilash</h4>
                        <form>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter Name'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email address"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Subject'">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            <a href="#" class="primary-btn">Yangilash</a>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="ti-search"></i></button>
                                    </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle img-fluid text-center" style="text-align: center; width: 100%" src="img/blog/author.png" alt="">
                        <h4>{{ $user->name }}</h4>
                        <p>
                            @if($user->is_teacher)
                                O'qituvchi
                            @else
                                O'quvchi
                            @endif
                        </p>
                        <div class="social_icon">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-github"></i></a>
                            <a href="#"><i class="ti-linkedin"></i></a>
                        </div>
                        <div class="br"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection
