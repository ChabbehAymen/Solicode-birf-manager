<?php require_once(dirname(dirname(dirname(__FILE__))) . '/controllers/ProjectsController.php'); ?>
<div class="w-full mt-3 mb-11 flex justify-between pe-11">
  <div class="shadow-sm p-1 rounded-sm w-max ">
    <i class="fa-solid fa-magnifying-glass" style="opacity:50%;"></i>
    <input type="text" class="students-search-input" placeholder="Serach">
  </div>
  <form action="" method="POST">
    <select class="shadow-sm p-2 rounded-lg text-white  w-max bg-blue-500" name="year" onchange="this.form.submit()">
    <?php foreach($avaliableYears as $year):?>  
    <option value=<?=$year['Y']?> ><?=$year['Y']?></option>
    <?php endforeach?>
    </select>
  </form>
</div>

<div class="mb-8 flex flex-wrap gap-4">
  <!-- Project Card -->
  <?php foreach ($allBrifs as $brief) : ?>
    <div class="card rounded-lg shadow-sm relative " style="width: 20rem;">
      <img src="https://placehold.co/600x400/png" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title mb-2 font-bold"><?= $brief['TITRE'] ?></h5>
        <h1 class="card-subtitle mb-2"><?= $brief['DATE_AJOUTE'] ?></h1>
        <a class="text-secondary" href="" ><?= $brief['PIECE_JOINTE'] ?></a>
        <hr class="mx-2 my-3">
        <h1 class="card-subtitle mb-2">Competence</h1>
        <!-- <?//foreach ($competeses as $key => $value)?> -->
        <p class="rounded-pill w-max border border-dark p-2"><?= $brief['C'] ?></p>
        <form class="mt-3 flex w-full justify-between" action="">
          <?php if (!isBriefAssigned(intval($brief['ID_BRIEF']))) : ?>
            <input type="submit" value="Assign" name="assign" class="py-1 px-3 rounded-lg text-white bg-blue-500">
            <input type="text" name="idBrief" value=<?=$brief['ID_BRIEF']?> class="hidden" >
          <?php endif ?>
          <p class="self-end" >By <?= $brief['T'] ?></p>
        </form>
      </div>
    </div>
  <?php endforeach ?>


</div>