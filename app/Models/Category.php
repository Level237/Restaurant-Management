<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Menu;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'image',
        'description'
    ];

    /**
     * The Menus that belong to the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'category_menu');
    }

}
