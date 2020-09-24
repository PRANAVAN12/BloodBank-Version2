<?php
	include('../header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#city').DataTable();
} );
</script>
<style>
body{
  font-family: 'Comfortaa', cursive;
}

h1 {
  text-align: center;
  letter-spacing: 2px;
  font-weight: 300;
  font-size:40px;
  margin-top: 80px;
}

h2{
  text-align:center;
  font-size:25px;
  font-weight: 100;
  margin-top: 20px;
}

h3{
  text-align:center;
  margin-top: 30px;
  font-size: 30px;
}

section{
  width: 500px;
  margin:50px auto;
  p{
    font-size:20px;
    font-weight: bold;
    margin-bottom: 15px;
  }
}

table{
  width:100%;
  margin: auto;
  tr{
    width: 100%;
  }
  th,td{
    box-sizing:border-box;
    padding: 15px;
  }
  thead{
    th{
      background: #000;
      color: #fff;
      text-align: left;
    }
  }

  tbody{
    text-align: left;
    th{
      background: #eee;
    }
  }
}

.sp{
  width: 420px;
  margin-top: 40px;
  tr{
      display: block;
      width: 100%;
    }
     thead{
      display: none;
    }
    tbody{
    display: block;
    width: 100%;
    overflow: hidden;
      th{
        list-style:none;
      }
      td{
        margin-left: 40px;
      }
      th,td{
        width: 100%;
        display: list-item;
      }
    }
}
</style>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

  <h2>Hello,  <span style="color: blue"> <?php echo $_SESSION['username']?></span> Manage Locations Here. </h2> <br />
  <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcity">Add new</button></p> <br />           
  <table  id="city">
    <thead>
      <tr>
        <th>Postal Code</th>
        <th>Location</th>
        <th>Region</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $city = $connection->query("SELECT state.state_id, state.state_name, city.city_id, city.city_code, city.city_name, city.state_fk FROM city LEFT JOIN state ON state.state_id=city.state_fk");
      while($row=$city->fetch_array()){
       ?>

      	<tr>
        <td><?php echo $row['city_code'];?></td>
        <td><?php echo $row['city_name'];?></td>
      	<td><?php echo $row['state_name'];?></td>
      		
      		<td><button type="button" data-toggle="modal" data-target="#deletecity<?php echo $row['city_id']?>" class="btn btn-danger">Delete</button>
      		<button type="button" data-toggle="modal" data-target="#editcity<?php echo $row['city_id'];?>" class="btn btn-warning">Edit</button></td>
      	</tr>
      	 <!-- delete city modal -->
      	<div class="modal fade" id="deletecity<?php echo $row['city_id']?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to delete ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <a href="delete_city.php?city_id=<?php echo $row['city_id'];?>"> <button type="button" class="btn btn-danger">Delete</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- end of delete state modal

  <!-- edit state modal -->
   <div class="modal fade" id="editcity<?php echo $row['city_id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Location</h4>
        </div>
        <div class="modal-body">
        <form action="edit_city.php?city_id=<?php echo $row['city_id'];?>" method="post">
          <div class="form-group">
          	<input type="text" name="code" id="code" class="form-control" value="<?php echo $row['city_code']?>"></input>
          </div>
          <div class="form-group">
            <select class="form-control" name="state" >
              <option> Select</option>
              <?php
              if(isset($_GET["state"])){
              $draft= $_GET["state"];
              echo $draft;
              }   
              $state = $connection->query("SELECT * FROM state");
              while($fetch = $state->fetch_array()){?>
               <option selected="" value="<?php echo $fetch['state_id']?>"  > <?php echo $fetch['state_name']?></option>
              <?php }
              ?>
             
            </select>
          </div>
          <div class="form-group">
          	<input type="text" name="name" id="name" class="form-control" value="<?php echo $row['city_name']?>"></input>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Edit</button>

        </div>
      </div>
      </form>
      
    </div>
  </div> 
<?php }
      ?>
    </tbody> 
  </table>
</div>
	</div>
</div>

<!-- add state modal -->
<div class="modal fade" id="addcity" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Location</h4>
        </div>
        <div class="modal-body">
        <form action="add_city.php" method="post">
          <div class="form-group">
          	<input type="text" class="form-control" name="code" id="code" placeholder="Enter Code"></input>
          </div>
          <div class="form-group">
            <select class="form-control" name="state" id="state" >
              <option> Select</option>
              <?php
              $state = $connection->query("SELECT * FROM state");
              while($fetch = $state->fetch_array()){?>
               <option value="<?php echo $fetch['state_id']?>"> <?php echo $fetch['state_name']?></option>
              <?php }
              ?>
             
            </select>
          </div>






          
          <div class="form-group">
            <input type="text" class="form-control" name="city" id="city" placeholder="Enter city"></input>
          </div>
          
          <div class="form-group">
          	<textarea type="text" class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addcity">Add</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<?php
	include('../footer.php');
?>


<style>

</style>