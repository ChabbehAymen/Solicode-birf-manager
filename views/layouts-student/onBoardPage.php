<?php
require_once dirname(dirname(dirname(__FILE__))) . '/controllers/studentWkAllBriefController.php';
?>
<?php if (empty($_GET['briefid'])):?>
<div class="w-full h-full">
    <?php foreach ($workingOnBrief as $brief):?>
    <div class="w-full border rounded flex mb-3">
        <div class="pl-3 pb-2" >
            <p class="card-title font-bold m-2"><?=$brief['TITRE']?></p>
            <p>Still Have <?=$brief['REST_DAYS']?> days to Complete It</p>
            <?php foreach (getCompetences($brief['ID_BRIEF']) as $C):?>
            <p><?=$C['N']?>: <?=$C['D']?></p>
            <?php endforeach;?>
        </div>
        <button class="p-2.5 rounded text-white <?= $brief['ETAT']==="TODO"?"hover:bg-green-500 bg-green-400":"hover:bg-blue-500 bg-blue-400" ?> border-0 ml-auto briefStart" type="submit" id="<?=$brief['ID_BRIEF']?>" ><?= $brief['ETAT']==="TODO"?"Start":"Send" ?> </button>
</div>
<?php endforeach;?>
</div>
<?php else:
    require_once dirname(dirname(dirname(__FILE__))) . '/views/layouts-student/briefDetailPage.php';?>
<?php endif?>