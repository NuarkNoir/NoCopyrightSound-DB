<?php
if (version_compare(phpversion(), '5.3.0', '>=') == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);
$sDir = './music/';
$aFiles = array();
$rDir = opendir($sDir);
if ($rDir) {
    while ($sFile = readdir($rDir)) {
        if ($sFile == '.' or $sFile == '..' or !is_file($sDir . $sFile))
            continue;
        $aPathInfo = pathinfo($sFile);
        $sExt = strtolower($aPathInfo['extension']);
        if ($sExt == 'mp3') {
          createCard($sDir . $sFile, $sFile);
          //array_push($aFiles, $sDir . $sFile);
        }
    }
    closedir( $rDir );
    $json = array(
      'version' => 2.3,
      'content-type' => 'music/mp3',
      'type' => 'debug',
      'lenght' => count($aFiles),
      'tracks' => $aFiles
    );
    //echo json_encode($json);
}

function createCard($path, $name){
  $name = explode('.',$name)[1];
  echo "
  <div>
    <div class=\"uk-width-1-1\">
      <b class=\"uk-card-title\">$name</b>
      <button class=\"uk-button uk-align-right uk-button-primary uk-width-1-6\" onclick=\"play('$path')\">PLAY</button>
    </div>
  </div>
  <br>
  <br>";
}
