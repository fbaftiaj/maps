<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ameba Maps / Kyqu</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>
        </title>
            <!--     Fonts and icons     -->
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
            <!-- Nucleo Icons -->
            <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
            <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <!-- Material Icons -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
            <!-- CSS Files -->
            <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
    </head>
    <body style="background-color: #d9dbda !important;">
        <main class="main-content  mt-0">
          <div class="page-header align-items-start min-vh-100" >
            <span class="mask opacity-6"></span>
            <div class="container my-auto">
              <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                  <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Forma e Kyqjes</h4>
                        <p class="text-white  text-center mt-1 mb-4" style="font-size: .8rem !important;">Ju lutemi plotesoni te dhenat tuaja</p>
                      </div>
                    </div>

                    <?php   
                      $error = $errorp = "";

                      if($_SERVER['REQUEST_METHOD'] == "POST"){
                          require "functions/login.php";
                      }
                    ?>
                    <div class="card-body">
                      <?php echo $error, $errorp;?>
                      <form role="form" class="text-start" method="POST">
                        <div class="input-group input-group-outline my-3">
                          <input type="text" class="form-control" name="loginuser" placeholder="Username">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                          <input type="password" class="form-control" name="loginpass" placeholder="Fjalëkalimi">
                        </div>
                        <div class="text-center">
                          <input type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" name="kyqusubmit" value="Kyqu Tani">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-1  w-100">
              <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                  <div class="col-12 col-md-6 my-auto">
                    <div class="copyright text-center text-sm text-dark text-lg-start">
                      © <script>
                        document.write(new Date().getFullYear())
                      </script>,
                      Krijuar  nga
                      <a href="http://ameba-rks.com/" class="font-weight-bold text-dark" target="_blank">ameba-rks.com</a>
                    </div>
                  </div>
                </div>
              </div>
            </footer>
          </div>
        </main>
      </body>
</html>