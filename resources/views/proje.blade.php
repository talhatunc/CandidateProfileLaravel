    @extends('inc.layout')
    @section('title') {{ $proje->BASLIK }} @endsection
    @section('body')
    <!-- Gallery Start -->
    <div class="container-xxl py-6 pt-10" id="videos">
        <div class="container">
            <div class="row g-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6 pt-5">
                    <h1 class="display-5 pb-2 pt-2"></h1>
                </div>
            </div>
            <div class="row bg-secondary text-light wow fadeInUp" data-wow-delay="0.1s">
                
                <div class=" col-md-12 col-sm-12 mb-4 mt-4" style="max-width: 600px; position: relative;">
                    <img src="{{ asset('/img/projects/'.$proje->FOTO) }}" class="card-img" />
                    <div class="overlay pt-2 pb-2" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(255, 0, 0, 0.491); width: 90%;">
                        <h3 class="text-light text-center text-capitalize">{{ $proje->BASLIK }}</h3>
                    </div>
                </div>


                
                <div class="col-lg-6 mt-4 mb-4 col-md-12 col-sm-12">
                   <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $proje->videoID }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> 
                       
                </div>
            </div>
        </div>
    </div>
        <div class="container-xxl pb-5" id="ozgecmis">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-5 mb-5">{{ $proje->BASLIK }}</h1>
                    <p class="mb-4">{!! $proje->ACIKLAMA !!}</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-3 wow fadeInUp"  data-wow-delay="0.1s">
            <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('tum.projeler') }}">Tüm Projeler</a>
        </div>
    </div>
    @endsection 