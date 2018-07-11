<?php

class NaverBlogVisitorCntCrawler {
    private $blogId;
    
    function __construct($blogId = null) {
        $this->blogId = $blogId;
    }
    
    function setBlogId($blogId) {
        $this->blogId = $blogId;
    }
    
    function getBlogId() {
        return $this->blogId;
    }
    
    function getAverageVisitorCnt() {
        if ($this->blogId == null) {
            return false;
        }
        
        $xmlGetterURL = curl_init("http://blog.naver.com/NVisitorgp4Ajax.nhn?blogId=".$this->blogId);
        curl_setopt($xmlGetterURL, CURLOPT_RETURNTRANSFER, true);
        $naverBlogVisitorCntXml = curl_exec($xmlGetterURL);
        $resultXml = simplexml_load_string($naverBlogVisitorCntXml);
        
        // exclude today's visitor count
        $averagePeriod = 4;
        $totalVisitorCnt = 0;
        for ($i = 0; $i < $averagePeriod; $i++) {
            $totalVisitorCnt += $resultXml->visitorcnt[$i]['cnt'];
        }        
        $averageVisitorCnt = $totalVisitorCnt / $averagePeriod;
        
        return $averageVisitorCnt;
    }
}