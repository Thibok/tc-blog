<?php

/* forgot_pass.twig */
class __TwigTemplate_7379838b63a5e7af6f024fc1898600b044e285f240157ea8a5080c28241e4fa8 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "forgot_pass.twig", 1);
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
        <div id=\"vertical_alignement\">
            <section id=\"main\" class=\"container\">
                <div class=\"row\">
                    <div id=\"sign_block\" class=\"col-lg-5 p-4\">
                        <form class=\"form-horizontal\" method=\"post\" action=\"\">
                            <fieldset>
                                <h2 class=\"text-white\"><img id=\"ico_blue\" src=\"/pictures/ico_blue.png\" alt=\"icon\"/>Mot de passe oublié</h2>
                                ";
        // line 13
        echo ($context["form"] ?? null);
        echo "
                                <div class=\"form-group d-inline-flex align-items-end pl-3\">
                                    <button name=\"forgot\" type=\"submit\" class=\"btn btn-primary\">Envoyer</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
        
";
    }

    public function getTemplateName()
    {
        return "forgot_pass.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forgot_pass.twig", "/srv/html/project/tc-blog/App/Templates/forgot_pass.twig");
    }
}
