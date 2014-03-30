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

                    die('ZOINKS! Username or password is incorrect');

                }
            }

            // Set the page title
            $this->set('page_title', 'Login');

        }

        public function logout() {

            // ..

        }

        public function register() {

            // Set the page title
            $this->set('page_title', 'Register');

        }

    }
