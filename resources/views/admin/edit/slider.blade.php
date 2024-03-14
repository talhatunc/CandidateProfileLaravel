 @extends('admin.inc.layout')
    @section('body')
      <div class="d-flex flex-row-reverse"><a class="btn btn-primary" href="{{ route('slider.yukle') }}"><i class="align-middle" data-feather="plus-circle"></i> Ekle</a></div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Dosya Adı</th>
      <th scope="col">Görsel</th>
      <th scope="col">Sil</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 1; @endphp <!-- PHP kodu başlangıcı -->
    @foreach ($fileNames as $fileName)
      <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{{ $fileName }}</td>
        <td><img height="70" src="{{ asset('img/slider/' . $fileName) }}" alt=""></td>
        <td style="cursor:pointer" onclick="sil('{{ $fileName }}')"><i class="align-middle" data-feather="trash-2"></i></td>
      </tr>
    @endforeach
  </tbody>
</table>
    @endsection
    @section('script')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
 function sil(id) {
        // Confirm dialog ile kullanıcıdan silme işleminin onayını al
        if (confirm("Bu kaydı silmek istediğinizden emin misiniz?")) {
            // AJAX isteği ile id'yi slider.sil rotasına gönder
            $.ajax({
                type: 'POST',
                url: '{{ route('slider.sil') }}',
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Başarılı yanıt
                    alert(response.message);
                    // Sayfayı yenile
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Hata durumu
                    console.error(error);
                    alert('Bir hata oluştu.');
                }
            });
        }
    }
   </script>

    @endsection