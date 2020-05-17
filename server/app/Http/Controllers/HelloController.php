<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\HelloRequest;

global $head, $style, $body, $end;

$head = '<html><head>';

$style = <<<EOF
<style>
h1 {font-size:100px; text-align:right;}
</style>
EOF;

$body = '</head><body>';

$end = '</body></html>';

function tag($tag, $text) {
    return "<{$tag}>".$text."</{$tag}>";
}

class HelloController extends Controller
{

    public function index(Request $request) {
        if ($request->hasCookie('msg')) {
            //  requestからクッキーを取り出す
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = '※クッキーはありません。';
        }
        return view('hello.index', ['msg'=>$msg]);
    }

    public function post(Request $request) {
        $validateRule = [
            'msg' => 'required'
        ];
        
        $this->validate($request, $validateRule);
        $msg = $request->msg;
        $response = response()->view('hello.index', ['msg' => '「'.$msg.'」をクッキーに保存しました。']);
        // responseにクッキーを保存する
        $response->cookie('msg', $msg, 100);

        return $response;
    }
}
