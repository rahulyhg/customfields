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

use Antares\Logger\Traits\LogRecorder;
use Antares\Model\Eloquent;

class FieldFieldsets extends Eloquent
{

    use LogRecorder;

// Disables the log record in this model.
    protected $auditEnabled   = true;
// Disables the log record after 500 records.
    protected $historyLimit   = 500;
// Fields you do NOT want to register.
    protected $dontKeepLogOf  = ['created_at', 'updated_at', 'deleted_at'];
// Tell what actions you want to audit.
    protected $auditableTypes = ['created', 'saved', 'deleted'];
    public $timestamps        = false;

    /**
     * Fillable array
     * 
     * @var array
     */
    public $fillable = ['fieldset_id', 'field_id'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_field_fieldsets';

    /**
     * The class name to be used in polymorphic relations.
     *
     * @var string
     */
    protected $morphClass = 'FieldFieldsets';

    /**
     * Relation to fieldsets
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldset()
    {
        return $this->hasOne(Fieldsets::class, 'id', 'fieldset_id');
    }

    /**
     * Relation to field table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function field()
    {
        return $this->hasOne(Field::class, 'id', 'field_id');
    }

}
