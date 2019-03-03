<?php
return [
   'title' => 'Setting One',
   'description' => 'You are standing in a test setting wondering what to do.

You can find the file that holds my data in
<code>app/resources/adventures/test/settings/one/setting.php</code>.',

   'actions' => [
       function (\Expotition\Campaigns\AdventureInterface $adventure) {
           return new \Expotition\Actions\SimpleResponseAction(
               $adventure,
               'Say, "Hello"',
               'You shout, but the eerie silence extinguishes your words and you are left alone once again.'
           );
       },
       function (\Expotition\Campaigns\AdventureInterface $adventure)
       {
           return new \Expotition\Actions\LeaveAction(
                $adventure,
                'Start Walking',
                new \App\SettingReference($adventure, 'two'),
                'You start walking... and walking... and walking...'
            );
       }
    ]
];
