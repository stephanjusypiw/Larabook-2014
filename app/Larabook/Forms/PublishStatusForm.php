<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class PublishStatusForm
 * @package Larabook\Forms
 */
class PublishStatusForm extends FormValidator
{

    /**
     * Validation rules for the publish status form
     *
     * @var array
     */
    protected $rules = [
        'body' => 'required'
    ];


}