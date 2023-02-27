<?php 
  session_start();
  require "functions/connect.php";
  if(!isset($_SESSION['admin'])){
    header("Location: index.php");
  }

  else{
    $admin = $_SESSION['admin'];
  }

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profili</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/profili.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="/assets-old/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="nav">
      <div class="logo">
        <h2 class="navbar-brand h1 text-secondary">AmebaMap</h2>
      </div>

      <div class="navi">
        <div class="lis">
          <a href="index2.php" class="text-secondary"><span class="material-symbols-sharp">dashboard</span>Dashboard</a>
          <a href="lokacion.php" class="text-secondary"><span class="material-symbols-sharp">map</span>Lokacionet</a>
          <a href="profili.php" class="text-secondary  active"><span class="material-symbols-sharp">person</span>Profili</a>
        </div>
        <div class="profile">
          <span class="material-symbols-sharp text-primary">logout</span>
          <button type="button" id="shkyqu" class="text-primary" data-toggle="modal" data-target="#exampleModal">Shkyqu</button>
        </div>
      </div>

      <div class="burger">
        <span class="material-symbols-sharp sharpi">menu</span>
      </div>
    </div>

    <?php
        $query = mysqli_query($connect, "SELECT * FROM admini WHERE adminID = '$admin'");

        $fetch = mysqli_fetch_assoc($query);
        $data = $fetch['dataRegj'];
        $srt = strtotime($data);
        $date = date("d  M  Y", $srt);
        $data1 = $fetch['oraRegj'];
        $srtt = strtotime($data1);
        $ora = date("h : i A", $srtt);
    ?>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round " style="padding: 7rem 0;">
              <h1 class="text-secondary"><?php echo $fetch['emri']."&nbsp;". $fetch['mbiemri'] ?></h1>
              <p class="text-primary"><?php echo $fetch['email']?></p>
          </div>
      </div>
  </div>


  
  <div class="profile-info col-md-9">
      <div class="panel">
      <div class="panel">
          <div class="bio-graph-heading">
              Të dhënat më poshtë janë të dhënat e administratorit në fjalë dhe janë të dhëna që nuk mund të ndryshohen !
          </div>
          <div class="panel-body mt-3 bio-graph-info">
              <h1 class="mb-5">Të dhënat e administratorit</h1>
              <div class="row rowii">
                  <div class="bio-row">
                      <p><span>Emri</span>: <?php echo $fetch['emri']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Mbiemri </span>: <?php echo $fetch['mbiemri']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: <?php echo $fetch['email']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Username</span>: <?php echo $fetch['usernamee']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Komuna </span>: <?php echo $fetch['komuna']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Nr.Tel </span>: <?php echo $fetch['nrtel']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Data e regjsitrimit</span>: <?php echo $date;?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Ora e regjsitrimit</span>: <?php echo $ora;?></p>
                  </div>
              </div>
          </div>
      </div>
      <div class="mt-5">

      <?php 
      $query1 = mysqli_query($connect, "SELECT * FROM kordinata WHERE adminID = '$admin'");
      $query2 = mysqli_query($connect, "SELECT * FROM kordinata WHERE adminID = '$admin' AND statusi = 'perfunduar';");

      if(mysqli_num_rows($query1) == 1){
        $text = "Lokacion i caktuar";
      }
      else{
        $text = "Lokacione të caktuara";
      }

      
      if(mysqli_num_rows($query2) == 1){
        $text1 = "Lokacion i përfunduar";
      }
      else{
        $text1 = "Lokacione të përfunduara";
      }
      
      ?>
          <div class="row">
              <div class="col-md-5 ppp p-3 mb-4">
                  <div class="panel bg-primary" >
                      <div class="panel-body">
                          <div class="bio-chart mt-5">
                              <div class="" style="margin-top:-0.6rem; display:flex;width:100px;height:50px;margin-left: 27px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; background: none;"><?php echo mysqli_num_rows($query1);?></div>
                          </div>
                          <div class="bio-desk d-flex align-center justify-content-center text-center mt-3">
                              <h4 class="red text-center mt-4"><?php echo $text;?></h4>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-5 ppp p-3 mb-4 ms-auto">
                  <div class="panel pani">
                          <div class="bio-chart mt-5">
                              <div class="" style="margin-top:-0.6rem; display:flex;width:100px;height:50px;margin-left: 27px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: green; padding: 0px; -webkit-appearance: none; background: none;"><?php echo mysqli_num_rows($query2);?></div>
                          </div>
                          <div class="bio-desk d-flex align-center justify-content-center text-center mt-3">
                              <h4 class="green text-center mt-4"><?php echo $text1;?></h4>
                          </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel"><span class="material-symbols-outlined text-danger h1">warning</span><span>Kujdes !</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Dëshironi të shkyqeni nga llogaria ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Anulo</button>
        <a href="functions/logout.php" class="btn btn-danger">Shkyqu Tani</a>
      </div>
    </div>
  </div>
</div>
   
    



  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
      var nav = document.querySelector(".navi");
      var navi = document.querySelector(".nav");
      $(document).ready(function(){
        $(".burger").on("click", function(e){
          e.preventDefault();
          $(".navi").toggleClass('active');
          $(".sharpi").text($(".sharpi").text() == 'menu' ? 'close' : 'menu');
        })
      })
    </script>

<script>
    function CopyToClipboard(id)
    {
    var r = document.createRange();
    r.selectNode(document.getElementById(id));
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(r);
    var hej = document.execCommand('copy');
    window.getSelection().removeAllRanges();
    }
    </script>
   
</body>
</html>