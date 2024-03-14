 @extends('admin.inc.layout')
    @section('body')
      <div class="d-flex flex-row-reverse"><a class="btn btn-primary" href="{{ route('projeler.yukle') }}"><i class="align-middle" data-feather="plus-circle"></i> Ekle</a></div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Başlık</th>
      <th scope="col">Açıklama</th>
      <th scope="col">Görsel</th>
      <th scope="col">Video</th>
      <th scope="col">Sil</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 0; @endphp <!-- PHP kodu başlangıcı -->
    @foreach ($projects as $proje)
      <tr>
        <th scope="row">{{ $proje->KAYITID }}</th>
        <td>{{ $proje->BASLIK }}</td>
        <td>{!! $proje->ACIKLAMA !!}</td>
        <td><img height="70" src="{{ asset('img/projects').'/'.$proje->FOTO }}" alt=""></td>
        <td><a target="_blank" href="{{ $proje->LINK }}">Video</a></td>
        <td style="cursor:pointer" onclick="sil('{{ $proje->KAYITID }}')"><i class="align-middle" data-feather="trash-2"></i></td>
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
                url: '{{ route('proje.sil') }}',
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
