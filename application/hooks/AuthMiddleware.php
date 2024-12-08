<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthMiddleware {

    public function check_role($allowed_roles) {
        $CI =& get_instance();
        
        $user_role = $CI->session->userdata('role');
        
        if (!in_array($user_role, $allowed_roles)) {
            show_error('Anda tidak memiliki akses ke halaman ini.', 403);
        }
    }
}
