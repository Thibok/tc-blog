<?php

/* admin_menu.twig */
class __TwigTemplate_1b8545df120ad179e6343c34b0eb6076bca355ffaf93fad7439288e36f29f78a extends Twig_Template
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
        echo "<nav id=\"admin_menu\" class=\"col-lg-3 mx-4 my-5\">
    <div class=\"list-group my-3\">
        <a href=\"/admin\" role=\"button\" class=\"bg-dark list-group-item text-white text-center\">Tableau de bord</a>
        <a href=\"/admin/ajouter_une_news\" role=\"button\" class=\"bg-dark list-group-item text-white text-center\">Ajouter une news</a>
        <a href=\"/admin/gestion_des_utilisateurs\" role=\"button\" class=\"bg-dark list-group-item text-white text-center\">Gestion des utilisateurs</a>
        <a href=\"/admin/commentaires_a_valider\" role=\"button\" class=\"bg-dark list-group-item text-white text-center\">Commentaires à valider</a>
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "admin_menu.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin_menu.twig", "/srv/html/project/tc-blog/App/Templates/admin_menu.twig");
    }
}
