<?php

class MY_Loader extends CI_Loader {

    public function template($template_name, $vars = array(), $return = TRUE) {
        $content = $this->view('frontend/header_view', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('frontend/footer_view', $vars, $return);

        echo $content;
    }

    public function admintemplate($template_name, $vars = array(), $return = TRUE) {
        $content = $this->view('backend/header_view', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('backend/footer_view', $vars, $return);

        echo $content;
    }

}
