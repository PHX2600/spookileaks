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
                    $this->Session->setFlash('ZOINKS! Username or password is incorrect.');

                }

            }

            // Set the page title
            $this->set('page_title', 'Login');

        }


        public function logout() {

            // Set flash message
            $this->Session->setFlash('You have been logged out');

            // Log user out
            return $this->redirect($this->Auth->logout());

        }


        public function register() {

            // Set the page title
            $this->set('page_title', 'Register');

            if ($this->request->is('post')) {

                if ($this->request->data['User']['password'] !== $this->request->data['User']['password_confirm']) {

                    // Set flash message
                    $this->Session->setFlash('Passwords do not match');

                    // Redirect to index
                    return $this->redirect('/register');

                }

                $this->User->create();

                // Set user role to 'user'
                $this->User->set('role', 'user');

                if($this->User->save($this->request->data)) {

                    // Set the new User ID
                    $id = $this->User->id;

                    // Get user data
                    $this->request->data['User'] = array_merge(
                        $this->request->data['User'],
                        array('id' => $id)
                    );

                    // Log the new user in
                    $this->Auth->login($this->request->data['User']);

                    // Set flash message
                    $this->Session->setFlash('Your user has been created and you are now logged in');

                    // Redirect to index
                    return $this->redirect('/');

                }

            }

        }

    }
