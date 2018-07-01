<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="#" class="navbar-brand">List of Company</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"> <a href="#">Home</a></li>
            <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class=""> <a href="#">page</a> </li>
                <li class=""> <a href="#">page</a> </li>
                <li class=""> <a href="#">page</a> </li>
              </ul>
            </li>
            <li class="active"><a href="#" onclick="getInsert()">Insert</a>
                   </li>
          </ul>        
          <!-- endofnavitems -->
          <form class="navbar-form navbar-right">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-info"> <span class="glyphicon glyphicon-search"></span> </button>
              </div>
            </div>
          </form>
        </div>
        <!-- endofsearch -->
      </nav>
      <!-- endofnav -->
<div class="panel panel-headline">
            <div class="panel-body">
      <div class="container table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr class="success">
              <th>#</th>
              <th>Company Name</th>
              <th>Type</th>
              <th>Phone</th>
              <th>Address</th>
              <th></th>
            </tr>
          </thead>
                  <tbody>
                      <?php 
                        include 'index.php';
                        $db = new Index();
                        $sql = "SELECT * FROM companies";
                        $res = $db->con->query($sql);
                        // print_r($res);
                        // var_dump($res);
                        // $res->fetch_assoc();
                        // $res->fetch_array();
                        // $res->fetch_object();
                        // $res->fetch_all();
                        $i = 0;
                        while ($row=$res->fetch_assoc()) {
                          $id = $row['id'];
                          $name = $row['name'];
                          $phone =$row['phone'];
                          $address = $row['address'];
                          $type = $row['type'];
                          $i++;
                          echo "<tr>
                          <td>$i</td>
                          <td>$name</td>
                          <td>$phone</td>
                          <td>$address</td>
                          <td>$type</td>
                          <td>
                          <button class='btn btn-info' onclick='getEdit($id)'>Update</button>
                          
                          <a href='mysqltask.php?deleteid=$id' class='btn btn-danger'>Delete</a>
                          </td>
                          </tr>";

                        }
                       ?>
                       
                    </tbody>
        </table>
      </div>
    </div>
  </div>
      <!-- endoftable -->

      <div class="container" style="text-align:center">
        <ul class="pagination pagination-sm">
          <li class="previous"><a href="#"><span aria-hidden="true">&laquo;</span></a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li class="active"><a href="#">4</a></li>
          <li class="disable"><a href="#">5</a></li>
          <li class="next"><a href="#"><span aria-hidden="true">&raquo;</span></a></li>
        </ul>
      </div>
      <!-- endofpager -->

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
            <form action="sqlCompany.php" method="POST" enctype="multipart/form-data">
              <!-- name input -->
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required="" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control">
              </div>
              <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control">
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
    </script>
  </body>
</html>
