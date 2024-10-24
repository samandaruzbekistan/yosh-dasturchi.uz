@extends('user.header_footer_light')

@section('about') active @endsection


@section('main')

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="main_title">
                        <h3 class="mb-3">{{ $section->name }} - bo'limi mundarijasi</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($themes as $id => $theme)
                    <div class="col-lg-4 col-md-6">
                        @php
                            $is_locked = false; // Initialize the locked status
                        @endphp

                        @if(!session()->has('user_id') && $id == 0)
                            @php $is_locked = false; @endphp
                        @elseif($story)
                            @if($theme->id > $story->lesson_id)
                                @php $is_locked = true; @endphp
                            @endif
                        @elseif(!$story && $id != 0)
                            @php $is_locked = true; @endphp
                        @endif

                        @if(!$is_locked)
                            <!-- Only display link for unlocked lessons -->
                            <a href="{{ route('lesson.show', ['id' => $theme->id]) }}">
                                @endif

                                <div class="single_feature">
                                    <div class="icon d-flex justify-content-between">
                                        <span class="flaticon-book"></span>
                                        @if($is_locked)
                                            <i class="ti-lock text-danger h4"></i>
                                        @else
                                            <i class="ti-check text-success h4"></i>
                                        @endif
                                    </div>
                                    <div class="desc">
                                        <h4 class="mt-3 mb-2">{{ $theme->name }}</h4>
                                    </div>
                                </div>

                                @if(!$is_locked)
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Feature Area =================-->

@endsection
