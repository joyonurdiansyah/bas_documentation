<body data-bs-spy="scroll" data-bs-target=".navbar">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container flex-lg-column">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto flex-lg-column text-lg-center">
                    <label for="tutorial">Guide {{ $data->judul }}</label>
                    <li class="nav-item">
                        <a class="nav-link" href="#opening"></a>
                    </li>
                    @foreach ($data->langkah as $item)
                        <li class="nav-item">
                            <a class="nav-link" href="#step_{{ $item->urutan }}">Langkah {{ $item->urutan }}</a>
                        </li>
                    @endforeach
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
</body>
