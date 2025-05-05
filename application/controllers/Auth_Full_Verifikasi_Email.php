<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_Perusahaan');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

            

        if ($this->form_validation->run() == false) {
            $this->data['title']        = 'Login Account';
            // $this->data['perusahaan']   = $this->M_Perusahaan->get_perusahaan();
            // $this->template->load('layout_frontend/master','frontend/auth/login', $this->data);
            $this->template->load('templates/member','member/Login', $this->data);
        } else {
        // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $customer     = $this->db->get_where('customer', ['email' => $email])->row_array();

        // jika customernya ada
        if ($customer) {
            // jika customernya aktif
            if ($customer['is_active'] == 1) {
                // cek password
                if (password_verify($password, $customer['password'])) {
                    $data = [
                        'email' => $customer['email'],'id_customer' => $customer['id_customer'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('');
                    // redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
                redirect('dashboard');
            }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[customer.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
                    $this->data['title']             = 'Register Costumer';
                    $this->template->load('templates/member','member/Register', $this->data);
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'id_customer'   => uniqid(),
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($email),
                'image'         => '',
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active'     => 0,
                'date_created'  => time()
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $customer_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('customer', $data);
            $this->db->insert('customer_token', $customer_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('auth-register');
        }
    }


    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'contoh@gmail.com',
            'smtp_pass' => 'PasswordGmailnya',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('contoh@gmail.com', 'Nama Perusahaan');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth-change-password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $customer = $this->db->get_where('customer', ['email' => $email])->row_array();

        if ($customer) {
            $customer_token = $this->db->get_where('customer_token', ['token' => $token])->row_array();

            if ($customer_token) {
                if (time() - $customer_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('customer');

                    $this->db->delete('customer_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth-register');
                } else {
                    $this->db->delete('customer', ['email' => $email]);
                    $this->db->delete('customer_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth-register');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth-register');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth-register');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_customer');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('member/blocked');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->data['title'] = 'Forgot Password';
            // $this->data['perusahaan']   = $this->M_Perusahaan->get_perusahaan();
            // $this->template->load('layout_frontend/master','frontend/auth/forgot-password', $this->data);
            $this->template->load('templates/member','member/ForgotPassword', $this->data);
        } else {
            $email = $this->input->post('email');
            $customer = $this->db->get_where('customer', ['email' => $email, 'is_active' => 1])->row_array();

            if ($customer) {
                $token = base64_encode(random_bytes(32));
                $customer_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('customer_token', $customer_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth-forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth-forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $customer = $this->db->get_where('customer', ['email' => $email])->row_array();

        if ($customer) {
            $customer_token = $this->db->get_where('customer_token', ['token' => $token])->row_array();

            if ($customer_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->data['title']              = 'Change Password';
            // $this->data['perusahaan']   = $this->M_Perusahaan->get_perusahaan();
            $this->template->load('templates/member','member/ChangePassword', $this->data);
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('customer');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('customer_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */