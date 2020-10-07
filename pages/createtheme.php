<?php
error_reporting(0);
session_start();
if ($_POST['generated']) {
    $code = file_get_contents("../assets/base_theme.css");
    preg_match_all('/{%(.*?)%}/i', $code, $matches, PREG_SET_ORDER);
    //print_r($matches);
    foreach ($matches as $value) {
        $code = str_replace($value[0], $_POST[$value[1]], $code);
    }
    $filename = 'ThemeMaker' . session_id() . ".css";
    $temp_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $filename;
    $fp = fopen($temp_file, 'w');
    fwrite($fp, $code);
    fclose($fp);
    header('Content-Description: File Transfer');
    header('Content-Type: text/css');
    header('Content-Disposition: attachment; filename="' . $_POST['themename'] . '.theme.css"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($temp_file));
    readfile($temp_file);
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thememaker</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/classes.css">
    <link rel="stylesheet" href="../css/ids.css">
    <link rel="icon" href="../img/BD_transparent.png">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div id="wrapper"></div>
        <div id="bannerspace">
            <center><img id="banner" src="../img/headerbg_tight_transparent.png" alt="banner" draggable=false></center>
            <a href="../index.php"><img id="logo" src="../img/BD_transparent.png" class="logo" alt="ICON BD" draggable=false></a>
        </div>
        <header>
            <div>
                <nav>
                    <ul>
                        <a href="../index.php" draggable=false><li>Home</li></a>
                        <li class="cp">Create a Theme</li>
                        <a href="../pages/clearvision.php"><li>ClearVision</li><a>
                        <a href="../pages/library.php"><li>Library</li></a>
                        <a href="https://github-production-release-asset-2e65be.s3.amazonaws.com/155161153/c7d2fb00-d1b5-11ea-99e8-f5ca60f47502?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAIWNJYAX4CSVEH53A%2F20201007%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20201007T133112Z&X-Amz-Expires=300&X-Amz-Signature=e578fa6ab8b7b286918c8629240895289558e2c80700400a082f79e3a1187c62&X-Amz-SignedHeaders=host&actor_id=63563893&key_id=0&repo_id=155161153&response-content-disposition=attachment%3B%20filename%3DBandagedBD.exe&response-content-type=application%2Foctet-stream"><li>Download BD</li></a>
                    </ul>
                </nav>
            </div>
        </header>
    <main>
        <div class="row">
            <h1 id="titel">Create your own Theme</h1>
            <div class="column">
                <center>
                <form name="form" method="post">

                    <label for="themename">
                        Name your Theme
                        <span title="Shows the themename in Discord">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="text" name="themename" value="CustomTheme"><br><br>

                    <label for="author">
                        Author
                        <span title="Shows the author in Discord">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="text" name="author" value="ROM-R"><br><br>

                    <label for="maincolor">
                        Main Color
                        <span title="Changes the main color">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="color" id="colorinput" name="maincolor" value="#2780e6"><br><br>

                    <label for="hovercolor">
                        Hover Color
                        <span title="Changes the color when hovering over something.">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="color" id="colorinput" name="hovercolor" value="#1e63b3"><br><br>

                    <label for="textcolor">
                        Text Color
                        <span title="Changes the text color.">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="color" id="colorinput" name="textcolor" value="#CCCCCC"><br><br>

                    <label for="channelwidth">
                        Channelwidth in px
                        <span title="Changes the width of text and voice channels">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="number" name="channelwidth" value="220"><br><br>

                    <label for="memberwidth">
                        Memberwidth in px
                        <span title="Changes the width of the members on a server">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="number" name="memberwidth" value="240"><br><br>

                    <label for="bgimg">
                        Background Image URL
                        <span title="Background image will be applied to your discord background">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="url" name="bgimg" value=""><br><br>

                    <label for="bgblur">
                        Background blur in px
                        <span title="Changes the blur of the background">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <input type="number" name="bgblur" value="0"><br><br>


                    <label for="font">
                        Font
                        <span title="Changes all font in discord">
                            <sup id="sup">(?)</sup>
                        </span>
                    </label><br>
                    <select name="font" id="font">
                        <option value="Whitney" selected="selected">Whitney</option>
                        <option value="Arial">Arial</option>
                        <option value="Helvetica Neue">Helvetica Neue</option>
                        <option value="Helvetica">Helvetica</option>
                        <option value="sans-serif">sans-serif</option>
                    </select>
                    <br><br>
                    <input type="hidden" name="generated" value="<?php echo date("YmdHis"); ?>">
                    <input type="submit" value="Download Theme" id="download">
                </form>
                </center>
            </div>
            <div2 class="column">
                <img src="../assets/example.png" alt="DiscordImage" id="myImg">
            </div2>
    </main>
    <footer>
        <div class="left">
            <p>Project Contributors: <br>René, Matteo, Robin, Oliver<br></p>
        </div>

        <div class="right">
            <a href="https://github.com/ReddixT/BetterDiscord-Thememaker">GitHub<br></a>
            <a href="https://www.zli.ch/">ZLI</a>
        </div>
    </footer>
    </div>
</body>

</html>