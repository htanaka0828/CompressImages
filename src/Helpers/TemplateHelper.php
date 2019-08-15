<?php
namespace CompressImages\Helpers;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class TemplateHelper
{
    const TEMPLATE_DIR = __DIR__ . '/../Templates';

    /**
     * @var FilesystemLoader
     */
    private $twigLoader;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * TemplateHelper constructor.
     * @param FilesystemLoader $twigLoader
     * @param Environment $twig
     */
    public function __construct(FilesystemLoader $twigLoader = null, Environment $twig = null)
    {
        $this->twigLoader = $twigLoader ?: new FilesystemLoader(self::TEMPLATE_DIR);
        $this->twig = $twig ?: new Environment($this->twigLoader);
    }

    /**
     * @param string $templateFile
     * @param array $data
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render($templateFile, $data = [])
    {
        $template = $this->twig->load($templateFile);
        return $template->render($data);
    }
}
