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

/* header.html */
class __TwigTemplate_0ea461d16dbf755d19c12b3a5c0a4e90fe30311638f8a2a83c95f1ab60c10722 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'tipo_cabecera' => [$this, 'block_tipo_cabecera'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div class=\"pagetop\">
\t<div class=\"logotipo\">
\t\t<img class=\"logoimg\" src=\"./imgs/placeholder.png\"/>
\t\t<h1>Estrenos favoritos</h1>
\t</div>
\t<ul class=\"navbar\">
\t\t";
        // line 7
        $this->displayBlock('tipo_cabecera', $context, $blocks);
        // line 12
        echo "\t</ul>
</div>
";
    }

    // line 7
    public function block_tipo_cabecera($context, array $blocks = [])
    {
        // line 8
        echo "\t\t<li><a class=\"navbar\">Spoilers Dreamworks</a></li>
\t\t<li><a class=\"navbar\">Spoilers Marvel</a></li>
\t\t<li><a class=\"navbar\">Spoilers Disney</a></li>
\t\t";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function getDebugInfo()
    {
        return array (  55 => 8,  52 => 7,  46 => 12,  44 => 7,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "header.html", "C:\\Users\\Monica\\OneDrive\\Informatica 3\\SIBW\\Practicas\\Uni_SIBW_P1\\directorioTemplates\\header.html");
    }
}
