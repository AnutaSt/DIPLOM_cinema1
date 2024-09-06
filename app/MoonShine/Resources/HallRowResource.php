<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Hall;
use App\Models\HallRow;
use MoonShine\Fields\ID;

use App\Models\HallColumn;
use MoonShine\Fields\Field;
use MoonShine\Fields\Number;
use MoonShine\Enums\PageType;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<HallRow>
 */
#[Icon('heroicons.outline.rectangle-group')]
class HallRowResource extends ModelResource
{
    public string $model = HallRow::class;
    protected string $column = 'title';
    protected string $sortDirection = 'ASC';

    public function getActiveActions(): array
    {
        return [];
    }

    public function queryTags(): array
    {
        $halls = Hall::all();

        if ($halls->count() > 0) {
            foreach ($halls as $hall) {
                $tags[] = QueryTag::make(
                    $hall->title,
                    fn () => parent::query()->where('hall_id', $hall->id)
                )->default($hall->id === $hall->min('id'));
            }
            return $tags;
        } else return [];
    }

    public function title(): string
    {
        return __('Place management');
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                //BelongsTo::make(__('Hall'), 'hall', resource: new HallResource()),
                Number::make(__('Row'), 'row'),
                HasMany::make(__('Places'), 'columns', resource: new HallColumnResource()),
            ]),
        ];
    }

    /**
     * @param HallRow $item
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
