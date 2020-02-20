<header class="bg-taupe row m-0">
  <!-- Nav tabs -->
  <div id="topTabs" class="col-xl-11 col-md-10 col-9 p-0">
    <ul class="nav nav-tabs nav-fill">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view/timer.php">Timer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view/learningMenu.php">Leçons</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view/multiplayer.php">Multi-joueurs</a>
      </li>
    </ul>
  </div>
  <div class="col p-0 ml-2">
    <button type="submit" class="btn btn-block bg-taupe-light h-100">
      <a href="<?= isset($_COOKIE['avatarUrl']) ? 'user.php' : 'signin.php' ?>" class="text-decoration-none stretched-link">Compte</a>
    </button>
  </div>
</header>
<div id="scrollButton" class="w-100 text-center p-0 m-0">
  <img class="p-0 m-0" src="https://image.flaticon.com/icons/svg/271/271239.svg" alt="down arrow">
</div>
