<?php

namespace App\Http\Controllers;

use App\Social;
use App\UserView;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


//require_once '/Google/Client.php';
//require_once '/Google/Service/YouTube.php';


class SearchController extends Controller
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
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(Auth::user()){
            $u = new UserView();
            $u->video = $id;
            $u->user = Auth::user()->id;
            $u->save();
        }
        // Call set_include_path() as needed to point to your client library.

        /*
         * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
         * Google Developers Console <https://console.developers.google.com/>
         * Please ensure that you have enabled the YouTube Data API for your project.
         */

        $client = new \Google_Client();
        $client->setDeveloperKey(config('services.google.key'));

        // Define an object that will be used to make all API requests.
        $youtube = new \Google_Service_YouTube($client);

        $videosResponse = null;
        $result = null;
        $thumbnails = null;
        try {
            // Call the search.list method to retrieve results matching the specified
            // query term.
            $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                'id' => $id,
            ));

            foreach ($videosResponse['items'] as $videoResult) {

                $result = [
                    "id"            => $videoResult['id'],
                    "title"         => $videoResult['snippet']['title'],
                    "channelTitle"  => $videoResult['snippet']['channelTitle'],
                    "description"   => $videoResult['snippet']['description'],
                    "publishedAt"   => $this->timeAgo($videoResult['snippet']['publishedAt']),
                    "viewCount"     => number_format($videoResult['statistics']['viewCount']),
                    "thumbnails"    => $videoResult['snippet']['thumbnails']['maxres']['url'],
                    "thumbnailsSD"  => 'https://i.ytimg.com/vi/'.$videoResult['id'].'/mqdefault.jpg',
                    "tags"          => $videoResult['snippet']['tags'],
                    "keywords"      => $this->keywords($videoResult['snippet']['tags']),
                ];

            }




        } catch (Google_Service_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        } catch (Google_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        }


        $socials = Social::select('video_socials.id', 'socials.image', 'socials.name', 'socials.group')
            ->join('video_socials', 'video_socials.social', '=', 'socials.id')
            ->where('video_socials.video', $id)->where('video_socials.status', 1)->get();


        // all good so return the token
        //return response()->json(['result' => $videosResponse->toSimpleObject()], 200);
        //return view('watch', ['result' => $videosResponse->toSimpleObject()]);
        return view('watch', ['result' => $result, 'socials' => $socials]);

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


    /**
     * Youtube video api
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function video(Request $request)
    {


        // Call set_include_path() as needed to point to your client library.

        /*
         * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
         * Google Developers Console <https://console.developers.google.com/>
         * Please ensure that you have enabled the YouTube Data API for your project.
         */
        $client = new \Google_Client();
        $client->setDeveloperKey(config('services.google.key'));

        // Define an object that will be used to make all API requests.
        $youtube = new \Google_Service_YouTube($client);

        try {
            // Call the search.list method to retrieve results matching the specified
            // query term.
            $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                'id' => $request->id,
            ));

        } catch (Google_Service_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        } catch (Google_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        }


        // all good so return the token
//        return response()->json(['page' => $searchResponse->toSimpleObject()], 200);

        return response()->json($videosResponse->toSimpleObject(), 200);
    }




    /**
     * Youtube search api
     *
     * @param  string  $q
     * @return \Illuminate\Http\Response
     */
    public function search($q)
    {
        // Store a piece of data in the session...
        session(['search' => $q]);

//        try{
//            $res = $client->request('POST', 'https://api.github.com/user', [
//                'auth' => ['user', 'pass']
//            ]);
//            $res->getStatusCode();
//            $res->getHeader('content-type');
//            $resp = $res->getBody();
//
//        }catch(\Exception $e){
//            return view('search', ['user' => $e]);
//        }

        $client = new \GuzzleHttp\Client(['verify' => false ,'http_errors' => false]);
        $res = $client->request('POST', config('services.domain.default').'/service/youtube/search', [
            'query' => [
                'q' => $q,
                'pageToken' => ''
            ],
        ]);
        $res->getStatusCode();

        //$result = $this->search($q,$pageToken);

        return view('search', ['result' => json_decode($res->getBody(), true)]);
//        return view('search', ['results' => [
//            'q' => $q,
//            'pageToken' => $res->getBody()
//        ]]);
        //return view('layouts.main', ['user' => $id]);


    }




    /**
     * Youtube search api
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchMore(Request $request)
    {

        $client = new \GuzzleHttp\Client(['verify' => false ,'http_errors' => false]);
        $res = $client->request('POST', config('services.domain.default').'/service/youtube/search', [
            'query' => [
                'q' => $request->q,
                'pageToken' => $request->pageToken
            ],
        ]);
        $res->getStatusCode();

        //$result = $this->search($q,$pageToken);

        return view('searchMore', ['result' => json_decode($res->getBody(), true)]);
//        return view('search', ['results' => [
//            'q' => $q,
//            'pageToken' => $res->getBody()
//        ]]);
        //return view('layouts.main', ['user' => $id]);


    }


    /**
     * Youtube search api
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchList(Request $request)
    {
        $pageToken = '';

        if ($request->has('pageToken')) {
            $pageToken =  $request->pageToken;
        }

        // Call set_include_path() as needed to point to your client library.


        /*
         * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
         * Google Developers Console <https://console.developers.google.com/>
         * Please ensure that you have enabled the YouTube Data API for your project.
         */

        $client = new \Google_Client();
        $client->setDeveloperKey(config('services.google.key'));

        // Define an object that will be used to make all API requests.
        $youtube = new \Google_Service_YouTube($client);

        try {
            // Call the search.list method to retrieve results matching the specified
            // query term.
            $searchResponse = $youtube->search->listSearch('id,snippet', array(
                'q' => $request->q,
                'maxResults' => 20,
                'pageToken' => $pageToken,
            ));


//            $videos = '';
//            $channels = '';
//            $playlists = '';

            $arr = [];
            // Add each result to the appropriate list, and then display the lists of
            // matching videos, channels, and playlists.
            $des = [];

            $vi = true; $vid = '';
            foreach ($searchResponse['items'] as $searchResult) {
                switch ($searchResult['id']['kind']) {
                    case 'youtube#video':

                        $snippet = [
                            "id"            => $searchResult['id']['videoId'],
                            "title"         => $searchResult['snippet']['title'],
                            "channelTitle"  => $searchResult['snippet']['channelTitle'],
                            "description"   => $searchResult['snippet']['description'],
                            "publishedAt"   => $this->timeAgo($searchResult['snippet']['publishedAt']),
                        ];
                        array_push($des,$snippet);

                        $vid .= $vi ? $searchResult['id']['videoId'] : ', '.$searchResult['id']['videoId'];
                        $vi = false;
                        break;
                    case 'youtube#channel':

                        break;
                    case 'youtube#playlist':

                        break;
                }
            }
            
            $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails, statistics', array(
                'id' => $vid,
            ));



            foreach ($videosResponse['items'] as $videoResult) {



                foreach ($des as $de) {

                    if($de['id'] == $videoResult['id']){

                        //$rate = $this->rateVideo($videoResult['statistics']['likeCount'],$videoResult['statistics']['dislikeCount'],5,1);
                        $snippet = [
                            "id"            => $de['id'],
                            "title"         => $de['title'],
                            "channelTitle"  => $de['channelTitle'],
                            "description"   => $de['description'],
                            "publishedAt"   => $de['publishedAt'],
                            "viewCount"     => number_format($videoResult['statistics']['viewCount']),
                        ];
                        array_push($arr,$snippet);
                    }

                }

            }

            $snippet = [
                "nextPageToken" => $searchResponse['nextPageToken'],
                "item"          => $arr
            ];

            $arr = [];
            array_push($arr,$snippet);

        } catch (Google_Service_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        } catch (Google_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        }


        // all good so return the token
//        return response()->json(['page' => $searchResponse->toSimpleObject()], 200);
        return response()->json(['data' => $arr], 200);
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
     * @param $videoResult
     * @return mixed
     */
    public function keywords($videoResult)
    {
        return implode(', ', $videoResult);
    }


}
