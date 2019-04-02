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

/* footerHijo.html */
class __TwigTemplate_4b9fb7593dec5cfcb46f4de8026b5d787bcaed3a451f41c03a968c5bac8925f4 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("footer.html", "footerHijo.html", 1);
        $this->blocks = [
            'redes' => [$this, 'block_redes'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "footer.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_redes($context, array $blocks = [])
    {
        // line 4
        echo "    <div class=\"links box\">
        <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["enlace_twitter"] ?? null), "html", null, true);
        echo "\"><img  src=\"./imgs/twitter.png\"/></a>
        <a href=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["enlace_fb"] ?? null), "html", null, true);
        echo "/\"><img src=\"./imgs/facebook.png\"/></a>
        <a href=\"./evento_imprimir.html\"><img src=\"./imgs/impresora.png\"/></a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "footerHijo.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 6,  50 => 5,  47 => 4,  44 => 3,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "footerHijo.html", "C:\\Users\\Monica\\OneDrive\\Informatica 3\\SIBW\\Practicas\\Uni_SIBW_P1\\directorioTemplates\\footerHijo.html");
    }
}
