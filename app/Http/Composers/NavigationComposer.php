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

        //!* video list
        $vid = $this->distinctVideo($videos);

        try {

            $videosResponse = $youtube->videos->listVideos('snippet', array(
                'id' => $vid,
            ));

            foreach ($videosResponse['items'] as $videoResult) {

                //if video lost from youtube
                if(isset($videoResult['id'])) {

                    $snippet = [
                        "id"            => $videoResult['id'],
                        "title"         => $videoResult['snippet']['title']
                    ];

                    foreach ($videos as $video) {
                        if($video->video == $videoResult['id']){
                            if($video->feature == 1){
                                array_push($recommend,$snippet);
                            }elseif ($video->feature == 2){
                                array_push($hit,$snippet);
                            }elseif ($video->feature == 4){
                                array_push($movie,$snippet);
                            }elseif ($video->feature == 7){
                                array_push($food,$snippet);
                            }
                        }
                    }

                }
            }


            $result = [
                "recommend"    => $recommend,
                "hit"          => $hit,
                "movie"        => $movie,
                "food"         => $food
            ];




        } catch (Google_Service_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        } catch (Google_Exception $e) {
            return response()->json(['page' => $e], 200);
            //$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage()));
        }



        $view->with('menu', $result);
    }



    /**
     * @param $videos
     * @return string
     */
    public function distinctVideo($videos)
    {
        $vi = true;
        $vid = '';
        $vr = [];
        foreach ($videos as $video) {

            $c = true;
            foreach ($vr as $vri) {
                $vri['id'] == $video->video ? $c = false : null;
            }

            if ($c) {
                $vid .= $vi ? $video->video : ', ' . $video->video;
                array_push($vr, ["id" => $video->video]);
                $vi = false;
            }
        }
        return $vid;
    }



}