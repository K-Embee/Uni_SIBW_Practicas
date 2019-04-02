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

/* sidebar.html */
class __TwigTemplate_aa55dfee48d89334ec14cb6391608b275b59d06293a040c27064b6d54f5c28fc extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<aside>
\t<p>Cines Granada</p>
\t<ul>
\t\t<li><a href=\"https://kinepolis.es/cines/kinepolis-granada\">Kinepolis Granada</a></li>
\t\t<li><a href=\"https://kinepolis.es/cines/kinepolis-nevada\">Kinepolis Nevada</a></li>
\t\t<li><a href=\"https://cine.entradas.com/cine-granada/cinema-2000/shows/movies\">Megarama Granada</a></li>
\t\t<li><a href=\"http://www.cinemaserrallo.com/\">Cinema Serrallo</a></li>
\t\t<li><a href=\"https://www.alhsur.com/cartelera-cine-alhsur-granada/\">Cines Artesiete Alhsur</a></li>
\t</ul>
</aside>
";
    }

    public function getTemplateName()
    {
        return "sidebar.html";
    }

    public function getDebugInfo()
    {
        return array (  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sidebar.html", "C:\\Users\\Monica\\OneDrive\\Informatica 3\\SIBW\\Practicas\\Uni_SIBW_P1\\directorioTemplates\\sidebar.html");
    }
}
