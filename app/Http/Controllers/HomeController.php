<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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

        $videos = DB::table('features')->join('videos', 'videos.id', '=', 'features.video')
            ->where('recommend', 1)->orWhere('hit', 1)->select('watch','recommend','hit')->get();

        foreach ($videos as $video) {
            //echo $title;

            if($video->recommend == 1){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                        'id' => $video->watch,
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


            if($video->hit == 1){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                        'id' => $video->watch,
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


            $result = [
                "recommend"    => $recommend,
                "hit"          => $hit
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
}