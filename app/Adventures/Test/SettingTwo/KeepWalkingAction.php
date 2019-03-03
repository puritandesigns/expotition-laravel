<?php

namespace App\Adventures\Test\SettingTwo;

use App\Adventures\ActionForgeInterface;
use Expotition\Actions\ActionInterface;
use Expotition\Actions\AddEventAction;
use Expotition\Actions\BinaryAction;
use Expotition\Actions\CompleteQuestAction;
use Expotition\Actions\ConditionalCheckInterface;
use Expotition\Campaigns\AdventureInterface;
use Expotition\Settings\SettingInterface;

class KeepWalkingAction implements ActionForgeInterface
{
    private $description = 'Keep Walking';

    public function createAction(
        AdventureInterface $adventure,
        SettingInterface $setting
    ): ActionInterface {
        return new BinaryAction(
            $adventure,
            new class implements ConditionalCheckInterface {
                public function check(AdventureInterface $adventure): bool
                {
                    return $adventure->hasEventOccurred('kept-walking');
                }
            },
            new CompleteQuestAction(
                $adventure,
                $this->description,
                0,
                'You keep walking but fail to notice the bottomless pit. Now you keep falling....'
            ),
            new AddEventAction(
                $adventure,
                'kept-walking',
                $this->description,
                'You keep walking... and walking... and walking...'
            )
        );
    }
}
