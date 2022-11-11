<?php

namespace App\Admin;


use Sulu\Bundle\AdminBundle\Admin\Admin;

class ExtranetAdmin extends Admin {
    public const SYSTEM = 'Extranet';

    public function getSecurityContexts() {
        return [self::SYSTEM => []];
    }
}
