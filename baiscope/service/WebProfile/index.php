<!DOCTYPE HTML>
<html>

<head>
  <title>Baiscope Mania</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
        <div id="logo" style="float: left;">
         <div> 
        <a href="#"><img alt="" src="images/baiscope_mania_small_1.png"></a>
        <div class="slogan">One Stop Entertainment Portal</div>
         </div>
        
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="current"><a href="index.html">Home</a></li>
          <li><a href="movies.html">Movies</a></li>
          <li><a href="tvguide.html">TV Guide</a></li>
          <li><a href="baiscopechallenge.html">Baiscope Challenge</a></li>
          <li><a href="editprofile.html">Edit Profile</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="sidebar_container">
        <img class="paperclip" src="style/paperclip.png" alt="paperclip" />
        <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Latest News</h3>
        <h4>What's the News?</h4>
        <h5>1st July 2011</h5>
        <p>To enjoy Baiscope Mania, register by sending an SMS to XXXX<br /><a href="#">Read more</a></p>
        </div>
        <img class="paperclip" src="style/paperclip.png" alt="paperclip" />
        <div class="sidebar">
          <h3>Newsletter</h3>
          <p>If you would like to receive our newletter, please enter your email address and click 'Subscribe'.</p>
          <form method="post" action="#" id="subscribe">
            <p style="padding: 0 0 9px 0;"><input class="search" type="text" name="email_address" value="your email address" onclick="javascript: document.forms['subscribe'].email_address.value=''" /></p>
            <p><input class="subscribe" name="subscribe" type="submit" value="Subscribe" /></p>
          </form>
        </div>
        <img class="paperclip" src="style/paperclip.png" alt="paperclip" />
        <div class="sidebar">
          <h3>Latest Blog</h3>
          <h4>Website Goes Live</h4>
          <h5>1st July 2011</h5>
          <p>We have just launched our new website. Take a look around, we'd love to know what you think.....<br /><a href="#">read more</a></p>
        </div>
      </div>
      <div id="content">        
        <ul>
          <li><?php echo $_SESSION['profilename']; ?></li>
          <li><?php echo $_SESSION['username']; ?></li>
        </ul>
      </div>
    </div>
    <div id="footer">
      
    </div>
  </div>
</body>
</html>
