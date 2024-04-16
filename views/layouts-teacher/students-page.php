<?php require_once(dirname(dirname(dirname(__FILE__))).'/controllers/StudentsController.php'); ?>
<script src="views/js/students.page.js" defer></script>
<div class="w-full mt-3">
    <div class="shadow-sm p-1 rounded-sm w-max " >
        <i class="fa-solid fa-magnifying-glass" style="opacity:50%;"></i>
        <input type="text" class="students-search-input" placeholder="Serach" >
    </div>
</div>
<!-- Students Table  -->
<div class="w-full rounded shadow-sm mt-11">
    <!-- Table Head -->
    <div class="w-full bg-blue-500 py-1 px-2 text-white flex justify-between rounded-t">
        <div class="w-1/4">Name</div>
        <div class="w-1/4">Last Name</div>
        <div class="w-1/4">Email</div>
        <div class="w-1/6"></div>
    </div>
    <!-- Table Body -->
    <div class="w-full">
        <!-- Table Row -->
        <?php foreach ($allStudents as $brief):?>
        <div class="w-full flex py-2 px-2 justify-between tbody-row" id=<?=$brief['ID_APPRENANT']?>>
            <div class="w-1/4"><?=$brief['NOM']?></div>
            <div class="w-1/4"><?=$brief['PRENOM']?></div>
            <div class="w-1/4"><?=$brief['EMAIL']?></div>
            <div class="w-1/6">
                <a class=" w-min text-white px-3 py-1 rounded-xl bg-blue-500 cursor-pointer">
                    Brifs
                </a>
            </div>
        </div>
        <?php endforeach?>
    </div>

</div>