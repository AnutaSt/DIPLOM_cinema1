<?php

declare(strict_types=1);

namespace App\Forms;

use MoonShine\Fields\Text;
use MoonShine\Fields\Email;
use MoonShine\Fields\Password;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Components\FormBuilder;

final class RegisterForm
{
    public static function make(): FormBuilder
    {
        return FormBuilder::make(route('register'))
            ->customAttributes([
                'class' => 'authentication-form',
            ])
            ->fields([
                Text::make(__('Name'), 'name')
                    ->hint(__('Full name or just name or nickname'))
                    ->required()
                    ->customAttributes([
                        'autofocus' => true,
                        'autocomplete' => 'name',
                    ]),
                Email::make(__('Email'), 'email')
                    ->hint(__('Valid Email. This will be your login username'))
                    ->required(),

                Password::make(__('moonshine::ui.login.password'), 'password')
                    ->hint(__('At least 8 characters'))
                    ->eye()
                    ->required(),

                PasswordRepeat::make(__('Password repeat'), 'password_confirmation')
                    ->eye()
                    ->required(),
            ])->submit(__('Registration'), [
                'class' => 'btn-primary btn-lg w-full',
            ]);
    }
}
