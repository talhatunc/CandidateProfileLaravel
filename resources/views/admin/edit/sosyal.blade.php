 @extends('admin.inc.layout')
    @section('body')
    <div id="toastContainer"></div>
<div class="container mt-5">
        <form id="uploadForm">
            @csrf
            <div class="form-group">
                <label for="youtube">YouTube Hesabı:</label>
                <input type="text" class="form-control" id="youtube" value="{{ $fixed->youtube }}" name="youtube">
            </div>
            <br/>
            <div class="form-group">
                <label for="facebook">Facebook Hesabı:</label>
                <input type="text" class="form-control" id="facebook" value="{{ $fixed->facebook }}" name="facebook">
            </div>
            <br/>
            <div class="form-group">
                <label for="instagram">Instagram Hesabı:</label>
                <input type="text" class="form-control" id="instagram" value="{{ $fixed->instagram }}" name="instagram">
            </div>
            <br/>
            <div class="form-group">
                <label for="twitter">Twitter Hesabı:</label>
                <input type="text" class="form-control" id="twitter" value="{{ $fixed->twitter }}" name="twitter">
            </div>
            <!-- Diğer sosyal medya hesaplarını buraya ekleyebilirsiniz -->
            <br/>
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
    url: "{{ route('sosyal.yukle') }}",
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