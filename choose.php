<?
require_once 'header.php';
$jsonContent = $json->getTarif($_GET['id'], $_GET['name']);
?>
<div class="container main">
    <div class="row">
        <div class="col-lg-12 menu">
            <a href="/tarif.php/?name=<?= $_GET['name'] ?>"> Выбор тарифа</a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <h4 class="title">Тариф <?= $_GET['name'] ?> </h4>
            <p>
                Период оплаты - <?= $jsonContent['pay_period'] ?> <?= $json->writeMonth($jsonContent['pay_period'])?> <br>
                <?= $jsonContent['price']/$jsonContent['pay_period'] ?> Р/мес</p>
            <p>
                Разовый платеж - <?= $jsonContent['price']?> <br>
                Со счета спишется - <?= $jsonContent['price']?>
            </p>
            <p>
                Вступит в силу - сегодня
                <br> Ативно до - <?= $json->getDate($jsonContent['new_payday']); ?>
            </p>
            <button class="btn btn-success">Выбрать</button>
        </div>
    </div>
</div>

<? require_once 'footer.php';?>
