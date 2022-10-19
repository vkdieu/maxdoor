<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Http\Services\ContentService;
use App\Models\CmsTaxonomy;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function filter(Request $request)
    {
        $params = $request->all();

        $params['status'] = Consts::POST_STATUS['active'];
        $params['is_type'] = Consts::POST_TYPE['post'];

        $posts = ContentService::getCmsPost($params)->paginate(Consts::POST_PAGINATE_LIMIT);
        $this->responseData['posts'] = $posts;
        $this->responseData['params'] = $params;

        $paramPost['order_by'] = 'id';
        $paramPost['status'] = Consts::POST_STATUS['active'];
        $paramPost['is_type'] = Consts::POST_TYPE['post'];
        $this->responseData['latestPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

        $paramPost['order_by'] = 'count_visited';
        $this->responseData['viewPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

        $this->responseData['featuredTags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
            ->where('taxonomy', Consts::TAXONOMY['tags'])
            ->where('is_featured', 1)
            ->get();

        return $this->responseView('frontend.pages.search.index');
    }
}
