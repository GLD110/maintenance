{{ Form::select(
            'routes[]', 
            $allRoutes, 
            (isset($routes) ? array_keys($routes) : NULL), 
            array('class'=>'form-control select2', 'multiple'=>true)
        ) 
}}