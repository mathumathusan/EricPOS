<?php

namespace App\Enums;

enum BarcodeType: string
{
    case C39 = 'C39';
    case C128 = 'C128';
    case EAN13 = 'EAN13';
    case EAN8 = 'EAN8';
    case UPCA = 'UPCA';
    case UPCE = 'UPCE';
}
