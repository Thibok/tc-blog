<?php

/* signin.twig */
class __TwigTemplate_acc32a95949d197a32597566008279d78f858fddc1e19dc595d0f9a90fd5572d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "signin.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div id=\"wrap\">

    ";
        // line 7
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasFlash", array())) {
            // line 8
            echo "                
        <div class=\"alert alert-info alert-dismissible text-center mt-4\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            <span><img class=\"mb-1 mr-1\"src=\"/pictures/infos.png\"/>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFlash", array()), "html", null, true);
            echo "</span>
        </div>

    ";
        }
        // line 15
        echo "
        <div id=\"vertical_alignement\">
            <section id=\"main\" class=\"container\">
                <div class=\"row\">
                    <div id=\"sign_block\" class=\"col-lg-5 p-4\">
                        <form class=\"form-horizontal\" method=\"post\" action=\"\">
                            <fieldset>
                                <h2 class=\"text-white\"><img id=\"ico_blue\" src=\"/pictures/ico_blue.png\" alt=\"icon\"/>Connexion</h2>
                                ";
        // line 23
        echo ($context["form"] ?? null);
        echo "
                                <div class=\"form-group d-inline-flex align-items-end pl-3\">
                                    <button name=\"signin\" type=\"submit\" class=\"btn btn-primary\">Se connecter</button>
                                    <a href=\"/inscription.html\" role=\"button\" class=\"ml-3 text-primary\">Pas encore inscrit ?</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
        
";
    }

    public function getTemplateName()
    {
        return "signin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 23,  54 => 15,  47 => 11,  42 => 8,  40 => 7,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "signin.twig", "/srv/html/project/tc-blog/App/Templates/signin.twig");
    }
}
