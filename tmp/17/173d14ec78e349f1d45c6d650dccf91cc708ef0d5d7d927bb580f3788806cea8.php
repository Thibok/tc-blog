<?php

/* add_news.twig */
class __TwigTemplate_9505c4e57cfb21e717b7eace69bbdd2208b6ca7a0fa22bed896a41463756419b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "add_news.twig", 1);
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
        $this->loadTemplate("admin_menu.twig", "add_news.twig", 8)->display($context);
        // line 9
        echo "                <div id =\"admin_block\" class=\"col-lg-8 my-5\">

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
                    <h1 class=\"pt-3 pl-1 text-white\"><img src=\"/pictures/ico_blue.png\" id=\"ico_blue\" alt=\"icon\"/>Ajouter une news</h1>
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
                                <button type=\"submit\" name=\"publish\" class=\"btn btn-primary\">Publier</button>
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
        return "add_news.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 24,  67 => 23,  61 => 19,  54 => 15,  49 => 12,  47 => 11,  43 => 9,  41 => 8,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "add_news.twig", "/srv/html/project/tc-blog/App/Templates/add_news.twig");
    }
}
