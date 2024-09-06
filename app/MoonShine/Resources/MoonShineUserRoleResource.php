<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Hidden;
use MoonShine\Enums\PageType;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Tab;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Tabs;
use MoonShine\Decorations\Block;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Models\MoonshineUserRole;
use MoonShine\Resources\ModelResource;
use Illuminate\Contracts\Database\Eloquent\Builder;

#[Icon('heroicons.outline.bookmark')]
class MoonShineUserRoleResource extends ModelResource
{
    public string $model = MoonshineUserRole::class;
    public string $column = 'name';
    protected bool $isAsync = true;
    protected ?PageType $redirectAfterSave = PageType::INDEX;
    protected ?PageType $redirectAfterUpdate = PageType::INDEX;
    protected bool $withPolicy = true;

    public function query(): Builder
    {
        return parent::query()->where('owner_id', auth()->user()->id)->orWhere('owner_id', null);
    }

    /* protected function onBoot(): void
    {
        $this->detailPage()
            ->setBreadcrumbs([
                '#' => 'dfgg'
            ]);
    } */

    public function title(): string
    {
        return __('moonshine::ui.resource.role');
    }

    public function fields(): array
    {
        return [
            Block::make([
                Tabs::make([
                    Tab::make('Наименование', [
                        ID::make()->hideOnAll(),
                        Text::make(
                            __('moonshine::ui.resource.role_name'),
                            'name',
                            fn ($item) => __($item->name)
                        )->required(),
                    ])->translatable(),
                    Tab::make('Разрешения', [
                        Tabs::make([
                            Tab::make('Пользователи и роли', [
                                Switcher::make('Может создавать пользователей', 'create_users')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может удалять пользователей', 'delete_users')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может изменять данные пользователей', 'update_users')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может просматривать данные пользователей', 'view_users')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может создавать роли', 'create_roles')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может удалять роли', 'delete_roles')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может изменять роли', 'update_roles')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может просматривать роли', 'view_roles')
                                    ->translatable()
                                    ->hideOnIndex(),
                            ])->translatable(),
                            Tab::make('Трафик и статус машин', [
                                Switcher::make('Может впускать машины на парковку', 'entry_of_cars')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может выпускать машины с парковки', 'departure_of_cars')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может просматривать текущие машины на парковке в данный момент', 'view_cars_now')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может просматривать въехавшие/выехавшие машины за день', 'view_cars_per_day')
                                    ->translatable()
                                    ->hideOnIndex(),
                                Switcher::make('Может просматривать въехавшие/выехавшие машины за все время', 'view_cars_all_history')
                                    ->translatable()
                                    ->hideOnIndex(),
                            ])->translatable(),
                            Tab::make('Бухгалтерия', [
                                Switcher::make('Есть доступ к бухгалтерским отчетам', 'view_accounting')
                                    ->translatable()
                                    ->hideOnIndex(),
                            ])->translatable(),
                        ]),
                    ])->translatable()
                ]),
                Hidden::make('owner_id')
                    ->fill(auth()->user()->id)
                    ->hideOnIndex()
                    ->hideOnDetail(),
            ]),
        ];
    }

    /**
     * @return array{name: string}
     */
    public function rules($item): array
    {
        return [
            'name' => 'required|min:3',
        ];
    }

    public function search(): array
    {
        return [
            'id',
            'name',
        ];
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
