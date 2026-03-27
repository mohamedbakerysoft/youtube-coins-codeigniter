<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 5/26/2015
 * Time: 4:06 PM
 */

/**
 * Gets a vimeo thumbnail url
 * @param mixed $id A vimeo id (ie. 1185346)
 * @return thumbnail's url
 */
function get_vimeo_data($id)
{
    $data = file_get_contents("http://vimeo.com/api/v2/video/$id.json");
    $data = json_decode($data);
    //dump_exit($data);
    return $data[0];
}

function get_dailymotion($url = 0)
{
    //http://www.dailymotion.com/services/oembed?url=<VIDEO_URL>
    $data = file_get_contents("http://www.dailymotion.com/services/oembed?url=" . $url);
    $data = json_decode($data);
    //dump_exit($data);
    return $data;
}

function get_dailymotion_iframe($url = '')
{
    $id = strtok(basename($url), '_');
    return '<iframe src="http://www.dailymotion.com/embed/video/' . $id . '?autoplay=true" width="480" height="269" frameborder="0" allowfullscreen></iframe>';
}

function get_vimeo_iframe($url = '')
{
    $iframe = "<iframe src='https://player.vimeo.com/video/" . $url . "?autoplay=1' width='500' height='281'
                    frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
    return $iframe;
}

/**
 * RETURN THE TYPE OF THE URL (YOUTUBE - DAILYMOTION-VIMEO - IMAGE)
 * @param string $url
 * @return bool|string
 */
function get_the_url_type($url = '')
{
    $type = '';
    if (strpos($url, 'youtube') || strpos($url, 'youtu.be')) {
        $type = 'youtube';
    } elseif (strpos($url, 'dailymotion') OR strpos($url, 'dai.ly')) {
        $type = 'dailymotion';
    } elseif (strpos($url, 'vimeo')) {
        $type = 'vimeo';
    } else {
        $type = 'image';
    }

    return $type;
}

function get_youtube_info($url = '')
{
    $url = "https://www.youtube.com/oembed?url=" . $url . "&format=json";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $return = curl_exec($curl);
    curl_close($curl);
    return json_decode($return, true);
}