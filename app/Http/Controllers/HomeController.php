<?php

namespace App\Http\Controllers;

use App\Contact;
use App\VideoFeature;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        //$this->middleware('auth');
    }


    public function getSignUp()
    {
        return view('account.SignUp');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:6'
        ]);

        $email = $request['email'];
        $name = $request['name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;
        $user->newsletter = $request['newsletter'] ? 1 : 0;

        $user->save();

        Auth::login($user, true);

        //return redirect()->route('dashboard');
        return redirect('/');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], $request->remember)) {
//            return redirect()->route('dashboard');
            return redirect('/');
        }
        return redirect()->back();
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $client = new \Google_Client();
        $client->setDeveloperKey(config('services.google.key'));
        // Define an object that will be used to make all API requests.
        $youtube = new \Google_Service_YouTube($client);



        $videosResponse = null;
        $result = [];
        $thumbnails = null;


        $recommend = [];
        $hit = [];
        $movie = [];
        $funny = [];
        $food = [];
        $troll = [];
//        $videos = DB::table('features')->join('videos', 'videos.id', '=', 'features.video')
//            ->where('recommend', 1)->orWhere('hit', 1)->select('video','recommend','hit')->get();

        $videos = VideoFeature::select('video','feature')->where('status', 1)->orderBy('created_at', 'desc')->get();

        foreach ($videos as $video) {
            //echo $title;

            if($video->feature == 1){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                        'id' => $video->video,
                    ));

                    foreach ($videosResponse['items'] as $videoResult) {

                        $rate = $this->rateVideo($videoResult['statistics']['likeCount'],$videoResult['statistics']['dislikeCount'],5,1);

                        $snippet = [
                            "id"            => $videoResult['id'],
                            "title"         => $videoResult['snippet']['title'],
                            "channelTitle"  => $videoResult['snippet']['channelTitle'],
                            "description"   => $this->descriptionVideo($videoResult['snippet']['description']),
                            "publishedAt"   => $this->timeAgo($videoResult['snippet']['publishedAt']),
                            "viewCount"     => number_format($videoResult['statistics']['viewCount']),
                            "thumbnails"    => $videoResult['snippet']['thumbnails']['maxres']['url'],
                            "thumbnailsSD"  => 'https://i.ytimg.com/vi/'.$videoResult['id'].'/mqdefault.jpg',
                            "rate"          => $rate
                        ];

                        array_push($recommend,$snippet);

                    }



                } catch (Google_Service_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                } catch (Google_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                }

            }


            if($video->feature == 2){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                        'id' => $video->video,
                    ));

                    foreach ($videosResponse['items'] as $videoResult) {

                        $rate = $this->rateVideo($videoResult['statistics']['likeCount'],$videoResult['statistics']['dislikeCount'],5,1);

                        $snippet = [
                            "id"            => $videoResult['id'],
                            "title"         => $videoResult['snippet']['title'],
                            "channelTitle"  => $videoResult['snippet']['channelTitle'],
                            "description"   => $this->descriptionVideo($videoResult['snippet']['description']),
                            "publishedAt"   => $this->timeAgo($videoResult['snippet']['publishedAt']),
                            "viewCount"     => number_format($videoResult['statistics']['viewCount']),
                            "thumbnails"    => $videoResult['snippet']['thumbnails']['maxres']['url'],
                            "thumbnailsSD"  => 'https://i.ytimg.com/vi/'.$videoResult['id'].'/mqdefault.jpg',
                            "rate"          => $rate
                        ];

                        array_push($hit,$snippet);

                    }


                } catch (Google_Service_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                } catch (Google_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                }

            }

            if($video->feature == 4){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                        'id' => $video->video,
                    ));

                    foreach ($videosResponse['items'] as $videoResult) {

                        $rate = $this->rateVideo($videoResult['statistics']['likeCount'],$videoResult['statistics']['dislikeCount'],5,1);

                        $snippet = [
                            "id"            => $videoResult['id'],
                            "title"         => $videoResult['snippet']['title'],
                            "channelTitle"  => $videoResult['snippet']['channelTitle'],
                            "description"   => $this->descriptionVideo($videoResult['snippet']['description']),
                            "publishedAt"   => $this->timeAgo($videoResult['snippet']['publishedAt']),
                            "viewCount"     => number_format($videoResult['statistics']['viewCount']),
                            "thumbnails"    => $videoResult['snippet']['thumbnails']['maxres']['url'],
                            "thumbnailsSD"  => 'https://i.ytimg.com/vi/'.$videoResult['id'].'/mqdefault.jpg',
                            "rate"          => $rate
                        ];

                        array_push($movie,$snippet);

                    }


                } catch (Google_Service_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                } catch (Google_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                }

            }

            if($video->feature == 5){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                        'id' => $video->video,
                    ));

                    foreach ($videosResponse['items'] as $videoResult) {

                        $rate = $this->rateVideo($videoResult['statistics']['likeCount'],$videoResult['statistics']['dislikeCount'],5,1);

                        $snippet = [
                            "id"            => $videoResult['id'],
                            "title"         => $videoResult['snippet']['title'],
                            "channelTitle"  => $videoResult['snippet']['channelTitle'],
                            "description"   => $this->descriptionVideo($videoResult['snippet']['description']),
                            "publishedAt"   => $this->timeAgo($videoResult['snippet']['publishedAt']),
                            "viewCount"     => number_format($videoResult['statistics']['viewCount']),
                            "thumbnails"    => $videoResult['snippet']['thumbnails']['maxres']['url'],
                            "thumbnailsSD"  => 'https://i.ytimg.com/vi/'.$videoResult['id'].'/mqdefault.jpg',
                            "rate"          => $rate
                        ];

                        array_push($funny,$snippet);

                    }


                } catch (Google_Service_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                } catch (Google_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                }

            }

            if($video->feature == 7){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                        'id' => $video->video,
                    ));

                    foreach ($videosResponse['items'] as $videoResult) {

                        $rate = $this->rateVideo($videoResult['statistics']['likeCount'],$videoResult['statistics']['dislikeCount'],5,1);

                        $snippet = [
                            "id"            => $videoResult['id'],
                            "title"         => $videoResult['snippet']['title'],
                            "channelTitle"  => $videoResult['snippet']['channelTitle'],
                            "description"   => $this->descriptionVideo($videoResult['snippet']['description']),
                            "publishedAt"   => $this->timeAgo($videoResult['snippet']['publishedAt']),
                            "viewCount"     => number_format($videoResult['statistics']['viewCount']),
                            "thumbnails"    => $videoResult['snippet']['thumbnails']['maxres']['url'],
                            "thumbnailsSD"  => 'https://i.ytimg.com/vi/'.$videoResult['id'].'/mqdefault.jpg',
                            "rate"          => $rate
                        ];

                        array_push($food,$snippet);

                    }


                } catch (Google_Service_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                } catch (Google_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                }

            }

            if($video->feature == 6){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                        'id' => $video->video,
                    ));

                    foreach ($videosResponse['items'] as $videoResult) {

                        $rate = $this->rateVideo($videoResult['statistics']['likeCount'],$videoResult['statistics']['dislikeCount'],5,1);

                        $snippet = [
                            "id"            => $videoResult['id'],
                            "title"         => $videoResult['snippet']['title'],
                            "channelTitle"  => $videoResult['snippet']['channelTitle'],
                            "description"   => $this->descriptionVideo($videoResult['snippet']['description']),
                            "publishedAt"   => $this->timeAgo($videoResult['snippet']['publishedAt']),
                            "viewCount"     => number_format($videoResult['statistics']['viewCount']),
                            "thumbnails"    => $videoResult['snippet']['thumbnails']['maxres']['url'],
                            "thumbnailsSD"  => 'https://i.ytimg.com/vi/'.$videoResult['id'].'/mqdefault.jpg',
                            "rate"          => $rate
                        ];

                        array_push($troll,$snippet);

                    }


                } catch (Google_Service_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                } catch (Google_Exception $e) {
                    return response()->json(['page' => $e], 200);
                    //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
                }

            }


            $result = [
                "recommend"    => $recommend,
                "hit"          => $hit,
                "movie"          => $movie,
                "funny"          => $funny,
                "food"          => $food,
                "troll"          => $troll
            ];



        }







        // all good so return the token
//        return response()->json(['page' => $searchResponse->toSimpleObject()], 200);

        //return response()->json($videosResponse->toSimpleObject(), 200);

        return view('welcome',['result' => $result]);
        //return "dd(".json_encode($videosResponse->toSimpleObject()).")";
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


    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function contact()
    {
        return view('contact');
    }


    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email',
            'phone' => 'required|min:9',
            'message' => 'required|min:6'
        ]);


        $contact = new Contact();
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        $contact->phone = $request['phone'];
        $contact->message = $request['message'];

        $result = $contact->save();

        if(!$result){
            return redirect()->route('contact')->with('message', 'Error');
        }

        //return redirect()->route('dashboard');
        return redirect()->route('contact')->with('message', 'Thanks for contacting us!');
    }




    /**
     * Display time date ago
     *
     * @param  string  $time_ago
     * @return \Illuminate\Http\Response
     */
    public function timeAgo($time_ago)
    {
        $time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "just now";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "one minute ago";
            }
            else{
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "an hour ago";
            }else{
                return "$hours hrs ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "yesterday";
            }else{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a week ago";
            }else{
                return "$weeks weeks ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a month ago";
            }else{
                return "$months months ago";
            }
        }
        //Years
        else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }
    }


    /**
     * description video
     *
     * @param  string  $str
     * @return static
     */
    public function descriptionVideo($str)
    {
        return strlen($str) >= 190 ? mb_substr($str,0,190, 'UTF-8') .'...' : $str;
    }


    /**
     * rate video
     *
     * @param  int  $decimal
     * @param  int  $percentage
     * @param  float  $like
     * @param  float  $disLike
     * @return float
     */
    public static function rateVideo($like,$disLike,$percentage,$decimal)
    {
        return number_format(($like * $percentage) / ($like + $disLike), $decimal, '.', '');

//        switch(form.attr("id")) {
//            case "f1":
//                var totalValue = a / 100 * b;
//                break;
//            case "f2":
//                var totalValue = a / b * 100;
//                break;
//            case "f3":
//                var totalValue = (b - a) / a  * 100;
//                break;
//        }

    }

    /**
     * What is the percentage increase/decrease
     *
     * @param  int  $decimal
     * @param  int  $percentage
     * @param  float  $like
     * @param  float  $disLike
     * @return float
     */
    public static function calcPercentage ($like,$disLike,$percentage,$decimal)
    {
        if($like == 0){
            return 100;
        }
        return number_format(($disLike - $like) / $like  * $percentage, $decimal, '.', '');
    }
    
}