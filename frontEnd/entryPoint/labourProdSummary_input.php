<?php


$insert = false;
$update = false;
$delete = false;

// Connecting to the database

include "../../_includes/_dbconnect.php";

if (isset($_GET['delete'])) {
    $_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `labor_prod_summary` where `_id`=$_id ";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['_idEdit'])) {
        // Update the record

        $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $unitSize = $_POST['unitSizeEdit'];
        $tablet = $_POST['tabletEdit'];
        $syrup = $_POST['syrupEdit'];
        $arksaji = $_POST['arksajiEdit'];
        $dawasaji = $_POST['dawasajiEdit'];
        $grinding = $_POST['grindingEdit'];
        $total = $_POST['totalEdit'];

        // SQL query to be executed

        $sql = "UPDATE `labor_prod_summary` SET `name`= '$name' , `unit_size`= '$unitSize', `tablet` = '$tablet', `syrup` = '$syrup', `arksaji` = '$arksaji', `dawasaji` = '$dawasaji', `grinding` = '$grinding', `total` = '$total' WHERE `labor_prod_summary`.`_id`=$_id";
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
        $tablet = $_POST['tablet'];
        $syrup = $_POST['syrup'];
        $arksaji = $_POST['arksaji'];
        $dawasaji = $_POST['dawasaji'];
        $grinding = $_POST['grinding'];
        $total = $_POST['total'];

        // SQL query to be executed
        // INSERT INTO `labor_prod_summary` (`_id`, `name`, `unit_size`, `tablet`, `syrup`, `arksaji`, `dawasaji`, `grinding`, `total`) VALUES (NULL, 'sq', '1', '1', '1', '1', '1', '11', '1');

        $sql = "INSERT INTO `labor_prod_summary` (`name`, `unit_size`, `tablet`, `syrup`, `arksaji`, `dawasaji`, `grinding`, `total`) VALUES ('$name', '$unitSize', '$tablet' ,'$syrup', '$arksaji', '$dawasaji', '$grinding', '$total')";
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
            <form action="labourProdSummary_input.php" method="post">
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
                        <label for="tabletEdit" class="form-label">Number of Employees</label>
                        <input type="text" class="form-control" id="tabletEdit" aria-describedby="emailHelp" name="tabletEdit">
                    </div>

                    <div class="mb-3">
                        <label for="syrupEdit" class="form-label">No of Days</label>
                        <input type="text" class="form-control" id="syrupEdit" aria-describedby="emailHelp" name="syrupEdit">
                    </div>

                    <div class="mb-3">
                        <label for="arksajiEdit" class="form-label">Number of days employee works</label>
                        <input type="text" class="form-control" id="arksajiEdit" aria-describedby="emailHelp" name="arksajiEdit">
                    </div>

                    <div class="mb-3">
                        <label for="dawasajiEdit" class="form-label">Employee Salary per Day</label>
                        <input type="text" class="form-control" id="dawasajiEdit" aria-describedby="emailHelp" name="dawasajiEdit">
                    </div>

                    <div class="mb-3">
                        <label for="grindingEdit" class="form-label">Cost</label>
                        <input type="text" class="form-control" id="grindingEdit" aria-describedby="emailHelp" name="grindingEdit">
                    </div>

                    <div class="mb-3">
                        <label for="totalEdit" class="form-label">Total</label>
                        <input type="text" class="form-control" id="totalEdit" aria-describedby="emailHelp" name="totalEdit">
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
    <h2>Input for Labour Product Summary: </h2>
    <form action="labourProdSummary_input.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="unitSize" class="form-label">Unit Size</label>
            <input type="text" class="form-control" id="unitSize" aria-describedby="emailHelp" name="unitSize">
        </div>
        <!-- `name`, `unit_size`, `tablet`, `syrup`, `arksaji`, `dawasaji`, `grinding`, `total` -->
        <div class="mb-3">
            <label for="tablet" class="form-label">Tablet</label>
            <input type="text" class="form-control" id="tablet" aria-describedby="emailHelp" name="tablet">
        </div>

        <div class="mb-3">
            <label for="syrup" class="form-label">Syrup</label>
            <input type="text" class="form-control" id="syrup" aria-describedby="emailHelp" name="syrup">
        </div>

        <div class="mb-3">
            <label for="arksaji" class="form-label">Arksaji</label>
            <input type="text" class="form-control" id="arksaji" aria-describedby="emailHelp" name="arksaji">
        </div>

        <div class="mb-3">
            <label for="dawasaji" class="form-label">Dawasaji</label>
            <input type="text" class="form-control" id="dawasaji" aria-describedby="emailHelp" name="dawasaji">
        </div>

        <div class="mb-3">
            <label for="grinding" class="form-label">Grinding</label>
            <input type="text" class="form-control" id="grinding" aria-describedby="emailHelp" name="grinding">
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="text" class="form-control" id="total" aria-describedby="emailHelp" name="total">
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
                <th scope="col">Tablet</th>
                <th scope="col">Syrup</th>
                <th scope="col">Arksaji</th>
                <th scope="col">Dawasaji</th>
                <th scope="col">Grinding</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        <!-- `name`, `unit_size`, `tablet`, `syrup`, `arksaji`, `dawasaji`, `grinding`, `total` -->
            <?php
            $sql = "SELECT * FROM `labor_prod_summary`";
            $result = mysqli_query($conn, $sql);
            $_id = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $_id = $_id + 1;
                echo "<tr>
            <th scope='row'>" . $_id . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['unit_size'] . "</td>
            <td>" . $row['tablet'] . "</td>
            <td>" . $row['syrup'] . "</td>
            <td>" . $row['arksaji'] . "</td>
            <td>" . $row['dawasaji'] . "</td>
            <td>" . $row['grinding'] . "</td>
            <td>" . $row['total'] . "</td>
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



        <!-- $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $unitSize = $_POST['unitSizeEdit'];
        $tablet = $_POST['tabletEdit'];
        $syrup = $_POST['syrupEdit'];
        $arksaji = $_POST['arksajiEdit'];
        $dawasaji = $_POST['dawasajiEdit'];
        $grinding = $_POST['grindingEdit'];
        $total = $_POST['totalEdit']; -->

<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            tr = e.target.parentNode.parentNode;
            name = tr.getElementsByTagName("td")[0].innerText;
            unitSize = tr.getElementsByTagName("td")[1].innerText;
            tablet = tr.getElementsByTagName("td")[2].innerText;
            syrup = tr.getElementsByTagName("td")[3].innerText;
            arksaji = tr.getElementsByTagName("td")[4].innerText;
            dawasaji = tr.getElementsByTagName("td")[5].innerText;
            grinding = tr.getElementsByTagName("td")[6].innerText;
            total = tr.getElementsByTagName("td")[7].innerText;
            // console.log(name, unitSize);
            nameEdit.value = name;
            unitSizeEdit.value = unitSize;
            tabletEdit.value = tablet;
            syrupEdit.value = syrup;
            arksajiEdit.value = arksaji;
            dawasajiEdit.value = dawasaji;
            grindingEdit.value = grinding;
            totalEdit.value = total;
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
                window.location = `labourProdSummary_input.php?delete=${_id}`;
            } else {
                console.log("no");
            }
        })
    })
</script>

<?php include "_sidebar2.php"; ?>