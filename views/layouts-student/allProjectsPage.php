<?php
require_once dirname(dirname(dirname(__FILE__))) . '/controllers/studentWkAllBriefController.php';
?>
<div class="mb-11">
    <div class="flex items-center mb-11" >
        <div class="shadow-sm p-1 rounded-sm w-max ">
            <i class="fa-solid fa-magnifying-glass" style="opacity:50%;"></i>
            <input type="text" class="students-search-input" placeholder="Serach">
        </div>
        <div class="ml-auto border rounded py-1 px-4" ><?= $studentAcount[0]['NOM'] ?> <?= $studentAcount[0]['PRENOM'] ?>: <?= $studentAcount[0]['EMAIL'] ?></div>

    </div>

    <div class="w-full flex flex-wrap gap-3">
        <?php foreach ($allBriefs as $brief) : ?>
            <div class="card rounded-lg shadow-sm relative " style="width: 20rem;">
                <img src="./views/images/<?= $brief['IMAG'] ?>" class="card-img-top">
                <div class="absolute badge right-0 m-2 "><?= $brief['ETAT'] ?></div>
                <div class="card-body">
                    <h5 class="card-title mb-2 font-bold"><?= $brief['TITRE'] ?></h5>
                    <h1 class="card-subtitle mb-2">Assigned: <?= $brief['DATE_DEBUT'] ?></h1>
                    <?php if ($brief['COMPLETE_DATE'] !== "0000-00-00") : ?>
                        <h1 class="card-subtitle mb-2">Submited: <?= $brief['COMPLETE_DATE'] ?></h1>
                    <?php else : ?>
                        <h1 class="card-subtitle mb-2">End Date: <?= $brief['END_DATE'] ?></h1>
                    <?php endif ?>
                    <div class="flex gap-4 px-4 mb-3 mt-3">
                        <a class="flex py-1 px-11 rounded border w-max mx-auto gap-3" target="_blank" href="./views/files/<?= $brief['PIECE_JOINTE'] ?>">
                            <img src="https://cdn-icons-png.flaticon.com/128/13/13413.png" class="h-6">
                        </a>
                        <a class="flex py-1 px-11 rounded border w-50 mx-auto gap-3" download href="./views/files/<?= $brief['PIECE_JOINTE'] ?>">
                            <img src="https://cdn-icons-png.flaticon.com/128/4529/4529917.png" class="h-6">
                        </a>
                    </div>
                    <h1 class="text-secondary">Link: <a href="<?= $brief['LIEN'] ?>" target="_blank"><?= $brief['LIEN'] ?></a></h1>
                    <hr class="mx-2 my-3">
                    <div class="mb-3">
                        <h1 class="card-subtitle mb-2">Competence</h1>
                        <?php foreach (getCompetences($brief['ID_BRIEF']) as $C):?>
<!--                            <p>: --><?php //=$C['D']?><!--</p>-->
                        <p class="rounded-pill w-max border border-dark px-3"><?=$C['N']?></p>
                        <?php endforeach;?>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script src="./views/js/student-layout-js/studentAllProjects.page.js"></script>