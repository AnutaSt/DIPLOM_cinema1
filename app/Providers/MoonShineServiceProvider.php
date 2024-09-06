<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\FilmScheduleResource;
use App\MoonShine\Resources\HallColumnResource;
use Closure;
use MoonShine\MoonShine;
use MoonShine\Pages\Page;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuElement;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use App\MoonShine\Resources\HallResource;
use App\MoonShine\Resources\HallRowResource;
use App\MoonShine\Resources\MovieResource;
use App\MoonShine\Resources\PlaceResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [
            new HallColumnResource(),
        ];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuItem::make(
                static fn () => __('Hall management'),
                new HallResource()
            ),
            MenuItem::make(
                static fn () => __('Place management'),
                new HallRowResource()
            ),
            MenuItem::make(
                static fn () => __('Movies'),
                new MovieResource()
            ),
            MenuItem::make(
                static fn () => __('Film schedule'),
                new FilmScheduleResource()
            ),
        ];
    }

    /**
     * @return c|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
