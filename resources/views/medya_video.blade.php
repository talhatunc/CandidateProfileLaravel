    @extends('inc.layout')
    @section('title')Videolar @endsection
    @section('body')
    <!-- Gallery Start -->
    <div class="container-xxl py-6 pt-10" id="videos">
        <div class="container">
            <div class="row g-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6 pt-5">
                    <h1 class="display-5 pb-2 pt-2">Videolar</h1>
                </div>
            </div>
             <div class="row">
                <div class="col-lg-4 col-md-4 col-4 mb-4 mb-lg-4">
                    <div id="playlist">

                    <div id="video-dis">
                        <iframe id="display-frame" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                    <div id="v-list" class="video-li">

                        <div id="vli-info">
                        <div id="upper-info">
                            <div id="li-titles">
                            <div class="title">Video Galeri</div>
                            <div class="sub-title">
                                <a href="https://www.youtube.com/channel/UCTVlW56P24ITK0BwPKpeGow" class="channel">Saadet Partisi</a>
                                -
                                <span id="video-count">1 / 2</span>
                            </div>
                            </div>
                        </div>

                        </div>

                        @foreach ($galeri as $v)
                            
                            <div id="vli-videos">
                                <div class="video-con @if ($loop->first) active-con @endif" video="https://www.youtube.com/embed/{{ $v->videoID }}">
                                    <div class="index title">0</div>
                                    <div class="thumb">
                                    <img src="https://i.ytimg.com/vi/{{ $v->videoID }}/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&rs=AOn4CLDNZqTQuBOTuGgLFnsrstzTBdJhgg" alt="">
                                    </div>
                                    <div class="v-titles">
                                    <div class="title">{{ $v->BASLIK }}</div>
                                </div>
                            </div>

                        @endforeach

                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->
    @endsection

@section('script')
<script>
/*
    Every single line of code is pure JavaScript.
    I've provided comments for some important parts of the code
    
    Happy Programming...
*/

// utlity
function qs(elem) {
  return document.querySelector(elem);
}
function qsa(elem) {
  return document.querySelectorAll(elem);
}

// globals
var activeCon = 0,
  totalCons = 0;

// elements
const v_cons = qsa(".video-con"),
  a_cons = qsa(".active-con"),
  v_count = qs("#video-count"),
  info_btns = qsa("#lower-info div"),
  video_list = qs("#v-list"),
  display = qs("#display-frame");

// activate container
function activate(con) {
  deactivateAll();
  indexAll();
  countVideos(con.querySelector(".index").innerHTML);
  con.classList.add("active-con");
  con.querySelector(".index").innerHTML = "►";
}
// deactivate all container
function deactivateAll() {
  v_cons.forEach((container) => {
    container.classList.remove("active-con");
  });
}
// index containers
function indexAll() {
  var i = 1;
  v_cons.forEach((container) => {
    container.querySelector(".index").innerHTML = i;
    i++;
  });
}
// update video count
function countVideos(active) {
  v_count.innerHTML = active + " / " + v_cons.length;
}
// icon activate
function toggle_icon(btn) {
  if (btn.classList.contains("icon-active")) {
    btn.classList.remove("icon-active");
  } else btn.classList.add("icon-active");
}
// toggle video list
function toggle_list() {
  if (video_list.classList.contains("li-collapsed")) {
    drop_icon.style.transform = "rotate(0deg)";
    video_list.classList.remove("li-collapsed");
  } else {
    drop_icon.style.transform = "rotate(180deg)";
    video_list.classList.add("li-collapsed");
  }
}
function loadVideo(url) {
  display.setAttribute("src", url);
}

//******************
// Main Function heres
//******************
window.addEventListener("load", function () {
  // starting calls
  indexAll(); // container indexes
  countVideos(1);
  activate(v_cons[0]);
  loadVideo(v_cons[0].getAttribute("video"));

  // Event handeling goes here
  // on each video container click
  v_cons.forEach((container) => {
    container.addEventListener("click", () => {
      activate(container);
      loadVideo(container.getAttribute("video"));
    });
  });
  // on each button click
  info_btns.forEach((button) => {
    button.addEventListener("click", () => {
      toggle_icon(button);
    });
  });
  // drop icon click
  drop_icon.addEventListener("click", () => {
    toggle_list();
  });
});

</script>
@endsection

@section('style')
<style>
   /*
    Pure CSSS
    I'm using flexbox
    Varaibles you see in the root are actively in use
*/

:root {
  --primary: #fbfcfc;
  --active: var(--secondary);
  --secondary: #ffffff;
  --grey: #8a8b8b;
  --b-pad: 10px;
  --s-pad: 5px;
  --bg: rgb(50, 50, 50);
}


a.channel {
  color: inherit;
  text-decoration: none;
}
a.channel:hover {
  text-decoration: underline;
}

.title {
  color: #fbfcfc;
  font-size: 15px;
  font-weight: bold;
}
.sub-title {
  color: #fbfcfc;
  font-size: 13px;
}
.icon-active {
  filter: sepia(100%) hue-rotate(150deg) saturate(400%);
}

#playlist {
  top: 50%;
  left: 170%;
  width: 80vw;
  height: 60vh;
  display: flex;
  position: relative;
  transform: translate(-50%, -50%);
  transition: all ease 0.3s;
}
@media screen and (max-width: 772px) {
    #playlist {
        left: 150%;
    }
}

#video-dis {
  flex: 6.5;
  margin-right: 20px;
  background: black;
}
#video-dis iframe {
  width: 100%;
  height: 100%;
}
.video-li {
  flex: 3.5;
  display: flex;
  padding: var(--b-pad);
  border-radius: 3px;
  flex-direction: column;
  background: var(--primary);
}
.li-collapsed {
  overflow: hidden;
  height: 40px;
}
#vli-info {
  flex: 1;
  padding: 0 var(--b-pad) 0 var(--b-pad);
}

#upper-info {
  display: flex;
}

#li-titles {
  flex: 9;
}
#li-titles div {
  padding-bottom: 5px;
}


#lower-info {
  display: flex;
  padding-top: var(--b-pad);
}
#lower-info div {
  width: 40px;
  height: 40px;
  cursor: pointer;
}

#vli-videos {
  flex: 7;
  overflow: auto;
}

.video-con {
  display: flex;
  cursor: pointer;
  padding: var(--s-pad);
  column-gap: var(--s-pad);
  margin-bottom: var(--b-pad);
}
.video-con:hover,
.active-con {
  background: var(--active);
}
.index {
  min-width: 15px;
  align-self: center;
}
.thumb {
  width: 100px;
  height: 60px;
  background: var(--secondary);
}
.thumb img {
  width: 100%;
}
.v-titles {
  flex: 6;
}
.v-titles div:nth-child(2) {
  margin-top: var(--s-pad);
}

@media only screen and (max-width: 1150px) {
  #playlist {
    width: 95vw;
    height: 60vh;
  }
}
@media only screen and (max-width: 950px) {
  #playlist {
    top: 10%;
    width: 50vw;
    margin: 0 auto;
    display: block;
    align-items: center;
    transform: translate(-50%, 0%);
  }
  #video-dis {
    margin-bottom: var(--b-pad);
    width: 100%;
    height: 300px;
  }
}
@media only screen and (max-width: 800px) {
  #playlist {
    width: 60vw;
  }
}
@media only screen and (max-width: 650px) {
  #playlist {
    width: 80vw;
  }
}

</style>
@endsection