<?php
error_reporting(E_ERROR | E_PARSE);

include 'tweetFactory/tweetFactory.class.php';

$tF = new tweetFactory();
$tF->store_tweets(array('#openpractice'));
