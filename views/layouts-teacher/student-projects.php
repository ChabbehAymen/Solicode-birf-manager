<?php require_once(dirname(dirname(dirname(__FILE__))) . '/controllers/StudentsController.php'); ?>

<?php if (!empty($studentProjects)) : ?>
  <div class="w-full mt-3 mb-11">
    <div class="shadow-sm p-1 rounded-sm w-max ">
      <i class="fa-solid fa-magnifying-glass" style="opacity:50%;"></i>
      <input type="text" class="students-search-input" placeholder="Serach">
    </div>
  </div>

<div class="w-full flex flex-wrap gap-3" >
  <?php foreach($studentProjects as $student): ?>
  <!-- Project Card -->
  <div class="card rounded-lg shadow-sm relative " style="width: 20rem;">
    <img src="./views/images/TeacherClass.png" class="card-img-top">
    <div class="absolute badge bg-blue-300 right-0 m-2 "><?=$student['ETAT']?></div>
    <div class="card-body">
      <h5 class="card-title mb-2 font-bold"><?=$student['TITRE']?></h5>
      <h1 class="card-subtitle mb-2"><?=$student['DATE_AJOUTE']?></h1>
      <h1 class="text-secondary">Link: <?=$student['PIECE_JOINTE']?></h1>
      <hr class="mx-2 my-3">
      <h1 class="card-subtitle mb-2">Competence</h1>
      <?php foreach(getCompetences($student['ID_BRIEF']) as $C): ?>
      <p class="rounded-pill w-max border border-dark p-2"><?=$C['N']?></p>
      <?php endforeach?>
    </div>
  </div>
  <?php endforeach?>
</div>
<?php elseif (empty($studentProjects)) : ?>
  <div class="w-full d-flex align-items-center justify-content-center">
    <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?size=626&ext=jpg" class="h-1/2">
  </div>
<?php endif ?>