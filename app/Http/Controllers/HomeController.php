<?php

namespace App\Http\Controllers;

use App\Models\Fixed;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Iletisim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class  HomeController extends BaseController
{
	public function welcome(){

		$directory = public_path('img/projects');

		// Dosya adlarını içerecek bir dizi oluştur
		$fileNames = [];

		// Dizindeki dosyaları tarayarak slider- ile başlayan dosya adlarını al
		if (File::isDirectory($directory)) {
			$files = File::files($directory);
			foreach ($files as $file) {
				$fileName = $file->getFilename();
				if (strpos($fileName, 'project-') === 0) {
					$fileNames[] = $fileName;
				}
			}
		}

		$directory = public_path('img/slider');

		// Dosya adlarını içerecek bir dizi oluştur
		$fileNamesSlider = [];

		// Dizindeki dosyaları tarayarak slider- ile başlayan dosya adlarını al
		if (File::isDirectory($directory)) {
			$files = File::files($directory);
			foreach ($files as $file) {
				$fileName = $file->getFilename();
				if (strpos($fileName, 'slider-') === 0) {
					$fileNamesSlider[] = $fileName;
				}
			}
		}

		$ozgecmis = Fixed::select('OZGECMIS')->first();
		return view('welcome', ['fileNames' => $fileNames, 'slider' => $fileNamesSlider,'fixed' => $ozgecmis]);
	}



    public function projeler(){

		$directory = public_path('img/projects');

		// Dosya adlarını içerecek bir dizi oluştur
		$fileNames = [];

		// Dizindeki dosyaları tarayarak slider- ile başlayan dosya adlarını al
		if (File::isDirectory($directory)) {
			$files = File::files($directory);
			foreach ($files as $file) {
				$fileName = $file->getFilename();
				if (strpos($fileName, 'project-') === 0) {
					$fileNames[] = $fileName;
				}
			}
		}

		$projects = Project::all();
	
		          foreach ($projects as $g) {
    // Galeri kaydının LINK alanı null ise
        // Galeriye ait dosyanın adını bul
        $fileName = 'project-' . $g->KAYITID . '.*';

        // Fotoğraf dosyası var mı kontrol et
        $directory = public_path('img/projects');
        $files = File::glob($directory . '/' . $fileName);

        // Dosya varsa, LINK alanını güncelle
        if (!empty($files)) {
            $fileName = basename($files[0]);
            $g->FOTO = $fileName;
        }
    }
		foreach ($projects as $p) {
			$temiz_metin = strip_tags($p->ACIKLAMA);

    // Paragrafları ayır
    $paragraflar = preg_split('/\n|\r\n?/', $temiz_metin);

    // İlk iki paragrafı al
    $ilk_iki_paragraf = array_slice($paragraflar, 0, 3);

    // İlk iki paragrafı birleştirerek 100 karakterlik kısmı al
    $p->ACIKLAMA = substr(implode("\n", $ilk_iki_paragraf), 0, 100);
		}
		//return $projects;

		return view('projeler', ['projects' => $projects]);
	}


	public function medya_foto(){
    $directory = public_path('img/galeri');

    // Dosya adlarını içerecek bir dizi oluştur
    $fileNames = [];

    // Dizindeki dosyaları tarayarak slider- ile başlayan dosya adlarını al
    if (File::isDirectory($directory)) {
        $files = File::files($directory);
        foreach ($files as $file) {
            $fileName = $file->getFilename();
            if (strpos($fileName, 'photo-') === 0) {
                $fileNames[] = $fileName;
            }
        }
    }

     $galeri = Gallery::whereNull('LINK')->get();

     foreach ($galeri as $g) {
    // Galeri kaydının LINK alanı null ise
    if (is_null($g->LINK)) {
        // Galeriye ait dosyanın adını bul
        $fileName = 'photo-' . $g->KAYITID . '.*';

        // Fotoğraf dosyası var mı kontrol et
        $directory = public_path('img/galeri');
        $files = File::glob($directory . '/' . $fileName);

        // Dosya varsa, LINK alanını güncelle
        if (!empty($files)) {
            $fileName = basename($files[0]);
            $g->FOTO = $fileName;
        }
    }
    }
		return view('medya_foto', ['galeri' => $galeri]);
	}

	public function medya_video(){
		$galeri = Gallery::whereNotNull('LINK')->get();
		foreach ($galeri as $item) {
			$youtubeLink = $item->LINK;

			// YouTube linkinden video ID'sini ayıklama
			$parsedUrl = parse_url($youtubeLink);
			if (isset($parsedUrl['query'])) {
				parse_str($parsedUrl['query'], $queryParams);
				if (isset($queryParams['v'])) {
					$videoId = $queryParams['v'];

					// Elde edilen video ID'yi galeri öğesine ekleme
					$item->videoID = $videoId;
				}
			}
		}
		return view('medya_video', ['galeri' => $galeri]);
	}
	
	public function proje($id){
		$proje = Project::find($id);
		$youtubeLink = $proje->LINK;

			// YouTube linkinden video ID'sini ayıklama
			$parsedUrl = parse_url($youtubeLink);
			if (isset($parsedUrl['query'])) {
				parse_str($parsedUrl['query'], $queryParams);
				if (isset($queryParams['v'])) {
					$videoId = $queryParams['v'];

					// Elde edilen video ID'yi galeri öğesine ekleme
					$proje->videoID = $videoId;
				}
			}

        // Dosya adının deseni
			$fileNamePattern = 'project-' . $id . '.*';

			// Dosyanın dizinini belirle
			$directory = public_path('img/projects/');

			// Dosya adlarını bul
			$files = File::glob($directory . $fileNamePattern);

			if (!empty($files)) {
			foreach ($files as $file) {
				$dosyaAdi = basename($file);
				$proje->FOTO = $dosyaAdi;
				break;
			}
			//return $proje;
		return view('proje',['proje' => $proje]);
	}
	}

	function ozgecmis(){
		$ozgecmis = Fixed::select('OZGECMIS')->first();
		return view('ozgecmis',['fixed' => $ozgecmis]);
	}

	function iletisim(){
		return view('iletisim');
	}

	function iletisimYukle(Request $request){
		try{
		        // Formdan gelen verileri doğrulama kuralları ile kontrol edebiliriz.
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'tel' => 'nullable|string|max:11',
            'subject' => 'nullable|string|max:100',
            'message' => 'required|string',
        ]);

        // Model aracılığıyla veritabanına eklemek için create() fonksiyonunu kullanıyoruz.
        // Burada Contact modelinin fillable özelliği dikkate alınır.
         Iletisim::create([
            'ADSOYAD' => $validatedData['name'],
            'EPOSTA' => $validatedData['email'],
            'TELEFON' => $validatedData['tel'],
            'BASLIK' => $validatedData['subject'],
            'MESAJ' => $validatedData['message'],
        ]);

        // Eğer işlem başarılıysa, bir geri dönüş yapabiliriz.
        return response()->json(['success' => true, 'message' => 'Mesajınız İletildi.']);
		}catch(\Exception $ex){
			return response()->json(['success' => false, 'message' => 'Bir hata oluştu.']);
		}
	}
}
