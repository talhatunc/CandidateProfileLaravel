 @extends('admin.inc.layout')
    @section('body')
<div class="container mt-5">
  <h1 class="mb-4">Video</h1>
  <form id="uploadForm1" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="videoLink" class="form-label">Video Linki</label>
      <input type="url" name="videoLink" class="form-control" id="videoLink" placeholder="https://www.youtube.com/watch?v=video_id" required>
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Başlık</label>
      <input type="text" name="title" class="form-control" id="title" required>
    </div>
    <button type="submit" class="btn btn-primary">Gönder</button>
  </form>
</div>
<div id="toastContainer"></div>
<div class="container mt-5">
  <h1 class="mb-4">Fotoğraf</h1>
  <form id="uploadForm" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="photo" class="form-label">Fotoğraf</label>
      <input type="file" name="photo" class="form-control" id="photo" accept="image/*" required>
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Başlık</label>
      <input type="text" name="title" class="form-control" id="title" required>
    </div>
    <button type="submit" class="btn btn-primary">Gönder</button>
  </form>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
$(document).ready(function(){
    $('#uploadForm').submit(function(e){
        e.preventDefault(); // Formun normal submit işlemini engelle

        var formData = new FormData(this);

$.ajax({
    type: "POST",
    url: "{{ route('fotograf.yukle') }}",
    data: new FormData(this),
    contentType: false,
    processData: false,
    success: function(response) {
        if (response.success) {
            // Başarılı yanıt
            showToast(response.message,response.success);
        } else {
            // Başarısız yanıt
            showToast(response.message,response.success);
        }
    },
    error: function(xhr, status, error) {
        // Hata durumu
        showToast(response.message,response.success);
    }
});
$('#uploadForm')[0].reset();
    });

        $('#uploadForm1').submit(function(e){
        e.preventDefault(); // Formun normal submit işlemini engelle

        var formData = new FormData(this);

$.ajax({
    type: "POST",
    url: "{{ route('video.yukle') }}",
    data: new FormData(this),
    contentType: false,
    processData: false,
    success: function(response) {
        if (response.success) {
            // Başarılı yanıt
            showToast(response.message,response.success);
        } else {
            // Başarısız yanıt
            showToast(response.message,response.success);
        }
    },
    error: function(xhr, status, error) {
        // Hata durumu
        showToast(response.message,response.success);
    }
});
$('#uploadForm1')[0].reset();
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
    @endsection