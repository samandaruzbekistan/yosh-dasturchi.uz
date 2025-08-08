@extends('user.header_footer_light')

@section('about') active @endsection


@section('css')

    <style>
        .quiz-wrapper {
            position: relative;
            display: block;
            width: 100%;
            height: auto;

        p.question-description {
            background: #19286C;
            color: white;
            padding: 25px 20px;
        }

        ul.options {
            position: relative;
            display: inline-block;
            vertical-align: top;
            /*width: 165px;*/
            list-style: none;
            /*border: 1px solid #19286C;*/
            text-align: center;
            padding: 0;
            margin: 0;

        li {
            border: 1px solid transparent;
            padding: 6px 8px;
        }

        li:hover {
            cursor: pointer;
        }

        li.option {
            display: inline;
            position: relative;
            z-index: 50;
            /*font-size: 13px;*/
        }

        }
        .answers {
            /*display: inline-block;*/
            /*width: 335px;*/
            /*font-size: 13px;*/
            line-height: 20px;

        .target {
            display: inline-block;
            width: 110px;
            /*background: #faff00;*/
            margin: 0 3px;
            text-align: center;
        }

        }
        button[type="submit"] {
            display: block;
            position: relative;
            margin: 10px auto;
            padding: 10px;
            background: #19286C;
            border: none;
            color: white;
            font-size: 16px;
        }

        }
        .lightbox-bg {
            display: none;
            position: absolute;
            z-index: 100;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, .7);
        }

        .status {
            display: none;
            position: absolute;
            z-index: 110;
            text-align: center;
            width: 80%;
            top: 220px;
            left: 47px;

        p {
            background: white;
            padding: 30px;
        }

        }
    </style>

@endsection

@section('main')

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="main_title">
                        <h2 class="mb-3">{{ $lesson->name }}</h2>
                        <h3 class="mb-3 text-secondary">{{ $lesson->description }}</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    {!! $lesson->body !!}
                </div>
                @if($lesson->video_url != "no_video")
                    <div class="col-12">
                        {!! $lesson->video_url !!}
                    </div>
                @endif
            </div>
            @if($lesson->switch_editor != "off")
                <div class="row justify-content-center mt-3">
                    <iframe
                        frameBorder="0"
                        height="450px"
                        src="https://onecompiler.com/embed/"
                        width="100%"
                    ></iframe>
                </div>
            @endif
            @if(isset($result))
                <h2 class="text-center">Test yechilgan, natija: {{ $result->percent }}%</h2>
            {{-- if quizzes not exist --}}
            @elseif(count($quizzes) == 0)
                <!-- Testlar mavjud emas -->
            @else
                <h2 class="text-center">Testlarni yeching</h2>
                <form action="{{ route('user.test.check') }}" method="post">
                    @csrf
                    <input type="hidden" name="quiz_count" value="{{ count($quizzes) }}">
                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                    <div class="container">
                        @foreach($quizzes as $id=> $quiz)
                            <div class="small_tests">
                                <section class="small_test">
                                    <div>
                                        <h2 class="test_title">{{ $id+1 }}. </b> {{ $quiz->quiz }}</h2>
                                        @foreach ($quiz->answers->shuffle() as $item)
                                            <label>
                                                <input type="radio" name="answer{{ $id+1 }}" value="{{ $item->is_correct }}">
                                                <span>{{ $item->answer }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </section>
                            </div>
                        @endforeach
                    </div>
                    <div class="container d-flex justify-content-center">
                        <button type="submit" id="submit" class="btn text-white rounded "
                                style="font-size: 20px;background-color: #7a6ad8 !important;">Tekshirish
                        </button>
                    </div>
                </form>
            @endif
            <hr>
            <div class="d-flex justify-content-between">
                @if(isset($previousLesson))
                    <a href="{{ route('lesson.show', ['id' => $previousLesson->id]) }}" class="primary-btn ml-sm-3 mt-3 ml-0">Avvalgi dars</a>
                @endif
                @if(isset($nextLesson))
                    @if(session()->has('user'))
                        <a href="{{ route('lesson.show', ['id' => $nextLesson->id]) }}" class="primary-btn mt-3 ml-sm-3 ml-0">Keyingi dars</a>
                    @else
                        <a href="{{ route('user.login') }}" class="primary-btn mt-3 ml-sm-3 ml-0">Keyingi dars</a>
                    @endif
                @endif
            </div>
        </div>
    </section>
    <!--================ End Feature Area =================-->
    <div class="modal fade" id="addPatient" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Test natijasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-check-square align-middle text-success">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    To'gri javob: <span id="correctCount"></span> ta <br><br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-x align-middle text-danger">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    Noto'gri javob: <span id="incorrectCount"></span> ta
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn text-white" data-bs-dismiss="modal"
                            style="background-color: #7a6ad8 !important;">Tugatish
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if(session('answer') == 1)
        <div class="modal fade" id="answerQuestion" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rabus natijasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-check-square align-middle text-success">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        Javobingiz to'g'ri <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn text-white" data-bs-dismiss="modal"
                                style="background-color: #7a6ad8 !important;">OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if((session()->has('answer')) and (session('answer') != 1))
        <div class="modal fade" id="answerQuestion" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Test natijasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-x align-middle text-danger">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        Noto'gri javob <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn text-white" data-bs-dismiss="modal"
                                style="background-color: #7a6ad8 !important;">OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session('result') == 1)
        <div class="modal fade" id="answerQuestion" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Test natijasi: {{ session('percent') }}%</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-check-square align-middle text-success">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        To'gri javob: {{ session('correct') }} ta <br><br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-x align-middle text-danger">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        Noto'gri javob: {{ session('incorrect') }} ta
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn text-white" data-bs-dismiss="modal"
                                style="background-color: #7a6ad8 !important;">Tugatish
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(window).on('load', function () {
            $('#answerQuestion').modal('show');
        });
    </script>
@endsection
