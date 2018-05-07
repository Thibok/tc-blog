<?php

/* show_no_valid_comment.twig */
class __TwigTemplate_62e742e32007b1155b161bd694ff56e0f29de4bd2f3085c94e58d83e09665f59 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "show_no_valid_comment.twig", 1);
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
            <div id=\"main\" class=\"container pt-4\">
                <div class=\"row\">
                    ";
        // line 8
        $this->loadTemplate("admin_menu.twig", "show_no_valid_comment.twig", 8)->display($context);
        // line 9
        echo "                    <div class=\"col-lg-8 my-5\" id=\"admin_block\">
                        <h1 class=\"pt-3 pl-1 text-white\"><img id=\"ico_blue\" src=\"/pictures/ico_blue.png\" alt=\"icon\"/>";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getTitle", array()), "html", null, true);
        echo "</h1>
                        <p id=\"date_publish\" class=\"pl-2\">Commentaire posté le <span class=\"font-italic\">";
        // line 11
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["comment"] ?? null), "getAddAt", array()), "d/m/Y à H\\hi"), "html", null, true);
        echo "</span> par <span class=\"font-weight-bold\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["comment"] ?? null), "getUser", array()), "html", null, true);
        echo "</span></p>
                        <p class=\"p-2 text-white\">";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["comment"] ?? null), "getContent", array()), "html", null, true);
        echo "</p>
                        <div class=\"text-center my-5\">
                            <a href=\"/admin/validation_commentaire_";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["comment"] ?? null), "getId", array()), "html", null, true);
        echo "?token=";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getToken", array()), "getValue", array()), "html", null, true);
        echo "\" role=\"button\" class=\"btn btn-success mr-2\"><img class=\"mr-1 mb-1\"src=\"/pictures/valid.png\" alt=\"valid icon\"/>Valider</a>
                            <a href=\"/admin/supprimer_commentaire_";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["comment"] ?? null), "getId", array()), "html", null, true);
        echo "?token=";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getToken", array()), "getValue", array()), "html", null, true);
        echo "\" role=\"button\" class=\"btn btn-danger ml-2\"><img class=\"mr-1\" src=\"/pictures/delete.png\" alt=\"delete icon\"/>Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

";
    }

    public function getTemplateName()
    {
        return "show_no_valid_comment.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 15,  61 => 14,  56 => 12,  50 => 11,  46 => 10,  43 => 9,  41 => 8,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "show_no_valid_comment.twig", "/srv/html/project/tc-blog/App/Templates/show_no_valid_comment.twig");
    }
}
