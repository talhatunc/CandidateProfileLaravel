 @extends('admin.inc.layout')
    @section('body')
    <div id="toastContainer"></div>
<form id="uploadForm" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="mb-3 col-12">
                <label for="photoUpload" class="form-label">Fotoğraf Yükle</label>
                <input type="file" class="form-control" name="photoUpload" id="photoUpload" accept="image/*" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
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
    url: "{{ route('dosya.yukle') }}",
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
$('#uploadForm').reset();
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