<?php

    class UsersController extends AppController {

        public function beforeFilter() {

            // Call parent beforeFilter
            parent::beforeFilter();

            // Set public views
            $this->Auth->allow('login', 'register');

        }


        public function login() {

            if ($this->request->is('post')) {

                if ($this->Auth->login()) {

                    return $this->redirect($this->Auth->redirectUrl());

                } else {

                    // Set flash message
                    $this->Session->setFlash('ZOINKS! Username or password is incorrect.', 'flash');

                }

            }

            // Set the page title
            $this->set('page_title', 'Login');

        }


        public function logout() {

            // Log user out
            return $this->redirect($this->Auth->logout());

        }


        public function register() {

            // Set the page title
            $this->set('page_title', 'Register');

            if ($this->request->is('post')) {

                $this->User->create();

                // Set user role to 'user'
                $this->User->set('role', 'user');

                if($this->User->save($this->request->data)) {

                    // Set flash message
                    $this->Session->setFlash('The user has been saved');

                    // Redirect to index
                    return $this->redirect('/');

                }

            }

        }

    }
