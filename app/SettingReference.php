<?php

namespace App;

use Expotition\Actions\ActionInterface;
use Expotition\Actions\Actions;
use Expotition\Campaigns\AdventureInterface;
use Expotition\Campaigns\Transition;
use Expotition\Messages\Messages;
use Expotition\Settings\SettingInterface;

class SettingReference implements SettingInterface
{
    /** @var string */
    private $slug;
    /** @var AdventureInterface */
    private $adventure;
    /** @var SettingInterface */
    private $setting;

    public function __construct(
        AdventureInterface $adventure,
        string $slug
    ) {
        $this->adventure = $adventure;
        $this->slug = $slug;
    }

    private function getSetting(): SettingInterface
    {
        if (null === $this->setting) {
            $this->setting = \App\Support\Arrays::setting(
                $this->adventure->getSlug(),
                $this->slug
            )['setting'];
        }

        return $this->setting;
    }

    public function getTitle(): string
    {
        return $this->getSetting()->getTitle();
    }

    public function getDescription(): string
    {
        return $this->getSetting()->getDescription();
    }

    public function getActions(): Actions
    {
        return $this->getSetting()->getActions();
    }

    public function getAction(int $index): ActionInterface
    {
        return $this->getSetting()->getAction($index);
    }

    public function doAction($index, Messages $messages): Transition
    {
        return $this->getSetting()->doAction($index, $messages);
    }

    public function getSlug(): string
    {
        return $this->getSetting()->getSlug();
    }
}
