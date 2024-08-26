<?php
session_start();
if (!isset($_SESSION['user']))
  header("location: index.php?Message=Login To Continue"); // Gửi http header
include "dbconnect.php";
$customer = $_SESSION['user'];
if (isset($_POST['submit-comment'])) {
  $keyword = $_POST['submit-comment'];
  $PID = $_GET['ID'];
  $query = "INSERT INTO comment_product (UserName, PID, Comment) VALUES ('$customer', '$PID', '$keyword')";
  $result = mysqli_query($con, $query) or die(mysql_error); // Thực hiện truy vấn cơ sở dữ liệu.
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Books">
  <meta name="author" content="Shivangi Gupta">
  <title> Online Bookstore</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/my.css" rel="stylesheet">

  <style>
    @media only screen and (width: 768px) {
      body {
        margin-top: 150px;
      }
    }

    @media only screen and (max-width: 760px) {
      #books .row {
        margin-top: 10px;
      }
    }

    .tag {
      display: inline;
      float: left;
      padding: 2px 5px;
      width: auto;
      background: #F5A623;
      color: #fff;
      height: 23px;
    }

    .tag-side {
      display: inline;
      float: left;
    }

    #books {
      border: 1px solid #DEEAEE;
      margin-bottom: 20px;
      padding-top: 30px;
      padding-bottom: 20px;
      background: #fff;
      margin-left: 10%;
      margin-right: 10%;
    }

    #description {
      border: 1px solid #DEEAEE;
      margin-bottom: 20px;
      padding: 20px 50px;
      background: #fff;
      margin-left: 10%;
      margin-right: 10%;
    }

    #description hr {
      margin: auto;
    }

    #service {
      background: #fff;
      padding: 20px 10px;
      width: 112%;
      margin-left: -6%;
      margin-right: -6%;
    }

    .glyphicon {
      color: #D67B22;
    }

    .comment-box {
      margin-left: 10%;
      padding-bottom: 20px;
    }

    .comment {
      width: 89%;
      height: 50px;
      padding: 10px;
      border-left: 6px solid #D67B22;
      background-color: #fff;
      font-size: 1.4em;
      /* color: #D67B22; */
    }

    .star {
      display: inline-block;
      background: url("design/star.png") no-repeat;
      width: 44px;
      height: 44px
    }

    .star_hover {
      display: inline-block;
      background: url("design/star.png") no-repeat;
      background-position: 0 -44px;
      width: 44px;
      height: 44px
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img alt="Brand" src="img/logo.jpg"
            style="width: 118px;margin-top: -7px;margin-left: -10px;"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <?php
          if (isset($_SESSION['user'])) {
            echo '
                      <li><a href="cart.php" class="btn btn-md"><span class="glyphicon glyphicon-shopping-cart">Cart</span></a></li>
                      <li><a href="destroy.php" class="btn btn-md"> <span class="glyphicon glyphicon-log-out">LogOut</span></a></li>
                           ';
          }
          ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div id="top">
    <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
      <div>
        <form role="search" action="Result.php" method="post">
          <input type="text" name="keyword" class="form-control" placeholder="Search for a Book , Author Or Category"
            style="width:80%;margin:20px 10% 20px 10%;">
        </form>
      </div>
    </div>
  </div>


  <?php
  $PID = $_GET['ID'];
  $query = "SELECT * FROM products WHERE PID='$PID'";
  $result = mysqli_query($con, $query) or die(mysql_error());

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $path = "img/books/" . $row['PID'] . ".jpg";
      $target = "cart.php?ID=" . $PID . "&";
      echo '
    <div class="container-fluid" id="books">
      <div class="row">
        <div class="col-sm-10 col-md-6">
                            <div class="tag">' . $row["Discount"] . '%OFF</div>
                                <div class="tag-side"><img src="img/orange-flag.png">
                            </div>
                           <img class="center-block img-responsive" src="' . $path . '" height="550px" style="padding:20px;">
        </div>
        <div class="col-sm-10 col-md-4 col-md-offset-1">
          <h2> ' . $row["Title"] . '</h2>
                                  <span style="color:#00B9F5;">
                                   #' . $row["Author"] . '&nbsp &nbsp #' . $row["Publisher"] . '
                                  </span>';
      $mediaId = $row['ID']; // Giá trị ID sản phầm 
      $cookie_name = $customer . $mediaId; //cookie bằng tên username + ID sản phầm.
      $nbrPixelsInDiv = 220; // Độ dài sao
      $query = "SELECT rate, nbrrate FROM rating WHERE media = '$mediaId'";
      $result = mysqli_query($con, $query) or die(mysql_error());
      if (mysqli_num_rows($result) > 0) {
        $row1 = mysqli_fetch_assoc($result);
        $average = round($row1['rate'] / $row1['nbrrate'], 2);
        $numEnlightedPX = round($nbrPixelsInDiv * $average / 5, 0);
      } else {
        $numEnlightedPX = 0;
      }
      // $getJSON = array('numStar' => 5, 'mediaId' => $mediaId);
      // $getJSON = json_encode($getJSON);
      echo '<div id = ' . $mediaId . ' align="center">' .
        '<div class="star_bar"style="width:' . $nbrPixelsInDiv . 'px; height:44px; background: linear-gradient(to right, #ffc600 ' . $numEnlightedPX . 'px,#ccc ' . $numEnlightedPX . 'px,#ccc ' . $nbrPixelsInDiv . 'px);">';
      $query = "SELECT Exist FROM cookies WHERE Username='$cookie_name' AND Value='$mediaId'";
      $result = mysqli_query($con, $query) or die(mysql_error());
      // echo $_COOKIE[$cookie_name];
      if (mysqli_num_rows($result) <= 0) {
        for ($i = 1; $i <= 5; $i++) {
          echo '<div title="' . $i . '/5" id="star' . $i . '" class="star"';
          echo ' onmouseover="overStar(' . $mediaId . ', ' . $i . ', 5); return false;" onmouseout="outStar(' . $mediaId . ', ' . $i . ', 5); return false;" onclick="rateMedia(' . $mediaId . ', ' . $i . ', 5, 44); return false;"';
          echo '></div>';
        }
      } else {
        for ($i = 1; $i <= 5; $i++) {
          echo '<div title="' . $i . '/5" id="star' . $i . '" class="star"';
          echo '></div>';
        }
      }
      echo '</div>';
      echo '<div class="resultMedia' . $mediaId . '" style="font-size: small; color: grey">';
      if (mysqli_num_rows($result) !== 0) {
        echo 'Note : ' . $average . '/5 (' . $row1['nbrrate'] . ' votes)';
      }
      '</div>';
      echo '<div class="box' . $mediaId . '"></div>';
      echo '</div>';

      echo '<hr>            
                                  <span style="font-weight:bold;"> Quantity : </span>';
      echo '<select id="quantity">';
      for ($i = 1; $i <= $row['Available']; $i++)
        echo '<option value="' . $i . '">' . $i . '</option>';
      echo ' </select>';
      echo '                           <br><br><br>
                                  <a id="buyLink" href="' . $target . '" class="btn btn-lg btn-danger" style="padding:15px;color:white;text-decoration:none;"> 
                                      ADD TO CART for Rs ' . $row["Price"] . ' <br>
                                      <span style="text-decoration:line-through;"> RS' . $row["MRP"] . '</span> 
                                      | ' . $row["Discount"] . '% discount
                                   </a> 
      
        </div>
      </div>
            </div>
       ';
      echo '
            <div class="container-fluid" id="description">
      <div class="row">
        <h2> Description </h2> 
                          <p>' . $row['Description'] . '</p>
                          <pre style="background:inherit;border:none;">
     PRODUCT CODE  ' . $row["PID"] . '   <hr> 
     TITLE         ' . $row["Title"] . ' <hr> 
     AUTHOR        ' . $row["Author"] . ' <hr>
     AVAILABLE     ' . $row["Available"] . ' <hr> 
     PUBLISHER     ' . $row["Publisher"] . ' <hr> 
     EDITION       ' . $row["Edition"] . ' <hr>
     LANGUAGE      ' . $row["Language"] . ' <hr>
     PAGES         ' . $row["page"] . ' <hr>
     WEIGHT        ' . $row["weight"] . ' <hr>
                          </pre>
      </div>
    </div>
  ';


    }
  }
  echo '</div>';
  ?>
  <?php
  $customer = $_SESSION['user'];
  $PID = $_GET['ID'];
  $query = "SELECT * FROM comment_product WHERE PID = '$PID'";
  $result = mysqli_query($con, $query) or die(mysql_error);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="comment-box">' .
        '<p class="comment">' . $row['UserName'] . ' :   ' . $row["Comment"] . '</p>
              </div>';
    }
  }
  ?>
  <div class='comment-box'>
    <form action=<?php echo "description.php?ID={$PID}" ?> method="POST">
      <!-- <textarea class="comment"> Type your comment here.</textarea> -->
      <!-- <br> -->
      <input type="text" name="submit-comment" class='comment' placeholder="Type your comment here">
    </form>
  </div>
  <div class="container-fluid" id="service">
    <div class="row">
      <div class="col-sm-6 col-md-3 text-center">
        <span class="glyphicon glyphicon-heart"></span> <br>
        24X7 Care <br>
        Happy to help 24X7, call us on 0120-3062244 or click here
      </div>
      <div class="col-sm-6 col-md-3 text-center">
        <span class="glyphicon glyphicon-ok"></span> <br>
        Trust <br>
        Your money is yours! All refunds come with no question asked guarantee.
      </div>
      <div class="col-sm-6 col-md-3 text-center">
        <span class="glyphicon glyphicon-check"></span> <br>
        Assurance <br>
        We provide 100% assurance. If you have any issue, your money is immediately refunded. Sit back and enjoy
        your
        shopping.
      </div>
      <div class="col-sm-6 col-md-3 text-center">
        <span class="glyphicon glyphicon-tags"></span> <br>
        24X7 Care <br>
        Happiness is guaranteed. If we fall short of your expectations, give us a shout.
      </div>
    </div>
  </div>



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script>
    $(function () {
      var link = $('#buyLink').attr('href');
      $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
      $('#quantity').on('change', function () {
        $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
      });
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="./js/star-rating-tuto.js"></script>
</body>

</html>