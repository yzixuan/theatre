<html>
<head>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/admin.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
        <div class="nav-top"> 
            <div class="navbar navbar-fixed-top navbar-inverse" id="top-nav"> 
              <div class="navbar-inner">
                <div class="container"> 
                    <a class="brand" href="./admindash.php">
                    <span><i class="fa-icon-wrench"></i> Popcorn Admin</span></a>
                     <div id="main-nav" class="scroller-spy">
                        <nav>
                          <ul class="nav pull-right" id="nav">
                            <li><a href="./index.php">Logout</a> </li>
                          </ul>
                        </nav>
                      </div>          
                </div>
              </div>
            </div>
        </div>    
<div class="container">
    <div class="row">
        <div class="span2">
          <ul class="navbar-nav sidenav-left">
            <li><a class="sidenavlink" href="./admin.php"><i class="fa-icon-home"></i> Home</a></li><br/>
            <li><a class="sidenavlink" href="./adminmovie.php"><i class="fa-icon-film"></i> Movies</a></li><br/>
            <li><a class="sidenavlink" href="./adminshow.php"><i class="fa-icon-magic"></i> Shows</a></li><br/>
            <li><a class="sidenavlink" href="./adminticket.php"><i class="fa-icon-money"></i> Tickets</a></li><br/>
            <li><a class="sidenavlink" href="./admincustomer.php"><i class="fa-icon-user"></i> Customers</a></li><br/>
            <li><a class="sidenavlink" href="./adminsales.php"><i class="fa-icon-star"></i> Sales Reports</a></li><br/>
            <li><a class="sideactive" href="./admincinema.php"><i class="fa-icon-building"></i> Cinemas</a></li>
          </ul>
        </div>
    <div class="span6">
    <br/>
    <?php

    $host = "localhost"; 
    $user = "webuser";
    $pass = "dbpassword"; 
    $db = "theatre";
    $sid = ($_GET["id"]); 
    //if(is_null($sid))
    //    header("Location: index.php");
    $r = mysql_connect($host, $user, $pass);

    if (!$r) {
        echo "Could not connect to server\n";
        trigger_error(mysql_error(), E_USER_ERROR);
    } else {
    }

    $r2 = mysql_select_db($db);
    if (!$r2) {
        echo "Cannot select database\n";
        trigger_error(mysql_error(), E_USER_ERROR); 
    } else {
    }

    $query = "SELECT * FROM `cinema`";
    $rs = mysql_query($query);
    if (!$rs) {
        echo "Could not execute query: $query";
        trigger_error(mysql_error(), E_USER_ERROR); 
    } else {
    } 
    echo '<div class="span8">';
    echo "<h3 class='folio-title'><span class='main-color'><i class='fa-icon-building'></i> All Cinemas</span></h3>";
    echo "<table class='table'><tr>
    <th>Cinema ID</th>
    <th>Cinema Name</th>
    <th>Address</th>
    <th>Tel No.</th>
    <th>Update</th></tr>";
    while ($row = mysql_fetch_row($rs)) {
        {
        echo "<tr>";
        echo "<td> $row[0] </td>";
        echo "<td> $row[1] </td>";
        echo "<td> $row[2] </td>";
        echo "<td> $row[3] </td>";
        echo '<td> <input type="checkbox" value='.$row[0].' id="movie" class="cb"> </td>';
        echo "</tr>";
        }
    }
    echo "</table>";
    echo "</div>";

    $query = "SELECT * FROM `hall`";
    $rs = mysql_query($query);
    if (!$rs) {
        echo "Could not execute query: $query";
        trigger_error(mysql_error(), E_USER_ERROR); 
    } else {
    } 
    echo '<div class="span4">';
    echo "<h3 class='folio-title'><span class='main-color'><i class='fa-icon-building'></i> All Halls</span></h3>";
    echo "<table class='table'><tr>
    <th>Hall ID</th>
    <th>Cinema ID</th>
    <th>Capacity</th>
    <th>Update</th></tr>";
    while ($row = mysql_fetch_row($rs)) {
        {
        echo "<tr>";
        echo "<td> $row[0] </td>";
        echo "<td> $row[1] </td>";
        echo "<td> $row[2] </td>";
        echo '<td> <input type="checkbox" value='.$row[0].' id="movie" class="cb"> </td>';
        echo "</tr>";
        }
    }
    echo "</table>";
    echo "</div>";    

    mysql_close();

    ?><br/>
            <div class="span4">
            <h3 class="folio-title"><span class="main-color"><i class="fa-icon-plus-sign"></i> Add a New Cinema</span></h3>
            <form method="post" action="add_cinema.php">
            <table class="formtable">
            <tr>
            <td width="100">Cinema Name</td>
            <td><input required name="cinemaName" type="text" id="cinemaName"></td>
            </tr>
            <tr>
            <td width="100">Address</td>
            <td><input required name="address" type="text" id="address"></td>
            </tr>
            <tr>
            <td width="100">Tel No.</td>
            <td><input required name="telNo" type="text" id="telNo"></td>
            </tr>
            <tr>
            <td width="100"></td>
            <td>
            <input name="add" class="pull-right btn btn-success" type="submit" id="add" value="Add Cinema">
            </td>
            </tr>
            </table>
            </form>

            <h3 class="folio-title"><span class="main-color"><i class="fa-icon-plus-sign"></i> Add a New Hall</span></h3>
            <form method="post" action="add_hall.php">
            <table class="table-condensed">
            <tr>
            <td width="100">Cinema ID</td>
            <td><input required name="cinemaID" type="number" min="1" id="cinemaID"></td>
            </tr>
            <tr>
            <td width="100">Capacity</td>
            <td><input required name="capacity" type="number" min="1" id="capacity"></td>
            </tr>
            <tr>
            <td width="100"></td>
            <td>
            <input name="add" class="pull-right btn btn-success" type="submit" id="add" value="Add Hall">
            </td>
            </tr>
            </table>
            </form>

            <h3 class="folio-title"><span class="main-color"><i class="fa-icon-minus-sign"></i> Remove a Facility</span></h3>
            <form method="post" action="delete_any.php">
            <table class="formtable">
            <tr>
            <td width="100">Hall ID or Cinema ID</td>
            <td><input name="id" type="number" min="1" id="id"></td>
            </tr>
            <tr>
            <td></td>
            <td>
            <input name="add" class="pull-right btn btn-danger" type="submit" id="del" value="Remove Facility">
            </td>
            </tr>
            </table>
            </form>          
        </div>
    </div>
</div>
</div>
</div>
</section>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$('.cb').mousedown(function() {
    if (!$(this).is(':checked')) {
        this.checked = confirm("Are you sure?");
        $(this).trigger("change");
        $id = this.id;
        $value = this.value;
        window.location.href = "./update_admin.php?value="+$value+"&id="+$id;
    }
});
</script>
</body>
</html>