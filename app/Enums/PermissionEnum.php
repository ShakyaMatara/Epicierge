<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case MANAGE_USERS = 'manage_users';
    case DELETE_CUSTOMERS = 'delete_customers';
    case DELETE_RESERVATIONS = 'delete_reservations';
}
