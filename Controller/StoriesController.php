<?php

    class StoriesController extends AppController {

        public function beforeFilter() {

            // Call parent beforeFilter
            parent::beforeFilter();

            // Set public views
            $this->Auth->allow('stories', 'story');

        }


        public function stories() {

            // Set the page title
            $this->set('page_title', 'Ghost Stories');

            // Find all stories
            $stories = $this->Story->find('all', array(
                'conditions' => array(
                    'Story.public' => true
                ),
                'order' => 'Story.modified DESC'
            ));

            // print_r($stories); die(); // Debugging

            // Pass stories data to view
            $this->set('stories', $stories);

        }


        public function story() {


            // Find all stories
            $story = $this->Story->find('first', array(
                'conditions' => array(
                    'Story.id'     => $this->params['story_id'],
                    'Story.public' => true
                ),
                'order' => 'Story.modified DESC'
            ));

            // print_r($story); die(); // Debugging

            // Set the page title
            $this->set('page_title', $story['Story']['title']);

            // Pass stories data to view
            $this->set('story', $story);

        }


        public function manage() {

            if ($this->request->is('post')) {

                // print_r($this->request->data); die(); // Debugging

                // Get the file data
                $file = $this->request->data['Story']['file_upload'];
                $hash = $this->request->data['Story']['file_hash'];

                if (!$file['error'] && $hash === $this->hashFile($file['name'])) {

                    // Set course media directory path
                    $uploadDir = APP . WEBROOT_DIR . DS . 'uploads';

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

                } else {

                    // Set flash message
                    $this->Session->setFlash('Jinkies! There was an error posting your story.');

                    // Redirect to index
                    return $this->redirect('/stories/manage');

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
                return $this->redirect('/stories/manage');

            }

            // Set the page title
            $this->set('page_title', 'Your Ghost Stories');

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


        public function hash() {

            // Don't require a view
            $this->autoRender = false;

            if ($this->request->is('post')) {

                // print_r($this->request->data); die(); // Debugging

                // Get the file name
                $fileName = trim($this->request->data['fileName']);

                // Set array of allowed file extensions
                $allowedExtensions = array('png', 'gif', 'jpg', 'jpeg', 'bmp');

                // Get file extension from source image
                $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                // Verify file is of an acceptable type
                if (in_array($extension, $allowedExtensions)) {

                    // Super duper, top secret hashing algorithm
                    $data['file_hash'] = $this->hashFile($fileName);

                } else {

                    // Return false on failure
                    $data['file_hash'] = false;

                }

                // Return the JSON data
                return json_encode($data);

            }

            // Return 404 on failure
            throw new NotFoundException('File Not Found');

        }


        public function media() {

            // print_r($this->request->query); die(); // Debugging

            // Don't allow directory traversal
            $fileName = str_replace('../', '', $this->request->query['file']);

            // Get file path
            $file = realpath(APP . WEBROOT_DIR . DS . 'uploads' . DS . $fileName);

            // Send the file
            if (file_exists($file)) {

                if(is_readable($file)) {

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

                } else {

                    // Return 503 failure
                    throw new ForbiddenException('Permission denied for "' . $fileName . '"');

                }

            }

            // Return 404 on failure
            throw new NotFoundException('File "' . $fileName . '" Not Found');

        }


        private function hashFile($fileName) {

            // Super duper, top secret hashing algorithm
            return sha1($fileName . 'ErrrMahGerrds_Sup3rS3cr3t_P@ssw0rd');

        }

    }
