<?php
/*
 * Written by Fadi Nicolas Zahhar
 * Ajax calls for wordpress theme
 * Eastlinemarketing 2014
 */
//print_r($_POST);
//session_start();
if(isset($_POST['code']) && ($_POST['code']=="#@$%#@$%#@$%") && isset($_POST['fullname']) && isset($_POST['mobile']) && isset($_POST['email']) && isset($_POST['message'])) {
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
$subject = sanitize_text_field($_POST['subject']);
$mobile = sanitize_text_field($_POST['mobile']);
$region = sanitize_text_field($_POST['region']);
$adminemail = get_option('admin_email');
$subject = "SEG - Contact Us from ". $fullname;
$yourmsg = "Applicant Name:" . $fullname . "<br/>" .  "Email:" . $email. "<br/>" . "Subject:" . $subject . ", " . sanitize_text_field($_POST['subject']) . "<br/>" . "mobile:" . $mobile. "<br/>" ."Region:" . $region. "<br/>" . "Message:" . sanitize_text_field($_POST['message']);
$headers[] = "Content-type: text/html";
$headers[] = 'From:' . $fullname . ' <'.$email.'>';
//$headers[] = 'Cc: iluvwp@wordpress.org'; // note you can just use a simple email address

$wpdb->insert( 'wp_contactus', array( 'fullname' => $fullname, 'email' => $email, 'subject' => $subject . ":" . sanitize_text_field($_POST['subject']), 'mobile' => $mobile,'region'=>$region,'message' => sanitize_text_field($_POST['message'])) );
wp_mail($adminemail, $subject, $yourmsg, $headers );
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
