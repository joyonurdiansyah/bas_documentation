@extends('layouts.app-dashboard')

{{-- set title --}}
@section('title', 'sigra')

@section('content')

    <section id="step_1" class="full-height px-lg-5">
        <div class=" text-center" data-aos="fade-up" data-aos-delay="300">
            <h1>Cari Dokumentasi Anda Disini</h1>
        </div>
        <div class="container">
            <div class="row pb-4" data-aos="fade-up">
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <input id="searchInput" type="text" class="form-control"
                        placeholder="Cari berdasarkan ID atau nama kartu" aria-label="Search">
                </div>
            </div>
            <div class="row justify-content-center">
                <div id="masuklibur" class="col-md-4 mt-4" data-aos="fade-up">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="{{ asset('templates/assets/images/login sigra.png') }}"
                                alt="">
                        </div>
                        <div class="card-custom-content p-3">
                            <h4>Dokumentasi Masuk Hari Libur</h4>
                            <p>Dokumentasi ini berisikan pembuatan data karyawan yang ingin mengajukan masuk shift di hari
                                libur
                            </p>
                            <a href="http://172.21.5.105/" class="link-custom">Baca Dokumentasi</a>
                        </div>
                    </div>
                </div>

                <div id="eklinik" class="col-md-4 mt-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="{{ asset('templates/assets/images/menu sigra.png') }}"
                                alt="">
                        </div>
                        <div class="card-custom-content p-3">
                            <h4>Dokumentasi E-Klinik</h4>
                            <p>Dokumentasi ini menjelaskan terkait karyawan yang ingin melakukan skd pengajuan obat
                            </p>
                            <a href="http://172.21.5.105/" class="link-custom">Baca Dokumentasi</a>
                        </div>
                    </div>
                </div>
                <div id="masteruser" class="col-md-4 mt-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="{{ asset('templates/assets/images/menu sigra.png') }}"
                                alt="">
                        </div>
                        <div class="card-custom-content p-3">
                            <h4>Dokumentasi Master User</h4>
                            <p>Dokumentasi Ini berisikan tentang Role Admin yang dapat mengatur capability user mengelola
                                sistem
                            </p>
                            <a href="http://172.21.5.105/" class="link-custom">Baca Dokumentasi</a>
                        </div>
                    </div>
                </div>
                <div id="ecafesedaap" class="col-md-4 mt-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="{{ asset('templates/assets/images/menu sigra.png') }}"
                                alt="">
                        </div>
                        <div class="card-custom-content p-3">
                            <h4>Dokumentasi E-cafesedaap</h4>
                            <p>Dokumentasi ini berisikan terkait karyawan mitra kerja yang melakukan tapping makan sesuai
                                dengan shift
                            </p>
                            <a href="http://172.21.5.105/" class="link-custom">Baca Dokumentasi</a>
                        </div>
                    </div>
                </div>

                <div id="edoc" class="col-md-4 mt-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="{{ asset('templates/assets/images/menu sigra.png') }}"
                                alt="">
                        </div>
                        <div class="card-custom-content p-3">
                            <h4>Dokumentasi E-Doc</h4>
                            <p>Dokumentasi ini berisikan terkait keluar masuk nya barang atau dokumen
                            </p>
                            <a href="http://172.21.5.105/" class="link-custom">Baca Dokumentasi</a>
                        </div>
                    </div>
                </div>

                <div id="sigra" class="col-md-4 mt-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="{{ asset('templates/assets/images/menu sigra.png') }}"
                                alt="">
                        </div>
                        <div class="card-custom-content p-3">
                            <h4>Dokumentasi Sigra</h4>
                            <p>Dokumentasi ini berisikan tentang pengurusan izin dan pembuatan sertifikasi
                            </p>
                            <a href="{{ url('sigra/index') }}" class="link-custom">Baca Dokumentasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('after-script')
    <script script>
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('.col-md-4');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase().trim();

            cards.forEach(card => {
                const cardTitle = card.querySelector('h4').textContent.toLowerCase();

                if (cardTitle.includes(searchTerm) || card.id.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
@endpush
