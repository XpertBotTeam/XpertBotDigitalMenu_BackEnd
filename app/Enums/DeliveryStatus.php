<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

// app/Enums/UserRole.php


final class DeliveryStatus extends Enum
{
    const Pending = 'Pending';
    const OutForDelivery = 'Out For Delivery';
    const Delivered = 'Delivered';
}
