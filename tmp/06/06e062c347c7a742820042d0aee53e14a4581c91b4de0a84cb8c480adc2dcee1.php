<?php

/* list.twig */
class __TwigTemplate_8a18927fbff92cb24f1e8c9e678503be301b9772af186aab5648da7e0c1a4a35 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "list.twig", 1);
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
            <h1 id=\"border-bottom\" class=\"mb-4 mt-5 text-white\"><img id=\"ico_blue\" alt=\"icon\" src=\"/pictures/ico_blue.png\"/>Toutes les news</h1>
            <section class=\"row\">

            ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["listNews"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["news"]) {
            // line 11
            echo "            
            <div class=\"col-lg-6 portfolio-item mb-5\">
                <article class=\"card h-100\">

                ";
            // line 15
            if (twig_get_attribute($this->env, $this->source, $context["news"], "hasPicture", array())) {
                // line 16
                echo "
                    <a href=\"/news-";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "id", array()), "html", null, true);
                echo ".html\"><img class=\"card-img-top\" alt=\"news picture\" src=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getPicture", array()), "html", null, true);
                echo "\"/></a>

                ";
            }
            // line 20
            echo "
                    <div class=\"card-body\">
                        <h2 class=\"card-title text-white\"><a href=\"/news-";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "id", array()), "html", null, true);
            echo ".html\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getTitle", array()), "html", null, true);
            echo "</a></h2>
                        <p class=\"card-text text-white\">";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getChapo", array()), "html", null, true);
            echo "</p>
                    </div>
                    <div class=\"read_more\">
                        <a href=\"/news-";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "id", array()), "html", null, true);
            echo ".html\" class=\"btn btn-primary mb-4 ml-3\">Lire la suite &rarr;</a>
                    </div>
                    <div class=\"card-footer\">
                        ";
            // line 29
            echo (((twig_get_attribute($this->env, $this->source, $context["news"], "addAt", array()) != twig_get_attribute($this->env, $this->source, $context["news"], "updateAt", array()))) ? ("Modifié") : ("Publié"));
            echo " le <span class=\"font-italic\">";
            echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, $context["news"], "addAt", array()) != twig_get_attribute($this->env, $this->source, $context["news"], "updateAt", array()))) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "updateAt", array()), "d/m/Y à H\\hi")) : (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "addAt", array()), "d/m/Y à H\\hi"))), "html", null, true);
            echo "</span> par <span class=\"font-weight-bold\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "user", array()), "html", null, true);
            echo "</span>
                    </div>
                </article>
            </div>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['news'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "
            </section>
            <!-- Pagination -->
            <ul class=\"pagination justify-content-center mb-4\">

                ";
        // line 40
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canPrevious", array())) {
            // line 41
            echo "
                <li class=\"page-item\">
                    <a class=\"page-link\" href=\"/news?page=";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                </li>

                ";
        } else {
            // line 47
            echo "
                <li class=\"page-item disabled\">
                    <a class=\"page-link\" href=\"/news?page=";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                </li>
                
                ";
        }
        // line 53
        echo "
                ";
        // line 54
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canNext", array())) {
            // line 55
            echo "
                <li class=\"page-item\">
                    <a class=\"page-link\" href=\"/news?page=";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                </li>

                ";
        } else {
            // line 61
            echo "
                <li class=\"page-item disabled\">
                    <a class=\"page-link\" href=\"/news?page=";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                </li>

                ";
        }
        // line 67
        echo "            </ul>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 67,  155 => 63,  151 => 61,  144 => 57,  140 => 55,  138 => 54,  135 => 53,  128 => 49,  124 => 47,  117 => 43,  113 => 41,  111 => 40,  104 => 35,  88 => 29,  82 => 26,  76 => 23,  70 => 22,  66 => 20,  58 => 17,  55 => 16,  53 => 15,  47 => 11,  43 => 10,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "list.twig", "/srv/html/project/tc-blog/App/Templates/list.twig");
    }
}
