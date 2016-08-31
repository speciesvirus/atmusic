<?php namespace App\Http\Composers;

use App\VideoFeature;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class NavigationComposer
{

    public function compose(View $view){


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
        $food = [];
//        $videos = DB::table('features')->join('videos', 'videos.id', '=', 'features.video')
//            ->where('recommend', 1)->orWhere('hit', 1)->select('video','recommend','hit')->get();

        $videos = VideoFeature::select('video','feature')->where('status', 1)->orderBy('created_at', 'desc')->get();

        foreach ($videos as $video) {
            //echo $title;

            if($video->feature == 1){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet', array(
                        'id' => $video->video,
                    ));

                    if(isset($videosResponse['items'][0]['id'])){
                        $snippet = [
                            "id"            => $videosResponse['items'][0]['id'],
                            "title"         => $videosResponse['items'][0]['snippet']['title']
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

                    $videosResponse = $youtube->videos->listVideos('snippet', array(
                        'id' => $video->video,
                    ));

                    if(isset($videosResponse['items'][0]['id'])){
                        $snippet = [
                            "id"            => $videosResponse['items'][0]['id'],
                            "title"         => $videosResponse['items'][0]['snippet']['title']
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

                    $videosResponse = $youtube->videos->listVideos('snippet', array(
                        'id' => $video->video,
                    ));

                    if(isset($videosResponse['items'][0]['id'])){
                        $snippet = [
                            "id"            => $videosResponse['items'][0]['id'],
                            "title"         => $videosResponse['items'][0]['snippet']['title']
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


            if($video->feature == 7){

                try {

                    $videosResponse = $youtube->videos->listVideos('snippet', array(
                        'id' => $video->video,
                    ));

                    if(isset($videosResponse['items'][0]['id'])){
                        $snippet = [
                            "id"            => $videosResponse['items'][0]['id'],
                            "title"         => $videosResponse['items'][0]['snippet']['title']
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

        }

        $result = [
            "recommend"    => $recommend,
            "hit"          => $hit,
            "movie"        => $movie,
            "food"         => $food
        ];



        $view->with('menu', $result);
    }

}