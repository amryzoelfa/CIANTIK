<?php
class Template
{
    protected $_ci;
    function __construct()
    {
        $this->_ci = &get_instance();
    }

    function tampil($template = NULL, $data = NULL)
    {
        if ($template != NULL) {
            // Bagian $data['head'] untuk memanggil file head.php dari folder _Template/
            // ['head'] data yang kita panggil dari file template.php dari folder _Template/
            $data['head'] = $this->_ci->load->view('_Template/head', $data, TRUE);

            // Bagian $data['topbar'] untuk memanggil file topbar.php dari folder _Template/
            // ['topbar'] data yang kita panggil dari file template.php dari folder _Template/
            $data['topbar'] = $this->_ci->load->view('_Template/topbar', $data, TRUE);

            // Bagian $data['sidebar'] untuk memanggil file sidebar.php dari folder_Template/
            // ['sidebae'] data yang kita panggil dari file template.php dari folder _Template/
            $data['sidebar'] = $this->_ci->load->view('_Template/sidebar', $data, TRUE);

            // ['isi'] data yang kita panggil dari file content.php dari folder _Template/
            $data['isi'] = $this->_ci->load->view($template, $data, TRUE);

            // Bagian $data['content'] untuk memanggil file content.php dari folder _Template/
            // ['content'] data yang kita panggil dari file template.php dari folder _Template/
            $data['content'] = $this->_ci->load->view('_Template/content', $data, TRUE);

            // Bagian $data['footer'] untuk memanggil file footer.php dari folder _Template/
            // ['footer'] data yang kita panggil dari file template.php dari folder _Template/
            $data['footer'] = $this->_ci->load->view('_Template/footer', $data, TRUE);

            // Bagian $data['js'] untuk memanggil file js.php dari folder _Template/
            // ['js'] data yang kita panggil dari file template.php dari folder _Template/
            $data['js'] = $this->_ci->load->view('_Template/js', $data, TRUE);

            // Bagian $data['template'] untuk menampilkan file template.php dari folder _Template/
            // view('_Template/Template', $data, TRUE); untuk memanggil $data diatas seperti $data['head'], dll
            echo $data['Template'] = $this->_ci->load->view('_Template/template', $data, TRUE);
        }
    }
}
