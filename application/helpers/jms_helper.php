<?php 

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('_user_menu', ['url' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('_user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function is_administor()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email') && !$ci->session->userdata('role_id')) {
        redirect('auth');
    } else {
        $email = $ci->session->userdata('email');
        $role_id = $ci->session->userdata('role_id');
        if ($role_id != 1  && !$email ) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
    {
        $ci = get_instance();

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu_id);
        $result = $ci->db->get('_user_access_menu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }

    }

function check_access_create($role_id, $menu_id)
    {
        $ci = get_instance();

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu_id);
        $ci->db->where('can_create', 1);
        $result = $ci->db->get('_user_access_menu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }

    }

function check_access_edit($role_id, $menu_id)
    {
        $ci = get_instance();

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu_id);
        $ci->db->where('can_edit', 1);
        $result = $ci->db->get('_user_access_menu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }

    }

function check_access_delete($role_id, $menu_id)
    {
        $ci = get_instance();

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu_id);
        $ci->db->where('can_delete', 1);
        $result = $ci->db->get('_user_access_menu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }

    }


function check_access_role($role_id, $menu_id)
    {
        $ci = get_instance();

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu_id);
        $result = $ci->db->get('_user_access_menu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }

    }

function can_create()
    {
        $ci         = get_instance();
        $role_id    = $ci->session->userdata('role_id');
        $menu       = $ci->db->get_where('_user_menu', array('url' => $ci->uri->segment(1)))->row_array();
        $can_create = 0; //0=Tidak Bisa 1=Bisa

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu['id']);
        $ci->db->where('can_create', $can_create);
        $result = $ci->db->get('_user_access_menu');

        if ($result->num_rows() < 1) {
            return "1";
        }

    }

function can_edit()
    {
        $ci         = get_instance();
        $role_id    = $ci->session->userdata('role_id');
        $menu       = $ci->db->get_where('_user_menu', array('url' => $ci->uri->segment(1)))->row_array();
        $can_edit = 0; //0=Tidak Bisa 1=Bisa

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu['id']);
        $ci->db->where('can_edit', $can_edit);
        $result = $ci->db->get('_user_access_menu');

        if ($result->num_rows() > 0) {
            return "hidden='hidden'";
        }

    }

function can_delete()
    {
        $ci         = get_instance();
        $role_id    = $ci->session->userdata('role_id');
        $menu       = $ci->db->get_where('_user_menu', array('url' => $ci->uri->segment(1)))->row_array();
        $can_delete = 0; //0=Tidak Bisa 1=Bisa

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu['id']);
        $ci->db->where('can_delete', $can_delete);
        $result = $ci->db->get('_user_access_menu');

        if ($result->num_rows() > 0) {
            return "hidden='hidden'";
        }

    }

function show_th_action()
    {
        if (!can_edit()) {
        echo '<th class="text-center" width="8%">Action</th>';
        } else if (!can_delete()) {
          echo '<th class="text-center" width="8%">Action</th>';
        } else if (!can_delete() AND !can_edit()) {
        echo '<th class="text-center" width="8%">Action</th>';
        }

    }
