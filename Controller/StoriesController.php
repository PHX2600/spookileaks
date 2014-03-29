<?php

    class StoriesController extends AppController {

        public function beforeFilter() {

            // Call parent beforeFilter
            parent::beforeFilter();

        }


        public function stories() {

            // Set the page title
            $this->set('page_title', 'My Ghost Stories');

        }

        public function upload() {

            // ...

        }

    }
