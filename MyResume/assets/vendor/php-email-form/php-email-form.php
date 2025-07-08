<?php
class PHP_Email_Form {
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $smtp;
  public $ajax = false;
  private $messages = [];

  public function add_message($content, $label = '', $length = 0) {
    $this->messages[] = "$label: $content\n";
  }

  public function send() {
    $email_content = implode("\n", $this->messages);
    $headers = "From: $this->from_name <$this->from_email>\r\n";
    $headers .= "Reply-To: $this->from_email\r\n";

    if (mail($this->to, $this->subject, $email_content, $headers)) {
      return $this->ajax ? 'OK' : true;
    } else {
      return $this->ajax ? 'FAILED' : false;
    }
  }
}
?>
