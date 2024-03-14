@extends('admin.inc.layout')
    @section('body')
    <div id="toastContainer"></div>
    <form id="uploadForm">
        @csrf
        <textarea class="d-none" id="tinymceeditor">{{ $ozgecmis->OZGECMIS }}</textarea>
        <br/>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
    @endsection

    @section('script')
<script src="https://cdn.jsdelivr.net/npm/tinymce@5.9.2/tinymce.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
$(document).ready(function(){
    var editor;
    tinymce.init({
        selector: '#tinymceeditor',
        plugins: 'lists',
        toolbar: 'undo redo | bold italic underline | bullist numlist outdent indent',
        menubar: false,
        setup: function (editor) {
            // editörü bir değişkene atama
            window.editor = editor;
        }
    });
    tinymce.activeEditor.setContent("<p>Hello world!</p>");
    $('#uploadForm').submit(function(e) {
    e.preventDefault(); // Formun normal submit işlemini engelle
    var ozgecmis = window.editor.getContent();
    var formData = new FormData(this);
    formData.append('ozgecmis', ozgecmis);
    console.log(formData);

    $.ajax({
        type: "POST",
        url: "{{ route('ozgecmis.yukle') }}",
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
       @section('style')
 <link href="https://cdn.jsdelivr.net/npm/tinymce@5.9.2/build/tinymce.min.css" rel="stylesheet">
   @endsection