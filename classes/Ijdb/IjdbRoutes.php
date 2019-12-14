<?php
    namespace Ijdb;
    
    class IjdbRoutes implements \Ninja\Routes {
        
        public function getRoutes() {
            
            include __DIR__ . '/../../includes/DatabaseConnection.php';
            
            $execsTable = new \Ninja\DatabaseTable($pdo, 'CSSA_EXEC', 'id_CSSA_EXEC');
            $eventsTable = new \Ninja\DatabaseTable($pdo, 'CSSA_EVENTS', 'id_CSSA_EVENTS');
            
            $execController = new \Ijdb\Controllers\Exec($execsTable, $eventsTable);
            
            $userController = new \Ijdb\Controllers\Register($execsTable);
            
            $routes = [
                'exec/register' => [
                    'GET' => [
                        'controller' => $userController,
                        'action' => 'registrationForm'
                    ],
                    'POST' => [
                        'controller' => $userController,
                        'action' => 'registerUser'
                    ]
                ],
                'exec/success' => [
                    'GET' => [
                        'controller' => $userController,
                        'action' => 'success'
                    ]
                ],
                'exec/edit' => [
                        'POST' => [
                            'controller' => $execController,
                            'action' => 'saveEdit'
                        ],
                        'GET' => [
                            'controller' => $execController,
                            'action' => 'edit'
                        ]
                ],
                'exec/delete' => [
                    'POST' => [
                        'controller' => $execController,
                        'action' => 'delete'
                    ]
                ],
                'exec/list' => [
                    'GET' => [
                        'controller' => $execController,
                        'action' => 'list'
                    ]
                ],
                '' => [
                    'GET' => [
                        'controller' => $execController,
                        'action' => 'home'
                    ]
                ]
            ];
            
            return $routes;
        }
    }
