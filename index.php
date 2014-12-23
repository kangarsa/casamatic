<?php
  include('Net/SSH2.php');

$verz="1.0";
$comPort = "/dev/ttyACM0"; /*change to correct com port */
$color = "white";
$value = 2;


if (isset($_POST["rcmd"])) {
$rcmd = $_POST["rcmd"];
switch ($rcmd) {
     case "Off":
        $fp =fopen($comPort, "w");
        $color = "red";
        $value = "0";
        //sleep(3);
        fwrite($fp, $value);
  break;
  case "On":
        $fp =fopen($comPort, "w");
        $color = "green";
        $value = "1";
        //sleep(3);
        fwrite($fp, $value);
  break;
  case "more":
        shell_exec('amixer set Master 5%+');
  break;
  case "less":
        shell_exec('amixer set Master 5%-');
  break;
  case "mute":
        $command = "export DISPLAY=:0; xdotool key \"XF86AudioMute\"";
        $ssh = new Net_SSH2('localhost');
        $ssh->login('pantufla', 'teoelmateo') or die("Login failed");
        echo $ssh->exec($command);
  break;
  case "pause":
        $command = "export DISPLAY=:0; xdotool key \"XF86AudioPause\"";
        $ssh = new Net_SSH2('localhost');
        $ssh->login('pantufla', 'teoelmateo') or die("Login failed");
        echo $ssh->exec($command);
  break;
  case "play":
        $command = "export DISPLAY=:0; xdotool key \"XF86AudioPlay\"";
        $ssh = new Net_SSH2('localhost');
        $ssh->login('pantufla', 'teoelmateo') or die("Login failed");
        echo $ssh->exec($command);
  break;
  case "playPausePandora":
        $command = "export DISPLAY=:0; xdotool search --class google-chrome windowactivate -- key 'Alt_L+1' key 'space'";
        $ssh = new Net_SSH2('localhost');
        $ssh->login('pantufla', 'teoelmateo') or die("Login failed");
        echo $ssh->exec($command);
  break;
  case "OpenPandora":
        $command = "export DISPLAY=:0; xdotool search --class google-chrome windowactivate -- key 'Alt_L+1' key 'space'";
        $ssh = new Net_SSH2('localhost');
        $ssh->login('pantufla', 'teoelmateo') or die("Login failed");
        echo $ssh->exec($command);
  break;
default:
  die('Crap, something went wrong. The page just puked.');
}

}
?>
<html>
<body>

<center><h1>Arduino mueve tu Coo-Coo-ler</h1><b>Version <?php echo $verz; ?></b></center>

<form method="post" action="index.php" style="background-color:<?php echo $color ?>">
<br/>
<input style="width:32%;height:30%;font-size:40px;" type="submit" value="less" name="rcmd">
<input style="width:32%;height:30%;font-size:40px;" type="submit" value="mute" name="rcmd">
<input style="width:32%;height:30%;font-size:40px;" type="submit" value="more" name="rcmd">
<br/>
<br/>
<input style="width:32%;height:30%;font-size:40px;" type="submit" value="pause" name="rcmd">
<input style="width:32%;height:30%;font-size:40px;" type="submit" value="play" name="rcmd">
<input style="width:32%;height:30%;font-size:40px;" type="submit" value="playPausePandora" name="rcmd">
<br/>
<br/>
<input style="width:49%;height:20%;color:green;font-size:30px;" type="submit" value="On" name="rcmd">
<input style="width:49%;height:20%;color:red;font-size:30px;" type="submit" value="Off" name="rcmd">
<br/>
<br/>
<input style="width:49%;height:20%;color:green;font-size:30px;" type="submit" value="OpenPandora" name="rcmd">
<br/>

</form>
</body>
</html>
