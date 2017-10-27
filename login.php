<?php
session_start();
include_once(__DIR__.'/assets/includes/includes.php');
$user = new User();
// Let's first see if they are already logged in.
// If they are, they can proceed to their dashboard
if (isset($_COOKIE['user_login_site']) && isset($_COOKIE['user_login_key'])) {
    if($user->validateUser($_COOKIE['user_login_site'], $_COOKIE['user_login_key'])) {
        $_SESSION['logged_in'] = true;
        header("Location: /index.php");
        exit;
    } else {
        // Cookies don't match, delete them, and have them start over
        $user->logout();
    }
}

$errorMsg = "";

// If they have submitted the form, let's make sure we test and see if they are logged in.
if(!empty($_POST)) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        // If either the username or password are empty, we need to tell them, and not let them log in.
        $errorMsg = "You did not fill in all required fields.  Please try again.";
    } else {
        //Let's validate our user
        $validUser = $user->validateUser($_POST['username'], sha1($_POST['password']));
        if (!empty($validUser)) {
            // Validated, set cookies for 1 day.
            header("Location: /index.php");
            exit;
        } else {
            // Not validated, try again.
            $errorMsg = "You did not provide a proper username or passowrd.  Please try again.";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Monkedia Client Access</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/custom.css"/>
</head>
<body>

<div class="ch-container">
    <div class=col-md-12">
        <div class="row">
            <div class="col-md-12 text-center page-header">
                <h1>Monkedia Client Access</h1>
            </div>
        </div>
        <div class="row">
            <div class="well col-md-4 col-md-offset-4 login-box">
                <?php if ($errorMsg != "") { ?>
                    <div class="alert alert-danger">
                        <?php echo $errorMsg; ?>
                    </div>
                <?php } ?>
                <div class="alert alert-info">
                    Please login with your Username and Password
                </div>
                <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="submit" value="submit">
                    <fieldset>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                   maxlength="40">
                        </div>
                        <div class="clearfix"></div>
                        <br>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                   maxlength="50">
                        </div>
                        <div class="clearfix"></div>


                        <div class="clearfix"></div>

                        <p class="center col-md-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>


</html>

