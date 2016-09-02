<?php
/**
 * Created by PhpStorm.
 * User: Plai
 * Date: 9/2/2016
 * Time: 10:01 PM
 */

namespace App\Http\Composers;

use App\UserView;
use App\VideoFeature;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BaseComposer
{
    public function compose(View $view){

        Log::info('a');
        $rank = "Login";
        if(!Auth::guest()){
            $user = Auth::user();
            $rank = $this->ranks(UserView::where('user', $user->id)->count());
        }
        $view->with(['rank' => $rank]);
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