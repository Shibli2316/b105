<?php


$insert = false;
$update = false;
$delete = false;

// Connecting to the database

include "../../_includes/_dbconnect.php";

if (isset($_GET['delete'])) {
    $_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `ingredient_sheet` where `_id`=$_id ";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['_idEdit'])) {
        // Update the record

        $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $rawMaterialName = $_POST['rawMaterialNameEdit'];
        $rawMaterialQnt = $_POST['rawMaterialQntEdit'];
        $rate = $_POST['rateEdit'];
        $amount = $_POST['amountEdit'];
        $unitSize = $_POST['unitSizeEdit'];

        // SQL query to be executed

        $sql = "UPDATE `ingredient_sheet` SET `prod_name`= '$name', `raw_mat_name` = '$rawMaterialName', `raw_mat_qty` = '$rawMaterialQnt', `rate` = '$rate', `amount` = '$amount', `unit_size`= '$unitSize' WHERE `ingredient_sheet`.`_id`=$_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "Failed";
        }
    } else {
        // insert  the record
        $name = $_POST['name'];
        $rawMaterialName = $_POST['rawMaterialName'];
        $rawMaterialQnt = $_POST['rawMaterialQnt'];
        $rate = $_POST['rate'];
        $amount = $_POST['amount'];
        $unitSize = $_POST['unitSize'];

        // SQL query to be executed
        // INSERT INTO `ingredient_sheet` (`_id`, `prod_name`, `raw_mat_name`, `raw_mat_qty`, `rate`, `amount`, `unit_size`) VALUES (NULL, 'ds', '1', '1', '1', '1', '1');

        $sql = "INSERT INTO `ingredient_sheet` (`prod_name`, `raw_mat_name`, `raw_mat_qty`, `rate`, `amount`, `unit_size`) VALUES ('$name', '$rawMaterialName', '$rawMaterialQnt', '$rate', '$amount', '$unitSize')";
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
            <form action="ingredientSheet_input.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_idEdit" id="_idEdit">

                    <div class="mb-3">
                        <label for="nameEdit" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="nameEdit" aria-describedby="emailHelp" name="nameEdit">
                    </div>

                    <div class="mb-3">
                        <label for="rawMaterialNameEdit" class="form-label">Raw material name</label>
                        <input type="text" class="form-control" id="rawMaterialNameEdit" aria-describedby="emailHelp" name="rawMaterialNameEdit">
                    </div>

                    <div class="mb-3">
                        <label for="rawMaterialQntEdit" class="form-label">Raw Material Quantity</label>
                        <input type="text" class="form-control" id="rawMaterialQntEdit" aria-describedby="emailHelp" name="rawMaterialQntEdit">
                    </div>

                    <div class="mb-3">
                        <label for="rateEdit" class="form-label">Rate</label>
                        <input type="text" class="form-control" id="rateEdit" aria-describedby="emailHelp" name="rateEdit">
                    </div>

                    <div class="mb-3">
                        <label for="amountEdit" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="amountEdit" aria-describedby="emailHelp" name="amountEdit">
                    </div>

                    <div class="mb-3">
                        <label for="unitSizeEdit" class="form-label">Unit Size</label>
                        <input type="text" class="form-control" id="unitSizeEdit" aria-describedby="emailHelp" name="unitSizeEdit">
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
    <h2>Input for ingredient_sheet: </h2>
    <form action="ingredientSheet_input.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="rawMaterialName" class="form-label">Raw Material Name</label>
            <input type="text" class="form-control" id="rawMaterialName" aria-describedby="emailHelp" name="rawMaterialName">
        </div>

        <div class="mb-3">
            <label for="rawMaterialQnt" class="form-label">Raw Material Quantity</label>
            <input type="text" class="form-control" id="rawMaterialQnt" aria-describedby="emailHelp" name="rawMaterialQnt">
        </div>

        <div class="mb-3">
            <label for="rate" class="form-label">Rate</label>
            <input type="text" class="form-control" id="rate" aria-describedby="emailHelp" name="rate">
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" class="form-control" id="amount" aria-describedby="emailHelp" name="amount">
        </div>

        <div class="mb-3">
            <label for="unitSize" class="form-label">Unit Size</label>
            <input type="text" class="form-control" id="unitSize" aria-describedby="emailHelp" name="unitSize">
        </div>

        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>

<div class="container my-4">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">SNo</th>
                <th scope="col">Product Name</th>
                <th scope="col">Raw material name</th>
                <th scope="col">Raw material Quantity</th>
                <th scope="col">Rate</th>
                <th scope="col">Amount</th>
                <th scope="col">Unit Size</th>
            </tr>
        </thead>
        <tbody>
        <!-- `prod_name`, `raw_mat_name`, `raw_mat_qty`, `rate`, `amount`, `unit_size` -->
            <?php
            $sql = "SELECT * FROM `ingredient_sheet`";
            $result = mysqli_query($conn, $sql);
            $_id = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $_id = $_id + 1;
                echo "<tr>
            <th scope='row'>" . $_id . "</th>
            <td>" . $row['prod_name'] . "</td>
            <td>" . $row['raw_mat_name'] . "</td>
            <td>" . $row['raw_mat_qty'] . "</td>
            <td>" . $row['rate'] . "</td>
            <td>" . $row['amount'] . "</td>
            <td>" . $row['unit_size'] . "</td>
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


<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            tr = e.target.parentNode.parentNode;
            name = tr.getElementsByTagName("td")[0].innerText;
            rawMaterialName = tr.getElementsByTagName("td")[1].innerText;
            rawMaterialQnt = tr.getElementsByTagName("td")[2].innerText;
            rate = tr.getElementsByTagName("td")[3].innerText;
            amount = tr.getElementsByTagName("td")[4].innerText;
            unitSize = tr.getElementsByTagName("td")[5].innerText;
            // console.log(name, unitSize);
            nameEdit.value = name;
            rawMaterialNameEdit.value = rawMaterialName;
            rawMaterialQntEdit.value = rawMaterialQnt;
            rateEdit.value = rate;
            amountEdit.value = amount;
            unitSizeEdit.value = unitSize;
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
                window.location = `ingredientSheet_input.php?delete=${_id}`;
            } else {
                console.log("no");
            }
        })
    })
</script>

<?php include "_sidebar2.php"; ?>