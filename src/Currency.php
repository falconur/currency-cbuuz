<?php

namespace Falconur\CurrencyCbuUz;

class Currency
{
    public int $id;
    public string $number;
    public string $code;
    public string $name_ru;
    public string $name_uz;
    public string $name_uzc;
    public string $name_en;
    public int $nominal;
    public float $rate;
    public float $diff;
    public string $date;

    public function __construct($json_data)
    {
        if ($json_data) {
            $this->set($json_data);
        }
    }

    public function set($data)
    {
        foreach ($data as $key => $value) {
            match ($key) {
                'CcyNm_RU' => $this->name_ru = $value,
                'CcyNm_UZ' => $this->name_uz = $value,
                'CcyNm_UZC' => $this->name_uzc = $value,
                'CcyNm_EN' => $this->name_en = $value,
                'Ccy' => $this->code = $value,
                'Nominal' => $this->nominal = (int)$value,
                'Rate' => $this->rate = (float)$value,
                'Diff' => $this->diff = (float)$value,
                'Date' => $this->date = date('Y-m-d', strtotime($value)),
                'id' => $this->id = (int)$value,
                'Code' => $this->number = $value,
                default => $this->{$key} = $value,
            };
        }
    }
}