<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* client/header.html.twig */
class __TwigTemplate_c44e3e72a1ef09a45677f68a420e0e2a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/header.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/header.html.twig"));

        // line 1
        echo "<header id=\"header\" class=\"fixed-top header-inner-pages\">
    <div class=\"container d-flex align-items-center justify-content-between\">
      <h1 class=\"logo\"><a href=\"index.html\">Techie</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=\"index.html\" class=\"logo\"><img src=\"assets/img/logo.png\" alt=\"\" class=\"img-fluid\"></a>-->

      <nav id=\"navbar\" class=\"navbar\">
        <ul>
          <li><a class=\"nav-link scrollto \" href=\"#hero\">Home</a></li>
          <li><a class=\"nav-link scrollto\" href=\"#about\">About</a></li>
          <li><a class=\"nav-link scrollto\" href=\"#services\">Services</a></li>
          <li><a class=\"nav-link scrollto \" href=\"#portfolio\">Portfolio</a></li>
          <li><a class=\"nav-link scrollto\" href=\"#team\">Team</a></li>
          <li class=\"dropdown\"><a href=\"#\"><span>Drop Down</span> <i class=\"bi bi-chevron-down\"></i></a>
            <ul>
              <li><a href=\"#\">Drop Down 1</a></li>
              <li class=\"dropdown\"><a href=\"#\"><span>Deep Drop Down</span> <i class=\"bi bi-chevron-right\"></i></a>
                <ul>
                  <li><a href=\"#\">Deep Drop Down 1</a></li>
                  <li><a href=\"#\">Deep Drop Down 2</a></li>
                  <li><a href=\"#\">Deep Drop Down 3</a></li>
                  <li><a href=\"#\">Deep Drop Down 4</a></li>
                  <li><a href=\"#\">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href=\"#\">Drop Down 2</a></li>
              <li><a href=\"#\">Drop Down 3</a></li>
              <li><a href=\"#\">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class=\"nav-link scrollto\" href=\"#contact\">Contact</a></li>
          <li><a class=\"getstarted scrollto\" href=\"#about\">Get Started</a></li>
        </ul>
        <i class=\"bi bi-list mobile-nav-toggle\"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "client/header.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header id=\"header\" class=\"fixed-top header-inner-pages\">
    <div class=\"container d-flex align-items-center justify-content-between\">
      <h1 class=\"logo\"><a href=\"index.html\">Techie</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=\"index.html\" class=\"logo\"><img src=\"assets/img/logo.png\" alt=\"\" class=\"img-fluid\"></a>-->

      <nav id=\"navbar\" class=\"navbar\">
        <ul>
          <li><a class=\"nav-link scrollto \" href=\"#hero\">Home</a></li>
          <li><a class=\"nav-link scrollto\" href=\"#about\">About</a></li>
          <li><a class=\"nav-link scrollto\" href=\"#services\">Services</a></li>
          <li><a class=\"nav-link scrollto \" href=\"#portfolio\">Portfolio</a></li>
          <li><a class=\"nav-link scrollto\" href=\"#team\">Team</a></li>
          <li class=\"dropdown\"><a href=\"#\"><span>Drop Down</span> <i class=\"bi bi-chevron-down\"></i></a>
            <ul>
              <li><a href=\"#\">Drop Down 1</a></li>
              <li class=\"dropdown\"><a href=\"#\"><span>Deep Drop Down</span> <i class=\"bi bi-chevron-right\"></i></a>
                <ul>
                  <li><a href=\"#\">Deep Drop Down 1</a></li>
                  <li><a href=\"#\">Deep Drop Down 2</a></li>
                  <li><a href=\"#\">Deep Drop Down 3</a></li>
                  <li><a href=\"#\">Deep Drop Down 4</a></li>
                  <li><a href=\"#\">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href=\"#\">Drop Down 2</a></li>
              <li><a href=\"#\">Drop Down 3</a></li>
              <li><a href=\"#\">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class=\"nav-link scrollto\" href=\"#contact\">Contact</a></li>
          <li><a class=\"getstarted scrollto\" href=\"#about\">Get Started</a></li>
        </ul>
        <i class=\"bi bi-list mobile-nav-toggle\"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->", "client/header.html.twig", "C:\\Users\\htc\\Downloads\\PIDEV-preProd\\PIDEV-preProd\\templates\\client\\header.html.twig");
    }
}
