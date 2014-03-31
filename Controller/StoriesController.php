<?php

    class StoriesController extends AppController {

        public function beforeFilter() {

            // Call parent beforeFilter
            parent::beforeFilter();

        }


        public function stories() {

            if ($this->request->is('post')) {

                // print_r($this->request->data); die(); // Debugging

                // Get the file data
                $file = $this->request->data['Story']['file'];

                if (!$file['error']) {

                    // TODO: Check file extension

                    // Set course media directory path
                    $uploadDir = APP . 'uploads';

                    // Check if course media dir is writeable
                    if (is_writable($uploadDir)) {

                        // Set file path
                        $filePath = $uploadDir . DS . $file['name'];

                        // Move file into upload dir
                        move_uploaded_file($file['tmp_name'], $filePath);

                    } else {

                        // Throw 404 if not post request
                        throw new InternalErrorException('Cannot write to uploads directory');

                    }

                }

                // Set file path and user id
                $this->Story->set(array(
                    'user_id'   => $this->Auth->user('id'),
                    'file_path' => $filePath
                ));

                // print_r($this->Story); die(); // Debugging

                // Save the story data
                $data = $this->Story->save($this->request->data);

                if (!empty($data)) {

                    // Set flash message
                    $this->Session->setFlash('Your story has been posted');

                } else {

                    // Set flash message
                    $this->Session->setFlash('Jinkies! There was an error posting your story.');

                }

                // Redirect to index
                return $this->redirect('/stories');

            }

            // Set the page title
            $this->set('page_title', 'My Ghost Stories');

        }

        public function upload() {

            // ...

        }

    }
