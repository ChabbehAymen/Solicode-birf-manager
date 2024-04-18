<?php
require_once dirname(dirname(dirname(__FILE__))) . '/controllers/studentWkAllBriefController.php';
?>

<div class="w-full h-full flex">
    <div class="w-full h-full pb-">
        <div>
            <div class="w-full flex">
                <img class="w-80 rounded mb-11 " src="./views/images/<?= $brief['IMAG'] ?>" style="height: 15rem;">
                <div class="w-full">
                    <p class="card-title font-bold text-xl w-full text-center mb-4"> <?= $brief['TITRE'] ?> </p>
                    <p class="card-title text-lg w-full ps-11"> Start Date:<span class="card-subtitle ms-11"><?= $brief['DATE_DEBUT'] ?></span></p>
                    <p class="card-title text-lg w-full ps-11"> End Date:<span class="card-subtitle ms-11"><?= $brief['END_DATE'] ?></span></p>
                    <div class="flex gap-4 px-4" >
                        <a class="flex py-1 px-11 rounded border w-50 mx-auto mt-11 gap-3" target="_blank" href="./views/files/<?= $brief['PIECE_JOINTE'] ?>">
                            <img src="https://cdn-icons-png.flaticon.com/128/13/13413.png" class="h-6"> Open Atatchment
                        </a>
                        <a class="flex py-1 px-11 rounded border w-50 mx-auto mt-11 gap-3" download href="./views/files/<?= $brief['PIECE_JOINTE'] ?>">
                            <img src="https://cdn-icons-png.flaticon.com/128/4529/4529917.png" class="h-6"> Download Atatchment
                        </a>

                    </div>
                </div>
            </div>
            <form class="flex w-full pr-11 gap-3 mb-11">
                <input type="text" placeholder="Submit Github Url" class="form-control">
                <input type="submit" value="Complete" class="p-2.5 rounded text-white bg-blue-400">
            </form>
            <hr class="w-1/2 m-auto">
            <div class="mt-4">
                <p class="card-subtitle bold">Skills</p>
                <div class="w-full flex flex-wrap gap-3 my-3 comps-container">
                    <?php foreach (getCompetences($brief['ID_BRIEF']) as $C):?>
                        <p><?=$C['N']?>: <?=$C['D']?></p>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>