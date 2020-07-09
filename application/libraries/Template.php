<?php

/**
 * Author     : Alfikri, M.Kom
 * Created By : Alfikri, M.Kom
 * E-Mail     : alfikri.name@gmail.com
 * No HP      : 081277337405
 * Class      : Template.php
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Template
{
    var $data = [];

    function set($name, $value)
    {
        $this->data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = [], $return = FALSE)
    {
        $this->CI = &get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->data, $return);
    }
}
