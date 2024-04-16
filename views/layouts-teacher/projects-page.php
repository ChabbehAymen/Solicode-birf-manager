<?php require_once(dirname(dirname(dirname(__FILE__))) . '/controllers/ProjectsController.php'); ?>
<div class="w-full mt-3 mb-11 flex justify-between pe-11">
  <div class="shadow-sm p-1 rounded-sm w-max ">
    <i class="fa-solid fa-magnifying-glass" style="opacity:50%;"></i>
    <input type="text" class="students-search-input" placeholder="Serach">
  </div>
  <form action="" method="POST">
    <?php if (!empty($avaliableYears)) : ?>
      <select class="shadow-sm p-2 rounded-lg text-white  w-max bg-blue-500" name="year" onchange="this.form.submit()">
        <?php foreach ($avaliableYears as $year) : ?>
          <option value=<?= $year['Y'] ?>><?= $year['Y'] ?></option>
        <?php endforeach ?>
      </select>
    <?php endif ?>
  </form>
</div>
<?php if (!empty($allBrifs)) : ?>
  <div class="mb-8 flex flex-wrap gap-4">
    <!-- Project Card -->
    <?php foreach ($allBrifs as $brief) : ?>

      <div class="card rounded-lg shadow-sm relative " style="width: 20rem;">
        <img src="./views/images/<?= $brief['IMAG'] ?>" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title mb-2 font-bold"><?= $brief['TITRE'] ?></h5>
          <h1 class="card-subtitle mb-2"><?= $brief['DATE_AJOUTE'] ?></h1>
          <div class="flex gap-4 px-4">
            <a class="flex py-1 px-11 rounded border w-max mx-auto gap-3" target="_blank" href="./views/files/<?= $brief['PIECE_JOINTE'] ?>">
              <img src="https://cdn-icons-png.flaticon.com/128/13/13413.png" class="h-6">
            </a>
            <a class="flex py-1 px-11 rounded border w-50 mx-auto gap-3" download href="./views/files/<?= $brief['PIECE_JOINTE'] ?>">
              <img src="https://cdn-icons-png.flaticon.com/128/4529/4529917.png" class="h-6">
            </a>
          </div>
          <hr class="mx-2 my-3">
          <h1 class="card-subtitle mb-2">Competence</h1>
          <?php foreach (getBriefCompetences($brief['ID_BRIEF']) as $c) : ?>
            <p class="rounded-pill w-max border border-dark p-2"><?= $c['N'] ?></p>
          <?php endforeach ?>
          <form class="mt-3 flex w-full justify-between" action="" method="POST">
            <?php if (!isBriefAssigned(intval($brief['ID_BRIEF']))) : ?>
              <input type="submit" value="Assign" name="assign" class="py-1 px-3 rounded-lg text-white bg-blue-500">
              <input type="text" name="idBrief" value=<?= $brief['ID_BRIEF'] ?> class="hidden">
            <?php else : ?>
              <input type="submit" value="Assigned" name="assign" class="py-1 px-3 rounded-lg text-white bg-gray-400" disabled>
            <?php endif ?>
            <p class="self-end">By <?= $brief['T'] ?></p>
          </form>
        </div>
      </div>
    <?php endforeach ?>
  <?php else : ?>
    <div class="w-full d-flex align-items-center justify-content-center">
      <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?size=626&ext=jpg" class="h-1/2">
    </div>
  <?php endif ?>
  </div>