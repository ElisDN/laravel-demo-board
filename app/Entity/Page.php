<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property int $id
 * @property string $title
 * @property string $menu_title
 * @property string $slug
 * @property string $content
 * @property string $description
 * @property int|null $parent_id
 *
 * @property int $depth
 * @property Page $parent
 * @property Page[] $children
 */
class Page extends Model
{
    use NodeTrait;

    protected $table = 'pages';

    protected $guarded = [];

    public function getPath(): string
    {
        return implode('/', array_merge($this->ancestors()->defaultOrder()->pluck('slug')->toArray(), [$this->slug]));
    }

    public function getMenuTitle(): string
    {
        return $this->menu_title ?: $this->title;
    }
}
