<?php

namespace App\Helper;

use Illuminate\Support\Carbon;

class FuncLib
{

    public static function data_tree(array $data, $parent_id = 0, $level = 0)
    {
        $result = [];
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                $child = FuncLib::data_tree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
                unset($data[$item['id']]);
            }
        }
        return $result;
    }

    public static function fomatTime($timeString)
    {
        // $timeString = "2023-09-28 01:28:23";
        $carbonTime = Carbon::parse($timeString);
        $formattedTime = $carbonTime->format('H [giờ] i [phút] \n\g\à\y j [ngày] n [tháng] Y [năm]');
        return $formattedTime;
    }

    public static function convertYoutube($url) {
        $video_id = explode("?v=", $url); 
        if (empty($video_id[1]))
            $video_id = explode("/v/", $url); 
        $video_id = explode("&", $video_id[1]); 
        $video_id = $video_id[0];
        return "https://www.youtube.com/embed/".$video_id;
    }
}
