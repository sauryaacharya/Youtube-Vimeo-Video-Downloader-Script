# Youtube-Vimeo-Video-Downloader-Script

This is a script for Youtube and Vimeo video downloader.

Below is the given example to extract the download link of Youtube and Vimeo. After you got the downlad link you can create your own downloader.

```php
include_once 'YouTubeDownloader.php';
include_once 'VimeoDownloader.php';
include_once 'LinkHandler.php';
 
$url = "https://www.youtube.com/watch?v=oeCihv9A3ac";
$handler = new LinkHandler();
$downloader = $handler->getDownloader($url);
$downloader->setUrl($url);
if($downloader->hasVideo())
{
    print_r($downloader->getVideoDownloadLink());
}
```
