<?php

namespace Config;

class YouTubeAPI
{
    //https://www.googleapis.com/youtube/v3/playlistItems?key=Md6s4HsfI.AIzaSyB8EQYx0ggiQfezhx3sHyxQ4x2s508j9oE.DsJ9U0gl&maxResults=50&pageToken=[nextPageToken,prevPageToken]&playlistId=PLu0W_9lII9ahIappRPN0MCAgtOu3lQjQi&part=id,snippet&fields=(prevPageToken,items(id,snippet(title,playlistId,position,publishedAt,description,resourceId(videoId))),pageInfo)
    public $url = 'https://www.googleapis.com/youtube/v3/playlistItems';
    
    public $api_key = 'Md6s4HsfI.AIzaSyB8EQYx0ggiQfezhx3sHyxQ4x2s508j9oE.DsJ9U0gl';

    public $playlistIds = [
        'basic_excel'=>'playlistId=PLCQSNNMKX3moUW9Ja6ZdFoiIH5oTzwzxV',
    ];

    public $string = 'maxResults=50&part=id,snippet&fields=items(id,snippet(title,playlistId,position,publishedAt,description,resourceId(videoId)))';
}