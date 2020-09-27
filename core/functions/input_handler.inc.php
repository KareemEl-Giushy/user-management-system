<?php
    class input_handler {

        public function sanitize($data, $sanitizer) {
            $sans = ['st', 'email', 'sp'];
            if(in_array($sanitizer, $sans)){
                $sanitizer = $sanitizer == 'st' ? FILTER_SANITIZE_STRING : $sanitizer;
                $sanitizer = $sanitizer == 'email' ? FILTER_SANITIZE_EMAIL : $sanitizer;
                $sanitizer = $sanitizer == 'sp' ? FILTER_SANITIZE_SPECIAL_CHARS : $sanitizer;
                return filter_var($data, $sanitizer);
            } else {
                echo "Sanitizer Error";
            }
        }

        public function validate($data, $type = [], $re_data = '', $len = 7) {
            
            $err = [];
            if(in_array('empty', $type)) {
                if(empty($data)){
                    $err[] = 'empty false';
                }
            }

            if(in_array('email', $type)) {
                if(!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                    $err[] = 'email false';
                }
            }
            
            if(in_array('re', $type)) {
                if($data != $re_data) {
                    $err[] = 're false';
                }
            }

            if(in_array('len', $type)) {
                if(strlen($data) < $len) {
                    $err[] = 'len false';
                }
            }

            if(in_array('nos', $type)) {
                if(preg_match('/\s/', $data)){
                    $err[] = 'nos false';
                }
            }

            return $err;
        }

    }