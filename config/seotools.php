<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => false, // set false to total remove
            'titleBefore'  => 'AGHS - VILLAGE BHANO CHAK P/O WAGHA', // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [
                'lahore school',
                'school',
                'lahore',
                'pakistan',
                'education',
                'aghslahore',
                'AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY',
                'education portal',
                'ministry of education',
                'deep learning',
                'school education',
                'bise lahore'
            ],
            'canonical'    => 'https://aghslahore.com/', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY', // set false to total remove
            'description' => 'Quality education in Lahore, Pakistan. Providing excellent academic programs from Montessori to 10th grade.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY',
            'images'      => ['https://aghslahore.pk/web_assets/images/logo_header.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary_large_image',
            'site'        => '@aghslahore',
            'title'       => 'AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY',
            'description' => 'Quality education in Lahore, Pakistan. Providing excellent academic programs from Montessori to 10th grade.',
            'image'       => 'https://aghslahore.pk/web_assets/images/logo_header.png',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY', // set false to total remove
            'description' => 'Quality education in Lahore, Pakistan. Providing excellent academic programs from Montessori to 10th grade.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'EducationalOrganization',
            'images'      => ['https://aghslahore.pk/web_assets/images/logo_header.png'],
        ],
    ],
];
