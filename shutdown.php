<?php
  include('Net/SSH2.php');

$verz="1.0";
$comPort = "/dev/ttyACM0"; /*change to correct com port */
$color = "white";
$value = 2;


if (isset($_POST["rcmd"])) {
$rcmd = $_POST["rcmd"];
switch ($rcmd) {
  case "now":
        $command = "echo 'teoelmateo' | sudo -S poweroff";
        $ssh = new Net_SSH2('localhost');
        $ssh->login('pantufla', 'teoelmateo') or die("Login failed");
        echo $ssh->exec($command);
        
  break;
  case "ten":
        $command = "sleep '600'; echo 'teoelmateo' | sudo -S poweroff";
        $ssh = new Net_SSH2('localhost');
        $ssh->login('pantufla', 'teoelmateo') or die("Login failed");
        echo $ssh->exec($command);
  break;
  case "twenty":
        $command = "sleep '1200'; echo 'teoelmateo' | sudo -S poweroff";
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

<form method="post" action="shutdown.php" style="background-color:<?php echo $color ?>">
<br/>
<input style="width:32%;height:30%;font-size:40px;" type="submit" value="now" name="rcmd">
<input style="width:32%;height:30%;font-size:40px;" type="submit" value="ten" name="rcmd">
<input style="width:32%;height:30%;font-size:40px;" type="submit" value="twenty" name="rcmd">
<br/>

</form>
</body>
</html>
