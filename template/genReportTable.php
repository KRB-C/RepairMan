<div class="main-content">
    <button type="button" id="sidebarCollapse" class="btn btn-info mb-5">
        <i class="fas fa-align-left"></i>
    </button>

    <form action='' method='post' class='form-inline mb-3'>
        <div class="form-group">
            <label class='my-auto'>Filter By</label>
            <select class="form-control ml-3" name="GenRepFilter">
                <option selected="true">All</option>
                <option>Cancelled</option>
                <option>Completed</option>
                <option>Ongoing</option>
                <option>Pending</option>
            </select>
            <button type='submit' name='FilterBtn' class='btn btn-outline-primary ml-3'>Filter</button>
            <button type='submit' name='ClrFilterBtn' class='btn btn-outline-primary ml-3'>Clear Filter</button>

        </div>

    </form>
    <button type='button' class='btn btn-outline-primary my-3' id='PrintBtn'>Print</button>
    <table class="table table-striped table-bordered table-scroll" id='printTable' border="1">
        <thead>
            <tr>
                <th scope="col">Sender Name</th>
                <th scope="col">Department</th>
                <th scope="col">Description</th>
                <th scope="col">Facility</th>
                <th scope="col">Maintenance</th>
                <th scope="col">Details</th>
                <th scope="col">WorkType</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Date Submitted</th>
                <th scope="col">Date Done</th>
            </tr>
        </thead>
        <tbody>
            <?php require 'controller/GenReport.php';
        if( isset($_SESSION["GenRepFilter"]))
        {}
        else
        {
        $_SESSION["GenRepFilter"]=1;
        }
        showTableReport(genReportWork ($_SESSION["GenRepFilter"]));
        ?>
        </tbody>
    </table>
</div>

<script>
    function printData() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        a = mm + '/' + dd + '/' + yyyy;


        var divToPrint = document.getElementById("printTable");
        newWin = window.open("");
        newWin.document.write("Date Printed: " + a);
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    $('#PrintBtn').on('click', function () {
        printData();
    })
</script>