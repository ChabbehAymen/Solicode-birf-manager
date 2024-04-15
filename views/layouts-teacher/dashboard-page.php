<?php require_once(dirname(dirname(dirname(__FILE__))) . '/controllers/dashboardController.php'); ?>
<h1 class="">Hello <?=$getTeacherName[0]['NOM']?></h1>

<form action="" method="post">
    <select name="selected-brif" class="bg-blue-500 p-2 my-3 rounded text-white" onchange="this.form.submit()">
        <?php foreach ($allAssignedBrifs as $brif) : ?>
            <option value=<?= '"' . $brif['TITRE'] . '"' ?> <?php if (!empty($_POST['selected-brif']) && $_POST['selected-brif'] === $brif['TITRE']) echo 'selected'; ?>><?= $brif['TITRE'] ?></option>
        <?php endforeach; ?>
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
        <?php foreach ($studentsStatus as $student) : ?>
            <div class="w-full flex py-1 px-2 justify-between mtable-row">
                <div class="w-1/4"><?= $student['NOM'] ?> <?= $student['PRENOM'] ?></div>
                <div class="w-1/4"><?= $student['DATE_AJOUTE'] ?></div>
                <div class="w-1/4">
                    <?php
                    $bdg = 'bg-gray-400';
                    switch ($student['ETAT']) {
                        case 'DONE':
                            $bdg = 'bg-blue-500';
                            break;
                        case 'DOING':
                            $bdg = 'bg-green-400';
                            break;
                        case 'NOT COMPLETED':
                            $bdg = 'bg-red-400';
                            break;
                    }
                    ?>
                    <div class="badge <?= $bdg ?>">
                        <?= $student['ETAT'] ?>
                    </div>
                </div>
                <div class="w-1/6">
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>

<script>
    window.onload = function() {
        const tableItems = document.querySelectorAll('.mtable-row');
        let todo = 0;
        let doing = 0;
        let done = 0;
        let notCompleted = 0;
        tableItems.forEach((e) => {
            switch (e.querySelector('.badge').innerText) {
                case "TODO":
                    todo++;
                    break;
                case "DOING":
                    doing++;
                    break;
                case "DONE":
                    done++;
                    break;
                case "NOT COMPLETED":
                    notCompleted++;
                    break;
                default:
                    break;
            }
        });
        console.log((todo*100)/tableItems.length);
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            data: [{
                type: "doughnut",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [{
                        y: (todo*100)/tableItems.length,
                        label: "To DO",
                        color: "rgb(156 163 175 / 400)"
                    },
                    {
                        y: (doing*100)/tableItems.length,
                        label: "Doing",
                        color: "rgb(74 222 128 / 400)"
                    },
                    {
                        y: (done*100)/tableItems.length,
                        label: "Done",
                        color: "rgb(59 130 246 / 500)"
                    },
                    {
                        y: (notCompleted*100)/tableItems.length,
                        label: "Not Completed",
                        color: "rgb(248 113 113 / 400)"
                    }
                ]
            }]
        });
        chart.render();
    }
</script>

<div id="chartContainer" class="w-100 h-80 mt-11 bg-red-100"></div>