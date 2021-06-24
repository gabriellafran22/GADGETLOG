<?php  
  require 'function.php';
  $tipe = $_GET["brand"];

  if(!isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
  }

  if(isset($_POST["post"])){
    if(createDis($_POST) > 0){
      echo "<script>alert('discussion has been posted')</script>";
      header("Location: discussarea.php?brand=$tipe");
      exit;
    } else {
      echo mysqli_error($koneksi);
    }
  }

  if(isset($_POST["reply"])){
    if(createCom($_POST) < 0){
      echo mysqli_error($koneksi);
    }
      header("Location: discussarea.php?brand=$tipe");
      exit;
  }

  $diss = query("SELECT * FROM discussion WHERE brand='$tipe'");

  if(isset($_POST["searchDis"])){
      $diss = searchDis($_POST["problemDet"], $tipe);
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/discussarea.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
      var click = 0;
      function clickdetail(id){
        var smdid = "SMD-" + id;
        if(click%2==0){
            document.getElementById(smdid).innerHTML = "Show Less Detail";
        } else {
            document.getElementById(smdid).innerHTML = "Show More Detail";
        }
        click++;
      }
  </script>
</head>
<body>
  <header class="navbar navbar-expand-sm bg-dark navbar-dark d-flex justify-content-between px-5" style="height: 70px !important;" id="black">
    <!-- logo -->
    <div class="navbar-brand">
        <figure class="onhover">
          <img  class="onhoverfront-image" src="images/logo.jpg">
          <img class="onhoverback-image" src="images/logo1.jpg"/>
        </figure>
    </div>
    <!-- search specification -->
    <div class="d-flex align-items-center">
      <div class="searchHeader">
        <form class="form-inline" action="/action_page.php">
          <input class="form-control mr-sm-1 mx-2" type="text" id="search-Phone" autocomplete="off" placeholder="Search Phone here" style="height: 28px !important; width: 230px;">
          <button class="btn btn-secondary" type="submit" name="searchPhones" style="background-color: lightgrey; border: 0;">
            <i class="fa fa-search" style="font-size: 20px; color: black;"></i>
          </button>
        </form>
        <div id="dropdown-phones"></div>
      </div>

      <a class="nav-link ml-2 text-white" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <!-- Icon orang --> 
        <i class="fa fa-user-o"></i>
      </a>

      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <div id="logout" class="dropdown-item">
          <div>
            <p style="text-align: center;">Hi, <?php echo $_SESSION['username']; ?></p>
          </div> 
          <div>
            <button onclick="if(confirm('Are you sure?')) window.open('logout.php','_self'); return false"> Logout
            </button>
          </div>
        </div> 
      </div>

    </div>
  </header>

  <nav class="navbar navbar-expand-sm bg-white justify-content-center" id="navbarrr">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold mx-5" href="index.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold mx-5" href="brands.php">BRAND</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold mx-5" href="store.php">STORE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold mx-5" href="discussion.php">DISSCUSION</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold mx-5" href="contactus.php">CONTACT US</a>
      </li>
    </ul>
  </nav>


  <div class="container-fluid py-4 mb-0">
    <div class="d-flex align-items-center justify-content-center">
      <h3 class="font-weight-bold">Discussion: </h3>
      <div class="mx-2">
        <img width="40px" class="img-fluid my-2" src="images/<?php echo $_GET["brand"].'logo.png' ?>" style="margin-bottom: 13px !important;">
      </div>
      <h3 class="font-weight-bold"><?php echo $_GET["brand"]; ?></h3>
    </div>
  </div>


  <div class="container-fluid px-4">
    <div class="px-5">
      <div class="row mb-4">
        <div class="col-8">
          <div class="card px-3 py-2 bg-dark" style=" border-radius: 10px;" id="black">
        <!-- post discussion -->
            <form method="post">
              <div class="my-2">
                <input class="form-control" name="topic" type="text" value="" placeholder="Topic" required>
              </div>
              <div class="my-2">
                <textarea class="form-control" name="problem"  style="height: 200px;" placeholder="Write your problem" required></textarea>
              </div>

              <div class="bg-dark d-flex align-items-center justify-content-end" id="black">
                <button type="submit" class="btn btn-secondary my-1 px-3" value="post" name="post" id="postbtn">POST</button>
              </div>
            </form>
          </div>
        </div>
        <!-- search discussion -->
        <div class="col-4 d-flex justify-content-center">
          <form class="d-flex align-items-start" action="" method="post">
            <input class="form-control mr-sm-2" type="text" placeholder="Search Discussion Here..." name="problemDet" autocomplete="off">
            <button class="btn btn-dark" type="submit" name="searchDis">Search</button>
          </form>
        </div>
      </div>
      
      <div class="row mt-5 mb-4">
        <!-- for disscusion-->
        <?php foreach ($diss as $row): ?>
        <?php 
           $iduser = $row['userid'];
           $userdata = mysqli_query($koneksi, "SELECT username FROM account WHERE userid='$iduser'");
           $uname= $userdata->fetch_array()[0]; 
        ?>

        <!-- discuss stats -->
        <div class="col-1 d-flex flex-column align-items-center justify-content-start" style="border-bottom: 1px solid black; padding: 20px 0;">
          <p><b>Posted by: </b><br> <?php echo $uname; ?></p>
        </div>
        <!-- discuss fill -->
        <div class="col-7" style="border-bottom: 1px solid black;  padding: 20px;">
          <div class="row">
            <div class="col-12">
              <h2 class="font-weight-bold text-dark"><?php echo $row["topic"];$top = $row["topic"]?></h2>
              <p><?php echo $row["problem"] ?></p>
            </div>
            
            <div class="col-12">
              <?php 
                $tempdis = mysqli_query($koneksi, "SELECT discussionid FROM discussion WHERE topic='$top'"); 
                $dissID = $tempdis->fetch_array()[0];
                $com = mysqli_query($koneksi, "SELECT * FROM comment WHERE discussionid='$dissID'");
              ?>
              <div class="collapse" id="diss-<?php echo $row['discussionid']?>">
                <p>Comments:</p>
                <!-- for foreignkey -->
                <?php foreach ($com as $rowcom): ?>
                  <?php 
                  $temp = $rowcom["userid"];
                  $usercom = mysqli_query($koneksi, "SELECT username FROM comment, account WHERE $temp = account.userid");
                  $unamecom= $usercom->fetch_array()[0]; 
                   ?>
                  <p><?php echo $unamecom." : ".$rowcom["comment"] ?></p>
                <?php endforeach ?>
                <!-- endfor foreignkey -->
                <!-- form comment -->
                <form method="post">
                  <input type="hidden" name="discussionid" value="<?php echo $row['discussionid']?>">
                  <div class="my-2">
                    <textarea class="form-control" name="comment" style="height: 100px;" placeholder="Reply to the topic above" required></textarea>
                  </div>
    
                  <div class="d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-secondary my-1 px-4" name="reply" value="reply">POST</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </div>
        <!-- discuss date -->
        <div class="col-4" style="border-bottom: 1px solid black; padding: 20px 0;">
          <p class="my-0">Posted on</p>
          <p class="my-0"><?= $row["date"]; ?></p>
          <div class="my-3">
            <?php if($_SESSION["username"] === $uname) :?>
              <a href="delete.php?discussionid=<?php echo $row["discussionid"];?>&brand=<?php echo $tipe?>">Delete Discussion</a>
            <?php endif; ?>
          </div>

          <a id="SMD-<?php echo $row['discussionid']?>" onclick="clickdetail(<?php echo $row['discussionid']?>)" data-toggle="collapse" data-target="#diss-<?php echo $row['discussionid']?>" style="color: blue; cursor: pointer;">Show More Detail</a>
        </div>
        <?php endforeach ?>
        <!-- endfor -->

      </div>
    </div>
  </div>
</body>
</html>