<!-- PHP Task - Abstract Class: 
 Create an abstract EmailService with method sendEmail($to, $message)
  and implement it for SMTPService and SendGridService. -->

<?php

abstract class EmailService
{
    // Abstract method (must be implemented in child class)
    abstract public function sendEmail($to, $message);
}

/**
 * Implementation: SMTP
 *  */ 

class SMTPService extends EmailService
{
    public function sendEmail($to, $message)
    {
        // SMTP library used
        echo "Sending Email via SMTP to $to : $message";
    }
}

/**
 * Implementation SendGRID
 */

class SendGridService extends EmailService
{
    public function sendEmail($to, $message)
    {
        // SendGRID API call
        echo "Sending Email via SendGRID to $to : $message";
    }
}


// Example Usage

$smtp = new SMTPService();
$smtp->sendEmail("adityadubey793@gmail.com", "Hello From SMTP");

$sendGRID = new SendGridService();
$sendGRID->sendEmail("adityadubey793@gmail.com", "Hi from SENDGRID EMAIL");
