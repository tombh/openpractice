<?php
  $handle = substr($_SERVER['REQUEST_URI'], 1);  
?>

<html>
<head>

  <title>Open Practice</title>

  <link rel="stylesheet" href="styles.css" type="text/css" media="screen" />

  <link rel="icon" href="/images/favicon.png" type="image/png" />

  <script src="http://platform.twitter.com/anywhere.js?id=z49BVG9I8tfDr1IQNL9aaQ&amp;v=1"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>

  <script type="text/javascript" src="http://use.typekit.com/yri8oua.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>  

  <script type="text/javascript">
    var handle = '<?php echo $handle ?>';
  </script>

  <script src="/js/main.js" type="text/javascript"></script>
  <script src="/js/jquery.timeago.js" type="text/javascript"></script>  

</head>

<body>
  <div id="container">
    <div id="logo">
      <h1>
        <a href="/">
          #openpractice
        </a>
      </h1>
    </div>

    <div id="info">

      <center><em><small>The paint is wet here, <a href="http://search.twitter.com/search?q=%23opsite">#opsite</a> wants to know what you think before it dries.</small></em></center>

      
      
      <?php if(!empty($handle)) : ?>
        <center>
          <h2>Just <a href="http://twitter.com/<?php echo $handle ?>" target="_blank" class="tweep">@<?php echo $handle ?></a>'s #openpractice tweets</h2>
          <br />
          <strong><a href="/">Back to everyone &raquo;</a></strong>
        </center>
     <?php else : ?>
        <div id="tweetbox"></div>
     <?php endif ?>
      
    </div>
    
    <div id="tweets">
      &nbsp;
      <ul>
        <li class="template" style="display:none">
          <a class="avatar_link tweep" href="" target="_blank"><img class="profile_pic" src="" width="52" height="52" title=""/></a>
          <div class="tweet_body">
          </div>
          <div class="meta">
            By <strong><a href="" class="handle op_archive" title="">@</a></strong> <abbr class="timeago" title=""></abbr> |
            <a href="#" class="retweet">ReTweet</a> |
            <a href="#" class="reply">Reply</a>
          </div>
          <div class="tweet" style="display: none"></div>
        </li>
      </ul>
    </div>

    <div id="right">
      <strong>#openpractice is a twitter hashtag.</strong>
      <div id="description">

        <p>
        Through it you are invited to share your spiritual practice, whatever it may be.
        </p>

        <br /><br />

        <?php if(empty($handle)) : ?>
          <small>
          <ul>
            <li>Avatars link to user's Twitter accounts.</li>
            <li><span class="op_archive">@{handles}</span> link to user's #openpractice archive.</li>
          </ul>
          </small>
        <?php endif; ?>
        
      </div>

      <p>
        <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2Fopenpractice%2F200626913315542&amp;width=165&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=262" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:165px; height:262px;" allowTransparency="true"></iframe>
      </p>
      </small>
    </div>

  </div>
</body>

</html>
