<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'travelconnect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform basic client-side validation
    if (empty($email) || empty($password)) {
        echo "Please enter both email and password.";
    } else {
        // Perform login verification
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];

            if (password_verify($password, $storedPassword)) {
                // Login successful
                $userName = $row['name'];
                $id = $row['id'];
                session_start();
                $_SESSION['id']=$id;
                
                header("Location: welcome.php");
                exit;
            } else {
                // Invalid password
                echo "<html>
                <head>
                <style>
                <link href='//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'/>
                .tybar{width: 100%;
    
                    margin: 0;
                    
                    height: 50px;
                    
                    display: table;
                    
                    font-size: 17px;
                    
                    line-height: 50px;
                    
                    font-weight: 600;
                    
                    -webkit-font-smoothing: antialiased;
                    
                    color: rgb(255, 255, 255);
                    
                        font-family: Ruda;
                    
                    border-color: rgb(255, 255, 255);
                    
                    background-color: #0e1032;
                    
                    box-shadow: 0 1px 3px 2px rgba(0,0,0,0.15);  
                    
                    text-align: center;}
                    
                    .tybar .bar-but{font-size: 17px;
                    
                    font-weight: bold;
                    
                    margin-left: 25px;
                    
                    background: #fff;
                    
                    padding: 5px;
                    
                    color: #fff;
                    
                    background-color: #f2132d;
                    
                    line-height: 1.05;
                    
                    padding: 4px 15px;
                    
                    cursor: pointer;
                    
                    text-decoration: none;
                    
                    border-radius: 3px;}
                    
                    .tybar .bar-but a{color:#fff;    text-decoration: none;}
                    
                    .tybar i {
                    
                    float: right;
                    
                    padding-right: 40px;
                    
                    cursor: pointer;
                    
                    line-height: 50px;
                    
                    }
                    
                    body{margin-top:-49.33px;}
                    
                    body{margin-top:49.33px ;transition:600ms;-webkit-transition:600ms;-moz-transition:600ms;-o-transition:600ms;}
                    
                    .toggleclose{top:-75px!important;}
                    
                    .togglebody{margin-top:0!important;}
                    
                    .fa-arrow-down {
                    
                    position: fixed;
                    
                    right: 30px;
                    
                    top: -2px;
                    
                    background:#00BE98;
                    
                    color: #FFFFFF;
                    
                    width: 40px;
                    
                    height: 30px;
                    
                    border-radius: 3px;
                    
                    line-height: 26px!important;
                    
                    padding-top: 10px;
                    
                    padding-right: 0!important;
                    
                    }
                    
                    .tybar{z-index:99999;top:0;transition:600ms;-webkit-transition:600ms;-moz-transition:600ms;-o-transition:600ms;position:fixed}
                    
                    .blink_me {
                    
                    color:#f2132d;
                    
                    margin-right:10px;
                    
                        -webkit-animation-name: blinker;
                    
                        -webkit-animation-duration: 1s;
                    
                        -webkit-animation-timing-function: linear;
                    
                        -webkit-animation-iteration-count: infinite;
                    
                      
                    
                        -moz-animation-name: blinker;
                    
                        -moz-animation-duration: 1s;
                    
                        -moz-animation-timing-function: linear;
                    
                        -moz-animation-iteration-count: infinite;
                    
                      
                    
                        animation-name: blinker;
                    
                        animation-duration: 1s;
                    
                        animation-timing-function: linear;
                    
                        animation-iteration-count: infinite;
                    
                    }
                    
                    @-moz-keyframes blinker {
                    
                        0% { opacity: 1.0; }
                    
                        50% { opacity: 0.0; }
                    
                        100% { opacity: 1.0; }
                    
                    }
                    
                    @-webkit-keyframes blinker {
                    
                        0% { opacity: 1.0; }
                    
                        50% { opacity: 0.0; }
                    
                        100% { opacity: 1.0; }
                    
                    }
                    
                    @keyframes blinker {
                    
                        0% { opacity: 1.0; }
                    
                        50% { opacity: 0.0; }
                    
                        100% { opacity: 1.0; }
                    
                    }
                    
                    @media screen and (max-width:800px) {
                    
                    .tybar{display:none;}
                    
                    body {
                    
                        margin-top: 0;
                    
                        }
                    
                    }
                    </style>
                    </head>
                    <body>
                <div class='tybar'>
                <span class='blink_me'>Invalid email or password </span><span class='bar-but'><a href='http://localhost/phpscript/index.html'>Retry</a></span>
                
                </div>
                </body>
                </html>
                ";
            }
        } else {
            // User not found
            echo "<html>
            <head>
            <style>
            <link href='//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'/>
            .tybar{width: 100%;

                margin: 0;
                
                height: 50px;
                
                display: table;
                
                font-size: 17px;
                
                line-height: 50px;
                
                font-weight: 600;
                
                -webkit-font-smoothing: antialiased;
                
                color: rgb(255, 255, 255);
                
                    font-family: Ruda;
                
                border-color: rgb(255, 255, 255);
                
                background-color: #0e1032;
                
                box-shadow: 0 1px 3px 2px rgba(0,0,0,0.15);  
                
                text-align: center;}
                
                .tybar .bar-but{font-size: 17px;
                
                font-weight: bold;
                
                margin-left: 25px;
                
                background: #fff;
                
                padding: 5px;
                
                color: #fff;
                
                background-color: #f2132d;
                
                line-height: 1.05;
                
                padding: 4px 15px;
                
                cursor: pointer;
                
                text-decoration: none;
                
                border-radius: 3px;}
                
                .tybar .bar-but a{color:#fff;    text-decoration: none;}
                
                .tybar i {
                
                float: right;
                
                padding-right: 40px;
                
                cursor: pointer;
                
                line-height: 50px;
                
                }
                
                body{margin-top:-49.33px;}
                
                body{margin-top:49.33px ;transition:600ms;-webkit-transition:600ms;-moz-transition:600ms;-o-transition:600ms;}
                
                .toggleclose{top:-75px!important;}
                
                .togglebody{margin-top:0!important;}
                
                .fa-arrow-down {
                
                position: fixed;
                
                right: 30px;
                
                top: -2px;
                
                background:#00BE98;
                
                color: #FFFFFF;
                
                width: 40px;
                
                height: 30px;
                
                border-radius: 3px;
                
                line-height: 26px!important;
                
                padding-top: 10px;
                
                padding-right: 0!important;
                
                }
                
                .tybar{z-index:99999;top:0;transition:600ms;-webkit-transition:600ms;-moz-transition:600ms;-o-transition:600ms;position:fixed}
                
                .blink_me {
                
                color:#f2132d;
                
                margin-right:10px;
                
                    -webkit-animation-name: blinker;
                
                    -webkit-animation-duration: 1s;
                
                    -webkit-animation-timing-function: linear;
                
                    -webkit-animation-iteration-count: infinite;
                
                  
                
                    -moz-animation-name: blinker;
                
                    -moz-animation-duration: 1s;
                
                    -moz-animation-timing-function: linear;
                
                    -moz-animation-iteration-count: infinite;
                
                  
                
                    animation-name: blinker;
                
                    animation-duration: 1s;
                
                    animation-timing-function: linear;
                
                    animation-iteration-count: infinite;
                
                }
                
                @-moz-keyframes blinker {
                
                    0% { opacity: 1.0; }
                
                    50% { opacity: 0.0; }
                
                    100% { opacity: 1.0; }
                
                }
                
                @-webkit-keyframes blinker {
                
                    0% { opacity: 1.0; }
                
                    50% { opacity: 0.0; }
                
                    100% { opacity: 1.0; }
                
                }
                
                @keyframes blinker {
                
                    0% { opacity: 1.0; }
                
                    50% { opacity: 0.0; }
                
                    100% { opacity: 1.0; }
                
                }
                
                @media screen and (max-width:800px) {
                
                .tybar{display:none;}
                
                body {
                
                    margin-top: 0;
                
                    }
                
                }
                </style>
                </head>
                <body>
            <div class='tybar'>
            <span class='blink_me'>Invalid email or password </span><span class='bar-but'><a href='http://localhost/phpscript/index.html'>Retry</a></span>
            
            </div>
            </body>
            </html>";
        }

        // Close the statement
        $stmt->close();
    }
}

$conn->close();
?>
