<?
require_once 'header.php';
$jsonContent = $json->getAllTarif($_GET['name']);
sort($jsonContent['tarifs']);
?>
<div class="container tarif">
    <div class="row">
        <div class="col-lg-12 menu">
            <a href="/"> Тариф "<?=$_GET['name']?>"</a>
        </div>
        <?foreach ($jsonContent['tarifs'] as $tarif){?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <h4 class="title"><?= $tarif['pay_period'] ?> <?= $json->writeMonth($tarif['pay_period'])?></h4>
                <a href="/choose.php/?name=<?=$_GET['name']?>&id=<?=$tarif['ID']?>" class="link-tarif">
                    <div class="link-tarif-block">
                       <h4><?= $tarif['price']/$tarif['pay_period'] ?> Р/мес</h4>
                        <p>Разовый платеж - <?= $tarif['price'] ?> Р <br>
                        <?= $json->writeDiscount($tarif['pay_period']) ?></p>
                    </div>
                </a>
            </div>
        <?}?>
    </div>
</div>

<? require_once 'footer.php';?>
