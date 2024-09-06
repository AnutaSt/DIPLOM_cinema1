<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;
use MoonShine\Fields\Date;

use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use App\Models\FilmSchedule;
use MoonShine\Fields\Fields;
use MoonShine\Enums\PageType;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\HallResource;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<FilmSchedule>
 */
#[Icon('heroicons.outline.list-bullet')]
class FilmScheduleResource extends ModelResource
{
    public string $model = FilmSchedule::class;
    protected string $column = 'title';
    protected ?PageType $redirectAfterSave = PageType::INDEX;

    public function title(): string
    {
        return __('Film schedule');
    }

    public function getActiveActions(): array
    {
        return ['create', 'delete', 'massDelete', 'update', 'forceDelete'];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                BelongsTo::make(__('Hall'), 'hall', resource: new HallResource())
                    ->sortable(),
                BelongsTo::make(__('Movie'), 'movie', resource: new MovieResource())
                    ->sortable(),
                Date::make(__('Beginning in'), 'date_time')
                    ->withTime()
                    ->format('d.m.Y H:m')
                    ->sortable(),
            ]),
        ];
    }

    /**
     * @param FilmSchedule $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }

    public function import(): ?ImportHandler
    {
        return null;
    }

    public function export(): ?ExportHandler
    {
        return null;
    }
}
