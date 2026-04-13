<?php

declare(strict_types=1);

namespace DagaSmart\Social;

use DagaSmart\BizAdmin\Extend\ServiceProvider;
use DagaSmart\BizAdmin\Renderers\Form;
use DagaSmart\BizAdmin\Renderers\TextControl;
use Exception;

class SocialServiceProvider extends ServiceProvider
{
    protected $menu = [];

    /**
     * @throws Exception
     */
    public function register(): void
    {
        parent::register();

        /**安装config**/
        $this->setupConfig();

        /**加载路由**/
        parent::registerRoutes(__DIR__.'/Http/routes.php');
        /**加载语言包**/
        if ($lang = parent::getLangPath()) {
            $this->loadTranslationsFrom($lang, $this->getCode());
        }

    }

    public function settingForm(): ?Form
    {
        return $this->baseSettingForm()->body([
            TextControl::make()->name('value')->label('Value')->required(),
        ]);
    }

    protected function setupConfig(): void
    {
        $configPath = dirname(__DIR__, 1).'/config/social.php';

        if ($this->app->runningInConsole()) {
            $this->publishes([$configPath => config_path('social.php')], 'social');
        }

        $this->mergeConfigFrom($configPath, 'social');
    }



}
