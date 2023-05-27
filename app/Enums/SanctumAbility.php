<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static User()
 * @method static static Admin()
 */
final class SanctumAbility extends Enum
{
    // 一般
    const User = 'user';
    // 管理者
    const Admin = 'admin';
}
