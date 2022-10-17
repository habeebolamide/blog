<?php

use Illuminate\Support\Str;
use App\Models\Censis\Level;
use Illuminate\Http\Request;
use App\Models\Censis\Institution;
use Illuminate\Support\Facades\File;
use App\Models\Censis\Specialization;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

function uploadAvater($originalImage, $path, $name, $custum_resize = null)
{
    $destination = storage_path('app/public/' . $path);
    //  check if file storage path already exists. If No, create a new one
    if (!File::isDirectory($destination)) {
        File::makeDirectory($destination, 0777, true, true);
    }

    if ($custum_resize !== null) {
        $thumbnailImage = Image::make($originalImage)
            ->resize(100, 100)
            ->save($destination . $name . '.png');
    }

    $thumbnailImage = Image::make($originalImage)
        ->resize(150, 150)
        ->save($destination . $name . '.png');

    return  asset('storage/' . $path . $thumbnailImage->basename);
}

function uploadDocument($file, $path, $name = null)
{
    $destination = storage_path('app/public/' . $path);
    //  check if file storage path already exists. If No, create a new one
    if (!File::isDirectory($destination)) {
        File::makeDirectory($destination, 0777, true, true);
    }

    if (is_null($name)) {
        $filename = time() . '.pdf';
    } else {
        $filename = $name . '.pdf';
    }

    file_put_contents($destination . $filename, $file);

    return  url('/') . '/storage' . $path . $filename;
}


function generateUniqString()
{
    return Str::of(Str::random(10) . time())->upper()->toString();
}
