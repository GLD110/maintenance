<?php

namespace Stevebauman\Maintenance\Validators;

use Stevebauman\Maintenance\Validators\AbstractValidator;

class MeterReadingValidator extends AbstractValidator {
    
    protected $rules = array(
        'reading' => 'required|positive',
        'comment' => 'max:250'
    );
    
}