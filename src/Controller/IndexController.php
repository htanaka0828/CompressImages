<?php
namespace CompressImages\Controller;

use Slim\Psr7\Response as Response;
use Slim\Psr7\Request as Request;
use CompressImages\Helpers\TemplateHelper;

class IndexController
{
    /**
     * @var TemplateHelper
     */
    private $template;

    /**
     * IndexController constructor.
     * @param TemplateHelper $template
     */
    public function __construct(TemplateHelper $template = null)
    {
        $this->template = $template ?: new TemplateHelper;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param null $args
     * @return int|Response
     */
    public function run(Request $request, Response $response, $args = null)
    {
        try {
            $response->getBody()->write($this->template->render('index.html'));
            return $response;
        } catch (\Exception $error) {
            $response->getBody()->write($error->getMessage());
            return $response;
        }
    }
}