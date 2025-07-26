<?php

namespace App\Filament\Pages;

use App\Models\WebDesign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use App\Filament\Components\ImageUploadOrUrl;


class ManageWebDesign extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';
    protected static ?string $navigationLabel = 'Thiết kế Web';
    protected static ?string $title = 'Quản lý thiết kế website';
    protected static string $view = 'filament.pages.manage-web-design';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getWebDesignData());
    }

    protected function getWebDesignData(): array
    {
        $components = WebDesign::orderBy('position')->get();
        $data = [];

        foreach ($components as $component) {
            $componentData = [
                'is_active' => $component->is_active,
                'position' => $component->position,
                'title' => $component->title,
                'subtitle' => $component->subtitle,
                'image_url' => $component->image_url,
                'video_url' => $component->video_url,
                'button_text' => $component->button_text,
                'button_url' => $component->button_url,
            ];

            // Add content fields
            if ($component->content) {
                $componentData['content'] = $component->content;
            }

            // Add settings fields
            if ($component->settings) {
                $componentData['settings'] = $component->settings;
            }

            $data[$component->component_key] = $componentData;
        }

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Components')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Hero Section')
                            ->label('Hero Section')
                            ->schema([
                                Forms\Components\Toggle::make('hero.is_active')
                                    ->label('Kích hoạt Hero Section')
                                    ->default(true),

                                Forms\Components\TextInput::make('hero.title')
                                    ->label('Tiêu đề chính'),

                                Forms\Components\TextInput::make('hero.subtitle')
                                    ->label('Phụ đề'),

                                Forms\Components\Repeater::make('hero.content.title_lines')
                                    ->label('Dòng tiêu đề (CREATE, CAPTIVATE, CONVERT)')
                                    ->simple(
                                        Forms\Components\TextInput::make('line')
                                            ->label('Dòng text')
                                            ->required()
                                    )
                                    ->defaultItems(3)
                                    ->minItems(1)
                                    ->maxItems(5),

                                Forms\Components\TextInput::make('hero.content.video_id')
                                    ->label('YouTube Video ID')
                                    ->helperText('Chỉ hiển thị khi bật video background'),

                                Forms\Components\TextInput::make('hero.content.video_start')
                                    ->label('Video bắt đầu (giây)')
                                    ->numeric()
                                    ->default(0),

                                Forms\Components\TextInput::make('hero.content.video_end')
                                    ->label('Video kết thúc (giây)')
                                    ->numeric()
                                    ->helperText('Để trống nếu muốn play hết video'),

                                Forms\Components\Toggle::make('hero.settings.autoplay')
                                    ->label('Tự động play video')
                                    ->default(true),

                                Forms\Components\Toggle::make('hero.settings.mute')
                                    ->label('Tắt tiếng video')
                                    ->default(true),

                                Forms\Components\Toggle::make('hero.settings.loop')
                                    ->label('Lặp lại video')
                                    ->default(true),

                                Forms\Components\Repeater::make('hero.content.brands')
                                    ->label('Brand Logos')
                                    ->schema([
                                        Forms\Components\TextInput::make('url')
                                            ->label('URL hình ảnh')
                                            ->url()
                                            ->required(),
                                        Forms\Components\TextInput::make('alt')
                                            ->label('Alt text')
                                            ->required(),
                                    ])
                                    ->defaultItems(3)
                                    ->collapsible(),

                                Forms\Components\TextInput::make('hero.button_text')
                                    ->label('Text nút'),

                                Forms\Components\TextInput::make('hero.button_url')
                                    ->label('URL nút'),

                                Forms\Components\TextInput::make('hero.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(1),
                            ]),

                        Forms\Components\Tabs\Tab::make('Word Slider')
                            ->label('Word Slider Section')
                            ->schema([
                                Forms\Components\Toggle::make('word_slider.is_active')
                                    ->label('Kích hoạt Word Slider')
                                    ->default(true),

                                Forms\Components\Repeater::make('word_slider.content.words')
                                    ->label('Từ khóa chạy')
                                    ->simple(
                                        Forms\Components\TextInput::make('word')
                                            ->label('Từ khóa')
                                            ->required()
                                    )
                                    ->defaultItems(3)
                                    ->minItems(1)
                                    ->maxItems(10),

                                Forms\Components\TextInput::make('word_slider.content.repeat_count')
                                    ->label('Số lần lặp lại')
                                    ->numeric()
                                    ->default(4)
                                    ->rules(['min:1', 'max:10']),

                                Forms\Components\TextInput::make('word_slider.settings.animation_speed')
                                    ->label('Tốc độ animation (giây)')
                                    ->numeric()
                                    ->default(20)
                                    ->rules(['min:5', 'max:60']),

                                Forms\Components\TextInput::make('word_slider.settings.spacing')
                                    ->label('Khoảng cách giữa các từ')
                                    ->numeric()
                                    ->default(8)
                                    ->rules(['min:2', 'max:20']),

                                Forms\Components\TextInput::make('word_slider.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(2),
                            ]),

                        Forms\Components\Tabs\Tab::make('Gallery Picture')
                            ->label('Gallery Picture Section')
                            ->schema([
                                Forms\Components\Toggle::make('gallery_picture.is_active')
                                    ->label('Kích hoạt Gallery Picture')
                                    ->default(true),

                                Forms\Components\Repeater::make('gallery_picture.content.images')
                                    ->label('Hình ảnh Gallery (18 ảnh)')
                                    ->schema([
                                        Forms\Components\Group::make([
                                            Forms\Components\Radio::make('image_type')
                                                ->label('Loại hình ảnh')
                                                ->options([
                                                    'upload' => 'Upload file',
                                                    'url' => 'Link URL'
                                                ])
                                                ->default('upload')
                                                ->inline()
                                                ->reactive(),

                                            Forms\Components\FileUpload::make('url')
                                                ->label('Upload hình ảnh')
                                                ->image()
                                                ->directory('gallery')
                                                ->required()
                                                ->visible(fn ($get) => $get('image_type') === 'upload'),

                                            Forms\Components\TextInput::make('image_url')
                                                ->label('URL hình ảnh')
                                                ->url()
                                                ->placeholder('https://example.com/image.jpg')
                                                ->required()
                                                ->visible(fn ($get) => $get('image_type') === 'url'),
                                        ])->columns(1),
                                        Forms\Components\TextInput::make('alt')
                                            ->label('Alt text')
                                            ->default('Gallery Image'),
                                    ])
                                    ->defaultItems(18)
                                    ->minItems(18)
                                    ->maxItems(18)
                                    ->columns(2),

                                Forms\Components\TextInput::make('gallery_picture.settings.animation_duration')
                                    ->label('Thời gian animation (ms)')
                                    ->numeric()
                                    ->default(700)
                                    ->rules(['min:300', 'max:2000']),

                                Forms\Components\TextInput::make('gallery_picture.settings.hover_scale')
                                    ->label('Tỷ lệ phóng to khi hover')
                                    ->numeric()
                                    ->step(0.1)
                                    ->default(1.1)
                                    ->rules(['min:1.0', 'max:1.5']),

                                Forms\Components\TextInput::make('gallery_picture.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(3),
                            ]),

                        Forms\Components\Tabs\Tab::make('Your Advice')
                            ->label('Your Advice Section')
                            ->schema([
                                Forms\Components\Toggle::make('your_advice.is_active')
                                    ->label('Kích hoạt Your Advice Section')
                                    ->default(true),

                                Forms\Components\TextInput::make('your_advice.title')
                                    ->label('Tiêu đề chính')
                                    ->default('Your advertising could look like this'),

                                Forms\Components\Textarea::make('your_advice.subtitle')
                                    ->label('Phụ đề')
                                    ->rows(3)
                                    ->default('Discover how we\'ve helped premium brands and creative industries bring their visions to life with stunning and tailored 3D visuals.'),

                                Forms\Components\Repeater::make('your_advice.content.buttons')
                                    ->label('Nút bấm')
                                    ->schema([
                                        Forms\Components\TextInput::make('text')
                                            ->label('Text nút')
                                            ->required(),
                                        Forms\Components\TextInput::make('url')
                                            ->label('Link URL')
                                            ->required(),
                                        Forms\Components\Select::make('style')
                                            ->label('Kiểu nút')
                                            ->options([
                                                'primary' => 'Primary (White border)',
                                                'secondary' => 'Secondary (Gold border)'
                                            ])
                                            ->default('primary'),
                                    ])
                                    ->defaultItems(2)
                                    ->minItems(1)
                                    ->maxItems(3)
                                    ->columns(2),

                                Forms\Components\Repeater::make('your_advice.content.videos')
                                    ->label('Video showcase (2 videos)')
                                    ->schema([
                                        Forms\Components\TextInput::make('video_id')
                                            ->label('YouTube Video ID')
                                            ->required()
                                            ->helperText('Ví dụ: EZwwRmLAg90'),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Tiêu đề video')
                                            ->required(),
                                        Forms\Components\TextInput::make('link_url')
                                            ->label('Link khi click')
                                            ->default('#projects'),
                                    ])
                                    ->defaultItems(2)
                                    ->minItems(2)
                                    ->maxItems(2)
                                    ->columns(1),

                                Forms\Components\TextInput::make('your_advice.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(4),
                            ]),

                        Forms\Components\Tabs\Tab::make('Stats')
                            ->label('Stats Section')
                            ->schema([
                                Forms\Components\Toggle::make('stats.is_active')
                                    ->label('Kích hoạt Stats Section')
                                    ->default(true),

                                Forms\Components\Repeater::make('stats.content.stats')
                                    ->label('Thống kê (4 items)')
                                    ->schema([
                                        Forms\Components\TextInput::make('number')
                                            ->label('Số liệu')
                                            ->placeholder('5+, 100+, 1000+'),
                                        Forms\Components\TextInput::make('label')
                                            ->label('Nhãn')
                                            ->placeholder('Years of Experience'),
                                        Forms\Components\TextInput::make('delay')
                                            ->label('Animation delay (ms)')
                                            ->numeric()
                                            ->default(100)
                                            ->helperText('Delay cho animation AOS'),
                                    ])
                                    ->defaultItems(4)
                                    ->minItems(2)
                                    ->maxItems(6)
                                    ->columns(2),

                                Forms\Components\Select::make('stats.settings.background_color')
                                    ->label('Màu nền')
                                    ->options([
                                        'bg-gray-900' => 'Gray 900',
                                        'bg-black' => 'Black',
                                        'bg-stepv-dark' => 'StepV Dark',
                                        'bg-stepv-dark-light' => 'StepV Dark Light'
                                    ])
                                    ->default('bg-gray-900'),

                                Forms\Components\TextInput::make('stats.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(5),
                            ]),

                        Forms\Components\Tabs\Tab::make('Services')
                            ->label('Services Section')
                            ->schema([
                                Forms\Components\Toggle::make('services.is_active')
                                    ->label('Kích hoạt Services Section')
                                    ->default(true),

                                Forms\Components\TextInput::make('services.title')
                                    ->label('Tiêu đề chính')
                                    ->default('Our Services'),

                                Forms\Components\Textarea::make('services.subtitle')
                                    ->label('Phụ đề')
                                    ->rows(3)
                                    ->default('Your brand deserves to stand out. At Step V Studio, we help you captivate your audience, boost your sales, and elevate your brand with stunning visuals and animations that leave a lasting impression.'),

                                Forms\Components\Repeater::make('services.content.services')
                                    ->label('Dịch vụ (6 items)')
                                    ->schema([
                                        Forms\Components\Group::make([
                                            Forms\Components\Radio::make('image_type')
                                                ->label('Loại hình ảnh')
                                                ->options([
                                                    'upload' => 'Upload file',
                                                    'url' => 'Link URL'
                                                ])
                                                ->default('upload')
                                                ->inline()
                                                ->reactive(),

                                            Forms\Components\FileUpload::make('image')
                                                ->label('Upload hình ảnh')
                                                ->image()
                                                ->directory('services')
                                                ->visible(fn ($get) => $get('image_type') === 'upload'),

                                            Forms\Components\TextInput::make('image_url')
                                                ->label('URL hình ảnh')
                                                ->url()
                                                ->placeholder('https://example.com/image.jpg')
                                                ->visible(fn ($get) => $get('image_type') === 'url'),
                                        ])->columns(1),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Tiêu đề dịch vụ')
                                            ->placeholder('Photorealism & High-Resolution Visuals'),
                                        Forms\Components\Textarea::make('desc')
                                            ->label('Mô tả')
                                            ->rows(2)
                                            ->placeholder('Perfect for print, digital, and interactive displays'),
                                        Forms\Components\Textarea::make('icon')
                                            ->label('SVG Icon Path')
                                            ->rows(2)
                                            ->placeholder('M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10...'),
                                        Forms\Components\TextInput::make('link_url')
                                            ->label('Link URL')
                                            ->default('/projects'),
                                    ])
                                    ->defaultItems(6)
                                    ->minItems(3)
                                    ->maxItems(9)
                                    ->columns(2),

                                Forms\Components\Select::make('services.settings.background_color')
                                    ->label('Màu nền')
                                    ->options([
                                        'bg-black' => 'Black',
                                        'bg-gray-900' => 'Gray 900',
                                        'bg-stepv-dark' => 'StepV Dark',
                                    ])
                                    ->default('bg-black'),

                                Forms\Components\TextInput::make('services.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(6),
                            ]),

                        Forms\Components\Tabs\Tab::make('Why Choose Us')
                            ->label('Why Choose Us Section')
                            ->schema([
                                Forms\Components\Toggle::make('why_choose_us.is_active')
                                    ->label('Kích hoạt Why Choose Us Section')
                                    ->default(true),

                                Forms\Components\TextInput::make('why_choose_us.title')
                                    ->label('Tiêu đề chính')
                                    ->default('Why Brands Trust STEP V STUDIO'),

                                Forms\Components\Textarea::make('why_choose_us.subtitle')
                                    ->label('Phụ đề')
                                    ->rows(3)
                                    ->default('We specialize in crafting photorealistic 3D visuals and animations tailored for the perfumes and beauty industry.'),

                                Forms\Components\TextInput::make('why_choose_us.video_id')
                                    ->label('YouTube Video ID')
                                    ->default('GXppDZ0k2IM')
                                    ->helperText('Video ID cho showreel'),

                                Forms\Components\Group::make([
                                    Forms\Components\Radio::make('why_choose_us.video_placeholder_type')
                                        ->label('Loại hình ảnh placeholder')
                                        ->options([
                                            'upload' => 'Upload file',
                                            'url' => 'Link URL'
                                        ])
                                        ->default('upload')
                                        ->inline()
                                        ->reactive(),

                                    Forms\Components\FileUpload::make('why_choose_us.video_placeholder')
                                        ->label('Upload placeholder image')
                                        ->image()
                                        ->directory('why-choose-us')
                                        ->visible(fn ($get) => $get('why_choose_us.video_placeholder_type') === 'upload'),

                                    Forms\Components\TextInput::make('why_choose_us.video_placeholder_url')
                                        ->label('URL placeholder image')
                                        ->url()
                                        ->placeholder('https://example.com/placeholder.jpg')
                                        ->visible(fn ($get) => $get('why_choose_us.video_placeholder_type') === 'url'),
                                ])->columns(1),

                                Forms\Components\Repeater::make('why_choose_us.content.features')
                                    ->label('Features (3 items)')
                                    ->schema([
                                        Forms\Components\TextInput::make('icon')
                                            ->label('FontAwesome Icon')
                                            ->placeholder('fa-gem'),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Tiêu đề'),
                                        Forms\Components\Textarea::make('desc')
                                            ->label('Mô tả')
                                            ->rows(2),
                                    ])
                                    ->defaultItems(3)
                                    ->minItems(2)
                                    ->maxItems(5)
                                    ->columns(2),

                                Forms\Components\TextInput::make('why_choose_us.content.section2_title')
                                    ->label('Tiêu đề section 2')
                                    ->default('Why 3D Visuals Are the Smart Choice for Your Brand'),

                                Forms\Components\Repeater::make('why_choose_us.content.top_cards')
                                    ->label('Top Cards (3 items)')
                                    ->schema([
                                        Forms\Components\TextInput::make('icon')
                                            ->label('FontAwesome Icon')
                                            ->placeholder('fa-dollar-sign'),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Tiêu đề card'),
                                        Forms\Components\Repeater::make('items')
                                            ->label('Items trong card')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Tiêu đề item'),
                                                Forms\Components\Textarea::make('content')
                                                    ->label('Nội dung')
                                                    ->rows(2),
                                            ])
                                            ->defaultItems(2)
                                            ->minItems(1)
                                            ->maxItems(5)
                                            ->columns(1),
                                    ])
                                    ->defaultItems(3)
                                    ->minItems(2)
                                    ->maxItems(5)
                                    ->columns(1),

                                Forms\Components\Repeater::make('why_choose_us.content.bottom_cards')
                                    ->label('Bottom Cards (2 items)')
                                    ->schema([
                                        Forms\Components\TextInput::make('icon')
                                            ->label('FontAwesome Icon')
                                            ->placeholder('fa-gem'),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Tiêu đề card'),
                                        Forms\Components\Repeater::make('items')
                                            ->label('Items trong card')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Tiêu đề item'),
                                                Forms\Components\Textarea::make('content')
                                                    ->label('Nội dung')
                                                    ->rows(2),
                                            ])
                                            ->defaultItems(2)
                                            ->minItems(1)
                                            ->maxItems(5)
                                            ->columns(1),
                                    ])
                                    ->defaultItems(2)
                                    ->minItems(1)
                                    ->maxItems(4)
                                    ->columns(1),

                                Forms\Components\TextInput::make('why_choose_us.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(7),
                            ]),

                        Forms\Components\Tabs\Tab::make('Turning')
                            ->label('Turning Section')
                            ->schema([
                                Forms\Components\Toggle::make('turning.is_active')
                                    ->label('Kích hoạt Turning Section')
                                    ->default(true),

                                Forms\Components\TextInput::make('turning.title')
                                    ->label('Tiêu đề chính')
                                    ->default('Turning Passion into Perfection'),

                                Forms\Components\Textarea::make('turning.content.description')
                                    ->label('Mô tả')
                                    ->rows(6)
                                    ->default('At Step V Studio, everything we create starts with a passion for storytelling and innovation. Founded in Stuttgart, Germany, our studio was born from a desire to transform bold ideas into stunning 3D visuals and animations. What began as a dream to push the boundaries of 3D design has evolved into a trusted creative partner for premium brands and visionaries worldwide.\n\nEvery project we take on is a collaboration—your vision, brought to life through our expertise.'),

                                Forms\Components\TextInput::make('turning.content.button_text')
                                    ->label('Text nút bấm')
                                    ->default('GET IN CONTACT'),

                                Forms\Components\TextInput::make('turning.content.button_url')
                                    ->label('Link nút bấm')
                                    ->default('#contact'),

                                Forms\Components\Select::make('turning.settings.background_color')
                                    ->label('Màu nền')
                                    ->options([
                                        'bg-black' => 'Black',
                                        'bg-gray-900' => 'Gray 900',
                                        'bg-stepv-dark' => 'StepV Dark',
                                    ])
                                    ->default('bg-black'),

                                Forms\Components\Select::make('turning.settings.text_size')
                                    ->label('Kích thước text tiêu đề')
                                    ->options([
                                        'text-4xl md:text-5xl lg:text-6xl' => 'Large (Responsive)',
                                        'text-[60.8px]' => 'Fixed 60.8px',
                                        'text-5xl' => 'Extra Large',
                                        'text-6xl' => 'Huge',
                                    ])
                                    ->default('text-[60.8px]'),

                                Forms\Components\TextInput::make('turning.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(8),
                            ]),

                        Forms\Components\Tabs\Tab::make('Logo Brand')
                            ->label('Logo Brand Section')
                            ->schema([
                                Forms\Components\Toggle::make('logo_brand.is_active')
                                    ->label('Kích hoạt Logo Brand Section')
                                    ->default(true),

                                Forms\Components\Group::make([
                                    Forms\Components\Radio::make('logo_brand.content.signature_image_type')
                                        ->label('Loại ảnh chữ ký')
                                        ->options([
                                            'upload' => 'Upload file',
                                            'url' => 'Link URL'
                                        ])
                                        ->default('upload')
                                        ->inline()
                                        ->reactive(),

                                    Forms\Components\FileUpload::make('logo_brand.content.signature_image')
                                        ->label('Upload ảnh chữ ký')
                                        ->image()
                                        ->directory('logo-brand')
                                        ->visible(fn ($get) => $get('logo_brand.content.signature_image_type') === 'upload'),

                                    Forms\Components\TextInput::make('logo_brand.content.signature_image_url')
                                        ->label('URL ảnh chữ ký')
                                        ->url()
                                        ->placeholder('https://example.com/signature.png')
                                        ->visible(fn ($get) => $get('logo_brand.content.signature_image_type') === 'url'),
                                ])->columns(1),

                                Forms\Components\TextInput::make('logo_brand.content.founder_name')
                                    ->label('Tên founder')
                                    ->default('VASILII GUREV'),

                                Forms\Components\TextInput::make('logo_brand.content.founder_title')
                                    ->label('Chức danh founder')
                                    ->default('CEO & FOUNDER OF STEP V STUDIO'),

                                Forms\Components\Repeater::make('logo_brand.content.client_logos')
                                    ->label('Logo khách hàng (9 logos)')
                                    ->schema([
                                        Forms\Components\Group::make([
                                            Forms\Components\Radio::make('image_type')
                                                ->label('Loại logo')
                                                ->options([
                                                    'upload' => 'Upload file',
                                                    'url' => 'Link URL'
                                                ])
                                                ->default('upload')
                                                ->inline()
                                                ->reactive(),

                                            Forms\Components\FileUpload::make('image')
                                                ->label('Upload logo')
                                                ->image()
                                                ->directory('client-logos')
                                                ->visible(fn ($get) => $get('image_type') === 'upload'),

                                            Forms\Components\TextInput::make('image_url')
                                                ->label('URL logo')
                                                ->url()
                                                ->placeholder('https://example.com/logo.png')
                                                ->visible(fn ($get) => $get('image_type') === 'url'),
                                        ])->columns(1),
                                        Forms\Components\TextInput::make('alt')
                                            ->label('Alt text')
                                            ->placeholder('Client Logo'),
                                        Forms\Components\TextInput::make('client_name')
                                            ->label('Tên khách hàng')
                                            ->placeholder('Client Name'),
                                    ])
                                    ->defaultItems(9)
                                    ->minItems(6)
                                    ->maxItems(12)
                                    ->columns(2),

                                Forms\Components\Select::make('logo_brand.settings.background_color')
                                    ->label('Màu nền')
                                    ->options([
                                        'bg-black' => 'Black',
                                        'bg-gray-900' => 'Gray 900',
                                        'bg-stepv-dark' => 'StepV Dark',
                                    ])
                                    ->default('bg-black'),

                                Forms\Components\Select::make('logo_brand.settings.layout')
                                    ->label('Layout')
                                    ->options([
                                        '2-columns' => '2 Columns (50/50)',
                                        '1-column' => '1 Column (Stacked)',
                                    ])
                                    ->default('2-columns'),

                                Forms\Components\TextInput::make('logo_brand.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(9),
                            ]),

                        Forms\Components\Tabs\Tab::make('We Work')
                            ->label('How We Work Section')
                            ->schema([
                                Forms\Components\Toggle::make('we_work.is_active')
                                    ->label('Kích hoạt How We Work Section')
                                    ->default(true),

                                Forms\Components\TextInput::make('we_work.title')
                                    ->label('Tiêu đề chính')
                                    ->default('How We Work'),

                                Forms\Components\Textarea::make('we_work.content.description')
                                    ->label('Mô tả')
                                    ->rows(4)
                                    ->default('At Step V Studio, we believe that great results come from a well-structured and transparent workflow. That\'s why we\'ve designed a process that keeps you informed and involved every step of the way.'),

                                Forms\Components\TextInput::make('we_work.content.button_text')
                                    ->label('Text nút bấm')
                                    ->default('Start your project today'),

                                Forms\Components\TextInput::make('we_work.content.button_url')
                                    ->label('Link nút bấm')
                                    ->default('#contact'),

                                Forms\Components\Repeater::make('we_work.content.steps')
                                    ->label('Các bước làm việc (6 steps)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Tiêu đề step')
                                            ->required(),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Mô tả step')
                                            ->rows(2)
                                            ->required(),
                                        Forms\Components\TextInput::make('icon')
                                            ->label('FontAwesome Icon')
                                            ->placeholder('fa-flag-checkered')
                                            ->helperText('Ví dụ: fa-flag-checkered, fa-lightbulb, fa-palette'),
                                    ])
                                    ->defaultItems(6)
                                    ->minItems(4)
                                    ->maxItems(8)
                                    ->columns(2),

                                Forms\Components\Select::make('we_work.settings.background_color')
                                    ->label('Màu nền')
                                    ->options([
                                        'bg-black' => 'Black',
                                        'bg-gray-900' => 'Gray 900',
                                        'bg-stepv-dark' => 'StepV Dark',
                                    ])
                                    ->default('bg-black'),

                                Forms\Components\Select::make('we_work.settings.layout')
                                    ->label('Layout')
                                    ->options([
                                        '2-columns' => '2 Columns (Text left, Circle right)',
                                        '1-column' => '1 Column (Stacked)',
                                    ])
                                    ->default('2-columns'),

                                Forms\Components\TextInput::make('we_work.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(10),
                            ]),

                        Forms\Components\Tabs\Tab::make('Stay Control')
                            ->label('Stay Control Section')
                            ->schema([
                                Forms\Components\Toggle::make('stay_control.is_active')
                                    ->label('Kích hoạt Stay Control Section')
                                    ->default(true),

                                Forms\Components\TextInput::make('stay_control.title')
                                    ->label('Tiêu đề chính')
                                    ->default('Stay in Control with Your Client Dashboard'),

                                Forms\Components\Textarea::make('stay_control.content.description')
                                    ->label('Mô tả')
                                    ->rows(3)
                                    ->default('We\'ve made it easy for you to stay connected and in control!'),

                                Forms\Components\Repeater::make('stay_control.content.features')
                                    ->label('Tính năng dashboard (4 features)')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Tiêu đề feature')
                                            ->required(),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Mô tả feature')
                                            ->rows(2)
                                            ->required(),
                                        Forms\Components\Textarea::make('icon_svg')
                                            ->label('SVG Icon')
                                            ->rows(3)
                                            ->helperText('Paste SVG path data here')
                                            ->placeholder('M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z'),
                                        Forms\Components\Select::make('width')
                                            ->label('Độ rộng card')
                                            ->options([
                                                '40%' => '40% (Narrow)',
                                                '60%' => '60% (Wide)',
                                                '50%' => '50% (Equal)',
                                            ])
                                            ->default('50%'),
                                    ])
                                    ->defaultItems(4)
                                    ->minItems(2)
                                    ->maxItems(6)
                                    ->columns(2),

                                Forms\Components\Select::make('stay_control.settings.background_color')
                                    ->label('Màu nền')
                                    ->options([
                                        'bg-black' => 'Black',
                                        'bg-gray-900' => 'Gray 900',
                                        'bg-stepv-dark' => 'StepV Dark',
                                    ])
                                    ->default('bg-black'),

                                Forms\Components\Select::make('stay_control.settings.layout')
                                    ->label('Layout')
                                    ->options([
                                        'grid-2x2' => '2x2 Grid',
                                        'single-column' => 'Single Column',
                                        'custom' => 'Custom Widths',
                                    ])
                                    ->default('grid-2x2'),

                                Forms\Components\TextInput::make('stay_control.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(11),
                            ]),

                        Forms\Components\Tabs\Tab::make('Contact Form')
                            ->label('Contact Form Section')
                            ->schema([
                                Forms\Components\Toggle::make('contact_form.is_active')
                                    ->label('Kích hoạt Contact Form Section')
                                    ->default(true),

                                Forms\Components\TextInput::make('contact_form.title')
                                    ->label('Tiêu đề chính')
                                    ->default('Let\'s bring your vision to life'),

                                Forms\Components\Textarea::make('contact_form.content.description')
                                    ->label('Mô tả')
                                    ->rows(4)
                                    ->default('We\'re here to help you create stunning visuals and animations that captivate your audience and elevate your brand. Whether you have a question, need a quote, or want to discuss your next project, we\'d love to hear from you.'),

                                Forms\Components\TextInput::make('contact_form.content.social_description')
                                    ->label('Mô tả social media')
                                    ->default('Follow us on social media for the latest updates, projects, and behind-the-scenes content.'),

                                Forms\Components\Repeater::make('contact_form.content.social_links')
                                    ->label('Social Media Links')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Tên platform')
                                            ->placeholder('Youtube'),
                                        Forms\Components\TextInput::make('url')
                                            ->label('URL')
                                            ->url()
                                            ->placeholder('https://www.youtube.com/@StepVStudio'),
                                        Forms\Components\TextInput::make('icon')
                                            ->label('FontAwesome Icon')
                                            ->placeholder('fab fa-youtube'),
                                    ])
                                    ->defaultItems(3)
                                    ->minItems(1)
                                    ->maxItems(6)
                                    ->columns(2),

                                Forms\Components\TextInput::make('contact_form.content.button_text')
                                    ->label('Text nút services')
                                    ->default('OUR SERVICES'),

                                Forms\Components\TextInput::make('contact_form.content.button_url')
                                    ->label('Link nút services')
                                    ->default('/services'),

                                Forms\Components\TextInput::make('contact_form.content.contact_title')
                                    ->label('Tiêu đề thông tin liên hệ')
                                    ->default('How to Reach Us'),

                                Forms\Components\TextInput::make('contact_form.content.email')
                                    ->label('Email')
                                    ->email()
                                    ->default('contact@stepv.studio'),

                                Forms\Components\TextInput::make('contact_form.content.phone')
                                    ->label('Số điện thoại')
                                    ->default('+49-176-21129718'),

                                Forms\Components\TextInput::make('contact_form.content.form_title')
                                    ->label('Tiêu đề form')
                                    ->default('Or Leave Us a Message'),

                                Forms\Components\TextInput::make('contact_form.content.form_description')
                                    ->label('Mô tả form')
                                    ->default('Fill out the form below, and we\'ll get back to you within 24 hours.'),

                                Forms\Components\Repeater::make('contact_form.content.service_options')
                                    ->label('Service Options')
                                    ->schema([
                                        Forms\Components\TextInput::make('value')
                                            ->label('Value')
                                            ->required(),
                                        Forms\Components\TextInput::make('label')
                                            ->label('Label')
                                            ->required(),
                                    ])
                                    ->defaultItems(8)
                                    ->minItems(3)
                                    ->maxItems(15)
                                    ->columns(2),

                                Forms\Components\TextInput::make('contact_form.content.privacy_url')
                                    ->label('Privacy Policy URL')
                                    ->default('/privacy-policy')
                                    ->helperText('Có thể là relative URL (/privacy-policy) hoặc full URL (https://...)'),

                                Forms\Components\Select::make('contact_form.settings.background_color')
                                    ->label('Màu nền')
                                    ->options([
                                        'bg-black' => 'Black',
                                        'bg-gray-900' => 'Gray 900',
                                        'bg-stepv-dark' => 'StepV Dark',
                                    ])
                                    ->default('bg-black'),

                                Forms\Components\TextInput::make('contact_form.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(12),
                            ]),

                        Forms\Components\Tabs\Tab::make('Footer')
                            ->label('Footer Section')
                            ->schema([
                                Forms\Components\Toggle::make('footer.is_active')
                                    ->label('Kích hoạt Footer Section')
                                    ->default(true),

                                Forms\Components\TextInput::make('footer.content.company_name')
                                    ->label('Tên công ty')
                                    ->default('STEP V STUDIO'),

                                Forms\Components\Textarea::make('footer.content.description')
                                    ->label('Mô tả công ty')
                                    ->rows(3)
                                    ->default('We specialize in crafting photorealistic 3D visuals and animations tailored for the perfumes and beauty industry.'),

                                Forms\Components\TextInput::make('footer.content.email')
                                    ->label('Email')
                                    ->email()
                                    ->default('contact@stepv.studio'),

                                Forms\Components\TextInput::make('footer.content.phone')
                                    ->label('Số điện thoại')
                                    ->default('+49-176-21129718'),

                                Forms\Components\TextInput::make('footer.content.address')
                                    ->label('Địa chỉ')
                                    ->default('Stuttgart, Germany'),

                                Forms\Components\Repeater::make('footer.content.social_links')
                                    ->label('Social Media Links')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Tên platform')
                                            ->placeholder('Youtube'),
                                        Forms\Components\TextInput::make('url')
                                            ->label('URL')
                                            ->placeholder('https://www.youtube.com/@StepVStudio'),
                                        Forms\Components\TextInput::make('icon')
                                            ->label('FontAwesome Icon')
                                            ->placeholder('fab fa-youtube'),
                                    ])
                                    ->defaultItems(3)
                                    ->minItems(1)
                                    ->maxItems(6)
                                    ->columns(2),

                                Forms\Components\Repeater::make('footer.content.quick_links')
                                    ->label('Quick Links')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Tiêu đề link')
                                            ->required(),
                                        Forms\Components\TextInput::make('url')
                                            ->label('URL')
                                            ->required(),
                                    ])
                                    ->defaultItems(4)
                                    ->minItems(2)
                                    ->maxItems(8)
                                    ->columns(2),

                                Forms\Components\TextInput::make('footer.content.copyright')
                                    ->label('Copyright text')
                                    ->default('© 2024 Step V Studio. All rights reserved.'),

                                Forms\Components\Select::make('footer.settings.background_color')
                                    ->label('Màu nền')
                                    ->options([
                                        'bg-black' => 'Black',
                                        'bg-gray-900' => 'Gray 900',
                                        'bg-stepv-dark' => 'StepV Dark',
                                    ])
                                    ->default('bg-black'),

                                Forms\Components\TextInput::make('footer.position')
                                    ->label('Vị trí')
                                    ->numeric()
                                    ->default(13),
                            ]),


                    ])
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Lưu thiết kế')
                ->action('save'),


        ];
    }





    public function save(): void
    {
        try {
            $data = $this->form->getState();

            foreach ($data as $componentKey => $componentData) {
                if (!empty($componentData)) {
                    // Always update existing components or create new ones
                    WebDesign::updateOrCreate(
                        ['component_key' => $componentKey],
                        array_merge($componentData, [
                            'component_name' => ucfirst(str_replace('_', ' ', $componentKey)) . ' Section',
                            'component_key' => $componentKey,
                        ])
                    );
                }
            }

            // Clear any cached data
            cache()->forget('webdesign_components');

            Notification::make()
                ->title('Đã lưu thiết kế thành công!')
                ->body('Tất cả thay đổi đã được lưu vào database.')
                ->success()
                ->send();

            // Refresh form data
            $this->form->fill($this->getWebDesignData());

        } catch (\Exception $e) {
            Notification::make()
                ->title('Lỗi khi lưu thiết kế!')
                ->body('Chi tiết lỗi: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }


}
