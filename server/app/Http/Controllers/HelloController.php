<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return view('hello.index');
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

    public function post(Request $request) {
        return view('hello.index', ['msg' => $request->msg]);
    }

    // section2
    // public function index(Request $request, Response $response, $id = 'Ega') {
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title', 'Hello Index') . $style . $body
    //         . tag('h1', 'Hello YouTube')
    //         . '<a href="/hello/other">go to other page</a>'
    //         . '<h3>Request</h3>'
    //         . "<pre>{$request}</pre>"
    //         . '<h3>Response</h3>'
    //         . "<pre>{$response}</pre>"
    //         . $end;

    //     // return $html;
    //     $response->setContent($html);
    //     return $response;
    // }

    public function other() {
        global $head, $style, $body, $end;

        $html = $head . tag('title', 'Hello Other') . $style . $body
            . tag('h1', 'Other')
            . $end;

        return $html;
    }
}
