<?php
return [
    'pages' => [
        'about' => [
            'title' => '<i class="fa fa-fw fa-commenting"></i> <span>О компании</span>',
            'blocks' => [
              [
                'id' => 'title',
                'type' => 'text',
                'label' => 'Заголовок',
              ],
              [
                'id' => 'fulltext',
                'type' => 'wysiwyg',
                'label' => 'Описание',
              ],
            ],
        ],
        'home' => [
            'title' => '<i class="fa fa-fw fa-home"></i> <span>Текст на главной странице</span>',
            'blocks' => [
                [
                    'id' => 'title',
                    'type' => 'textarea',
                    'label' => 'Заголовок',
                ],
                [
                    'id' => 'about',
                    'type' => 'textarea',
                    'label' => 'Анонс о компании',
                ],
                [
                    'id' => 'advantages',
                    'type' => 'textarea',
                    'label' => 'Наши преимущества',
                    'attr' => 'rows="10"'
                ],
            ],
        ],
        'contacts' => [
            'title' => '<i class="fa fa-fw fa-compass"></i> <span>Контактная информация</span>',
            'blocks' => [
                [
                  'id' => 'title',
                  'type' => 'text',
                  'label' => 'Заголовок 1 (H1)',
                ],
                [
                  'id' => 'title2',
                  'type' => 'text',
                  'label' => 'Заголовок 2 (H2)',
                ],
                [
                  'id' => 'fulltext',
                  'type' => 'wysiwyg',
                  'label' => 'Контакты',
                ],
                [
                    'id' => 'map',
                    'type' => 'textarea',
                    'label' => 'Код Яндекс курты',
                ],
            ],
        ],
        'job' => [
            'title' => '<i class="fa fa-fw fa-briefcase"></i> <span>Текст на странице вакансий</span>',
            'blocks' => [
                [
                    'id' => 'title',
                    'type' => 'text',
                    'label' => 'Заголовок',
                ],
                [
                    'id' => 'fulltext',
                    'type' => 'wysiwyg',
                    'label' => 'Текст',
                ],
            ],
        ],
        'work' => [
            'title' => '<i class="fa fa-fw fa-gears"></i> <span>Текст на странице работ</span>',
            'blocks' => [
                [
                    'id' => 'title',
                    'type' => 'text',
                    'label' => 'Заголовок',
                ],
                [
                    'id' => 'fulltext',
                    'type' => 'wysiwyg',
                    'label' => 'Текст',
                ],
            ],
        ],
        'partner' => [
            'title' => '<i class="fa fa-fw fa-group"></i> <span>Текст на странице партнеров</span>',
            'blocks' => [
                [
                    'id' => 'title',
                    'type' => 'text',
                    'label' => 'Заголовок',
                ],
                [
                    'id' => 'fulltext',
                    'type' => 'wysiwyg',
                    'label' => 'Текст',
                ],
            ],
        ],
        'inform' => [
            'title' => '<i class="fa fa-fw fa-newspaper-o"></i> <span>Полезная информация</span>',
            'blocks' => [
                [
                    'id' => 'title',
                    'type' => 'text',
                    'label' => 'Заголовок',
                ],
                [
                    'id' => 'fulltext',
                    'type' => 'wysiwyg',
                    'label' => 'Текст',
                ],
            ],
        ],
        'sertificat' => [
            'title' => '<i class="fa fa-fw fa-briefcase"></i> <span>Сертификаты и разрешения</span>',
            'blocks' => [
                [
                  'id' => 'title',
                  'type' => 'text',
                  'label' => 'Заголовок',
                ],
                [
                  'id' => 'images',
                  'type' => 'images',
                  'label' => 'Фото сертификатов',
                ],
            ],
        ],
        'politic' => [
            'title' => '<i class="fa fa-fw fa-hand-pointer-o"></i> <span>Пользовательское соглашение</span>',
            'blocks' => [
                [
                  'id' => 'title',
                  'type' => 'text',
                  'label' => 'Заголовок',
                ],
                [
                  'id' => 'fulltext',
                  'type' => 'wysiwyg',
                  'label' => 'Текст пользовательского соглашения',
                ],
            ],
        ],
        'blocks' => [
            'title' => '<i class="fa fa-fw fa-hdd-o"></i> <span>Настройки</span>',
            'blocks' => [
                [
                  'id' => 'top_contact',
                  'type' => 'textarea',
                  'label' => 'Контакты вверху сайта',
                ],
                [
                  'id' => 'top_phone',
                  'type' => 'textarea',
                  'label' => 'Телефоны вверху сайта',
                ],
                [
                  'id' => 'bottom_contact',
                  'type' => 'textarea',
                  'label' => 'Контакты внизу сайта',
                ],
                [
                  'id' => 'bottom_phone',
                  'type' => 'textarea',
                  'label' => 'Телефоны внизу сайта',
                ],
                [
                  'id' => 'bottom_text',
                  'type' => 'textarea',
                  'label' => 'Подпись внизу сайта',
                ],
                [
                  'id' => 'email',
                  'type' => 'text',
                  'label' => 'Контактрый email',
                ],
            ],
        ],
    ],
    
    'settings' => [
        
    ],
];
