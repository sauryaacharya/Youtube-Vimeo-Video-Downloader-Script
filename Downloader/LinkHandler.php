<?php

class LinkHandler {
     
    /*
     * store the url pattern and corresponding downloader object
     * @var array
     */
     
    private $link_array = array();
     
    public function __construct() {
        $this->link_array = array("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed)\/))([^\?&\"'>]+)/" => new YouTubeDownloader(),
                                  "/^(?:http(?:s)?:\/\/)?(?:www\.)?vimeo\.com\/\d{8}/"=>new VimeoDownloader()
                                 );
    }
     
    /*
     * Get the url pattern
     * return array
     */
    private function getPattern()
    {
        return array_keys($this->link_array);
    }
     
    /*
     * Get the downloader object if pattern matches else return false
     * @param string
     * return object or bool
     * 
     */
    public function getDownloader($url)
    {
        for($i = 0; $i < count($this->getPattern()); $i++)
        {
            $pattern_st = $this->getPattern()[$i];
            /*
             * check the pattern match with the given video url
             */
            if(preg_match($pattern_st, $url))
            {
                return $this->link_array[$pattern_st];
            }
        }
        return false;
    }
}
