<?php
  $handle = substr($_SERVER['REQUEST_URI'], 1);  
?>

<html>
<head>

  <title>Open Practice</title>

  <link rel="stylesheet" href="styles.css" type="text/css" media="screen" />

  <link rel="icon" href="/images/favicon.png" type="image/png" />

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
      <a href="/">
        <h1>#openpractice</h1>
      </a>
    </div>

    <div id="info">
      
      <?php if(!empty($handle)) : ?>
        <center>
          <h2>Just <a href="http://twitter.com/<?php echo $handle ?>" target="_blank">@<?php echo $handle ?></a>'s #openpractice tweets</h2>
          <br />
          <strong><a href="/">Back to everyone &raquo;</a></strong>
        </center>
     <?php else : ?>

     <?php endif ?>
      
    </div>
    
    <div id="tweets">
      &nbsp;
      <ul>
        <li class="template" style="display:none">
          <a class="avatar_link" href=""><img class="profile_pic" src="" width="52" height="52" /></a>
          <div class="tweet_body">
          </div>
          <div class="meta">
            By <strong><a href="" class="handle">@</a></strong> <abbr class="timeago" title=""></span>
          </div>
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
          <p>
          You are encouraged to express yourself in as matter-a-fact way as is possible. The felt truth of
          your experience being more interesting than how you interpret it.
          </p>

          <small>
          <ul>
            <li>Avatars link to user's Twitter accounts.</li>
            <li>@{handles} link to user's #openpractice archive.</li>
          </ul>
          </small>
        <?php endif; ?>
        
      </div>
      </small>
    </div>

  </div>
</body>

</html>
