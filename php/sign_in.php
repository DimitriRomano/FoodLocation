<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SIGN IN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/Bootstrap.min.css">
    <link rel="shortcut icon" href="images/logo.JPG" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/fixed.css">
    <link rel="stylesheet" href="../css/signup.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h1 class="text-left">SIGN UP</h1>
          <p>s simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
             standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
             to make a type specimen book. It has survived not only five centuries</p>
        </div>
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-5">
              <h3 class="text-center">Registration Form</h3>
            </div>
            <div class="col-md-6">
              <span class="glyphicon glyphicon-pencil"></span>
            </div>
          </div>
          <hr>
          <form action="signup.php" method="post">
          <div class="row">
            <label class="label col-md-2 control-label">Username</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="username" placeholder="Username" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <label class="label col-md-2 control-label">Email</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="email"  placeholder="E-mail" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <label class="label col-md-2 control-label">Password</label>
            <div class="col-md-8">
              <input type="password" class="form-control" name="password"  placeholder="Password" required>
            </div>
          </div>

          <div class="row">
            <label class="label col-md-2 control-label">Repeat Password</label>
            <div class="col-md-8">
              <input type="password" class="form-control" name="passwordRepeat"  placeholder="Repeat Password" required>
            </div>
          </div>
          <div class="text-left">
            <button type="submit" name="submit_signup" class="btn btn-dark">SIGN UP</button>
          </div>
        </div>
      </form>
      <a href="../index.php">Back Home</a>
      </div>
    </div>
  </body>
</html>
