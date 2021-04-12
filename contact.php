<?php
if(isset($_POST['submit'])) {
    $name = strip_tags(trim($_POST['name']));
    $emailto = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = $_POST['message'];
    $subject = "New contact from $name";

    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: https://anthonystanton.github.io/Computers4U/index.php?success=-1#form");
        exit;
    }

    $message_content = "Hi there $name, \r\n";
    $message_content .= "We received the following message from you: \r\n";
    $message_content .= "$message";

    $email_from = 'anthonystanton@gmail.com';

    $email_headers = "From: $name <$email_from>";

    mail($emailto,$subject,$message, $headers);

    header("Location: https://anthonystanton.github.io/Computers4U/index.php?success=1#form");

}
?>