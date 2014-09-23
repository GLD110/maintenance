<?php namespace Stevebauman\Maintenance\Services;

use Stevebauman\Maintenance\Services\SentryService;
use Stevebauman\Maintenance\Services\AbstractModelService;
use Stevebauman\Maintenance\Models\WorkOrderAssignment;

class WorkOrderAssignmentService extends AbstractModelService {
	
	public function __construct(WorkOrderAssignment $assignment, SentryService $sentry){
		$this->model = $assignment;
                $this->sentry = $sentry;
	}
        
        public function create($data){
            if(array_key_exists('users', $data)){
                
                $records = array();
                
                foreach($data['users'] as $user){
                    
                    $insert = array(
                        'work_order_id' => $data['work_order_id'],
                        'by_user_id' => $this->sentry->getCurrentUserId(),
                        'to_user_id' => $user
                    );
                    
                    if($records[] = $this->model->create($insert)){
                        
                    } else{
                        return false;
                    }
                }
                
                return $records;
                
            }
            
        }
	
}