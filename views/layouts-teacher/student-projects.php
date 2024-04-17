<?php require_once(dirname(dirname(dirname(__FILE__))) . '/controllers/StudentsController.php'); ?>

<?php if (!empty($studentProjects)) : ?>
  <div class="w-full mt-3 mb-11">
    <div class="shadow-sm p-1 rounded-sm w-max ">
      <i class="fa-solid fa-magnifying-glass" style="opacity:50%;"></i>
      <input type="text" class="students-search-input" placeholder="Serach">
    </div>
  </div>

  <div class="w-full flex flex-wrap gap-3">
    <?php foreach ($studentProjects as $brief) : ?>
      <!-- Project Card -->
      <div class="card rounded-lg shadow-sm relative " style="width: 20rem;">
        <img src="./views/images/<?= $brief['IMAG'] ?>" class="card-img-top">
        <div class="absolute badge bg-blue-300 right-0 m-2 "><?= $brief['ETAT'] ?></div>
        <div class="card-body">
          <h5 class="card-title mb-2 font-bold"><?= $brief['TITRE'] ?></h5>
          <h1 class="card-subtitle mb-2">Assigned: <?= $brief['DATE_DEBUT'] ?></h1>
          <?php if ($brief['COMPLETE_DATE'] !== '0000-00-00') : ?>
            <h1 class="card-subtitle mb-2">Submited: <?= $brief['COMPLETE_DATE'] ?></h1>
          <?php endif ?>
          <div class="flex gap-4 px-4 mb-6">
            <a class="flex py-1 px-11 rounded border w-max mx-auto gap-3" target="_blank" href="./views/files/<?= $brief['PIECE_JOINTE'] ?>">
              <img src="https://cdn-icons-png.flaticon.com/128/13/13413.png" class="h-6">
            </a>
            <a class="flex py-1 px-11 rounded border w-50 mx-auto gap-3" download href="./views/files/<?= $brief['PIECE_JOINTE'] ?>">
              <img src="https://cdn-icons-png.flaticon.com/128/4529/4529917.png" class="h-6">
            </a>
          </div>
          <?php if ($brief['LIEN'] !== 'unset') : ?>
            <h1 class="text-secondary">Link: <a href="<?= $brief['LIEN'] ?>" target="_blank"><?= $brief['LIEN'] ?></a></h1>
          <?php endif ?>
          <hr class="mx-2 my-3">
          <h1 class="card-subtitle mb-2">Competence</h1>
          <?php foreach (getCompetences($brief['ID_BRIEF']) as $C) : ?>
            <p class="rounded-pill w-max border border-dark px-3"><?= $C['N'] ?></p>
          <?php endforeach ?>
        </div>
      </div>
    <?php endforeach ?>
  </div>
<?php elseif (empty($studentProjects)) : ?>
  <div class="w-full d-flex align-items-center justify-content-center">
    <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?size=626&ext=jpg" class="h-1/2">
  </div>
<?php endif ?>
<script>
  document.querySelector('input').addEventListener('input', e => {
    document.querySelectorAll('.card').forEach(card => {
      if (card.querySelector('.card-title').innerText.toLowerCase().includes(e.target.value.toLowerCase())) card.style.display = "block";
      else card.style.display = "none";
    });
  });
</script>