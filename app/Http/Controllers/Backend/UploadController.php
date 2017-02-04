<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Qiniu\Storage\UploadManager;
use Pinyin;
use Auth;

class UploadController extends Controller {
    
    protected $uploadService;

    /**
     * UploadController constructor.
     * @param $uploadService
     */
    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCallback()
    {
        $_body = file_get_contents('php://input');
        $body = json_decode($_body, true);
        return response()->json([ 'fname' => $body[ 'fname' ], 'fkey' => $body[ 'fkey' ], 'desc' => $body[ 'desc' ] ]);
    }

    public function upload(Request $request)
    {
        // 获取 token
        $uploadToken = $this->uploadService->getUploadToken();
        $file = $request->file('imgFile') !== null ? $request->file('imgFile') : $request->file('editormd-image-file');

        // 文件名
        $original_name = $file->getClientOriginalName();
        $original_name_without_ext = substr($original_name, 0, strlen($original_name) - 4);
        $filename = $this->uploadService->sanitize($original_name_without_ext);
        $allowed_filename = Pinyin::permalink($this->uploadService->createUniqueFilename($filename));
        $allowed_filename = 'user/'.Auth::user()->id.'/image/'.$allowed_filename;
        // 文件路径
        $file_path = $file->getRealPath();
        // 文件上传
        $uploadMgr = new UploadManager();
        list($ret, $err) = $uploadMgr->putFile($uploadToken, $allowed_filename, $file_path);

        if ($err !== null) {
            return response()->json(['message' => $err , 'success' => 0, 'type' => 'error', 'title' => '上传图片！', 'text' => '上传失败，请重新上传！']);
        } else {
            return response()->json(['message' => $ret , 'success' => 1, 'url' => env('APP_URL') . '/' . $ret['key'], 'type' => 'success', 'title' => '上传图片！', 'text' => '成功上传到七牛']);
        }
    }
}
