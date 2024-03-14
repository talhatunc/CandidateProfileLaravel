    @extends('inc.layout')
    @section('title')Özgeçmiş @endsection
    @section('body')
    <div class="container-xxl py-7 pt-10" id="videos">
        <div class="container">
            <div class="row g-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6 pt-5">
                    <h1 class="display-5 pb-2 pt-2">&nbsp;</h1>
                </div>
            </div>

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
        </div>
    </div>

    @endsection