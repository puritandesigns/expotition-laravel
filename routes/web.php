<?php

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['prefix' => 'adventure'], function () {
    Route::get(
        '/{adventure_slug}/{setting_slug}/{action_id}',
        function ($adventure_slug, $setting_slug, $action_id) {
            /** @var \Expotition\Campaigns\AdventureInterface $adventure
             *  @var \Expotition\Settings\SettingInterface $setting
             *  @var \Expotition\Actions\ActionInterface $action */
            list($adventure, $setting) = array_values(\App\Support\Arrays::setting(
                $adventure_slug, $setting_slug
            ));

            try {
                $transition = $adventure->doAction($setting, $action_id - 1);
            } catch (\Expotition\Campaigns\QuestException $e) {
                \App\Support\Session::setMessages($e->getMessages());

                return redirect(route('complete', $adventure_slug));
            }

            \App\Support\Session::setMessages($transition->getMessages());

            $current_setting = $transition->getSetting();

            session()->put('events', $adventure->getEvents()->toArray());

            session()->put('current_setting', $slug = $current_setting->getSlug());

            return redirect(route('setting', [$adventure_slug, $slug]));
        }
    )->name('action');

    Route::get(
        '/{adventure_slug}/complete',
        function ($adventure_slug) {
            return view(
                'complete',
                \App\Support\Arrays::adventure($adventure_slug)
//                \App\Support\Yaml::adventure($adventure_slug)
            );
        }
    )->name('complete');

    Route::get(
        '/{adventure}/{setting}',
        function ($adventure, $setting) {
            return view(
                'setting',
                \App\Support\Arrays::setting($adventure, $setting)
//                \App\Support\Yaml::setting($adventure, $setting)
            );
        }
    )->name('setting');

    Route::get(
        '/{adventure}',
        function ($adventure) {
            return view(
                'adventure',
                \App\Support\Arrays::adventure($adventure)
                //\App\Support\Yaml::adventure($adventure)
            );
        }
    )->name('adventure');

    Route::get('/', function () {
        return redirect(route('adventure', 'test'));
    });
});
