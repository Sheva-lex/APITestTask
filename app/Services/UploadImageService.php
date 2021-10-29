<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;


class UploadImageService
{
    public function uploadImage($file, $folder, $image = null)
    {
        $name = null;
        if ($file) {
            if ($image) {
                Storage::delete($image);
            }
            $name = '/storage/' . $file->store("/$folder", 'public');
        }
        return $name;
    }


    public function updateImage($file, $folder, $image = null)
    {
        if ($image) {
            $image = '/public' . substr($image, strlen('/storage'));
            Storage::delete($image);
        }

        return '/storage/' . $file->store("/$folder", 'public');
    }

    public function deleteImage($image)
    {
        if (is_array($image) or $image instanceof Collection) {
            foreach ($image as $media) {
                $oldImagePath = '/public' . substr($media->link, strlen('/storage'));
                Storage::delete($oldImagePath);
            }
        } elseif ($image) {
            $image = '/public' . substr($image, strlen('/storage'));
            Storage::delete($image);
        }
    }
}
