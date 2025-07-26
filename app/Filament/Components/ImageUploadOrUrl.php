<?php

namespace App\Filament\Components;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;

class ImageUploadOrUrl extends Component
{
    protected string $view = 'filament.components.image-upload-or-url';

    public static function make(string $name): static
    {
        return app(static::class, ['name' => $name]);
    }

    public function getChildComponents(): array
    {
        return [
            Group::make([
                Radio::make($this->getName() . '.type')
                    ->label('Loại hình ảnh')
                    ->options([
                        'upload' => 'Upload file',
                        'url' => 'Link URL'
                    ])
                    ->default('upload')
                    ->inline()
                    ->reactive(),

                FileUpload::make($this->getName() . '.value')
                    ->label('Upload hình ảnh')
                    ->image()
                    ->directory('webdesign')
                    ->visible(fn ($get) => $get($this->getName() . '.type') === 'upload'),

                TextInput::make($this->getName() . '.value')
                    ->label('URL hình ảnh')
                    ->url()
                    ->placeholder('https://example.com/image.jpg')
                    ->visible(fn ($get) => $get($this->getName() . '.type') === 'url'),
            ])
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->schema($this->getChildComponents());
    }
}
