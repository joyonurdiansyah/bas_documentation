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
                {{-- card nya nanti kesini --}}
            </div>
            <div class="row justify-content-center mt-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="col-md-12 inputBox_container">
                    <svg class="search_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" alt="search icon">
                        <path
                            d="M46.599 46.599a4.498 4.498 0 0 1-6.363 0l-7.941-7.941C29.028 40.749 25.167 42 21 42 9.402 42 0 32.598 0 21S9.402 0 21 0s21 9.402 21 21c0 4.167-1.251 8.028-3.342 11.295l7.941 7.941a4.498 4.498 0 0 1 0 6.363zM21 6C12.717 6 6 12.714 6 21s6.717 15 15 15c8.286 0 15-6.714 15-15S29.286 6 21 6z">
                        </path>
                    </svg>
                    <input class="inputBox" id="searchInput" type="text" class="form-control"
                        placeholder="Cari berdasarkan ID atau nama card" aria-label="Search">
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

@push('after-style')
    <style>
        .inputBox_container {
            display: flex;
            align-items: center;
            flex-direction: row;
            max-width: 30rem;
            /* Ubah max-width sesuai kebutuhan */
            /* width: fit-content;
                                        height: fit-content; */
            background-color: #5c6370;
            border-radius: 0.8em;
            overflow: hidden;
        }

        .search_icon {
            height: 1em;
            padding: 0 0.5em 0 0.8em;
            fill: #abb2bf;
        }

        .inputBox {
            background-color: transparent;
            color: #ffffff;
            outline: none;
            width: 100%;
            border: 0;
            padding: 0.7em 1.5em 0.7em 0.8em;
            font-size: 1em;
        }

        ::placeholder {
            color: #abb2bf;
        }
    </style>
@endpush

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
