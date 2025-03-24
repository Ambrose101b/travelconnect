<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email" name="email" placeholder="email address" class="form-control" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="reset-button" class="btn btn-lg btn-primary btn-block">Reset Password</button>
                                    </div>
                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to send OTP via email
        function sendOTP(email, otp) {
            // Make an AJAX request to your server-side script to send the OTP via email
            // Replace the URL with the actual URL of your server-side script
            const url = 'your-server-script-url.php';

            // Data to be sent to the server
            const data = {
                email: email,
                otp: otp
            };

            fetch(url, {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    alert("An OTP has been sent to your email. Please check your email for the OTP.");
                } else {
                    alert("Failed to send OTP. Please try again later.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Failed to send OTP. Please try again later.");
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            const resetButton = document.getElementById("reset-button");

            resetButton.addEventListener("click", function () {
                const emailInput = document.getElementById("email");
                const email = emailInput.value;

                // Generate a random OTP
                const otp = generateOTP();

                // Send the OTP via email
                sendOTP(email, otp);
            });
        });
    </script>
</body>
</html>
