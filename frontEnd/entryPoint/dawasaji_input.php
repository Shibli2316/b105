<?php


$insert = false;
$update = false;
$delete = false;

// Connecting to the database

include "../../_includes/_dbconnect.php";

if (isset($_GET['delete'])) {
    $_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `dawasaji` where `_id`=$_id ";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['_idEdit'])) {
        // Update the record

        $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $unitSize = $_POST['unitSizeEdit'];
        $noe = $_POST['noeEdit'];
        $nod = $_POST['nodEdit'];
        $eWork = $_POST['eWorkEdit'];
        $eSal = $_POST['eSalEdit'];
        $cost = $_POST['costEdit'];

        // SQL query to be executed

        $sql = "UPDATE `dawasaji` SET `name`= '$name' , `unit_size`= '$unitSize', `no_emp` = '$noe', `no_days` = '$nod', `emp_days` = '$eWork', `e_sal_day` = '$eSal', `cost` = '$cost' WHERE `dawasaji`.`_id`=$_id";
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
        $noe = $_POST['noe'];
        $nod = $_POST['nod'];
        $eWork = $_POST['eWork'];
        $eSal = $_POST['eSal'];
        $cost = $_POST['cost'];

        // SQL query to be executed
        // INSERT INTO `dawasaji` (`_id`, `name`, `unit_size`, `no_emp`, `no_days`, `emp_days`, `e_sal_day`, `cost`) VALUES (NULL, 'testing', '1', '1', '1', '1', '1', '1');

        $sql = "INSERT INTO `dawasaji` (`name`, `unit_size`, `no_emp`, `no_days`, `emp_days`, `e_sal_day`, `cost`) VALUES ('$name', '$unitSize', '$noe', '$nod', '$eWork', '$eSal', '$cost')";
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
            <form action="dawasaji_input.php" method="post">
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
                        <label for="noeEdit" class="form-label">Number of Employees</label>
                        <input type="text" class="form-control" id="noeEdit" aria-describedby="emailHelp" name="noeEdit">
                    </div>

                    <div class="mb-3">
                        <label for="nodEdit" class="form-label">No of Days</label>
                        <input type="text" class="form-control" id="nodEdit" aria-describedby="emailHelp" name="nodEdit">
                    </div>

                    <div class="mb-3">
                        <label for="eWorkEdit" class="form-label">Number of days employee works</label>
                        <input type="text" class="form-control" id="eWorkEdit" aria-describedby="emailHelp" name="eWorkEdit">
                    </div>

                    <div class="mb-3">
                        <label for="eSalEdit" class="form-label">Employee Salary per Day</label>
                        <input type="text" class="form-control" id="eSalEdit" aria-describedby="emailHelp" name="eSalEdit">
                    </div>

                    <div class="mb-3">
                        <label for="costEdit" class="form-label">Cost</label>
                        <input type="text" class="form-control" id="costEdit" aria-describedby="emailHelp" name="costEdit">
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
    <h2>Input for dawasaji: </h2>
    <form action="dawasaji_input.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="unitSize" class="form-label">Unit Size</label>
            <input type="text" class="form-control" id="unitSize" aria-describedby="emailHelp" name="unitSize">
        </div>

        <div class="mb-3">
            <label for="noe" class="form-label">Number of Employees</label>
            <input type="text" class="form-control" id="noe" aria-describedby="emailHelp" name="noe">
        </div>

        <div class="mb-3">
            <label for="nod" class="form-label">No of Days</label>
            <input type="text" class="form-control" id="nod" aria-describedby="emailHelp" name="nod">
        </div>

        <div class="mb-3">
            <label for="eWork" class="form-label">Number of days employee works</label>
            <input type="text" class="form-control" id="eWork" aria-describedby="emailHelp" name="eWork">
        </div>

        <div class="mb-3">
            <label for="eSal" class="form-label">Employee Salary per Day</label>
            <input type="text" class="form-control" id="eSal" aria-describedby="emailHelp" name="eSal">
        </div>

        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="text" class="form-control" id="cost" aria-describedby="emailHelp" name="cost">
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
                <th scope="col"># Employees</th>
                <th scope="col"># Days</th>
                <th scope="col">Total Employe Days</th>
                <th scope="col">Emp Salary per Day</th>
                <th scope="col">Total Cost</th>
            </tr>
        </thead>
        <tbody>
            <!-- `name`, `unit_size`, `no_emp`, `no_days`, `emp_days`, `e_sal_day`, `cost` -->
            <?php
            $sql = "SELECT * FROM `dawasaji`";
            $result = mysqli_query($conn, $sql);
            $_id = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $_id = $_id + 1;
                echo "<tr>
            <th scope='row'>" . $_id . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['unit_size'] . "</td>
            <td>" . $row['no_emp'] . "</td>
            <td>" . $row['no_days'] . "</td>
            <td>" . $row['emp_days'] . "</td>
            <td>" . $row['e_sal_day'] . "</td>
            <td>" . $row['cost'] . "</td>
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
            unitSize = tr.getElementsByTagName("td")[1].innerText;
            noe = tr.getElementsByTagName("td")[2].innerText;
            nod = tr.getElementsByTagName("td")[3].innerText;
            eWork = tr.getElementsByTagName("td")[4].innerText;
            eSal = tr.getElementsByTagName("td")[5].innerText;
            cost = tr.getElementsByTagName("td")[6].innerText;
            // console.log(name, unitSize);
            nameEdit.value = name;
            unitSizeEdit.value = unitSize;
            noeEdit.value = noe;
            nodEdit.value = nod;
            eWorkEdit.value = eWork;
            eSalEdit.value = eSal;
            costEdit.value = cost;
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
                window.location = `dawasaji_input.php?delete=${_id}`;
            } else {
                console.log("no");
            }
        })
    })
</script>


<?php include "_sidebar2.php"; ?>