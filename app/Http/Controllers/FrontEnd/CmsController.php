<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Helpers;
use App\Http\Services\ContentService;
use App\Models\CmsTaxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CmsController extends Controller
{

    public function postCategory($alias = null, Request $request)
    {
        $id = Helpers::getIdFromAlias($alias)  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['post'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy_id'] = $id;
                }
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['post'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

                // $paramPost['taxonomy_id'] = null;
                // $paramPost['order_by'] = 'id';
                // $this->responseData['latestPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

                // $paramPost['order_by'] = 'count_visited';
                // $this->responseData['viewPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

                // $this->responseData['featuredTags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                //     ->where('taxonomy', Consts::TAXONOMY['tags'])
                //     ->where('is_featured', 1)
                //     ->get();

                return $this->responseView('frontend.pages.post.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['post'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

            // $paramPost['order_by'] = 'id';
            // $this->responseData['latestPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

            // $paramPost['order_by'] = 'count_visited';
            // $this->responseData['viewPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

            // $this->responseData['featuredTags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
            //     ->where('taxonomy', Consts::TAXONOMY['tags'])
            //     ->where('is_featured', 1)
            //     ->get();
        }

        return $this->responseView('frontend.pages.post.default');
    }

    public function detail($alias = null, Request $request)
    {
        $id = Helpers::getIdFromAlias($alias)  ?? null;

        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::POST_STATUS['active'];
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();
                $this->responseData['detail'] = $detail;

                $params['is_type'] = $detail->is_type;
                // Latest posts
                $params['id'] = null;
                $params['different_id'] = $detail->id;
                $params['order_by'] = 'id';
                // $this->responseData['latestPosts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();
                // Tags of this post
                // if (isset($detail->json_params->tags)) {
                //     $this->responseData['tags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                //         ->where('taxonomy', Consts::TAXONOMY['tags'])
                //         ->whereIn('tb_cms_taxonomys.id', $detail->json_params->tags ?? [])
                //         ->get();
                // }
                // Mostview posts
                $params['order_by'] = 'count_visited';
                // $this->responseData['viewPosts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();
                // Related post
                if (isset($detail->json_params->related_post)) {
                    $params['order_by'] = 'id';
                    $params['related_post'] = $detail->json_params->related_post ?? null;
                    $this->responseData['relatedPosts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_RELATED_LIMIT)->get();
                }
                // Featured tags
                // $this->responseData['featuredTags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                //     ->where('taxonomy', Consts::TAXONOMY['tags'])
                //     ->where('is_featured', 1)
                //     ->get();
                // Return to view with type post
                if (View::exists('frontend.pages.' . $detail->is_type . '.detail')) {
                    return $this->responseView('frontend.pages.' . $detail->is_type . '.detail');
                } else {
                    return redirect()->back()->with('errorMessage', 'View: frontend.pages.' . $detail->is_type . '.detail do not exists!');
                }
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function serviceCategory($alias = null, Request $request)
    {
        $id = Helpers::getIdFromAlias($alias)  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['service'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                $paramPost['taxonomy_id'] = $id;
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['service'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::SERVICES_PAGINATE_LIMIT);
                return $this->responseView('frontend.pages.service.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['service'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::SERVICES_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.service.default');
    }

    public function service($alias = null, $alias_detail = null, Request $request)
    {
        $id = $request->get('id')  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::POST_STATUS['active'];
            $params['is_type'] = Consts::POST_TYPE['service'];
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();
                $this->responseData['detail'] = $detail;
                $params['id'] = null;
                $params['different_id'] = $detail->id;
                $this->responseData['posts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_OTHER_LIMIT)->get();

                return $this->responseView('frontend.pages.service.detail');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function productCategory($alias = null, Request $request)
    {
        $id = Helpers::getIdFromAlias($alias)  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['product'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                $paramPost['taxonomy_id'] = $id;
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['product'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::PRODUCT_PAGINATE_LIMIT);
                return $this->responseView('frontend.pages.product.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['product'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::PRODUCT_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.product.default');
    }

    public function product($alias = null, $alias_detail = null, Request $request)
    {
        $id = $request->get('id')  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::POST_STATUS['active'];
            $params['is_type'] = Consts::POST_TYPE['product'];
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();
                $this->responseData['detail'] = $detail;
                $params['id'] = null;
                $params['different_id'] = $detail->id;
                $this->responseData['posts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_OTHER_LIMIT)->get();

                return $this->responseView('frontend.pages.product.detail');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function resourceCategory($alias = null, Request $request)
    {
        $id = Helpers::getIdFromAlias($alias)  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['resource'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                $paramPost['taxonomy_id'] = $id;
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['resource'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::RESOURCE_PAGINATE_LIMIT);
                return $this->responseView('frontend.pages.resource.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['resource'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::RESOURCE_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.resource.default');
    }

    public function resource($alias = null, $alias_detail = null, Request $request)
    {
        $id = Helpers::getIdFromAlias($alias)  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::POST_STATUS['active'];
            $params['is_type'] = Consts::POST_TYPE['resource'];
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();

                $this->responseData['detail'] = $detail;

                $params['id'] = null;
                $params['different_id'] = $detail->id;
                $params['order_by'] = 'id';
                $params['taxonomy_id'] = $detail->taxonomy_id;
                $this->responseData['posts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_OTHER_LIMIT)->get();

                return $this->responseView('frontend.pages.resource.detail');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function tags($alias = null, Request $request)
    {
        $id = Helpers::getIdFromAlias($alias)  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['tags'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;

                $paramPost['tags'] = $id;
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['post'];

                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);

                $paramPost['tags'] = null;
                $paramPost['order_by'] = 'id';
                $this->responseData['latestPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

                $paramPost['order_by'] = 'count_visited';
                $this->responseData['viewPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

                $this->responseData['featuredTags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                    ->where('taxonomy', Consts::TAXONOMY['tags'])
                    ->where('is_featured', 1)
                    ->get();
                    
                return $this->responseView('frontend.pages.post.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }
}
