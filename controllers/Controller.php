<?php
/**
 * Insly Controllers
 *
 * @author Sneha
 */
namespace Insti\Controllers;

use Insti\Components\View;

class Controller
{
    
     /**
     * Constructor 
     *
     * @return void
     */
    public function __construct()
    {
        $this->view = new View();
    }

    
    
}