<script language="php">
header("Content-type: text/plain");

if(isset($_GET['symbol']))
    $ticker = $_GET['symbol'];
else
    die("No SYMBOL/TICKER specified");

$timeframe = "0";
if(isset($_GET['timeframe']))
    $timeframe = $_GET['timeframe'];
$timeframe = intval($timeframe);

$db = mysql_connect('localhost','root','') or die("Cannot connect to DB");
mysql_select_db('fnchartsdb') or die("Cannot select DB");

if($timeframe == 0) // user wants to display all available trading sessions
    $first_session_to_fetch = "19700101";
else { // user wants to display $timeframe number of trading sessions
    $recent_trading_sessions = mysql_query("SELECT DISTINCT DATE_FORMAT(_datetime,'%Y%m%d') as date FROM intraday_data WHERE ticker='$ticker' ORDER BY date DESC LIMIT $timeframe") or die("Query ERROR");
    $first_session_to_fetch = "19700101";
    while($row = mysql_fetch_row($recent_trading_sessions)){
        $first_session_to_fetch = $row[0];
    }
    mysql_free_result($recent_trading_sessions);
}

$last_cached_timestamp = "";
if(isset($_GET['last_timestamp']))
    $last_cached_timestamp=$_GET['last_timestamp'];

if(strlen($last_cached_timestamp) == 0) { //this is the first data request, no data in FnCharts' cache yet
    $query = "SELECT DATE_FORMAT(_datetime,'%Y%m%d'),TIME_FORMAT(_datetime,'%H%i%s'),price,volume FROM intraday_data WHERE ticker='$ticker' AND _datetime>='$first_session_to_fetch' ORDER BY _datetime ASC";
} else { // this is a subsequent data request, data that is already in FnCharts' doesn't need to be send again
    $last_cached_timestamp = str_replace("-","",$last_cached_timestamp);
    $last_cached_timestamp = str_replace("_","",$last_cached_timestamp);
    if(strlen($last_cached_timestamp)>14)
        $last_cached_timestamp = substr($last_cached_timestamp,0,14);

    $first_cached_timestamp = "";
    if(isset($_GET['first_timestamp']))
        $first_cached_timestamp = $_GET['first_timestamp'];
    if(strlen($first_cached_timestamp) == 0)
        $first_cached_timestamp = $last_cached_timestamp;
    else {
        $first_cached_timestamp = str_replace("-","",$first_cached_timestamp);
        $first_cached_timestamp = str_replace("_","",$first_cached_timestamp);
        if(strlen($first_cached_timestamp)>14)
            $first_cached_timestamp = substr($first_cached_timestamp,0,14);
    }
    $query = "SELECT DATE_FORMAT(_datetime,'%Y%m%d'),TIME_FORMAT(_datetime,'%H%i%s'),price,volume FROM intraday_data WHERE ticker='$ticker' AND _datetime>='$first_session_to_fetch' AND (_datetime<'$first_cached_timestamp' OR _datetime>='$last_cached_timestamp') ORDER BY _datetime ASC";
}

$result = mysql_query($query) or die("Query ERROR");
$row_number = 0;
while($row = mysql_fetch_row($result))
{
        if($row_number == 0)
            echo "<DTYYYYMMDD>,<TIME>,<CLOSE>,<VOL>\n";
        $row_number++;

	$date = $row[0];
	$time = $row[1];
	$price = $row[2];
	$volume = $row[3];

	echo "$date,$time,$price,$volume\n";
}
mysql_free_result($result);
</script>