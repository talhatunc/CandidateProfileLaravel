   @extends('inc.layout')
    @section('title')İletişim @endsection
   @section('body')
       <div class="container-xxl py-7 pt-10" id="videos">
        <div class="container">
            <div class="row g-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6 pt-5">
                    <h1 class="display-5 pb-2 pt-2">&nbsp;</h1>
                </div>
            </div>
            <div id="toastContainer"></div>
                    <div class="container py-5">
                        <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="col-lg-12">
                                <h1 class="display-5 mb-0">Soru görüş ve önerilerinizi bekliyoruz.</h1>
                            </div>
                        </div>
                        <div class="row g-5">
                            <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <img src="img/birol_bey_form-512x1024.jpg">                    
                            </div>
                            <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                <form id="uploadForm">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Adınız Soyadınız" required>
                                                <label for="name">Adınız Soyadınız</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="E-Posta Adresiniz" required>
                                                <label for="email">E-Posta Adresiniz</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="tel" id="tel" placeholder="Telefon Numaranız" required>
                                                <label for="tel">Telefon Numaranız</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Başlık" required>
                                                <label for="subject">Başlık</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Mesajınızı Yazınız" id="message" name="message" style="height: 100px"></textarea>
                                                <label for="message">Mesajınız</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary py-3 px-5" value="Gönder">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#uploadForm').submit(function(e) {
    e.preventDefault(); // Formun normal submit işlemini engelle
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: "{{ route('iletisim.yukle') }}",
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