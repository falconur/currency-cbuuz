<?php

namespace Falconur\CurrencyCbuUz;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CurrencyRequest
{
    public string $base_url = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/';

    /**
     * @return array|Currency[]
     * @throws GuzzleException
     */
    public function getAllForToday(): array
    {
        return $this->makeRequest();
    }

    /**
     * @param CurrencyType $currency
     * @return Currency
     * @throws GuzzleException
     */
    public function getByCurrencyForToday(CurrencyType $currency): Currency
    {
        return $this->makeRequest("$currency->value/");
    }

    /**
     * @param string $date
     * @return array
     * @throws GuzzleException
     */
    public function getAllByDate(string $date): array
    {
        $date = date('Y-m-d', strtotime($date));

        return $this->makeRequest("all/$date/");
    }

    /**
     * @param CurrencyType $currency
     * @param string $date
     * @return Currency
     * @throws GuzzleException
     */
    public function getByCurrencyAndDate(CurrencyType $currency, string $date): Currency
    {
        $date = date('Y-m-d', strtotime($date));

        return $this->makeRequest("$currency->value/$date/");
    }

    /**
     * @param null $url_param
     * @return Currency|Currency[]
     * @throws GuzzleException|Exception
     */
    private function makeRequest($url_param = null): Currency|array
    {
        if ($url_param) {
            $url = $this->base_url . $url_param;
        }

        $client = new Client();
        $response = $client->request('GET', $url ?? $this->base_url);

        $json_array = json_decode($response->getBody()->getContents(), true);

        if (count($json_array) === 0) {
            throw new Exception('No data found');
        }

        if (count($json_array) === 1) {
            return $this->createObject($json_array[0]);
        }

        $currencies = [];
        foreach ($json_array as $json) {
            $currencies[] = $this->createObject($json);
        }

        return $currencies;
    }

    /**
     * @param array $data
     * @return Currency
     */
    private function createObject(array $data): Currency
    {
        return new Currency($data);
    }
}