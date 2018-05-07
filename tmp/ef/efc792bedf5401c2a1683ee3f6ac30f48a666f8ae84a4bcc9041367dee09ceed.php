<?php

/* list_manage_users_admin.twig */
class __TwigTemplate_9f3b0201e6bb23fc3c46fd730d5a9e1cb1b457b27e16ec9b067bab23c3413e93 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "list_manage_users_admin.twig", 1);
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
        $this->loadTemplate("admin_menu.twig", "list_manage_users_admin.twig", 8)->display($context);
        // line 9
        echo "                <div class=\"col-lg-8 col-sm-12 my-5\" id=\"admin_block\">

                ";
        // line 11
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasFlash", array())) {
            // line 12
            echo "
                <div class=\"alert alert-info alert-dismissible text-center mt-4\">
                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                    <span><img class=\"mb-1 mr-1\"src=\"/pictures/infos.png\"/>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFlash", array()), "html", null, true);
            echo "</span>
                </div>

                ";
        }
        // line 19
        echo "
                    <h1 class=\"pt-3 pl-1 text-white\"><img id=\"ico_blue\" src=\"/pictures/ico_blue.png\" alt=\"icon\"/>Gestion des utilisateurs</h1>
                    <p class=\"text-center text-white\">Il y a actuellement ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getTotal", array()), "html", null, true);
        echo " membres</p>
                    <div class=\"table-responsive\">
                        <table class=\"table table-sm table-bordered table-hover mt-3 bg-dark\">
                            <thead>
                                <tr>
                                    <th>Pseudo</th>
                                    <th class=\"text-center\">Rôle</th>
                                    <th class=\"text-center\">Action</th>
                                </tr>
                            </thead>
                            <tbody class=\"text-white\">

                            ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["listUsers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["userInfos"]) {
            // line 34
            echo "
                                <tr>
                                    <td class=\"font-weight-bold\">";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["userInfos"], "getPseudo", array()), "html", null, true);
            echo "</td>
                                    <td class=\"text-center font-weight-bold\">";
            // line 37
            echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, $context["userInfos"], "getRole", array()) == "Administrateur")) ? ("Admin") : (twig_get_attribute($this->env, $this->source, $context["userInfos"], "getRole", array()))), "html", null, true);
            echo "</td>
                                    <td class=\"text-center\">
                                    <form action=\"\" method=\"post\">
                                        <input type=\"hidden\" name=\"id\" value=\"";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["userInfos"], "getId", array()), "html", null, true);
            echo "\"/>
                                        <input type=\"hidden\" name=\"token\" value=\"";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getToken", array()), "getValue", array()), "html", null, true);
            echo "\"/>
                                        ";
            // line 42
            echo ($context["form"] ?? null);
            echo "
                                        <button type=\"submit\" class=\"d-inline-block btn btn-primary\">Ok</button>                                       
                                    </form>
                                    </td>
                                </tr>

                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userInfos'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "
                            </tbody>
                        </table>
                    </div>
                    <ul class=\"pagination justify-content-center my-4\">
                        
                        ";
        // line 55
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canPrevious", array())) {
            // line 56
            echo "
                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"/admin/gestion_des_utilisateurs?page=";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                        </li>

                        ";
        } else {
            // line 62
            echo "
                        <li class=\"page-item disabled\">
                            <a class=\"page-link\" href=\"/admin/gestion_des_utilisateurs?page=";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                        </li>

                        ";
        }
        // line 68
        echo "                        ";
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canNext", array())) {
            // line 69
            echo "
                        <li class=\"page-item\">
                            <a class=\"page-link\" href=\"/admin/gestion_des_utilisateurs?page=";
            // line 71
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                        </li>

                        ";
        } else {
            // line 75
            echo "
                        <li class=\"page-item disabled\">
                            <a class=\"page-link\" href=\"/admin/gestion_des_utilisateurs?page=";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                        </li>

                        ";
        }
        // line 81
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
        return "list_manage_users_admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 81,  169 => 77,  165 => 75,  158 => 71,  154 => 69,  151 => 68,  144 => 64,  140 => 62,  133 => 58,  129 => 56,  127 => 55,  119 => 49,  106 => 42,  102 => 41,  98 => 40,  92 => 37,  88 => 36,  84 => 34,  80 => 33,  65 => 21,  61 => 19,  54 => 15,  49 => 12,  47 => 11,  43 => 9,  41 => 8,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "list_manage_users_admin.twig", "/srv/html/project/tc-blog/App/Templates/list_manage_users_admin.twig");
    }
}
