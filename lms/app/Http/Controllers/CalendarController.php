<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;


class CalendarController extends Controller
{

    //create event
    public function createEvent(Request $request)
{
    //get user session token.
    $getSession = $request->session()->get('microsoftUser');    
    
    //log
    // \Log::info('local: ',print_r($getSession , true));exit;
    // dd($getSession);exit;
    
    // Obtain the user's access token
    $accessToken = $getSession->token;

    // Create a new Graph client
    $graph = new Graph();
    $graph->setAccessToken($accessToken);

    // Define the event details
    $event = new Model\Event();
    $event->setSubject('Meeting with HOD');
    $event->setStart(new Model\DateTimeTimeZone(['dateTime' => '2023-09-12T10:00:00', 'timeZone' => 'Pakistan Standard Time']));
    $event->setEnd(new Model\DateTimeTimeZone(['dateTime' => '2023-09-14T11:00:00', 'timeZone' => 'Pakistan Standard Time']));

    // Create the event in the user's calendar
    $response = $graph->createRequest('POST', '/me/events')
        ->attachBody($event)
        ->setReturnType(Model\Event::class)
        ->execute();
    
    // Check if the event was created successfully
    if ($response) {
        return 'Event created successfully';
    } else {
        return 'Event creation failed';
    }
}

    //list of events
    public function listEvent(Request $request)
{
    //get user session token.
    $getSession = $request->session()->get('microsoftUser');    
    
    //log
    // \Log::info('local: ',print_r($getSession , true));exit;
    // dd($getSession);exit;
    
    // Obtain the user's access token
    $accessToken = $getSession->token;

    // Create a new Graph client
    $graph = new Graph();
    $graph->setAccessToken($accessToken);

    // // Define the event details
    // $event = new Model\Event();
    // $event->setSubject('Meeting with Sameer');
    // $event->setStart(new Model\DateTimeTimeZone(['dateTime' => '2023-09-12T10:00:00', 'timeZone' => 'Pakistan Standard Time']));
    // $event->setEnd(new Model\DateTimeTimeZone(['dateTime' => '2023-09-14T11:00:00', 'timeZone' => 'Pakistan Standard Time']));

    // Create the event in the user's calendar
    $response = $graph->createRequest('GET', '/me/events')
        // ->attachBody($event)
        ->setReturnType(Model\Event::class)
        ->execute();
    dd($response);exit;
    // Check if the event was created successfully
    if ($response) {
        return 'Event list successfully';
    } else {
        return 'Event list failed';
    }
}

}
