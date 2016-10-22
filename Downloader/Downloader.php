<?php

abstract class Downloader {
     
    /*
     * Video Id for the given url
     */
    protected $video_id;
     
    /*
     * Video title for the given video
     */
     
    protected $video_title;
     
    /*
     * Full URL of the video
     */
     
    protected $video_url;
     
    public function __construct() {
      
    }
      
    /*
     * Set the url
     * @param string
     */
    public function setUrl($url)
    {
        $this->video_url = $url;
    }
     
    /*
     * Get the downloadlink for video
     * return array
     */
     
    public abstract function getVideoDownloadLink();
}
