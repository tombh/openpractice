<?php
error_reporting(E_ERROR | E_PARSE);

include 'tweetFactory/tweetFactory.class.php';

if(sizeOf($argv) > 0){
  //Called from the command line - probably via cron
  $filter = $argv[1];
  $from = $argv[2];
  $to = $argv[3];
}else{
  //Called from the web - proabbly via AJAX
  $filter = $_GET['filter'];
  $from = $_GET['from'];
  $to = $_GET['to'];
}

if( empty($filter) || $filter == 'false') $filter = FALSE;

$tF = new tweetFactory();
$tF->return_tweets($filter, $from, $to);

