<?php

/* Modules/Motor/Home/View.twig */
class __TwigTemplate_82e396b0e62f8b4d7b6ed6364529a8d34bf2cbc1a4ff8296d10c831d982b84e4 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("general/themes/master-frontend.twig", "Modules/Motor/Home/View.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "general/themes/master-frontend.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function block_body($context, array $blocks = array())
    {
        // line 2
        echo "<h1>Home</h1>
";
    }

    public function getTemplateName()
    {
        return "Modules/Motor/Home/View.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'general/themes/master-frontend.twig' %} {% block body %}
<h1>Home</h1>
{% endblock body %}", "Modules/Motor/Home/View.twig", "/Users/risdyanto/projects/ramo/rajamotor/application/Modules/Motor/Home/View.twig");
    }
}
