<?php
/**
 * Insly Components
 *
 * @author Sneha J
 */
namespace Insti\Components;

class View 
{

    /**
     * function to render template
     *
     * @return string
     */
    public function render(string $template, array $result = []) 
    {
        (empty($result) ?: extract($result));
        ob_start();
        include __DIR__ . '/../views/layouts/header.php';
        include __DIR__ . '/../views/' . $template;
        include __DIR__ . '/../views/layouts/footer.php';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
    
    /**
     * function to call template render
     *
     * @return void
     */

    public function display(string $template,array $result = []) 
    {

        echo $this->render($template,$result);
    }

}
