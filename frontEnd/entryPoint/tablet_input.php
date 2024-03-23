<?php


$insert = false;
$update = false;
$delete = false;

// Connecting to the database

include "../../_includes/_dbconnect.php";

if (isset($_GET['delete'])) {
    $_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `tablet` where `_id`=$_id ";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['_idEdit'])) {
        // Update the record
        // `name`, `unit_size`, `lc_noe`, `lc_nod`, `mx_noe`, `mx_nod`, `gr_noe`, `gr_nod`, `tab_noe`, `tab_nod`, `total_noe`, `total_nod`, `emp_days`, `emp_sal`, `cost`

        $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $unitSize = $_POST['unitSizeEdit'];
        $lcnoe = $_POST['lcnoeEdit'];
        $lcnod = $_POST['lcnodEdit'];
        $mxnoe = $_POST['mxnoeEdit'];
        $mxnod = $_POST['mxnodEdit'];
        $grnoe = $_POST['grnoeEdit'];
        $grnod = $_POST['grnodEdit'];
        $tabnoe = $_POST['tabnoeEdit'];
        $tabnod = $_POST['tabnodEdit'];
        $totalnoe = $_POST['totalnoeEdit'];
        $totalnod = $_POST['totalnodEdit'];
        $empDays = $_POST['empDaysEdit'];
        $empSal = $_POST['empSalEdit'];
        $cost = $_POST['costEdit'];

        // SQL query to be executed

        $sql = "UPDATE `tablet` SET `name`= '$name' , `unit_size`= '$unitSize', `lc_noe`='$lcnoe', `lc_nod` = '$lcnod', `mx_noe` = '$mxnoe', `mx_nod` = '$mxnod', `gr_noe` = '$grnoe', `gr_nod` = '$grnod', `tab_noe` = '$tabnoe', `tab_nod`='$tabnod',`total_noe`='$totalnoe',`total_nod`='$totalnod',`emp_days`='$empDays',`emp_sal`='$empSal',`cost`='$cost' WHERE `tablet`.`_id`=$_id";
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
        $lcnoe = $_POST['lcnoe'];
        $lcnod = $_POST['lcnod'];
        $mxnoe = $_POST['mxnoe'];
        $mxnod = $_POST['mxnod'];
        $grnoe = $_POST['grnoe'];
        $grnod = $_POST['grnod'];
        $tabnoe = $_POST['tabnoe'];
        $tabnod = $_POST['tabnod'];
        $totalnoe = $_POST['totalnoe'];
        $totalnod = $_POST['totalnod'];
        $empDays = $_POST['empDays'];
        $empSal = $_POST['empSal'];
        $cost = $_POST['cost'];


        // SQL query to be executed
        // <!-- INSERT INTO `tablet` (`_id`, `name`, `unit_size`, `lc_noe`, `lc_nod`, `mx_noe`, `mx_nod`, `gr_noe`, `gr_nod`, `tab_noe`, `tab_nod`, `total_noe`, `total_nod`, `emp_days`, `emp_sal`, `cost`) VALUES (NULL, 'hamza', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'); -->

        $sql = "INSERT INTO `tablet` (`name`, `unit_size`, `lc_noe`, `lc_nod`, `mx_noe`, `mx_nod`, `gr_noe`, `gr_nod`, `tab_noe`, `tab_nod`, `total_noe`, `total_nod`, `emp_days`, `emp_sal`, `cost`) VALUES ('$name', '$unitSize', '$lcnoe' ,'$lcnod', '$mxnoe', '$mxnod', '$grnoe', '$grnod', '$tabnoe', '$tabnod', '$totalnoe', '$totalnod', '$empDays', '$empSal', '$cost')";
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
            <form action="tablet_input.php" method="post">
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
                        <label for="lcnoeEdit" class="form-label">Lahi Chasni (Number of Employees)</label>
                        <input type="text" class="form-control" id="lcnoeEdit" aria-describedby="emailHelp" name="lcnoeEdit">
                    </div>

                    <div class="mb-3">
                        <label for="lcnodEdit" class="form-label">Lahi Chasni (Number of Days)</label>
                        <input type="text" class="form-control" id="lcnodEdit" aria-describedby="emailHelp" name="lcnodEdit">
                    </div>

                    <div class="mb-3">
                        <label for="mxnoeEdit" class="form-label">Mixing (Number of EMployees)</label>
                        <input type="text" class="form-control" id="mxnoeEdit" aria-describedby="emailHelp" name="mxnoeEdit">
                    </div>

                    <div class="mb-3">
                        <label for="mxnodEdit" class="form-label">Mixing (Number of days)</label>
                        <input type="text" class="form-control" id="mxnodEdit" aria-describedby="emailHelp" name="mxnodEdit">
                    </div>

                    <div class="mb-3">
                        <label for="grnoeEdit" class="form-label">Grinding (Number of Employees)</label>
                        <input type="text" class="form-control" id="grnoeEdit" aria-describedby="emailHelp" name="grnoeEdit">
                    </div>

                    <div class="mb-3">
                        <label for="grnodEdit" class="form-label">Grinding (Number of days)</label>
                        <input type="text" class="form-control" id="grnodEdit" aria-describedby="emailHelp" name="grnodEdit">
                    </div>

                    <div class="mb-3">
                        <label for="tabnoeEdit" class="form-label">Tablet (Number of Employees)</label>
                        <input type="text" class="form-control" id="tabnoeEdit" aria-describedby="emailHelp" name="tabnoeEdit">
                    </div>

                    <div class="mb-3">
                        <label for="tabnodEdit" class="form-label">Tablet (Number of days)</label>
                        <input type="text" class="form-control" id="tabnodEdit" aria-describedby="emailHelp" name="tabnodEdit">
                    </div>

                    <div class="mb-3">
                        <label for="totalnoeEdit" class="form-label">Checking Employess</label>
                        <input type="text" class="form-control" id="totalnoeEdit" aria-describedby="emailHelp" name="totalnoeEdit">
                    </div>

                    <div class="mb-3">
                        <label for="totalnodEdit" class="form-label">Checking Days</label>
                        <input type="text" class="form-control" id="totalnodEdit" aria-describedby="emailHelp" name="totalnodEdit">
                    </div>

                    <div class="mb-3">
                        <label for="empDaysEdit" class="form-label">Total Employees working days</label>
                        <input type="text" class="form-control" id="empDaysEdit" aria-describedby="emailHelp" name="empDaysEdit">
                    </div>

                    <div class="mb-3">
                        <label for="empSalEdit" class="form-label">Employee Sal per Day</label>
                        <input type="text" class="form-control" id="empSalEdit" aria-describedby="emailHelp" name="empSalEdit">
                    </div>

                    <div class="mb-3">
                        <label for="costEdit" class="form-label">Total Cost</label>
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
    <h2>Input for Product Details: </h2>
    <form action="tablet_input.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="unitSize" class="form-label">Unit Size</label>
            <input type="text" class="form-control" id="unitSize" aria-describedby="emailHelp" name="unitSize">
        </div>
        <!-- `name`, `unit_size`, `lc_noe`, `lc_nod`, `mx_noe`, `mx_nod`, `gr_noe`, `gr_nod`, `tab_noe`, `tab_nod`, `total_noe`, `total_nod`, `emp_days`, `emp_sal`, `cost` -->
        <div class="mb-3">
            <label for="lcnoe" class="form-label">Lahi Chasni (Number of Employees)</label>
            <input type="text" class="form-control" id="lcnoe" aria-describedby="emailHelp" name="lcnoe">
        </div>

        <div class="mb-3">
            <label for="lcnod" class="form-label">Lahi Chasni (Number of Days)</label>
            <input type="text" class="form-control" id="lcnod" aria-describedby="emailHelp" name="lcnod">
        </div>

        <div class="mb-3">
            <label for="mxnoe" class="form-label">Mixing (Number of EMployees)</label>
            <input type="text" class="form-control" id="mxnoe" aria-describedby="emailHelp" name="mxnoe">
        </div>

        <div class="mb-3">
            <label for="mxnod" class="form-label">Mixing (Number of days)</label>
            <input type="text" class="form-control" id="mxnod" aria-describedby="emailHelp" name="mxnod">
        </div>

        <div class="mb-3">
            <label for="grnoe" class="form-label">Grinding (Number of Employees)</label>
            <input type="text" class="form-control" id="grnoe" aria-describedby="emailHelp" name="grnoe">
        </div>

        <div class="mb-3">
            <label for="grnod" class="form-label">Grinding (Number of days)</label>
            <input type="text" class="form-control" id="grnod" aria-describedby="emailHelp" name="grnod">
        </div>

        <div class="mb-3">
            <label for="tabnoe" class="form-label">Tablet (Number of Employees)</label>
            <input type="text" class="form-control" id="tabnoe" aria-describedby="emailHelp" name="tabnoe">
        </div>

        <div class="mb-3">
            <label for="tabnod" class="form-label">Tablet (Number of days)</label>
            <input type="text" class="form-control" id="tabnod" aria-describedby="emailHelp" name="tabnod">
        </div>

        <div class="mb-3">
            <label for="totalnoe" class="form-label">Checking Employess</label>
            <input type="text" class="form-control" id="totalnoe" aria-describedby="emailHelp" name="totalnoe">
        </div>

        <div class="mb-3">
            <label for="totalnod" class="form-label">Checking Days</label>
            <input type="text" class="form-control" id="totalnod" aria-describedby="emailHelp" name="totalnod">
        </div>

        <div class="mb-3">
            <label for="empDays" class="form-label">Total Employees working days</label>
            <input type="text" class="form-control" id="empDays" aria-describedby="emailHelp" name="empDays">
        </div>

        <div class="mb-3">
            <label for="empSal" class="form-label">Employee Sal per Day</label>
            <input type="text" class="form-control" id="empSal" aria-describedby="emailHelp" name="empSal">
        </div>

        <div class="mb-3">
            <label for="cost" class="form-label">Total Cost</label>
            <input type="text" class="form-control" id="cost" aria-describedby="emailHelp" name="cost">
        </div>

        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>
<!-- `name`, `unit_size`, `lc_noe`, `lc_nod`, `mx_noe`, `mx_nod`, `gr_noe`, `gr_nod`, `tab_noe`, `tab_nod`, `total_noe`, `total_nod`, `emp_days`, `emp_sal`, `cost` -->
<div class="container my-4">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">SNo</th>
                <th scope="col">Name</th>
                <th scope="col">Unit Size</th>
                <th scope="col">Lahi chasni NOE</th>
                <th scope="col">Lahi Chasni NOD</th>
                <th scope="col">Mixing NOE</th>
                <th scope="col">Mixing NOD</th>
                <th scope="col">Grinding NOE</th>
                <th scope="col">Grinding NOD</th>
                <th scope="col">Tablet NOE</th>
                <th scope="col">Tablet NOD</th>
                <th scope="col">Total NOE</th>
                <th scope="col">Total NOD</th>
                <th scope="col">Total Employee Days</th>
                <th scope="col">Employee Salary Per Day</th>
                <th scope="col">Total Cost</th>
            </tr>
        </thead>
        <tbody>
        <!-- `name`, `unit_size`, `lc_noe`, `lc_nod`, `mx_noe`, `mx_nod`, `gr_noe`, `gr_nod`, `tab_noe`, `tab_nod`, `total_noe`, `total_nod`, `emp_days`, `emp_sal`, `cost` -->
            <?php
            $sql = "SELECT * FROM `tablet`";
            $result = mysqli_query($conn, $sql);
            $_id = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $_id = $_id + 1;
                echo "<tr>
            <th scope='row'>" . $_id . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['unit_size'] . "</td>
            <td>" . $row['lc_noe'] . "</td>
            <td>" . $row['lc_nod'] . "</td>
            <td>" . $row['mx_noe'] . "</td>
            <td>" . $row['mx_nod'] . "</td>
            <td>" . $row['gr_noe'] . "</td>
            <td>" . $row['gr_nod'] . "</td>
            <td>" . $row['tab_noe'] . "</td>
            <td>" . $row['tab_nod'] . "</td>
            <td>" . $row['total_noe'] . "</td>
            <td>" . $row['total_nod'] . "</td>
            <td>" . $row['emp_days'] . "</td>
            <td>" . $row['emp_sal'] . "</td>
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

<!-- 
    $name = $_POST['name'];
        $unitSize = $_POST['unitSize'];
        $lcnoe = $_POST['lcnoe'];
        $lcnod = $_POST['lcnod'];
        $mxnoe = $_POST['mxnoe'];
        $mxnod = $_POST['mxnod'];
        $grnoe = $_POST['grnoe'];
        $grnod = $_POST['grnod'];
        $tabnoe = $_POST['tabnoe'];
        $tabnod = $_POST['tabnod'];
        $totalnoe = $_POST['totalnoe'];
        $totalnod = $_POST['totalnod'];
        $empDays = $_POST['empDays'];
        $empSal = $_POST['empSal'];
        $cost = $_POST['cost']; -->

<!-- `name`, `unit_size`, `sup_emp`, `sup_days`, `gh_emp`, `gh_days`, `fill_emp`, `fill_days`, `seal_emp`, `seal_days`, `chk_emp`, `chk_days`, `total_emp`, `e_sal_day`, `total_emp_cost` -->
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            tr = e.target.parentNode.parentNode;
            name = tr.getElementsByTagName("td")[0].innerText;
            unitSize = tr.getElementsByTagName("td")[1].innerText;
            lcnoe = tr.getElementsByTagName("td")[2].innerText;
            lcnod = tr.getElementsByTagName("td")[3].innerText;
            mxnoe = tr.getElementsByTagName("td")[4].innerText;
            mxnod = tr.getElementsByTagName("td")[5].innerText;
            grnoe = tr.getElementsByTagName("td")[6].innerText;
            grnod = tr.getElementsByTagName("td")[7].innerText;
            tabnoe = tr.getElementsByTagName("td")[8].innerText;
            tabnod = tr.getElementsByTagName("td")[9].innerText;
            totalnoe = tr.getElementsByTagName("td")[10].innerText;
            totalnod = tr.getElementsByTagName("td")[11].innerText;
            empDays = tr.getElementsByTagName("td")[12].innerText;
            empSal = tr.getElementsByTagName("td")[13].innerText;
            cost = tr.getElementsByTagName("td")[14].innerText;

            // console.log(name, unitSize);
            nameEdit.value = name;
            unitSizeEdit.value = unitSize;
            lcnoeEdit.value = lcnoe;
            lcnodEdit.value = lcnod;
            mxnoeEdit.value = mxnoe;
            mxnodEdit.value = mxnod;
            grnoeEdit.value = grnoe;
            grnodEdit.value = grnod;
            tabnoeEdit.value = tabnoe;
            tabnodEdit.value = tabnod;
            totalnoeEdit.value = totalnoe;
            totalnodEdit.value = totalnod;
            empDaysEdit.value = empDays;
            empSalEdit.value = empSal;
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
                window.location = `tablet_input.php?delete=${_id}`;
            } else {
                console.log("no");
            }
        })
    })
</script>

<?php include "_sidebar2.php"; ?>