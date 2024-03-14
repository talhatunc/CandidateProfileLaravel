 @extends('admin.inc.layout')
    @section('body')
    <div id="toastContainer"></div>
<form id="uploadForm" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="projectTitle" class="form-label">Başlık</label>
      <input type="text" name="projectTitle" class="form-control" id="projectTitle" required>
    </div>
    <div class="mb-3">
      <label for="projectDescription" class="form-label">Açıklama</label>
      <div id="tinymce-editor"></div>
    </div>
    <div class="mb-3">
      <label for="projectPhoto" class="form-label">Fotoğraf</label>
      <input type="file" name="projectPhoto" class="form-control" id="projectPhoto" accept="image/*" required>
    </div>
    <div class="mb-3">
      <label for="projectVideoLink" class="form-label">Video Linki</label>
      <input type="url" name="projectVideoLink" class="form-control" id="projectVideoLink" placeholder="https://www.youtube.com/watch?v=video_id" required>
    </div>
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
      selector: '#tinymce-editor',
      plugins: 'lists',
      toolbar: 'undo redo | formatselect | bold italic underline | bullist numlist outdent indent',
      menubar: false,
      setup: function (editor) {
            // editörü bir değişkene atama
            window.editor = editor;
        }
    });
    $('#uploadForm').submit(function(e) {
    e.preventDefault(); // Formun normal submit işlemini engelle
    var projectDescriptionContent = window.editor.getContent();
    var formData = new FormData(this);
    formData.append('projectDescription', projectDescriptionContent);
    console.log(formData);

    $.ajax({
        type: "POST",
        url: "{{ route('proje.yukle') }}",
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

    $('#uploadForm')[0].reset();
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
    