 @extends('admin.inc.layout')
    @section('body')
      <div class="d-flex flex-row-reverse"><a class="btn btn-primary" href="{{ route('galeri.yukle') }}"><i class="align-middle" data-feather="plus-circle"></i> Ekle</a></div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Başlık</th>
      <th scope="col">Görsel-Video</th>
      <th scope="col">Sil</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 0; @endphp <!-- PHP kodu başlangıcı -->
    @foreach ($galeri as $g)
      <tr>
        <th scope="row">{{ $g->KAYITID }}</th>
        <td>{{ $g->BASLIK }}</td>
        @if(is_null($g->LINK))
        <td><img height="70" src="{{ asset('/img/galeri').'/'.$g->FOTO }}" alt=""></td>
        @else
        <td><a target="_blank" href="{{ $g->LINK }}">Video</a></td>
        @endif
        <td style="cursor:pointer" onclick="sil('{{ $g->KAYITID }}')"><i class="align-middle" data-feather="trash-2"></i></td>
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
                url: '{{ route('galeri.sil') }}',
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