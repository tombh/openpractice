var refresh = true;

if(handle.length > 0){
  var url = '/JSON_tweets.php?filter=' + handle;  
}else{
  var url ='/tweets.json';
}

twttr.anywhere(function (T) {

  T("#tweetbox").tweetBox({
    height: 60,
    width: 700,
    label: "What's happening in your practice?",
    defaultContent: "#openpractice "
  });  

});

$(document).ready( function(){   
  getTweets();
  $('.retweet').live('click', function(){
    refresh = false;
    $('.tweet').fadeOut().html('');
    var tweep = $(this).parent().children('strong').children('a').html();
    var body = trim(stripHTML($(this).parent().prev('.tweet_body').html()));
    tweet($(this).parent().next('.tweet'), 'ReTweet ' + tweep, 'RT ' + tweep + ': ' + body);
    return false;
  });
  $('.reply').live('click', function(){
    refresh = false;
    $('.tweet').fadeOut().html('');
    var tweep = $(this).parent().children('strong').children('a').html();    
    tweet($(this).parent().next('.tweet'), 'Reply to ' + tweep, tweep);
    return false;
  });
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
      var tweets = eval(json);
      render_tweets(tweets);
      setTimeout(getTweets, 60000);
      hovercards();
      
      $('.tweet_body a').click(function(){
        var fullUrl = $(this).attr('href');
        var splitUrl = fullUrl.split("/");       
        if((splitUrl[2] != 'www.openpractice.me') && (splitUrl[2] != 'openpractice.me')){
            $(this).attr("target","_blank");
        }       
      });
      
    }    
  });
}

function hovercards(){
  twttr.anywhere(function (T) {   
    T('a.tweep').hovercards({      
      expanded: true,
      username: function(e) {        
        return e.title;
      }
    });
  });
}

function render_tweets(tweets){

  if(!refresh) return;
  
  $('#tweets ul li:not(.template)').remove();
  
  for(var i = 0; i < tweets.length; i++){

    var content = stripslashes(tweets[i].content);

    $('#tweets ul li.template').clone().appendTo($('#tweets ul'));

    $('#tweets ul li:last').attr('class', '');

    $('#tweets ul li:last .avatar_link').attr('href', 'http://twitter.com/' + tweets[i].handle);
    $('#tweets ul li:last .avatar_link img').attr('title', tweets[i].handle);
    $('#tweets ul li:last .profile_pic').attr('src', tweets[i].avatar);
    
    $('#tweets ul li:last .tweet_body').append(content);
    $('#tweets ul li:last .handle').append(tweets[i].handle);
    $('#tweets ul li:last .handle').attr('href', '/' + tweets[i].handle);
    $('#tweets ul li:last .handle').attr('title', '@' + tweets[i].handle + '\'s #openpractice archive');
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

function stripHTML(html){
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent||tmp.innerText;
}

function tweet(element, label, content){  
  twttr.anywhere(function (T) {
    T(element).tweetBox({
      height: 60,
      width: 500,
      label: label,
      defaultContent: content
    });
  });
  $(element).fadeIn();
}

function trim(stringToTrim) {
  return stringToTrim.replace(/^\s+|\s+$/g,"");
}