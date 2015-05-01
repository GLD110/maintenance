<?php

namespace Stevebauman\Maintenance\Models;

use Baum\Node;

/**
 * Class Category
 *
 * @package Stevebauman\Maintenance\Models
 */
class Category extends Node
{
    protected $table = 'categories';

    protected $scoped = ['belongs_to'];

    protected $fillable = [
        'name',
        'belongs_to',
    ];

    protected $revisionFormattedFieldNames = [
        'name' => 'Name',
    ];

    /**
     * Returns a single lined string with arrows indicating depth of the current category
     *
     * @return string
     */
    public function getTrailAttribute()
    {
        return renderNode($this);
    }

    /**
     * Compatibility with Revisionable
     *
     * @return string
     */
    public function identifiableName()
    {
        return $this->getTrailAttribute();
    }
}
