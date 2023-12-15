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
@endpush

@section('content')

    {{-- section form --}}

    <!-- Section 2 -->
    <div id="content-wrapper" data-aos="fade-up" data-aos-delay="300">
        <!-- Section 1 -->
        <div class="container mt-4">
            <div class="row-gy-4">
                <div class="col-md-12">
                    <p><a href="{{ url('/dashboard-admin/dashboard-utama') }}">Dashboard</a> > Create FAQ</p>
                    <div class="title mb-4">
                        <h1>Create FAQ</h1>
                    </div>
                </div>
            </div>
        </div>
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
                                        data-target="#faqModal">+ Tambah faq</button>
                                </div>
                            </div>


                            <div id="cardPost">
                                {{-- append card disini  --}}
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="p-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive" id="dataDokumentasi">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Foto</th>
                                                                <th>Question</th>
                                                                <th>Answer</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data->faq as $_item)
                                                                <tr>
                                                                    <td class="col-md-1">{{ $_item->id }}</td>
                                                                    <td>
                                                                        <img src="{{ asset($_item->foto) }}" alt="Foto"
                                                                            width="20" style="max-width: 40%;">
                                                                    </td>
                                                                    <td class="col-md-3">{{ $_item->question }}</td>
                                                                    <td class="col-md-3">{{ $_item->answer }}</td>
                                                                    <td class="col-md-2">
                                                                        <button type="button"
                                                                            class="btn btn-danger ml-2 ml-n2 buat-sublangkah-btn"
                                                                            style="margin-right: 30px;"
                                                                            onClick="showDeleteFaq('{{ $_item->id }}')">
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>

    {{-- delete modal --}}
    <div class="modal fade" id="deleteFaqModal" tabindex="-1" aria-labelledby="deleteFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('dashboard.delete.faq') }}" method="post">
                    <input type="hidden" name="id_faq" id="id_faq">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteFaqModalLabel">Konfirmasi Penghapusan</h5>
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

    {{-- modal faq --}}
    <div class="modal fade" id="faqModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="faqModalLabel">Tambah Faq</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="faqForm" action="{{ route('dashboard.store.faq') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_docs" value="{{ $data->id }}">
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea class="form-control" id="answer" name="answer" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <input required type="file" name="foto" id="image" multiple
                                data-max-file-size="3MB">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="faqButton">Buat</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif

        @if (session('error'))
            toastr.error('{{ session('error') }}');
        @endif

        $("#faqButton").click(function() {
            $("#faqForm").submit();
        });

        function showDeleteFaq(id_faq) {
            const deleteFaqModal = new bootstrap.Modal(document.getElementById('deleteFaqModal'))
            deleteFaqModal.show()

            $('#id_faq').val(id_faq);
        }

        // faq submit
        $(document).ready(function() {
            const inputElement = document.querySelector('input[name="foto"]');
            FilePond.registerPlugin(FilePondPluginImagePreview);
            const pond = FilePond.create(inputElement);

            $('#faqForm').on('submit', function(e) {
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
                    url: '{{ route('dashboard.store.faq') }}',
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

            $('#faqModal').on('show.bs.modal', function() {
                $(this).addClass('fade');
            });
        });
    </script>
@endpush
