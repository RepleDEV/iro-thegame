<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <script src="https://kit.fontawesome.com/3666f35065.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--IRO JS !! -->
    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>iro-thegame | Playing iro</title>
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
                    <a href="javascript:void(0)" class="nav-link" onclick="Menu.setTo('newgame');hasCreatedNewGame = false">
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
                <div class="header">
                    <h1 class="title">iro</h1>
                    <hr class="header-hr">
                </div>
                <div class="element" id="btn-play">
                    <a href="javascript:void(0)">
                        play
                    </a>
                </div>
                <div class="element" onclick="Menu.setTo('login')">
                    <a href="javascript:void(0)">
                        log-in
                    </a>
                </div>
            </div>

            <div class="login-menu hidden">
                <h4 id="back-btn" onclick="Menu.setTo('main');$('#error_message).html('')'"><i class="fas fa-chevron-left"></i>Log-in</h4>
                <hr>
                <p id="login_error_message"></p>
                <input type="text" name="username" id="username_login" placeholder="Username">
                <input type="email" placeholder="Email" id="email_login">
                <input type="password" name="passwd" id="passwd_login" placeholder="Password">
                <br>
                <button onclick="login()">Log-in</button>
                <p>Don't have an <a href="javascript:void(0)" onclick="Menu.setTo('signup')">account</a>?</p>
            </div>
            <div class="signup-menu hidden">
                <h4 id="back-btn" onclick="Menu.setTo('main');$('#error_message').html('')"><i class="fas fa-chevron-left"></i>Log-in</h4>
                <hr>
                <p id="signup_error_message"></p>
                <input type="text" name="username" id="username_signup" placeholder="Username">
                <input type="email" placeholder="Email" id="email_signup">
                <input type="password" name="passwd" id="passwd_signup" placeholder="Password">
                <br>
                <button onclick="signup()">Create Account</button>
            </div>
            <div class="newgame-menu hidden">
                <h4 id="back-btn" onclick="Menu.previous()"><i class="fas fa-chevron-left"></i> Choose difficulty</h4>
                <hr>
                <div class="element" onclick="Difficulty.easy()">
                    <a href="javascript:void(0)" id="difficulty-select">
                        Easy <span>(4-bit)</span>
                    </a>
                </div>
                <div class="element" onclick="Difficulty.medium()">
                    <a href="javascript:void(0)" id="difficulty-select">
                        Medium <span>(6-bit)</span>
                    </a>
                </div>
                <div class="element" onclick="Difficulty.hard()">
                    <a href="javascript:void(0)" id="difficulty-select">
                        Hard <span>(8-bit)</span>
                    </a>
                </div>
            </div>

            <div class="play-menu hidden">
                <div id="picker_element"></div>
                <div class="slider-container">
                    <input type="range" name="" id="slider_r" min="0" max="255" value="0" oninput="Game.updateColors()">
                    <br>
                    <input type="range" name="" id="slider_g" min="0" max="255" value="0" oninput="Game.updateColors()">
                    <br>
                    <input type="range" name="" id="slider_b" min="0" max="255" value="0" oninput="Game.updateColors()">
                </div>
                <div class="color-indicator"></div>
                <div class="color-boxes">
                    <div id="color_g"></div>
                    <div id="color_u"></div>
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
                <div class="status-corner">
                    Playing iro - <span id="status_message">Main Menu</span> | Version: 3.0.0 <br> Online Players: 0
                </div>
            </div>
        </main>
    </body>
    <script src="js/login-ajax.js"></script>
    <script src="js/game.js"></script>
    <script src="js/script.js"></script>

</html>
