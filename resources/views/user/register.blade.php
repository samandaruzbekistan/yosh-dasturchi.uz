
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />


    <title>Admin | Yosh dasturchi</title>

    <link href="../css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4 row">
                                <div class="text-center col-4 d-md-block d-none">
                                    <img src="{{ asset('img/logo.png') }}" alt="Charles Hall" class="img-fluid " width="250"  />
                                </div>
                                <div class="col-md-8">
                                    <form action="{{ route('user.register.post') }}" method="post">
                                        @csrf
                                        <h3 class="text-center">Ro'yhatdan o'tish</h3>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">F.I.Sh <span class="text-danger">*</span></label>
                                                <input  class="form-control form-control-lg" type="text" name="username" placeholder="Ism Familya kiriting..." />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <input  class="form-control form-control-lg" type="email" name="email" placeholder="Email kiriting..." />
                                            </div>
                                        </div>
                                        <input type="hidden" id="is_teacher" name="is_teacher" value="0">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Parol <span class="text-danger">*</span></label>
                                                <input  class="form-control form-control-lg" type="password" name="password" placeholder="Parolingizni kiriting..." />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Parolni takrorlang <span class="text-danger">*</span></label>
                                                <input  class="form-control form-control-lg" type="password" name="password2" placeholder="Parol..." />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label for="region" class="form-label">Viloyat</label> <sup class="text-danger">*</sup>
                                                <select id="region" required="" class="form-select" name="region_id">
                                                    <option disabled="" selected="" hidden>Tanlang</option>
                                                    <option value="2">Andijon viloyati</option>
                                                    <option value="3">Buxoro viloyati</option>
                                                    <option value="12">Farg‘ona viloyati</option>
                                                    <option value="4">Jizzax viloyati</option>
                                                    <option value="7">Namangan viloyati</option>
                                                    <option value="6">Navoiy viloyati</option>
                                                    <option value="5">Qashqadaryo viloyati</option>
                                                    <option value="1">Qoraqalpog‘iston Respublikasi</option>
                                                    <option value="8">Samarqand viloyati</option>
                                                    <option value="10">Sirdaryo viloyati</option>
                                                    <option value="9">Surxandaryo viloyati</option>
                                                    <option value="14">Toshkent shahri</option>
                                                    <option value="11">Toshkent viloyati</option>
                                                    <option value="13">Xorazm viloyati</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="district" class="form-label">Tuman</label> <sup class="text-danger">*</sup>
                                                <select id="district" name="district_id" required class="form-select">
                                                    <option disabled="" selected="" hidden>Tanlang</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="district" class="form-label">Mahalla</label> <sup class="text-danger">*</sup>
                                                <select id="quarter" name="quarter_id" class="form-select">
                                                    <option disabled="" selected="" hidden>Tanlang</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Maktab <span class="text-danger">*</span></label>
                                                <input  class="form-control form-control-lg" type="text" name="school" placeholder="Maktab..." />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <div class="form-check form-switch mb-2" style="display: inline-block">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="is_uzbekistan">
                                                    <label class="form-check-label" for="is_uzbekistan">Men o'qituvchiman</label>
                                                </div>
                                                <input type="text" name="class_name" id="class_name" class="form-control" placeholder="Sinfingiz...">
                                            </div>
                                        </div>
                                        <a href="{{ route('user.login') }}">Kirish</a>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Yuborish</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script src="../js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
    @if(session('login_error') == 1)
    const notyf = new Notyf();

    notyf.error({
        message: 'Login yoki parol xato!',
        duration: 5000,
        dismissible : true,
        position: {
            x : 'right',
            y : 'bottom'
        },
    });
    @endif

    @if($errors->any())
    const notyf = new Notyf();

    @foreach ($errors->all() as $error)
    notyf.error({
        message: '{{ $error }}',
        duration: 5000,
        dismissible: true,
        position: {
            x : 'right',
            y : 'bottom'
        },
    });
    @endforeach

    @endif
</script>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script>
    $(document).on('change', '#region', function() {
        let selectedId = $(this).val();
        let firstOption = $('#district option:first');

        $("#district").empty();
        $('#district').append('<option value="" disabled selected hidden>Tuman...</option>');
        $.ajax({
            url: '{{ route('district.regionID') }}/' + selectedId,
            method: 'GET',
            success: function(data) {
                $("#district").empty();
                $('#district').append('<option value="" disabled selected hidden>Tuman...</option>');
                $.each(data, function(key, value){
                    $('#district').append('<option value="' + value.id+ '">' + value.name + '</option>');
                });
            }
        });
    });

    $(document).on('change', '#district', function() {
        let selectedId = $(this).val();
        let firstOption = $('#quarter option:first');

        $("#quarter").empty();
        $('#quarter').append('<option value="" disabled selected hidden>Mahalla...</option>');
        $.ajax({
            url: '{{ route('quarter.districtID') }}/' + selectedId,
            method: 'GET',
            success: function(data) {
                $("#quarter").empty();
                $('#quarter').append('<option value="" disabled selected hidden>Mahalla...</option>');
                $.each(data, function(key, value){
                    $('#quarter').append('<option value="' + value.id+ '">' + value.name + '</option>');
                });
            }
        });
    });


    $(document).on('click', '.new-student', function () {
        $('.add-student').show();
        $('.teachers').hide();
    });

    @if($errors->any())
    const notyf = new Notyf();

    @foreach ($errors->all() as $error)
    notyf.error({
        message: '{{ $error }}',
        duration: 5000,
        dismissible: true,
        position: {
            x: 'center',
            y: 'top'
        },
    });
    @endforeach

    @endif


    @if(session('password_error') == 1)
    const notyf = new Notyf();

    notyf.error({
        message: 'Parollar bir xil emas!',
        duration: 10000,
        dismissible : true,
        position: {
            x : 'right',
            y : 'top'
        },
    });
    @endif

    @if(session('username_error') == 1)
    const notyf = new Notyf();

    notyf.error({
        message: 'Xatolik! Bunday email mavjud',
        duration: 10000,
        dismissible : true,
        position: {
            x : 'right',
            y : 'top'
        },
    });
    @endif

    $(document).ready(function() {
        $('#is_uzbekistan').change(function() {
            if(this.checked) {
                $('#class_name').hide();
                $('#is_teacher').val("1");
            }
            else{
                $('#class_name').show();
                $('#is_teacher').val("0");
            }
        });
    });
</script>
<div class="notyf" style="justify-content: flex-start; align-items: center;"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;">Inconceivable!</div>
</body>

</html>
