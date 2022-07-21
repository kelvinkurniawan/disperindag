<?php

use app\Core\BaseController;
use app\Service\DBService;
use app\Service\TestService;

/**
 * To use RestController extends to BaseRestController
 * To use CI_Controller extends to BaseController
 */
class Page extends BaseController
{

    /**
     * Create service variable
     *
     * @var [type]
     */
    protected $service;
    public $db;

    public function __construct()
    {
        parent::__construct();

        /**
         * Initialize service
         */
        $container = new Container();
    }

    /**
     * Call the middleware function
     *
     * @return array
     */
    public function middleware()
    {
        return array();
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function exhibitor(){
        $this->load->view('exhibitors');
    }

    public function content($id){
        $data['content'] = (Object)json_decode(file_get_contents('https://disperindag-api.kelvinkurniawan.works/api?id='.$id), true);
        $this->load->view('content', $data);
    }

    public function contact(){
        $this->load->view('contact');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("/");
    }

}
