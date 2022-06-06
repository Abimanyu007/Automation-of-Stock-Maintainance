<?php
include("auth_session.php");
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Stock Maintainance</title>
    <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css"/>
    <link rel="stylesheet" href="style2.css"/>
    <link rel="stylesheet" href="style3.css"/>
    <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AURCT Stock Maintainance</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./dashboard_hod.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-current="page" href="#">View Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./edit.php">Add Entry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  href="./about.php">About</a>
        </li>
    
      </ul>

<?php
  // Define Email Address
  $email  = $_SESSION['username'];
  
  // Get the username by slicing string
  $usr = strstr($email, '@', true);
  
  // Display the username
  
?> 

      <form class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <p class="top-usr" style="color:white">Hey, <?php echo $_SESSION['username'];"\n"; ?>!</p>
        </li>
</ul>
     
      <a href="logout.php"><button class="btn btn-outline-light lgt" type="button">Logout</button></a>

</form>
    </div>
  </div>
</nav>
<br>

<div class="tope container-fluid" >
<h4 class="text-center">Hi <?php echo $usr; ?>!</h4>
<h3 class="text-center">Stock Register</h3>
<button type="button" onclick="window.print();" class="btn btn-outline-dark">Print</button>
</div>


<div class="container-fluid">
    <div class="row">
      <div class="container"  style="padding-right: 1000px;">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table id="example" class="table">
              <thead>
                <th>Id</th>
                <th>Date</th>
                <th>Bill</th>
                <th>Name</th>
                <th>P_Cost</th>
                <th>Qty</th>
                <th>T_Cost</th>
                <th>Warranty</th> 
                <th>Stock</th>
                <th>Supplier</th>  
                <th>Location</th>
                <th>Condition</th>
                <th>Type</th>
                <th>Options</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [11]
          },

        ]
      });
    });
    $(document).on('submit', '#addUser', function(e) {
      e.preventDefault();
      var bill = $('#addBillField').val();
      var name = $('#addNameField').val();
      var pcost = $('#addPCostField').val();
      var qty = $('#addQtyField').val();
      var tcost = $('#addTCostField').val();
      var warranty = $('#addWarrantyField').val();
      var stock = $('#addStockField').val();
      var supplier = $('#addSupplierField').val();
      var location = $('#addLocationField').val();
      var condition = $('#addConditionField').val();
      var type = $('#addTypeField').val();
      if (name != '' && qty != '' && cost != '' && type != '') {
        $.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            bill: bill,
            name: name,
            pcost: pcost,
            qty: qty,
            tcost: tcost,
            warranty: warranty,
            stock: stock,
            supplier: supplier,
            location: location,
            cond: cond,
            type: type
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $(document).on('submit', '#updateUser', function(e) {
      e.preventDefault();
      //var tr = $(this).closest('tr');
      var bill = $('#BillField').val();
      var name = $('#NameField').val();
      var pcost = $('#PCostField').val();
      var qty = $('#QtyField').val();
      var tcost = $('#TCostField').val();
      var warranty = $('#WarrantyField').val();
      var stock = $('#StockField').val();
      var supplier = $('#SupplierField').val();
      var location = $('#LocationField').val();
      var cond = $('#ConditionField').val();
      var type = $('#TypeField').val();
      var id = $('#id').val();
      if (name != '' && qty != '' && type != '') {
        $.ajax({
          url: "update_user.php",
          type: "post",
          data: {
            bill: bill,
            name: name,
            pcost:pcost,
            qty: qty,
            tcost: tcost,
            warranty: warranty,
            stock: stock,
            supplier: supplier,
            location: location,
            cond: cond,
            type: type,
            id: id
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, bill,name,pcost,qty,tcost,warranty,stock,supplier,location,cond,type,button]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      // console.log(selectedRow);
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
              $('#BillField').val(json.bill);
              $('#NameField').val(json.name);
              $('#PCostField').val(json.pcost);
              $('#QtyField').val(json.qty);
              $('#TCostField').val(json.tcost);
              $('#WarrantyField').val(json.warranty);
              $('#StockField').val(json.stock);
              $('#SupplierField').val(json.supplier);
              $('#LocationField').val(json.location);
              $('#ConditionField').val(json.cond);
              $('#TypeField').val(json.type);
              $('#id').val(id);
              $('#trid').val(trid);
        }
      })
    });

    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "delete_user.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }
    })


  </script>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Entry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <form id="updateUser">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
 <div class="mb-3 row">
              <label for="BillField" class="col-md-3 form-label">Bill</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="BillField" name="bill">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="NameField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="NameField" name="name">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="PCostField" class="col-md-3 form-label">Cost/item</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="PCostField" name="pcost">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="QtyField" class="col-md-3 form-label">Quantity</label>
              <div class="col-md-9">
                <input type="number" class="form-control" id="QtyField" name="qty">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="TCostField" class="col-md-3 form-label">Total Cost</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="TCostField" name="tcost">
              </div>
            </div>


            <div class="mb-3 row">
              <label for="WarrantyField" class="col-md-3 form-label">Warranty</label>
              <div class="col-md-9">
                <input type="number" class="form-control" id="WarrantyField" name="warranty">
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="StockField" class="col-md-3 form-label">Stock</label>
              <div class="col-md-9">
                <input type="number" class="form-control" id="StockField" name="stock">
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="SupplierField" class="col-md-3 form-label">Supplier</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="SupplierField" name="supplier">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="LocationField" class="col-md-3 form-label">Location</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="LocationField" name="location">
              </div>
            </div>

            <div class="mb-3 row">
<label for="ConditionField">Choose The Condition:</label>
<select id="ConditionField" name="cond" class="form-control">
<option value="Bad">Bad</option>
<option value="Average">Average</option>
<option value="Good">Good</option>
</select>
</div>

            <div class="mb-3 row">
            <label for="TypeField">Choose The Type:</label>
            <select id="TypeField" class="form-control">
            <option value="Consumable">Consumable</option>
            <option value="Non-consumable">Non-Consumable</option>
            </select>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="ppnt" class="btn btn-secondary ppnt" >Print</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Add user Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Entry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">

            <div class="mb-3 row">
              <label for="addBillField" class="col-md-3 form-label">Bill</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addBillField" name="bill">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="addNameField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addNameField" name="name">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="addPCostField" class="col-md-3 form-label">P_Cost</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addPCostField" name="pcost">
              </div>
            </div>


            <div class="mb-3 row">
              <label for="addQtyField" class="col-md-3 form-label">Quantity</label>
              <div class="col-md-9">
                <input type="number" class="form-control" id="addQtyField" name="qty">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="addTCostField" class="col-md-3 form-label">T_Cost</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addTCostField" name="tcost">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="addWarrantyField" class="col-md-3 form-label">Warranty</label>
              <div class="col-md-9">
                <input type="number" class="form-control" id="addWarrantyField" name="warranty">
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="addStockField" class="col-md-3 form-label">Stock</label>
              <div class="col-md-9">
                <input type="number" class="form-control" id="addStockField" name="stock">
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="addSupplierField" class="col-md-3 form-label">Supplier</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addSupplierField" name="supplier">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="addLocationField" class="col-md-3 form-label">Location</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addLocationField" name="location">
              </div>
            </div>

            <label for="addConditionField">Choose The Condition:</label>
            <select id="addConditionField" name="cond" class="form-control">
            <option value="Bad">Bad</option>
            <option value="Average">Average</option>
            <option value="Good">Good</option>
            </select>
            </div>

            <div class="mb-3 row">
            <label for="addTypeField">Choose The Type:</label>
              
              <select id="addTypeField">
  <option value="consumable">Consumable</option>
  <option value="non-consumable">Non-Consumable</option>
</select>
              
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
