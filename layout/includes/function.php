<?php
include_once('library/mobile_detect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Razorpay\Api\Api;

$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

function SendMail($email, $content)
{
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail = new PHPMailer();
        //$mail->SMTPDebug = true;
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port = 465;
        $mail->Host = "ssl://smtp.hostinger.com";
        $mail->Username = "daksh_properties@99properties.in";
        $mail->Password = "Daksh_properties@99";

        $mail->setFrom('daksh_properties@99properties.in', 'Team Daksh Properties');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Daksh Properties!';
        $mail->Body = $content;

        $result = $mail->send();		
		return $result;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function escapeString($str){
	global $mysql_connection;
	$str = mysqli_real_escape_string($mysql_connection , $str);
	return $str;
}
function getAffectedRowCount($sql){
    global $mysql_connection;
    $query = mysqli_query($mysql_connection, $sql);
    return mysqli_num_rows($query);
}
function executeQuery($sql){
    global $mysql_connection;
    return mysqli_query($mysql_connection, $sql);
}
function executeInsert($table, $data, $onduplicatekey = array()){
	global $mysql_connection;
    $dataStr = '';
    if (strlen($table) > 0){
        $dataStr = 'INSERT INTO '.$table;
        if (count($data) > 0){
            $datarow = '';
            foreach ($data as $key => $value){
                $datarow.="{$key} = '{$value}',";
            }
            $datarownew = substr($datarow, 0, -1);
            $dataStr = $dataStr.' SET '.$datarownew;
        }
        if (count($onduplicatekey) > 0){
            foreach ($onduplicatekey as $dkey => $dvalue){
                $duplicaterow.="{$dkey} = '{$dvalue}',";
            }
            $duplicaterownew = substr($duplicaterow, 0, -1);
            $dataStr = $dataStr.' ON DUPLICATE KEY UPDATE '.$duplicaterownew;
        }
    }
    mysqli_query($mysql_connection, $dataStr);
    $result = mysqli_insert_id($mysql_connection);
    return $result;
}
function executeUpdate($table, $data, $clause){
	global $mysql_connection;
    $dataStr = '';
    if (strlen($table) > 0){
        if (count($data) > 0){
            $datarow = '';
            foreach ($data as $key => $value){
                $datarow.="{$key} = '{$value}',";
            }
            $datarownew = substr($datarow, 0, -1);
            $dataStr = $dataStr.$datarownew;
        }
    }
    $row_clause = '';
    $clause_array = array();
    if (strlen($table) > 0){
        if(count($clause) > 0){
            foreach ($clause as $key => $value){
                $row_clause ="{$key} = '{$value}'";
                array_push($clause_array, $row_clause);
            }
            $clausenew = implode(" AND " ,$clause_array);
        }
    }
    $result = mysqli_query($mysql_connection, "UPDATE {$table} SET {$dataStr} WHERE {$clausenew}");
    return $result;
}
function executeSelect($table, $data = array(), $clause = array(), $orderby = "", $limit = array()) {
	global $mysql_connection;
    $dataStr = 'SELECT';
    $datanew = '';
    if (strlen($table) > 0){
        if (count($data) > 0){
            foreach ($data as $key => $value){
                $datanew.=" {$value},";
            }
            $datan = substr($datanew, 0, -1);
            $dataStr = $dataStr.$datan;
        }else{
            $dataStr = $dataStr.' * ' ;
        }
        $dataStr = $dataStr.' FROM '.$table ;
        $row_clause = '';
        $clause_array = array();
        if(count($clause) > 0){
            foreach ($clause as $key => $value){
                $row_clause ="{$key}='{$value}'";
                array_push($clause_array, $row_clause);
            }
            $clausenew = implode(" AND " ,$clause_array);
            
            $dataStr = $dataStr.' WHERE '.$clausenew;
        }
        if(strlen($orderby) > 0){
            $dataStr = $dataStr.' ORDER BY '.$orderby;
        }
        if(count($limit) > 0){
            foreach($limit as $key => $value){
                $datalimit.=" {$value},";
            }
            $datalimit = substr($datalimit, 0, -1);
            
            $dataStr = $dataStr.' LIMIT '.$datalimit;
        }
    }
    $report = mysqli_query($mysql_connection, $dataStr);
    $result = array();
    while($queryreturn = mysqli_fetch_assoc($report)){
        $result[] = $queryreturn;
    }
    return $result;
}
function executeSelectSingle($table_name, $fields = array(), $conditions = array(), $orderby = ""){
	global $mysql_connection;
    $data = array();
    if(strlen($table_name) > 0){
        $sql = "";
        if(count($fields) > 0){
            $sql .= "SELECT " . implode(",", $fields) . " FROM " . $table_name;
        }else{
            $sql .= "SELECT * FROM " . $table_name;
        }
        $where = array();
        foreach($conditions as $key => $value){
            $where[] = $key . "='" .$value."'";
        }
        if(count($where) > 0){
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        if(strlen($orderby) > 0){
            $sql = $sql.' ORDER BY '.$orderby;
        }
        $sql .= " LIMIT 1";

        $query = mysqli_query($mysql_connection, $sql);
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);
        }
    }
    return $data;
}
function executeDelete($table, $clause){
    global $mysql_connection;
    $row_clause = '';
    $clause_array = array();
    if (strlen($table) > 0){
        if(count($clause) > 0){
            foreach ($clause as $key => $value){
                $row_clause ="{$key} = '{$value}'";
                array_push($clause_array, $row_clause);
            }
            $clausenew = implode(" AND " ,$clause_array);
        }
    }
   $result = mysqli_query($mysql_connection, "DELETE FROM {$table} WHERE {$clausenew}");

   return $result;
}
function executeTruncate($table){
    global $mysql_connection;
    if (strlen($table) > 0){
        $result = mysqli_query($mysql_connection, "TRUNCATE TABLE ".$table);
        return $result;
    }else{
        return false;
    }
}
function getResultAsArray($sql){
	global $mysql_connection;
    $row = array();
    $query = mysqli_query($mysql_connection, $sql);
    if(mysqli_num_rows($query) > 0){
        while($result = mysqli_fetch_assoc($query)){
            $row[] = $result;
        }
    }
    return $row;
}
function executeQueryToArray($res){
    $result = array();
    if (mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            $result[] = $row;
        }
    }
    return $result;
}
// function add_admin_log($action,$url){
//     $insert_log = array(
//         'admin_id' => $_SESSION['id'],
//         'cat_id' => $_SESSION['cat_id'],
//         'action_performed' => $action,
//         'page_url' => $url,
//         'date_added' => date("Y-m-d H:i:s"),
//       );
//       $insert = executeInsert('admin_log', $insert_log);
// }
// function add_otp_log($action,$url,$email){
//     $admin = executeSelectSingle('admin', array(), array('email' => $email)); 
//     $insert_log = array(
//         'admin_id' => isset($admin['id'])?$admin['id']:0,
//         'cat_id' => isset($admin['cat_id'])?$admin['cat_id']:0,
//         'action_performed' => $action,
//         'page_url' => $url,
//         'date_added' => date("Y-m-d H:i:s"),
//       );
//       $insert = executeInsert('admin_log', $insert_log);
// }
// function add_otp_phone_log($action,$url,$phone){
//     $admin = executeSelectSingle('admin', array(), array('phone' => $phone)); 
//     $insert_log = array(
//         'admin_id' => isset($admin['id'])?$admin['id']:0,
//         'cat_id' => isset($admin['cat_id'])?$admin['cat_id']:0,
//         'action_performed' => $action,
//         'page_url' => $url,
//         'date_added' => date("Y-m-d H:i:s"),
//       );
//       $insert = executeInsert('admin_log', $insert_log);
// }
// function update_location(){
//     $ip = '';
//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     } else {
//         $ip = $_SERVER['REMOTE_ADDR']; 
//     }
    
//     $ip_val = curl_init('http://ipwhois.app/json/'.$ip);
//     curl_setopt($ip_val, CURLOPT_RETURNTRANSFER, true);
//     $json = curl_exec($ip_val);
//     curl_close($ip_val);

//     // Decode JSON response
//     $ip_result = json_decode($json, true);
//     //echo "<pre>";
//     //print_r($ip_result);
//     $ip_result = Array ( 'ip' => '157.35.85.3' ,'success' => '1' ,'type' => 'IPv4' ,'continent' => 'Asia' ,'continent_code' => 'AS' ,'country' => 'India' ,'country_code' => 'IN' ,'country_flag' => 'https://cdn.ipwhois.io/flags/in.svg' ,'country_capital' => 'New Delhi' ,'country_phone' => '+91' ,'country_neighbours' => 'BD,BT,CN,MM,NP,PK' ,'region' => 'Bihar' ,'city' => 'Patna' ,'latitude' => '25.5940947' ,'longitude' => '85.1375645' ,'asn' => 'AS55836' ,'org' => 'Reliance Jio Infocomm Limited' ,'isp' => 'Reliance Jio Infocomm Limited' ,'timezone' => 'Asia/Calcutta' ,'timezone_name' => 'IST' ,'timezone_dstOffset' => '0' ,'timezone_gmtOffset' => '19800' ,'timezone_gmt' => '+05:30' ,'currency' => 'Indian Rupee' ,'currency_code' => 'INR' ,'currency_symbol' => '₹' ,'currency_rates' => '82.773' ,'currency_plural' => 'Indian rupees' );
//     $json = '{"ip":"157.35.80.63","success":true,"type":"IPv4","continent":"Asia","continent_code":"AS","country":"India","country_code":"IN","country_flag":"https:\/\/cdn.ipwhois.io\/flags\/in.svg","country_capital":"New Delhi","country_phone":"+91","country_neighbours":"BD,BT,CN,MM,NP,PK","region":"Maharashtra","city":"Aurangabad","latitude":19.8761653,"longitude":75.3433139,"asn":"AS55836","org":"Reliance Jio Infocomm Limited","isp":"Reliance Jio Infocomm Limited","timezone":"Asia\/Calcutta","timezone_name":"IST","timezone_dstOffset":0,"timezone_gmtOffset":19800,"timezone_gmt":"+05:30","currency":"Indian Rupee","currency_code":"INR","currency_symbol":"\u20b9","currency_rates":82.773,"currency_plural":"Indian rupees"}';
//     // $insert_location = array(
//     //     'admin_id' => $_SESSION['id'],
//     //     'data' => $json,
//     //     'date_added' => date("Y-m-d H:i:s"),
//     // );
//     // executeInsert('location_track', $insert_location);
//     $id = $_SESSION['id'];
//     $sql ="INSERT INTO location_track (`admin_id`,`data`,`date_added`,`date_modified`) VALUES ($id,'".$json."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."') ON DUPLICATE KEY UPDATE data='".$json."',date_modified='".date("Y-m-d H:i:s")."'";
//     //echo $sql; die();
//     executeQuery($sql);
    
// }
?>