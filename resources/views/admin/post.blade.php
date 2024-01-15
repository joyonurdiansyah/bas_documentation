@extends('layouts.app-admin')

{{-- set title --}}
@section('title', 'post')

@push('after-style')
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    <style>
        .image-frame {
            border: 2px solid #000;
            padding: 10px;
            background-image: url('');
            background-size: cover;
            position: relative;
        }

        .modal-title {
            color: #14f7a8 !important;
            font-weight: 600 !important;
            text-align: center;
        }

        .modal-body p {
            color: #040404 !important;
            font-weight: 400 !important;
        }

        .modal-body {
            color: #040404 !important;
            font-weight: 400 !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tinymce@6.7.0/skins/ui/oxide/content.min.css" rel="stylesheet">
@endpush

@section('content')

    {{-- section form --}}

    <!-- Section 2 -->
    <div id="content-wrapper" data-aos="fade-up" data-aos-delay="300">
        <div class="container mt-4">
            <div class="row-gy-4">
                <div class="col-md-12">
                    <p><a href="{{ url('/dashboard-admin/dashboard-utama') }}">Dashboard</a> > Create POST</p>
                    <div class="title mb-4">
                        <h1>Create POST</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section 1 -->
        <section id="docs_keterangan" class="mt-4">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="image-frame">
                                                <img src="{{ asset($data->foto) }}" alt="Gambar" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 style="color: black; font-weight: bold;">{{ $data->judul }}</h3>
                                            <div style="color: black; font-weight: 600;" class="pt-4">
                                                {!! $data->deskripsi !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2 -->

        <section class="pb-4 mt-4" id="table_1">
            <section id="additional" class="px-lg-5">
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-md-12">
                            <!-- Tambahkan tombol di luar card, di sebelah kanan -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Tombol di sebelah kanan -->
                                </div>
                                <div class="col-md-6 mb-4">
                                    <button style="float: right;" class="btn btn-primary" data-toggle="modal"
                                        data-target="#langkahModal">+ Tambah Langkah</button>
                                </div>
                            </div>


                            <div id="cardPost">
                                {{-- append card disini  --}}
                                @foreach ($data->langkah as $item)
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-end">
                                                <button type="button"
                                                    class="btn btn-success ml-2 ml-n2 buat-sublangkah-btn"
                                                    style="margin-right: 30px;"
                                                    onClick="showCreateSubLangkahModal('{{ $item->id }}')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger mr-2 mr-n2 buat-sublangkah-btn"
                                                    style="margin-right: 30px;"
                                                    onClick="showDeleteLangkah('{{ $item->id }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="p-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-responsive" id="dataDokumentasi">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Foto</th>
                                                                    <th>Judul</th>
                                                                    <th>deskripsi</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($item->subLangkah as $_item)
                                                                    <tr>
                                                                        <td>{{ $_item->id }}</td>
                                                                        <td>
                                                                            <img src="{{ asset('langkah/post/' . $_item->foto) }}"
                                                                                alt="Foto" width="80"
                                                                                style="max-width: 80%;">
                                                                        </td>
                                                                        <td class="col-md-2">{{ $_item->judul }}</td>
                                                                        <td class="col-md-2">{{ $_item->keterangan }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn btn-danger ml-2 ml-n2 buat-sublangkah-btn"
                                                                                style="margin-right: 30px;"
                                                                                onClick="showDeleteSubLangkah('{{ $_item->id }}')">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>

    <div class="modal fade" id="langkahModal" tabindex="-1" aria-labelledby="langkahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">PESAN DARI BANGJOY</h4>
                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    @php
                        $lastLangkah = $data->langkah->last();
                        $urutan = 1;
                        if ($lastLangkah) {
                            $urutan = $lastLangkah->urutan + 1;
                        }
                    @endphp
                    <form id="langkahForm" action="{{ route('dashboard.store.langkah') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_docs" value="{{ $data->id }}" />
                        <input type="hidden" name="urutan" value="{{ $urutan }}" />
                        <p>Apakah anda yakin ingin membuat Langkah?</p>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="buatButton">Buat</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sublangkahModal" tabindex="-1" aria-labelledby="sublangkahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">FORM TAMBAH SUBLANGKAH</h4>
                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="sublangkahForm" action="{{ route('dashboard.store.sublangkah') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_langkah" id="id_langkah">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" style="" id="keterangan" name="keterangan" rows="3" required></textarea>
                            <div id="keterangan-tinymce"></div>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input required type="file" name="foto" id="image" multiple
                                data-max-file-size="3MB">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="sublangkahButton">Buat</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteSublangkahModal" tabindex="-1" aria-labelledby="deleteSublangkahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('dashboard.delete.sublangkah') }}" method="post">
                    <input type="hidden" name="id_sub_langkah" id="id-sub-langkah">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteSublangkahModalLabel">KONFIRMASI PENGHAPUSAN</h5>
                        <button type="button" class="btn-close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        @csrf
                        @method('post')
                        <button type="submit" class="btn btn-success">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteLangkahModal" tabindex="-1" aria-labelledby="deleteLangkahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('dashboard.delete.langkah') }}" method="post">
                    <input type="hidden" name="id_langkah_card" id="id_langkah_card">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteLangkahModalLabel">KONFIRMASI PENGHAPUSAN</h5>
                        <button type="button" class="btn-close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        @csrf
                        @method('post')
                        <button type="submit" class="btn btn-success">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6.7.0/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: '#keterangan-tinymce',
            menubar: false,
            setup: function(editor) {
                editor.on('change', function(e) {
                    editor.save();

                    // Get value and store to #keterangan
                    var keterangan = editor.getContent();
                    $('#keterangan').val(keterangan);
                });
            },
            // Smaller height
            height: 250,
        })

        //
    </script>

    <script>
        $(document).ready(function() {
            $("#buatButton").click(function() {
                $("#langkahForm").submit();
            });

        });

        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif

        @if (session('error'))
            toastr.error('{{ session('error') }}');
        @endif

        function showCreateSubLangkahModal(id_langkah) {
            const sublangkahModal = new bootstrap.Modal(document.getElementById('sublangkahModal'))
            sublangkahModal.show()

            $('#id_langkah').val(id_langkah);
        }

        function showDeleteSubLangkah(id_sub_langkah) {
            const sublangkahModal = new bootstrap.Modal(document.getElementById('deleteSublangkahModal'))
            sublangkahModal.show()

            $('#id-sub-langkah').val(id_sub_langkah);
        }

        function showDeleteLangkah(id_langkah_card) {
            const sublangkahModal = new bootstrap.Modal(document.getElementById('deleteLangkahModal'))
            sublangkahModal.show()

            $('#id_langkah_card').val(id_langkah_card);
        }
    </script>

    <script>
        // submit langkah
        $("#sublangkahButton").click(function() {
            $("#sublangkahForm").submit();
        });

        // submit button
        $(document).ready(function() {
            const inputElement = document.querySelector('input[name="foto"]');
            FilePond.registerPlugin(FilePondPluginImagePreview);
            const pond = FilePond.create(inputElement);

            $('#sublangkahForm').submit(function(e) {
                e.preventDefault();

                var data = new FormData(this);

                var files = pond.getFiles();
                if (files && !files.length == 0) {
                    files.forEach((file) => {
                        data.append('files[]', file.file)
                    })
                }

                console.log(data)

                $.ajax({
                    type: "POST",
                    url: '{{ route('dashboard.store.sublangkah') }}',
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success === 1) {
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                            toastr.success('Mantap bro thumbnail berhasil di create.',
                                'Pesan dari bangjoy');
                        } else {
                            toastr.error(response.message, 'Gagal');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        toastr.error('Waduh tumbnail nya belum sesuai bro.',
                            'Pesan dari bangjoy');
                    }
                });
            });

            $(document).ready(function() {
                $('#langkahModal, #sublangkahModal').on('show.bs.modal', function() {
                    $(this).addClass('fade');
                });
            });

        });
    </script>
@endpush
