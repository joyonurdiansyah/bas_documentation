@extends('layouts.app-dashboard')

{{-- set title --}}
@section('title', 'sigra')

@push('after-style')
    {{-- venobox image view --}}
    <link rel="stylesheet" href="venobox/venobox.min.css" type="text/css" media="screen" />
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

@section('content')

    <section id="step_1" class="full-height px-lg-5">
        <div class=" text-center" data-aos="fade-up" data-aos-delay="300">
            <h1>Cari User Manual Anda Disini</h1>
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
                        placeholder="Cari berdasarkan nama dokumentasi" aria-label="Search">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="container">
                    <div class="row pb-4" data-aos="fade-up" id="dokumenCards">
                        {{-- card-card akan ditampilkan di sini --}}
                    </div>
                    <!-- ... kode lainnya ... -->
                </div>
            </div>
        </div>
    </section>

@endsection

@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/2.0.5/velocity.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('dashboard.all.dokumentasi') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        console.log(response);
                        // Loop through JSON data and create cards for each entry
                        $.each(response.data, function(index, dokumen) {
                            var cardHtml = `
                        <div class="col-md-4 mt-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="card-custom rounded-4 bg-base shadow-effect">
                                <div class="card-custom-image rounded-4">
                                    <img class="rounded-4" src="${dokumen.foto}" alt="">
                                </div>
                                <div class="card-custom-content p-3">
                                    <h4>${dokumen.judul}</h4>
                                    <p>${dokumen.deskripsi}</p>
                                    <a href="${dokumen.link_web}" class="link-custom">Baca Dokumentasi</a>
                                </div>
                            </div>
                        </div>
                    `;
                            // Append the card to the #dokumenCards container
                            $('#dokumenCards').append(cardHtml);
                        });

                        // Initialize the search input functionality
                        initSearch();
                    } else {
                        console.error('Gagal mengambil data dokumen.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan saat mengambil data dokumen: ' + error);
                }
            });
        });

        function initSearch() {
            const searchInput = document.getElementById('searchInput');
            const cards = document.querySelectorAll('.col-md-4');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase().trim();

                cards.forEach(card => {
                    const cardTitle = card.querySelector('h4');
                    if (cardTitle) {
                        const cardTitleText = cardTitle.textContent.toLowerCase();

                        if (cardTitleText.includes(searchTerm)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        }
    </script>
@endpush
