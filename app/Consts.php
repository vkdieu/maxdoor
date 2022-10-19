<?php

namespace App;

class Consts
{
    // For delete some data
    const STATUS_DELETE = 'delete';

    // Status for users
    const USER_STATUS = [
        'pending' => 'pending',
        'active' => 'active',
        'deactive' => 'deactive',
        'delete' => 'delete'
    ];

    // Status for general
    const STATUS = [
        'active' => 'active',
        'deactive' => 'deactive'
    ];

    // Array taxonomy status
    const TAXONOMY_STATUS = [
        'active' => 'active',
        'deactive' => 'deactive'
    ];
    // Thể loại taxonomy
    const TAXONOMY = [
        'post' => 'post',
        'service' => 'service',
        'product' => 'product',
        // 'resource' => 'resource',
        // 'tags' => 'tags'
    ];
    // Loại bài đăng
    const POST_TYPE = [
        'post' => 'post',
        'product' => 'product',
        'service' => 'service',
        // 'resource' => 'resource'
    ];
    // Mảng lưu trạng thái bài viết
    const POST_STATUS = [
        'pending' => 'pending',
        'active' => 'active',
        'deactive' => 'deactive'
    ];
    const ROUTE_TAXONOMY = [
        'post' => 'frontend.cms.post',
        'service' => 'frontend.cms.service',
        'product' => 'frontend.cms.product',
        // 'resource' => 'frontend.cms.resource',
        // 'tags' => 'frontend.cms.tags'
    ];
    const ROUTE_POST = [
        'post' => 'frontend.cms.post.detail',
        'service' => 'frontend.cms.service.detail',
        'product' => 'frontend.cms.product.detail',
        // 'resource' => 'frontend.cms.resource.detail'
    ];
    const ROUTE_CUSTOM_PAGE = 'frontend.page';

    const DEFAULT_PAGINATE_LIMIT = 20;
    const POST_PAGINATE_LIMIT = 3;
    const SERVICES_PAGINATE_LIMIT = 9;
    const RESOURCE_PAGINATE_LIMIT = 6;
    const DEFAULT_OTHER_LIMIT = 6;
    const DEFAULT_RELATED_LIMIT = 6;
    const DEFAULT_SIDEBAR_LIMIT = 5;
    const PRODUCT_PAGINATE_LIMIT = 6;

    const TITLE_BOOLEAN = [
        '1' => 'true',
        '0' => 'false'
    ];

    const MENU_TYPE = [
        'header' => 'header',
        'footer' => 'footer'
    ];

    const URI_TYPE = [
        'route' => 'Route name',
        'path' => 'Path',
        'url' => 'Url Customize',
    ];

    // Loại liên hệ
    const CONTACT_TYPE = [
        'contact' => 'contact',
        'faq' => 'faq',
        'newsletter' => 'newsletter',
        'advise' => 'advise',
        'call_request' => 'call_request'
    ];
    const CONTACT_STATUS = [
        'new' => 'new',
        'processing' => 'processing',
        'processed' => 'processed',
        'cancel' => 'cancel'
    ];
    // Type for order
    const ORDER_TYPE = [
        'product' => 'product',
        'service' => 'service',
    ];
    const ORDER_STATUS = [
        'new' => 'new',
        'processing' => 'processing',
        'processed' => 'processed',
        'cancel' => 'cancel'
    ];

    // Tạo danh sách chức năng định tuyến để gọi khi tạo trang trong admin -> người dùng có thể tùy chọn
    const ROUTE_NAME = [
        [
            "title" => "Home Page",
            "name" => "frontend.home",
            "template" => [
                [
                    "title" => "Home Primary",
                    "name" => "home.primary"
                ]
            ]
        ],
        [
            "title" => "Detail Post Page",
            "name" => "frontend.cms.post.detail",
            "template" => [
                [
                    "title" => "Post Default",
                    "name" => "post.detail"
                ]
            ]
        ],
        [
            "title" => "Post Category Page",
            "name" => "frontend.cms.post",
            "template" => [
                [
                    "title" => "Post Category Default",
                    "name" => "post.default"
                ]
            ]
        ],
        [
            "title" => "Service Category Page",
            "name" => "frontend.cms.service",
            "template" => [
                [
                    "title" => "Service Category Default",
                    "name" => "service.default"
                ]
            ]
        ],
        [
            "title" => "Detail Service Page",
            "name" => "frontend.cms.service.detail",
            "template" => [
                [
                    "title" => "Service Default",
                    "name" => "service.detail"
                ]
            ]
        ],
        [
            "title" => "Product Category Page",
            "name" => "frontend.cms.product",
            "template" => [
                [
                    "title" => "Product Category Default",
                    "name" => "product.default"
                ]
            ]
        ],
        [
            "title" => "Detail Product Page",
            "name" => "frontend.cms.product.detail",
            "template" => [
                [
                    "title" => "Product Default",
                    "name" => "product.detail"
                ]
            ]
        ],
        [
            "title" => "Contact Page",
            "name" => "frontend.contact",
            "template" => [
                [
                    "title" => "Contact Page Default",
                    "name" => "contact.default"
                ]
            ]
        ],
        [
            "title" => "Tags Page",
            "name" => "frontend.cms.tags",
            "template" => [
                [
                    "title" => "Default",
                    "name" => "tags.default"
                ]
            ]
        ],
        [
            "title" => "Search Page",
            "name" => "frontend.search",
            "template" => [
                [
                    "title" => "Default",
                    "name" => "search.default"
                ]
            ]
        ],
        [
            "title" => "Cart Page",
            "name" => "frontend.order.cart",
            "template" => [
                [
                    "title" => "Default",
                    "name" => "cart.default"
                ]
            ]
        ]
        // [
        //     "title" => "Resource Category Page",
        //     "name" => "frontend.cms.resource",
        //     "template" => [
        //         [
        //             "title" => "Resource Category Default",
        //             "name" => "resource.default"
        //         ]
        //     ]
        // ],
        // [
        //     "title" => "Detail Resource Page",
        //     "name" => "frontend.cms.resource.detail",
        //     "template" => [
        //         [
        //             "title" => "Detail Resource Default",
        //             "name" => "resource.detail"
        //         ]
        //     ]
        // ]
        // [
        //     "title" => "Custom Page",
        //     "name" => "frontend.page",
        //     "template" => [
        //         [
        //             "title" => "Custom Ads Page",
        //             "name" => "page.ads"
        //         ],
        //         [
        //             "title" => "Custom Marketing Page",
        //             "name" => "page.mkt"
        //         ],
        //         [
        //             "title" => "Custom Website Page",
        //             "name" => "page.website"
        //         ],
        //         [
        //             "title" => "Custom Content Page",
        //             "name" => "page.content"
        //         ],
        //         [
        //             "title" => "Custom SEO Page",
        //             "name" => "page.seo"
        //         ],
        //         [
        //             "title" => "Custom Media Page",
        //             "name" => "page.media"
        //         ],
        //         [
        //             "title" => "Custom About Page",
        //             "name" => "page.about"
        //         ]
        //     ]
        // ]
    ];
}
