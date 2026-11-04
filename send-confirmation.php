<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/**
 * Form values provided by process.php.
 *
 * @var string $name
 * @var string $email
 * @var string $address
 * @var string $city
 * @var string $zip
 * @var string $country
 */

require_once __DIR__ . "/PHPMailer/src/Exception.php";
require_once __DIR__ . "/PHPMailer/src/PHPMailer.php";
require_once __DIR__ . "/PHPMailer/src/SMTP.php";

$config = require __DIR__ . "/mail-config.php";

$mail = new PHPMailer(true);
$emailSent = false;

try {
    // Connect to Gmail.
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $config["email"];
    $mail->Password = $config["password"];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = "UTF-8";

    // Send from Sunny Socks to the customer.
    $mail->setFrom($config["email"], "Sunny Socks");
    $mail->addAddress($email, $name);
    $mail->addReplyTo($config["email"], "Sunny Socks");

    // Make the customer's details safe for HTML.
    $safeName = htmlspecialchars($name, ENT_QUOTES, "UTF-8");
    $safeAddress = htmlspecialchars($address, ENT_QUOTES, "UTF-8");
    $safeCity = htmlspecialchars($city, ENT_QUOTES, "UTF-8");
    $safeZip = htmlspecialchars($zip, ENT_QUOTES, "UTF-8");
    $safeCountry = htmlspecialchars($country, ENT_QUOTES, "UTF-8");
    $safeEmail = htmlspecialchars($email, ENT_QUOTES, "UTF-8");

    $mail->isHTML(true);
    $mail->Subject = "Thanks for your order — Sunny Socks";

    // Email styling is written directly on the HTML elements.
    $mail->Body = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Sunny Socks order</title>
</head>
<body style="margin:0; padding:0; background-color:#fff4df;
             font-family:Arial,sans-serif; color:#2d2d2d;">

<table role="presentation" width="100%" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center" style="padding:32px 16px;">

            <table role="presentation" width="100%" cellspacing="0"
                   cellpadding="0"
                   style="max-width:600px; background-color:#d6f5e6;
                          border:2px solid #ffb39d; border-radius:24px;">

                <tr>
                    <td align="center"
                        style="padding:36px 24px 16px;
                               color:#1c4478; font-size:30px;
                               font-weight:bold;">
                        SUNNY SOCKS ☀
                    </td>
                </tr>

                <tr>
                    <td align="center"
                        style="padding:12px 24px; color:#ff5b35;
                               font-size:13px; font-weight:bold;
                               letter-spacing:3px;">
                        ORDER RECEIVED
                    </td>
                </tr>

                <tr>
                    <td align="center" style="padding:12px 24px;">
                        <h1 style="margin:0; color:#1c4478;
                                   font-size:28px; line-height:1.3;">
                            Thanks, {$safeName}!
                        </h1>

                        <p style="margin:18px 0 0; font-size:16px;
                                  line-height:1.7;">
                            Your next step just got sunnier.
                            Thanks for choosing Sunny Socks!
                        </p>

                        <p style="margin:12px 0 0; font-size:16px;
                                  line-height:1.7;">
                            We’ve received your order details.
                            Here’s your delivery information:
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding:20px 24px;">
                        <table role="presentation" width="100%"
                               cellspacing="0" cellpadding="0"
                               style="background-color:#fff8f0;
                                      border:1px solid #ffe0d6;
                                      border-radius:16px;">
                            <tr>
                                <td style="padding:24px;">
                                    <h2 style="margin:0 0 14px;
                                               color:#777777;
                                               font-size:13px;
                                               letter-spacing:2px;">
                                        DELIVERY ADDRESS
                                    </h2>

                                    <p style="margin:0; font-size:16px;
                                              line-height:1.8;">
                                        {$safeName}<br>
                                        {$safeAddress}<br>
                                        {$safeZip} {$safeCity}<br>
                                        {$safeCountry}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center"
                        style="padding:4px 24px 28px; font-size:14px;
                               line-height:1.8;">
                        Questions about your order?
                        Just reply to this email.<br>
                        Your contact email: {$safeEmail}
                    </td>
                </tr>

                <tr>
                    <td align="center"
                        style="padding:24px; border-top:1px solid #bce6d5;
                               color:#1c4478; font-size:14px;
                               line-height:1.8;">
                        A little comfort. A little colour. A lot of sunshine.<br>
                        <strong>The Sunny Socks Team</strong>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>
HTML;

    // Plain-text version for email apps that do not display HTML.
    $mail->AltBody =
        "Thanks, $name!\n\n" .
        "We've received your Sunny Socks order details.\n\n" .
        "DELIVERY ADDRESS\n" .
        "$name\n$address\n$zip $city\n$country\n\n" .
        "Questions about your order? Just reply to this email.\n\n" .
        "Have a sunny day!\nThe Sunny Socks Team";

    $mail->send();
    $emailSent = true;

} catch (Exception $e) {
    // Keep technical details out of the customer's confirmation page.
    error_log("Sunny Socks email failed: " . $mail->ErrorInfo);
}