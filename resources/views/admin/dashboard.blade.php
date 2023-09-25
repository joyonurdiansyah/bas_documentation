@extends('layouts.app-admin')

{{-- set title --}}
@section('title', 'dashboard')

@push('after-style')
    <style>
        #dataDokumentasi {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #dataDokumentasi td,
        #dataDokumentasi th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #dataDokumentasi tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #dataDokumentasi tr:hover {
            background-color: #ddd;
        }

        #dataDokumentasi th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #049560;
            color: white;
        }

        .dataTables_wrapper .dataTables_paginate,
        .dataTables_length {
            padding-bottom: 10px;
        }

        /* venobox */
        .clickable-image {
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .clickable-image:hover {
            transform: scale(1.1);
        }

        .spinner {
            width: 40px;
            height: 40px;
            margin: 0 auto;
            border: 4px solid rgba(0, 128, 0, 0.2);
            border-top: 4px solid green;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endpush


@section('content')
    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper" data-aos="fade-up" data-aos-delay="300">
        <!-- opening -->
        <section id="opening" class="full-height px-lg-5">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <p>Dashboard > Table Dokumentasi</p>
                        <div class="card">
                            <div class="card-body">
                                <div class="p-4">
                                    <table class="table table-responsive" id="dataDokumentasi">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="col-md-1">ID</th>
                                                <th class="col-md-4">Foto</th>
                                                <th class="col-md-2">Judul</th>
                                                <th class="col-md-4">deskripsi</th>
                                                <th class="col-md-2">slug</th>
                                                <th class="col-md-2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
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
    <script>
        $(document).ready(function() {
            var table = $('#dataDokumentasi').DataTable({
                paging: true,
                responsive: true,
                ajax: {
                    url: "{{ route('dashboard.all.dokumentasi') }}",
                    type: 'GET',
                    dataSrc: 'data'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'foto',
                        render: function(data, type, row) {
                            return '<a href="' + data +
                                '" class="venobox" data-gall="myGallery" data-max-width="600"><img src="' +
                                data +
                                '" onclick="closeOverlay(this);" class="clickable-image" /></a>';
                        }
                    },
                    {
                        data: 'judul'
                    },
                    {
                        data: 'deskripsi'
                    },
                    {
                        data: 'link_web'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return '<a class="btn btn-sm btn-primary" href="{{ url('dashboard-admin/detail') }}/' +
                                data +
                                '"><i class="fas fa-eye"></i></a>'
                        }
                    }
                ]
            });

            // tambah function close venobox
        });
    </script>
@endpush
