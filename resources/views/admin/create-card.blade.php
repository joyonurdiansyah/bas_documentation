@extends('layouts.app-admin')

{{-- set title --}}
@section('title', 'admin')

@section('content')
    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper" data-aos="fade-up" data-aos-delay="300">
        <!-- opening -->
        <section id="opening" class="full-height px-lg-5">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <p>Dashboard > Create Card</p>
                        <div class="title mb-4">
                            <h1>Create Card</h1>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="judul">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="foto" id="image" class="filepond" multiple
                                                data-max-file-size="3MB">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group pt-2 ">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="deskripsi " rows="5"
                                        placeholder="hanya untuk membantu merapihkan teks silahkan upload gambar image terpisah"></textarea>
                                </div>
                                <div class="form-group pt-2">
                                    <label for="link_web">Web Link</label>
                                    <input type="text" class="form-control" id="link web" name="link_web">
                                </div>

                                <div class="form-group mt-4">
                                    <button class="btn btn-primary w-100">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('after-script')
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"
        rel="stylesheet">
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/l2lcjfqiz9t5r7pklzhkcuxadsl8nuokxvoezk213zl670wa/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
    <script>
        const inputElement = document.querySelector('input[name="foto"]');
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const pond = FilePond.create(inputElement);
    </script>
@endpush
