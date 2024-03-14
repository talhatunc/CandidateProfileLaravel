    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Yükleniyor...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5 d-block d-flex flex-column">
        <div class="row justify-content-between">
            <div class="col-10">
                <a href="{{ asset('/') }}" class="navbar-brand d-lg-none">
                    <img decoding="async" width="200" height="100" src="{{ asset('/') }}img/site_logo_birolAydin.webp" class="attachment-full size-full wp-image-1400" alt="" srcset="https://seninhakkin.istanbul/wp-content/uploads/2024/02/site_logo_birolAydin.webp 400w, https://seninhakkin.istanbul/wp-content/uploads/2024/02/site_logo_birolAydin-300x150.webp 300w" sizes="(max-width: 400px) 100vw, 400px">
                </a>
            </div>
            <div class="col-2 mt-4">
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <a href="{{ asset('/') }}" class="navbar-brand py-3 px-4 mx-3 d-none d-lg-block">
                <img decoding="async" width="200" height="100" src="{{ asset('/') }}img/site_logo_birolAydin.webp" class="attachment-full size-full wp-image-1400" alt="" srcset="https://seninhakkin.istanbul/wp-content/uploads/2024/02/site_logo_birolAydin.webp 400w, https://seninhakkin.istanbul/wp-content/uploads/2024/02/site_logo_birolAydin-300x150.webp 300w" sizes="(max-width: 400px) 100vw, 400px">
            </a>
            <div class="navbar-nav ms-auto mt-2 py-0">
                <a href="{{ asset('/') }}Projeler" class="nav-item nav-link">Projeler</a>
                <a href="{{ asset('/') }}Ozgecmis" class="nav-item nav-link">Özgeçmiş</a>

                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="nav-item nav-link dropdown-toggle" id="dropdownMedia" data-bs-toggle="dropdown" aria-expanded="false">
                        Medya
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownMedia">
                        <li><a class="dropdown-item" href="./Fotograflar">Fotoğraflar</a></li>
                        <li><a class="dropdown-item" href="./Videolar">Videolar</a></li>
                    </ul>
                </div>

                <a href="{{ asset('/') }}iletisim" class="nav-item nav-link">İletişim</a>
            </div>
             <img loading="lazy" decoding="async" width="200" height="100" src="{{ asset('/') }}img/site_logo_haydi.webp" class="attachment-large size-large wp-image-1403" alt="" srcset="https://seninhakkin.istanbul/wp-content/uploads/2024/02/site_logo_haydi.webp 400w, https://seninhakkin.istanbul/wp-content/uploads/2024/02/site_logo_haydi-300x150.webp 300w" sizes="(max-width: 400px) 100vw, 400px">
        </div>
    </nav>
    <!-- Navbar End -->