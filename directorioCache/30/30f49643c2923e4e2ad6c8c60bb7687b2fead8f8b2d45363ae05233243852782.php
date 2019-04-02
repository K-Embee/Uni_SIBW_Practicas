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

/* plantillaEvento.html */
class __TwigTemplate_7e7b0291cdd0ae553da9936cad31fac760dc00ccc137bca2f6512d8acc4e3b5e extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("plantillaGeneral.html", "plantillaEvento.html", 1);
        $this->blocks = [
            'titulo' => [$this, 'block_titulo'],
            'evento' => [$this, 'block_evento'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "plantillaGeneral.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_titulo($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        echo twig_escape_filter($this->env, ($context["eventoNombre"] ?? null), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_evento($context, array $blocks = [])
    {
        // line 8
        echo "    <span class=\"principal\">
        <span>
            <div class=\"imageevento\">
                <img class=\"infoimg\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["imagen1"] ?? null), "html", null, true);
        echo "\"/>
                <p>Imagen del trailer</p>
                <img class=\"infoimg\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["imagen2"] ?? null), "html", null, true);
        echo "\"/>
                <p>Imagen del trailer</p>
            </div>
            <h2>";
        // line 16
        echo twig_escape_filter($this->env, ($context["eventoNombre"] ?? null), "html", null, true);
        echo "</h2>
            <ul>
                <li>Genero: ";
        // line 18
        echo twig_escape_filter($this->env, ($context["genero"] ?? null), "html", null, true);
        echo "</li>
                <li>Estudios: ";
        // line 19
        echo twig_escape_filter($this->env, ($context["estudios"] ?? null), "html", null, true);
        echo "</li>
                <li>Distribuidora: ";
        // line 20
        echo twig_escape_filter($this->env, ($context["distribuidora"] ?? null), "html", null, true);
        echo "</li>
                <li>Fecha de estreno: ";
        // line 21
        echo twig_escape_filter($this->env, ($context["fechaEstreno"] ?? null), "html", null, true);
        echo "</li>
            </ul>
            ";
        // line 23
        echo twig_escape_filter($this->env, ($context["descripcion"] ?? null), "html", null, true);
        echo "
        </span>
    </span>
";
    }

    // line 28
    public function block_footer($context, array $blocks = [])
    {
        // line 29
        echo "    ";
        $this->loadTemplate("footerHijo.html", "plantillaEvento.html", 29)->display(twig_array_merge($context, ["aaa" => "aaa"]));
    }

    public function getTemplateName()
    {
        return "plantillaEvento.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 29,  105 => 28,  97 => 23,  92 => 21,  88 => 20,  84 => 19,  80 => 18,  75 => 16,  69 => 13,  64 => 11,  59 => 8,  56 => 7,  49 => 4,  46 => 3,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "plantillaEvento.html", "C:\\Users\\Monica\\OneDrive\\Informatica 3\\SIBW\\Practicas\\Uni_SIBW_P1\\directorioTemplates\\plantillaEvento.html");
    }
}
