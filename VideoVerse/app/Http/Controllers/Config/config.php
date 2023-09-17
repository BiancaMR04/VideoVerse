<?php

function baseUri($method = ''){
    return 'https://hlqycjtucbyqizmxjbsq.supabase.co/auth/v1/' . $method;
}

function getHeader(){
    $header = [
        'Content-Type' => 'application/json',
        'apiKey'     => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhscXljanR1Y2J5cWl6bXhqYnNxIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTI4MDgxNTgsImV4cCI6MjAwODM4NDE1OH0.UW9MM9xZHliJnqQkxdO8bZ3Z8tMvpOGiPf50GW-JR2k',
    ];
    return $header;
}