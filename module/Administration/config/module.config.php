<?php

	return array
	(
		'controllers' => array
		(
			'invokables' => array
			(
				'index' 	=> 'Administration\Controller\IndexController',
				'feed' 		=> 'Administration\Controller\FeedController',
				'category' 	=> 'Administration\Controller\CategoryController' 
			) 
		),
		'router' => array
		(
			'routes' => array
			(
				'administration' => array
				(
					'type' 		=> 'segment',
					'options' 	=> array
					(
						'route' 		=> '/administration[/:controller][/:action]',
						'constraints' 	=> array
						(
							'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
							'action' 		=> '[a-zA-Z][a-zA-Z0-9_-]*' 
						),
						'defaults' => array
						(
							'controller' 	=> 'index',
							'action' 		=> 'index' 
						)
					)
				)
			)
		)
	);