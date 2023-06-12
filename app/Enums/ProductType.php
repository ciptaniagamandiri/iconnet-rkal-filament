<?php
namespace App\Enums;

enum ProductType: int
{
    case Paket = 1;
    case AddOns = 2;

    public function label(): string
    {
        return match ($this) {
            self::Paket => 'Paket Internet',
            self::AddOns => 'Add Ons',
        };
    }
}
