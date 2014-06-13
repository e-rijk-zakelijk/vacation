<?php

	return array
	(
		'router' => array
		(
			'routes' => array
			(
				'home' => array
				(
					'type'    => 'segment',
					'options' => array
					(
						'route'    => '/[:action]',
						'constraints' => array
						(
							'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						),
						'defaults' => array
						(
							'controller' => 'index',
							'action'     => 'index',
						)
					)
				),
				'application' => array
				(
					'type' => 'Zend\Mvc\Router\Http\Regex',
					'options' => array (
						'regex' => '/(?<id>[a-zA-Z0-9_-]+)/(?<name>[a-zA-Z0-9_-]+)',
						'defaults' => array
						(
							'controller'	=> 'test',
							'action'		=> 'test' 
						),
						'spec' => '/%id%/%name%' 
					),
					'may_terminate' => true,
					'child_routes' => array
					(
						'default' => array
						(
							'type' => 'Segment',
							'options' => array
							(
								'route' => '/[:controller[/:action]]',
								'constraints' => array
								(
									'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
									'action' => '[a-zA-Z][a-zA-Z0-9_-]*' 
								),
								'defaults' => array(
								)
							)
						)
					)
				)
			)
		),
		'service_manager' => array
		(
			'abstract_factories' => array
			(
				'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
				'Zend\Log\LoggerAbstractServiceFactory' 
			),
			'aliases' => array
			(
				'translator' => 'MvcTranslator' 
			) 
		),
		'translator' => array
		(
			'locale' => 'en_US',
			'translation_file_patterns' => array
			(
				array
				(
					'type' => 'gettext',
					'base_dir' => __DIR__ . '/../language',
					'pattern' => '%s.mo' 
				) 
			) 
		),
		'controllers' => array
		(
			'invokables' => array
			(
				'index' => 'Application\Controller\IndexController',
				'test' => 'Application\Controller\TestController' 
			) 
		),
		'view_manager' => array
		(
			'display_not_found_reason' => true,
			'display_exceptions' => true,
			'doctype' => 'HTML5',
			'not_found_template' => 'error/404',
			'exception_template' => 'error/index',
			'template_map' => array
			(
				'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
				'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
				'error/404' => __DIR__ . '/../view/error/404.phtml',
				'error/index' => __DIR__ . '/../view/error/index.phtml' 
			),
			'template_path_stack' => array
			(
				__DIR__ . '/../view' 
			) 
		),
		'module_layouts' => array
		(
			'Application' => 'layout/layout',
			'Administration' => 'layout/admin-layout' 
		),
		'console' => array
		(
			'router' => array
			(
				'routes' => array
				(
				
				) 
			) 
		),
		'doctrine' => array
		(
			'driver' => array
			(
				'application_entities' => array
				(
					'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
					'cache' => 'array',
					'paths' => array
					( 
						__DIR__ . '/../src/Application/Entity' 
					) 
				),
				'orm_default' => array
				(
					'drivers' => array
					(
						'Application\Entity' => 'application_entities'
					)
				)
			)
		)
	);
