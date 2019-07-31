<?php

    /*
     *  A Software by
     *  THE NIGHTTIMEDEV
     *  August 2019
     *
     *  Re-Using or copying this code is allowed for non-profit, non-commercial and educational usage.
     *
     *  About:
     *  ------------------------------------------------------------------------------------------------
     *  Ich habe nach einem Weg gesucht, meine neu erlernten Fähigkeiten, sowie kleine Code-Snippets und
     *  Ideen zu dokumentieren / festzuhalten.
     *  Deshalb suchte ich nach einer WIKI-Lösung. Aber abgesehen von hässlichen Wordpress Plugins fand
     *  ich nichts was meinem Anspruch gerecht werden würde.
     *  So ... DIY
     *
     *  Notes / Hints:
     *  -------------------------------------------------------------------------------------------------
     *  - RTFM! -> /README.md
     *
     */

    require "./scripts/php/functions.php";
    $config = include('./config.php');
    session_start();
    if(!$_SESSION['login'] || !isset($_SESSION['username']) || !isset($_SESSION['avatar']) || !isset($_SESSION['mail'])) {
        $_SESSION['login'] = false;;
    }


?>

<!DOCTYPE html>
<html>
  <head>
    <title>THE NIGHTTIMEDEV WIKI</title>
    <link rel="stylesheet" href="./styles/skeleton.css" />
    <link rel="stylesheet" href="./styles/main.css" />
    <link rel="stylesheet" href="./styles/navbar.css" />
  </head>
  <body>
    <div class="navbar_wrapper">
      <div class="navBar" id="mainNavBar">
        <div class="container">
          <a href="#home">NIGHTTIMEDEV</a>
          <a href="#service">Log In</a>
          <a href="#service">Sign Up</a>
          <a href="javascript:void(0);" class="icon" onClick="openDrawerMenu()">&#9776;</a>
        </div>
      </div>
    </div>
    <div class="pagehead">
      <div class="overlay">
        <div class="pagehead_topcont">
          <h1>THE NIGHTTIMEDEV WIKI</h1>
          <h2>Share && Explore</h2>
          <form method="GET" action="search.php">
            <input name="keyword" type="text" placeholder="Search the knowledge base" class="search" />
          </form>
          <a href="./topics"><button>Just show me everything</button></a>
        </div>
      </div>
    </div>
    </div>
    <div class="container topmargin">
      <div class="row">
        <div class="four columns">
          <h3>Learn</h3>
          <p>
            Schaue dir die Notizen und Einträge von anderen an und lerne aus deren Erfahrungen.
          </p>
        </div>
        <div class="four columns">
          <h3>Share</h3>
          <p>
            Teile deine Learnings und Coding-Erfolge mit anderen, damit Sie nicht die selben Fehler wie du auf ihrem Weg machen müssen.
          </p>
        </div>
        <div class="four columns">
          <h3>Explore</h3>
          <p>
            Villeicht kannst du dir ja auch Inspirationen durch die Einträge von anderen holen. Mein Wiki steht dir offen.
          </p>
        </div>
      </div>
    </div>
    <div class="container topmargin">
      <div class="row">
        <div class="twelve columns">
          <h3>Wieso gibt es dieses Wiki?</h3>
          <p>
            Dieses Wiki habe ich erstellt, da ich selbst nach einem Weg gesucht habe, meine Learnings und Erfahrungen zu dokumentieren und festzuhalten.
            Bei der Suche nach einem bereits existierenden Projekt in dieser Richtung, konnte ich nichts finden was meinen Erwartungen gerecht werden könnte.
            Deshalb, und auch auf Grund der Erfahrung die ich mit dem Coden dieser Plattform machen kann, habe ich mich dazu entschlossen, das Problem einfach selbst in die Hand zu nehmen.
          </p>
        </div>
      </div>
    </div>
    <footer class="topmargin">
      <p>&copy; 2019 | THE NIGHTTIMEDEV</p>
      <div class="links">
        <a href="impressum.html" target="_blank">Impressum</a><br>
        <a href="datenschutz.html" target="_blank">Datenschutz</a><br>
        <a href="disclaimer.html" target="_blank">Disclaimer</a>
      </div>
    </footer>
    <script src="./scripts/js/navbar.js"></script>
  </body>
</html>
