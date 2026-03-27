<?php

// little dashboard helper for displaying some useful data
// version 1.0
//array_key exists recursive
function array_key_exists_r($needle, $haystack)
{
    $result = array_key_exists($needle, $haystack);
    if ($result) {
        return $result;
    }
    foreach ($haystack as $v) {
        if (is_array($v)) {
            $result = array_key_exists_r($needle, $v);
        }
        if ($result) {
            return $result;
        }
    }

    return $result;
}

// get recursive directory size
function recursive_directory_size($directory, $format = false)
{
    $size = 0;
    if (substr($directory, -1) == '/') {
        $directory = substr($directory, 0, -1);
    }
    if (!file_exists($directory) || !is_dir($directory) || !is_readable($directory)) {
        return -1;
    }
    if ($handle = opendir($directory)) {
        while (($file = readdir($handle)) !== false) {
            $path = $directory . '/' . $file;
            if ($file != '.' && $file != '..') {
                if (is_file($path)) {
                    $size += filesize($path);
                } elseif (is_dir($path)) {
                    $handlesize = recursive_directory_size($path);
                    if ($handlesize >= 0) {
                        $size += $handlesize;
                    } else {
                        return -1;
                    }
                }
            }
        }
        closedir($handle);
    }
    if ($format == true) {
        return formatfilesize($size);
    } else {
        return $size;
    }
}

// format size for humans ;)
function format_file_size($size)
{
    // bytes
    if ($size < 1024) {
        return $size . " bytes";
    } // kilobytes
    elseif ($size < (1024 * 1024)) {
        return round(($size / 1024), 1) . " KB";
    } // megabytes
    elseif ($size < (1024 * 1024 * 1024)) {
        return round(($size / (1024 * 1024)), 1) . " MB";
    } // gigabytes
    else {
        return round(($size / (1024 * 1024 * 1024)), 1) . " GB";
    }
}

/**
 *  check if file exit
 * if not so return the no image path
 * @param string $file_path
 */
function display_image_path($file_path = '')
{
    if ($file_path == '') {
        $file_path = config_item('no_image_thumb');
    }

    return $file_path;
}

function base64url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data)
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), 4 - ((strlen($data) % 4) ?: 4), '=', STR_PAD_RIGHT));
}


/**
 *
 * @param string $param1
 * @param string $param2
 * @param string $result1
 * @param string $result2
 */
function short_if($param1 = '', $param2 = '', $result1 = '', $result2 = '')
{
    return ($param1 == $param2) ? $result1 : $result2;
}

/**
 * @param $ptime time stamp format
 * @return string THE ELAPSED TIME STRING
 */
function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1) {
        return '0 seconds';
    }

    $a = array(
        365 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    $a_plural = array(
        'year' => 'years',
        'month' => 'months',
        'day' => 'days',
        'hour' => 'hours',
        'minute' => 'minutes',
        'second' => 'seconds'
    );

    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);

            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}

function alert()
{
?>
    <script type="text/javascript">
        UIkit.modal.alert("<i class='uk-icon-check uk-text-success uk-icon-medium'></i> <b>!Congratulations</b> :) Your video now selected as first one");
    </script>
<?php
}

function flash_data_success($msg = '')
{
    $CI = &get_instance();
    $CI->session->set_flashdata('success_msg', '<i class="uk-icon-check"></i> ' . $msg);
}

function flash_data_warning($msg = '')
{
    $CI = &get_instance();
    $CI->session->set_flashdata('warning_msg', $msg);
}

function flash_data_error($msg = '')
{
    $CI = &get_instance();
    $CI->session->set_flashdata('error_msg', $msg);
}

function flash_data_info($msg = '')
{
    $CI = &get_instance();
    $CI->session->set_flashdata('info_msg', $msg);
}

function user_id()
{
    $CI = &get_instance();
    if (@$CI->authority->user->user_id) {
        return @$CI->authority->user->user_id;
    } else {
        return 0;
    }
}

/**
 * @throws current day in this format (0000-00-00)
 * @return bool|string
 */
function current_date()
{
    return date("Y-m-d", time());
}

function is_logged()
{
    $CI = &get_instance();
    if ($CI->authority->is_logged()) {
        return true;
    } else {
        return false;
    }
}

function uri_segment($number = 0)
{
    $CI = &get_instance();
    return $CI->uri->segment($number);
}

function option_get($field = '')
{
    $CI = &get_instance();
    return $CI->option->get($field);
}

function option_update($field = '', $post = '')
{
    $CI = &get_instance();
    $CI->option->update($field, $post);
}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        } else {
            return $output;
        }
    }
}
if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE)
    {
        dump($var, $label, $echo);
        exit;
    }
}

if (!function_exists('fileExists')) {
    function fileExists($path)
    {
        return (@fopen($path, "r") == true);
    }
}
