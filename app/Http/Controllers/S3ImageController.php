<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Storage;

class S3ImageController extends Controller
{

    /**
    * Create view file
    *
    * @return void
    */
    public function imageUpload()
    {
        return view('image-upload');
    }

    /**
    * Manage Post Request
    *
    * @return void
    */
    public function imageUploadPost(Request $request)
    {
        $user = Auth::user();
        $userID = $user->id;
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $userID;
        //$imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image = $request->file('image');
        $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
        $imageName = Storage::disk('s3')->url($imageName);

        return back()
            ->with('success','$userID')
            ->with('path',$imageName);
        return $request->file('image');
    }
    public static function getImage ($imagePath)
    {
        if(Storage::exists($imagePath))
        {
            return Storage::disk('s3')->get($imagePath);
        }else
        {
            return 'No Image';
        }
    }
}