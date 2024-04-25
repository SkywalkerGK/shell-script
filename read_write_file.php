<?php
//Connect to MySQL
$servername = '10.11.30.59';
$username = 'rootusersuper';
$password = 'c96HY$jv';
$dbname = 'reconcile';

$conn = mysqli_connect($servername, $username, $password, $dbname);

$filename = '/home/sorawit.sa/reconcile/csv/user_uso.txt';  // Replace with CSV file name

$lines = array();
	$fp = fopen($filename, "r");
	if(filesize($filename) > 0){
    	$content = fread($fp, filesize($filename));
    	$lines = explode(",", $content);
    	//print_r($lines);
    	fclose($fp);
	}
//input user uso มีทั้งหมด 9613 คน
$total_user_1 = 1950;
$total_user_2 = 3900;
$total_user_3 = 5850;
$total_user_4 = 7800;
$total_user_5 = 9612;
$all_user_1 = '(';
$all_user_2 = '(';
$all_user_3 = '(';
$all_user_4 = '(';
$all_user_5 = '(';

for($i=0;$i<=$total_user_1;$i++){
    //echo $lines[$i];
    //$user_uso[] = $lines[$i];
    if($i < $total_user_1){
        $all_user_1 .= $lines[$i].',';
    }
    elseif(($i == $total_user_1)){
        $all_user_1 .= $lines[$i].')';
    }
}
for($i=1951;$i<=$total_user_2;$i++){
    if($i < $total_user_2){
        $all_user_2 .= $lines[$i].',';
    }
    elseif(($i == $total_user_2)){
        $all_user_2 .= $lines[$i].')';
    }
}
for($i=3901;$i<=$total_user_3;$i++){
    if($i < $total_user_3){
        $all_user_3 .= $lines[$i].',';
    }
    elseif(($i == $total_user_3)){
        $all_user_3 .= $lines[$i].')';
    }
}
for($i=5851;$i<=$total_user_4;$i++){
    if($i < $total_user_4){
        $all_user_4 .= $lines[$i].',';
    }
    elseif(($i == $total_user_4)){
        $all_user_4 .= $lines[$i].')';
    }
}
for($i=7801;$i<=$total_user_5;$i++){
    if($i < $total_user_5){
        $all_user_5 .= $lines[$i].',';
    }
    elseif(($i == $total_user_5)){
        $all_user_5 .= $lines[$i].')';
    }
}

//echo $all_user_1;
//$time = date('Y-m-d',strtotime('-1 day'));
//date_default_timezone_set("Asia/Bangkok");
$time = date('Y-m-d');
echo $time;
    $csv_file = '/home/sorawit.sa/reconcile/csv/user_uso_'.$time.'.csv';
    $file = fopen($csv_file, 'w');
    // เขียน header ในไฟล์ CSV
    fputcsv($file, array('DATEOPER', 'USERNAME', 'DOWNLOAD'));
    /////// Query 1 - 5
    $sql = mysqli_query($conn, "select DATE_FORMAT(DATEOPER,'%Y-%m-%d') AS DATEOPER, USERNAME,
    round(DOWNLOAD/power(1024,3),2) as DOWNLOAD_GB
    FROM reconcile where USERNAME In $all_user_1
    #and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '2024-02-02';
    and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '$time';");
      while ($result = mysqli_fetch_array($sql)) {
        fputcsv($file, array($result["DATEOPER"], $result["USERNAME"], $result["DOWNLOAD_GB"]));
      }
    $sql = mysqli_query($conn, "select DATE_FORMAT(DATEOPER,'%Y-%m-%d') AS DATEOPER, USERNAME,
    round(DOWNLOAD/power(1024,3),2) as DOWNLOAD_GB
    FROM reconcile where USERNAME In $all_user_2
    #and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '2024-02-02';
    and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '$time';");
      while ($result = mysqli_fetch_array($sql)) {
        fputcsv($file, array($result["DATEOPER"], $result["USERNAME"], $result["DOWNLOAD_GB"]));
      }
        $sql = mysqli_query($conn, "select DATE_FORMAT(DATEOPER,'%Y-%m-%d') AS DATEOPER, USERNAME,
    round(DOWNLOAD/power(1024,3),2) as DOWNLOAD_GB
    FROM reconcile where USERNAME In $all_user_3
    #and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '2024-02-02';
    and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '$time';");
      while ($result = mysqli_fetch_array($sql)) {
        fputcsv($file, array($result["DATEOPER"], $result["USERNAME"], $result["DOWNLOAD_GB"]));
      }
        $sql = mysqli_query($conn, "select DATE_FORMAT(DATEOPER,'%Y-%m-%d') AS DATEOPER, USERNAME,
    round(DOWNLOAD/power(1024,3),2) as DOWNLOAD_GB
    FROM reconcile where USERNAME In $all_user_4
    #and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '2024-02-02';
    and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '$time';");
      while ($result = mysqli_fetch_array($sql)) {
        fputcsv($file, array($result["DATEOPER"], $result["USERNAME"], $result["DOWNLOAD_GB"]));
      }
          $sql = mysqli_query($conn, "select DATE_FORMAT(DATEOPER,'%Y-%m-%d') AS DATEOPER, USERNAME,
    round(DOWNLOAD/power(1024,3),2) as DOWNLOAD_GB
    FROM reconcile where USERNAME In $all_user_5
    #and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '2024-02-02';
    and DATE_FORMAT(DATEOPER,'%Y-%m-%d') = '$time';");
      while ($result = mysqli_fetch_array($sql)) {
        fputcsv($file, array($result["DATEOPER"], $result["USERNAME"], $result["DOWNLOAD_GB"]));
      }

?>
