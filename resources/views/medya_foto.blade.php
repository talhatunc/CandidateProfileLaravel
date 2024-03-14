
    @extends('inc.layout')
    @section('title')Fotoğraflar @endsection
    @section('body')
    <!-- Gallery -->
 <div class="container-xxl py-6 pt-10" id="photos">
        <div class="container">
            <div class="row g-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6 pt-5">
                    <h1 class="display-5 pb-2 pt-2">Fotoğraflar</h1>
                </div>
            </div>
            <div class="row">
                @php
                $c = count($galeri);
                $a = $c/3;
                if($c%3 == 2){
                    $a = $a + 1;
                }
                @endphp     
                @foreach ($galeri as $f)
                @if ($loop->first)
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                @endif

                @if (($loop->iteration-1)%$a == 0 && $loop->iteration !=1 )
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                @endif
                

                    <div class="portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-img rounded overflow-hidden mb-4">
                            <img
                            src="{{ asset('/img/galeri') }}/{{ $f->FOTO }}"
                            class="w-100 shadow-1-strong rounded"
                            alt="Boat on Calm Water"
                            />
                            <div class="portfolio-btn">
                                    <h4 class="text-light">{{ $f->BASLIK }}</h4>
                                    <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="{{ asset('/img/galeri') }}/{{ $f->FOTO }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>


                 @if ($loop->last)
                    </div>
                @endif
                
                @endforeach 
            </div>
        </div>
    </div>

<!-- Gallery -->