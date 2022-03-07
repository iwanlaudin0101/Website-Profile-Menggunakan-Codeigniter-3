<?php
function check_is_login()
{
    $ci = &get_instance();
    $is_login = $ci->session->userdata('is_login');
    if (!$is_login) {
        redirect(base_url('login'));
        return;
    }
}

function check_user_access()
{
    $ci = &get_instance();
    $role = $ci->session->userdata('role');
    if ($role !== 'admin') {
        redirect(base_url('dashboard'));
        return;
    }
}

function hashEncryptVerify($input, $hash)
{
    if (password_verify($input, $hash)) {
        return true;
    } else {
        return false;
    }
}
