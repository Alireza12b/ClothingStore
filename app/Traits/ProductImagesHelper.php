<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ProductImagesHelper
{
    protected function saveProductImage(?UploadedFile $file): ?string
    {
        if (!$file) {
            return null;
        }

        $uid = Str::uuid()->toString();
        $ext = $file->getClientOriginalExtension();
        $name = $uid.'_'.$file->getClientOriginalName();

        Storage::disk('product_imgs')->putFileAs('', $file, $name);

        return $name;
    }

    protected function deleteProductImage(?string $filename): void
    {
        if ($filename && Storage::disk('product_imgs')->exists($filename)) {
            Storage::disk('product_imgs')->delete($filename);
        }
    }
}
