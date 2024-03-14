<?php

namespace App\Http\Controllers;

use App\Models\Fixed;
use App\Models\Gallery;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class  AdminController extends BaseController
{
    public function slider(){
		return view('admin.slider');
	}

	public function projeler(){
		return view('admin.projeler');
	}

	public function galeri(){
		return view('admin.galeri');
	}

    public function upload(Request $request) {
        try{
        // Dosyayı yükleme kısmı
        $request->validate([
            'photoUpload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Dosya adı 'photoUpload' olarak değiştirildi
        ]);

        if($request->hasFile('photoUpload')) {
            $file = $request->file('photoUpload');

            // Dosyanın boyutlarını al
            list($width, $height) = getimagesize($file->getPathname());

            // Özel boyut kontrolü
            if ($width == 2560 && $height == 1024) {
                $fileName = 'slider-1.' . $file->getClientOriginalExtension(); // Dosya adını slider-1 olarak ayarlayın

                // Dosya zaten varsa numaralandırma yapın
                $i = 1;
                while(file_exists(public_path('img/slider/' . $fileName))) {
                    $fileName = 'slider-' . $i . '.' . $file->getClientOriginalExtension();
                    $i++;
                }

                // Dosyayı yükleme işlemi
                $file->move('img/slider/', $fileName); // Dosyaların public klasörüne yüklendiğini varsayarak 'public/' kısmı kaldırıldı
                // Dosya yüklendikten sonra JSON yanıtı döndür
            return response()->json(['success' => true, 'message' => 'Dosya yüklendi!']);
        } else {
            // Özel boyut kontrolü başarısız olduğunda JSON yanıtı döndür
            return response()->json(['success' => false, 'message' => 'Dosyanın boyutları 2560x1024 olmalıdır.']);
        }
    }

    // Dosya yüklenemediğinde JSON yanıtı döndür
    return response()->json(['success' => false, 'message' => 'Dosya yüklenemedi.']);
     }catch (\Exception $e){
            return response()->json(['success' => false, 'message' => $e]);
        }
    }


    public function store(Request $request) {
        try{
    // Formdan gelen verileri doğrulama
        $request->validate([
            'projectTitle' => 'required|string|max:255',
            'projectDescription' => 'required|string',
            'projectPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'projectVideoLink' => 'nullable|url',
        ]);

        // Veritabanına yeni bir proje kaydet
        $project = new Project();
        $project->BASLIK = $request->input('projectTitle');
        $project->ACIKLAMA = $request->input('projectDescription');
        $project->LINK = $request->input('projectVideoLink');
        $project->save();

        // Proje fotoğrafını sunucuya yükle
        if ($request->hasFile('projectPhoto')) {
            $file = $request->file('projectPhoto');
            $fileName = 'project-' . $project->KAYITID . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/projects/'), $fileName);
            $project->save();
        }

        // Başarı mesajını döndür
        return response()->json(['success' => true, 'message' => 'Proje başarıyla kaydedildi.']);
         }catch (\Exception $e){
            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    public function uploadPhoto(Request $request) {
         try{
        // Formdan gelen verileri doğrulama
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title' => 'required|string|max:255',
        ]);

        // Başlığı veritabanına kaydetme
        $photo = new Gallery();
        $photo->BASLIK = $request->input('title');
        $photo->save();


        // Fotoğrafı sunucuya yükleme
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = 'photo-' . $photo->KAYITID . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/galeri/'), $fileName);
        }

        // Başarı mesajını döndür
        return response()->json(['success' => true, 'message' => 'Fotoğraf başarıyla yüklendi.']);
         }catch (\Exception $e){
            return response()->json(['success' => false, 'message' => $e]);
        }
    }

     public function uploadVideo(Request $request) {
        try{
        // Formdan gelen verileri doğrulama
        $request->validate([
            'videoLink' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        // Başlığı veritabanına kaydetme
        $photo = new Gallery();
        $photo->BASLIK = $request->input('title');
        $photo->LINK = $request->input('videoLink');
        $photo->save();

        // Başarı mesajını döndür
            return response()->json(['success' => true, 'message' => 'Video başarıyla yüklendi.']);
        }catch (\Exception $e){
            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    public function listSliderImages() {
    // Slider dizini
    $directory = public_path('img/slider');

    // Dosya adlarını içerecek bir dizi oluştur
    $fileNames = [];

    // Dizindeki dosyaları tarayarak slider- ile başlayan dosya adlarını al
    if (File::isDirectory($directory)) {
        $files = File::files($directory);
        foreach ($files as $file) {
            $fileName = $file->getFilename();
            if (strpos($fileName, 'slider-') === 0) {
                $fileNames[] = $fileName;
            }
        }
    }

    // Dosya adlarını gönder
    return view('admin.edit.slider', ['fileNames' => $fileNames]);
}


    public function listProjects() {
            // Slider dizini
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
   
    return view('admin.edit.projeler', ['projects' => $projects]);
}

public function listGallery() {
            // Slider dizini
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

     $galeri = Gallery::all();

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
    return view('admin.edit.galeri', ['galeri' => $galeri]);
        
    }

    public function deleteSlider(Request $request){
        try{
        // Gelen id parametresini al
            $id = $request->id;

            // Dosyanın adını oluştur
            $fileName =  $id;

            // Dosya yolunu belirle
            $filePath = public_path('img/slider/') . $fileName;

            // Dosyayı sil
            if (File::exists($filePath)) {
                File::delete($filePath);
                return response()->json(['success' => true, 'message' => 'Slider başarıyla silindi.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Slider bulunamadı.']);
            }
            }
            catch (\Exception $e)
            {
                return response()->json(['success' => false, 'message' => 'Bilinmeyen Hata!.']);
            }
    }

        public function deleteProject(Request $request){
        try{
        // Gelen id parametresini al
           $id = $request->id;

        // Dosya adının deseni
        $fileNamePattern = 'project-' . $id . '.*';

        // Dosyanın dizinini belirle
        $directory = public_path('img/projects/');

        // Dosya adlarını bul
        $files = File::glob($directory . $fileNamePattern);

        if (!empty($files)) {
        foreach ($files as $file) {
            File::delete($file);
        }
            $proje = Project::find($id);
            if ($proje) {
                $proje->delete();
            }
            return response()->json(['success' => true, 'message' => 'Proje silindi.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Proje bulunamadı.']);
            }
            }
            catch (\Exception $e)
            {
                return response()->json(['success' => false, 'message' => $e->getMessage()]);
            }
    }


        public function deleteGaleri(Request $request){
        try{
        // Gelen id parametresini al
           $id = $request->id;
            $galeri = Gallery::find($id);
            if ($galeri) {
                if(!is_null($galeri->LINK)){
                   $galeri->delete();
                   return response()->json(['success' => true, 'message' => 'Video silindi.']); 
            }else{
            $fileNamePattern = 'photo-' . $id . '.*';

            // Dosyanın dizinini belirle
            $directory = public_path('img/galeri/');

            // Dosya adlarını bul
            $files = File::glob($directory . $fileNamePattern);

            if (!empty($files)) {
                foreach ($files as $file) {
                File::delete($file);
            }
            $galeri->delete();
            return response()->json(['success' => true, 'message' => 'Fotoğraf silindi.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Kayıt bulunamadı.']);
            }
        }
        }
        // Dosya adının deseni
       
            }
            catch (\Exception $e)
            {
                return response()->json(['success' => false, 'message' => $e->getMessage()]);
            }
    }

    public function ozgecmis(){
        $ozgecmis = Fixed::select('OZGECMIS')->first();
        return view('admin.edit.ozgecmis',['ozgecmis' => $ozgecmis]);
    }

    public function setOzgecmis(Request $request){
        try{
        Fixed::where('KAYITID', 1)->update(['OZGECMIS' => $request->ozgecmis]);
        return response()->json(['success' => true, 'message' => 'Özgeçmiş Güncellendi']);
        }catch (\Exception $e)
        {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

    }

    public function sosyal(){
        $sosyal = Fixed::select('youtube', 'twitter', 'instagram', 'facebook')->first();
        return view('admin.edit.sosyal',['fixed' => $sosyal]);
    }

    public function setSosyal(Request $request){
        try{
        Fixed::where('KAYITID', 1)->update(['youtube' => $request->youtube,'twitter' => $request->twitter,'instagram' => $request->instagram, 'facebook' => $request->facebook]);
        return response()->json(['success' => true, 'message' => 'Sosyal Medya Hesapları Güncellendi']);
        }catch (\Exception $e)
        {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

    }

}
