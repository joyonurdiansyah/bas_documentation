@extends('layouts.app-sigra')

{{-- set title --}}
@section('title', $data->judul)

@push('after-style')
    <style>
        body {
            background-color: #022a30 !important;
            color: #b6cbce !important;
            font-family: "Bai Jamjuree", sans-serif;
        }

        .image-frame {
            border: 2px solid #000;
            padding: 10px;
            background-image: url('');
            background-size: cover;
            position: relative;
        }

        #scrollToTopButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            /* display: none; */
            z-index: 999;
        }

        #scrollToTopButton .btn-scroll-top {
            background-color: #007bff;
            /* Change to your preferred button color */
            color: #fff;
        }

        #scrollToTopButton .btn-scroll-top:hover {
            background-color: #0056b3;
            /* Change to the hover color */
        }

        #full-height {
            padding-top: 20px !important;
            padding-bottom: 20px !important
        }
    </style>
@endpush

@section('content')
    <!-- CONTENT WRAPPER -->
    <div onClick="window.print()" id="scrollToTopButton" class="btn-scroll-top">
        <a href="" class="btn btn-brand btn-lg">
            <i class="fas fa-file-pdf"></i> Cetak User Manual
        </a>
    </div>

    <div id="content-wrapper">
        <!-- opening -->
        <section id="opening" class="full-height px-lg-5">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <h1 class="display-4 fw-bold" data-aos="fade-up">User Manual <span
                                class="text-brand">{{ $data->judul }}</span></h1>
                        <div class="lead mt-2 mb-4" data-aos="fade-up" data-aos-delay="300">{!! $data->deskripsi !!}</div>
                        <div data-aos="fade-up" class="action-button-container" data-aos-delay="600">
                            <a href="{{ $data->link_web }}" class="btn btn-brand me-3">Buka Aplikasi</a>
                            @if($data->langkah->first() != null)
                                <a href="#step_{{ $data->langkah->first()->urutan }}" class="link-custom">Lanjut baca user manual</a>
                            @endif    
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-custom-image laptop-sigra">
                            <img class="mockup-sigra" src="{{ asset('templates/assets/images/mockup-user-manual.png') }}" alt="laptop-sigra">
                            <div style="position: absolute; top: 0; left: 15%; top: 7%; bottom: 40%; right: 16%; z-index: 9; background-color: #000">
                                <img src="{{ asset($data->foto) }}" alt="Foto" style="width: 100%; height: 100%">
                            </div>
                        </div>
                        <!-- <div class="card-custom-image laptop-sigra">
                            <img class="mockup-sigra" src="{{ asset('templates/assets/images/mockup-user-manual.png') }}"
                                alt="laptop-sigra">
                            <div style="position: absolute; top: 0; left: 14.6%; top: 7%; z-index: 9;">
                                <img src="{{ asset($data->foto) }}" alt="Foto" style="width: 85%; height: 7.3cm;">
                            </div>
                        </div> -->
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
                            <div class="row pb-4" data-aos="fade-up">
                                <div class="col-lg-8">
                                    <h6 class="text-brand">Langkah {{ $item->urutan }}</h6>
                                </div>
                            </div>
                            @foreach ($item->subLangkah->sortBy('created_at') as $_item)
                                <div class="col-md-12 mb-5" data-aos="fade-up">
                                    <div class="card-custom rounded-4 bg-base shadow-effect">
                                        <div class="card-custom-image rounded-4">
                                            <img class="rounded-4"
                                                src="{{ asset('langkah/post/'. $_item->foto) }}" alt="Foto langkah">
                                        </div>
                                        <div class="card-custom-content p-4">
                                            <h4>1.{{ $loop->iteration }} {{ $_item->judul }}</h4>
                                            <p>{!! $_item->keterangan !!}</p>
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
                                                            <img class="img-fluid rounded-4" src="{{ asset($faq->foto) }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                                <div class="rocket-container">
                                                    <div class="rocket">
                                                        <img class="img-fluid"
                                                            src="{{ asset('templates/assets/images/astronot left.png') }}"
                                                            alt="Rocket">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row gy-4 section-4">
                                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                                <div class="rocket-container">
                                                    <div class="rocket">
                                                        <img class="img-fluid"
                                                            src="{{ asset('templates/assets/images/astronot right.png') }}"
                                                            alt="Rocket">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8" data-aos="fade-up">
                                                <div class="card-custom rounded-4 bg-base shadow-effect">
                                                    <div class="card-custom-content p-4">
                                                        <p>{{ $faq->answer }}</p>
                                                        <div class="card-custom-image rounded-4">
                                                            <img class="img-fluid rounded-4"
                                                                src="{{ asset($faq->foto) }}" alt="">
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
        <!-- <section id="contact" class="full-height px-lg-5">
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
        </section> -->
        <!-- //CONTACT -->
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() < ($(document).height() - $(window).height()) - 100) {
                    $('#scrollToBottomButton').fadeIn();
                } else {
                    $('#scrollToBottomButton').fadeOut();
                }
            });

            $('#scrollToBottomButton').click(function() {
                $('html, body').animate({
                    scrollTop: $(document).height() - $(window).height()
                }, 800);
                return false;
            });
        });
    </script>
@endpush
