<?php
namespace Models;
class RateModel extends Model{

    public function process()
    {
        $currency = htmlspecialchars($_GET["currency"]);
        $ondate = htmlspecialchars($_GET["ondate"]);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://www.nbrb.by/api/exrates/rates/'. $currency . '?ondate=' . $ondate);
        curl_setopt($curl, CURLOPT_HEADER, 0);  
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
        $answer = curl_exec($curl);

        if(!$res = json_decode($answer)){
            throw new \Exception("not JSON answer");
        }

        if(!$res->Cur_OfficialRate){
            throw new \Exception("no rate in answer");
        }
        return ["Cur_OfficialRate" => $res->Cur_OfficialRate];
    }
}