<?php

namespace App\Enums;

enum TableStatus: string
{
    case Pending = 'pending';
    case Available = 'Available';
    case unavailable = 'unavailable';
}
