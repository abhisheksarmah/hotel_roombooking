<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Assam Hotel</title>
    <link href="css/w3.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        label.error {
            color: #F00;
            font-size: x-small;
        }

        .tbg {
            background-image: url(images/calendar.png);
            background-position: left;
            background-repeat: no-repeat;
            padding-left: 40px;
        }
    </style>
    <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="w3-display-container">
        <img src="images/banner_bg.jpg" style="width:100%;">
        <div class="w3-display-topmiddle" style="width:100%;">
            <div class="w3-container w3-padding-12 w3-card w3-black w3-opacity-off">
                <div class="w3-left" style="width:50%;"> <a href="index.php"><img src="images/logo3.jpg" style="width:40%;"></a>
                </div>
                <div class="w3-right w3-right-align" style="padding-top:16px;">
                </div>
            </div>
            <div class="container bg-dark w3-animate-top" style="width:35%; margin:30px auto; border-radius:15px;">
                <div class="w3-container w3-center" style="padding-top:16px;">
                    <img src="images/admin.jpg" class="rounded-circle border-dark border" style=" width:25%;" /><br>
                    <p class="w3-large text-white log mt-3"><strong>Admin Login</strong></p>
                </div>
                <div class="w3-container w3-small">
                    <form name="form1" id="form1" method="post" action="adminlogin.php">
                        <p>
                            <input type="text" name="username" class="w3-input w3-border w3-round-medium" placeholder="User Name">
                        </p>
                        <p>
                            <input type="password" name="password" class="w3-input w3-border w3-round-medium" placeholder="Password">
                        </p>
                        <p>
                            <input type="submit" name="login" class="btn btn-outline-success btn-block" value="Login ">
                        </p>

                    </form>
                </div>
            </div>
        </div>
        <div class="row bg-dark" style="margin-top: 5px;">
            <div class="col-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="w3-dropdown-hover bg-primary">
                        <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body text-center"> <b> ABOUT AGENCY </b></div>
                        </div>
                        <div class="dropdown w3-dropdown-content w3-bar-block w3-border w3-animate-zoom">
                            <p class="text-center p-5 text-dark"><b>The world has become so fasted that people don’t want to standby reading page of info they would much rather look at a presentation and understand message.</b></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-4">
                <div class="card text-light bg-danger">
                    <div class="w3-dropdown-hover bg-danger">
                        <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body text-center"> <b> CONTACT_US </b></div>
                        </div>
                        <div class="dropdown w3-dropdown-content w3-bar-block w3-border w3-animate-top">
                            <p class="text-center p-5 btn-link"><b>+91 1235678936</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-light bg-secondary">
                    <div class="w3-dropdown-hover bg-secondary">
                        <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body text-center"> <b> DEVELOPER </b></div>
                        </div>
                        <div class="dropdown w3-dropdown-content w3-bar-block w3-border w3-animate-right">
                            <p class="text-center p-5"><b>Designed and Maintained By ABHILEKH SARMAH</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_GET["err"])) {
    echo '<script> alert("Invalid UserName or Password"); </script>';
}
?>
<script type="text/javascript">
    $(function() {
        $("#Datepicker1").datepicker();
    });
    $(function() {
        $("#Datepicker2").datepicker();
    });
</script>