<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* footer.html */
class __TwigTemplate_37c0a34a50dadf8424d77a06a9713ff00d4a468ef42f978d2956b10c4a4b8d37 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'redes' => [$this, 'block_redes'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<footer class=\"flex\">
\t<span class=\"copyright box\">©Copyright 2019 UGR</span> <!--Dos clases en uno se hacen asi-->
\t<address class=\"box\">Página hecha por Monica y Kieran
\t\t<p>[Info de contacto]</p>
\t</address>
\t";
        // line 6
        $this->displayBlock('redes', $context, $blocks);
        // line 7
        echo "</footer>
";
    }

    // line 6
    public function block_redes($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "footer.html";
    }

    public function getDebugInfo()
    {
        return array (  50 => 6,  45 => 7,  43 => 6,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "footer.html", "C:\\Users\\Monica\\OneDrive\\Informatica 3\\SIBW\\Practicas\\Uni_SIBW_P1\\directorioTemplates\\footer.html");
    }
}
