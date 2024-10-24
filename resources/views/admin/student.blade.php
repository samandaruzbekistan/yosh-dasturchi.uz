@extends('admin.header_footer')

@push('css')
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <!-- Add this inside the <head> section of your HTML document -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('students')
    active
@endsection
@section('section')
    <main class="content p-4">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-3 col-xl-2">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profil sozlamalari</h5>
                        </div>

                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab" aria-selected="true">
                                Account
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#payments" role="tab" aria-selected="false" tabindex="-1">
                                Kurslar
                            </a>
{{--                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#sms" role="tab" aria-selected="false" tabindex="-1">--}}
{{--                                SMS yuborish--}}
{{--                            </a>--}}
{{--                            <a class="list-group-item list-group-item-action text-danger" data-bs-toggle="list" href="#" role="tab" aria-selected="false" tabindex="-1">--}}
{{--                                Delete account--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-xl-10">
                    <div class="tab-content">
                        <div class="tab-pane fade active show " id="account" role="tabpanel">
                            <div class="row">
                                <div class="card col-md-3 col-xl-4 me-3">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Profil malumotlari</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <h2 class=" text-dark mb-0">{{ $student->name }}</h2>
                                        <div class="text-muted mb-2">O'quvchi</div>

                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <h5 class="h6 card-title">Profil turi</h5>
                                        <a href="#" class="badge bg-primary me-1 my-1">
                                            @if($student->is_teacher)
                                                Teacher
                                            @else
                                                Student
                                            @endif
                                        </a>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <h5 class="h6 card-title">About</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-1">
                                                <i class="align-middle me-1" data-feather="home"></i>Manzil: <a href="#">{{ $student->region->name }}, {{ $student->district->name }}, {{ $student->quarter->name }}</a>
                                            </li>
                                            <li class="mb-1">
                                                <i class="align-middle me-1" data-feather="briefcase"></i>Maktab: <a href="#">{{ $student->school_number }}</a></li>
                                            <li class="mb-1"><i class="align-middle me-1" data-feather="book-open"></i>Sinf: <a href="#">{{ $student->class_name }}</a></li>
                                        </ul>
                                    </div>
                                    <hr class="my-0">
                                </div>
                                <div class="card col-md-6 col-xl-5 d-inline-block">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Malumotlarni yangilash</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="inputFirstName">F.I.SH</label>
                                                <input type="text" name="name" class="form-control" id="inputFirstName" placeholder="Ismi" value="{{ $student->name }}">
                                            </div>
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <div class="mb-3">
                                                <label class="form-label" for="inputLastName">Email</label>
                                                <div class="input-group mb-3">
                                                    <input type="email" required="" name="email" value="{{ $student->email }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Saqlash</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payments" role="tabpanel">
                            <div class="card col-8">
                                <div class="card-header">
                                    <div class="row justify-content-between">
                                        <h5 class="card-title mb-0 col">O'quv ma'lumotlari</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" >
                                        <thead>
                                            <tr>
                                                <th>Kurs nomi</th>
                                                <th>Oxirgi dars</th>
                                                <th>Test bali</th>
                                            </tr>
                                        </thead>
                                        <tbody class="old-data">
                                        @foreach($stories as $story)
                                            <tr>
                                                <td>{{ $story->section->name }}</td>
                                                <td>{{ $story->lesson->name }}</td>
                                                <td>{{ $story->lesson->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tbody class="new-data" style="display: none">

                                        </tbody>
                                    </table>

                            </div>
                        </div>
                    </div>
                        <div class="tab-pane fade" id="sms" role="tabpanel">
                            <div class="card col-8">
                                <div class="card-header">
                                    <h5 class="card-title mb-0 col"><b class="text-primary">{{ $student->name }}</b> ga sms yuborish</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="number" value="{{ $student->phone }}">
                                        <div class="mb-3">
                                            <label class="form-label">SMS matni</label>
                                            <textarea class="form-control" rows="3" required name="message"></textarea>
                                        </div>
                                        <div class=" text-end">
                                            <button type="submit" class="btn btn-success">Xabar yuborish</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-xl-4 d-none">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Faktura</h5>
                        </div>
                        <div class="card-body border m-1" id="printContent">
                            <div class="row ps-5 pe-5">
                                <img src="{{ asset('logo.png') }}" class="img-fluid">
                            </div>
                            <h1 class="text-center "><b>To'landi</b></h1>
                            <div class="row h4 justify-content-between border-bottom">
                                <b class="col mb-0">Sana:</b>
                                <p class="col mb-0 text-end" id="date"></p>
                            </div>
                            <div class="row h4 justify-content-between">
                                <b class="col-3 mb-0">F.I.SH:</b>
                                <p class="col mb-0 text-end" id="name">{{ $student->name }}</p>
                            </div>
                            <div class="row h4 justify-content-between">
                                <b class="col-3 mb-0">Guruh:</b>
                                <p class="col mb-0 text-end" id="subject"></p>
                            </div>
                            <div class="row h4 justify-content-between">
                                <b class="col-3 mb-0">Oy:</b>
                                <p class="col mb-0 text-end" id="month"></p>
                            </div>
                            <div class="row h2 text-center border-bottom border-top">
                                <b class="col mb-0" id="amount"> so'm</b>
                            </div>
                            <div id="qrcode-2" class="text-center d-flex justify-content-center">

                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" id="download-button" class="btn btn-info"><i class="align-middle" data-feather="download"></i> Yuklab olish</button>
                            <button type="button" id="printButton" onClick="printdiv('printContent');" class="btn btn-success"><i class="align-middle" data-feather="printer"></i> Chop etish</button>
                        </div>
                    </div>
            </div>
        </div>
    </main>
@endsection
