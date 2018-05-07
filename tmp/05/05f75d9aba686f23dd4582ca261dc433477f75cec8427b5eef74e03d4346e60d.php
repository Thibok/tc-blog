<?php

/* signup.twig */
class __TwigTemplate_d527cabbcd9883fd2089651be6232ee8b4fb12c8726f87075ea1eb707a2b1921 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "signup.twig", 1);
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
        <div id=\"vertical_alignement\">
            <section id=\"main\" class=\"container\">
                <div class=\"row\">
                    <div id=\"sign_block\" class=\"col-lg-5 p-4\">
                        <form action=\"\" method=\"post\" class=\"form-horizontal\">
                            <fieldset>
                                <h2 class=\"text-white\"><img id=\"ico_blue\" src=\"/pictures/ico_blue.png\" alt=\"icon\"/>Inscription</h2>
                                ";
        // line 13
        echo ($context["form"] ?? null);
        echo "
                                <div class=\"form-group d-inline-flex align-items-end pl-3\">
                                    <button name=\"signup\" type=\"submit\" class=\"btn btn-primary mt-2\">S'inscrire</button>
                                    <a href=\"/connexion.html\" role=\"button\" class=\"ml-3 text-primary\">Déjà inscrit ?</a>
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
        return "signup.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "signup.twig", "/srv/html/project/tc-blog/App/Templates/signup.twig");
    }
}
