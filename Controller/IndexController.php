<?php

    class IndexController extends AppController {

        public function beforeFilter() {

            // Call parent beforeFilter
            parent::beforeFilter();

        }


        public function index() {

            // Set the page title
            $this->set('page_title', 'Hello (ghost) world!');

        }

    }
