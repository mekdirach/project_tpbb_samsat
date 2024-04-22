<?php

namespace App\Services;

class UimService
{
    const CODE_MESSAGE_TEXT = [
        00 => 'Success',
        44 => 'User tidak ditemukan',
        62 => 'User tidak valid, maksimal 4 karakter',
    ];

}
