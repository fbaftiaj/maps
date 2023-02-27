<?php 
  session_start();
  require "functions/connect.php";
  if(!isset($_SESSION['superadmin'])){
    header("Location: index.php");
  }

  else{
    $admin = $_SESSION['superadmin'];
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
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <style>

      .shadowi{
        background-color: transparent !important;
      }
      .conti{
        border: none !important;
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
          <a href="superadmin.php" class="text-secondary " ><span class="material-symbols-sharp">group</span>Zyrtarët</a>
          <a href="kom.php" class="text-secondary active"><span class="material-symbols-sharp">groups</span>Kompanitë</a>
          <a href="profili3.php" class="text-secondary"><span class="material-symbols-sharp">more</span>Profili</a>
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

         
    
    <div class="container-fluid py-4 conti" style="width: 70%;">
      <div class="row">
        <div class="col-12" >
          <div class="card my-4" style="border:none;">
            <div class="card-header p-0 position-relative mt-n4  z-index-2" style="border:none;">
              <div class=" shadowi shadow-danger border-radius-lg pt-4 pb-3">
                <h5 class="text-secondary d-flex font-weight-bold text-capitalize ps-3">Kompanitë</h5>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tabela">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zyrtari</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $select = $connect->query("SELECT * FROM kompania  ORDER BY kID DESC;");
                      while($row = $select->fetch_array()){ ?>

                        
                                    <div class='card-body pt-4 p-3'>
                                            <ul class='list-group'>
                                            <tr>
                                                <td>
                                                <li class='list-group-item border-0 d-flex p-1 mb-2 bg-gray-100 border-radius-lg'>
                                                    <div class='d-flex flex-column'>
                                                    <h6 class='mb-2 text-sm' style='font-weight: 800;'><?php echo $row['emri'];?></h6>
                                                    <span class='mb-0'  style='font-size: 12px; font-weight: 500;'>ID: <?php echo $row['komID']; ?></span>
                                                    <span class='mb-0 text-xs'  style='font-size: 12px; font-weight: 500;'>User: <?php echo $row['usernamee']; ?></span>
                                                    <span class='mb-2 text-xs'  style='font-size: 12px; font-weight: 500;'>Komuna: <?php echo $row['komuna']; ?></span>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <button type="button" style='font-size: 13px;' class="btn btn-danger d-flex " data-bs-toggle="modal" data-bs-target="#fshijModal<?php echo $row["komID"];?>"><span style='font-size: 16px;' class="material-symbols-outlined text-xs">delete</span> Fshij</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <button  style='font-size: 13px;' class="btn btn-primary  d-flex" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row["komID"];?>"><span style='font-size: 16px;' class="material-symbols-outlined text-xs">edit</span> Ndrysho</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </li>
                                                </td>
                                            </tr>
                                            </ul>
                                        </div>


                                        <div class="modal fade" id="fshijModal<?php echo $row["komID"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel12" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title d-flex align-items-center text-primary gap-2" id="exampleModalLabel12"><span class="material-symbols-outlined">campaign</span> <span>Kujdes !</span></h5>
                                              <button type="button" class="close h5" style="outline: none;border: none;background-color: transparent;" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                Dëshironi të fshini kompaninë !
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Anulo</button>
                                              <a href="func/fshijkom.php?kid=<?php echo $row["komID"];?>" class="btn btn-primary">Fshij Tani</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                      <div class="modal fade modali004" id="editModal<?php echo $row["komID"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Ndrysho Kompaninë</h5>
                                                <button type="button" class="close h5" style="outline: none;border: none;background-color: transparent;" data-bs-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <form method="POST" id="ndryshoform">
                                                <p style="font-size: 12px;" class='text-xs text-danger text-bold error' ></p>
                                                  <div class="mb-2">
                                                      <input type="text" class="form-control username"  name="ndryshoemri" value="<?php echo $row["emri"];?>"/>
                                                  </div>
                                                  <div class="mb-2">
                                                    <input type="text" class="form-control username"  name="ndryshouser" placeholder="Username" value="<?php echo $row["usernamee"];?>"/>
                                                  </div>
                                                  <div class="mb-2">
                                                    <input type="text" class="form-control username"  name="ndryshokomun" placeholder="Komuna" value="<?php echo $row["komuna"];?>" />
                                                  </div>
                                                  <div class="mb-3 qmimi">
                                                    <input  type="hidden" class="form-control usi1 username"  name="uniqe" value="<?php echo $row["komID"];?>" />
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Anulo</button>
                                                    <input type="submit" class="btn btn-primary" value="Ndrysho Tani">
                                                  </div>
                                              </form>
                                              </div>
                                            
                                            </div>
                                          </div>
                                        </div>
                        <?php } ?>

                        <?php 
                            if(mysqli_num_rows($select) < 1){?>
                              <li class='list-group-item border-0 d-flex p-1 mb-2 bg-gray-100 border-radius-lg'>
                                <h4 class="text-sm opacity" style="font-size:18px; opacity: .5;">Nuk ka asnjë zyrtar të regjistruar deri tani !</h4>
                              </li>
                            <?php }?>
                        
                        

                  </tbody>
                </table>
              </div>
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
            Dëshironi të shkyqeni nga llogaria ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn anuloo btn-default" id="anula" data-dismiss="modal">Anulo</button>
            <a href="functions/logout.php" class="btn btn-danger">Shkyqu Tani</a>
          </div>
        </div>
      </div>
    </div>

   

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>               
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script>
      var nav = document.querySelector(".navi");
      var navi = document.querySelector(".nav");
      $(document).ready(function(){
        $(".burger").on("click", function(e){
          e.preventDefault();
          $(".navi").toggleClass('active');
          $(".sharpi").text($(".sharpi").text() == 'menu' ? 'close' : 'menu');
        });
      })
    
    </script>
    
    <script>
      $(document).ready(function(){
        $("#tabela").DataTable();
      })
    </script>
   
   

    <script>
  $("#ndryshoform").submit(function(event){
	event.preventDefault(); 
	var request_method = $(this).attr("method"); //get form GET/POST method
	var form_data = $(this).serialize(); //Encode form elements for submission
	
	$.ajax({
		url : "functions/ndryshokom.php",
		type: request_method,
		data : form_data
	}).done(function(response){
    if(response == "success"){
      $(".modali004").modal("hide");
      setTimeout(function(){
        location.reload();
      }, 500)
    }
    else{
      $(".error").html(response);
    }
	
	});
});
</script>
</body>
</html>