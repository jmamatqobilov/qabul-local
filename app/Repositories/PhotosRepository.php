<?php
namespace App\Repositories;
use App\Http\Requests\PhotoRequest;
use App\Models\Application;
use App\Models\Inspection;
use App\Models\Photo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Image\Image;


class PhotosRepository extends Repository {

    public function __construct(Photo $photo) {
        $this->model = $photo;
    }

    public function add(PhotoRequest $photoRequest, Inspection $inspection){
        $data = $photoRequest->only('title');
        if(empty($data)){
            return ['error'=>'No Data'];
        }
        return $this->save(
            $photoRequest->file('photo'),
            $data,
            $inspection
        );
    }

    public function save(UploadedFile $file, $photo_data, Inspection $inspection){
        $photo = $file->store('photos/a'.$inspection->application->id);
        if(!File::isDirectory('photos/a'.$inspection->application->id.'/thumbs')) {
            File::makeDirectory('photos/a'.$inspection->application->id.'/thumbs');
        }
        Image::load($photo)
            ->width(200)
            ->height(200)
            ->save(
                Str::replaceFirst('a'.$inspection->application->id,'a'.$inspection->application->id.'/thumbs',$photo)
            );
        $photo_data['url'] = $photo;
        $this->model->fill($photo_data);
        if($result = $inspection->photos()->save($this->model)){
            return $result;
        }
    }

    public function delete(Photo $photo, Inspection $inspection){
        if(
            Storage::delete($photo->url) &&
            Storage::delete(Str::replaceFirst('a'.$inspection->id, 'a'.$inspection->id.'/thumbs', $photo->url)) &&
            $photo->delete()
        ){
            return true;
        }
        return false;
    }
}
