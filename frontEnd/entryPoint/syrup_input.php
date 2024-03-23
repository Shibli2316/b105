<?php


$insert = false;
$update = false;
$delete = false;

// Connecting to the database

include "../../_includes/_dbconnect.php";

if (isset($_GET['delete'])) {
    $_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `syrup` where `_id`=$_id ";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['_idEdit'])) {
        // Update the record

        $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $unitSize = $_POST['unitSizeEdit'];
        $supEmp = $_POST['supEmpEdit'];
        $supDays = $_POST['supDaysEdit'];
        $ghEmp = $_POST['ghEmpEdit'];
        $ghDays = $_POST['ghDaysEdit'];
        $fillEmp = $_POST['fillEmpEdit'];
        $fillDays = $_POST['fillDaysEdit'];
        $sealEmp = $_POST['sealEmpEdit'];
        $sealDays = $_POST['sealDaysEdit'];
        $chkEmp = $_POST['chkEmpEdit'];
        $chkDays = $_POST['chkDaysEdit'];
        $totalEmp = $_POST['totalEmpEdit'];
        $eSalDay = $_POST['eSalDayEdit'];
        $totalCost = $_POST['totalCostEdit'];

        // SQL query to be executed

        $sql = "UPDATE `syrup` SET `name`= '$name' , `unit_size`= '$unitSize', `sup_emp` = '$supEmp', `sup_days` = '$supDays', `gh_emp` = '$ghEmp', `gh_days` = '$ghDays', `fill_emp` = '$fillEmp', `fill_days` = '$fillDays', `seal_emp`='$sealEmp',`seal_days`='$sealDays',`chk_emp`='$chkEmp',`chk_days`='$chkDays',`total_emp`='$totalEmp',`e_sal_day`='$eSalDay', `total_emp_cost`='$totalCost' WHERE `syrup`.`_id`=$_id";
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
        $supEmp = $_POST['supEmp'];
        $supDays = $_POST['supDays'];
        $ghEmp = $_POST['ghEmp'];
        $ghDays = $_POST['ghDays'];
        $fillEmp = $_POST['fillEmp'];
        $fillDays = $_POST['fillDays'];
        $sealEmp = $_POST['sealEmp'];
        $sealDays = $_POST['sealDays'];
        $chkEmp = $_POST['chkEmp'];
        $chkDays = $_POST['chkDays'];
        $totalEmp = $_POST['totalEmp'];
        $eSalDay = $_POST['eSalDay'];
        $totalCost = $_POST['totalCost'];


        // SQL query to be executed
        // INSERT INTO `syrup` (`_id`, `name`, `unit_size`, `sup_emp`, `sup_days`, `gh_emp`, `gh_days`, `fill_emp`, `fill_days`, `seal_emp`, `seal_days`, `chk_emp`, `chk_days`, `total_emp`, `e_sal_day`, `total_emp_cost`) VALUES (NULL, 's', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

        $sql = "INSERT INTO `syrup` (`name`, `unit_size`, `sup_emp`, `sup_days`, `gh_emp`, `gh_days`, `fill_emp`, `fill_days`, `seal_emp`, `seal_days`, `chk_emp`, `chk_days`, `total_emp`, `e_sal_day`, `total_emp_cost`) VALUES ('$name', '$unitSize', '$supEmp' ,'$supDays', '$ghEmp', '$ghDays', '$fillEmp', '$fillDays', '$sealEmp', '$sealDays', '$chkEmp', '$chkDays', '$totalEmp', '$eSalDay', '$totalCost')";
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
            <form action="syrup_input.php" method="post">
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
                        <label for="supEmpEdit" class="form-label">Sup Emp</label>
                        <input type="text" class="form-control" id="supEmpEdit" aria-describedby="emailHelp" name="supEmpEdit">
                    </div>

                    <div class="mb-3">
                        <label for="supDaysEdit" class="form-label">Sup Days</label>
                        <input type="text" class="form-control" id="supDaysEdit" aria-describedby="emailHelp" name="supDaysEdit">
                    </div>

                    <div class="mb-3">
                        <label for="ghEmpEdit" class="form-label">Grinding Emp</label>
                        <input type="text" class="form-control" id="ghEmpEdit" aria-describedby="emailHelp" name="ghEmpEdit">
                    </div>

                    <div class="mb-3">
                        <label for="ghDaysEdit" class="form-label">Grinding Days</label>
                        <input type="text" class="form-control" id="ghDaysEdit" aria-describedby="emailHelp" name="ghDaysEdit">
                    </div>

                    <div class="mb-3">
                        <label for="fillEmpEdit" class="form-label">Filling Emplpyee</label>
                        <input type="text" class="form-control" id="fillEmpEdit" aria-describedby="emailHelp" name="fillEmpEdit">
                    </div>

                    <div class="mb-3">
                        <label for="fillDaysEdit" class="form-label">Filling Days</label>
                        <input type="text" class="form-control" id="fillDaysEdit" aria-describedby="emailHelp" name="fillDaysEdit">
                    </div>
                    <!-- `name`, `unit_size`, `sup_emp`, `sup_days`, `gh_emp`, `gh_days`, `fill_emp`, `fill_days`, `seal_emp`, `seal_days`, `chk_emp`, `chk_days`, `total_emp`, `e_sal_day`, `total_emp_cost` -->

                    <div class="mb-3">
                        <label for="sealEmpEdit" class="form-label">Sealing Employess</label>
                        <input type="text" class="form-control" id="sealEmpEdit" aria-describedby="emailHelp" name="sealEmpEdit">
                    </div>

                    <div class="mb-3">
                        <label for="sealDaysEdit" class="form-label">Sealing Days</label>
                        <input type="text" class="form-control" id="sealDaysEdit" aria-describedby="emailHelp" name="sealDaysEdit">
                    </div>

                    <div class="mb-3">
                        <label for="chkEmpEdit" class="form-label">Checking Employess</label>
                        <input type="text" class="form-control" id="chkEmpEdit" aria-describedby="emailHelp" name="chkEmpEdit">
                    </div>

                    <div class="mb-3">
                        <label for="chkDaysEdit" class="form-label">Checking Days</label>
                        <input type="text" class="form-control" id="chkDaysEdit" aria-describedby="emailHelp" name="chkDaysEdit">
                    </div>

                    <div class="mb-3">
                        <label for="totalEmpEdit" class="form-label">Total Employees</label>
                        <input type="text" class="form-control" id="totalEmpEdit" aria-describedby="emailHelp" name="totalEmpEdit">
                    </div>

                    <div class="mb-3">
                        <label for="eSalDayEdit" class="form-label">Employee Sal per Day</label>
                        <input type="text" class="form-control" id="eSalDayEdit" aria-describedby="emailHelp" name="eSalDayEdit">
                    </div>

                    <div class="mb-3">
                        <label for="totalCostEdit" class="form-label">Total Cost</label>
                        <input type="text" class="form-control" id="totalCostEdit" aria-describedby="emailHelp" name="totalCostEdit">
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
    <form action="syrup_input.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="unitSize" class="form-label">Unit Size</label>
            <input type="text" class="form-control" id="unitSize" aria-describedby="emailHelp" name="unitSize">
        </div>
        <!-- `name`, `unit_size`, `sup_emp`, `sup_days`, `gh_emp`, `gh_days`, `fill_emp`, `fill_days`, `seal_emp`, `seal_days`, `chk_emp`, `chk_days`, `total_emp`, `e_sal_day`, `total_emp_cost` -->
        <div class="mb-3">
            <label for="supEmp" class="form-label">Sup Emp</label>
            <input type="text" class="form-control" id="supEmp" aria-describedby="emailHelp" name="supEmp">
        </div>

        <div class="mb-3">
            <label for="supDays" class="form-label">Sup Days</label>
            <input type="text" class="form-control" id="supDays" aria-describedby="emailHelp" name="supDays">
        </div>

        <div class="mb-3">
            <label for="ghEmp" class="form-label">Grinding Emp</label>
            <input type="text" class="form-control" id="ghEmp" aria-describedby="emailHelp" name="ghEmp">
        </div>

        <div class="mb-3">
            <label for="ghDays" class="form-label">Grinding Days</label>
            <input type="text" class="form-control" id="ghDays" aria-describedby="emailHelp" name="ghDays">
        </div>

        <div class="mb-3">
            <label for="fillEmp" class="form-label">Filling Emplpyee</label>
            <input type="text" class="form-control" id="fillEmp" aria-describedby="emailHelp" name="fillEmp">
        </div>

        <div class="mb-3">
            <label for="fillDays" class="form-label">Filling Days</label>
            <input type="text" class="form-control" id="fillDays" aria-describedby="emailHelp" name="fillDays">
        </div>
        <!-- `name`, `unit_size`, `sup_emp`, `sup_days`, `gh_emp`, `gh_days`, `fill_emp`, `fill_days`, `seal_emp`, `seal_days`, `chk_emp`, `chk_days`, `total_emp`, `e_sal_day`, `total_emp_cost` -->

        <div class="mb-3">
            <label for="sealEmp" class="form-label">Sealing Employess</label>
            <input type="text" class="form-control" id="sealEmp" aria-describedby="emailHelp" name="sealEmp">
        </div>

        <div class="mb-3">
            <label for="sealDays" class="form-label">Sealing Days</label>
            <input type="text" class="form-control" id="sealDays" aria-describedby="emailHelp" name="sealDays">
        </div>

        <div class="mb-3">
            <label for="chkEmp" class="form-label">Checking Employess</label>
            <input type="text" class="form-control" id="chkEmp" aria-describedby="emailHelp" name="chkEmp">
        </div>

        <div class="mb-3">
            <label for="chkDays" class="form-label">Checking Days</label>
            <input type="text" class="form-control" id="chkDays" aria-describedby="emailHelp" name="chkDays">
        </div>

        <div class="mb-3">
            <label for="totalEmp" class="form-label">Total Employees</label>
            <input type="text" class="form-control" id="totalEmp" aria-describedby="emailHelp" name="totalEmp">
        </div>

        <div class="mb-3">
            <label for="eSalDay" class="form-label">Employee Sal per Day</label>
            <input type="text" class="form-control" id="eSalDay" aria-describedby="emailHelp" name="eSalDay">
        </div>

        <div class="mb-3">
            <label for="totalCost" class="form-label">Total Cost</label>
            <input type="text" class="form-control" id="totalCost" aria-describedby="emailHelp" name="totalCost">
        </div>

        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>
<!-- `name`, `unit_size`, `sup_emp`, `sup_days`, `gh_emp`, `gh_days`, `fill_emp`, `fill_days`, `seal_emp`, `seal_days`, `chk_emp`, `chk_days`, `total_emp`, `e_sal_day`, `total_emp_cost` -->
<div class="container my-4">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">SNo</th>
                <th scope="col">Name</th>
                <th scope="col">Unit Size</th>
                <th scope="col">Sup Employee</th>
                <th scope="col">Sup Days</th>
                <th scope="col">Gh Emp</th>
                <th scope="col">Gh Days</th>
                <th scope="col">Filling Emp</th>
                <th scope="col">Filling Days</th>
                <th scope="col">Sealing Employees</th>
                <th scope="col">Sealing Days </th>
                <th scope="col">Check Employees</th>
                <th scope="col">Check Days</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Employee Salary Per Day</th>
                <th scope="col">Total Employee Cost</th>
            </tr>
        </thead>
        <tbody>
            <!-- `name`, `unit_size`, `sup_emp`, `sup_days`, `gh_emp`, `gh_days`, `fill_emp`, `fill_days`, `seal_emp`, `seal_days`, `chk_emp`, `chk_days`, `total_emp`, `e_sal_day`, `total_emp_cost` -->
            <?php
            $sql = "SELECT * FROM `syrup`";
            $result = mysqli_query($conn, $sql);
            $_id = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $_id = $_id + 1;
                echo "<tr>
            <th scope='row'>" . $_id . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['unit_size'] . "</td>
            <td>" . $row['sup_emp'] . "</td>
            <td>" . $row['sup_days'] . "</td>
            <td>" . $row['gh_emp'] . "</td>
            <td>" . $row['gh_days'] . "</td>
            <td>" . $row['fill_emp'] . "</td>
            <td>" . $row['fill_days'] . "</td>
            <td>" . $row['seal_emp'] . "</td>
            <td>" . $row['seal_days'] . "</td>
            <td>" . $row['chk_emp'] . "</td>
            <td>" . $row['chk_days'] . "</td>
            <td>" . $row['total_emp'] . "</td>
            <td>" . $row['e_sal_day'] . "</td>
            <td>" . $row['total_emp_cost'] . "</td>
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
        $supEmp = $_POST['supEmp'];
        $supDays = $_POST['supDays'];
        $ghEmp = $_POST['ghEmp'];
        $ghDays = $_POST['ghDays'];
        $fillEmp = $_POST['fillEmp'];
        $fillDays = $_POST['fillDays'];
        $sealEmp = $_POST['sealEmp'];
        $sealDays = $_POST['sealDays'];
        $chkEmp = $_POST['chkEmp'];
        $chkDays = $_POST['chkDays'];
        $totalEmp = $_POST['totalEmp'];
        $eSalDay = $_POST['eSalDay'];
        $totalCost = $_POST['totalCost']; -->

<!-- `name`, `unit_size`, `sup_emp`, `sup_days`, `gh_emp`, `gh_days`, `fill_emp`, `fill_days`, `seal_emp`, `seal_days`, `chk_emp`, `chk_days`, `total_emp`, `e_sal_day`, `total_emp_cost` -->
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            tr = e.target.parentNode.parentNode;
            name = tr.getElementsByTagName("td")[0].innerText;
            unitSize = tr.getElementsByTagName("td")[1].innerText;
            supEmp = tr.getElementsByTagName("td")[2].innerText;
            supDays = tr.getElementsByTagName("td")[3].innerText;
            ghEmp = tr.getElementsByTagName("td")[4].innerText;
            ghDays = tr.getElementsByTagName("td")[5].innerText;
            fillEmp = tr.getElementsByTagName("td")[6].innerText;
            fillDays = tr.getElementsByTagName("td")[7].innerText;
            sealEmp = tr.getElementsByTagName("td")[8].innerText;
            sealDays = tr.getElementsByTagName("td")[9].innerText;
            chkEmp = tr.getElementsByTagName("td")[10].innerText;
            chkDays = tr.getElementsByTagName("td")[11].innerText;
            totalEmp = tr.getElementsByTagName("td")[12].innerText;
            eSalDay = tr.getElementsByTagName("td")[13].innerText;
            totalCost = tr.getElementsByTagName("td")[14].innerText;

            // console.log(name, unitSize);
            nameEdit.value = name;
            unitSizeEdit.value = unitSize;
            supEmpEdit.value = supEmp;
            supDaysEdit.value = supDays;
            ghEmpEdit.value = ghEmp;
            ghDaysEdit.value = ghDays;
            fillEmpEdit.value = fillEmp;
            fillDaysEdit.value = fillDays;
            sealEmpEdit.value = sealEmp;
            sealDaysEdit.value = sealDays;
            chkEmpEdit.value = chkEmp;
            chkDaysEdit.value = chkDays;
            totalEmpEdit.value = totalEmp;
            eSalDayEdit.value = eSalDay;
            totalCostEdit.value = totalCost;
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
                window.location = `syrup_input.php?delete=${_id}`;
            } else {
                console.log("no");
            }
        })
    })
</script>

<?php include "_sidebar2.php"; ?>