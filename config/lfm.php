<?php

/*
|--------------------------------------------------------------------------
| Documentation for this config :
|--------------------------------------------------------------------------
| online  => http://unisharp.github.io/laravel-filemanager/config
| offline => vendor/unisharp/laravel-filemanager/docs/config.md
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
     */

    'use_package_routes'       => true,

    /*
    |--------------------------------------------------------------------------
    | Shared folder / Private folder
    |--------------------------------------------------------------------------
    |
    | If both options are set to false, then shared folder will be activated.
    |
     */

    'allow_private_folder'     => true,

    // Flexible way to customize client folders accessibility
    // If you want to customize client folders, publish tag="lfm_handler"
    // Then you can rewrite userField function in App\Handler\ConfigHandler class
    // And set 'user_field' to App\Handler\ConfigHandler::class
    // Ex: The private folder of user will be named as the user id.
    'private_folder_name'      => UniSharp\LaravelFilemanager\Handlers\ConfigHandler::class,

    'allow_shared_folder'      => false,

    'shared_folder_name'       => 'shares',

    /*
    |--------------------------------------------------------------------------
    | Folder Names
    |--------------------------------------------------------------------------
     */

    'folder_categories' => [
        'product' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'category' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'category_store' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'brand' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'supplier' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'language' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'currency' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'logo' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 50000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
                'image/x-icon',
                'image/vnd.microsoft.icon',
            ],
        ],

        'content' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],
        'page' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'avatar' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'other' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 30000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'banner' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 50000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'cms-image' => [
            'folder_name' => 'cms-image',
            'startup_view' => 'grid',
            'max_size' => 50000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
            ],
        ],

        'file' => [
            'folder_name' => 'file',
            'startup_view' => 'list',
            'max_size' => 50000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'application/pdf',
                'text/plain',
                'image/svg+xml',
            ],
        ],

        'manager' => [
            'folder_name' => '',
            'startup_view' => 'list',
            'max_size' => 50000, // size in KB
            'valid_mime' => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'application/pdf',
                'text/plain',
                'image/svg+xml',
            ],
        ],
        'video' => [
            'folder_name'  => 'videos',
            'startup_view' => 'grid',
            'max_size'     => 500000, // size in KB
            'valid_mime'   => [
                'video/mp4',
                'video/mpeg',
                'video/quicktime',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
     */

    'paginator' => [
        'perPage' => 30,
    ],

    /*
    |--------------------------------------------------------------------------
    | Upload / Validation
    |--------------------------------------------------------------------------
     */

    'disk'                     => 'uploads',

    'rename_file'              => false,

    'rename_duplicates'        => false,

    'alphanumeric_filename'    => false,

    'alphanumeric_directory'   => false,

    'should_validate_size'     => false,

    'should_validate_mime'     => true,

    // behavior on files with identical name
    // setting it to true cause old file replace with new one
    // setting it to false show `error-file-exist` error and stop upload
    'over_write_on_duplicate'  => false,

    /*
    |--------------------------------------------------------------------------
    | Thumbnail
    |--------------------------------------------------------------------------
     */

    // If true, image thumbnails would be created during upload
    'should_create_thumbnails' => true,

    'thumb_folder_name'        => 'thumbs',

    // Create thumbnails automatically only for listed types.
    'raster_mimetypes'         => [
        'image/jpeg',
        'image/pjpeg',
        'image/png',
    ],

    'thumb_img_width'          => 200, // px

    'thumb_img_height'         => 200, // px

    /*
    |--------------------------------------------------------------------------
    | File Extension Information
    |--------------------------------------------------------------------------
     */

    'file_type_array'          => [
        'pdf'  => 'Adobe Acrobat',
        'doc'  => 'Microsoft Word',
        'docx' => 'Microsoft Word',
        'xls'  => 'Microsoft Excel',
        'xlsx' => 'Microsoft Excel',
        'zip'  => 'Archive',
        'gif'  => 'GIF Image',
        'jpg'  => 'JPEG Image',
        'jpeg' => 'JPEG Image',
        'png'  => 'PNG Image',
        'ico'  => 'ICON Image',
        'ppt'  => 'Microsoft PowerPoint',
        'pptx' => 'Microsoft PowerPoint'
    ],

    /*
    |--------------------------------------------------------------------------
    | php.ini override
    |--------------------------------------------------------------------------
    |
    | These values override your php.ini settings before uploading files
    | Set these to false to ingnore and apply your php.ini settings
    |
    | Please note that the 'upload_max_filesize' & 'post_max_size'
    | directives are not supported.
     */
    'php_ini_overrides'        => [
        'memory_limit' => '256M',
    ],

    'middlewares'              => ['auth:admin'],
];
