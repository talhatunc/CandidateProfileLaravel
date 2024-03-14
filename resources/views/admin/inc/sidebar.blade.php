		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Saadet Admin</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						 Formlar
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('slider.listele') }}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Slider</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('projeler.listele') }}">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Projeler</span>
            </a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('galeri.listele') }}">
              <i class="align-middle" data-feather="video"></i> <span class="align-middle">Galeri</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('ozgecmis') }}">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Özgeçmiş</span>
            </a>
					</li>

                    					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('sosyal') }}">
              <i class="align-middle" data-feather="instagram"></i> <span class="align-middle">Sosyal Medya</span>
            </a>
					</li>
				</ul>
                
			</div>
		</nav>