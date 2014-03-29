<?php

    class UsersController extends AppController {

        public function beforeFilter() {

            // Call parent beforeFilter
            parent::beforeFilter();

        }


        public function login() {

            // Set the page title
            $this->set('page_title', 'My Ghost Stories');

        }

        public function register() {

            // Set the page title
            $this->set('page_title', 'Register');

        }

    }
