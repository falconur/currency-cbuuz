<?php

namespace Falconur\CurrencyCbuUz;

class Currency
{
    public $id;
    public $Code;
    public $Ccy;
    public $CcyNm_RU;
    public $CcyNm_UZ;
    public $CcyNm_UZC;
    public $CcyNm_EN;
    public $Nominal;
    public $Rate;
    public $Diff;
    public $Date;

    public function __construct($json_data)
    {
        if ($json_data) {
            $this->set($json_data);
        }
    }

    public function set($data) {
        foreach ($data AS $key => $value) {
            $this->{$key} = $value;
        }
    }
}