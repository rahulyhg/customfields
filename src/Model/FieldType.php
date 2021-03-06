<?php

/**
 * Part of the Antares package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Customfields
 * @version    0.9.0
 * @author     Antares Team
 * @license    BSD License (3-clause)
 * @copyright  (c) 2017, Antares
 * @link       http://antaresproject.io
 */



namespace Antares\Customfields\Model;

use Antares\Model\Eloquent;

class FieldType extends Eloquent
{

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_fields_types';

    /**
     * The class name to be used in polymorphic relations.
     *
     * @var string
     */
    protected $morphClass = 'FieldType';

    /**
     * get default category
     * @return self
     */
    public static function getDefault()
    {
        return static::query()->where('type', '=', 'text')->where('name', '=', 'input')->get()->first();
    }

    /**
     * Belongs to relationship with Validator.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function validators()
    {
        return $this->hasMany('Antares\Customfields\Model\FieldTypeValidator', 'type_id');
    }

    /**
     * Gets url pattern for logs
     * 
     * @return String
     */
    public static function getPatternUrl()
    {
        return handles('antares::customfields/index');
    }

}
