<?php

namespace App\Http\Controllers;

use App\SocialView;
use App\User;
use App\UserView;
use App\VideoSocial;
use Carbon\Carbon;
use Facebook\Facebook;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $user = Auth::user();
        $histories = DB::table('video_socials')->where('user', $user->id)
            ->leftJoin('socials', 'socials.id', '=', 'video_socials.social')
            ->leftJoin('video_social_statuses', 'video_social_statuses.id', '=', 'video_socials.status')
            ->select('video_socials.*', 'socials.name', 'video_social_statuses.title', 'video_social_statuses.description')
            ->orderBy('video_socials.created_at', 'desc')->get();

        $st1 = VideoSocial::where('user', $user->id)->where('status', 1)->count();
        $st2 = VideoSocial::where('user', $user->id)->where('status', 2)->count();
        $st3 = VideoSocial::where('user', $user->id)->where('status', 3)->count();
        $st4 = UserView::where('user', $user->id)->where('created_at', '<=', Carbon::now())->count();
        $st_user = UserView::where('user', $user->id)->where('created_at', '<=', Carbon::now()->addDay(-1))
            ->where('created_at', '!=', "0000-00-00 00:00:00")->count();
        $st5 = SocialView::where('user', $user->id)->count();
        $st_social = SocialView::where('user', $user->id)->where('created_at', '<=', Carbon::now()->addDay(-1))
            ->where('created_at', '!=', "0000-00-00 00:00:00")->count();


//        "select
//( select count(*) from `video_socials` where `user` = 1 and `status` = 1  ) st1,
//( select count(*) from `video_socials` where `user` = 1 and `status` = 2  ) st2,
//( select count(*) from `video_socials` where `user` = 1 and `status` = 3  ) st3,
//( select count(*) from `user_views` where `user` = 1 and `created_at` = '2016-08-29 02:51:35'  ) st4,
//( select count(*) from `social_views` where `user` = 1 ) st5,
//( select count(*) from `user_views` where `user` = 1 and `created_at` <= '2016-08-28 02:51:35' and `created_at` != '0000-00-00 00:00:00' ) st6,
//( select count(*) from `social_views` where `user` = 1 and `created_at` <= '2016-08-28 02:51:35' and `created_at` != '0000-00-00 00:00:00' ) st7"


        $statuses = [
            "approved" => number_format($st1),
            "disapprove" => number_format($st2),
            "waiting" => number_format($st3),
            "visitor" => number_format($st4),
            "click" => number_format($st5),
            "rank" => $this->ranks($st4),
            "user_diff" => HomeController::calcPercentage($st_user, $st4, 100, 0),
            "social_diff" => HomeController::calcPercentage($st_social, $st5, 100, 0)
        ];
        return view('account.account', ['user' => Auth::user(), 'histories' => $histories, 'statuses' => $statuses]);
    }

    public function getProfile()
    {
        return view('account.profile', ['user' => Auth::user()]);
    }

    public function postProfile(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => $user->email ? '' : 'required|email|unique:users',
            'gender' => 'required',
            'birth_day' => 'required',
            'birth_month' => 'required',
            'birth_year' => 'required',
        ]);

        $profile = User::find($user->id);

        $avatarPath = 'avatar/';
        $avatarURL = 'http://'.$_SERVER['HTTP_HOST'].'/avatar/';

        $file = $request->file('avatar');
        $filename = $user->id . '.jpg';
        //$old_filename = $user->id . '.jpg';

        if (Storage::disk('local')->has($avatarPath.$filename)) {
            Storage::delete($avatarPath.$filename);
        }

        if ($file) {
            Storage::disk('local')->put($avatarPath.$filename, File::get($file));
            $profile->avatar = $avatarURL.$filename;
            //Image::make($file->getRealPath())->resize(20, 20)->save($avatarPath.$filename);
        }

        if(!$user->email){
            $profile->email = $request->email;
        }

        $profile->name = $request->name;
        $profile->birth = $request->birth_year.'-'.$request->birth_month.'-'.$request->birth_day;
        $profile->gender = $request->gender;
        $profile->newsletter = $request->newsletter ? 1 : 0;
        $result = $profile->save();

//        if ($update && $old_filename !== $filename) {
//            Storage::delete($old_filename);
//        }

//        $contact = new Contact();
//        $contact->name = $request['name'];
//        $contact->email = $request['email'];
//        $contact->phone = $request['phone'];
//        $contact->message = $request['message'];
//
//        $result = $contact->save();
//
        if(!$result){
            return redirect()->route('contact')->with('message', 'เกิดข้อผิดพลาด');
        }

        //return redirect()->route('dashboard');
        return redirect()->route('profile')->with('message', 'บันทึกข้อมูล');
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



    public static function ranks($i){

        switch (true) {
            case $i >= 1000000:
                return "Legendary";
            case $i >= 500000:
                return "Extreme";
            case $i >= 250000:
                return "Superior";
            case $i >= 125000:
                return "Legendary";
            case $i >= 67500:
                return "Senior";
            case $i >= 30000:
                return "Junior";
            default:
                return "User";
        }


    }




}
