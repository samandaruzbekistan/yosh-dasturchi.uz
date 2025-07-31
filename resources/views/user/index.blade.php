@extends('user.header_footer_light')

@section('index') active @endsection

@section('main')

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner_content text-center">
                            <p class="text-uppercase">
                                Axborotlashtirilgan ta’lim muhitida dasturlash asoslarini o‘qitish metodikasini takomillashtirish (Umumiy o‘rta ta’lim maktablari “Informatika va axborot texnologiyalari” fani misolida)
                            </p>
                            <h2 class="text-uppercase mt-4 mb-5">
                                YOSH DASTURCHI
                            </h2>
                            <div>
                                <a href="#" class="primary-btn2 mb-3 mb-sm-0">Dastur haqida</a>
                                <a href="#sections" class="primary-btn ml-sm-3 ml-0">Bo'limlar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">Sayt imkoniyatlari</h2>
                        <p>
                            Ushbu dasturdan foydalanib quidagi imkoniyatlarga ega bo'lasiz
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_feature">
                        <div class="icon"><span class="flaticon-student"></span></div>
                        <div class="desc">
                            <h4 class="mt-3 mb-2">Top Kurslar</h4>
                            <p>
                                Dasturlash sohasining turli yo'nalishlarida kurslar
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single_feature">
                        <div class="icon"><span class="flaticon-book"></span></div>
                        <div class="desc">
                            <h4 class="mt-3 mb-2">Maqolalar</h4>
                            <p>
                                IT ga oid so'ngi yangiliklar aks etgan maqolalar to'plami
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single_feature">
                        <div class="icon"><span class="flaticon-earth"></span></div>
                        <div class="desc">
                            <h4 class="mt-3 mb-2">Qiziqarli topshiriqlar</h4>
                            <p>
                                Mavzulashtirilgan topshiriqlar, rebuslar va testlar
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses" id="sections">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">Bo'limlar</h2>
                        <p>
                            Web saytimiz quidagi bo'limlardan tashkil topgan
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single course -->
                <div class="col-lg-12">
                    <div class="owl-carousel active_course">
                        @foreach($sections as $section)
                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ asset( $section->photo) }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <span class="price">Bepul</span>
{{--                                    <span class="tag mb-4 d-inline-block">design</span>--}}
                                    <h4 class="mb-3">
                                        <a href="{{ route('user.section', ['id' => $section->id]) }}">{{ $section->name }}</a>
                                    </h4>
                                    <p>
                                        {{ $section->description }}
                                    </p>
                                    <div
                                        class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
                                    >
                                        <div class="authr_meta">
                                            <img src="img/courses/author1.png" alt="" />
                                            <span class="d-inline-block ml-2">Badalov Azamat</span>
                                        </div>
                                        <div class="mt-lg-0 mt-3">
                                            <span class="meta_info mr-4">
                                            <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Registration Area =================-->
    <div class="section_gap registration_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1 class="mb-3">Xabar qoldirish</h1>
                            <p>
                                Sayt bo'yicha takliflar, fikrlar bo'lsa yoki hamkorlik qilmoqchi bo'lsangiz biz bilan bog'laning
                            </p>
                        </div>
                        <div class="col clockinner1 clockinner">
                            <h1 class="days">10+</h1>
                            <span class="smalltext">Kurslar</span>
                        </div>
                        <div class="col clockinner clockinner1">
                            <h1 class="hours">150+</h1>
                            <span class="smalltext">Darslar</span>
                        </div>
                        <div class="col clockinner clockinner1">
                            <h1 class="minutes">458</h1>
                            <span class="smalltext">O'quvchilar</span>
                        </div>
                        <div class="col clockinner clockinner1">
                            <h1 class="seconds">71</h1>
                            <span class="smalltext">O'qituvchilar</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="register_form">
                        <h3>Xabar qoldirish</h3>
                        <p>Maydonlarni to'ldiring</p>
                        <form
                            class="form_area"
                            id="myForm"
                            action="mail.html"
                            method="post"
                        >
                            <div class="row">
                                <div class="col-lg-12 form_group">
                                    <input
                                        name="name"
                                        placeholder="Your Name"
                                        required=""
                                        type="text"
                                    />
                                    <input
                                        name="name"
                                        placeholder="Your Phone Number"
                                        required=""
                                        type="tel"
                                    />
                                    <input
                                        name="email"
                                        placeholder="Your Email Address"
                                        pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                        required=""
                                        type="email"
                                    />
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ End Registration Area =================-->

    <!--================ Start Trainers Area =================-->
    <section class="trainer_area section_gap_top" id="author">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">Mualliflar</h2>
                        <p>
                            O'quv dasturini tuzgan mualliflar
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center d-flex align-items-center">
                <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                    <div class="thumb d-flex justify-content-sm-center">
                        <img class="img-fluid" src="img/author/author1.JPG" alt="" />
                    </div>
                    <div class="meta-text text-sm-center">
                        <h4>Badalov Azamat</h4>
                        <p class="designation">O'qituvchi</p>
                        <div class="mb-4">
                            <p>
                                Guliston davlat universiteti tayanch doktoranti
                            </p>
                        </div>
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-linkedin"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================ End Trainers Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area" id="contact">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Bo'g'lanish</h2>
                            <div class="page_link">
                                    <a href="/">Bosh sahifa</a>
                                <a href="#contact">Bog'lanish</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="ti-home"></i>
                            <h6>Guliston shahar 4-mavze</h6>
                            <p>Guliston davlat universiteti</p>
                        </div>
                        <div class="info_item">
                            <i class="ti-link"></i>
                            <h6><a href="#">+998 99 472 43 92</a></h6>
                            <p>Telefon raqam</p>
                        </div>
                        <div class="info_item">
                            <i class="ti-email"></i>
                            <h6><a href="#">azamatbadalov92@gmail.com</a></h6>
                            <p>Email</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form
                        class="row contact_form"
                        action="contact_process.php"
                        method="post"
                        id="contactForm"
                        novalidate="novalidate"
                    >
                        <div class="col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Enter your name"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Ismingiz'"
                                    required=""
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter email address"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Email'"
                                    required=""
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="subject"
                                    name="subject"
                                    placeholder="Enter Subject"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Mavzu'"
                                    required=""
                                />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                  <textarea
                      class="form-control"
                      name="message"
                      id="message"
                      rows="1"
                      placeholder="Enter Message"
                      onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Xabarni kiriting'"
                      required=""
                  ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn primary-btn">
                                Xabar yuborish
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->

@endsection
