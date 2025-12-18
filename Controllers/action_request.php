<?php
session_start();
include "../Model/request.php";
$request = new Request();

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST["submit"])) {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $homeCity = $_POST["homeCity"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $petExperience = $_POST["petExperience"];
        $message = $_POST["message"];
        $pet_id = $_POST["pet_id"];

        $result_add = $request->addRequest($firstName, $lastName, $homeCity, $email, $contact, $petExperience, $message, $pet_id);

        if ($result_add) {
            session_start();
            $_SESSION['ref_number'] = $result_add;
            header("Location: ../View/CompleteSection.php?submitted=1");
            exit();
        }
    } else if (isset($_POST["approve-request"])) {
        $request_id = $_POST['request_id'];
        $pet_id = $_POST['pet_id'];
        $petName = $_POST['petName'];
        $ref_number = $_POST['ref_number'];
        $email = $_POST['email'];
        $fullName = $_POST['fullName'];

        $approveRequest = $request->approveRequest($request_id, $pet_id);

        if ($approveRequest) {
            $subject = "Pet Adoption: Request Approved Notification";
            $message = "Dear $fullName,\n\nWe are pleased to inform you that your adoption request for $petName has been approved.\n\nReference Number: $ref_number\n\nPlease visit the adoption center to proceed with the adoption.\n\nThank you,\nHappy Paws Team";
            // Send email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'amandasmurf21@gmail.com';
                $mail->Password = 'pvdheeymsvdhlncm'; // Your app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('amandasmurf21@gmail.com', 'Happy Paws Team');
                $mail->addAddress($email, $fullName);
                $mail->isHTML(false);
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();

                header("Location: ../View/AdminAdoptionRequests.php");
                exit();
            } catch (Exception $e) {
                echo "❌ Email failed. Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Failed to approve request. Please try again.";
        }
    } else if (isset($_POST["reject-request"])) {
        $request_id = $_POST['request_id'];
        $petName = $_POST['petName'];
        $email = $_POST['email'];
        $fullName = $_POST['fullName'];

        $rejectRequest = $request->rejectRequest($request_id);

        if ($rejectRequest) {
            $subject = "Pet Adoption Request Update";
            $message = "Dear $fullName,\n\n"
                . "Thank you for your interest in adopting a pet from our adoption center.\n\n"
                . "After careful review, we regret to inform you that your adoption request for **$petName** has been declined at this time.\n\n"
                . "This decision may be due to availability, eligibility requirements, or other considerations. We encourage you to continue exploring other pets available for adoption, as new pets are added regularly.\n\n"
                . "If you have any questions or would like more information, feel free to contact our team.\n\n"
                . "Thank you for your understanding and continued interest in giving a pet a loving home.\n\n"
                . "Sincerely,\n"
                . "Pet Adoption Team";

            // Send email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'amandasmurf21@gmail.com';
                $mail->Password = 'pvdheeymsvdhlncm'; // App password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('amandasmurf21@gmail.com', 'Pet Adoption Team');
                $mail->addAddress($email, $fullName);
                $mail->isHTML(false);
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();

                header("Location: ../View/AdminAdoptionRequests.php");
                exit();
            } catch (Exception $e) {
                echo "❌ Email failed. Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Failed to reject the adoption request. Please try again.";
        }
    } else if (isset($_POST['mark_adopted'])) {
        $request_id = $_POST['request_id'];
        $pet_id = $_POST['pet_id'];

        $result = $request->markAsAdopted($request_id, $pet_id);

        if ($result) {
            header("Location: ../View/AdminAdoptionRequests.php");
        }
    }
}
