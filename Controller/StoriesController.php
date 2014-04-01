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
                $file = $this->request->data['Story']['file_upload'];

                if (!$file['error']) {

                    // Set array of allowed file extensions
                    $allowedExtensions = array('bmp', 'gif', 'jpg', 'jpeg');

                    // Get file extension from source image
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

                    // Verify file is of an acceptable type
                    if (in_array($extension, $allowedExtensions)) {

                        // Set course media directory path
                        $uploadDir = APP . 'uploads';

                        // Check if course media dir is writeable
                        if (is_writable($uploadDir)) {

                            // Set file path
                            $filePath = $uploadDir . DS . $file['name'];

                            // Move file into upload dir
                            rename($file['tmp_name'], $filePath);

                        } else {

                            // Throw 404 if not post request
                            throw new InternalErrorException('Cannot write to uploads directory');

                        }

                    } else {

                        // Set flash message
                        $this->Session->setFlash('Jinkies! There was an error posting your story.');

                        // Redirect to index
                        return $this->redirect('/stories');

                    }

                }

                // Set file path and user id
                $this->Story->set(array(
                    'user_id' => $this->Auth->user('id'),
                    'file'    => $file['name']
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

            // Find all stories
            $stories = $this->Story->find('all', array(
                'conditions' => array(
                    'Story.user_id' => $this->Auth->user('id')
                ),
                'order' => 'Story.modified DESC'
            ));

            // print_r($stories); die(); // Debugging

            // Pass stories data to view
            $this->set('stories', $stories);

        }

        public function media() {

            // print_r($this->request->query); die(); // Debugging

            // Don't allow directory traversal
            $fileName = str_replace('../', '', $this->request->query['file']);

            // Get file path
            $file = realpath(APP . 'uploads' . DS . $fileName);

            // Send the file
            if (file_exists($file)) {

                // Get file mime type
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $contentType = finfo_file($finfo, $file);

                // Set some header information
                header('Content-Description: File Transfer');
                header('Content-Type: ' . $contentType);
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                header('Content-Disposition: inline; filename="' . $file . '"');

                // Discard contents of the output buffer
                ob_clean();

                // Flush write buffers
                flush();

                // Read file to the output buffer
                readfile($file);

                // Stop execution
                exit;

            }

            // Return 404 on failure
            throw new NotFoundException('File Not Found');

        }

    }
