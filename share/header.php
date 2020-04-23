<header class="bg-taupe row m-0 header_background_color">
  <!-- Nav tabs -->
  <div id="topTabs" class="col-xl-11 col-md-10 col-9 p-0">
    <ul class="nav nav-tabs nav-fill">
      <li class="nav-item">
        <a id="homeLink" class="nav-link secondary_font_color" href="../index.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a id="timerLink" class="nav-link secondary_font_color" href="timer.php">Timer</a>
      </li>
      <li class="nav-item">
        <a id="lessonsLink" class="nav-link secondary_font_color" href="learningMenu.php">Leçons</a>
      </li>
      <li class="nav-item">
        <a id="multiplayerLink" class="nav-link secondary_font_color" href="multiplayer.php">Multi-joueurs</a>
      </li>
    </ul>
  </div>
  <div class="col p-0 ml-2">
    <button type="submit" class="btn btn-block bg-taupe-light h-100 button_header_background_color">
      <a id="accountLink" href="<?= isset($_COOKIE['avatarUrl']) ? 'user.php' : 'signin.php' ?>" class="text-decoration-none stretched-link secondary_font_color">Compte</a>
    </button>
  </div>
</header>
<!-- Up arrow as the scroll button -->
<div id="scrollButton" class="w-100 text-center p-0 m-0 header_background_color">
  <img class="p-0 m-0" src="https://image.flaticon.com/icons/svg/271/271239.svg" alt="down arrow">
</div>
