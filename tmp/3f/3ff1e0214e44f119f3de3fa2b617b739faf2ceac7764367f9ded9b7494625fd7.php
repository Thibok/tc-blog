<?php

/* layout.twig */
class __TwigTemplate_88cbdabd0171630a761d1393589b3d49eaf78bc8cdab635359fcec126543d13e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
    <head>

        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
        <meta name=\"description\" content=\"\">
        <meta name=\"author\" content=\"\">

        <title>";
        // line 10
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>

        <!-- Bootstrap core CSS -->
        <link href=\"/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
        <link rel=\"shortcut icon\" href=\"/pictures/ico_blue.ico\" />

        <script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- Custom styles for this template -->
        <link href=\"/css/style.css\" rel=\"stylesheet\">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto');
            @import url(\"https://use.typekit.net/nng5edb.css\");
        </style>

    </head>
    <body>
        <!-- Navigation -->
        <nav class=\"navbar navbar-expand-lg navbar-dark fixed-top\">
            <div class=\"container\">
                <a class=\"navbar-brand\" href=\"/\"><img src=\"/pictures/logo.png\" alt=\"cat logo\"/></a>
                <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
                    <ul class=\"navbar-nav ml-auto\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/\">Accueil</a>
                        </li>
                        
                        ";
        // line 41
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "isAuthenticated", array())) {
            // line 42
            echo "                        
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/deconnexion\">Déconnexion</a>
                        </li>

                        ";
        } else {
            // line 48
            echo "
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/connexion.html\">Connexion</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/inscription.html\">Inscription</a>
                        </li>

                        ";
        }
        // line 57
        echo "
                    </ul>
                </div>
            </div>
        </nav>

        ";
        // line 63
        $this->displayBlock('content', $context, $blocks);
        // line 64
        echo "
        <footer id=\"footer\" class=\"py-4\">
            <div class=\"container\">
                <p class=\"m-0 text-center text-white\">Copyright &copy; Tc-blog 2018</p>
                
                ";
        // line 69
        if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "isAuthenticated", array()) && twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "isAdmin", array()))) {
            // line 70
            echo "
                <p class=\"m-0 text-center\"><a id=\"admin_link\" class=\"text-center\" href=\"/admin\">Accèdez à l'administration</a></p>

                ";
        }
        // line 74
        echo "            </div>
        </footer>
    
        <!-- Bootstrap core JavaScript -->
        <script src=\"/jquery/jquery.min.js\"></script>
        <script src=\"/bootstrap/js/bootstrap.bundle.min.js\"></script>
    </body>
</html>";
    }

    // line 63
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 63,  115 => 74,  109 => 70,  107 => 69,  100 => 64,  98 => 63,  90 => 57,  79 => 48,  71 => 42,  69 => 41,  35 => 10,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layout.twig", "/srv/html/project/tc-blog/App/Templates/layout.twig");
    }
}
