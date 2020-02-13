<?php
include './core/config/initialize.php';
$sesEmail   = "";
$uid        = "";
$school     = "";

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
 
 function GenerateSerial() {
    $chars = array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $sn = '';
    $max = count($chars)-1;
    for($i=0;$i<5;$i++){
     $sn .= (!($i % 5) && $i ? '-' : '').$chars[rand(0, $max)];
      }
    return $sn;
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
?>
