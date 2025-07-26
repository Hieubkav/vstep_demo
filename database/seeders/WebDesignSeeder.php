<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            [
                'component_name' => 'Hero Section',
                'component_key' => 'hero',
                'title' => 'Hero Section',
                'subtitle' => '3D Visual Specialists for Perfumes & Beauty Brands',
                'content' => [
                    'video_id' => 'GXppDZ0k2IM',
                    'video_start' => 2,
                    'video_end' => 31,
                    'title_lines' => ['CREATE.', 'CAPTIVATE.', 'CONVERT.'],
                    'brands' => [
                        ['url' => 'https://stepv.studio/wp-content/uploads/2024/08/wn-x-black-and-red-2-1024x1017.png', 'alt' => 'WN Brand'],
                        ['url' => 'https://stepv.studio/wp-content/uploads/2024/08/dnalogo-1024x1017.png', 'alt' => 'DNA Brand'],
                        ['url' => 'https://stepv.studio/wp-content/uploads/2024/10/gdivine-1024x1017.png', 'alt' => 'G\'Divine'],
                        ['url' => 'https://stepv.studio/wp-content/uploads/2024/08/hyaluronce-logo-1024x1017.png', 'alt' => 'Hyaluronce'],
                        ['url' => 'https://stepv.studio/wp-content/uploads/2024/11/fivologo-1024x1017.png', 'alt' => 'Fivo'],
                        ['url' => 'https://stepv.studio/wp-content/uploads/2024/10/thedarkageslogo-1024x1017.png', 'alt' => 'The Dark Ages'],
                        ['url' => 'https://stepv.studio/wp-content/uploads/2025/04/gazzaznewlogo-1024x1015.png', 'alt' => 'Gazzaz'],
                        ['url' => 'https://stepv.studio/wp-content/uploads/2024/11/sdvstudios-1024x1017.png', 'alt' => 'SDV Studios'],
                        ['url' => 'https://stepv.studio/wp-content/uploads/2024/10/caronparis-logo-1024x1017.png', 'alt' => 'Caron Paris']
                    ]
                ],
                'button_text' => 'View more',
                'button_url' => '#youradvertising',
                'position' => 1,
                'is_active' => true,
                'settings' => [
                    'autoplay' => true,
                    'mute' => true,
                    'loop' => true,
                    'overlay_opacity' => 0.4
                ]
            ],
            [
                'component_name' => 'Word Slider Section',
                'component_key' => 'word_slider',
                'title' => 'Word Slider',
                'subtitle' => 'Animated Text Slider',
                'content' => [
                    'words' => ['EMPOWER', 'ELEVATE', 'ENCHANT'],
                    'repeat_count' => 4
                ],
                'position' => 2,
                'is_active' => true,
                'settings' => [
                    'animation_speed' => 20,
                    'spacing' => 8
                ]
            ],
            [
                'component_name' => 'Gallery Picture Section',
                'component_key' => 'gallery_picture',
                'title' => 'Gallery Picture',
                'subtitle' => '3-Layer Smile Gallery Layout',
                'content' => [
                    'images' => array_fill(0, 18, [
                        'url' => 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?w=600&h=800&fit=crop&crop=center',
                        'alt' => 'Luxury Cosmetics'
                    ])
                ],
                'position' => 3,
                'is_active' => true,
                'settings' => [
                    'animation_duration' => 700,
                    'hover_scale' => 1.1
                ]
            ],
            [
                'component_name' => 'Your Advice Section',
                'component_key' => 'your_advice',
                'title' => 'Your advertising could look like this',
                'subtitle' => 'Discover how we\'ve helped premium brands and creative industries bring their visions to life with stunning and tailored 3D visuals.',
                'content' => [
                    'buttons' => [
                        [
                            'text' => 'EXPLORE MORE PROJECTS',
                            'url' => '/projects',
                            'style' => 'primary'
                        ],
                        [
                            'text' => 'CONTACT US',
                            'url' => '#contact',
                            'style' => 'secondary'
                        ]
                    ],
                    'videos' => [
                        [
                            'video_id' => 'EZwwRmLAg90',
                            'title' => 'Oro Bianco | BOIS 1920 | Step V Studio | 3D Animation',
                            'link_url' => '/projects'
                        ],
                        [
                            'video_id' => 'M7lc1UVf-VE',
                            'title' => '3D Product Animation - Perfume Bottle',
                            'link_url' => '/projects'
                        ]
                    ]
                ],
                'position' => 4,
                'is_active' => true,
                'settings' => [
                    'desktop_video_height' => 600,
                    'mobile_video_height' => 400
                ]
            ],
            [
                'component_name' => 'Stats Section',
                'component_key' => 'stats',
                'title' => 'Stats',
                'subtitle' => 'Our Achievements',
                'content' => [
                    'stats' => [
                        [
                            'number' => '5+',
                            'label' => 'Years of Experience',
                            'delay' => 100
                        ],
                        [
                            'number' => '100+',
                            'label' => 'Completed Projects',
                            'delay' => 200
                        ],
                        [
                            'number' => '50+',
                            'label' => 'Supporters Worldwide',
                            'delay' => 300
                        ],
                        [
                            'number' => '1000+',
                            'label' => 'Visuals Rendered',
                            'delay' => 400
                        ]
                    ]
                ],
                'position' => 5,
                'is_active' => true,
                'settings' => [
                    'background_color' => 'bg-gray-900'
                ]
            ],
            [
                'component_name' => 'Services Section',
                'component_key' => 'services',
                'title' => 'Our Services',
                'subtitle' => 'Your brand deserves to stand out. At Step V Studio, we help you captivate your audience, boost your sales, and elevate your brand with stunning visuals and animations that leave a lasting impression.',
                'content' => [
                    'services' => [
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2025/03/jomalonewithouttext-min-819x1024.png',
                            'title' => 'Photorealism & High-Resolution Visuals',
                            'desc' => 'Perfect for print, digital, and interactive displays',
                            'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z',
                            'link_url' => '/projects'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2025/03/BOIS-1-1024x576.png',
                            'title' => '3D Product Animations',
                            'desc' => 'Tailored to your product\'s unique story',
                            'icon' => 'M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z',
                            'link_url' => '/projects'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2025/03/BOIS-VFX-2-576x1024.png',
                            'title' => 'VFX / AR Production',
                            'desc' => 'Add a layer of innovation to your campaigns',
                            'icon' => 'M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z',
                            'link_url' => '/projects'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2025/01/2321-680x1024.png',
                            'title' => 'Combinations with Real Film',
                            'desc' => 'Seamlessly blend 3D visuals with real footage',
                            'icon' => 'M18 3v2h-2V3H8v2H6V3H4v18h2v-2h2v2h8v-2h2v2h2V3h-2zM8 17H6v-2h2v2zm0-4H6v-2h2v2zm0-4H6V7h2v2zm10 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V7h2v2z',
                            'link_url' => '/projects'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2024/08/vlcsnap-2024-08-24-20h27m01s097-576x1024.png',
                            'title' => 'TV Commercials',
                            'desc' => 'High-impact visuals for broadcast and digital platforms',
                            'icon' => 'M21 3H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5v2h8v-2h5c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 12H3V5h18v10z',
                            'link_url' => '/projects'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2025/01/pexels-pixabay-164938-1024x620.jpg',
                            'title' => 'Music Production & Voice Overs',
                            'desc' => 'Complete your visuals with professional audio',
                            'icon' => 'M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z',
                            'link_url' => '/projects'
                        ]
                    ]
                ],
                'position' => 6,
                'is_active' => true,
                'settings' => [
                    'background_color' => 'bg-black'
                ]
            ],
            [
                'component_name' => 'Why Choose Us Section',
                'component_key' => 'why_choose_us',
                'title' => 'Why Brands Trust STEP V STUDIO',
                'subtitle' => 'We specialize in crafting photorealistic 3D visuals and animations tailored for the perfumes and beauty industry. Our expertise helps luxury brands captivate their audiences, elevate product presentations, and stand out in a competitive market.',
                'content' => [
                    'features' => [
                        [
                            'icon' => 'fa-gem',
                            'title' => 'Luxury Expertise',
                            'desc' => 'We specialize in perfumes and beauty, ensuring every detail reflects the sophistication of your brand.'
                        ],
                        [
                            'icon' => 'fa-cogs',
                            'title' => 'Tailored Solutions',
                            'desc' => 'Every project is customized to your unique identity, so your visuals stand out in a crowded market.'
                        ],
                        [
                            'icon' => 'fa-award',
                            'title' => 'Proven Quality',
                            'desc' => 'Our portfolio includes work for premium brands like GAZZAZ, G\'DIVINE and CARON PARIS, showcasing our ability to deliver world-class results.'
                        ]
                    ],
                    'section2_title' => 'Why 3D Visuals Are the Smart Choice for Your Brand',
                    'top_cards' => [
                        [
                            'icon' => 'fa-dollar-sign',
                            'title' => 'Cost Efficiency',
                            'items' => [
                                [
                                    'title' => 'Save on Production Costs',
                                    'content' => 'No need for expensive photo shoots, prototypes, or physical setups—our 3D visuals deliver premium results at a fraction of the cost.'
                                ],
                                [
                                    'title' => 'Reusable Assets',
                                    'content' => 'Your 3D visuals can be repurposed across campaigns, saving time and money for future projects.'
                                ],
                                [
                                    'title' => 'Sustainability',
                                    'content' => 'Reduce waste and environmental impact by eliminating the need for physical materials.'
                                ]
                            ]
                        ],
                        [
                            'icon' => 'fa-film',
                            'title' => 'Film Studio Quality',
                            'items' => [
                                [
                                    'title' => 'Photorealistic Perfection',
                                    'content' => 'Hyper-detailed textures, stunning lighting, and lifelike materials that rival real-world photography.'
                                ],
                                [
                                    'title' => 'Unmatched Creative Freedom',
                                    'content' => 'Achieve visuals that are impossible in traditional shoots, such as surreal lighting or floating objects.'
                                ],
                                [
                                    'title' => 'Versatility Across Platforms',
                                    'content' => 'From social media to TV commercials, our visuals are optimized for all formats.'
                                ]
                            ]
                        ],
                        [
                            'icon' => 'fa-rocket',
                            'title' => 'Speed and Flexibility',
                            'items' => [
                                [
                                    'title' => 'Faster Time-to-Market',
                                    'content' => 'Streamlined workflows ensure your visuals are delivered on time without compromising quality.'
                                ],
                                [
                                    'title' => 'Easy Revisions',
                                    'content' => 'Need changes? Our process is built for flexibility, allowing for quick updates and refinements.'
                                ]
                            ]
                        ]
                    ],
                    'bottom_cards' => [
                        [
                            'icon' => 'fa-gem',
                            'title' => 'Tailored for Luxury',
                            'items' => [
                                [
                                    'title' => 'Exclusive Focus on Perfumes & Beauty',
                                    'content' => 'Every project is designed to reflect the sophistication and elegance of your brand.'
                                ],
                                [
                                    'title' => 'Collaborative Process',
                                    'content' => 'Work closely with our team to ensure your vision is brought to life exactly as you imagine.'
                                ]
                            ]
                        ],
                        [
                            'icon' => 'fa-lightbulb',
                            'title' => 'Future-Proof Solutions',
                            'items' => [
                                [
                                    'title' => 'Scalable Assets',
                                    'content' => '3D visuals grow with your brand, allowing for updates and adaptations as your product line evolves.'
                                ],
                                [
                                    'title' => 'Cutting-Edge Technology',
                                    'content' => 'Stay ahead of the curve with visuals created using the latest 3D rendering techniques.'
                                ]
                            ]
                        ]
                    ]
                ],
                'position' => 7,
                'is_active' => true,
                'settings' => [
                    'background_color' => 'bg-black',
                    'video_id' => 'GXppDZ0k2IM',
                    'video_placeholder' => 'https://stepv.studio/wp-content/uploads/2025/03/BTSO-1-2.png'
                ]
            ],
            [
                'component_name' => 'Turning Section',
                'component_key' => 'turning',
                'title' => 'Turning Passion into Perfection',
                'subtitle' => 'Our Story',
                'content' => [
                    'description' => 'At Step V Studio, everything we create starts with a passion for storytelling and innovation. Founded in Stuttgart, Germany, our studio was born from a desire to transform bold ideas into stunning 3D visuals and animations. What began as a dream to push the boundaries of 3D design has evolved into a trusted creative partner for premium brands and visionaries worldwide.\n\nEvery project we take on is a collaboration—your vision, brought to life through our expertise.',
                    'button_text' => 'GET IN CONTACT',
                    'button_url' => '#contact'
                ],
                'position' => 8,
                'is_active' => true,
                'settings' => [
                    'background_color' => 'bg-black',
                    'text_size' => 'text-[60.8px]'
                ]
            ],
            [
                'component_name' => 'Logo Brand Section',
                'component_key' => 'logo_brand',
                'title' => 'Our Founder & Clients',
                'subtitle' => 'Meet the founder and our trusted clients',
                'content' => [
                    'signature_image' => 'https://stepv.studio/wp-content/uploads/2025/04/signaturewhite.png',
                    'founder_name' => 'VASILII GUREV',
                    'founder_title' => 'CEO & FOUNDER OF STEP V STUDIO',
                    'client_logos' => [
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2024/08/wn-x-black-and-red-2-1024x1017.png',
                            'alt' => 'Client Logo 1',
                            'client_name' => 'WN-X'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2024/08/dnalogo-1024x1017.png',
                            'alt' => 'Client Logo 2',
                            'client_name' => 'DNA'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2024/10/gdivine-1024x1017.png',
                            'alt' => 'Client Logo 3',
                            'client_name' => 'G\'DIVINE'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2024/08/hyaluronce-logo-1024x1017.png',
                            'alt' => 'Client Logo 4',
                            'client_name' => 'HYALURONCE'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2024/11/fivologo-1024x1017.png',
                            'alt' => 'Client Logo 5',
                            'client_name' => 'FIVO'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2024/10/thedarkageslogo-1024x1017.png',
                            'alt' => 'Client Logo 6',
                            'client_name' => 'THE DARK AGES'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2025/04/gazzaznewlogo-1024x1015.png',
                            'alt' => 'Client Logo 7',
                            'client_name' => 'GAZZAZ'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2024/11/sdvstudios-1024x1017.png',
                            'alt' => 'Client Logo 8',
                            'client_name' => 'SDV STUDIOS'
                        ],
                        [
                            'image' => 'https://stepv.studio/wp-content/uploads/2024/10/caronparis-logo-1024x1017.png',
                            'alt' => 'Client Logo 9',
                            'client_name' => 'CARON PARIS'
                        ]
                    ]
                ],
                'position' => 9,
                'is_active' => true,
                'settings' => [
                    'background_color' => 'bg-black',
                    'layout' => '2-columns'
                ]
            ],
            [
                'component_name' => 'How We Work Section',
                'component_key' => 'we_work',
                'title' => 'How We Work',
                'subtitle' => 'Our Process',
                'content' => [
                    'description' => 'At Step V Studio, we believe that great results come from a well-structured and transparent workflow. That\'s why we\'ve designed a process that keeps you informed and involved every step of the way.',
                    'button_text' => 'Start your project today',
                    'button_url' => '#contact',
                    'steps' => [
                        [
                            'title' => 'Kick-Off & Planning',
                            'description' => 'We begin with a free consultation to understand your vision, goals, and requirements.',
                            'icon' => 'fa-flag-checkered'
                        ],
                        [
                            'title' => 'Concept Development',
                            'description' => 'We create initial concepts and sketches, ensuring alignment with your brand and vision.',
                            'icon' => 'fa-lightbulb'
                        ],
                        [
                            'title' => 'Design & Modeling',
                            'description' => 'Our team creates detailed 3D models and designs based on approved concepts.',
                            'icon' => 'fa-palette'
                        ],
                        [
                            'title' => 'Review & Feedback',
                            'description' => 'You review the work and provide feedback for any necessary adjustments.',
                            'icon' => 'fa-eye'
                        ],
                        [
                            'title' => 'Final Production',
                            'description' => 'We finalize the project with high-quality rendering and post-production.',
                            'icon' => 'fa-magic'
                        ],
                        [
                            'title' => 'Delivery & Launch',
                            'description' => 'Your project is delivered in all required formats, ready for launch.',
                            'icon' => 'fa-rocket'
                        ]
                    ]
                ],
                'position' => 10,
                'is_active' => true,
                'settings' => [
                    'background_color' => 'bg-black',
                    'layout' => '2-columns'
                ]
            ],
            [
                'component_name' => 'Stay Control Section',
                'component_key' => 'stay_control',
                'title' => 'Stay in Control with Your Client Dashboard',
                'subtitle' => 'Client Dashboard Features',
                'content' => [
                    'description' => 'We\'ve made it easy for you to stay connected and in control!',
                    'features' => [
                        [
                            'title' => 'Access All Your Files',
                            'description' => 'Easily download your project files, deliverables, and revisions at any time, all in one secure location',
                            'icon_svg' => 'M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z',
                            'width' => '40%'
                        ],
                        [
                            'title' => 'Track Your Project\'s Progress',
                            'description' => 'Stay updated with real-time progress tracking, milestones, and deadlines, so you always know what\'s happening',
                            'icon_svg' => 'M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z',
                            'width' => '60%'
                        ],
                        [
                            'title' => 'Communicate Effortlessly',
                            'description' => 'Use the dashboard to send feedback, ask questions, or stay in touch with our team—no endless email chains needed',
                            'icon_svg' => 'M20,2H4A2,2 0 0,0 2,4V22L6,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2M20,16H5.17L4,17.17V4H20V16Z',
                            'width' => '60%'
                        ],
                        [
                            'title' => 'Stay Organized for Future Projects',
                            'description' => 'Your dashboard serves as a long-term archive, so you can revisit past projects or start new ones without losing any information',
                            'icon_svg' => 'M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M19,19H5V5H19V19Z M17,12H7V10H17V12Z M15,16H7V14H15V16Z M17,8H7V6H17V8Z',
                            'width' => '40%'
                        ]
                    ]
                ],
                'position' => 11,
                'is_active' => true,
                'settings' => [
                    'background_color' => 'bg-black',
                    'layout' => 'grid-2x2'
                ]
            ],
            [
                'component_name' => 'Contact Form Section',
                'component_key' => 'contact_form',
                'title' => 'Let\'s bring your vision to life',
                'subtitle' => 'Contact Us',
                'content' => [
                    'description' => 'We\'re here to help you create stunning visuals and animations that captivate your audience and elevate your brand. Whether you have a question, need a quote, or want to discuss your next project, we\'d love to hear from you.',
                    'social_description' => 'Follow us on social media for the latest updates, projects, and behind-the-scenes content.',
                    'social_links' => [
                        [
                            'name' => 'Youtube',
                            'url' => 'https://www.youtube.com/@StepVStudio',
                            'icon' => 'fab fa-youtube'
                        ],
                        [
                            'name' => 'Instagram',
                            'url' => 'https://www.instagram.com/stepv.studio/',
                            'icon' => 'fab fa-instagram'
                        ],
                        [
                            'name' => 'Linkedin',
                            'url' => 'https://www.linkedin.com/company/step-v-studio/',
                            'icon' => 'fab fa-linkedin-in'
                        ]
                    ],
                    'button_text' => 'OUR SERVICES',
                    'button_url' => '/services',
                    'contact_title' => 'How to Reach Us',
                    'email' => 'contact@stepv.studio',
                    'phone' => '+49-176-21129718',
                    'form_title' => 'Or Leave Us a Message',
                    'form_description' => 'Fill out the form below, and we\'ll get back to you within 24 hours.',
                    'service_options' => [
                        ['value' => '3D Product Visualization', 'label' => '3D Product Visualization'],
                        ['value' => '3D Product Animation', 'label' => '3D Product Animation'],
                        ['value' => 'VFX / AR Production', 'label' => 'VFX / AR Production'],
                        ['value' => 'Real Film Production', 'label' => 'Real Film Production'],
                        ['value' => 'TV Commercials', 'label' => 'TV Commercials'],
                        ['value' => 'Music Production & Voice Overs', 'label' => 'Music Production & Voice Overs'],
                        ['value' => 'Brand Communication & Marketing', 'label' => 'Brand Communication & Marketing'],
                        ['value' => 'Other', 'label' => 'Other']
                    ],
                    'privacy_url' => '/privacy-policy'
                ],
                'position' => 12,
                'is_active' => true,
                'settings' => [
                    'background_color' => 'bg-black'
                ]
            ],
            [
                'component_name' => 'Footer Section',
                'component_key' => 'footer',
                'title' => 'Footer',
                'subtitle' => 'Site Footer',
                'content' => [
                    'company_name' => 'STEP V STUDIO',
                    'description' => 'We specialize in crafting photorealistic 3D visuals and animations tailored for the perfumes and beauty industry.',
                    'email' => 'contact@stepv.studio',
                    'phone' => '+49-176-21129718',
                    'address' => 'Stuttgart, Germany',
                    'social_links' => [
                        [
                            'name' => 'Youtube',
                            'url' => 'https://www.youtube.com/@StepVStudio',
                            'icon' => 'fab fa-youtube'
                        ],
                        [
                            'name' => 'Instagram',
                            'url' => 'https://www.instagram.com/stepv.studio/',
                            'icon' => 'fab fa-instagram'
                        ],
                        [
                            'name' => 'Linkedin',
                            'url' => 'https://www.linkedin.com/company/step-v-studio/',
                            'icon' => 'fab fa-linkedin-in'
                        ]
                    ],
                    'quick_links' => [
                        ['title' => 'Home', 'url' => '/'],
                        ['title' => 'Services', 'url' => '/services'],
                        ['title' => 'Projects', 'url' => '/projects'],
                        ['title' => 'Contact', 'url' => '/contact']
                    ],
                    'copyright' => '© 2024 Step V Studio. All rights reserved.'
                ],
                'position' => 13,
                'is_active' => true,
                'settings' => [
                    'background_color' => 'bg-black'
                ]
            ],
            [
                'component_name' => 'About Section',
                'component_key' => 'about',
                'title' => 'About Step V Studio',
                'subtitle' => 'Turning Passion into Perfection',
                'content' => [
                    'description' => 'We are a creative studio specializing in video production, motion graphics, and innovative design solutions.',
                    'features' => [
                        'Professional Video Production',
                        'Motion Graphics & Animation',
                        'Creative Design Solutions',
                        'Brand Development'
                    ]
                ],
                'position' => 3,
                'is_active' => true
            ],

            [
                'component_name' => 'Portfolio Gallery',
                'component_key' => 'portfolio',
                'title' => 'Our Work',
                'subtitle' => 'Portfolio Gallery',
                'content' => [
                    'gallery_type' => 'grid',
                    'show_filters' => true
                ],
                'position' => 5,
                'is_active' => true
            ],
            [
                'component_name' => 'Contact Section',
                'component_key' => 'contact',
                'title' => 'Get In Touch',
                'subtitle' => 'Contact Us',
                'content' => [
                    'show_form' => true,
                    'show_info' => true
                ],
                'position' => 6,
                'is_active' => true
            ]
        ];

        foreach ($components as $component) {
            \App\Models\WebDesign::updateOrCreate(
                ['component_key' => $component['component_key']],
                $component
            );
        }
    }
}
