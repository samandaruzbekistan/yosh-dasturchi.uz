@extends('admin.header_footer')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
@endpush
@section('home')
    active
@endsection
@section('section')
    <main class="content teachers">
        <div class="container-fluid p-0">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">{{ $section->name }} bo'limi darslari</h5>
                        <button class="btn btn-primary add"><i class="align-middle" data-feather="user-plus"></i>
                            Qo'shish
                        </button>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomi</th>
                            <th>YouTube video</th>
                            <th>Code editor</th>
                            <th>Testlar</th>
                            <th>Test natijalari</th>
                            <th>O'zgartirish</th>
                            <th>O'chirish</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $id => $item)
                            <tr>
                                <td>{{ $id+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if($item->video_url != "no_video")
                                        <i data-feather="check" class="text-success"></i>
                                    @else
                                        <i data-feather="x" class="text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($item->switch_editor != "off")
                                        <i data-feather="check" class="text-success"></i>
                                    @else
                                        <i data-feather="x" class="text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.lesson.quizzes', ['id' => $item->id]) }}" class="btn btn-info"><i data-feather="check-square"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.quiz.results', ['id' => $item->id]) }}" class="btn btn-bitbucket"><i data-feather="layers"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.lesson.edit', ['id' => $item->id]) }}" class="btn btn-warning"><i data-feather="edit-3" class="text-dark"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.lesson.delete', ['lesson_id' => $item->id]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-trash-2 align-middle">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <main class="content forma" style="padding-bottom: 0; display: none">
        <div class="container-fluid p-0">
            <div class="col-md-8 col-xl-9">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Yangi mavzu qo'shish</h5>
                        </div>
                        <div class="card-body h-100">
                            <form action="{{ route('admin.lesson.upload') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nomi <span class="text-danger">*</span></label>
                                    <input name="name" required type="text" class="form-control" placeholder="">
                                </div>
                                <input type="hidden" name="section_id"value="{{ $section->id }}">
                                <div class="mb-3">
                                    <label class="form-label">Dars matni <span class="text-danger">*</span></label>
                                    <div id="toolbar-container">
                                       <span class="ql-formats">
                                       <select class="ql-font"></select>
                                       <select class="ql-size"></select>
                                       </span>
                                        <span class="ql-formats">
                           <button class="ql-bold"></button>
                           <button class="ql-italic"></button>
                           <button class="ql-underline"></button>
                           <button class="ql-strike"></button>
                           </span>
                                        <span class="ql-formats">
                           <select class="ql-color"></select>
                           <select class="ql-background"></select>
                           </span>
                                        <span class="ql-formats">
                           <button class="ql-script" value="sub"></button>
                           <button class="ql-script" value="super"></button>
                           </span>
                                        <span class="ql-formats">
                           <button class="ql-header" value="1"></button>
                           <button class="ql-header" value="2"></button>
                           <button class="ql-blockquote"></button>
                           <button class="ql-code-block"></button>
                           </span>
                                        <span class="ql-formats">
                           <button class="ql-list" value="ordered"></button>
                           <button class="ql-list" value="bullet"></button>
                           <button class="ql-indent" value="-1"></button>
                           <button class="ql-indent" value="+1"></button>
                           </span>
                                        <span class="ql-formats">
                           <button class="ql-direction" value="rtl"></button>
                           <select class="ql-align"></select>
                           </span>
                                        <span class="ql-formats">
                           <button class="ql-link"></button>
                           <button class="ql-image"></button>
                           <button class="ql-video"></button>
                           <button class="ql-formula"></button>
                           </span>
                                        <span class="ql-formats">
                                   <button class="ql-clean"></button>
                                   </span>
                                    </div>
                                    <div id="editor">
                                    </div>
                                    <!-- Hidden input to store editor content -->
                                    <input type="hidden" name="body" id="body-content">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Video iframe </label>
                                    <textarea name="video_url" class="form-control"></textarea>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="switch_editor" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Ushbu darsga "Code editor" qo'shish</label>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-danger cancel">Bekor qilish</button>
                                    <input type="submit" class="btn btn-success" value="Qo'shish">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <!-- Initialize Quill editor -->
    <script>
        const quill = new Quill('#editor', {
            modules: {
                syntax: true,
                toolbar: '#toolbar-container',
            },
            placeholder: 'Maqola...',
            theme: 'snow',
        });

        // Handle form submission
        $('form').on('submit', function (e) {
            // Get the editor content as HTML
            var editorContent = quill.root.innerHTML;

            // Update the hidden input with the editor content
            $('#body-content').val(editorContent);
        });
    </script>

    <script>
        $(".add").on("click", function () {
            $('.forma').show();
            $('.teachers').hide();
        });

        $(".cancel").on("click", function () {
            event.stopPropagation();
            $('.forma').hide();
            $('.teachers').show();
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

        @if(session('success') == 1)
        const notyf = new Notyf();

        notyf.success({
            message: 'Kitob yuklandi!',
            duration: 10000,
            dismissible: true,
            position: {
                x: 'right',
                y: 'bottom'
            },
        });
        @endif

        @if(session('delete') == 1)
        const notyf = new Notyf();

        notyf.warning({
            message: 'Kitob o\'chirildi!',
            duration: 10000,
            dismissible: true,
            position: {
                x: 'right',
                y: 'bottom'
            },
        });
        @endif
    </script>
@endsection
