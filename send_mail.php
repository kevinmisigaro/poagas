<?php

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create the Transport
    $transport = new Swift_SmtpTransport('mail.poagas.co.tz', 465, 'tls');
    $transport->setUsername('contact@poagas.co.tz');
    $transport->setPassword('CC_2g87Ny3!u.xJ');

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    $mail_body = "<html><body>";
    $mail_body .= "<h2>New Message from contact page</h2>";
    $mail_body .= "<p><strong>Name:</strong> $name</p>";
    $mail_body .= "<p><strong>Phone:</strong> $phone</p>";
    $mail_body .= "<p><strong>Email:</strong> $email</p>";
    $mail_body .= "</body></html>";

    // Create a message
    $message = new Swift_Message('Wonderful Subject');
    $message->setFrom(['contact@poagas.co.tz' => 'PoaGas']);
    $message->setTo([ $email => 'Receiver']);
    $message->setBody($mail_body);

    // Send the message
    $result = $mailer->send($message);

    if ($result) {
        header("Location: success.html");
    } else {
        echo "Failed to send email";
    }
} else {
    echo "Invalid request";
}
