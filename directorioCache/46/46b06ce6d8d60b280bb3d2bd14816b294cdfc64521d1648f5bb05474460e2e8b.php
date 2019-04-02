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

/* plantillaGeneral.html */
class __TwigTemplate_8ba3f86ed3ab40fc75acd59c3d8e7adbad4f073789b470dd3beb03d39b5f31ca extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'titulo' => [$this, 'block_titulo'],
            'header' => [$this, 'block_header'],
            'sidebar' => [$this, 'block_sidebar'],
            'evento' => [$this, 'block_evento'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html>

<head>
\t<meta charset=\"utf-8\">
\t<title>";
        // line 6
        $this->displayBlock('titulo', $context, $blocks);
        echo "</title>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/estilo.css\"/>
\t<script type=\"text/javascript\" src=\"./scripts/comentarios.js\"></script>
</head>

<body>

\t<!-- Cabecera -->

\t";
        // line 15
        $this->displayBlock('header', $context, $blocks);
        // line 18
        echo "
\t<!-- Parte central y barra lateral -->
\t<div class=\"flex\">

    \t";
        // line 22
        $this->displayBlock('sidebar', $context, $blocks);
        // line 25
        echo "

    \t";
        // line 27
        $this->displayBlock('evento', $context, $blocks);
        // line 28
        echo "\t</div>

\t<!-- Eliminación de elementos flotantes -->
\t<div class=\"cleared\"></div>

\t<!-- Comentarios -->

\t<div class=\"commentbutton\" onclick=\"toggle_comments()\" id=\"commentbutton\"><img src=\"./imgs/speechbubble.png\"/></div>
\t<div class=\"commentpanel\" id=\"commentpanel\">
\t\t<div class=\"comments\" id=\"comments\">
\t\t\t<div class=\"comment\">
\t\t\t\t<span class=\"bold\">Autor: </span>Un usuario<br>
\t\t\t\t<span class=\"bold\">Fecha: </span>Una fecha<br>
\t\t\t\tUn comentario
\t\t\t</div>
\t\t\t<div class=\"comment\">
\t\t\t\t<span class=\"bold\">Autor: </span>Otro usuario<br>
\t\t\t\t<span class=\"bold\">Fecha: </span>Otra fecha<br>
\t\t\t\tOtro comentario
\t\t\t</div>
\t\t</div>
\t\t<form onsubmit=\"return validate_form()\" >
\t\t\t<label for=\"name\">Nombre</label>
\t\t\t<input type=\"text\" id=\"name\" placeholder=\"Nombre\"></input>
\t\t\t<label for=\"email\">Email</label>
\t\t\t<input type=\"text\" id=\"email\" placeholder=\"Email\"></input>
\t\t\t<label>Comentario</label>
\t\t\t<textarea id=\"comentario\" placeholder=\"Comentario\" oninput=\"censor_comment()\"></textarea>
\t\t\t<input type=\"submit\" value=\"Submit\"></input>
\t\t</form>
\t</div>


\t<!-- Pie -->
\t";
        // line 62
        $this->displayBlock('footer', $context, $blocks);
        // line 63
        echo "
</body>

</html>
";
    }

    // line 6
    public function block_titulo($context, array $blocks = [])
    {
        echo "Estrenos peliculas";
    }

    // line 15
    public function block_header($context, array $blocks = [])
    {
        // line 16
        echo "\t\t";
        $this->loadTemplate("header.html", "plantillaGeneral.html", 16)->display($context);
        // line 17
        echo "\t";
    }

    // line 22
    public function block_sidebar($context, array $blocks = [])
    {
        // line 23
        echo "\t\t\t";
        $this->loadTemplate("sidebar.html", "plantillaGeneral.html", 23)->display($context);
        // line 24
        echo "\t\t";
    }

    // line 27
    public function block_evento($context, array $blocks = [])
    {
    }

    // line 62
    public function block_footer($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "plantillaGeneral.html";
    }

    public function getDebugInfo()
    {
        return array (  152 => 62,  147 => 27,  143 => 24,  140 => 23,  137 => 22,  133 => 17,  130 => 16,  127 => 15,  121 => 6,  113 => 63,  111 => 62,  75 => 28,  73 => 27,  69 => 25,  67 => 22,  61 => 18,  59 => 15,  47 => 6,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "plantillaGeneral.html", "C:\\Users\\Monica\\OneDrive\\Informatica 3\\SIBW\\Practicas\\Uni_SIBW_P1\\directorioTemplates\\plantillaGeneral.html");
    }
}
