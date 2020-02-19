<?php

$valid_accounts = array(
    "AD" => "Admin", 
    "RT" => "Root"
  );

$valid_accounts_HTML = array(
    "AD" => "primary", 
    "RT" => "danger"
  );
  
$valid_accounts_status = array(
    0 => 'Inactive',
    1 => 'Active'
);

$valid_accounts_status_HTML = array(
    0 => 'danger',
    1 => 'success'
);

$valid_property = array(
  'AP' => 'Apartment', 
  'CO' => 'Condominium', 
  'CT' => 'Cottage', 
  'FL' => 'Flat', 
  'HO' => 'House'
);

$valid_property_HTML = array(
  'AP' => 'danger', 
  'CO' => 'primary', 
  'CT' => 'dark', 
  'FL' => 'teal', 
  'HO' => 'warning'
);

$valid_status = array(
  'SA' => 'Sale', 
  'RT' => 'Rent'
);

$valid_status_HTML = array(
  'SA' => 'teal', 
  'RT' => 'danger'
);

$valid_states = array(
    "Outside_Nigeria"  => "Outside Nigeria",
    "ABUJA_FCT"        => "ABUJA FCT",
    "ABIA"             => "ABIA",
    "ADAMAWA"          => "ADAMAWA",
    "AKWA IBOM"        => "AKWA IBOM",
    "ANAMBRA"          => "ANAMBRA",
    "BAUCHI"           => "BAUCHI",
    "BAYELSA"          => "BAYELSA",
    "BENUE"            => "BENUE",
    "BORNO"            => "BORNO",
    "CROSS_RIVER"      => "CROSS RIVER",
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

function datetimeToText (string $datetime, string $format="fulldate") : string
{
    $unixdatetime   = strtotime($datetime);
    $dateFormat     = "";
    switch (strtolower($format))
    {
        case 'fulldate':
            $dateFormat = "%d %B, %Y at %I:%M %p";
            break;
        case 'date':
            $dateFormat = "%m/%d/%Y";
            break;
        case 'mysql-date':
            $dateFormat = "%m-%d-%Y";
            break;
        case 'customd':
            $dateFormat = "%d %B. %Y";
            break;
        case 'customdate':
            $dateFormat = "%d %b. %Y";
            break;
        case 'customdated':
            $dateFormat = "%d %b %Y";
            break;
        case 'monthyear':
            $dateFormat = "%b. %Y";
            break;
        case 'time':
            $dateFormat = "%I:%M %p";
            break;
        case 'datetime':
            $dateFormat = "%m/%d/%Y %H:%M:%S %p";
            break;
        case 'datefm':
            $dateFormat = "%d/%m/%Y";
            break;
        case 'datefms':
            $dateFormat = "%d-%m-%Y";
            break;
        case 'datef':
            $dateFormat = "%d/%m/%Y %H:%M:%S %p";
            break;
        case 'mysql-datetime':
            $dateFormat = "%m-%d-%Y %H:%M:%S";
            break;
        case 'word-datetime':
            $dateFormat = "%a %d %b %I:%M %p";
            break;
        case 'word-date':
            $dateFormat = "%d %b %Y";
            break;
        case 'fullday':
            $dateFormat = "%A";
            break;
        case 'day':
            $dateFormat = "%a";
            break;
        default:
            $dateFormat = "%B %d, %Y at %I:%M %p";
            break;
    }
    return strftime($dateFormat, $unixdatetime);
}

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

function deletFile ($file) {
    if (file_exists($file)) {
        unlink($file);
        return true;
      } else {
        return false;
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
    $id             = $_SESSION['admin_id'];
    $position       = $conn->query("SELECT accountType FROM users WHERE id = ".$_SESSION['admin_id'])->fetch_assoc()['accountType'];
    $firstName      = $conn->query("SELECT firstName   FROM users WHERE id = ".$_SESSION['admin_id'])->fetch_assoc()['firstName'];
    $lastName       = $conn->query("SELECT lastName    FROM users WHERE id = ".$_SESSION['admin_id'])->fetch_assoc()['lastName'];
    $fullName       = ucwords($firstName.' '.$lastName);
    $logged_user    = $conn->query("SELECT * FROM users WHERE id=".$_SESSION['admin_id'])->fetch_assoc();
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "logout") {
        session_destroy();
        header("Location: login.php");
    }
}
?>
