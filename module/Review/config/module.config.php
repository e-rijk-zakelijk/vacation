<?php

	return array
	(
		'controllers' => array
		(
			'invokables' => array
			(
				'index' 	=> 'Review\Controller\IndexController' 
			) 
		),
		'router' => array
		(
			'routes' => array
			(
				'review' => array
				(
					'type' 		=> 'segment',
					'options' 	=> array
					(
						'route' 		=> '/[:lang]/review[/:action][/:id]',
						'constraints' 	=> array
						(
							'lang'			=> '[a-zZ-Z]*',
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
		),
		'view_manager' => array
		(
			'template_path_stack' => array
			(
				'review' => __DIR__ . '/../view',
			),
		),
	);