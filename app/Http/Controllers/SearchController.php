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
                'pageToken' => 'sdf'
            ],
//            'multipart' => [
//                [
//                    'q' => $q,
//                    'pageToken' => 'dsdasd'
//                ]
//            ]
        ]);
        $res->getStatusCode();
        $res->getHeader('content-type');
        $resp = $res->getBody();

        return view('search', ['user' => $resp]);
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
//        $pageToken = "CAEQAA";
        $pageToken = "CAEQAA";
        if ($request->has('pageToken')) {
            $pageToken =  "CAEQAB";
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
        $htmlBody = "";


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
                            $searchResult['snippet']['title'], $searchResult['id']['videoId']);
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

            $htmlBody .= <<<END
    <h3>Videos</h3>
    <ul>$videos</ul>
    <h3>Channels</h3>
    <ul>$channels</ul>
    <h3>Playlists</h3>
    <ul>$playlists</ul>
END;
        } catch (Google_Service_Exception $e) {
            $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
                htmlspecialchars($e->getMessage()));
        } catch (Google_Exception $e) {
            $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
                htmlspecialchars($e->getMessage()));
        }



        // all good so return the token
        return response()->json(['page' => $pageToken], 200);
    }

}
