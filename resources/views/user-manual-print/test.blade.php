<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Body */
        body {
            background-color: #022a30;
            color: #b6cbce;
            font-family: "Bai Jamjuree", sans-serif;
        }

        /* Headings */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #eef3db;
            font-weight: 700;
        }

        /* Links */
        a {
            text-decoration: none;
            color: #b6cbce;
            transition: all 0.4s ease;
        }

        a:hover {
            color: #e0f780;
        }

        /* Images */
        img {
            width: 100%;
        }

        /* Text with Brand Color */
        .text-brand {
            color: #e0f780;
        }

        /* Background Color */
        .bg-base {
            background-color: #022d33;
        }

        /* Full Height Container */
        .full-height {
            min-height: 100vh;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-top: 80px;
            padding-bottom: 80px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        /* Shadow Effect */
        .shadow-effect {
            transition: all 0.5s;
        }

        .shadow-effect:hover {
            box-shadow: -6px 6px 0 0 #e0f780;
        }

        /* Icon Box */
        .iconbox {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            background-color: #e0f780;
            color: #022d33;
        }

        /* Navbar */
        .navbar {
            background-color: #022d33;
        }

        .navbar .nav-link {
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
        }

        .navbar .nav-link:hover {
            color: #e0f780;
        }

        .navbar .nav-link.active {
            color: #e0f780;
        }

        /* Media Query for Navbar */
        @media (min-width: 992px) {
            .navbar {
                min-height: 100vh;
                width: 240px;
                background: linear-gradient(rgba(3, 63, 71, 0.8), rgba(3, 63, 71, 0.8)), url(../images/sidebar-img2.jpg);
                background-size: cover;
                background-position: center;
            }

            .navbar-brand img {
                border: 8px solid #e0f780;
            }

            /* Content Wrapper */
            #content-wrapper {
                padding-left: 240px;
            }
        }

        /* Buttons */
        .btn {
            padding: 12px 28px;
            font-weight: 700;
        }

        .btn-brand {
            background-color: #e0f780;
            border-color: #e0f780;
            color: #022d33;
        }

        .btn-brand:hover,
        .btn-brand:focus {
            background-color: #deff58;
            color: #022d33;
            border-color: #deff58;
        }

        /* Custom Link */
        .link-custom {
            font-weight: 700;
            position: relative;
        }

        .link-custom::after {
            content: "";
            width: 0%;
            height: 2px;
            background-color: #e0f780;
            position: absolute;
            left: 0;
            top: 110%;
            transition: all 0.4s;
        }

        .link-custom:hover::after {
            width: 100%;
        }

        /* Custom Card */
        .card-custom .card-custom-image {
            overflow: hidden;
        }

        .card-custom .card-custom-image img {
            transition: all 0.4s ease;
        }

        .card-custom:hover .card-custom-image img {
            transform: scale(1.1);
        }

        /* Contact Form */
        #contact .form-control {
            background-color: #022d33;
            border-color: #022d33;
            color: #b6cbce;
        }

        #contact .form-control:focus {
            border-color: #e0f780;
            box-shadow: none;
        }

        #contact .form-control::placeholder {
            color: #b6cbce;
        }

        #contact input.form-control {
            height: 44px;
        }

        /* Social Icons */
        .social-icons {}

        .social-icons a {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #022d33;
            border-radius: 100px;
            font-size: 24px;
        }

        /* Section 3 and 4 Margins */
        .section-3 {
            margin-top: 25px;
        }

        .section-4 {
            margin-top: 180px;
        }

        /* Rocket and Laptop Animation */
        .rocket,
        .laptop-sigra {
            animation: rocketAnimation 2s infinite alternate;
        }

        /* Image Preview */
        .image-preview {
            width: 100%;
            max-width: 400px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        #preview-image {
            max-width: 100%;
            max-height: 300px;
        }

        @keyframes rocketAnimation {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container flex-lg-column">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto flex-lg-column text-lg-center">
                    <label for="tutorial">Guide 2 {{ $data->judul }}</label>
                    <li class="nav-item">
                        <a class="nav-link" href="#opening"></a>
                    </li>
                    @foreach ($data->langkah as $item)
                        @if ($item->subLangkah->isNotEmpty())
                            <li class="nav-item">
                                <a class="nav-link" href="#step_{{ $item->urutan }}">Langkah {{ $item->urutan }}</a>
                            </li>
                        @endif
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" href="#step_5">Langkah 5</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#step_6">Langkah 6</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Langkah 7</a>
                </li> -->

                </ul>
            </div>
        </div>
    </nav>
    <div id="content-wrapper">
        <!-- opening -->
        <section id="opening" class="full-height px-lg-5">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <h1 class="display-4 fw-bold" data-aos="fade-up">WELCOME TO <span
                                class="text-brand">{{ $data->judul }}</span> AT PRAKARSA ALAM SEGAR</h1>
                        <div class="lead mt-2 mb-4" data-aos="fade-up" data-aos-delay="300">{!! $data->deskripsi !!}
                        </div>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <a href="http://172.21.5.105/" class="btn btn-brand me-3">Sudah paham, lanjut ke web
                                Sigra!</a>
                            <a href="#step_1" class="link-custom">Klik melanjutkan tutorial</a>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-custom-image laptop-sigra">
                            {{-- <img class="mockup-sigra"
                                src="{{ asset('templates/assets/images/mockup-user-manual.png') }}" alt="laptop-sigra">
                            <div style="position: absolute; top: 0; left: 14.6%; top: 7%; z-index: 9;">
                                <img src="{{ asset($data->foto) }}" alt="Foto" style="width: 85%; height: 7.3cm;">
                            </div> --}}
                            <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path($data->foto))) }}"
                                style="width: 200px; height: 150px; padding-right: 50px; padding-left: 50px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- //opening langkah langkah -->
        @foreach ($data->langkah as $item)
            {{-- mencegah pembuatan section baru jika loop iteration adalah null --}}
            @if ($item->subLangkah->isNotEmpty())
                <!-- step 1 -->
                <section id="step_{{ $item->urutan }}" class="full-height px-lg-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach ($item->subLangkah as $_item)
                                <div class="col-md-12 mb-5" data-aos="fade-up">
                                    <div class="row pb-4" data-aos="fade-up">
                                        <div class="col-lg-8">
                                            <h6 class="text-brand">Halaman {{ $_item->judul }}</h6>
                                        </div>
                                    </div>
                                    <div class="card-custom rounded-4 bg-base shadow-effect">
                                        <div class="card-custom-image rounded-4">
                                            {{-- <img class="rounded-4"
                                                src="{{ asset('templates/assets/images/login sigra.png') }}"
                                                alt=""> --}}
                                        </div>
                                        <div class="card-custom-content p-4">
                                            <h4>1.{{ $loop->iteration }} Halaman {{ $_item->judul }}</h4>
                                            <p>{{ $_item->keterangan }}</p>
                                            @if ($_item->link_web != null)
                                                <a href="" class="link-custom">Lihat Halaman</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        @endforeach


        <!-- faq -->
        <section id="faq" class="full-height px-lg-5">
            <div class="container" data-aos="fade-up">
                <h1 class="text-center p-4 mb-4">Tanya Jawab (FAQ)</h1>
                <div class="accordion" id="accordionExample">
                    @foreach ($data->faq as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading_{{ $loop->iteration }}">
                                <button class="accordion-button @if ($loop->iteration != 1) collapsed @endif"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse_{{ $loop->iteration }}"
                                    @if ($loop->iteration == 1) aria-expanded="true" @endif
                                    aria-controls="collapse_{{ $loop->iteration }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapse_{{ $loop->iteration }}"
                                class="accordion-collapse collapse @if ($loop->iteration == 1) show @endif"
                                aria-labelledby="heading_{{ $loop->iteration }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($loop->iteration % 2 == 1)
                                        <div class="row gy-4 section-4">
                                            <div class="col-md-8" data-aos="fade-up">
                                                <div class="card-custom rounded-4 bg-base shadow-effect">
                                                    <div class="card-custom-content p-4">
                                                        <p>{{ $faq->answer }}</p>
                                                        <div class="card-custom-image rounded-4">
                                                            {{-- <img class="img-fluid rounded-4"
                                                                src="{{ asset($faq->foto) }}" alt=""> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                                <div class="rocket-container">
                                                    <div class="rocket">
                                                        {{-- <img class="img-fluid"
                                                            src="{{ asset('templates/assets/images/astronot left.png') }}"
                                                            alt="Rocket"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row gy-4 section-4">
                                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                                <div class="rocket-container">
                                                    <div class="rocket">
                                                        {{-- <img class="img-fluid"
                                                            src="{{ asset('templates/assets/images/astronot right.png') }}"
                                                            alt="Rocket"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8" data-aos="fade-up">
                                                <div class="card-custom rounded-4 bg-base shadow-effect">
                                                    <div class="card-custom-content p-4">
                                                        <p>{{ $faq->answer }}</p>
                                                        <div class="card-custom-image rounded-4">
                                                            {{-- <img class="img-fluid rounded-4"
                                                                src="{{ asset($faq->foto) }}" alt=""> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>

                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bagaimana jika saya ingin menghapus hanya sertifikasi yang tidak aktif?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row gy-4 section-4">
                                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                            <div class="rocket-container">
                                                <div class="rocket">
                                                    <img src="{{ asset('templates/assets/images/astronot right.png') }}"
                                                        alt="Rocket">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-8" data-aos="fade-up">
                                            <div class="card-custom rounded-4 bg-base shadow-effect">
                                                <div class="card-custom-content p-4">
                                                    <h4>Bagaimana jika saya ingin menghapus hanya sertifikasi yang tidak
                                                        aktif?
                                                    </h4>
                                                    <p>4.2 klik pada nama dokumen, lalu nanti akan muncul tampilan seperti
                                                        ini
                                                        dan
                                                        pilih pada sertifikasi yang akan di hapus</p>
                                                    <div class="card-custom-image rounded-4">
                                                        <img class="rounded-4"
                                                            src="{{ asset('templates/assets/images/delete only sertifikat.png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                </div>


            </div>
        </section>

        <!-- CONTACT -->
        <section id="contact" class="full-height px-lg-5">
            <div class="container">

                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 pb-4" data-aos="fade-up">
                        <h6 class="text-brand">Masih bingung?</h6>
                        <h1>Silahkan Ajukan pertanyaan
                        </h1>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="300">
                        <form action="#" class="row g-lg-3 gy-3">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="masukkan nik anda">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="masukkan nama anda">
                            </div>
                            <div class="form-group col-12">
                                <input type="text" class="form-control" placeholder="masukkan departemen">
                            </div>
                            <div class="form-group col-12">
                                <input type="text" class="form-control" placeholder="masukkan pertanyaan anda">
                            </div>
                            <div class="form-group col-12">
                                <textarea name="" rows="4" class="form-control" placeholder="detail pertanyaan"></textarea>
                            </div>
                            <div class="form-group col-12 d-grid">
                                <button type="submit" class="btn btn-brand">Kirim Pertanyaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- //CONTACT -->
    </div>
</body>

</html>
