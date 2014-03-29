<?php

    class UserController extends AppController {

        public function beforeFilter() {

            // Call parent beforeFilter
            parent::beforeFilter();

        }


        public function login() {

            // Set the page title
            $this->set('page_title', 'Log In');

        }

        public function register() {

            // Set the page title
            $this->set('page_title', 'Register');

        }

    }
