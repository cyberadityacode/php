<!-- 
 Send notifications to users via different channels
  (Email, SMS, Push). Each method follows a common structure, 
  but has its own logic.
 -->
<?php

// Step 1 - Create the Interface
interface Notifier
{
    public function send(string $recepient, string $message);
}
// Step 2: Create Different Notification Classes

class EmailNotifier implements Notifier
{
    public function send(string $recepient, string $message)
    {
        echo "Email sent to $recepient: $message <br>";
    }
}
class PushNotifier implements Notifier
{
    public function send(string $recepient, string $message)
    {
        echo "Push Notification sent to $recepient: $message <br>";
    }
}

class WhatsappNotifier implements Notifier
{
    public function send(string $recepient, string $message)
    {
        echo "Whatsapp message Sent to $recepient: $message";
    }
}

// Step 3- Notification Service (Core Logic)

class NotificationService
{
    private $notifier;

    public function __construct(Notifier $notifier)
    {
        $this->notifier = $notifier;
    }
    public function notify($recepient, $message)
    {
        $this->notifier->send($recepient, $message);
    }
}

// Step 4 - Use the System

// Send Email
$email = new EmailNotifier();
$notifyByEmail = new NotificationService($email);
$notifyByEmail->notify("adityadubey793@gmail.com", "Congratulations!!");


// Send push notification
$push = new PushNotifier();
$notifyByPush = new NotificationService($push);
$notifyByPush->notify("cyberaditya", "You have a new Message");

// Send Whatsapp

$whatsapp = new WhatsappNotifier();
$notifyByWhatsapp = new NotificationService($whatsapp);
$notifyByWhatsapp->notify("6264599267", "Great Work Aditya");

