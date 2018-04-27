<?php

/* rightSidebar.twig */
class __TwigTemplate_4ec25735bfdbfa1e32f3d641b79ff4f9316f32f51a5561c166f99ac0ecbecfad extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"col-lg-4 mt-2\">
                    <aside class=\"card my-4\" id=\"aside\">
                        <img id=\"profil_picture\"class=\"img-center\" src=\"/pictures/profil.jpg\" alt=\"developer photo\"/>
                        <div class=\"card-body\">
                            <legend class=\"card-title text-center text-white\">Thibault le développeur qu'il vous faut ! </legend>
                            <div class=\"d-flex justify-content-center\">
                                <a class=\"p-2\" href=\"https://github.com/Thibok\" target=\"_blank\"><i id=\"github\" class=\"fa fa-github\"></i></a>
                                <a class=\"p-2\" href=\"https://twitter.com/TCavailles\" target=\"_blank\"><i id=\"twitter\" class=\"fa fa-twitter\"></i></a>
                                <a class=\"p-2\" href=\"https://www.linkedin.com/in/thibault-cavailles-b40061146/\" target=\"_blank\"><i class=\"fa fa-linkedin text-white\"></i></a>
                                <a class=\"p-2\" href=\"/C.V.pdf\" target=\"_blank\"><i id=\"cv\"class=\"fa fa-user\"></i></a>
                            </div>
                        </div>
                    </aside>
                    <!-- Contact Form -->
                    <div class=\"col-lg-12 my-4 p-3\" id=\"contact\">
                        <form method=\"post\" action=\"\">
                            <h2 class=\"text-white\">Contact</h2>
                            ";
        // line 18
        echo ($context["contactForm"] ?? null);
        echo "
                            <button type=\"submit\" class=\"btn btn-primary\">Envoyer</button>
                        </form>
                    </div>
                </div>";
    }

    public function getTemplateName()
    {
        return "rightSidebar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 18,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "rightSidebar.twig", "/srv/html/project/tc-blog/App/Templates/rightSidebar.twig");
    }
}
