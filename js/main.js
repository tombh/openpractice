if(handle.length > 0){
  var url = '/JSON_tweets.php?filter=' + handle;  
}else{
  var url ='/tweets.json';
}

$(document).ready( function(){ 
  getTweets();
});

function getTweets(){
  $.ajax({
    type      : 'GET',
    dataType  : 'json',
    url       : url,
    error     : function (xhr, ajaxOptions, thrownError){
    alert(xhr.responseText);
      //alert(thrownError);
      alert("There was an error retrieving the tweets :(");
    },
    success   : function(json){
      tweets = eval(json);
      render_tweets(tweets);
      setTimeout(getTweets, 60000);
    }    
  });
}

function render_tweets(tweets){
  
  $('#tweets ul li:not(.template)').fadeOut();
  
  for(var i = 0; i < tweets.length; i++){

    var content = stripslashes(tweets[i].content);

    $('#tweets ul li.template').clone().appendTo($('#tweets ul'));

    $('#tweets ul li:last').attr('class', '');

    $('#tweets ul li:last .avatar_link').attr('href', '/' + tweets[i].handle);
    $('#tweets ul li:last .profile_pic').attr('src', tweets[i].avatar);
    
    $('#tweets ul li:last .tweet_body').append(content);
    $('#tweets ul li:last .handle').append(tweets[i].handle);
    $('#tweets ul li:last .handle').attr('href', '/' + tweets[i].handle);
    $('#tweets ul li:last .timeago').attr('title', tweets[i].published);
    $('#tweets ul li:last .timeago').html(tweets[i].published);
    
    $('#tweets ul li:last').fadeIn();
    
    if(i == 100) break;
  }
  $('abbr.timeago').timeago();
}


function stripslashes(str) {
  if(str==null) return;
  str=str.replace(/\\'/g,'\'');
  str=str.replace(/\\"/g,'"');
  str=str.replace(/\\0/g,'\0');
  str=str.replace(/\\\\/g,'\\');
  return str;
}