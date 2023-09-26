@extends('layouts.app-sigra')

{{-- set title --}}
@section('title', 'sigra')

@push('after-style')
    <style>

    </style>
@endpush

@section('content')
    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper">
        <!-- opening -->
        <section id="opening" class="full-height px-lg-5">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <h1 class="display-4 fw-bold" data-aos="fade-up">WELCOME TO <span
                                class="text-brand">{{ $data->judul }}</span> AT PRAKARSA ALAM SEGAR</h1>
                        <div class="lead mt-2 mb-4" data-aos="fade-up" data-aos-delay="300">{!! $data->deskripsi !!}</div>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <a href="http://172.21.5.105/" class="btn btn-brand me-3">Sudah paham, lanjut ke web Sigra!</a>
                            <a href="#step_1" class="link-custom">Klik melanjutkan tutorial</a>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-custom-image laptop-sigra">
                            <img class="mockup-sigra" src="{{ asset('templates/assets/images/mockup-user-manual.png') }}"
                                alt="laptop-sigra">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- //opening -->

        @foreach ($data->langkah as $item)
            <!-- step 1 -->
            <section id="step_{{ $item->urutan }}" class="full-height px-lg-5">
                <div class="container">

                    {{-- <div class="row pb-4" data-aos="fade-up">
                        <div class="col-lg-8">
                            <h6 class="text-brand">Langkah pertama lakukan login</h6>
                            <h1>Halaman Login dan Home</h1>
                        </div>
                    </div> --}}
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
                                        <img class="rounded-4" src="{{ asset('templates/assets/images/login sigra.png') }} "
                                            alt="">
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

                        {{-- <div class="col-md-12 mt-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="row pb-4" data-aos="fade-up">
                                <div class="col-lg-8">
                                    <h6 class="text-brand">Halaman Menu</h6>
                                </div>
                            </div>
                            <div class="card-custom rounded-4 bg-base shadow-effect">
                                <div class="card-custom-image rounded-4">
                                    <img class="rounded-4" src="{{ asset('templates/assets/images/menu sigra.png') }}"
                                        alt="">
                                </div>
                                <div class="card-custom-content p-4">
                                    <h4>1.1 Halaman Menu Sigra</h4>
                                    <p>Masuk ke halaman menu sigra dan pada pilihan option menu sigra, pilih sesuai dengan
                                        jenis nya</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
            </section>
        @endforeach


        <!-- step_2 -->
        {{-- <section id="step_2" class="full-height px-lg-5">
            <div class="container">

                <div class="row pb-4" data-aos="fade-up">
                    <div class="col-lg-8">
                        <h6 class="text-brand">Langkah kedua buat pengurusan izin dan sertifikasi</h6>
                        <h1>Menu dashboard legalitas</h1>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <!-- Menggunakan justify-content-center untuk mengatur ke tengah -->
                    <div class="col-md-12" data-aos="fade-up">
                        <div class="row pb-4" data-aos="fade-up">
                        </div>
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4" src="{{ asset('templates/assets/images/menu sigra legalitas.png') }}"
                                    alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <h4>2. Halaman dashboard Sigra Legalitas</h4>
                                <p>disini anda akan dapat melihat, data terkait pengurusan izin dan sertifikasi yang
                                    telah dibuat, silah coba untuk create perizinan baru</p>
                                <a href="http://172.21.5.105/sigra/legalitas" class="link-custom">login dashboard</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4" data-aos="fade-up">
                        <div class="row pb-4" data-aos="fade-up">
                        </div>
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4" src="{{ asset('templates/assets/images/buat perizinan.png') }}"
                                    alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <h4>2.1 Create Perizinan Legalitas</h4>
                                <p>disini anda dapat menuliskan perizinan legalitas terkait nama perizinan dan
                                    perusahaan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4" data-aos="fade-up">
                        <div class="row pb-4" data-aos="fade-up">
                        </div>
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4"
                                    src="{{ asset('templates/assets/images/perizinan sudah di create.png') }}"
                                    alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <h4>2.2 Perizinan sudah di create</h4>
                                <p>setelah anda berhasil membuat perizinan, arahkan cursor anda ke nama perizinan yang
                                    anda buat lalu klik</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4" data-aos="fade-up">
                        <div class="row pb-4" data-aos="fade-up">
                        </div>
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4" src="{{ asset('templates/assets/images/buat sertifikat.png') }}"
                                    alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <h4>2.3 buat sertifikat</h4>
                                <p>setelah anda mengklik nama perizinan yang anda buat, lanjut buat sertifikat isikan
                                    detail harga terkait harga pengurusan izin berserta masa berlaku</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4" data-aos="fade-up">
                        <div class="row pb-4" data-aos="fade-up">
                        </div>
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4"
                                    src="{{ asset('templates/assets/images/sertifikat sudah di create.png') }} "
                                    alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <h4>2.4 sertifikasi sudah di create</h4>
                                <p>selamat anda telah berhasil membuat pengurusan izin dan sertifikasi, pastikan setelah
                                    ini untuk tetap mengecek masa berlaku sertifikat nya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- step_2 -->

        <!-- step_3 -->
        <section id="step_3" class="full-height px-lg-5">
            <div class="container">
                <div class="row gy-4">

                    <div class="col-md-6" data-aos="fade-up">
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-content p-4">
                                <h4>Bagaimana jika saya butuh edit renewal atau memperbaiki pengurusan izin?</h4>
                                <p>pada menu sigra anda akan di arahkan ke menu edit perizinan dan sertifikasi untuk
                                    jelasnya silahkan scroll kebawah</p>
                                <div class="card-custom-image rounded-4">
                                    <img class="rounded-4"
                                        src="{{ asset('templates/assets/images/menu sigra legalitas.png') }}"
                                        alt="">
                                </div>
                                <div class="mt-4">
                                    <a href="http://172.21.5.105/" class="link-custom">sudah paham, lewati >></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="rocket-container">
                            <div class="rocket">
                                <img src="{{ asset('templates/assets/images/rocket.png') }}" alt="Rocket">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pb-4 pt-4" data-aos="fade-up">
                    <div class="col-lg-8">
                        <h6 class="text-brand">Halaman Edit Perizinan</h6>
                        <h1>Fitur edit legalitas</h1>
                    </div>
                </div>

                <div class="row justify-content-center mt-4">
                    <!-- Menggunakan justify-content-center untuk mengatur ke tengah -->
                    <div class="col-md-12 section-3" data-aos="fade-up">
                        <div class="row pb-4" data-aos="fade-up">
                        </div>
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4" src="{{ asset('templates/assets/images/edit perizinan.png') }}"
                                    alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <h4>3.1 Edit Perizinan Legalitas</h4>
                                <p>anda dapat melakukan perubahan pengurusan izin dan nama perusahaan disini, jika sudah
                                    sesuai klik simpan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4" data-aos="fade-up">
                        <div class="row pb-4" data-aos="fade-up">
                        </div>
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4" src="{{ asset('templates/assets/images/edit sertifikat.png') }} "
                                    alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <h4>3.2 Edit sertifikasi</h4>
                                <p>setelah anda berhasil membuat perizinan,</p>
                                <ol>
                                    <ul> 1. arahkan cursor anda ke nama perizinan yang anda buat dan</ul>
                                    <ul> 2. lalu pilih sertifikasi yang hendak di edit </ul>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4" data-aos="fade-up">
                        <div class="row pb-4" data-aos="fade-up">
                        </div>
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4"
                                    src="{{ asset('./templates/assets/images/edit sertifikat 2.png') }}" alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <h4>3.3 form edit sertifikat</h4>
                                <p>setelah mengklik button edit tadi anda akan di arahkan pada form yang berisi data
                                    sertifikat yang sudah ada, dan bisa anda sesuaikan sertifikasi nya disini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //step_3 -->

        <!-- step_4 -->
        <section id="step_4" class="full-height px-lg-5">
            <div class="container">
                <div class="container">
                    <div class="row gy-4 mb-4">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="card-custom-image laptop-sigra">
                                <img class="mockup-sigra"
                                    src="{{ asset('templates/assets/images/mockup tablet legalita.png') }}"
                                    alt="laptop-sigra">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="display-4 fw-bold" data-aos="fade-up">Bagaimana jika saya ingin menghapus
                                perizinan atau sertifikasi?</h1>
                        </div>
                    </div>
                </div>


                <div class="accordion" id="accordionExample" data-aos="fade-up">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Bagaimana jika perizinan dan sertifikasi saya sudah tidak aktif?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row gy-4 section-4">
                                    <div class="col-md-8" data-aos="fade-up">
                                        <div class="card-custom rounded-4 bg-base shadow-effect">
                                            <div class="card-custom-content p-4">
                                                <h4>Bagaimana jika perizinan dan sertifikasi saya sudah tidak aktif?</h4>
                                                <p>4.1 pada dashboard legalitas anda dapat mengklik button delete untuk
                                                    menghapus perizinan dan sertifikasi</p>
                                                <div class="card-custom-image rounded-4">
                                                    <img class="rounded-4"
                                                        src="{{ asset('templates/assets/images/delete all.png ') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                        <div class="rocket-container">
                                            <div class="rocket">
                                                <img src="{{ asset('templates/assets/images/astronot left.png') }}"
                                                    alt="Rocket">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
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
                                                <h4>Bagaimana jika saya ingin menghapus hanya sertifikasi yang tidak aktif?
                                                </h4>
                                                <p>4.2 klik pada nama dokumen, lalu nanti akan muncul tampilan seperti ini
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
                    </div>

                </div>


            </div>
        </section> --}}

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
@endsection

@push('after-style')
    {{-- blom --}}
@endpush
