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
    <title>Dashboard</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="nav">
      <div class="logo">
        <h2 class="navbar-brand h1 text-secondary">AmebaMap</h2>
      </div>

      <div class="navi">
        <div class="lis">
          <a href="index2.php" class="text-secondary active" ><span class="material-symbols-sharp">dashboard</span>Dashboard</a>
          <a href="lokacion.php" class="text-secondary"><span class="material-symbols-sharp">map</span>Lokacionet</a>
          <a href="profili.php" class="text-secondary"><span class="material-symbols-sharp">person</span>Profili</a>
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


    <div id="map">
    </div>

    <div class="modal" id="mymodal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Vendosja e koordinates</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php 
            $error = "";

            if($_SERVER['REQUEST_METHOD'] == "POST"){
              require "functions/location.php";
            }
          
          ?>
          <div class="modal-body">
            <form action="" method="POST">
                <?php echo $error;?>
                <div class="long">
                  <div class="firsti">
                    <p>Gjatesi Gjeografike</p>
                    <input class="modal-lng" type="text" name="latitudee" >
                  </div>
                  <div class="firsti">
                    <p>Gjeresi Gjeografike</p>
                    <input class="modal-lat" type="text" name="longitudee">
                  </div>
                  <div class="firsti">
                    <p>Shenja e kerkuar</p>
                    <input type="text" name="shenja">
                  </div>
                  <div class="firsti">
                    <p>P??rshkrimi</p>
                    <textarea name="pershkrimi" id="" cols="20" rows="5" style="resize: none; padding-left: .5rem; padding-top: .5rem;"></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="lokacionsubmit" class="btn btn-primary" value="Ruaj Lokacionin">
              </div>
            </form>
        </div>
      </div>
    </div>
    
    <div class="container-fluid py-4 conti" style="width: 70%;">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4  z-index-2">
              <div class=" shadowi shadow-primary border-radius-lg pt-4 pb-3">
                <h5 class="text-secondary d-flex font-weight-bold text-capitalize ps-3">Lokacionet e regjistruara sot</h5>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tabela">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokacioni</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $data = date("Y-m-d");
                     $query = mysqli_query($connect, "SELECT * FROM kordinata WHERE adminID = '$admin' AND dataregj = '$data'");

                     if(mysqli_num_rows($query) > 0){
                      while($fetch1 = mysqli_fetch_assoc($query)){

                        $numri = $fetch1['kID'];
                        $lat = $fetch1['lati'];
                        $lon = $fetch1['longi'];
                        $numri = $fetch1['kID'];
                        $shenja = $fetch1['shenja'];
                        $pershkrimi = $fetch1['pershkrimi'];


                             echo "
                             <div class='card-body pt-4 p-3'>
                            <ul class='list-group'>
                              <tr>
                                <td>
                                  <li class='list-group-item border-0 d-flex p-1 mb-2 bg-gray-100 border-radius-lg'>
                                    <div class='d-flex flex-column'>
                                      <h6 class='mb-2 text-sm' style='font-weight: 800;'>Lokacioni numer: $numri</h6>
                                      <span class='mb-1'  style='font-size: 14px; font-weight: 500;'>Gjat??si gjeografike: <span class='text-dark font-weight-bold ms-sm-2'>$lat</span></span>
                                      <span class='mb-1 text-xs'  style='font-size: 14px; font-weight: 500;'>Gjer??si gjeografike: <span class='text-dark ms-sm-2 font-weight-bold'>$lon</span></span>
                                      <span class=''  style='font-size: 14px; font-weight: 500;'>Shenja rrugore: <span class='text-dark ms-sm-2 font-weight-bold'>$shenja</span></span>
                                      <span class=''  style='font-size: 14px; font-weight: 500;'>P??rshkrimi: <span class='text-dark ms-sm-2 font-weight-bold'>$pershkrimi</span></span>
                                    </div>
                                  </li>
                                </td>
                              </tr>
                            </ul>
                          </div>";
                          }
                        }
                        else{
                          echo "
                          <div class='card-body pt-4 p-3'>
                         <ul class='list-group'>
                           <tr>
                             <td>
                                Nuk ka asnj?? lokacion t?? caktuar sot !
                             </td>
                           </tr>
                         </ul>
                       </div>";
                        }
                        
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" tabindex="-1" id="infomodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title d-flex gap-3 align-center" style="align-items:center !important; justify-content:center !important;"><span class="material-symbols-outlined text-warning h1 mt-0" style="margin-top: 7px !important;">info</span> <span>Informat??</span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="div" style="display: flex; gap: .2rem; align-items:center;">
              <p style="font-size: 13px; font-weight: 700;">Shenja rrugore:</p><p id="info">Modal body text goes here.</p>
              </div>
              <div class="div" style="display: flex; gap: .2rem; align-items:center;">
              <p style="font-size: 13px; font-weight: 700;">P??rshkrimi:</p><p id="pershkrimi">Modal body text goes here.</p>
              </div>
              <div class="div" style="display: flex; gap: .2rem; align-items:center;">
              <p style="font-size: 13px; font-weight: 700;">Data e regjistrimit:</p><p id="data"></p>
              </div>
              <div class="div" style="display: flex; gap: .2rem; align-items:center;">
              <p style="font-size: 13px; font-weight: 700;">Ora regjistrimit:</p><p id="ora"></p>
              </div>
             
             
            </div>
            <div class="modal-footer">
              <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger">Mbyll</button>
            </div>
          </div>
        </div>
      </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel"><span class="material-symbols-outlined text-danger h1">warning</span><span>Kujdes !</span></h5>
            <button type="button" class="close" data-bs-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            D??shironi t?? shkyqeni nga llogaria ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn anuloo btn-default" id="anula" data-dismiss="modal">Anulo</button>
            <a href="functions/logout.php" class="btn btn-danger">Shkyqu Tani</a>
          </div>
        </div>
      </div>
    </div>
   

    
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
      $(document).ready(function(){
        $("#tabela").DataTable();
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
        google.maps.event.addListener(map, 'click', function(event) {
         placeMarker(map, event.latLng);
    });

        function placeMarker(map, location) {
          var marker = new google.maps.Marker({
            position: location,
            map: map
          });
          $('#mymodal').modal('show');
          $('.modal-lng').val(location.lat());
          $('.modal-lat').val(location.lng());

        
        }


  <?php 
    
    function get_all_locations(){
      require "functions/connect.php";
      $admin = $_SESSION['admin'];
      $sqldata = mysqli_query($connect,"SELECT lati, longi, shenja, pershkrimi,dataregj, oraregj FROM kordinata WHERE adminID = '$admin'");
  
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
                }
            })(marker, i));


        
  }

  
}


window.initMap = initMap;
</script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiCGiWPQA2-b5e0Wyejrko7mTHtgbOtLs&callback=initMap"></script>



   

   
</body>
</html>