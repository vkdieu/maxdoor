<?php

namespace App;

use Illuminate\Support\Str;

class Helpers
{
  public static function generateRoute($route, $title, $id, $is_type = null)
  {
    $alias = Str::slug($title) . '-' . $id . '.html';
    if ($is_type) {
      $route = route(Consts::ROUTE_POST[$route], ['alias' => $alias]);
    } else {
      $route = route(Consts::ROUTE_TAXONOMY[$route], ['alias' => $alias]);
    }
    return $route;
  }

  public static function getIdFromAlias($slug)
  {
    $id = null;

    if (Str::contains($slug, '.html')) {
      $slug = Str::afterLast(Str::before($slug, '.html'), '-');

      $id = Str::afterLast($slug, '-');
    }

    return $id;
  }
}
