<?php

namespace App\Http\Controllers;

use App\User;
use Facebook\Facebook;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class AccountController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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






    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getAccount()
    {
        return view('account.account', ['user' => Auth::user()]);
    }

    public function getProfile()
    {
        return view('account.profile', ['user' => Auth::user()]);
    }

    public function postSaveAccount(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120'
        ]);

        $user = Auth::user();
        $old_name = $user->name;
        $user->name = $request['name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['name'] . '-' . $user->id . '.jpg';
        $old_filename = $old_name . '-' . $user->id . '.jpg';
        $update = false;
        if (Storage::disk('local')->has($old_filename)) {
            $old_file = Storage::disk('local')->get($old_filename);
            Storage::disk('local')->put($filename, $old_file);
            $update = true;
        }
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        if ($update && $old_filename !== $filename) {
            Storage::delete($old_filename);
        }
        return redirect()->route('account');
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }



    public function postFindVideo(Request $request)
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


}
