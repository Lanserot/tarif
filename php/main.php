<?php


class main
{
    public $json;

    public function __construct()
    {
        $json = file_get_contents('https://www.sknt.ru/job/frontend/data.json');
        $json = json_decode($json, true);
        $this->json = $json;
    }
    public function writeOptions($arr){
        $html = '';
        if(isset($arr)){
            $html .= '<p>';
            foreach ($arr as $k) {
                $html .= ''.$k.'<br>';
            }
            $html .= '</p>';
        }
        return $html;
    }
    public function getAllTarif($tarifName){
        $json = $this->json;
        foreach ($json['tarifs'] as $tarif){
            if($tarif['title'] === $tarifName) {
                return $tarif;
            }
        }

    }
    public function getTarif($id, $name){
        $tarifs = $this->getAllTarif($name);
        foreach ($tarifs['tarifs'] as $tarif){
            if($tarif['ID'] == $id) {
                return $tarif;
            }
        }
    }
    public function writeMonth($num){
        $text = '';
        switch ($num) {
            case 1:
                $text = "месяц";
                break;
            case 3:
                $text = "месяца";
                break;
            case 6:
                $text = "месяцев";
                break;
            case 12:
                $text = "месяцев";
                break;
            default:
                $text = "месяц";
                break;
        }
        return $text;
    }
    public function getDate($time){
        $date = explode('+', $time);
        $dateReturn = date("Y-m-d", $date[0]);
        return $dateReturn;
    }
    public function writeBGColor($num){
        $text = '';
        switch ($num) {
            case '200':
                $text = "red";
                break;
            case '100':
                $text = "blue";
                break;
            case '50':
                $text = "dirt";
                break;
            default:
                $text = "blue";
                break;
        }
        return $text;
    }
    public function writeDiscount($num){
        $text = '';
        switch ($num) {
            case 3:
                $text = 'Скидка - ' . (50 * $num) . 'Р';
                break;
            case 6:
                $text = 'Скидка - ' . (90 * $num)  . 'Р';
                break;
            case 12:
                $text = 'Скидка - ' . (150 * $num)  . 'Р';
                break;
            default:
                $text = '';
                break;
        }
        return $text;
    }
    public function getMinPrice($arr){
        $tarif = $arr['tarifs'][count($arr['tarifs']) - 1];
        return $tarif['price'] / $tarif['pay_period'];
    }
}