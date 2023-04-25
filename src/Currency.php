<?php

namespace Falconur\CurrencyCbuUz;

class Currency
{
    public $id;
    public $number;
    public $code;
    public $name_ru;
    public $name_uz;
    public $name_uzc;
    public $name_en;
    public $nominal;
    public $rate;
    public $diff;
    public $date;

    public function __construct($json_data)
    {
        if ($json_data) {
            $this->set($json_data);
        }
    }

    public function set($data) {
        foreach ($data AS $key => $value) {
            match ($key) {
                'CcyNm_RU' => $this->name_ru = $value,
                'CcyNm_UZ' => $this->name_uz = $value,
                'CcyNm_UZC' => $this->name_uzc = $value,
                'CcyNm_EN' => $this->name_en = $value,
                'Ccy' => $this->code = $value,
                'Nominal' => $this->nominal = $value,
                'Rate' => $this->rate = $value,
                'Diff' => $this->diff = $value,
                'Date' => $this->date = $value,
                'id' => $this->id = $value,
                'Code' => $this->number = $value,
                default => $this->{$key} = $value,
            };
        }
    }
}