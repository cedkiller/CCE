<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE EXAMINEE</div>
                </div>
            </div>
        </div>        
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Examinee List</div>
                <div class="table-responsive">
                    <!-- Search Input Field -->
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for names..">
                    <!-- Limit Dropdown -->
                    <select id="limitSelect" onchange="limitTable()">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                    </select>
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>Section</th>
                                <th>Year level</th>
                                <th>Email</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php 
                            $selExmne = $conn->query("SELECT * FROM examinee_tbl ORDER BY exmne_id DESC ");
                            if($selExmne->rowCount() > 0)
                            {
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $selExmneRow['exmne_fullname']; ?></td>
                                        <td><?php echo $selExmneRow['exmne_gender']; ?></td>
                                        <td><?php echo $selExmneRow['exmne_number']; ?></td>
                                        <td>
                                            <?php 
                                            $exmneSection = $selExmneRow['exmne_section'];
                                            $selSection = $conn->query("SELECT * FROM section_tbl WHERE sec_id='$exmneSection' ")->fetch(PDO::FETCH_ASSOC);
                                            echo $selSection['sec_name'];
                                            ?>
                                        </td>
                                        <td><?php echo $selExmneRow['exmne_year_level']; ?></td>
                                        <td><?php echo $selExmneRow['exmne_email']; ?></td>
                                        <td><?php echo $selExmneRow['exmne_status']; ?></td>
                                        <td>
                                            <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['exmne_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                        </td>
                                    </tr>
                                <?php }
                            }
                            else
                            { ?>
                                <tr>
                                    <td colspan="8">
                                        <h3 class="p-3">No Examinee Found</h3>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to filter and limit table -->
<script>
function searchTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toLowerCase();
    table = document.getElementById("tableList");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
    limitTable();
}

function limitTable() {
    var limit, table, tr, i;
    limit = parseInt(document.getElementById("limitSelect").value);
    table = document.getElementById("tableList");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        if (i <= limit) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}

// Initialize table with limit
window.onload = function() {
    limitTable();
};
</script>
