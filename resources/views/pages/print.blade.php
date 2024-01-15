<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>{{ $data->judul }}</title>
    <style>
        body {
            background-color: #022a30 !important;
            color: #b6cbce !important;
            font-family: "Bai Jamjuree", sans-serif;
            padding: 0;
            margin: 0;
            height: 100vh
                /* Tambahkan baris ini untuk menghapus margin */
        }

        .text-custom {
            color: #e0f780;
        }

        .text-body-card {
            font-weight: bold;
            color: #ffffff
        }

        .text-header-card {
            font-weight: bold;
        }

        .btn-custom {
            background-color: #e0f780;
        }

        .card-custom-image {
            position: relative;
            overflow: hidden;
        }

        .card-body-custom {
            background-color: #022a30cf
        }

        .card-custom {
            background-color: #022a30;
            border-style: solid;
            border-width: 2px;
            border-color: #ffffff;
            border-radius: 5px;
        }

        .mockup-sigra {
            width: 100%;
            height: auto;
        }

        .user-photo-overlay {
            position: absolute;
            top: 7%;
            left: 15%;
            bottom: 40%;
            right: 16%;
            z-index: 9;
            background-color: #000;
            overflow: hidden;
        }

        .user-photo-overlay img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .section-margin {
            margin-bottom: 20rem;
        }
    </style>
</head>

<body>
    <div class="container p-5">
        <section class="h-100 pb-5">
            <div class="row pb-5 h-100">
                <div class="col">
                    <div class="d-flex flex-column">
                        <h1 class="display-4 font-weight-bold text-white">User Manual</h1>
                        <span class="display-4 font-weight-bold text-custom">{{ $data->judul }}</span>
                        <div class="h4 mt-2 my-5 w-100">{!! $data->deskripsi !!}</div>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <button href="{{ $data->link_web }}" class="btn btn-custom px-3 py-2">Buka Aplikasi</button>
                        @if ($data->langkah->first() != null)
                            <a href="#step_{{ $data->langkah->first()->urutan }}"
                                class="align-self-center text-white font-weight-bold p-2">Lanjut baca user
                                manual</a>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="card-custom-image laptop-sigra">
                        <img class="mockup-sigra"
                            src="{{ public_path('templates/assets/images/mockup-user-manual.png') }}"
                            alt="laptop-sigra">
                        <div class="user-photo-overlay">
                            <img src="{{ public_path($data->foto) }}" alt="Foto">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        @foreach ($data->langkah as $item)
            @if ($item->subLangkah->isNotEmpty())
                <section id="step_{{ $item->urutan }}" class="mt-5">
                    <div class="container py-1">
                        <div class="row py-5">
                            <div class="col-lg-8">
                                <h6 class="text-custom font-weight-bold">Langkah {{ $item->urutan }}</h6>
                            </div>
                        </div>
                        @foreach ($item->subLangkah->sortBy('created_at') as $_item)
                            <section class="section-margin py-3 d-flex justify-self-center">
                                <div class="d-flex align-self-center">
                                    <div class="row mb-5" data-aos="fade-up">
                                        <div class="col">
                                            <div class="rounded-4">
                                                <div class="card-custom-image rounded-4">
                                                    <img class="img-fluid img-thumbnail mt-3"
                                                        src="{{ public_path('langkah/post/' . $_item->foto) }}"
                                                        alt="Foto langkah" style="max-width: 60%; height: auto;">
                                                </div>
                                                <div class="card-custom-content p-4">
                                                    <h4 class="h2 font-weight-bold text-white">1.{{ $loop->iteration }}
                                                        {{ $_item->judul }}</h4>
                                                    <p class="h5">{!! $_item->keterangan !!}</p>
                                                    @if ($_item->link_web != null)
                                                        <a href="{{ $_item->link_web }}" class="link-custom">Lihat
                                                            Halaman</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endforeach
                    </div>
                </section>
            @endif
        @endforeach

        <section class="section-margin d-flex justify-content-center">
            <div>
                <h1 class="text-center mb-4 font-weight-bold text-white">Tanya Jawab (FAQ)</h1>
                @foreach ($data->faq as $faq)
                    <div class="card card-custom" style="margin-bottom: 35rem;">
                        <div class="card-header" id="heading_{{ $loop->iteration }}">
                            <h2 class="h3 text-primary text-header-card">{{ $faq->question }}</h2>
                        </div>
                        <div class="card-body card-body-custom">
                            <div class="row">
                                <div class="col">
                                    <p class="text-body-card">{{ $faq->answer }}</p>
                                    <div class="row">
                                        <div class="col">
                                            <img class="img-fluid rounded-4" src="{{ public_path($faq->foto) }}"
                                                alt="" style="max-width: 80%; height: auto;">
                                        </div>
                                        <div class="col">
                                            <img class="img-fluid"
                                                src="{{ public_path('templates/assets/images/astronot left.png') }}"
                                                alt="Rocket"
                                                style="max-width: 40%; height: auto; align-self: center;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>


    <!-- Pastikan Anda menyertakan jQuery dan Popper.js sebelum Bootstrap.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
