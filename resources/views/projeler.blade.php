    @extends('inc.layout')
    @section('title')Projeler @endsection
    @section('body')
    <!-- Projects Start -->
    <div class="container-xxl py-6 pt-10" id="project">
        <div class="container">
            <div class="row g-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6 pt-5">
                    <h1 class="display-5 pb-2 pt-2">Projeler</h1>
                </div>
            </div>
            <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.1s">
                @php
                    $i=0;
                @endphp
                @foreach ($projects as $p)
                <div class="col-lg-4 col-md-6 portfolio-item first">
                    <div class="portfolio-img rounded overflow-hidden">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('/img/projects').'/'.$p->FOTO }}" alt="{{ $p->BASLIK }}">
                            <div class="card-body">
                                <h4 class="text-primary">{{ $p->BASLIK }}</h4>
                                <p class="card-text">{!! $p->ACIKLAMA !!} <br/><a href="{{ route('proje.goster',['id' => $p->KAYITID, 'baslik' => $p->BASLIK]) }}">Daha Fazla Oku</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Projects End -->
    @endsection
