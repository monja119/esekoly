<?php
require('../models/Database.php');
session_start();
if(isset($_POST['envoyer'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['feedback_email'];
    $message = $_POST['message'];

    $database = new Database('localhost', 'root', '', 'esekoly');

    $conn = $database->getConnection();

    $sql = "INSERT INTO feedback (name, subject, feedback_email, message) VALUES (:name, :subject, :feedback_email, :message)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':feedback_email', $feedback_email);
    $stmt->bindParam(':message', $message);

    $stmt->execute();

    echo "Votre message a été posté.";
}
?>
