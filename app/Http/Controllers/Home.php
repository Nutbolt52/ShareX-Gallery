<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Storage;
Use Image;
Use File;

class Home extends Controller
{
    public function HomePage()
    {
        $destinationPath = public_path('\storage\thumbnails');

        $fullsizedfiles = array_filter(Storage::files('public/fullsized-images'), function($file) {
            return preg_match('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $file);
        });

        //Generate thumbnails for full sized image if one doesn't already exist
        foreach($fullsizedfiles as $file)
        {
            $filename = basename($file);
            if(Storage::disk('local')->exists('public/thumbnails/' . $filename)) {
                //do nothing
            } else {
                Image::make(Storage::get($file))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $filename);
            }
        }

        $thumbnailfiles = array_filter(Storage::files('public/thumbnails'), function($file) {
            return preg_match('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $file);
        });

        //Delete thumbnail images if a full sized image doesn't exist
        foreach($thumbnailfiles as $file)
        {
            $filename = basename($file);
            if(Storage::disk('local')->exists('public/fullsized-images/' . $filename)) {
                //do nothing
            } else {
                Storage::delete($file);
            }

        }

        $thumbnailfiles_filtered = array();
        $fullsizedfiles_filtered = array();

        $fullsizedfiles = array_filter(Storage::files('public/fullsized-images'), function($file) {
            return preg_match('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $file);
        });

        foreach($fullsizedfiles as $file) {
            $fullsizedfiles_filtered[] = $file;
        }

        $thumbnailfiles = array_filter(Storage::files('public/thumbnails'), function($file) {
            return preg_match('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $file);
        });

        foreach($thumbnailfiles as $file) {
            $thumbnailfiles_filtered[] = $file;
        }

        return view('Home')->with('thumbnails', $thumbnailfiles_filtered)->with('fullsized', $fullsizedfiles_filtered);
    }

    public function LoginPage()
    {
        return view('Login');
    }

    public function Login(Request $request)
    {
        if($request->password === env('PASSWORD')) {
            $request->session()->put('allowed', true);
            return redirect('/');
        } else {
            return redirect('login')->with('passworderror', 'Try again');
        }
    }

    public function Delete($filename)
    {
        $fullsize = 'public/fullsized-images/' . $filename;
        $thumbnail = 'public/thumbnails/' . $filename;

        Storage::delete([$fullsize, $thumbnail]);

        $message = 'File ' . $filename . ' deleted successfully';
        return redirect('/')->with('success', $message) ;
    }

    public function ViewImage($filename)
    {
        $path = 'storage/fullsized-images/' . $filename;

        return response()->file($path);
    }

}
