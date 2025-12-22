<?php

session_start();
$ref_number = isset($_SESSION['ref_number']) ? $_SESSION['ref_number'] : "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Request Submitted | Pet Adoption System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f9ff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .complete-section {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 50px 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid #e8f1ff;
            animation: fadeIn 0.8s ease-out;
        }

        .complete-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
        }

        .success-icon {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 40px;
            box-shadow: 0 5px 15px rgba(79, 172, 254, 0.3);
            animation: bounceIn 0.8s ease-out;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 32px;
            font-weight: 700;
            line-height: 1.2;
        }

        p {
            color: #546e7a;
            line-height: 1.6;
            margin-bottom: 18px;
            font-size: 17px;
        }

        .email-highlight,
        .ref-highlight {
            color: #3498db;
            font-weight: 600;
        }

        .ref-number-container {
            background-color: #f8fafd;
            border-radius: 10px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #4facfe;
            text-align: center;
        }

        .ref-number {
            font-family: 'Courier New', monospace;
            font-size: 22px;
            font-weight: 700;
            color: #2c3e50;
            letter-spacing: 1px;
            padding: 10px 20px;
            background-color: white;
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .btn {
            display: inline-block;
            background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 16px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 17px;
            margin-top: 15px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(79, 172, 254, 0.3);
            letter-spacing: 0.5px;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(79, 172, 254, 0.4);
        }

        .btn:active {
            transform: translateY(-1px);
        }

        .footer-note {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 15px;
            color: #7f8c8d;
        }

        .pet-decoration {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 30px;
        }

        .pet-icon {
            font-size: 28px;
            color: #4facfe;
            opacity: 0.7;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            60% {
                transform: scale(1.1);
                opacity: 1;
            }

            100% {
                transform: scale(1);
            }
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .complete-section {
                padding: 40px 25px;
            }

            h2 {
                font-size: 28px;
            }

            p {
                font-size: 16px;
            }

            .ref-number {
                font-size: 18px;
                padding: 8px 16px;
            }

            .btn {
                padding: 14px 30px;
                font-size: 16px;
            }
        }

        @media (max-width: 400px) {
            .complete-section {
                padding: 30px 20px;
            }

            h2 {
                font-size: 24px;
            }

            .success-icon {
                width: 70px;
                height: 70px;
                font-size: 36px;
            }
        }
    </style>
</head>

<body>
    <div class="complete-section">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>

        <h2>Adoption Request Submitted!</h2>

        <p>Thank you for your interest in adopting a pet. Your adoption request has been successfully submitted and is now being processed by our team.</p>

        <p>Please check your <strong class="email-highlight">email</strong> regularly for updates regarding your adoption application.</p>

        <div class="ref-number-container">
            <p>Your application reference number:</p>
            <div class="ref-number"><?php echo htmlspecialchars($ref_number); ?></div>
        </div>

        <p>Please save this reference number for future communication about your application.</p>

        <a href="/pet-adoption/" class="btn">
            <i class="fas fa-home"></i> Back to Homepage
        </a>

        <div class="footer-note">
            <p>If you don't receive an email within 24 hours, please check your spam folder or contact us at adoptions@petshelter.org</p>
        </div>

        <div class="pet-decoration">
            <div class="pet-icon"><i class="fas fa-paw"></i></div>
            <div class="pet-icon"><i class="fas fa-dog"></i></div>
            <div class="pet-icon"><i class="fas fa-cat"></i></div>
            <div class="pet-icon"><i class="fas fa-heart"></i></div>
        </div>
    </div>

    <script>
        // Add a subtle animation to the reference number
        const refNumber = document.querySelector('.ref-number');
        refNumber.addEventListener('mouseover', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'transform 0.3s';
        });

        refNumber.addEventListener('mouseout', function() {
            this.style.transform = 'scale(1)';
        });
    </script>
</body>

</html>