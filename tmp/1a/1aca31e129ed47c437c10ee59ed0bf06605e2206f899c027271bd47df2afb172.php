<?php

/* admin_show_news.twig */
class __TwigTemplate_81cc354cfc17e8ec8161e80b3be5052b67f9ac6d4b9f8e5e67503c0d597f4119 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "admin_show_news.twig", 1);
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
            <div id=\"main\" class=\"container\">
                <section class=\"row\">
                ";
        // line 8
        $this->loadTemplate("admin_menu.twig", "admin_show_news.twig", 8)->display($context);
        // line 9
        echo "                    <article class=\"col-lg-8 col-sm-12 my-5\" id=\"admin_block\">
                        <h1 class=\"pt-3 pl-1 text-white\"><img src=\"/pictures/ico_blue.png\" id=\"ico_blue\" alt=\"icon\"/>";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getTitle", array()), "html", null, true);
        echo "</h1>
                        <p id=\"date_publish\" class=\"pl-1\">Publié le <span class=\"font-italic\">";
        // line 11
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getAddAt", array()), "d/m/Y à H\\hi"), "html", null, true);
        echo "</span> par <span class=\"font-weight-bold\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "user", array()), "html", null, true);
        echo "</span></p>
                        <hr/>

                        ";
        // line 14
        if (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "hasPicture", array())) {
            // line 15
            echo "
                        <img class=\"img-fluid rounded\" src=\"";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getPicture", array()), "html", null, true);
            echo "\" alt=\"news picture\"/>
                            
                        ";
        }
        // line 19
        echo "                            
                        <hr/>
                        <p class=\"lead text-white\">";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getChapo", array()), "html", null, true);
        echo "</p>
                        <hr/>
                        <p class=\"text-white\">";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getContent", array()), "html", null, true);
        echo "</p>
                        <hr/>
                        <div class=\"text-center my-5\">
                            <a role=\"button\" href=\"/admin/modifier_news-";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getId", array()), "html", null, true);
        echo ".html\" class=\"btn btn-warning mr-2 text-white\"><img class=\"mr-1 mb-1\" src=\"/pictures/update.png\" alt=\"update icon\"/>Modifier</a>
                            <a role=\"button\" href=\"/admin/supprimer_news-";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getId", array()), "html", null, true);
        echo "?token=";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getToken", array()), "getValue", array()), "html", null, true);
        echo "\" class=\"btn btn-danger ml-2 text-white\"><img class=\"mr-1\" src=\"/pictures/delete.png\" alt=\"delete icon\"/>Supprimer</a>
                        </div>
                    </article>
                </section>
            </div>
        </div>

";
    }

    public function getTemplateName()
    {
        return "admin_show_news.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 27,  84 => 26,  78 => 23,  73 => 21,  69 => 19,  63 => 16,  60 => 15,  58 => 14,  50 => 11,  46 => 10,  43 => 9,  41 => 8,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin_show_news.twig", "/srv/html/project/tc-blog/App/Templates/admin_show_news.twig");
    }
}
