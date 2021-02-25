<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style2.css?<?php echo time(); ?>"/>
  <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>
<body>
    <header id=main-header>
    <h1>MY MUSIC</h1>
  </header>

   <nav class="sidebar">
    <div class="text">Menu</div>
    <ul>
      <li><a href="indexHome.php">Home</a></li>
      <li>
        <a class="track-btn">Track<span class="fas fa-caret-down first"></span></a>
        <ul class="track-show">
          <li><a href="indexTrack.php">Track List</a></li>
          <li><a href="addTrack.php">Add Track</a></li>
        </ul>
      </li>
       <li>
        <a  class="album-btn">Album<span class="fas fa-caret-down second"></span></a>
        <ul class="album-show">
          <li><a href="indexAlbum.php">Album List</a></li>
          <li><a href="addAlbum.php">Add Album</a></li>
        </ul>
      </li>
        <li>
        <a class="artist-btn">Artist<span class="fas fa-caret-down third"></span></a>
        <ul class="artist-show">
          <li><a href="indexArtist.php">Artist List</a></li>
          <li><a href="addArtist.php">Add Artist</a></li>
        </ul>
      </li>
      <li>
        <a  class="genre-btn">Genre<span class="fas fa-caret-down fourth"></span></a>
        <ul class="genre-show">
          <li><a href="indexGenre.php">Genre List</a></li>
          <li><a href="addGenre.php">Add Genre</a></li>
        </ul>
      </li>
    </ul>

   </nav>

   <script >
     $('.track-btn').click(function(){
     $('nav ul .track-show').toggleClass("show");
     $('nav ul .first').toggleClass("rotate");
});
          $('.album-btn').click(function(){
     $('nav ul .album-show').toggleClass("show1");
     $('nav ul .second').toggleClass("rotate");
});
               $('.artist-btn').click(function(){
     $('nav ul .artist-show').toggleClass("show2");
     $('nav ul .third').toggleClass("rotate");
});
                    $('.genre-btn').click(function(){
     $('nav ul .genre-show').toggleClass("show3");
     $('nav ul .fourth').toggleClass("rotate");
});

    $('nav ul li').click(function(){
      $(this).addClass("active").siblings().removeClass("active");
      });

   </script>

</body>
</html>
