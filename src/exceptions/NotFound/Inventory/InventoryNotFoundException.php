<?php namespace Stevebauman\Maintenance\Exceptions;

use Illuminate\Support\Facades\App;
use Stevebauman\Maintenance\Exceptions\AbstractException;

class InventoryNotFoundException extends AbstractException {
    
    public function __construct(){
        $this->message = trans('maintenance::errors.not-found', array('resource'=>'Inventory Item'));
        $this->messageType = 'danger';
        $this->redirect = route('maintenance.inventory.index');
    }
    
}

App::error(function(InventoryNotFoundException $e, $code, $fromConsole){
    return $e->response();
});