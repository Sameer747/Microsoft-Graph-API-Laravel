<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // loadviewData shows the page content if it contains error etc.
    // public function loadViewData()
    // {
    //     // array to add the state of the pages.
    //     $viewData = [];

    //     // Check for errors
    //     if (session('error')) {
    //         $viewData['error'] = session('error');
    //         $viewData['errorDetail'] = session('errorDetail');
    //     }

    //     // Check for logged in user
    //     if (session('userName'))
    //     {
    //         $viewData['userName'] = session('userName');
    //         $viewData['userEmail'] = session('userEmail');
    //         $viewData['userTimeZone'] = session('userTimeZone');
    //     }

    //     return $viewData;
    // }
}
