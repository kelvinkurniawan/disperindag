<?php

function generateImageUrl($url)
{
    $result = explode("id=", $url);
    $drive_url = "https://lh3.googleusercontent.com/d/";
    return $drive_url . $result[1];
}

function excerpt($str)
{
    $words = explode(' ', $str);
    if (count($words) > 100) {
        return implode(' ', array_slice($words, 0, 50));
    } else {
        return $str;
    }
}

function generateYoutubeId($url)
{
    $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id;
}

function contactIcon($param)
{
    if ($param == 'phone') {
        return '<i class="uil uil-phone"></i>';
    }

    if ($param == 'email') {
        return '<i class="uil uil-envelope"></i>';
    }

    if ($param == 'maps') {
        return '<i class="uil uil-map-marker"></i>';
    }

}

function socialIcon($param)
{
    if ($param == 'facebook') {
        return '<i class="uil uil-facebook text-primary"></i>';
    }

    if ($param == 'instagram') {
        return '<i class="uil uil-instagram text-danger"></i>';
    }

    if ($param == 'twitter') {
        return '<i class="uil uil-twitter"></i>';
    }

    if ($param == 'youtube') {
        return '<i class="uil uil-youtube text-danger"></i>';
    }

}

function storeIcon($param)
{
    $assets = base_url('assets/');
    if ($param == 'shopee') {
        return "<img src='$assets/images/shopee.png' class='custom-icon'/>";
    }

    if ($param == 'tokopedia') {
        return "<img src='$assets/images/tokopedia.png' class='custom-icon'/>";
    }

}