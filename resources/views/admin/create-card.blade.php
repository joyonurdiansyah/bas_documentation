@extends('layouts.app-admin')

{{-- set title --}}
@section('title', 'card')

@section('content')
    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper" data-aos="fade-up" data-aos-delay="300">
        <!-- opening -->
        <section id="opening" class="full-height px-lg-5">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <p> <a href="{{ url('/dashboard-admin/dashboard-utama') }}">Dashboard</a> > Create Card</p>
                        <div class="title mb-4">
                            <h1>Create Card</h1>
                        </div>
                        <form id="createCardForm" method="POST" action="" enctype="multipart/form-data">
                            @csrf
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
                                                <input type="file" name="foto" id="image" multiple
                                                    data-max-file-size="3MB">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group pt-2">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="deskripsi" rows="5"
                                            placeholder="hanya untuk membantu merapihkan teks silahkan upload gambar image terpisah"></textarea>
                                    </div>
                                    <div class="form-group pt-2">
                                        <label for="link_web">Web Link</label>
                                        <input type="text" class="form-control" id="link_web" name="link_web">
                                    </div>

                                    <div class="form-group mt-4">
                                        <button id="submitCard" type="submit" class="btn btn-primary w-100">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
    <script>
        $(document).ready(function() {
            const inputElement = document.querySelector('input[name="foto"]');
            FilePond.registerPlugin(FilePondPluginImagePreview);
            const pond = FilePond.create(inputElement);

            $('#createCardForm').submit(function(e) {
                e.preventDefault();

                var data = new FormData(this);
                // data.append('judul', $('#judul').val());
                // data.append('deskripsi', $('#deskripsi').val());
                // data.append('link_web', $('#link_web').val());

                var files = pond.getFiles();
                if (files && !files.length == 0) {
                    // console.log("ada file");
                    files.forEach((file) => {
                        data.append('files[]', file.file)
                    })
                }

                console.log(data)

                $.ajax({
                    type: "POST",
                    url: '{{ route('dashboard.store.card') }}',
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success === 1) {
                            Swal.fire({
                                title: 'Pesan dari bangjoy',
                                text: 'Mantap bro thumbnail berhasil di create.',
                                icon: 'success',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr
                            .responseText);
                        Swal.fire({
                            title: 'Pesan dari bangjoy',
                            text: 'Waduh tumbnail nya belum sesuai bro.',
                            icon: 'error',
                        });
                    }
                });
            });

        });
    </script>
@endpush
