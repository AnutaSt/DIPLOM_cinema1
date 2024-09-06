<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Hall;
use App\Models\Place;
use App\Models\HallRow;
use MoonShine\Fields\ID;
use App\Models\HallColumn;

use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Number;
use MoonShine\Enums\PageType;
use MoonShine\Attributes\Icon;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Hall>
 */

#[Icon('heroicons.rectangle-stack')]
class HallResource extends ModelResource
{
    public string $model = Hall::class;
    protected string $column = 'title';
    protected ?PageType $redirectAfterSave = PageType::INDEX;
    protected string $sortDirection = 'ASC';

    public function title(): string
    {
        return __('Hall management');
    }

    public function getActiveActions(): array
    {
        return ['create', 'delete', 'massDelete', 'update'];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                Text::make(__('Name of the hall'), 'title')
                    ->required()
                    ->sortable(),
                Number::make(__('Rows'), 'rows')
                    ->required(),
                Number::make(__('Places in a row'), 'columns')
                    ->required(),
                Number::make(__('Price for ordinary chairs'), 'price_for_standart')
                    ->required(),
                Number::make(__('VIP chair price'), 'price_for_vip')
                    ->required(),
                Switcher::make(__('Open sales'), 'is_active')
                    ->updateOnPreview()
            ]),
        ];
    }

    protected function afterCreated(Model $item): Model
    {
        for ($r = 1; $r <= (int)$item->rows; $r++) {
            $row = HallRow::create([
                'hall_id' => $item->id,
                'row' => $r,
            ]);

            for ($c = 1; $c <= (int)$item->columns; $c++) {
                HallColumn::create([
                    'hall_row_id' => $row->id,
                    'column' => $c,
                    'view' => 'standart',
                    'status' => 'free',
                ]);
            }
        }
        return $item;
    }

    protected function afterUpdated(Model $item): Model
    {

        return $item;
    }

    /**
     * @param Hall $item
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
