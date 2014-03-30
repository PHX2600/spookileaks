<?php

    App::uses('AbstractPasswordHasher', 'Controller/Component/Auth');

    class CustomPasswordHasher extends AbstractPasswordHasher {

        public function hash($password) {

            // Hash the password
            return md5($password); // md5 4 life

        }

        public function check($password, $hashedPassword) {

            // Compare hashes
            return $this->hash($password) === $hashedPassword;

        }

    }
