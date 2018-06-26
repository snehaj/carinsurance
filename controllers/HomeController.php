<?php
/**
 * Insly Name Controllers
 *
 * @author Sneha J
 */
namespace Insti\Controllers;



class HomeController extends Controller
{
    
     /**
     * settingurl
     *
     * @var string
     */
    
     private $dblink = 'sql/employee.sql';
    /**
     * Construtor
     *
     * @return void
     */
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Controller index
     *
     * @return void
     */
    public function indexAction()
    {
        $this->view->display('home/index.php');
    }
    
    /**
     * action db task
     *
     * @return void
     */
    public function dbAction()
    {
        $this->view->display('home/query.php',array('dblink'=>'../'.$this->dblink));
    }
    
    
    
}