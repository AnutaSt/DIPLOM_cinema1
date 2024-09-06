<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;
use App\Models\HallColumn;

use MoonShine\Fields\Field;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<HallColumn>
 */
class HallColumnResource extends ModelResource
{
    public string $model = HallColumn::class;
    protected string $title = 'HallColumns';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                Number::make(__('Place'), 'column'),

                Select::make(__('Place view'), 'view')
                    ->options([
                        'standart' => __('standart'),
                        'vip' => __('vip')
                    ])->updateOnPreview(),

                Select::make(__('Status'), 'status')
                    ->options([
                        'free' => __('free'),
                        'busy' => __('busy')
                    ])->updateOnPreview()
            ]),
        ];
    }

    /**
     * @param HallColumn $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
