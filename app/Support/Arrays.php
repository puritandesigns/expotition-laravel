<?php

namespace App\Support;

use Expotition\Actions\Actions;
use Expotition\Campaigns\Adventure;
use Expotition\Campaigns\Events;
use Expotition\Settings\Setting;

class Arrays
{
    public static function adventure(string $adventure_slug): array
    {
        $data = self::parseFile(
            "adventures/{$adventure_slug}/adventure.php"
        );

        return ['adventure' => new Adventure(
            $data['title'],
            $data['description'],
            $adventure_slug,
            $data['first_setting'],
            new Events(session('events', []))
        )];
    }

    public static function setting(
        string $adventure_slug,
        string $setting_slug
    ): array {
        $adventure_data = self::adventure($adventure_slug);

        $data = self::parseFile(
            "adventures/{$adventure_slug}/settings/{$setting_slug}/setting.php"
        );
        $actions = new Actions();

        $setting = new Setting(
            $adventure_data['adventure'],
            $data['title'],
            $data['description'],
            $setting_slug,
            $actions
        );

        foreach ($data['actions'] as $action) {
            $actions->add($action(
                $adventure_data['adventure'],
                $setting
            ));
        }

        return \array_merge(
            $adventure_data,
            ['setting' => $setting]
        );
    }

    public static function action(
        string $adventure,
        string $setting,
        int $action
    ): array {
        $data = self::setting($adventure, $setting);

        $data['action'] = $data['setting']->getAction($action - 1);

        return $data;
    }

    private static function parseFile(string $relative_path): array
    {        
        return include resource_path($relative_path);
    }
}
