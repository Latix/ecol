<?php

$valid_accounts = array(
    "AD" => "Admin", 
    "RT" => "Root"
  );

$valid_property = array(
  'AP' => 'Apartment', 
  'CO' => 'Condominium', 
  'CT' => 'Cottage', 
  'FL' => 'Flat', 
  'HO' => 'House'
);

$valid_status = array(
  'SA' => 'Sale', 
  'RT' => 'Rent'
);

$valid_states = array(
    "Outside Nigeria"  => "Outside Nigeria",
    "ABUJA FCT"        => "ABUJA FCT",
    "ABIA"             => "ABIA",
    "ADAMAWA"          => "ADAMAWA",
    "AKWA IBOM"        => "AKWA IBOM",
    "ANAMBRA"          => "ANAMBRA",
    "BAUCHI"           => "BAUCHI",
    "BAYELSA"          => "BAYELSA",
    "BENUE"            => "BENUE",
    "BORNO"            => "BORNO",
    "CROSS RIVER"      => "CROSS RIVER",
    "DELTA"            => "DELTA",
    "EBONYI"           => "EBONYI",
    "EDO"              => "EDO",
    "EKITI"            => "EKITI",
    "ENUGU"            => "ENUGU",
    "GOMBE"            => "GOMBE",
    "IMO"              => "IMO",
    "JIGAWA"           => "JIGAWA",
    "KADUNA"           => "KADUNA",
    "KANO"             => "KANO",
    "KATSINA"          => "KATSINA",
    "KEBBI"            => "KEBBI",
    "KOGI"             => "KOGI",
    "KWARA"            => "KWARA",
    "LAGOS"            => "LAGOS",
    "NASSARAWA"        => "NASSARAWA",
    "NIGER"            => "NIGER",
    "OGUN"             => "OGUN",
    "ONDO"             => "ONDO",
    "OSUN"             => "OSUN",
    "OYO"              => "OYO",
    "PLATEAU"          => "PLATEAU",
    "RIVERS"           => "RIVERS",
    "SOKOTO"           => "SOKOTO",
    "TARABA"           => "TARABA",
    "YOBE"             => "YOBE",
    "ZAMFARA"          => "ZAMFARA"
);

function checkAccess() {
    if(!isset($_SESSION['admin_id'])) {
        header("Location: login.php?error=1");
    }
}
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

function is_connected()
{
    $connected = @fsockopen("www.example.com", 80);
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}

if(isset($_SESSION['admin_id'])){
    $id        = $_SESSION['admin_id'];
    $position  = $conn->query("SELECT accountType FROM users WHERE id = ".$_SESSION['admin_id'])->fetch_assoc()['accountType'];
    $firstName = $conn->query("SELECT firstName   FROM users WHERE id = ".$_SESSION['admin_id'])->fetch_assoc()['firstName'];
    $lastName  = $conn->query("SELECT lastName    FROM users WHERE id = ".$_SESSION['admin_id'])->fetch_assoc()['lastName'];
    $fullName  = ucwords($firstName.' '.$lastName);
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "logout") {
        session_destroy();
        header("Location: login.php");
    }
}
?>
