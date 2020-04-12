<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';

// require ReCaptcha class
require 'vendor/google/recaptcha/src/autoload.php';


class Contact extends CI_Controller
{

  public function __construct(){
    parent::__construct();
    $this->load->model("SitesModel");
    // $this->load->library('email');
  }

  public function contact() {
     
    $name = $this->input->post("name");
    $email = $this->input->post("email");
    $msg = $this->input->post("message");
    $g_recaptcha_response = $this->input->post("g-recaptcha-response");

    try {
      // validate the ReCaptcha, if something is wrong, we throw an Exception,
      // i.e. code stops executing and goes to catch() block
      if (!$g_recaptcha_response) {
          throw new \Exception('ReCaptcha is not set.');
      }

      // do not forget to enter your secret key from https://www.google.com/recaptcha/admin
      $recaptcha = new \ReCaptcha\ReCaptcha(RECAPTCHA_SECRET);
      
      // we validate the ReCaptcha field together with the user's IP address
      $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

      if (!$response->isSuccess()) {
          throw new \Exception('ReCaptcha was not validated.');
      }

      if (!empty($name) && !empty($email) && !empty($msg)) {
        $this->SitesModel->addMessage($name, $email, $msg);
        $responseArray = array('type' => 'success', 'message' => "Thank you, I will get back to you soon!");
      } else{
        $responseArray = array('type' => 'danger', 'message' => "Please fill all the fields!");

      }
    } catch (Exception $ex) {
      $responseArray = array('type' => 'danger', 'message' => "Something went wrong!");

    }

    header('Content-Type: application/json');
    echo json_encode($responseArray);
  }

  private function contactMail() {
    $name = $this->input->post("name");
    $email = $this->input->post("email");
    $msg = $this->input->post("message");
    try{
      if (!empty($email)) {
        $config['protocol'] = array();
        $config['protocol'] = "smtp";
        $config['smtp_crypto']  = "ssl";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = TO_MAIL;
        $config['smtp_pass'] = "****";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $message = '';
        $bodyMsg = '<p style="font-size:14px;font-weight:normal;margin-bottom:10px;margin-top:0;">'.$msg.'</p>';
        $delimeter = $name."<br>";
        $dataMail = array('topMsg'=>'Hi Brian', 'bodyMsg'=>$bodyMsg, 'thanksMsg'=>'Best regards,', 'delimeter'=> $delimeter);

        $this->email->initialize($config);
        $this->email->from($email, $name);
        $this->email->to(TO_MAIL);
        $this->email->subject('Contact Form');
        $message = $this->load->view('templates/mailContact', $dataMail, true);
        $this->email->message($message);
        $this->email->send();
        echo $this->email->print_debugger();


        // confirm mail
        $bodyMsg = '<p style="font-size:14px;font-weight:normal;margin-bottom:10px;margin-top:0;">Thank you for contacting us.</p>';
        $dataMail = array('topMsg'=>'Hi '.$name, 'bodyMsg'=>$bodyMsg, 'thanksMsg'=>'Best regards,', 'delimeter'=> 'Brian Magario');

        $this->email->initialize($config);
        $this->email->from(TO_MAIL);
        $this->email->to($email);
        $this->email->subject('Contact Form Confimation');
        $message = $this->load->view('templates/mailContact', $dataMail, true);
        $this->email->message($message);
        $this->email->send();
     }
    } catch(Exception $ex){
      var_dump($ex);
    }
  }

  private function sendContact(){
    $mail = new PHPMailer(true);                            // Passing `true` enables exceptions
    try {
      //Server settings
      $mail->SMTPDebug = 2;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = '******@gmail.com';          // SMTP username
      $mail->Password = '****';                     // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom(TO_MAIL, 'Brian');
      $mail->addAddress(TO_MAIL, 'Test');                   // Add a recipient

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Here is the subject';
      $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
  }

}
