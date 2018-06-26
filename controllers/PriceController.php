<?php
/**
 * Insly Price Controllers
 *
 * @author Sneha J
 */
namespace Insti\Controllers;


class PriceController extends Controller
{
    
      /**
     * settingurl
     *
     * @var string
     */
    private $settingurl = 'pricesettings.json';
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
        $data = [];
        $data['displayTable'] = 'display:none';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ) 
        {
            $data = $_POST;
            $calcHelper = new \Insti\Helpers\Calculation($data);
            $data += $calcHelper->processValues();
            $data['displayTable'] = 'display:block';
            
        }
        $settingsJson = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$this->settingurl);
        $data += json_decode($settingsJson, true);
        
        $this->view->display('price/index.php',array('data'=>$data));
    }
    
    
}