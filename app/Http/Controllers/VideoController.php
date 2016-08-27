<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function postVideoFind(Request $request)
    {

        $id = strpos($request->id, 'watch?v=') ? explode('watch?v=', $request->id)[1] : $request->id;

        $client = new \GuzzleHttp\Client(['verify' => false ,'http_errors' => false]);
        $res = $client->request('POST', config('services.domain.default').'/service/youtube/video', [
            'query' => [
                'id' => $id
            ],
        ]);
        $res->getStatusCode();

        $result = json_decode($res->getBody()->getContents(), true);
        $result = isset($result['items'][0]) ? $result['items'][0] : false;


        $user = Auth::user();
        $socials = DB::table('video_socials')->where('video', $id)->where('status', 1)
        ->orWhere('video', $id)->where('status', 3)->where('user', $user->id)->get();

        //$sql = DB::table('video_socials')->where('video', $id)->toSql();
        //if($socials == null) return view('account.landing.video', ['result' => $result]);
        $arr = null;
        foreach($socials as $social){

            $arr[$social->social][$social->status] = [
                "user" => $social->user == $user->id ? true : false,
                "url" => $social->url,
            ];


            //array_merge($arr,$snip);
            //$arr[$social->video] .= $social->video;
        }

        //return view('search', ['result' => json_decode($res->getBody(), true)]);

        //return view('account.landing.video', ['result' => json_decode($res->getBody(), true)]);
        //return view('account.landing.video', ['result' => $result]);
        return view('account.landing.video', ['result' => $result, 'social' => $arr]);
        //return response()->json($result, 200);


//        "kind" => "youtube#video"
//  "etag" => ""I_8xdZu766_FSaexEaDXTIfEWc0/TrgqOu0BD8lGP796VOTGnTxrgYg""
//  "id" => "PzLxt8fIGEI"
//  "snippet" => array:11 [▼
//    "publishedAt" => "2016-08-21T08:58:47.000Z"
//    "channelId" => "UCE2B5Sp_BcgAShEiGH7Mrtg"
//    "title" => "โหน่ง.. ร้องเพลงหลบเสียง อย่างฮา | รวมความฮา หม่ำ เท่ง โหน่ง ชิงร้อย #5"
//    "description" => """
//      ชิงร้อยชิงล้านย้อนหลัง ชิงร้อย ชิงล้าน ช่องเวิร์คพอยท์ ทุกวันอาทิตย์ เวลา 14.45 - 17.00 น.\n
//      โหน่ง.. ร้องเพลงหลบเสียงอีกแล้ว อย่างฮา | รวมความฮา หม่ำ เท่ง โหน่ง ชิงร้อย #5\n
//      ฝากกดติดตามเพื่อชมคลิปใหม่ๆ ► https://goo.gl/z1QNgk\n
//      \n
//      ตัวเต็ม : https://goo.gl/6jRdHU
//      """
//    "thumbnails" => array:4 [▶]
//    "channelTitle" => "Maxxximus channel"
//    "tags" => array:24 [▶]
//    "categoryId" => "23"
//    "liveBroadcastContent" => "none"
//    "defaultLanguage" => "th"
//    "localized" => array:2 [▶]
//  ]
//  "statistics" => array:5 [▼
//    "viewCount" => "89532"
//    "likeCount" => "187"
//    "dislikeCount" => "17"
//    "favoriteCount" => "0"
//    "commentCount" => "11"
//  ]

    }


    public function postVideo(Request $request)
    {

        $id = strpos($request->id, 'watch?v=') ? explode('watch?v=', $request->id)[1] : $request->id;

        $client = new \GuzzleHttp\Client(['verify' => false ,'http_errors' => false]);
        $res = $client->request('POST', config('services.domain.default').'/service/youtube/video', [
            'query' => [
                'id' => $id
            ],
        ]);
        $res->getStatusCode();

        $result = json_decode($res->getBody()->getContents(), true);
        $result = isset($result['items'][0]) ? $result['items'][0] : false;


        //return view('search', ['result' => json_decode($res->getBody(), true)]);

        //return view('account.landing.video', ['result' => json_decode($res->getBody(), true)]);
        return view('account.landing.video', ['result' => $result]);
        //return response()->json($result, 200);


    }


}
