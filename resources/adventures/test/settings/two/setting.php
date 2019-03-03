<?php return [
   'title' => 'Second Setting',
   'description' => "You are still in a test setting. It's rather flat and plain.",
   'actions' => [
       function (\Expotition\Campaigns\AdventureInterface $adventure)
       {
           $event = 'kept-walking';
           $description = 'Keep Walking';

           return new \Expotition\Actions\BinaryAction(
                $adventure,
                new \Expotition\Actions\HasEventOccurredCheck($event),
                new \Expotition\Actions\CompleteQuestAction(
                    $adventure,
                    $description,
                    0,
                    'You keep walking but fail to notice the bottomless pit. Now you keep falling....'
                ),
                new \Expotition\Actions\AddEventAction(
                    $adventure,
                    $event,
                    $description,
                    'You keep walking... and walking... and walking...'
                )
            );
       }
   ]
];
