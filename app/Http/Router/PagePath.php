<?php

namespace App\Http\Router;

use App\Entity\Page;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Support\Facades\Cache;

class PagePath implements UrlRoutable
{
    /**
     * @var Page
     */
    public $page;

    public function withPage(Page $page): self
    {
        $clone = clone $this;
        $clone->page = $page;
        return $clone;
    }

    public function getRouteKey()
    {
        if (!$this->page) {
            throw new \BadMethodCallException('Empty page.');
        }

        return Cache::tags(Page::class)->rememberForever('page_path_' . $this->page->id, function () {
            return $this->page->getPath();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'page_path';
    }

    public function resolveRouteBinding($value)
    {
        $chunks = explode('/', $value);

        /** @var Page|null $page */
        $page = null;
        do {
            $slug = reset($chunks);
            if ($slug && $next = Page::where('slug', $slug)->where('parent_id', $page ? $page->id : null)->first()) {
                $page = $next;
                array_shift($chunks);
            }
        } while (!empty($slug) && !empty($next));

        if (!empty($chunks)) {
            abort(404);
        }

        return $this
            ->withPage($page);
    }
}
