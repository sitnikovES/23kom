<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 18.05.2016
 * Time: 16:25
 */

namespace common\models;


class Data {
    static function getAgentPhone($city_id, $tel_num){
        $list = array();
        $list[1]["tel1"] = '322-322';
        $list[1]["tel2"] = '8-923-464-0829';
        $list[2]["tel1"] = '8-989-169-8989';
        $list[2]["tel2"] = '8-929-832-6980';
        if(!isset($list[$city_id])){
            $city_id = 1;
        }
        return $list[$city_id][$tel_num];
    }

    static function socseti($city_id, $soc){
        //наверно надо перенести в атрибуты города
        $data['def']["ok"] = 'http://www.odnoklassniki.ru/group/57288868495393';
        $data['def']["ok"] = 'https://ok.ru/profile/568311245737';
        $data['def']["vk"] = 'https://vk.com/taxi_komanda';
        $data['def']["vk"] = 'https://vk.com/id253776059';
        $data['def']["g"] = 'https://plus.google.com/105134420165596463684/posts?hl=ru';
        if(!isset($data[$city_id])) {$city_id = 'def';}
        return $data[$city_id][$soc];
    }

    static function smart($type){
        if($type == "ios") return "https://itunes.apple.com/ru/app/uptaxi/id1000185333?l=ru&ls=1&mt=8";
        if($type == "android") return "http://uptaxi.ru/c/kmd";
        //if($type == "android") return "https://play.google.com/store/apps/details?id=uptaxi.all";
        if($type == "winmobile") return "/v-razrabotke.html";
        return "";
    }

    static function tarif($city_id){
        $data['def'][0] = array('name'=>'Стандарт', 'min'=>80, 'km_city'=>18, 'km_out'=>24);
        $data['def'][1] = array('name'=>'Комфорт', 'min'=>100, 'km_city'=>20, 'km_out'=>26);
        $data['def'][2] = array('name'=>'ВИП', 'min'=>150, 'km_city'=>25, 'km_out'=>35);

        if(empty($city_id) or !isset($data[$city_id])){ $city_id = 'def'; }

        return $data[$city_id];
    }
} 