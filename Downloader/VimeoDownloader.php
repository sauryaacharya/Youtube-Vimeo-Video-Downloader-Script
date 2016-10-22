<?php

include_once 'Downloader.php';
class VimeoDownloader extends Downloader {
     
    public function __construct() {
        parent::__construct();
 
    }
     
    /*
     * Get the video information
     * return string
     */
     
    private function getVideoInfo() {
        return file_get_contents($this->getRequestedUrl());
    }
     
    /*
     * Get video Id
     * @param string
     * return string
     */
     
    private function extractVideoId($video_url)
    {
        $start_position = stripos($video_url, ".com/");
        return ltrim(substr($video_url, $start_position), ".com/");
    }
     
    /*
     * Scrap the url from the page
     * return string
     */
    private function getRequestedUrl()
    {
        $data = file_get_contents("https://www.vimeo.com/".$this->extractVideoId($this->video_url));
        $data = stristr($data, 'config_url":"');
        $start = substr($data, strlen('config_url":"'));
        $stop = stripos($start, ',');
        $str = substr($start, 0, $stop);
        return rtrim(str_replace("\\", "", $str), '"');
    }
     
    /*
     * Get the video download link
     * return array
     */
     
    public function getVideoDownloadLink() {
         
        $decode_to_arr = json_decode($this->getVideoInfo(), true);
        $this->video_title = $decode_to_arr["video"]["title"];
        $link_array = $decode_to_arr["request"]["files"]["progressive"];
        $final_link_arr = array();
         
        //Create array containing the detail of video 
        for($i = 0; $i < count($link_array); $i++) { $link_array[$i]["title"] = $this->video_title;
            $mime = explode("/", $link_array[$i]["mime"]);
            $link_array[$i]["format"] = $mime[1];
        }
        return $link_array;
    }
     
    /*
     * Validate the given video url
     * return bool
     */
    public function hasVideo()
    {
        $valid = true;
        $data = @file_get_contents($this->video_url);
        if($data === false)
        {
            $valid = false;
        }
        return $valid;
    }
}
