<?php

namespace App\Enum;

abstract class UserEnum extends BasicEnum
{
    const SUPERADMIN = 'super-admin';
    const ADMIN = 'admin';
    const USER = 'user';
    const ADMINLEGAL = 'admin-legal';
    const USERLEGAL = 'user-legal';
}
