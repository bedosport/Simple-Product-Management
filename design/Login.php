<?php 
 require_once '../core/config.php';
 require_once '../core/session.php';
 require_once '../core/response.php';
 require_once '../core/request.php';
 require_once '../core/db.php';
 require_once '../helper/helpers.php'; 
 ?>

<?php 

if(getSession('user') != null){
    redirect("design/index");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >

    <title>Login</title>
  </head>
  <body>
    <h1 class="p-5 text-center">Login</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <?php getFile(FOLDER_PATH."inc/message"); ?>

                <form class="p-4 m-3 border bg-gradient-info" method="POST" action="../handelers/login.php">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" >
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="password" class="form-control" id="pass" >
                    </div>
        
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-reply-all-fill"></i> Submit
                     </button>
                </form>
            </div>
        </div>
    </div>

       <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
