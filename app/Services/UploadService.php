<?php

namespace App\Services;

use Illuminate\Http\File;
use Qiniu\Auth;

class UploadService
{

    /**
     * @return string
     */
    public function getUploadToken()
    {
        $auth = new Auth(env('QINIU_AK'), env('QINIU_SK'));

//        $policy = [
//            'callbackUrl' => route('admin.upload.getCallback'),
//            'callbackBody' => '{
//                "fname" => "$(fname)",
//                "fkey" => "$(key)",
//                "desc" => "$(x:desc)"
//            }'
//        ];
        $token = $auth->uploadToken(env('QINIU_BUCKET'), null, 3600);
        return $token;
    }
    

    public function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array( "~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?" );
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ( $anal ) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean;
        return ( $force_lowercase ) ?
            ( function_exists('mb_strtolower') ) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }

    public function createUniqueFilename($filename)
    {
        // Generate token for image
        $image_token = substr(sha1(mt_rand()), 0, 5);
        return $filename . '-' . $image_token;
    }

}