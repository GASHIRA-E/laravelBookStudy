<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // nextメソッドは次のhandleが実行されるか、ない場合はコントローラにあるアクションが呼び出される
        // コントローラのアクションが実行された結果のレスポンスが返される。
        $response = $next($request);
        // レスポンスに含まれているコンテンツを取り出す
        $content = $response->content();

        // <middleware></middleware>というテキストを<a href="http://"></a>に置き換える
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);

        // レスポンスのコンテンツを更新
        $response->setContent($content);
        // 返り値としてリプレイス後のコンテンツを返す
        return $response;
    }
}
