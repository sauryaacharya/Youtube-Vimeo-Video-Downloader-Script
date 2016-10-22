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
