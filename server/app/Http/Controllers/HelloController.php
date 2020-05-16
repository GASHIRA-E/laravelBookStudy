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
        return view('hello.index', ['msg'=>'フォームを入力：']);
    }

    // section3
    // public function index(Request $request) {
    //     $data = [
    //         ['name'=>'山田たろう', 'mail'=>'taro@yamada'],
    //         ['name'=>'田中はなこ', 'mail'=>'hanako@flower'],
    //         ['name'=>'鈴木さちこ', 'mail'=>'sachico@happy'],
    //     ];
    //     return view('hello.index', [
    //         'data'=>$data,
    //         'message'=>'Hello',
    //     ]);
    // }

    // HelloRequestを使用する
    public function post(HelloRequest $request) {
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }

    public function other() {
        global $head, $style, $body, $end;

        $html = $head . tag('title', 'Hello Other') . $style . $body
            . tag('h1', 'Other')
            . $end;

        return $html;
    }
}
