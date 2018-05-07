<?php

/* show.twig */
class __TwigTemplate_0e7328b75cd95ac91538c8011fc6ec5a858a32b71ae7fc3c6311e34ec6dee180 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "show.twig", 1);
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
                <div class=\"col-md-8\">
                    
                    ";
        // line 10
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasFlash", array())) {
            // line 11
            echo "
                    <div class=\"alert alert-info alert-dismissible text-center mt-5\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <span><img class=\"mb-1 mr-1\"src=\"/pictures/infos.png\"/>";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFlash", array()), "html", null, true);
            echo "</span>
                    </div>

                    ";
        }
        // line 18
        echo "
                    <article id=\"content_block\" class=\"px-3 py-2 my-5\">                
                        <a class=\"no_text_decoration\" href=\"/news\">Retour à la liste des news</a>
                        <h1 class=\"mt-3 mb-3 text-white\"><img id=\"ico_blue\" src=\"/pictures/ico_blue.png\" alt=\"icon\"/>";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getTitle", array()), "html", null, true);
        echo "</h1>
                        <p id=\"date_publish\" ><span class=\"font-italic\">";
        // line 22
        echo (((twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getAddAt", array()) != twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getUpdateAt", array()))) ? ("Modifié") : ("Publié"));
        echo " le ";
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getAddAt", array()) != twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getUpdateAt", array()))) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getUpdateAt", array()), "d/m/Y à H\\hi")) : (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getAddAt", array()), "d/m/Y à H\\hi"))), "html", null, true);
        echo "</span> par <span class=\"font-weight-bold\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getUser", array()), "html", null, true);
        echo "</span></p>
                        <hr/>

                        ";
        // line 25
        if (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "hasPicture", array())) {
            // line 26
            echo "
                        <img class=\"img-fluid rounded\" src=\"";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getPicture", array()), "html", null, true);
            echo "\" alt=\"news picture\"/>
                        
                        ";
        }
        // line 30
        echo "
                        <hr/>

                        <p class=\"lead text-white\">";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getChapo", array()), "html", null, true);
        echo "</p>
                        <hr/>
                        <p class=\"text-white\">";
        // line 35
        echo nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "getContent", array()), "html", null, true));
        echo "</p>
                        <hr/>
                        
                        <!-- Comment Form -->
                        <div id=\"comment_form\"class=\"card my-4\">
                            <h2 class=\"card-header\">Laissez un commentaire</h2>
                            <div class=\"card-body\">
                            
                                ";
        // line 43
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "isAuthenticated", array())) {
            // line 44
            echo "                                
                                <form action=\"\" method=\"post\">
                                    ";
            // line 46
            echo ($context["commentForm"] ?? null);
            echo "
                                    <input type=\"hidden\" name=\"token\" value=\"";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getToken", array()), "getValue", array()), "html", null, true);
            echo "\"/>
                                    <button type=\"submit\" class=\"btn btn-primary\">Envoyer</button>
                                </form>

                                ";
        } else {
            // line 52
            echo "
                                <p>Pas encore inscrit ? Inscrivez-vous maintenant pour laisser un commentaire ou connectez-vous</p>
                                <div class=\"text-center\">
                                    <a href=\"/connexion.html\" role=\"button\" class=\"btn btn-primary\">Se connecter</a>
                                    <a href=\"/inscription.html\" role=\"button\" class=\"btn btn-primary\">S'inscrire</a>
                                </div>

                                ";
        }
        // line 60
        echo "
                            </div>
                        </div>          
                        
                        ";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["listComments"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 65
            echo "
                        <div class=\"media mb-4\">
                            <img class=\"d-flex mr-3 rounded-circle\" src=\"/pictures/user.png\" alt=\"user picture\"/>
                            <div class=\"media-body col-md-12\">
                                <span id=\"author_comment\">";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "getUser", array()), "html", null, true);
            echo "</span><small id=\"comment_add_at\" class=\"ml-2\">Ajouté le ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "getAddAt", array()), "d/m/Y à H\\hi\\m\\i\\n s\\s"), "html", null, true);
            echo "</small>
                                <p class=\"mt-2 text-white\">";
            // line 70
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "getContent", array()), "html", null, true);
            echo "</p>
                            </div>
                        </div>
                        
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                        
                        <!-- Pagination -->
                        <ul class=\"pagination justify-content-center mb-4\">

                            ";
        // line 79
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canPrevious", array())) {
            // line 80
            echo "
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"/news-";
            // line 82
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", array()), "html", null, true);
            echo ".html?page=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                            </li>

                            ";
        } else {
            // line 86
            echo "
                            <li class=\"page-item disabled\">
                                <a class=\"page-link\" href=\"/news-";
            // line 88
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", array()), "html", null, true);
            echo ".html?page=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getPreviousPage", array()), "html", null, true);
            echo "\">&larr; Précédent</a>
                            </li>

                            ";
        }
        // line 92
        echo "
                            ";
        // line 93
        if (twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "canNext", array())) {
            // line 94
            echo "
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"/news-";
            // line 96
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", array()), "html", null, true);
            echo ".html?page=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                            </li>

                            ";
        } else {
            // line 100
            echo "
                            <li class=\"page-item disabled\">
                                <a class=\"page-link\" href=\"/news-";
            // line 102
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", array()), "html", null, true);
            echo ".html?page=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getNextPage", array()), "html", null, true);
            echo "\">Suivant &rarr;</a>
                            </li>

                            ";
        }
        // line 106
        echo "
                        </ul>
                    </article>
                </div>
                
                <!-- Sidebar Column -->
                ";
        // line 112
        $this->loadTemplate("rightSidebar.twig", "show.twig", 112)->display($context);
        // line 113
        echo "            </section>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "show.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  244 => 113,  242 => 112,  234 => 106,  225 => 102,  221 => 100,  212 => 96,  208 => 94,  206 => 93,  203 => 92,  194 => 88,  190 => 86,  181 => 82,  177 => 80,  175 => 79,  169 => 75,  158 => 70,  152 => 69,  146 => 65,  142 => 64,  136 => 60,  126 => 52,  118 => 47,  114 => 46,  110 => 44,  108 => 43,  97 => 35,  92 => 33,  87 => 30,  81 => 27,  78 => 26,  76 => 25,  66 => 22,  62 => 21,  57 => 18,  50 => 14,  45 => 11,  43 => 10,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "show.twig", "/srv/html/project/tc-blog/App/Templates/show.twig");
    }
}
