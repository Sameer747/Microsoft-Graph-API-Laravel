<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class CalendarController extends Controller
{

    //create event
    public function createEvent(Request $request)
{
    //get user session token.
    $getSession = $request->session()->get('microsoftUser')['token'];    
    // Log::info('local:',[]$getSession);
    dd($response);exit;
    // // Obtain the user's access token
    // $accessToken = $user->token; // Replace with your access token retrieval code

    // // Create a new Graph client
    // $graph = new Graph();
    // $graph->setAccessToken($accessToken);

    // // Define the event details
    // $event = new Model\Event();
    // $event->setSubject('Meeting with Sameer');
    // $event->setStart(new Model\DateTimeTimeZone(['dateTime' => '2023-09-10T10:00:00', 'timeZone' => 'UTC']));
    // $event->setEnd(new Model\DateTimeTimeZone(['dateTime' => '2023-09-10T11:00:00', 'timeZone' => 'UTC']));

    // // Create the event in the user's calendar
    // $response = $graph->createRequest('POST', '/me/events')
    //     ->attachBody($event)
    //     ->setReturnType(Model\Event::class)
    //     ->execute();
    
    // // Check if the event was created successfully
    // if ($response) {
    //     return view('Event created successfully');
    // } else {
    //     return 'Event creation failed';
    // }
}

}
