# Valyuta kurslari (Markaziy bank API)

Ushbu kutubxona orqali markaziy bankning [API](https://cbu.uz/uz/arkhiv-kursov-valyut/veb-masteram/)si orqali valyuta kurslarini olishingiz mumkin.

## Oʻrnatish

```bash
composer require falconur/currency-cbuuz
```

## Ishlatish
```php
<?php 

$currency = new CurrencyRequest();

$currencies = $currency->getAllForToday();
# yoki
$currency = $currency->getByCurrencyAndDate(CurrencyType::AFGHANI, '04/02/2023');
```

Maʼlutmolarni ushbu funksiya orqali olishingiz mumkin:

1. `getAllForToday()` – bugungi valyuta kurslarini olish uchun;
2. `getAllByDate` – istalgan sanadagi barcha valyuta kurslarini olish uchun;
3. `getByCurrencyForToday` – ayni bir valyutaning bugungi kursini olish uchun;
4. `getByCurrencyAndDate` – ayni bir valyutaning istalgan sanadagi kursini olish uchun.

### Natija

Natija `Currency` sinfida qaytadi.

`Currency` sinfidagi xususiyatlar:

1. `id` – Tartib raqami;
2. `number` – Valyutaning sonli kodi. Masalan: 840, 978, 643 va boshqalar;
3. `code` – Valyutaning ramzli kodi (alfa-3). Masalan: USD, EUR, RUB va boshqalar;
4. `name_uz` – Valyutaning o‘zbek (lotin) tilidagi nomi;
5. `name_ru` – Valyutaning rus tilidagi nomi;
6. `name_uzc` – Valyutaning o‘zbek (kirillitsa) tilidagi nomi;
7. `name_en` – Valyutaning ingliz tilidagi nomi;
8. `nominal` – Valyutaning birliklar soni;
9. `rate` – Valyuta kursi;
10. `diff` – Valyutlar kurslari farqi;
11. `date` – Kursning amal qilish sanasi.

### Valyuta turlari

Valyuta turlari `CurrencyType` sinfida (enum) joylashgan.

```php
<?php

$currency = $currency->getByCurrencyForToday(CurrencyType::QATARI_RIAL);

