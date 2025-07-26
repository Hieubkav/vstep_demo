@props([
    'type' => 'Organization',
    'data' => []
])

@php
    $defaultOrganizationData = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => get_site_name(),
        'description' => 'Chuyên gia 3D Visual cho thương hiệu nước hoa & mỹ phẩm',
        'url' => url('/'),
        'logo' => get_site_logo(),
        'image' => get_site_logo(),
        'telephone' => '+84-xxx-xxx-xxx',
        'email' => 'contact@stepv.studio',
        'address' => [
            '@type' => 'PostalAddress',
            'addressCountry' => 'VN',
            'addressLocality' => 'Ho Chi Minh City',
            'addressRegion' => 'Ho Chi Minh',
        ],
        'sameAs' => [
            'https://www.youtube.com/@StepVStudio',
            'https://www.instagram.com/stepv.studio/',
            'https://www.linkedin.com/company/step-v-studio/'
        ],
        'foundingDate' => '2019',
        'numberOfEmployees' => '10-50',
        'industry' => '3D Visualization and Animation',
        'services' => [
            '3D Visualization',
            '3D Animation', 
            'Product Visualization',
            'Perfume Marketing',
            'Beauty Brand Visualization'
        ]
    ];

    $websiteData = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => get_site_name(),
        'url' => url('/'),
        'description' => 'Chuyên gia 3D Visual cho thương hiệu nước hoa & mỹ phẩm',
        'publisher' => [
            '@type' => 'Organization',
            'name' => get_site_name(),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => get_site_logo()
            ]
        ],
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => url('/') . '?search={search_term_string}',
            'query-input' => 'required name=search_term_string'
        ]
    ];

    $breadcrumbData = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Trang chủ',
                'item' => url('/')
            ]
        ]
    ];

    $structuredData = match($type) {
        'Organization' => array_merge($defaultOrganizationData, $data),
        'WebSite' => array_merge($websiteData, $data),
        'BreadcrumbList' => array_merge($breadcrumbData, $data),
        default => array_merge($defaultOrganizationData, $data)
    };
@endphp

<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
