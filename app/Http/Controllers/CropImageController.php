<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use Illuminate\Support\Facades\Storage;

class CropImageController extends Controller
{
    public function index()
    {
        return view('crop-image-upload');
    }

    public function uploadCropImage(Request $request)
    {
        if (Storage::exists('storage/productnew.png')) {
            Storage::delete('storage/productnew.png');
        }
        $folderPath = public_path('product');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = 'new.png';

        $imageFullPath = $folderPath . $imageName;
        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new Picture;
        $saveFile->name = $imageName;
        $saveFile->save();

        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }
    public function editCropImage(Request $request, $id)
    {
        if (Storage::exists('storage/productnew.png')) {
            Storage::delete('storage/productnew.png');
        }
        $folderPath = public_path('product');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = 'new.png';

        $imageFullPath = $folderPath . $imageName;
        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new Picture;
        $saveFile->name = $imageName;
        $saveFile->save();

        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }
}
