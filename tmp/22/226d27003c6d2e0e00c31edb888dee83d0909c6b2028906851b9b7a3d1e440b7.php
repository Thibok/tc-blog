<?php

/* admin.twig */
class __TwigTemplate_32d426b550140fe09251173267a288c3b1390443c1ca14a5633fa84888deb8e5 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "admin.twig", 1);
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
            <section class=\"row\">
            ";
        // line 8
        $this->loadTemplate("admin_menu.twig", "admin.twig", 8)->display($context);
        // line 9
        echo "                <div id=\"admin_block\" class=\"col-lg-8 col-sm-12 my-5\">

                
                ";
        // line 12
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasFlash", array())) {
            // line 13
            echo "
                    <div class=\"alert alert-info alert-dismissible text-center mt-4\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <span><img class=\"mb-1 mr-1\"src=\"/pictures/infos.png\"/>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFlash", array()), "html", null, true);
            echo "</span>
                    </div>

                ";
        }
        // line 20
        echo "
                    <h1 class=\"pt-3 pl-1 text-white\"><img id=\"ico_blue\" src=\"/pictures/ico_blue.png\" alt=\"icon\"/>Tableau de bord</h1>
                    <p class=\"text-center text-white\">Il y a actuellement ";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getTotal", array()), "html", null, true);
        echo " news</p>
                    <div class=\"table-responsive\">
                        <table class=\"table table-sm table-bordered mt-3 bg-dark\">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th class=\"text-center\">Date d'ajout</th>
                                    <th class=\"text-center\">Action</th>
                                </tr>
                            </thead>
                            <tbody class=\"text-white\">

                                ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["listNews"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["news"]) {
            // line 35
            echo "
                                    <tr>
                                        <td><a class=\"text-white\"href=\"/admin/news-";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getId", array()), "html", null, true);
            echo ".html\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getTitle", array()), "html", null, true);
            echo "</a></td>
                                        <td class=\"text-center font-italic\">";
            // line 38
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getAddAt", array()), "d/m/Y à H\\hi"), "html", null, true);
            echo "</td>
                                        <td class=\"text-center\"><a href=\"/admin/modifier_news-";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getId", array()), "html", null, true);
            echo ".html\"><img style=\"margin-right:1px;\" src=\"/pictures/update.png\" alt=\"update icon\"/></a><a href=\"/admin/supprimer_news-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["news"], "getId", array()), "html", null, true);
            echo "?token=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getToken", array()), "getValue", array()), "html", null, true);
            echo "\"><img style=\"margin-left:1px;\" src=\"/pictures/delete.png\" alt=\"delete icon\"/></a></td>
                                    </tr>

                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['news'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "
                            </tbody>
                        </table>
                    </div>
                    <ul class=\"pagination justify-content-center my-4\">
                        
                        ";
        // line 49
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canPrevious", array())) {
            // line 50
            echo "
                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"/admin?page=";
            // line 52
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                        </li>

                        ";
        } else {
            // line 56
            echo "
                        <li class=\"page-item disabled\">
                            <a class=\"page-link\" href=\"/admin?page=";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                        </li>

                        ";
        }
        // line 62
        echo "                        
                        ";
        // line 63
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canNext", array())) {
            // line 64
            echo "
                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"/admin?page=";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                        </li>

                        ";
        } else {
            // line 70
            echo "
                        <li class=\"page-item disabled\">
                            <a class=\"page-link\" href=\"/admin?page=";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                        </li>

                        ";
        }
        // line 76
        echo "
                    </ul>
                </div>
            </section>
        </div>
    </div>
        
";
    }

    public function getTemplateName()
    {
        return "admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 76,  165 => 72,  161 => 70,  154 => 66,  150 => 64,  148 => 63,  145 => 62,  138 => 58,  134 => 56,  127 => 52,  123 => 50,  121 => 49,  113 => 43,  99 => 39,  95 => 38,  89 => 37,  85 => 35,  81 => 34,  66 => 22,  62 => 20,  55 => 16,  50 => 13,  48 => 12,  43 => 9,  41 => 8,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin.twig", "/srv/html/project/tc-blog/App/Templates/admin.twig");
    }
}
