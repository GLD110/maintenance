<?php 

namespace Stevebauman\Maintenance\Controllers;

use Stevebauman\Maintenance\Services\UserService;
use Stevebauman\Maintenance\Controllers\AbstractController;

class UserController extends AbstractController {
    
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }
    
    public function index()
    {
        $users = $this->user->setInput($this->inputAll())->getByPageWithFilter();
        
        return $this->view('maintenance::admin.users.index', array(
            'title' => 'All Users',
            'users' => $users
        ));
    }
    
    public function create()
    {
        return $this->view('maintenance::admin.users.create', array(
            'title' => 'Create a User'
        ));
    }
    
    public function store()
    {
        
    }
    
    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
        
    }
    
    public function update($id)
    {
        
    }
    
    public function destroy($id)
    {
        
    }
    
}