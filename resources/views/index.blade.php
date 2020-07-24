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
                        <span class="link-text" id="user-name-sidenav-span" style="text-transform: none">iro-thegame</span>
                        <i class="fas fa-angle-double-right fa-3x"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" onclick="Menu.setTo('newgame');Game.reset()">
                        <i class="fas fa-plus fa-3x"></i>
                        <span class="link-text">New Game</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" onclick="Menu.setTo('settings');Game.reset()">
                        <i class="fas fa-cog fa-5x"></i>
                        <span class="link-text">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
        <main>
            <div class="loading-menu menu">
                <p>Loading...</p>
                <pre id="loading_message"></pre>
            </div>
            <div class="main-menu menu hidden">
                <div class="header">
                    <h1 class="title">iro</h1>
                    <hr class="header-hr">
                </div>
                <div class="element" id="btn-play">
                    <a href="javascript:void(0)">
                        play
                    </a>
                </div>
                <div class="element" onclick="Menu.setTo('settings')" id="settings_menubtn">
                    <a href="javascript:void(0)">
                        settings
                    </a>
                </div>
                <div class="element" onclick="Menu.setTo('login')" id="login_menubtn">
                    <a href="javascript:void(0)">
                        log-in
                    </a>
                </div>
                <div class="element hidden" onclick="Menu.setTo('stats')" id="stats_menubtn">
                    <a href="javascript:void(0)">
                        statistics
                    </a>
                </div>
                <div class="element hidden" onclick="Menu.setTo('profile')" id="profile_menubtn">
                    <a href="javascript:void(0)">
                        profile
                    </a>
                </div>
            </div>
            <div class="settings-menu menu hidden">
                <h4 class="back-btn" onclick="Menu.setTo('main')"><i class="fas fa-chevron-left"></i>Settings</h4>
                <hr>
                <div class="element hidden" onclick="Menu.setTo('profile_settings')" id="profilesettings_menubtn">
                    <a href="javascript:void(0)">
                        profile settings
                    </a>
                </div>
                <div class="element" onclick="Menu.setTo('game_settings')">
                    <a href="javascript:void(0)">
                        game settings
                    </a>
                </div>
            </div>

            <div class="profile_settings-menu menu hidden">
                <h4 class="back-btn" onclick="Menu.setTo('main')"><i class="fas fa-chevron-left"></i>Profile Settings</h4>
                <hr>
                <div class="element" onclick="logout()">
                    <a href="javascript:void(0)">
                        log-out
                    </a>
                </div>
            </div>

            <div class="profile-menu menu hidden">
                <h4 class="back-btn" onclick="Menu.setTo('main')"><i class="fas fa-chevron-left"></i>Profile Info</h4>
                <hr>
                <h2 id="logged_in_as"></h2>
                <p>Best time:</p>
                <div class="element" onclick="Menu.setTo('profile_settings')">
                    <a href="javascript:void(0)">
                        profile settings
                    </a>
                </div>  
            </div>

            <div class="stats-menu menu hidden">
                <h4 class="back-btn" onclick="Menu.setTo('main')"><i class="fas fa-chevron-left"></i>Statistics</h4>
                <hr>
                <p>Coming soon!</p>
            </div>

            <div class="login-menu menu hidden">
                <h4 class="back-btn" onclick="Menu.setTo('main');$('#error_message').html('')"><i class="fas fa-chevron-left"></i>Log-in</h4>
                <hr>
                <p id="login_error_message"></p>
                <input type="text" name="username" id="username_login" placeholder="Username">
                <input type="password" name="passwd" id="passwd_login" placeholder="Password">
                <br>
                <button onclick="login()">Log-in</button>
                <div class="element" onclick="Menu.setTo('signup')">
                    <a href="javascript:void(0)">create account</a>
                </div>
            </div>

            <div class="signup-menu menu hidden">
                <h4 class="back-btn" onclick="Menu.setTo('main');$('#error_message').html('')"><i class="fas fa-chevron-left"></i>Log-in</h4>
                <hr>
                <p id="signup_error_message"></p>
                <input type="text" name="username" id="username_signup" placeholder="Username">
                <input type="email" placeholder="Email" id="email_signup">
                <input type="password" name="passwd" id="passwd_signup" placeholder="Password">
                <br>
                <button onclick="signup()">Create Account</button>
            </div>

            <div class="newgame-menu menu hidden">
                <h4 class="back-btn" onclick="Menu.setTo('main')"><i class="fas fa-chevron-left"></i>Choose difficulty</h4>
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

            <div class="play-menu menu hidden">
                <div class="game-container">
                    <div id="picker_element"></div>
                    <div class="slider-container">
                        <input type="range" name="" id="slider_r" min="0" max="255" value="0" oninput="sliderFunc()">
                        <br>
                        <input type="range" name="" id="slider_g" min="0" max="255" value="0" oninput="sliderFunc()">
                        <br>
                        <input type="range" name="" id="slider_b" min="0" max="255" value="0" oninput="sliderFunc()">
                    </div>
                    <div class="color-boxes">
                        <div id="color_g"></div>
                        <div id="color_u"></div>
                    </div>
                </div>
                <hr>
                <div class="game-info">
                    <p style="font-size:12px;margin:0;">Please note that the color picker may be slightly inaccurate</p>
                    <p>Colors: (r,g,b) <span id="game_colors"></span></p>
                    <p>Time: <span id="game_time">00:00:00</span></p>
                    <p>Difficulty: <span id="game_diff"></span></p>
                </div>
            </div>

            <div class="win-menu menu hidden">
                <h4>Game Completed</h4>
                <p>Final Time: <span id="final_time"></span> (HH:MM:SS)</p>
                <p id="save_login_message"></p>
                <div class="element" onclick="Menu.setTo('main')">
                    <a href="javascript:void(0)">
                        back to menu
                    </a>
                </div>
            </div>

            <div class="leaderboard-menu">
                <h4>Leaderboard</h4>
                <button class="leaderboard_diff_btn btn-g">4-bit</button>
                <div class="table">
                    <div class="column-header">
                        <div>#</div>
                        <div>Username</div>
                        <div>Time</div>
                    </div>
                    <div class="column-rows">
                    </div>
                </div>
                <div class="status-corner">
                    Playing iro - <span id="status_message">Main Menu</span> | Version: 3.0.0 prev <br> Online Players: 0
                </div>
            </div>
        </main>
    </body>
    <script src="js/ajax.js"></script>
    <script src="js/game.js"></script>
    <script src="js/script.js"></script>
</html>
