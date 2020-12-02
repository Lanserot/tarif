<?
require_once 'header.php';
$jsonContent = $json->json;
?>

<div class="container main">
    <div class="row">
        <?foreach ($jsonContent['tarifs'] as $tarif){
            sort($tarif['tarifs']); ?>


            <div class="col-lg-4 col-md-6 col-sm-12">
                <h4 class="title ">Тариф "<?= $tarif['title'] ?>"</h4>
                <a href="/tarif.php/?name=<?=$tarif['title']?>" class="link-tarif">
                    <div class="link-tarif-block">
                        <p class="color <?= $json->writeBGColor($tarif['speed'])?>"><?= $tarif['speed'] ?>Мбит/с </p>
                        <h4 class=""><?= $json->getMinPrice($tarif)?> - <?= $tarif['tarifs'][0]['price'] ?>Р/мес</h4>
                        <?= $json->writeOptions($tarif['free_options'])?>
                    </div>
                </a>
                <a href="<?= $tarif['link'] ?>">Узнать подробнее на сайте www.sknt.ru</a>
            </div>
        <?}?>
    </div>
</div>
<? require_once 'footer.php';?>
