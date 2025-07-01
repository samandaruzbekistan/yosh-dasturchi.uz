@extends('admin.header_footer')

@section('home')
    active
@endsection

@section('section')
    <main class="content forma" style="display: none">
        <div class="container-fluid p-0">
            <div class="mb-3 d-flex justify-content-between">
                <h1 class="h3 d-inline align-middle">Bo'limlar</h1>
            </div>
            <div class="card col-6">
                <div class="card-header">
                    <h5 class="card-title mb-0">Yangi bo'lim qo'shish</h5>
                </div>
                <form action="{{ route('admin.section.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="text" name="name" required class="form-control mb-3" placeholder="Nomi">
                        <input type="text" name="description" required class="form-control mb-3" placeholder="Tarif">
                        <input type="file" name="photo" required accept="image/*" class="form-control" placeholder="Rasmi">
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <input type="submit" class="btn btn-primary me-3" value="Saqlash">
                        <button type="button" class="btn btn-danger cancel">Bekor qilish</button>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <main class="content data">
        <div class="container-fluid p-0">
            <div class="mb-3 d-flex justify-content-between">
                <h1 class="h3 d-inline align-middle">Bo'limlar</h1>
                <button class="btn btn-primary align-content-end add">+ Yangi bo'lim</button>
            </div>
            <div class="row">
                @foreach($data as $id => $section)
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset( $section->photo) }}" alt="Unsplash">
                            <div class="card-header">
                                <h3 class=" mb-0">{{ $section->name }}</h3>
                                <h1 class="card-title mb-0">{{ $section->description }}</h1>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Darslar soni: {{ $section->lessons_count }} ta</p>
                                <a href="{{ route('admin.lessons', ['section_id' => $section->id]) }}" class="card-link">Darslarni ko'rish</a>
                                <a href="{{ route('admin.section.users', ['id' => $section->id]) }}" class="card-link">O'quvchilar</a>
                                <a href="{{ route('admin.section.delete', ['id' => $section->id]) }}" class="card-link delete-section" data-id="{{ $section->id }}">O'chirish</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection


@section('js')
    <script>
        $(".add").on("click", function () {
            event.stopPropagation();
            $('.forma').show();
            $('.data').hide();
        });

        $(".cancel").on("click", function () {
            event.stopPropagation();
            $('.forma').hide();
            $('.data').show();
        });
    </script>
@endsection
