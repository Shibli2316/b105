<?php


$insert = false;
$update = false;
$delete = false;

// Connecting to the database

include "../../_includes/_dbconnect.php";

if (isset($_GET['delete'])) {
    $_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `raw_material` where `_id`=$_id ";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['_idEdit'])) {
        // Update the record

        $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $rate = $_POST['rateEdit'];
        $oldRate = $_POST['oldRateEdit'];
        $finalRate = $_POST['finalRateEdit'];

        // SQL query to be executed

        $sql = "UPDATE `raw_material` SET `name`= '$name', `rate` = '$rate', `old_rate` = '$oldRate', `final_rate`= '$finalRate' WHERE `raw_material`.`_id`=$_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "Failed";
        }
    } else {
        // insert  the record
        $name = $_POST['name'];
        $rate = $_POST['rate'];
        $oldRate = $_POST['oldRate'];
        $finalRate = $_POST['finalRate'];

        // SQL query to be executed
        // INSERT INTO `raw_material` (`_id`, `name`, `rate`, `old_rate`, `final_rate`) VALUES (NULL, 'ws', '1', '1', '1');

        $sql = "INSERT INTO `raw_material` (`name`, `rate`, `old_rate`, `final_rate`) VALUES ('$name', '$rate', '$oldRate', '$finalRate')";
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
            <form action="rawMaterial_input.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_idEdit" id="_idEdit">

                    <div class="mb-3">
                        <label for="nameEdit" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameEdit" aria-describedby="emailHelp" name="nameEdit">
                    </div>

                    <div class="mb-3">
                        <label for="rateEdit" class="form-label">Rate</label>
                        <input type="text" class="form-control" id="rateEdit" aria-describedby="emailHelp" name="rateEdit">
                    </div>

                    <div class="mb-3">
                        <label for="oldRateEdit" class="form-label">Old Rate</label>
                        <input type="text" class="form-control" id="oldRateEdit" aria-describedby="emailHelp" name="oldRateEdit">
                    </div>

                    <div class="mb-3">
                        <label for="finalRateEdit" class="form-label">Final Rate</label>
                        <input type="text" class="form-control" id="finalRateEdit" aria-describedby="emailHelp" name="finalRateEdit">
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
    <h2>Input for raw_material: </h2>
    <form action="rawMaterial_input.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="rate" class="form-label">Rate</label>
            <input type="text" class="form-control" id="rate" aria-describedby="emailHelp" name="rate">
        </div>

        <div class="mb-3">
            <label for="oldRate" class="form-label">Old Rate</label>
            <input type="text" class="form-control" id="oldRate" aria-describedby="emailHelp" name="oldRate">
        </div>

        <div class="mb-3">
            <label for="finalRate" class="form-label">Final Rate</label>
            <input type="text" class="form-control" id="finalRate" aria-describedby="emailHelp" name="finalRate">
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
                <th scope="col">Rate</th>
                <th scope="col">Old Rate</th>
                <th scope="col">Final Rate</th>
            </tr>
        </thead>
        <tbody>
        <!-- `name`, `rate`, `old_rate`, `final_rate` -->
            <?php
            $sql = "SELECT * FROM `raw_material`";
            $result = mysqli_query($conn, $sql);
            $_id = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $_id = $_id + 1;
                echo "<tr>
            <th scope='row'>" . $_id . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['rate'] . "</td>
            <td>" . $row['old_rate'] . "</td>
            <td>" . $row['final_rate'] . "</td>
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
            rate = tr.getElementsByTagName("td")[1].innerText;
            oldRate = tr.getElementsByTagName("td")[2].innerText;
            finalRate = tr.getElementsByTagName("td")[3].innerText;
            // console.log(name, unitSize);
            nameEdit.value = name;
            rateEdit.value = rate;
            oldRateEdit.value = oldRate;
            finalRateEdit.value = finalRate;
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
                window.location = `rawMaterial_input.php?delete=${_id}`;
            } else {
                console.log("no");
            }
        })
    })
</script>


<?php include "_sidebar2.php"; ?>