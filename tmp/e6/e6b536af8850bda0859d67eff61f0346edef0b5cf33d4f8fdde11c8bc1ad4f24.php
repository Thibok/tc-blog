<?php

/* 404.twig */
class __TwigTemplate_6a4c55ca9dae89f60362645bd932a494cc53115b3ea0a71a35026bc041543da9 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "404.twig", 1);
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
            <div id=\"main\" class=\"container\">
                <section class=\"row\">
                    <div class=\"col-md-12 text-center\">
                        <img class=\"img-fluid rounded\" src=\"/pictures/404.png\" alt=\"picture cat\"/>
                        <h1 class=\"pt-2\">404 Page non trouvé</h1>
                        <p>On dirais qu'il y a eu un petit problème...</p>
                        <a role=\"button\" class=\"btn btn-primary\" href=\"/\">Aller à l'accueil</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "404.twig", "/srv/html/project/tc-blog/App/Templates/404.twig");
    }
}
