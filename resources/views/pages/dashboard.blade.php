@extends('layouts.app-dashboard')

{{-- set title --}}
@section('title', 'sigra')

@push('after-style')
    {{-- venobox image view --}}
    <link rel="stylesheet" href="venobox/venobox.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.css">
    <style>
        .inputBox_container {
            display: flex;
            align-items: center;
            flex-direction: row;
            max-width: 30rem;
            /* Ubah max-width sesuai kebutuhan */
            /* width: fit-content;                                                                                                                                                                   height: fit-content; */
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

        /* animasi fade in / fade out card */
        .card-fade-in {
            animation: fadeIn 0.5s ease-in-out forwards;
            opacity: 0;
        }

        .card-fade-out {
            animation: fadeOut 0.5s ease-in-out forwards;
            opacity: 1;
        }

        #particles-js {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 180%;
            z-index: -1;
            /* Ini akan menjadikan elemen di belakang elemen lainnya */
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
@endpush

@section('content')

    <section id="step_1" class="full-height px-lg-5">
        <div id="particles-js"></div>
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
                        placeholder="Cari berdasarkan nama user manual" aria-label="Search">
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
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
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
                                    <a href="{{ url('') }}/${dokumen.slug}" class="link-custom">Baca User Manual</a>
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
                            card.classList.add('card-fade-in');
                            card.style.display = 'block';
                        } else {
                            card.classList.add('card-fade-out');
                            setTimeout(() => {
                                card.style.display = 'none';
                                card.classList.remove('card-fade-out');
                            }, 500);
                        }
                    }
                });
            });
        }
    </script>
    {{-- particle js --}}
    <script>
        $(document).ready(function() {
            // Inisialisasi efek Particle.js
            particlesJS('particles-js', {
                particles: {
                    number: {
                        value: 80,
                        density: {
                            enable: true,
                            value_area: 800
                        }
                    },
                    color: {
                        value: '#ffffff'
                    },
                    shape: {
                        type: 'circle',
                        stroke: {
                            width: 0,
                            color: '#000000'
                        },
                        polygon: {
                            nb_sides: 5
                        }
                    },
                    opacity: {
                        value: 0.5,
                        random: false,
                        anim: {
                            enable: false,
                            speed: 1,
                            opacity_min: 0.1,
                            sync: false
                        }
                    },
                    size: {
                        value: 3,
                        random: true,
                        anim: {
                            enable: false,
                            speed: 40,
                            size_min: 0.1,
                            sync: false
                        }
                    },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: '#ffffff',
                        opacity: 0.4,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 6,
                        direction: 'none',
                        random: false,
                        straight: false,
                        out_mode: 'out',
                        bounce: false,
                        attract: {
                            enable: false,
                            rotateX: 600,
                            rotateY: 1200
                        }
                    }
                },
                interactivity: {
                    detect_on: 'canvas',
                    events: {
                        onhover: {
                            enable: true,
                            mode: 'grab'
                        },
                        onclick: {
                            enable: true,
                            mode: 'push'
                        },
                        resize: true
                    },
                    modes: {
                        grab: {
                            distance: 140,
                            line_linked: {
                                opacity: 1
                            }
                        },
                        bubble: {
                            distance: 400,
                            size: 40,
                            duration: 2,
                            opacity: 8,
                            speed: 3
                        },
                        repulse: {
                            distance: 200,
                            duration: 0.4
                        },
                        push: {
                            particles_nb: 4
                        },
                        remove: {
                            particles_nb: 2
                        }
                    }
                },
                retina_detect: true
            });
        });
    </script>
@endpush
