<?php
    class ExecController {
        private $execsTable;
        private $eventsTable;
        
        public function __construct(DatabaseTable $execsTable, DatabaseTable $eventsTable) {
            $this->execsTable = $execsTable;
            $this->eventsTable = $eventsTable;
        }
        
        public function list() {
            $execs = $this->execsTable->findAll();
            
            $title = 'Exec List';
            
            $totalExec = $this->execsTable->total();
                           
            return ['template' => 'exec.html.php',
                    'title' => $title,
                    'variables' => [
                            'totalExec' => $totalExec,
                            'execs' => $execs
                ]
            ];
        }
        
        public function home() {
            $title = 'McGill CSSA EXEC Management System';
            
            return ['template' => 'home.html.php', 'title' => $title];
        }
        
        public function delete() {
            $this->execsTable->delete($_POST['id']);
            
            header('location: /exec/list');
            
        }
        
        public function edit() {
            if (isset($_POST['exec'])) {
            $exec = $_POST['exec'];
            $exec['activedate_CSSA_EXEC'] = new DateTime();
    
            $this->execsTable->save($exec);
                 
            header('location: /exec/list');
                
        }   else {
                
            if (isset($_GET['id'])) {
                //$exec = getExec($pdo, $_GET['id']);
                $exec = $this->execsTable->findById($_GET['id']);
            }
                
            $title = 'Edit Exec';
            
            return ['template' => 'editexec.html.php',
                    'title' => $title,
                    'variables' => [
                    'exec' => $exec ?? null
                        ]
                ];
            }
            
        }
                
    }
