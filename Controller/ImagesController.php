<?php

    class ImagesController extends AppController {

        public function beforeFilter() {

            // Call parent beforeFilter
            parent::beforeFilter();

            // Set public views
            $this->Auth->allow('images', 'image');

        }


        public function images() {

            // Set the page title
            $this->set('page_title', 'Spooky Images');

            // Find all images
            $images = $this->Image->find('all', array(
                'conditions' => array(
                    'Image.public' => true
                ),
                'order' => 'Image.modified DESC'
            ));

            // print_r($images); die(); // Debugging

            // Pass images data to view
            $this->set('images', $images);

        }


        public function image() {


            // Find all images
            $image = $this->Image->find('first', array(
                'conditions' => array(
                    'Image.id'     => $this->params['image_id'],
                    'Image.public' => true
                ),
                'order' => 'Image.modified DESC'
            ));

            // print_r($image); die(); // Debugging

            // Set the page title
            $this->set('page_title', $image['Image']['title']);

            // Pass images data to view
            $this->set('image', $image);

        }


        public function manage() {

            if ($this->request->is('post')) {

                // print_r($this->request->data); die(); // Debugging

                // Get the file data
                $file = $this->request->data['Image']['file_upload'];
                $hash = $this->request->data['Image']['file_hash'];

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
                    $this->Session->setFlash('Jinkies! There was an error posting your image.');

                    // Redirect to images management
                    return $this->redirect('/images/manage');

                }

                // Set file path and user id
                $this->Image->set(array(
                    'user_id' => $this->Auth->user('id'),
                    'file'    => $file['name']
                ));

                // print_r($this->Image); die(); // Debugging

                // Save the image data
                $data = $this->Image->save($this->request->data);

                if (!empty($data)) {

                    // Set flash message
                    $this->Session->setFlash('Your image has been posted');

                } else {

                    // Set flash message
                    $this->Session->setFlash('Jinkies! There was an error posting your image.');

                }

                // Redirect to index
                return $this->redirect('/images/manage');

            }

            // Set the page title
            $this->set('page_title', 'Your Spooky Images');

            // Find all images
            $images = $this->Image->find('all', array(
                'conditions' => array(
                    'Image.user_id' => $this->Auth->user('id')
                ),
                'order' => 'Image.modified DESC'
            ));

            // print_r($images); die(); // Debugging

            // Pass images data to view
            $this->set('images', $images);

        }


        public function delete() {

            // Don't require a view
            $this->autoRender = false;

            // Get the image ID
            $imageID = $this->request->params['image_id'];

            // Get image data
            $image = $this->Image->find('first', array(
                'conditions' => array(
                    'Image.id' => $imageID
                )
            ));

            // print_r($image); die(); // Debugging

            if ($image['User']['id'] === $this->Auth->user('id')) {

                // Delete the image
                $this->Image->delete($imageID);

                // Set flash message
                $this->Session->setFlash('Your image has been deleted.');

                // Redirect to images management
                return $this->redirect('/images/manage');

            }

            // Return 404 on failure
            throw new NotFoundException('File Not Found');

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
