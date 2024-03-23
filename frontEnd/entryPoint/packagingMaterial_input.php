<?php


$insert = false;
$update = false;
$delete = false;

// Connecting to the database

include "../../_includes/_dbconnect.php";

if (isset($_GET['delete'])) {
    $_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `packaging_material` where `_id`=$_id ";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['_idEdit'])) {
        // Update the record

        $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $unitSize = $_POST['unitSizeEdit'];
        $coverBox = $_POST['coverBoxEdit'];
        $label = $_POST['labelEdit'];
        $jar = $_POST['jarEdit'];
        $cartoon = $_POST['cartoonEdit'];
        $cap = $_POST['capEdit'];
        $total = $_POST['totalEdit'];
        $unitLot = $_POST['unitLotEdit'];
        $costLot = $_POST['costLotEdit'];

        // SQL query to be executed

        $sql = "UPDATE `packaging_material` SET `name`= '$name' , `unit_size`= '$unitSize', `cover_box` = '$coverBox', `label` = '$label', `jar` = '$jar', `carton` = '$cartoon', `cap` = '$cap', `total_cost` = '$total', `unit_per_lot` = '$unitLot', `total_cost_per_lot` = '$costLot' WHERE `packaging_material`.`_id`=$_id";
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
        $coverBox = $_POST['coverBox'];
        $label = $_POST['label'];
        $jar = $_POST['jar'];
        $cartoon = $_POST['cartoon'];
        $cap = $_POST['cap'];
        $total = $_POST['total'];
        $unitLot = $_POST['unitLot'];
        $costLot = $_POST['costLot'];

        // SQL query to be executed
        // INSERT INTO `packaging_material` (`_id`, `name`, `unit_size`, `cover_box`, `label`, `jar`, `carton`, `cap`, `total_cost`, `unit_per_lot`, `total_cost_per_lot`) VALUES (NULL, 'ew', '1', '1', '1', '1', '1', '1', '1', '1', '1');

        $sql = "INSERT INTO `packaging_material` (`name`, `unit_size`, `cover_box`, `label`, `jar`, `carton`, `cap`, `total_cost`, `unit_per_lot`, `total_cost_per_lot`) VALUES ('$name', '$unitSize', '$coverBox' ,'$label', '$jar', '$cartoon', '$cap', '$total', '$unitLot', '$costLot')";
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
            <form action="packagingMaterial_input.php" method="post">
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
                        <label for="coverBoxEdit" class="form-label">Cover Box</label>
                        <input type="text" class="form-control" id="coverBoxEdit" aria-describedby="emailHelp" name="coverBoxEdit">
                    </div>

                    <div class="mb-3">
                        <label for="labelEdit" class="form-label">Label</label>
                        <input type="text" class="form-control" id="labelEdit" aria-describedby="emailHelp" name="labelEdit">
                    </div>

                    <div class="mb-3">
                        <label for="jarEdit" class="form-label">Jar</label>
                        <input type="text" class="form-control" id="jarEdit" aria-describedby="emailHelp" name="jarEdit">
                    </div>

                    <div class="mb-3">
                        <label for="cartoonEdit" class="form-label">Cartoon</label>
                        <input type="text" class="form-control" id="cartoonEdit" aria-describedby="emailHelp" name="cartoonEdit">
                    </div>

                    <div class="mb-3">
                        <label for="capEdit" class="form-label">Cap</label>
                        <input type="text" class="form-control" id="capEdit" aria-describedby="emailHelp" name="capEdit">
                    </div>

                    <div class="mb-3">
                        <label for="totalEdit" class="form-label">Total cost</label>
                        <input type="text" class="form-control" id="totalEdit" aria-describedby="emailHelp" name="totalEdit">
                    </div>

                    <div class="mb-3">
                        <label for="unitLotEdit" class="form-label">Units per Lot</label>
                        <input type="text" class="form-control" id="unitLotEdit" aria-describedby="emailHelp" name="unitLotEdit">
                    </div>

                    <div class="mb-3">
                        <label for="costLotEdit" class="form-label">Cost Per Lot</label>
                        <input type="text" class="form-control" id="costLotEdit" aria-describedby="emailHelp" name="costLotEdit">
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
    <form action="packagingMaterial_input.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="unitSize" class="form-label">Unit Size</label>
            <input type="text" class="form-control" id="unitSize" aria-describedby="emailHelp" name="unitSize">
        </div>
        <!-- `name`, `unit_size`, `cover_box`, `label`, `jar`, `carton`, `cap`, `total_cost`, `unit_per_lot`, `total_cost_per_lot` -->
        <div class="mb-3">
            <label for="coverBox" class="form-label">Cover Box</label>
            <input type="text" class="form-control" id="coverBox" aria-describedby="emailHelp" name="coverBox">
        </div>

        <div class="mb-3">
            <label for="label" class="form-label">Label</label>
            <input type="text" class="form-control" id="label" aria-describedby="emailHelp" name="label">
        </div>

        <div class="mb-3">
            <label for="jar" class="form-label">Jar</label>
            <input type="text" class="form-control" id="jar" aria-describedby="emailHelp" name="jar">
        </div>

        <div class="mb-3">
            <label for="cartoon" class="form-label">Cartoon</label>
            <input type="text" class="form-control" id="cartoon" aria-describedby="emailHelp" name="cartoon">
        </div>

        <div class="mb-3">
            <label for="cap" class="form-label">Cap</label>
            <input type="text" class="form-control" id="cap" aria-describedby="emailHelp" name="cap">
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total cost</label>
            <input type="text" class="form-control" id="total" aria-describedby="emailHelp" name="total">
        </div>

        <div class="mb-3">
            <label for="unitLot" class="form-label">Units per Lot</label>
            <input type="text" class="form-control" id="unitLot" aria-describedby="emailHelp" name="unitLot">
        </div>

        <div class="mb-3">
            <label for="costLot" class="form-label">Cost Per Lot</label>
            <input type="text" class="form-control" id="costLot" aria-describedby="emailHelp" name="costLot">
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
                <th scope="col">Cover Box</th>
                <th scope="col">Label</th>
                <th scope="col">Jar</th>
                <th scope="col">Cartoon</th>
                <th scope="col">Cap</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Units per Lot</th>
                <th scope="col">Total Cost per Unit</th>
            </tr>
        </thead>
        <tbody>
            <!-- `name`, `unit_size`, `cover_box`, `label`, `jar`, `carton`, `cap`, `total_cost`, `unit_per_lot`, `total_cost_per_lot` -->
            <?php
            $sql = "SELECT * FROM `packaging_material`";
            $result = mysqli_query($conn, $sql);
            $_id = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $_id = $_id + 1;
                echo "<tr>
            <th scope='row'>" . $_id . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['unit_size'] . "</td>
            <td>" . $row['cover_box'] . "</td>
            <td>" . $row['label'] . "</td>
            <td>" . $row['jar'] . "</td>
            <td>" . $row['carton'] . "</td>
            <td>" . $row['cap'] . "</td>
            <td>" . $row['total_cost'] . "</td>
            <td>" . $row['unit_per_lot'] . "</td>
            <td>" . $row['total_cost_per_lot'] . "</td>
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

        <!-- `name`, `unit_size`, `cover_box`, `label`, `jar`, `carton`, `cap`, `total_cost`, `unit_per_lot`, `total_cost_per_lot` -->
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            tr = e.target.parentNode.parentNode;
            name = tr.getElementsByTagName("td")[0].innerText;
            unitSize = tr.getElementsByTagName("td")[1].innerText;
            coverBox = tr.getElementsByTagName("td")[2].innerText;
            label = tr.getElementsByTagName("td")[3].innerText;
            jar = tr.getElementsByTagName("td")[4].innerText;
            cartoon = tr.getElementsByTagName("td")[5].innerText;
            cap = tr.getElementsByTagName("td")[6].innerText;
            total = tr.getElementsByTagName("td")[7].innerText;
            unitLot = tr.getElementsByTagName("td")[8].innerText;
            costLot = tr.getElementsByTagName("td")[9].innerText;
            // console.log(name, unitSize);
            nameEdit.value = name;
            unitSizeEdit.value = unitSize;
            coverBoxEdit.value = coverBox;
            labelEdit.value = label;
            jarEdit.value = jar;
            cartoonEdit.value = cartoon;
            capEdit.value = cap;
            totalEdit.value = total;
            unitLotEdit.value = unitLot;
            costLotEdit.value = costLot;
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
                window.location = `packagingMaterial_input.php?delete=${_id}`;
            } else {
                console.log("no");
            }
        })
    })
</script>

<?php include "_sidebar2.php"; ?>