<?php require_once(dirname(dirname(dirname(__FILE__))) . '/controllers/dashboardController.php'); ?>
<h1 class="">Hello <?php echo $getTeacherName[0]['NOM'] ?></h1>

<form action="" method="post">
    <select name="Project" class="bg-blue-500 p-2 my-3 rounded text-white">
        <option value="BP15">BP15</option>
    </select>
</form>


<!-- Students Table  -->
<div class="w-full rounded shadow-sm">
    <!-- Table Head -->
    <div class="w-full bg-blue-500 py-1 px-2 text-white flex justify-between rounded-t">
        <div class="w-1/4">Name</div>
        <div class="w-1/4">Date</div>
        <div class="w-1/4">Status</div>
        <div class="w-1/6"></div>
    </div>
    <!-- Table Body -->
    <div class="w-full">
        <!-- Table Row -->
        <div class="w-full flex py-1 px-2 justify-between">
            <div class="w-1/4">Name</div>
            <div class="w-1/4">Date</div>
            <div class="w-1/4">
                <div class="badge bg-red-200">
                    Status
                </div>
            </div>
            <div class="w-1/6">
                <a class=" w-min badge bg-blue-500" href="">
                    View
                </a>
            </div>
        </div>

        <!-- Table Row -->
        <div class="w-full flex py-1 px-2 justify-between">
            <div class="w-1/4">Name</div>
            <div class="w-1/4">Date</div>
            <div class="w-1/4">
                <div class="badge bg-red-200">
                    Status
                </div>
            </div>
            <div class="w-1/6">
                <a class=" w-min badge bg-blue-500" href="">
                    View
                </a>
            </div>
        </div>

        <!-- Table Row -->
        <div class="w-full flex py-1 px-2 justify-between">
            <div class="w-1/4">Name</div>
            <div class="w-1/4">Date</div>
            <div class="w-1/4">
                <div class="badge bg-red-200">
                    Status
                </div>
            </div>
            <div class="w-1/6">
                <a class=" w-min badge bg-blue-500" href="">
                    View
                </a>
            </div>
        </div>

    </div>

</div>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [{
                        y: 79.45,
                        label: "To DO",
                        color:"rgb(59 130 246 / 500)"
                    },
                    {
                        y: 7.31,
                        label: "Doing",
                        color:""
                    },
                    {
                        y: 7.06,
                        label: "Done",
                        color:""
                    },
                    {
                        y: 4.91,
                        label: "Not Completed",
                        color:""
                    }
                ]
            }]
        });
        chart.render();
    }
</script>

<div id="chartContainer" class="w-100 h-80 mt-11 bg-red-100"></div>
