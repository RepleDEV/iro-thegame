<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <script src="https://kit.fontawesome.com/3666f35065.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>iro-thegame | {{count($_GET) ? $_GET["menu"] : 'Playing iro'}}</title>
</head>
    <body>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="profile-logo">
                    <a href="javascript:void(0)" class="nav-link">
                        <span class="link-text" id="user-name-sidenav-span">iro-thegame</span>
                        <i class="fas fa-angle-double-right fa-3x"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="fas fa-plus fa-3x"></i>
                        <span class="link-text">New Game</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="fas fa-cog fa-5x"></i>
                        <span class="link-text">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
        <main>
            <div class="main-menu">
                <div class="element" id="btn-play">
                    <a href="javascript:void(0)">
                        play
                    </a>
                </div>
                <div class="element">
                    <a href="javascript:void(0)">
                        create account
                    </a>
                </div>
                <div class="element">
                    <a href="javascript:void(0)">
                        log-in
                    </a>
                </div>
            </div>

            <div class="newgame-menu hidden">
                <h4>Choose difficulty</h4>
                <hr>
                <div class="element">
                    <a href="javascript:void" id="difficulty-select">
                        Easy <span>(4-bit)</span>
                    </a>
                </div>
                <div class="element">
                    <a href="javascript:void" id="difficulty-select">
                        Medium <span>(6-bit)</span>
                    </a>
                </div>
                <div class="element">
                    <a href="javascript:void" id="difficulty-select">
                        Hard <span>(8-bit)</span>
                    </a>
                </div>
            </div>

            <div class="leaderboard-menu">
                <h4>Leaderboard:</h4>
                <button class="leaderboard_diff_btn btn-g">4-bit</button>
                <hr>
                <div class="table">
                    <table>
                        <tr>
                            <th class="name">Name</th>
                            <th class="time">Time</th>
                        </tr>
                        <tr>
                            <td class="name">Robert</td>
                            <td class="time">2:20</td>
                        </tr>
                        <tr>
                            <td class="name">Robert</td>
                            <td class="time">2:20</td>
                        </tr>
                    </table>
                </div>
            </div>
        </main>
    </body>
    <script src="js/game.js"></script>
    <script src="js/script.js" defer></script>

</html>
