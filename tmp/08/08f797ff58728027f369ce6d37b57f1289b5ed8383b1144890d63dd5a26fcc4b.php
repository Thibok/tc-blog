<?php

/* index.twig */
class __TwigTemplate_96a0ff11849de6f82651c69ba5e8e305c9bbfa0b1a1c475b48af0bb7b54e4cd3 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "index.twig", 1);
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
        <div id=\"main\" class=\"container mb-5\">
            <section class=\"row\">
                <div class=\"col-lg-8 my-5\">
                    ";
        // line 9
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasFlash", array())) {
            // line 10
            echo "                    <div class=\"alert alert-info alert-dismissible text-center mt-4\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                    <span><img class=\"mb-1 mr-1\"src=\"/pictures/infos.png\"/>";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFlash", array()), "html", null, true);
            echo "</span>
                    </div>
                    ";
        }
        // line 15
        echo "                    <h1 id=\"border-bottom\" class=\"mb-4 text-white\"><img id=\"ico_blue\" alt=\"icon\" src=\"/pictures/ico_blue.png\"/>News</h1>
                    <!-- Blog Post -->
                    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["listNews"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["news"]) {
            // line 18
            echo "
                    <article class=\"card mb-4\">

                    ";
            // line 21
            if (twig_get_attribute($this->env, $this->source, $context["news"], "hasPicture", array())) {
                // line 22
                echo "
                    <a href=\"/news-";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "id", array()), "html", null, true);
                echo ".html\"><img class=\"card-img-top\" src=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getPicture", array()), "html", null, true);
                echo "\" alt=\"news picture\"/></a>

                    ";
            }
            // line 26
            echo "
                        <div class=\"card-body\">
                            <a href=\"/news-";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "id", array()), "html", null, true);
            echo ".html\"><h2 class=\"card-title\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getTitle", array()), "html", null, true);
            echo "</h2></a>
                            <p class=\"card-text text-white\">";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getChapo", array()), "html", null, true);
            echo "</p>
                            <a role=\"button\" href=\"/news-";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "id", array()), "html", null, true);
            echo ".html\" class=\"btn btn-primary\">Lire la suite &rarr;</a>
                        </div>
                        <div class=\"card-footer\">
                            ";
            // line 33
            echo (((twig_get_attribute($this->env, $this->source, $context["news"], "getAddAt", array()) != twig_get_attribute($this->env, $this->source, $context["news"], "getUpdateAt", array()))) ? ("Modifié") : ("Publié"));
            echo " le <span class=\"font-italic\">";
            echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, $context["news"], "getAddAt", array()) != twig_get_attribute($this->env, $this->source, $context["news"], "getUpdateAt", array()))) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getUpdateAt", array()), "d/m/Y à H\\hi")) : (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getAddAt", array()), "d/m/Y à H\\hi"))), "html", null, true);
            echo "</span> par <span class=\"font-weight-bold\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getUser", array()), "html", null, true);
            echo "</span>
                        </div>
                    </article>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['news'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "
                    <div class=\"text-center mb-4 pr-4\">
                        <a role=\"button\" href=\"/news\" class=\"btn btn-primary\">Toutes les news</a>
                    </div>
                </div>
                <!-- Sidebar Column -->
                ";
        // line 44
        $this->loadTemplate("rightSidebar.twig", "index.twig", 44)->display($context);
        // line 45
        echo "            </section>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 45,  123 => 44,  115 => 38,  100 => 33,  94 => 30,  90 => 29,  84 => 28,  80 => 26,  72 => 23,  69 => 22,  67 => 21,  62 => 18,  58 => 17,  54 => 15,  48 => 12,  44 => 10,  42 => 9,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.twig", "/srv/html/project/tc-blog/App/Templates/index.twig");
    }
}
