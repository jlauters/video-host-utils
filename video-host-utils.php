<?php

/* Utilities for various video host sites
 * .. for now just Vimeo and Youtube
 */

function getVideoThumb($url) {

    $video_url = parse_url($url);

    if(preg_match('/youtube/', $video_url['host'])) {
        $path = explode('/', $video_url['path']);
        return 'http://img.youtube.com/vi/'.$path[2]."/0.jpg";
    } else if(preg_match('/vimeo/', $video_url['host'])) {
        $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/".substr($video_url['path'], 1).".php"));
        return $hash[0]['thumbnail_medium'];
    }
}
