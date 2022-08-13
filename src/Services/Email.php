<?php

namespace Levelup\App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Email {

  public function send($message) {

      $phpmailer = new PHPMailer();
      $phpmailer->isSMTP();
      $phpmailer->Host = 'smtp.mailtrap.io';
      $phpmailer->SMTPAuth = true;
      $phpmailer->Port = 2525;
      $phpmailer->Username = '1871c3cd9b1df0';
      $phpmailer->Password = '8a934139877113';

      $phpmailer->From = "nevena@gmail.com";
      $phpmailer->FromName = $_POST['name'];
      $phpmailer->addAddress("alex@gmail.com", "Aleksandar");
      $phpmailer->isHTML(false);
      $phpmailer->Body = $_POST['message'];

      $phpmailer->send();
  
    }

  }
