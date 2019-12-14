<?php
    namespace Ijdb\Controllers;
    use \Ninja\DatabaseTable;
    
    class Register {
        private $execsTable;
        
        public function __construct(DatabaseTable $execsTable) {
            $this->execsTable = $execsTable;
        }
        
        public function registrationForm() {
            return ['template' => 'register.html.php',
            'title' => 'Register an account'];
        }
        
        public function success() {
            return ['template' => 'registersuccess.html.php',
            'title' => 'Registration Successful'];
        }
        
        public function registerUser() {
            $exec = $_POST['exec'];
            
            //Assume the data is valid to begin with
            $valid = true;
            $errors = [];
            
            //but if any of the fields have been left lank
            //set $valid to false
            if (empty($exec['firstname_CSSA_EXEC'])) {
                $valid = false;
                $errors[] = 'First name cannot be blank';
            }
            
            if (empty($exec['lastname_CSSA_EXEC'])) {
                $valid = false;
                $errors[] = 'Last name cannot be blank';
            }
            
            if (empty($exec['email_CSSA_EXEC'])) {
                $valid = false;
                $errors[] = 'Email cannot be blank';
            } elseif (filter_var($exec['email_CSSA_EXEC']) == false) {
                $valid = false;
                $errors[] = 'Invalid email address';
            } else {
                $exec['email_CSSA_EXEC'] = strtolower($exec['email_CSSA_EXEC']);
                
                if (count($this->execsTable->find('email_CSSA_EXEC', $exec['email_CSSA_EXEC']))>0) {
                    $valid = false;
                    $errors[] = 'That email address is already registered';
                }
            }
            
            if (empty($exec['password_CSSA_EXEC'])) {
                $valid = false;
                $errors[] = 'Password cannot be blank';
            }
            
            if (empty($exec['birthday_CSSA_EXEC'])) {
                $valid = false;
                $errors[] = 'Birthday cannot be blank';
            }
            
            if (empty($exec['studentid_CSSA_EXEC'])) {
                $valid = false;
                $errors[] = 'Student Id cannot be blank';
            }
            
            if (empty($exec['departmentid_CSSA_EXEC'])) {
                $valid = false;
                $errors[] = 'Department cannot be blank';
            }
            
            if (empty($exec['activeness_CSSA_EXEC'])) {
                $valid = false;
                $errors[] = 'Are you still a member of McGill CSSA Exec Team? cannot be blank';
            }
            
            if (empty($exec['jobtitle_CSSA_EXEC'])) {
                $valid = false;
                $errors[] = 'Job title cannot be blank';
            }
            
            if ($valid == true) {
                $exec['activedate_CSSA_EXEC'] = new \DateTime();
                $exec['password_CSSA_EXEC'] = password_hash($exec['password_CSSA_EXEC'], PASSWORD_DEFAULT);
                $this->execsTable->save($exec);
                
                header('Location: /exec/success');
            } else {
                return ['template' => 'register.html.php',
                        'title' => 'Register an account',
                        'variables' => [
                                        'errors' => $errors,
                                        'exec' => $exec
                                        ]
                        ];
            }
            
        }
    }
