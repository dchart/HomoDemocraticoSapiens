<?php

/* HomoDemocraticoSapiensComplaintManagerBundle:Default:index.html.twig */
class __TwigTemplate_594753910506f716544833e9ba8d4233 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Registre de doléances";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "
<h1>Registre de doléances</h1>

<div id=\"complaint-manager\">
  <div id=\"committees\">
    <h2>Commissions</h2>
  </div>
  <div id=\"complaints\">
    <h2>Doléances</h2>
  </div>
  <div style=\"clear:both\"></div>
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
