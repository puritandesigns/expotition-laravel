<?php

namespace App\Adventures;

use Expotition\Actions\ActionInterface;
use Expotition\Campaigns\AdventureInterface;
use Expotition\Settings\SettingInterface;

interface ActionForgeInterface
{
    public function createAction(
        AdventureInterface $adventure,
        SettingInterface $setting
    ): ActionInterface;
}
