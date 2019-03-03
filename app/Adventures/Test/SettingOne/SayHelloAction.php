<?php

namespace App\Adventures\Test\SettingOne;

use App\Adventures\ActionForgeInterface;
use Expotition\Actions\ActionInterface;
use Expotition\Actions\SimpleResponseAction;
use Expotition\Campaigns\AdventureInterface;
use Expotition\Settings\SettingInterface;

class SayHelloAction implements ActionForgeInterface
{
    public function createAction(
        AdventureInterface $adventure,
        SettingInterface $setting
    ): ActionInterface {
        return new SimpleResponseAction(
            $adventure,
            'Say, "Hello"',
            'You shout, but the eerie silence extinguishes your words and you are left alone once again.'
        );
    }
}
