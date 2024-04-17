<?php
require_once dirname(dirname(dirname(__FILE__))) . '/controllers/studentWkAllBriefController.php';
?>
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
        <?php if($brief['ETAT']==="TODO"):?>
        <button class="p-2.5 rounded text-white hover:bg-green-500 bg-green-400 border-0 h-full" type="submit">Start </button>
        <?php else:?>
        <button class=" p-2.5 rounded text-white hover:bg-blue-500 bg-blue-400 border-0 h-full" type="submit">Send </button>
        <?php endif?>
        </form>
</div>
<?php endforeach;?>
</div>