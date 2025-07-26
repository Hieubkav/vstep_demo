<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Filament\Resources\MenuItemResource\RelationManagers;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Tiêu đề')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('parent_id')
                    ->label('Menu cha')
                    ->relationship('parent', 'title')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                Forms\Components\Radio::make('link_type')
                    ->label('Loại liên kết')
                    ->options([
                        'component' => 'Liên kết đến section trong trang',
                        'custom' => 'URL tùy chỉnh',
                        'external' => 'Liên kết ngoài'
                    ])
                    ->default('component')
                    ->inline()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Clear other fields when changing link type
                        if ($state === 'component') {
                            $set('url', null);
                            $set('is_external', false);
                        } elseif ($state === 'custom') {
                            $set('component_target', null);
                            $set('is_external', false);
                        } elseif ($state === 'external') {
                            $set('component_target', null);
                            $set('is_external', true);
                        }
                    }),

                Forms\Components\Select::make('component_target')
                    ->label('Section đích')
                    ->options([
                        'home' => '🏠 Hero Section - Phần đầu trang',
                        'services' => '⚙️ Services Section - Dịch vụ',
                        'about' => '📖 About Section - Giới thiệu',
                        'gallery' => '🖼️ Gallery Section - Thư viện ảnh',
                        'stats' => '📊 Stats Section - Thống kê',
                        'why-choose-us' => '⭐ Why Choose Us - Tại sao chọn chúng tôi',
                        'your-advice' => '🎬 Your Advice - Video showcase',
                        'logo-brand' => '🏢 Logo Brand - Chữ ký & Client logos',
                        'we-work' => '🔄 We Work - Quy trình làm việc',
                        'contact' => '📞 Contact - Liên hệ',
                        'word-slider' => '✨ Word Slider - Text animation',
                    ])
                    ->searchable()
                    ->nullable()
                    ->visible(fn ($get) => $get('link_type') === 'component')
                    ->helperText('Chọn section để scroll tới khi click menu'),

                Forms\Components\TextInput::make('url')
                    ->label('URL')
                    ->url()
                    ->nullable()
                    ->visible(fn ($get) => in_array($get('link_type'), ['custom', 'external']))
                    ->helperText(fn ($get) => $get('link_type') === 'external'
                        ? 'URL đầy đủ (https://example.com)'
                        : 'URL nội bộ (/about-us, /contact)'),

                Forms\Components\TextInput::make('icon')
                    ->label('Icon')
                    ->nullable()
                    ->helperText('Font Awesome class (vd: fas fa-home)'),

                Forms\Components\Textarea::make('description')
                    ->label('Mô tả')
                    ->nullable()
                    ->rows(3),

                Forms\Components\TextInput::make('position')
                    ->label('Vị trí')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Forms\Components\Toggle::make('is_active')
                    ->label('Kích hoạt')
                    ->default(true),

                Forms\Components\Toggle::make('is_external')
                    ->label('Link ngoài')
                    ->default(false)
                    ->disabled()
                    ->helperText('Tự động được đánh dấu khi chọn "Liên kết ngoài"'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('parent.title')
                    ->label('Menu cha')
                    ->sortable()
                    ->placeholder('Menu chính'),

                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->limit(50)
                    ->placeholder('Không có'),

                Tables\Columns\TextColumn::make('component_target')
                    ->label('Component Target')
                    ->placeholder('Không có'),

                Tables\Columns\TextColumn::make('position')
                    ->label('Vị trí')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Kích hoạt')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_external')
                    ->label('Link ngoài')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Trạng thái')
                    ->placeholder('Tất cả')
                    ->trueLabel('Kích hoạt')
                    ->falseLabel('Không kích hoạt'),

                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Menu cha')
                    ->relationship('parent', 'title')
                    ->placeholder('Tất cả'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('position');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
