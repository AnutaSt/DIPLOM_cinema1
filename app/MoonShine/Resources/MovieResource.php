<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Movie;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Enums\PageType;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<m>
 */
#[Icon('heroicons.outline.video-camera')]
class MovieResource extends ModelResource
{
    public string $model = Movie::class;
    protected string $column = 'title';
    protected ?PageType $redirectAfterSave = PageType::INDEX;

    public function title(): string
    {
        return __('Movies');
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                Text::make(__('Title'), 'title')
                    ->required()
                    ->sortable(),
                Image::make(__('Thumbnail'), 'thumbnail')
                    ->dir('movies')
                    ->removable()
                    ->allowedExtensions(['jpg', 'jpeg', 'png', 'gif'])
                    ->hint(__('Allowed extenshions: jpg, jpeg, png, gif')),
                Text::make(__('Subtitle'), 'subTitle')
                    ->required(),
                Text::make(__('Country/Duration'), 'additional')
                    ->required(),
            ]),
        ];
    }

    /**
     * @param m $item
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
