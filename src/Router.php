<?php

namespace App;

use AltoRouter;

class Router 
{

    private $viewPath;
    private $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new AltoRouter();
    }
    
    /**
     * get : trouve une correspondance dans le routeur suivant les paramétres envoyés et redirige vers la page
     *
     * @param  string $url
     * @param  string $view
     * @param  string $name
     * @return self
     */
    public function get(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    /**
     * post : trouve une correspondance dans le routeur suivant les paramétres envoyés et redirige vers la page
     *
     * @param  string $url
     * @param  string $view
     * @param  string $name
     * @return self
     */
    public function post(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST', $url, $view, $name);
        return $this;
    }
    
    /**
     * match : trouve une correspondance dans le routeur suivant les paramétres envoyés, fonctionne en GET et en POST et redirige vers la page
     *
     * @param  string $url
     * @param  string $view
     * @param  string $name
     * @return self
     */
    public function match(string $url, string $view, ?string $name): self
    {
        $this->router->map('POST|GET', $url, $view, $name);
        return $this;
    }
    
    /**
     * url : génére une URL
     *
     * @param  string $name
     * @param  array $params
     * @return void
     */
    public function url(string $name, array $params = [])
    {
        return $this->router->generate($name, $params);
    }

    public function run()
    {
        $match = $this->router->match();
        $view = $match['target'];
        $params = $match['params'];
        $router = $this;
        $layout = 'layout/default';
        ob_start();
        require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
        $content = ob_get_clean();
        require $this->viewPath . DIRECTORY_SEPARATOR .$layout . '.php';
        return $this;
    }
}