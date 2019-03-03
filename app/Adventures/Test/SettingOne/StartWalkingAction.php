<?php

namespace App\Adventures\Test\SettingOne;

use App\Adventures\ActionForgeInterface;
use App\SettingReference;
use Expotition\Actions\ActionInterface;
use Expotition\Actions\LeaveAction;
use Expotition\Campaigns\AdventureInterface;
use Expotition\Settings\SettingInterface;

class StartWalkingAction implements ActionForgeInterface
{
    public function createAction(
        AdventureInterface $adventure,
        SettingInterface $setting
    ): ActionInterface {
        return new LeaveAction(
            $adventure,
            'Start Walking',
            new SettingReference($adventure, 'two'),
            'You start walking... and walking... and walking...'
        );
    }
}
