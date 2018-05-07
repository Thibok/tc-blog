<?php

/* list_no_valid_comments.twig */
class __TwigTemplate_cbb2f1024aae87fdb63701dd6d6bc9e9e151e8a3f4720148b281d259b43fa147 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "list_no_valid_comments.twig", 1);
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
        // line 9
        $this->loadTemplate("admin_menu.twig", "list_no_valid_comments.twig", 9)->display($context);
        // line 10
        echo "
                <div id=\"admin_block\" class=\"col-lg-8 my-5\">

                ";
        // line 13
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasFlash", array())) {
            // line 14
            echo "
                    <div class=\"alert alert-info alert-dismissible text-center mt-4\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <span><img class=\"mb-1 mr-1\"src=\"/pictures/infos.png\"/>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFlash", array()), "html", null, true);
            echo "</span>
                    </div>

                ";
        }
        // line 21
        echo "
                    <h1 class=\"pt-3 pl-1 text-white\"><img id=\"ico_blue\" src=\"/pictures/ico_blue.png\" alt=\"icon\"/>Commentaires à valider</h1>
                    <p class=\"text-center text-white\">Il y a actuellement ";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getTotal", array()), "html", null, true);
        echo " commentaires à valider</p>
                    <div class=\"table-responsive\">
                        <table class=\"table table-sm table-bordered table-hover mt-3 bg-dark\">
                            <thead>
                                <tr>
                                    <th>Auteur</th>
                                    <th class=\"text-center\">Date d'ajout</th>
                                    <th class=\"text-center\">Action</th>
                                </tr>
                            </thead>
                            <tbody class=\"text-white\">

                            ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["listComments"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 36
            echo "                                <tr>
                                    <td class=\"font-weight-bold\"><a class=\"text-white\" href=\"/admin/commentaire_a_valider_";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "getId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "getUser", array()), "html", null, true);
            echo "</a></td>
                                    <td class=\"text-center font-italic\">";
            // line 38
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "getAddAt", array()), "d/m/Y à H\\hi"), "html", null, true);
            echo "</td>
                                    <td class=\"text-center\"><a href=\"/admin/validation_commentaire_";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "getId", array()), "html", null, true);
            echo "?token=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getToken", array()), "getValue", array()), "html", null, true);
            echo "\"><img style=\"margin-right:1px;\" src=\"/pictures/valid.png\" alt=\"valid icon\"/></a><a href=\"/admin/supprimer_commentaire_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "getId", array()), "html", null, true);
            echo "?token=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getToken", array()), "getValue", array()), "html", null, true);
            echo "\"><img style=\"margin-left:1px;\" src=\"/pictures/delete.png\" alt=\"delete icon\"/></a></td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "
                            </tbody>
                        </table>
                    </div>
                    <ul class=\"pagination justify-content-center my-4\">
                        
                        ";
        // line 48
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canPrevious", array())) {
            // line 49
            echo "
                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"/admin/commentaires_a_valider?page=";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                        </li>

                        ";
        } else {
            // line 55
            echo "
                        <li class=\"page-item disabled\">
                            <a class=\"page-link\" href=\"/admin/commentaires_a_valider?page=";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                        </li>

                        ";
        }
        // line 61
        echo "                            
                        ";
        // line 62
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canNext", array())) {
            // line 63
            echo "
                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"/admin/commentaires_a_valider?page=";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                        </li>

                        ";
        } else {
            // line 69
            echo "
                        <li class=\"page-item disabled\">
                            <a class=\"page-link\" href=\"/admin/commentaires_a_valider?page=";
            // line 71
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                        </li>

                        ";
        }
        // line 75
        echo "
                    </ul>
                </div>
            </div>
        </div>
    </div>
        
";
    }

    public function getTemplateName()
    {
        return "list_no_valid_comments.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 75,  166 => 71,  162 => 69,  155 => 65,  151 => 63,  149 => 62,  146 => 61,  139 => 57,  135 => 55,  128 => 51,  124 => 49,  122 => 48,  114 => 42,  99 => 39,  95 => 38,  89 => 37,  86 => 36,  82 => 35,  67 => 23,  63 => 21,  56 => 17,  51 => 14,  49 => 13,  44 => 10,  42 => 9,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "list_no_valid_comments.twig", "/srv/html/project/tc-blog/App/Templates/list_no_valid_comments.twig");
    }
}
