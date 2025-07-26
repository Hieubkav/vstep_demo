<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ManageSettings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Cài đặt';
    protected static ?string $title = 'Quản lý cài đặt';
    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getSettingsData());
    }

    protected function getSettingsData(): array
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return $settings;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Branding')
                            ->label('Thương hiệu')
                            ->schema([
                                Forms\Components\TextInput::make('site_name')
                                    ->label('Tên website')
                                    ->required(),

                                Forms\Components\FileUpload::make('site_logo')
                                    ->label('Logo website')
                                    ->image()
                                    ->directory('logos'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Colors')
                            ->label('Màu sắc')
                            ->schema([
                                Forms\Components\ColorPicker::make('primary_color')
                                    ->label('Màu chính'),

                                Forms\Components\ColorPicker::make('secondary_color')
                                    ->label('Màu phụ'),
                            ]),

                        Forms\Components\Tabs\Tab::make('SEO')
                            ->label('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('seo_title')
                                    ->label('Tiêu đề SEO')
                                    ->maxLength(60),

                                Forms\Components\Textarea::make('seo_description')
                                    ->label('Mô tả SEO')
                                    ->maxLength(160)
                                    ->rows(3),

                                Forms\Components\FileUpload::make('og_image')
                                    ->label('Hình ảnh Open Graph')
                                    ->image()
                                    ->directory('seo'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Contact')
                            ->label('Liên hệ')
                            ->schema([
                                Forms\Components\TextInput::make('contact_email')
                                    ->label('Email liên hệ')
                                    ->email(),

                                Forms\Components\TextInput::make('contact_phone')
                                    ->label('Số điện thoại'),
                            ]),
                    ])
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Lưu cài đặt')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        // Clear cache để settings mới được load
        \App\Helpers\SettingHelper::clearCache();

        Notification::make()
            ->title('Đã lưu cài đặt thành công!')
            ->success()
            ->send();
    }
}
