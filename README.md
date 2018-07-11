# NaverBlogVisitorCntCrawler
네이버 블로그 일 평균 방문자 수 측정기

Simple Usage

```php
<?php
require_once 'NaverBlogVisitorCntCrawler';
use NaverBlogVisitorCntCrawler;

$blogId = "Your naver blog ID";
$naverBlogVisitorCounter = new NaverBlogVisitorCntCrawler($blogId);
echo $naverBlogCrawler->getAverageVisitorCnt();
?>
```
