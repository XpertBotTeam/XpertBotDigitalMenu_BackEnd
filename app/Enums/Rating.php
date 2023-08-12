<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

// app/Enums/UserRole.php


final class Rating extends Enum
{
    const Good = 'Good';
    const Bad = 'Bad';
    const None = '';
}
