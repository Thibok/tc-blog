<?php

/* update_news.twig */
class __TwigTemplate_0cff6bf851f35e47267d2cbb1013fbb53dc474f83731b7a6a0557334103ad7ed extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "update_news.twig", 1);
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
        $this->loadTemplate("admin_menu.twig", "update_news.twig", 8)->display($context);
        // line 9
        echo "                <div class=\"col-lg-8 my-5\" id=\"admin_block\">
                    <h1 class=\"pt-3 pl-1 text-white\"><img src=\"/pictures/ico_blue.png\" alt=\"icon\" id=\"ico_blue\"/>";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getTitle", array()), "html", null, true);
        echo "</h1>
                    <p id=\"date_publish\" ><span class=\"font-italic\">";
        // line 11
        echo (((twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getAddAt", array()) != twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getUpdateAt", array()))) ? ("Modifié") : ("Publié"));
        echo " le ";
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getAddAt", array()) != twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getUpdateAt", array()))) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getUpdateAt", array()), "d/m/Y à H\\hi")) : (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getAddAt", array()), "d/m/Y à H\\hi"))), "html", null, true);
        echo "</span> par <span class=\"font-weight-bold\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getUser", array()), "html", null, true);
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
                    <form action=\"\" method=\"post\" class=\"form-horizontal\" enctype=\"multipart/form-data\">
                        <fieldset>
                            <input type=\"hidden\" name=\"token\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getToken", array()), "getValue", array()), "html", null, true);
        echo "\"/>
                            ";
        // line 24
        echo ($context["form"] ?? null);
        echo "
                            <div class=\"col-md-4 mb-4\">
                                <button type=\"submit\" name=\"publish\" class=\"btn btn-primary\">Modifier</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </section>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "update_news.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 24,  77 => 23,  71 => 19,  65 => 16,  62 => 15,  60 => 14,  50 => 11,  46 => 10,  43 => 9,  41 => 8,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "update_news.twig", "/srv/html/project/tc-blog/App/Templates/update_news.twig");
    }
}
