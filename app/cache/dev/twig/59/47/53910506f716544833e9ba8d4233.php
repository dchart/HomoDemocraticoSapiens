<?php

/* HomoDemocraticoSapiensComplaintManagerBundle:Default:index.html.twig */
class __TwigTemplate_594753910506f716544833e9ba8d4233 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "010fec6_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_010fec6_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/010fec6_styles_1.css");
            // line 5
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'asset_url'), "html");
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
    ";
        } else {
            // asset "010fec6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_010fec6") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/010fec6.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'asset_url'), "html");
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
    ";
        }
        unset($context["asset_url"]);
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        echo "Registre de doléances";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "
<div id=\"complaint-manager\">
  <h1>Registre de doléances</h1>
  <div id=\"committees\">
    <h2>Commissions</h2>
  </div>
  <div id=\"complaints\">    
    <h2>Doléances</h2>
  </div>
  <div style=\"clear:left\"></div>
</div>

";
    }

    public function getTemplateName()
    {
        return "HomoDemocraticoSapiensComplaintManagerBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
