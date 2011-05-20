<?php
error_reporting(E_ERROR | E_PARSE);

include 'tweetFactory.class.php';

$tF = new tweetFactory();
$tF->store_tweets(array('#openpractice'));
