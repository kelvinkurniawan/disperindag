<?php

use app\Core\BaseController;
use app\Service\DBService;
use app\Service\TestService;

/**
 * To use RestController extends to BaseRestController
 * To use CI_Controller extends to BaseController
 */
class Admin extends BaseController
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
        $this->load->view('welcome_message');
    }

    public function gallery($id){
        $data['id'] = $id;
        $this->load->view('gallery', $data);
    }

    public function store($id){
        $data['id'] = $id;
        $this->load->view('store', $data);
    }

    public function social($id){
        $data['id'] = $id;
        $this->load->view('social', $data);
    }

}
