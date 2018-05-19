<?php

/* general/themes/master-frontend.twig */
class __TwigTemplate_271fd51f44cfc526ee05cfc06818b02fd4d4e903aaa0c8f86d546f7d99ee3688 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "<!DOCTYPE html>
<html lang=\"id\" itemscope itemtype=\"http://schema.org/Product\">

<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"> ";
        // line 7
        echo twig_get_attribute($this->env, $this->source, ($context["meta"] ?? null), "seo", array());
        echo "
    <link rel=\"icon\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/images/logo/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/css/main-framework.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/css/main-style.css\"> ";
        echo ($context["added_css"] ?? null);
        echo "
</head>

<body>
    <div class=\"overlay-body\"></div>
    <div class=\"overlay-menu\"></div>
    ";
        // line 16
        $this->loadTemplate("general/themes/header.twig", "general/themes/master-frontend.twig", 16)->display($context);
        // line 17
        echo "    <main>
        ";
        // line 18
        $this->displayBlock('body', $context, $blocks);
        // line 19
        echo "    </main>
    ";
        // line 20
        $this->loadTemplate("general/themes/footer.twig", "general/themes/master-frontend.twig", 20)->display($context);
        // line 21
        echo "</body>
<script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"></script>
<script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/js/main-framework.js\"></script>
";
        // line 24
        echo ($context["added_script"] ?? null);
        echo "

</html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "general/themes/master-frontend.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 18,  76 => 24,  72 => 23,  68 => 21,  66 => 20,  63 => 19,  61 => 18,  58 => 17,  56 => 16,  45 => 10,  41 => 9,  37 => 8,  33 => 7,  26 => 2,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% spaceless %}
<!DOCTYPE html>
<html lang=\"id\" itemscope itemtype=\"http://schema.org/Product\">

<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"> {{ meta.seo | raw }}
    <link rel=\"icon\" href=\"{{ base_url() }}/assets/images/logo/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"stylesheet\" href=\"{{ base_url() }}/assets/css/main-framework.css\">
    <link rel=\"stylesheet\" href=\"{{ base_url() }}/assets/css/main-style.css\"> {{ added_css | raw }}
</head>

<body>
    <div class=\"overlay-body\"></div>
    <div class=\"overlay-menu\"></div>
    {% include 'general/themes/header.twig' %}
    <main>
        {% block body %}{% endblock body%}
    </main>
    {% include 'general/themes/footer.twig' %}
</body>
<script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"></script>
<script src=\"{{ base_url() }}/assets/js/main-framework.js\"></script>
{{ added_script | raw }}

</html>
{% endspaceless %}", "general/themes/master-frontend.twig", "/Users/risdyanto/projects/ramo/rajamotor/application/general/themes/master-frontend.twig");
    }
}
