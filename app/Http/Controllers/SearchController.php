<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


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
     * @param  string  $q
     * @return \Illuminate\Http\Response
     */
    public function show($q)
    {
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

        $res = $client->request('GET', config('services.domain.default').'/service/youtube/search', [
//            'json' => [
//                'q' => $q,
//                'pageToken' => ''
//            ],
            'query' => [
                'q' => $q,
                'pageToken' => ''
            ],
//            'multipart' => [
//                [
//                    'q' => $q,
//                    'pageToken' => 'dsdasd'
//                ]
//            ]
        ]);
        $res->getStatusCode();
        //$res->getHeader('content-type');


        return view('search', ['results' => json_decode($res->getBody(), true)]);
//        return view('search', ['results' => [
//            'q' => $q,
//            'pageToken' => $res->getBody()
//        ]]);
        //return view('layouts.main', ['user' => $id]);
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
     * Youtube search api
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
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
        $DEVELOPER_KEY = 'AIzaSyDGFbK0CvMXKVzCJA_2Fj5B7pItfK0a1QA';

        $client = new \Google_Client();
        $client->setDeveloperKey($DEVELOPER_KEY);

        // Define an object that will be used to make all API requests.
        $youtube = new \Google_Service_YouTube($client);

        try {
            // Call the search.list method to retrieve results matching the specified
            // query term.
            $searchResponse = $youtube->search->listSearch('id,snippet', array(
                'q' => $request->q,
                'maxResults' => 2,
                'pageToken' => $pageToken,
            ));

            $videos = '';
            $channels = '';
            $playlists = '';

            // Add each result to the appropriate list, and then display the lists of
            // matching videos, channels, and playlists.
            foreach ($searchResponse['items'] as $searchResult) {
                switch ($searchResult['id']['kind']) {
                    case 'youtube#video':
                        $videos .= sprintf('<li>%s (%s)</li>',
                            $searchResult['snippet']['title'], $this->timeAgo($searchResult['snippet']['publishedAt']));
//                            $searchResult['snippet']['title'], $searchResult['id']['videoId']);
                        break;
                    case 'youtube#channel':
                        $channels .= sprintf('<li>%s (%s)</li>',
                            $searchResult['snippet']['title'], $searchResult['id']['channelId']);
                        break;
                    case 'youtube#playlist':
                        $playlists .= sprintf('<li>%s (%s)</li>',
                            $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
                        break;
                }
            }

        } catch (Google_Service_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        } catch (Google_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        }

        $arr = [$searchResponse];

        // all good so return the token
//        return response()->json(['page' => $searchResponse->toSimpleObject()], 200);
        return response()->json($videos, 200);
    }










    /**
     * Display time date ago
     *
     * @param  string  $time_ago
     * @return \Illuminate\Http\Response
     */
    function timeAgo($time_ago)
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

}
