<?php

namespace App\Enums;

enum OptionType: string {
    case ASCENSEUR = 'ascenseur';
    case JACUZZI = 'jacuzzi';
    case PMR = 'accès PMR';
    case VERANDA = 'veranda';
    case PISCINE = 'piscine';
    case MEZZANINE = 'mezzanine';
}
