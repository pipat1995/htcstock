<?php

namespace App\Enum;

abstract class UserEnum extends BasicEnum
{
    const SUPERADMIN = 'super-admin';
    const ADMIN = 'admin';
    const USER = 'user';
}
