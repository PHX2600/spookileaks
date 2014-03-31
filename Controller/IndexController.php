<?php

    class IndexController extends AppController {

        public function beforeFilter() {

            // Call parent beforeFilter
            parent::beforeFilter();

            // Set public views
            $this->Auth->allow('index', 'about');

        }


        public function index() {

            // Set the page title
            $this->set('page_title', 'Hello (ghost) world!');

        }


        public function about() {

            // Set the page title
            $this->set('page_title', 'About the Mystery Team');

        }

    }
