<?php 
  session_start();
  require "functions/connect.php";
  if(!isset($_SESSION['com'])){
    header("Location: index.php");
  }

  else{
    $admin = $_SESSION['com'];
  }

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokacionet</title>
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
    <link rel="stylesheet" href="style/lista.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <style>
        #map{
    width: 68%;
    margin: 0 auto;
    margin-top: 1rem;
    height: 30rem;
    background: aqua !important;
    z-index: 200;
    -webkit-box-shadow: 0px 54px 167px -56px rgba(255, 0, 0, 0.156);
-moz-box-shadow: 0px 54px 167px -56px rgba(255, 0, 0, 0.156);
box-shadow: 0px 54px 167px -56px rgba(255, 0, 0, 0.156);
}
    </style>
</head>
<body>
    <div class="nav">
      <div class="logo">
        <h2 class="navbar-brand h1 text-secondary">AmebaMap</h2>
      </div>

      <div class="navi">
        <div class="lis">
          <a href="index3.php" class="text-secondary"><span class="material-symbols-sharp">dashboard</span>Dashboard</a>
          <a href="lokacion2.php" class="text-secondary active"><span class="material-symbols-sharp">map</span>Lokacionet</a>
          <a href="profili2.php" class="text-secondary"><span class="material-symbols-sharp">person</span>Profili</a>
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


    

    <div id="map"></div>



    <section class="seksioni">

    </div>
      <div class='container-fuid mt-5'>
        <ul class='timeline'>
        <?php 
                    $data = date("Y-m-d");
                    
                    $select = $connect->query("SELECT * FROM kordinata WHERE komID = '$admin' ORDER BY kID DESC;");
                    while($row = $select->fetch_array()){ ?>

                         
                                  <li class='timeline-item mb-5'>
                                  <h5 class='fw-bold'>Lokacioni numër: <?php echo $row['kID'];?></h5>
                                  <p class='text-muted mb-2 fw-bold h6'><?php echo $row['dataregj'];?></p>
                                  <p class="ext-muted"><?php echo $row['pershkrimi'];?></p>
                                  <p class='longi'>Gjatësi gjeografike: <span class='gjat' id='sample1'  ><?php echo $row['lati'];?></span></p>
                                  <p class='longi mb-3'>Gjerësi gjeografike: <span class='gjer' id='sample' ><?php echo $row['longi'];?></span></p>
                                  <a href='#' class='mapi btn btn-danger mb-4' data-toggle='modal' data-target='#infomodal<?php echo $row['korID'];?>'>Fshini Lokacionin</a>
                                  </li>


                              <div class='modal fade' tabindex='-1' id='infomodal<?php echo $row['korID'];?>'>
                              <div class='modal-dialog'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h5 class='modal-title d-flex gap-3 align-center' style='align-items:center !important; justify-content:center !important;'><span class='material-symbols-outlined text-warning h1 mt-0' style='margin-top: 7px !important;''>info</span> <span>Informatë</span></h5>
                                    <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'></button>
                                  </div>
                                  <div class='modal-body'>  
                                      <h6>Dëshironi të fshini lokacionin numër  <?php echo $row['kID'];?>?</h6>
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' data-dismiss='modal' aria-label='Close' class='btn btn-default'>Anulo</button>
                                    <a href="deletemap.php?id=<?php echo $row['korID'];?>" class='btn btn-danger'>Fshij Tani</a>
                                  </div>
                                </div>
                              </div>
                            </div>

                    <?php }
      ?>
          </ul>
        </div>
    </section>

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


    <div class="modal fade modali004" tabindex="-1" id="infomodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title d-flex gap-3 align-center" style="align-items:center !important; justify-content:center !important;"><span class="material-symbols-outlined text-warning h1 mt-0" style="margin-top: 7px !important;">info</span> <span>Informatë</span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <p class='text-xs text-primary text-bold error1' ></p>
                            <div class="div" style="display: flex; gap: .2rem; align-items:center;">
                        <p style="font-size: 13px; font-weight: 700;">Shenja rrugore:</p><p id="info"></p>
                        </div>
                        <div class="div" style="display: flex; gap: .2rem; align-items:center;">
                        <p style="font-size: 13px; font-weight: 700;">Përshkrimi:</p><p id="pershkrimi"></p>
                        </div>
                        <div class="div" style="display: flex; gap: .2rem; align-items:center;">
                        <p style="font-size: 13px; font-weight: 700;">Data e regjistrimit:</p><p id="data"></p>
                        </div>
                        <div class="div" style="display: flex; gap: .2rem; align-items:center;">
                        <p style="font-size: 13px; font-weight: 700;">Ora regjistrimit:</p><p id="ora"></p>
                        </div>
                        <div class="div" style="display: flex; gap: .2rem; align-items:center;">
                        <p  style="font-size: 13px; font-weight: 700;">Statusi i lokacionit:</p> <p class="text-uppercase" id="id"></p>
                        
                </div>
                
                
                
                
                </div>
                <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger">Mbyll</button>
                </div>
          </div>
        </div>
      </div>
    </div>

  
    


.

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

      function initMap() {
        const uluru = { lat:42.215260, lng:20.741474 };
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 16,
          center: uluru,
          mapTypeId: google.maps.MapTypeId.HYBRID
        });



  <?php 
    
    function get_all_locations(){
      require "functions/connect.php";
      $admin = $_SESSION['com'];
      $sqldata = mysqli_query($connect,"SELECT lati, longi, shenja, pershkrimi,dataregj, oraregj, korID, statusi FROM kordinata WHERE  statusi = 'perfunduar' AND komID = '$admin';");
  
      $rows = array();
      while($r = mysqli_fetch_assoc($sqldata)) {
          $rows[] = $r;
  
      }
    $indexed = array_map('array_values', $rows);
  
      echo json_encode($indexed);
      if (!$rows) {
          return null;
      }
  }?>

const svgMarker = {
    path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
    fillColor: "red",
    fillOpacity: 1,
    strokeWeight: 0,
    rotation: 0,
    scale: 2,
    anchor: new google.maps.Point(15, 30),
  };
  

  
  var marker;
    var locations = <?php get_all_locations() ?>;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;


        var i ; 
        for (i = 0; i < locations.length; i++) {

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                map: map,
                icon: svgMarker,
                title: locations[i][3]
            });
            
           

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    $('#infomodal').modal('show');
                  $('#info').html(locations[i][2]);
                  $('#pershkrimi').html(locations[i][3]);
                  $('#data').html(locations[i][4]);
                  $('#ora').html(locations[i][5]);
                  $('#id').html(locations[i][7]);
                }
            })(marker, i));


        
  }

  
}


window.initMap = initMap;
</script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiCGiWPQA2-b5e0Wyejrko7mTHtgbOtLs&callback=initMap"></script>

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