<?php
/**
 * Written by Fadi Nicolas Zahhar
 * Ajax calls for wordpress theme
 * Eastlinemarketing 2014
 **/
//print_r($_POST);
//session_start();
if(isset($_POST['code']) && ($_POST['code']=="#@$%#@$%#@$%") && isset($_POST['fullname'])) {
//if(!defined('WP_PLUGIN_URL')) {
    require_once(realpath('../../../') . '/wp-config.php');
//}
global $theme_options;
global $wpdb;
global $session;
//print_r($_POST);
//print_r($session);
$fullname = sanitize_text_field($_POST['fullname']);
$email = sanitize_text_field($_POST['email']);
$country = sanitize_text_field($_POST['country']);
$mobile = sanitize_text_field($_POST['mobile']);
$address = sanitize_text_field($_POST['address']);
$desiredjob = sanitize_text_field($_POST['desiredjob']);
$years = sanitize_text_field($_POST['years']);
$salary = sanitize_text_field($_POST['salary']);
$attached = explode(',',$_POST["filename"]);
//echo $_POST["filename"] . "here"; exit;

$filename = '' ;
 			foreach($attached as $index => $att) {
 		 				$filename .= '<br/>CV: ' . $index . ' <a href="'.get_template_directory_uri() .'/career/php/files/' . $att.'" target="_blank"> downlaod ' . $att .'</a>';
 			}
$adminemail = get_option('admin_email');
$yourmsg = "Applicant Name:" . $fullname . "<br/>" .  "Email:" . $email. "<br/>" . "Country:" . $country . "<br/>" . "mobile:" . $mobile. "<br/>" ."Address:" . $address. "<br/>" . "Desired Job:" . $desiredjob . "<br/>" . "Years Of Experience:" . $years . "<br/>" . "Salary:" . $salary ."<br/>" . $filename;
$headers[] = "Content-type: text/html";
$headers[] = 'From:' . $fullname . ' <'.$email.'>';
//$headers[] = 'Cc: iluvwp@wordpress.org'; // note you can just use a simple email address
$subject = "SEG - Career Form from ". $fullname;
$wpdb->insert( 'wp_careers', array( 'fullname' => $fullname, 'email' => $email, 'country' => $country, 'mobile' => $mobile,'address'=>$address,'desiredjob'=>$desiredjob,'years'=>$years,'Salary'=>$salary, 'filename' => $filename) );
wp_mail( $adminemail, $subject, $yourmsg, $headers );
//print_r($_POST);
$arr = array ('message'=>'Thank you for submitting your request, we will get back to you in 48 hours');
header('Content-type: application/json');
echo json_encode($arr);
}
else {
$arr = array ('message'=>'You can not access this code , it is secure');
header('Content-type: application/json');
echo json_encode($arr);
}
