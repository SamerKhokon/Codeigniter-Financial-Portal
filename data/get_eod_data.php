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

if($timeframe == 0) // user wants to display all available data
    $first_session_to_fetch = "19700101";
else { // user wants to display $timeframe number of years
    $date_query = mysql_query("SELECT MAX(_date) FROM eod_data WHERE ticker='$ticker'") or die("Query ERROR");
    $first_session_to_fetch = "1970-01-01";
    while($row = mysql_fetch_row($date_query)){
        $first_session_to_fetch = $row[0];
    }
    mysql_free_result($date_query);
    $first_session_to_fetch = date("Ymd", strtotime($first_session_to_fetch." -".$timeframe." years"));
}
$last_cached_timestamp = "";
if(isset($_GET['last_timestamp']))
    $last_cached_timestamp=$_GET['last_timestamp'];

if(strlen($last_cached_timestamp) == 0) { //this is the first data request, no data in FnCharts' cache yet
    $query = "SELECT DATE_FORMAT(_date,'%Y%m%d'),open,high,low,close,volume FROM eod_data WHERE ticker='$ticker' AND _date>'$first_session_to_fetch' ORDER BY _date ASC";
} else { // this is a subsequent data request, data that is already in FnCharts' doesn't need to be send again
    $last_cached_timestamp = str_replace("-","",$last_cached_timestamp);
    $first_cached_timestamp = "";
    if(isset($_GET['first_timestamp']))
        $first_cached_timestamp = $_GET['first_timestamp'];
    if(strlen($first_cached_timestamp) == 0)
        $first_cached_timestamp = $last_cached_timestamp;
    else
        $first_cached_timestamp = str_replace("-","",$first_cached_timestamp);
    $query = "SELECT DATE_FORMAT(_date,'%Y%m%d'),open,high,low,close,volume FROM eod_data WHERE ticker='$ticker' AND _date>'$first_session_to_fetch' AND (_date<'$first_cached_timestamp' OR _date>='$last_cached_timestamp') ORDER BY _date ASC";
}

$result = mysql_query($query) or die("Query ERROR");
$row_number  =0;
while($row = mysql_fetch_row($result))
{
        if($row_number == 0)
            echo "<DTYYYYMMDD>,<OPEN>,<HIGH>,<LOW>,<CLOSE>,<VOL>\n";
        $row_number++;
        
	$date = $row[0];
	$o = $row[1];
	$h = $row[2];
	$l = $row[3];
	$c = $row[4];
	$v = $row[5];

	echo "$date,$o,$h,$l,$c,$v\n";
}
mysql_free_result($result);

</script>