<?php require_once(dirname(dirname(dirname(__FILE__))) . '/controllers/ProjectsController.php'); ?>

<div class="w-full h-full flex">
    <div class="w-50 h-full pb-">
        <form action="" method="POST" enctype="multipart/form-data" >
            <div></div>
            <label class="w-80 rounded cursor-pointer img-input-label" for="img-input">
                <input type="file" class="form-control w-1/2 mb-8 hidden" name="img-file" accept="image/png, image/jpeg" name="img" id="img-input" required >
            </label>
            <p class="mb-11 w-80 text-center text-danger hidden img-file-error">You Must Select An Image For Biref</p>
            <input type="text" name="title" class="form-control w-1/2 mb-8" placeholder="Title" required >
            <input type="number" min="1" name="duration" class="form-control w-1/2 mb-8" placeholder="Duration(Days)" required >
            <label for="" class="w-1/2">
                Atatchment
                <input type="file" name="atatchment" class="form-control mb-8" accept="application/pdf" required >
            </label>
            <hr class="w-1/2 m-auto">
            <div class="mt-4">
                <p class="card-subtitle bold">Competance</p>
                <div class="w-full flex flex-wrap gap-3 my-3 comps-container" >
                </div>
            </div>
            <div class="flex flex-column mt-3 mb-3">
                <?php foreach($avaliableCompetemces as $competence):?>
                <label for=""><input type="checkbox" name="com-box" value=<?=$competence['NOM']?> > <?=$competence['NOM']?>: <?=$competence['DESCRIPTION']?> </label>
                <?php endforeach?>
                <p class="w-80 text-center text-danger hidden check-box-error">You Must Select One Competence</p>
            </div>
            <input type="submit" value="Create" name="create" class="btn btn-primary mb-11 mt-11" >
        </form>

    </div>
    <div class="h-full bg-gray-300 rounded-lg" style="width: 1px;"></div>
    <div class="w-50 h-full flex justify-center">
        <div class="card rounded-lg shadow-sm relative h-min " style="width: 18rem;">
            <img src="https://placehold.co/600x400/png" class="card-img-top brif-preview-img">
            <div class="card-body">
                <h5 class="card-title mb-2 font-bold">Card title</h5>
                <h1 class="card-subtitle mb-2">8-10-2024</h1>
                <h1 class="text-secondary flex">Link:
                    <p>http://localhost/BP15/files/pdf/iman23<span class="file-name">'Card title'</span>.pdf</p>
                </h1>
                <hr class="mx-2 my-3">
                <h1 class="card-subtitle mb-2">Competence</h1>
                <p class="rounded-pill w-max border border-dark p-2 form-text text-black">C1:maket</p>
                <input type="submit" value="Assign" class="py-1 px-3 rounded-lg text-white bg-blue-500 mt-3">
            </div>
        </div>
    </div>
    
</div>
<script src="./views/js/create-project.page.js"></script>