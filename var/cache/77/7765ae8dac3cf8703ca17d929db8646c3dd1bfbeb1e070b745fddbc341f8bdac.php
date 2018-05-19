<?php

/* general/themes/footer.twig */
class __TwigTemplate_0ebe5045f220cdd39dbea0d535e827bd1266851a02fc31a975723ec108b0e191 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('footer', $context, $blocks);
    }

    public function block_footer($context, array $blocks = array())
    {
        // line 2
        echo "<footer id=\"footer\">

</footer>
";
    }

    public function getTemplateName()
    {
        return "general/themes/footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  30 => 2,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block footer %}
<footer id=\"footer\">

</footer>
{% endblock %}", "general/themes/footer.twig", "/Users/risdyanto/projects/ramo/rajamotor/application/general/themes/footer.twig");
    }
}
