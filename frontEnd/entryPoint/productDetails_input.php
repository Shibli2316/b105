<?php


$insert = false;
$update = false;
$delete = false;

// Connecting to the database

include "../../_includes/_dbconnect.php";

if (isset($_GET['delete'])) {
    $_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `product_detail` where `_id`=$_id ";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['_idEdit'])) {
        // Update the record

        $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $unitSize = $_POST['unitSizeEdit'];
        $storeOutput = $_POST['storeOutputEdit'];
        $prodInput = $_POST['prodInputEdit'];
        $prodOutput = $_POST['prodOutputEdit'];
        $packInput = $_POST['packInputEdit'];
        $prodGhan = $_POST['prodGhanEdit'];
        $rawCost = $_POST['rawCostEdit'];

        // SQL query to be executed

        $sql = "UPDATE `product_detail` SET `name`= '$name' , `unit_size`= '$unitSize', `store_output_in_kg` = '$storeOutput', `prod_input` = '$prodInput', `prod_output` = '$prodOutput', `packaging_input` = '$packInput', `prod_per_ghan` = '$prodGhan', `raw_mat_cost` = '$rawCost' WHERE `product_detail`.`_id`=$_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "Failed";
        }
    } else {
        // insert  the record
        $name = $_POST['name'];
        $unitSize = $_POST['unitSize'];
        $storeOutput = $_POST['storeOutput'];
        $prodInput = $_POST['prodInput'];
        $prodOutput = $_POST['prodOutput'];
        $packInput = $_POST['packInput'];
        $prodGhan = $_POST['prodGhan'];
        $rawCost = $_POST['rawCost'];


        // SQL query to be executed
        // INSERT INTO `product_detail` (`_id`, `name`, `unit_size`, `store_output_in_kg`, `prod_input`, `prod_output`, `packaging_input`, `prod_per_ghan`, `raw_mat_cost`) VALUES (NULL, 'jhds', '1', '1', '1', '1', '1', '11', '1');

        $sql = "INSERT INTO `product_detail` (`name`, `unit_size`, `store_output_in_kg`, `prod_input`, `prod_output`, `packaging_input`, `prod_per_ghan`, `raw_mat_cost`) VALUES ('$name', '$unitSize', '$storeOutput' ,'$prodInput', '$prodOutput', '$packInput', '$prodGhan', '$rawCost')";
        $result = mysqli_query($conn, $sql);

        // Adding a new trip
        if ($result) {
            $insert = true;
        } else {
            echo "The record was not inserted successfully due to ---> " . mysqli_error($conn);
        }
    }
}
?>

<?php include "_sidebar.php"; ?>

<!-- Edit modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
Edit Modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="productDetails_input.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_idEdit" id="_idEdit">

                    <div class="mb-3">
                        <label for="nameEdit" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameEdit" aria-describedby="emailHelp" name="nameEdit">
                    </div>

                    <div class="mb-3">
                        <label for="unitSizeEdit" class="form-label">Unit Size</label>
                        <input type="text" class="form-control" id="unitSizeEdit" aria-describedby="emailHelp" name="unitSizeEdit">
                    </div>

                    <div class="mb-3">
                        <label for="storeOutputEdit" class="form-label">Store Output</label>
                        <input type="text" class="form-control" id="storeOutputEdit" aria-describedby="emailHelp" name="storeOutputEdit">
                    </div>

                    <div class="mb-3">
                        <label for="prodInputEdit" class="form-label">Production Input</label>
                        <input type="text" class="form-control" id="prodInputEdit" aria-describedby="emailHelp" name="prodInputEdit">
                    </div>

                    <div class="mb-3">
                        <label for="prodOutputEdit" class="form-label">Production Output</label>
                        <input type="text" class="form-control" id="prodOutputEdit" aria-describedby="emailHelp" name="prodOutputEdit">
                    </div>

                    <div class="mb-3">
                        <label for="packInputEdit" class="form-label">Packing Input</label>
                        <input type="text" class="form-control" id="packInputEdit" aria-describedby="emailHelp" name="packInputEdit">
                    </div>

                    <div class="mb-3">
                        <label for="prodGhanEdit" class="form-label">Production per unit Ghan</label>
                        <input type="text" class="form-control" id="prodGhanEdit" aria-describedby="emailHelp" name="prodGhanEdit">
                    </div>

                    <div class="mb-3">
                        <label for="rawCostEdit" class="form-label">Raw material Cost</label>
                        <input type="text" class="form-control" id="rawCostEdit" aria-describedby="emailHelp" name="rawCostEdit">
                    </div>


                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your entry has been saved successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
}
?>

<?php
if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> The entry has been deleted successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
}
?>

<?php
if ($update) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> The entry has been updated successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
}
?>
<div class="container my-4">
    <h2>Input for Product Details: </h2>
    <form action="productDetails_input.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="unitSize" class="form-label">Unit Size</label>
            <input type="text" class="form-control" id="unitSize" aria-describedby="emailHelp" name="unitSize">
        </div>
        <!-- `name`, `unit_size`, `store_output_in_kg`, `prod_input`, `prod_output`, `packaging_input`, `prod_per_ghan`, `raw_mat_cost` -->
        <div class="mb-3">
            <label for="storeOutput" class="form-label">Store Output</label>
            <input type="text" class="form-control" id="storeOutput" aria-describedby="emailHelp" name="storeOutput">
        </div>

        <div class="mb-3">
            <label for="prodInput" class="form-label">Production Input</label>
            <input type="text" class="form-control" id="prodInput" aria-describedby="emailHelp" name="prodInput">
        </div>

        <div class="mb-3">
            <label for="prodOutput" class="form-label">Production Output</label>
            <input type="text" class="form-control" id="prodOutput" aria-describedby="emailHelp" name="prodOutput">
        </div>

        <div class="mb-3">
            <label for="packInput" class="form-label">Packing Input</label>
            <input type="text" class="form-control" id="packInput" aria-describedby="emailHelp" name="packInput">
        </div>

        <div class="mb-3">
            <label for="prodGhan" class="form-label">Production per unit Ghan</label>
            <input type="text" class="form-control" id="prodGhan" aria-describedby="emailHelp" name="prodGhan">
        </div>

        <div class="mb-3">
            <label for="rawCost" class="form-label">Raw material Cost</label>
            <input type="text" class="form-control" id="rawCost" aria-describedby="emailHelp" name="rawCost">
        </div>

        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>

<div class="container my-4">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">SNo</th>
                <th scope="col">Name</th>
                <th scope="col">Unit Size</th>
                <th scope="col">Store Output (in kg)</th>
                <th scope="col">Production Input</th>
                <th scope="col">Production Output</th>
                <th scope="col">Packing Input</th>
                <th scope="col">Production per unit Ghan</th>
                <th scope="col">Raw material cost</th>
            </tr>
        </thead>
        <tbody>
            <!-- `name`, `unit_size`, `store_output_in_kg`, `prod_input`, `prod_output`, `packaging_input`, `prod_per_ghan`, `raw_mat_cost` -->
            <?php
            $sql = "SELECT * FROM `product_detail`";
            $result = mysqli_query($conn, $sql);
            $_id = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $_id = $_id + 1;
                echo "<tr>
            <th scope='row'>" . $_id . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['unit_size'] . "</td>
            <td>" . $row['store_output_in_kg'] . "</td>
            <td>" . $row['prod_input'] . "</td>
            <td>" . $row['prod_output'] . "</td>
            <td>" . $row['packaging_input'] . "</td>
            <td>" . $row['prod_per_ghan'] . "</td>
            <td>" . $row['raw_mat_cost'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['_id'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['_id'] . ">Delete</button>  </td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<hr>









<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->


<!-- $name = $_POST['name'];
        $unitSize = $_POST['unitSize'];
        $noe = $_POST['noe'];
        $nod = $_POST['nod'];
        $eWork = $_POST['eWork'];
        $eSal = $_POST['eSal'];
        $cost = $_POST['cost']; -->

<!-- `name`, `unit_size`, `store_output_in_kg`, `prod_input`, `prod_output`, `packaging_input`, `prod_per_ghan`, `raw_mat_cost` -->
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            tr = e.target.parentNode.parentNode;
            name = tr.getElementsByTagName("td")[0].innerText;
            unitSize = tr.getElementsByTagName("td")[1].innerText;
            storeOutput = tr.getElementsByTagName("td")[2].innerText;
            prodInput = tr.getElementsByTagName("td")[3].innerText;
            prodOutput = tr.getElementsByTagName("td")[4].innerText;
            packInput = tr.getElementsByTagName("td")[5].innerText;
            prodGhan = tr.getElementsByTagName("td")[6].innerText;
            rawCost = tr.getElementsByTagName("td")[7].innerText;
            
            // console.log(name, unitSize);
            nameEdit.value = name;
            unitSizeEdit.value = unitSize;
            storeOutputEdit.value = storeOutput;
            prodInputEdit.value = prodInput;
            prodOutputEdit.value = prodOutput;
            packInputEdit.value = packInput;
            prodGhanEdit.value = prodGhan;
            rawCostEdit.value = rawCost;
            _idEdit.value = e.target.id;
            console.log(e.target.id);
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("delete", );
            _id = e.target.id.substr(1, );


            if (confirm("Are you sure")) {
                console.log("yes");
                window.location = `productDetails_input.php?delete=${_id}`;
            } else {
                console.log("no");
            }
        })
    })
</script>

<?php include "_sidebar2.php"; ?>