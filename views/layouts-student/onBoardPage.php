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
        <form class="w-min ml-auto" action="" method="post">
            <input type="submit" value="<?= $brief['ETAT']==="TODO"?"Start":"Send" ?>" class="p-2.5 rounded text-white <?= $brief['ETAT']==="TODO"?"hover:bg-green-500 bg-green-400":"hover:bg-blue-500 bg-blue-400" ?> border-0 h-full ml-auto briefStart" name="<?= $brief['ETAT']==="TODO"?"start":"send" ?>">
            <input type="text" value="<?=$brief['ID_BRIEF']?>" name="breifID" class="hidden">
        </form>
</div>
<?php endforeach;?>
</div>
<?php else:
    require_once dirname(dirname(dirname(__FILE__))) . '/views/layouts-student/briefDetailPage.php';?>
<?php endif?>