<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script> -->

  <!-- Optional theme -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

  <!-- Latest compiled and minified JavaScript -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

    <title></title>
  </head>
  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar" style="color:white"><span class="glyphicon glyphicon-th-list"></span></button>

            <a href="#" class="navbar-brand">Techno-MDY-Joy</a>
          </div>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="nav navbar-nav">
              <li class="active"> <a href="#">Home</a></li>
              <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class=""> <a href="cat.php?message=Mandalay">Mandalay</a> </li>
                  <li class=""> <a href="cat.php?message=Software">Software</a> </li>
                  <li class=""> <a href="cat.php?message=It company">Itcompany</a> </li>
                  <li class=""> <a href="cat.php?message=Networking">Networking</a> </li>
                </ul>
              </li>
              <li class="active"></li>
            </ul>
            <!-- endofnavitems -->
             <ul class="nav navbar-nav navbar-right">
               <li><button  onclick="getInsert()" class="btn btn-success navbar-btn">Insert<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></li>
               <li>
                 <form class="navbar-form" action="search.php" method="post">
                   <div class="input-group">
                     <input type="text" name="search" class="form-control" placeholder="Search Here..">
                     <div class="input-group-btn">
                       <button type="submit" class="btn btn-info"> <span class="glyphicon glyphicon-search"></span> </button>
                     </div>
                   </div>
                 </form>
               </li>
             </ul>
          </div>
        </nav>
      <!-- endofnav -->

      <!-- endoftable -->



    </div>
    <!-- endofcontainer -->


    <!-- start modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <a href="#" class="close" data-dismiss='modal'>&times;</a>
            <h3 class="modal-title">Insert Company</h3>
          </div>
          <div class="modal-body">
            <form action="sqlCompany.php" method="POST">
              <!-- name input -->
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required="" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>

                <input type="text" name="phone" id="phone" required="" class="form-control">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required="" class="form-control">
              </div>
              <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" required="" class="form-control">
              </div>
              <div class="form-group">
                  <button class="btn btn-success" name="save">
                    Save
                  </button>

                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end of modal -->
     <script type="text/javascript">
         function getInsert(){
          $('#myModal').modal('show');
      }

        function getEdit(id){
          $.ajax({
            url:'SqlCompanyEdit.php',
            type:'POST',
            data:{"editid":id},
            dataType:'json',
            success:function(data){
              // console.log(data);
              $('#id').val(data.id);
              $('#name1').val(data.name);
              $('#phone1').val(data.phone);
              $('#address1').val(data.address);
              $('#type1').val(data.type);
              // $('#myModalUpdate').modal('show');
              $('#myModalUpdate').modal('show');
            }
          })
          // alert("fuck");
        }

    </script>
    <?php
    // include 'index.php';
    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'company');

    $result_per_page = 10;

  $query = "SELECT * FROM companies";
  $result = mysqli_query($conn,$query);
  // print_r($result);
  $num_of_result = mysqli_num_rows($result);

  // determine the number of pages avaliable
  $num_of_page = ceil($num_of_result/$result_per_page);
  // echo "$num_of_page";
  // determine which page number visitor currently on
  if (!isset($_GET['page'])) {
     $page = 1;
    // echo("fuck");
    } else {
      $page = $_GET['page'];
    }
  // determine the sql limit starting number for the results on page
  $this_page_first_result = ($page-1)*$result_per_page;

  // retrieve selected data from database and display them on page
  $query = "SELECT * FROM companies LIMIT $this_page_first_result , $result_per_page";

  $result = mysqli_query($conn,$query);

    ?>
    <!-- <div class="panel panel-headline">
            <div class="panel-body"> -->
            <div class="container">
              <div class="container table-responsive">
                <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr class="success">
              <th>#</th>
              <th>Company Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Type</th>
              <th>Action</th>
            </tr>
          </thead>
                  <tbody>
                      <?php
                        require 'conn.php';

                        $db = new Index();
                        $sql = "SELECT * FROM companies";
                        $res = $db->con->query($sql);
                        // print_r($res);
                        // var_dump($res);
                        // $res->fetch_assoc();
                        // $res->fetch_array();
                        // $res->fetch_object();
                        // $res->fetch_all();
                        $i = 1;

                        //while loop for data retrieve
                        while ($row=$res->fetch_assoc()) {
                          //while loop for pagination to add $results
                          while ($row = mysqli_fetch_array($result)) {
                          $id = $row['id'];
                          $name = $row['name'];
                          $phone =$row['phone'];
                          $address = $row['address'];
                          $type = $row['type'];

                          echo "<tr>
                          <td>$i</td>
                          <td>$name</td>
                          <td>$phone</td>
                          <td>$address</td>
                          <td>$type</td>
                          <td>
                          <button class='btn btn-info' onclick='getEdit($id)'>Update</button>

                          <a href='sqlCompany.php?deleteid=$id' class='btn btn-danger'>Delete</a>
                          </td>
                          </tr>";
                          $i++;

                          }


                        }
                       ?>

                    </tbody>
        </table>
      </div>
     </div>
 <!-- </div> -->

   <div class="container" style="text-align:center">
     <?php

    echo "<br>";
      for ($page=1; $page <= $num_of_page; $page++) {
      echo '<a class="btn btn-default" href="page1.php?page='. $page.'">'.$page."</a> ";
      // header("location:page1['$page']");
      //currently page number
    }
    ?>
   </div>
      <!-- endoftable -->


  <div class="modal fade" id="myModalUpdate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a href="#" class="close" data-dismiss="modal">&times;</a>
        <h5 class="modal-title">Edit Company Form</h5>
      </div>
      <div class="modal-body">
            <form action="sqlCompany.php" method="POST">
              <!-- name input -->
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name1">Name</label>
                <input type="text" name="name" id="name1" required="" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone1">Phone</label>
                <input type="text" name="phone" id="phone1" class="form-control">
              </div>
              <div class="form-group">
                <label for="address1">Address</label>
                <textarea name="address" id="address1" required="" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="type1">Type</label>
                <input type="text" name="type" id="type1" class="form-control">
              </div>
              <div class="form-group">
                  <button class="btn btn-success" name="update">
                    Update
                  </button>
                </div>
            </form>
          </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


      <!-- endofpager -->

    </div>
    <!-- endofcontainer -->


 <!--     <script type="text/javascript">
         function getInsert(){
          $('#myModal').modal('show');
      }
    </script> -->

</body>
</html>
