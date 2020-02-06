<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signup.css">
    <title>Create new account!</title>
  </head>
  <body>

    <div class="singup-form">
        <form action="signup_user.php" method="post">
            <div class="form-header">
                <h2>Sign Up</h2>
                <p>Fill out this form and start chating with your friends.</p>
            </div>
            <div class="form-group">
                <label >Username:</label>
                <input class="form-control" type="text" name="username" placeholder="Example: luka999" autocomplete="off" required>

            </div>
            <div class="form-group">
                <label >Password:</label>
                <input class="form-control" type="password" name="userpassword" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label >Email Address</label>
                <input class="form-control" type="email" name="useremail" placeholder="someone@site.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label >Country</label>
                <select class="form-control" name="usercountry" required>
                    <option disabled="">Select a country</option>
                    <option>Montenegro</option>
                    <option>Serbia</option>
                    <option>Croatia</option>
                    <option>BiH</option>
                    <option>Macedonia</option>
                    <option>Slovenia</option>
                </select>
            </div>
            <div class="form-group">
                <label >Gender</label>
                <select class="form-control" name="usergender" required>
                    <option disabled="">Select your Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required>I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy policy</a> </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
            </div>
            <?php include("signup_user.php");?>
        </form>
        <div class="text-center small" style="color:#674288;">Already a member?<a href="sign_in.php">Sign In!</a></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>