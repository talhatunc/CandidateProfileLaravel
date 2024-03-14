<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Saadet</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link rel="icon" href="{{ asset('/') }}img/cropped-logo-32x32.png" sizes="32x32">
    <link rel="icon" href="{{ asset('/') }}img//cropped-logo-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="{{ asset('/') }}img//cropped-logo-180x180.png">
    <meta name="msapplication-TileImage" content="{{ asset('/') }}img//cropped-logo-270x270.png">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
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
                    <img decoding="async" width="200" height="100" src="{{ asset('/') }}img/site_logo_birolAydin.webp" class="attachment-full size-full wp-image-1400" alt="" srcset="{{ asset('/') }}img/site_logo_birolAydin.webp 400w, {{ asset('/') }}img/site_logo_birolAydin-300x150.webp 300w" sizes="(max-width: 400px) 100vw, 400px">
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
                <img decoding="async" width="200" height="100" src="{{ asset('/') }}img/site_logo_birolAydin.webp" class="attachment-full size-full wp-image-1400" alt="" srcset="{{ asset('/') }}img/site_logo_birolAydin.webp 400w, {{ asset('/') }}img/site_logo_birolAydin-300x150.webp 300w" sizes="(max-width: 400px) 100vw, 400px">
            </a>
            <div class="navbar-nav ms-auto mt-2 py-0">
                <a href="#projeler" class="nav-item nav-link">Projeler</a>
                <a href="#ozgecmis" class="nav-item nav-link">Özgeçmiş</a>
                
                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="nav-item nav-link dropdown-toggle" id="dropdownMedia" data-bs-toggle="dropdown" aria-expanded="false">
                        Medya
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownMedia">
                        <li><a class="dropdown-item" href="./Fotograflar">Fotoğraflar</a></li>
                        <li><a class="dropdown-item" href="./Videolar">Videolar</a></li>
                    </ul>
                </div>

                <a href="#iletisim" class="nav-item nav-link">İletişim</a>
            </div>
             <img loading="lazy" decoding="async" width="200" height="100" src="{{ asset('/') }}img/site_logo_haydi.webp" class="attachment-large size-large wp-image-1403" alt="" srcset="{{ asset('/') }}img/site_logo_haydi.webp 400w, {{ asset('/') }}img/site_logo_haydi-300x150.webp 300w" sizes="(max-width: 400px) 100vw, 400px">
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Slider Start -->
    <div class="container-fluid bg-light py-5 my-5" id="slider">
        <div class="container-fluid py-5">
            <div class="row justify-content-center">

                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($slider as $s)
                        <div class="testimonial-item">
                            <div class="position-relative mb-5">
                                <img class="mx-auto" src="{{ asset('/img/slider').'/'.$s }}">
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Slider End -->



    <!-- Projeler Start -->
    <div class="container-xxl py-6" id="projeler">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-5">
                        <div class="years flex-shrink-0 text-center me-4">
                            <h1 class="display-1 mb-0">15</h1>
                            <h5 class="mb-0">Yıllık</h5>
                        </div>
                        <h3 class="lh-base mb-0">tecrübe ile daha güzel ve daha temiz bir Konya.</h3>
                    </div>
                    <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>Lorem Ipsum</p>
                    <p class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>is simply dummy</p>
                    <p class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>of the printing and typesetting industry.</p>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-3 mb-4">

                        @foreach ($fileNames as $f)
                            <div class="col-sm-6">
                                <img class="img-fluid rounded" src="{{ asset('/img/projects').'/'.$f }}" alt="">
                            </div>
                        @endforeach
                       
                    </div>
                    
                    <div class="d-flex justify-content-center mb-3">
                        <a class="btn btn-primary py-3 px-5 mt-3" href="{{ asset('/') }}Projeler">Tüm Projeler</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Projeler End -->


    <!-- Expertise Start -->
    <div class="container-xxl py-6 pb-5" id="ozgecmis">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-5 mb-5">Merhaba değerli İstanbullu hemşehrim;</h1>
                    <p class="mb-4">{!! $fixed->OZGECMIS !!}</p>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <ul class="nav nav-pills rounded border border-2 border-primary mb-5">
                        <li class="nav-item w-50">
                            <button class="nav-link w-100 py-3 fs-5 active" data-bs-toggle="pill" href="#tab-1">Deneyim</button>
                        </li>
                        <li class="nav-item w-50">
                            <button class="nav-link w-100 py-3 fs-5" data-bs-toggle="pill" href="#tab-2">Eğitim</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row gy-5 gx-4">
                                <div class="col-sm-6">
                                    <h5>UI Designer</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">2000 - 2045</p>
                                    <h6 class="mb-0">Apex Software Inc</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Product Designer</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">2000 - 2045</p>
                                    <h6 class="mb-0">Apex Software Inc</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Web Designer</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">2000 - 2045</p>
                                    <h6 class="mb-0">Apex Software Inc</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Apps Designer</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">2000 - 2045</p>
                                    <h6 class="mb-0">Apex Software Inc</h6>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row gy-5 gx-4">
                                <div class="col-sm-6">
                                    <h5>UI Design Course</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">2000 - 2045</p>
                                    <h6 class="mb-0">Cambridge University</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>IOS Development</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">2000 - 2045</p>
                                    <h6 class="mb-0">Cambridge University</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Web Design</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">2000 - 2045</p>
                                    <h6 class="mb-0">Cambridge University</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Apps Design</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">2000 - 2045</p>
                                    <h6 class="mb-0">Cambridge University</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Expertise End -->

 <div id="toastContainer"></div>
    <!-- İletişim Start -->
    <div class="container-xxl pb-5" id="iletisim">
        <div class="container py-5">
            <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-12">
                    <h1 class="display-5 mb-0">Soru görüş ve önerilerinizi bekliyoruz.</h1>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img src="img/birol_bey_form-512x1024.jpg">                    
                </div>
                <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                <form id="uploadForm">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Adınız Soyadınız" required>
                                                <label for="name">Adınız Soyadınız</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="E-Posta Adresiniz" required>
                                                <label for="email">E-Posta Adresiniz</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="tel" id="tel" placeholder="Telefon Numaranız" required>
                                                <label for="tel">Telefon Numaranız</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Başlık" required>
                                                <label for="subject">Başlık</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Mesajınızı Yazınız" id="message" name="message" style="height: 100px"></textarea>
                                                <label for="message">Mesajınız</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary py-3 px-5" value="Gönder">
                                        </div>
                                    </div>
                                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- İletişim End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-light text-white py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-md-start mb-3 mb-md-0">
                        <img loading="lazy" decoding="async" src="img/saadet_is_basina.svg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}lib/wow/wow.min.js"></script>
    <script src="{{ asset('/') }}lib/easing/easing.min.js"></script>
    <script src="{{ asset('/') }}lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('/') }}lib/typed/typed.min.js"></script>
    <script src="{{ asset('/') }}lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('/') }}lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('/') }}lib/isotope/isotope.pkgd.min.js"></script>
    <script src="{{ asset('/') }}lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/') }}js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#uploadForm').submit(function(e) {
    e.preventDefault(); // Formun normal submit işlemini engelle
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: "{{ route('iletisim.yukle') }}",
        data: formData, // FormData nesnesini doğrudan kullanın
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.success) {
                // Başarılı yanıt
                showToast(response.message, response.success);
            } else {
                // Başarısız yanıt
                showToast(response.message, response.success);
            }
        },
        error: function(xhr, status, error) {
            // Hata durumu
            showToast(error, false); // Hata mesajını doğrudan kullanın
        }
    });

    $('#uploadForm')[0].reset();
});


    // Toast bildirimi gösterme fonksiyonu
    function showToast(message, success){
        var toastClass = success ? 'bg-success' : 'bg-danger'; // Başarıya veya hataya bağlı olarak toast rengini belirle
        var toastHeader = success ? 'Başarılı!' : 'HATA!'; // Başarıya veya hataya bağlı olarak toast rengini belirle

      var toastHTML = '<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">' +
  '<div id="liveToast" class="'+ toastClass +' text-light toast hide" role="alert" aria-live="assertive" aria-atomic="true">' +
    '<div class="toast-header">' +
      '<strong class="me-auto">'+ toastHeader +'</strong>' +
      '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>'+
    '</div>'+
    '<div class="toast-body">'+
     message+
    '</div>'+
  '</div>'+
'</div>';

        $('#toastContainer').append(toastHTML); // Toast bildirimini ekleyerek görüntüle
        $('.toast').toast('show'); // Toast bildirimini göster
    }
});
        </script>
</body>

</html>