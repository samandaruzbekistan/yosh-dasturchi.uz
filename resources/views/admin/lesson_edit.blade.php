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
    <main class="content forma">
        <div class="container-fluid p-0">
            <div class="col-md-8 col-xl-9">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Mavzuni taxrirlash</h5>
                        </div>
                        <div class="card-body h-100">
                            <form action="{{ route('admin.lesson.update', ['id' => $lesson->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nomi <span class="text-danger">*</span></label>
                                    <input name="name" required type="text" class="form-control" placeholder="" value="{{ $lesson->name }}">
                                </div>
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
                                        {!! $lesson->body !!}
                                    </div>
                                    <!-- Hidden input to store editor content -->
                                    <input type="hidden" name="body" id="body-content">
                                </div>
                                @if($lesson->video_url != "no_video")
                                    <div class="mb-3">
                                        <label class="form-label">Video iframe </label>
                                        <textarea name="video_url" class="form-control">{{ $lesson->video_url }}</textarea>
                                    </div>
                                @endif
                                <input type="hidden" name="section_id" value="{{ $lesson->section_id }}">
                                <div class="text-end">
                                    <input type="submit" class="btn btn-success" value="Yangilash">
                                    <a href="{{ url()->previous() }}" class="btn btn-danger cancel">Bekor qilish</a>
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
