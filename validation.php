<!DOCTYPE html>
<html>
<head>
  <title></title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
.error {color: #FF0000;}

body{
  background-image: url('bg.jpg');
  

}
#bgopa{
  opacity: 0.9;
  width: 30%;
  padding: 15px%;
  position: relative;
  left: 15%;
  
}
</style>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $usernameErr = $passwordErr = $genderErr = "";
$name = $email = $username = $password = $comment = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  //Email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  //Username  
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
  }

  //Password
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  //Comment
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  //Gender
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['name'] = htmlentities($_POST['name']);
    $_SESSION['email'] = htmlentities($_POST['email']);
    $_SESSION['username'] = htmlentities($_POST['username']);
    $_SESSION['password'] = htmlentities($_POST['password']);
    $_SESSION['comment'] = htmlentities($_POST['comment']);
    $_SESSION['gender'] = htmlentities($_POST['gender']);
  header('Location: output.php'); 
  }
?>


</head>
<body>
<div class="container">
<div class="container text-light">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="{{ site.baseurl }}/docs/{{ site.docs_version }}/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>Validation Form</h2>
  </div>  
</div>

<div class="jumbotron bg-light">
  <p><span class="error">* required field</span></p>
  <div class="container">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"autocomplete="off">
      <div class="form-group">

      <div class="form-group col-md-6">
            <Label>Name:</Label><span class="error">* <?php echo $nameErr;?></span>  
            <input type="text" name="name" class="form-control">
            </div>
        <br>
        
        <Label>E-mail:</Label><span class="error">*<?php echo $emailErr;?></span>
        <div class="input-group mb-4">
      <input type="text" name="email" class="form-control">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">@example.com</span>
        </div>
          </div>

        <br>
          <div class="form-row">
            <div class="form-group col-md-6">
        <Label>Username:</Label><span class="error">*<?php echo $usernameErr;?></span>
        <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group col-md-6">
        <Label>Password:</Label><span class="error">*<?php echo $passwordErr;?></span>
        <input type="password" name="password" class="form-control">
            </div>
          </div>
        <br>
        <Label>Comment:</Label>
        <textarea name="comment" rows="5" cols="40" class="form-control"></textarea>
        <br><br>
        <Label>Gender:</Label><span class="error">* <?php echo $genderErr;?></span>
      <br>
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary bg-danger">
        <input type="radio" name="gender" id="option2" value="female">Female
        </label>
        <label class="btn btn-secondary bg-primary">
        <input type="radio" name="gender" id="option3" value="male">Male
        </label>
      </div>
        <br><br>
        <input type="submit" name="submit" value="Submit" class="btn btn-outline-success">
      </div>
      </form>
  </div>
</div>
</div>
</body>
</html>