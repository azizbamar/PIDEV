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

/* client/footer.html.twig */
class __TwigTemplate_989e55d28848106b5efc2955fec61724 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/footer.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/footer.html.twig"));

        // line 1
        echo "<!-- ======= Footer ======= -->
<footer id=\"footer\">

  <div class=\"footer-top\">
    <div class=\"container\">
      <div class=\"row\">

        <div class=\"col-lg-3 col-md-6 footer-contact\">
          <h3>Techie</h3>
          <p>
            A108 Adam Street <br>
            New York, NY 535022<br>
            United States <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>
        </div>

        <div class=\"col-lg-2 col-md-6 footer-links\">
          <h4>Useful Links</h4>
          <ul>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Home</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">About us</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Services</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Terms of service</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Privacy policy</a></li>
          </ul>
        </div>

        <div class=\"col-lg-3 col-md-6 footer-links\">
          <h4>Our Services</h4>
          <ul>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Web Design</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Web Development</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Product Management</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Marketing</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Graphic Design</a></li>
          </ul>
        </div>

        <div class=\"col-lg-4 col-md-6 footer-newsletter\">
          <h4>Join Our Newsletter</h4>
          <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          <form action=\"\" method=\"post\">
            <input type=\"email\" name=\"email\"><input type=\"submit\" value=\"Subscribe\">
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class=\"container\">

    <div class=\"copyright-wrap d-md-flex py-4\">
      <div class=\"me-md-auto text-center text-md-start\">
        <div class=\"copyright\">
          &copy; Copyright <strong><span>Techie</span></strong>. All Rights Reserved
        </div>
        <div class=\"credits\">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
          Designed by <a href=\"https://bootstrapmade.com/\">BootstrapMade</a>
        </div>
      </div>
      <div class=\"social-links text-center text-md-right pt-3 pt-md-0\">
        <a href=\"#\" class=\"twitter\"><i class=\"bx bxl-twitter\"></i></a>
        <a href=\"#\" class=\"facebook\"><i class=\"bx bxl-facebook\"></i></a>
        <a href=\"#\" class=\"instagram\"><i class=\"bx bxl-instagram\"></i></a>
        <a href=\"#\" class=\"google-plus\"><i class=\"bx bxl-skype\"></i></a>
        <a href=\"#\" class=\"linkedin\"><i class=\"bx bxl-linkedin\"></i></a>
      </div>
    </div>

  </div>
</footer><!-- End Footer -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "client/footer.html.twig";
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
        return new Source("<!-- ======= Footer ======= -->
<footer id=\"footer\">

  <div class=\"footer-top\">
    <div class=\"container\">
      <div class=\"row\">

        <div class=\"col-lg-3 col-md-6 footer-contact\">
          <h3>Techie</h3>
          <p>
            A108 Adam Street <br>
            New York, NY 535022<br>
            United States <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>
        </div>

        <div class=\"col-lg-2 col-md-6 footer-links\">
          <h4>Useful Links</h4>
          <ul>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Home</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">About us</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Services</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Terms of service</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Privacy policy</a></li>
          </ul>
        </div>

        <div class=\"col-lg-3 col-md-6 footer-links\">
          <h4>Our Services</h4>
          <ul>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Web Design</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Web Development</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Product Management</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Marketing</a></li>
            <li><i class=\"bx bx-chevron-right\"></i> <a href=\"#\">Graphic Design</a></li>
          </ul>
        </div>

        <div class=\"col-lg-4 col-md-6 footer-newsletter\">
          <h4>Join Our Newsletter</h4>
          <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          <form action=\"\" method=\"post\">
            <input type=\"email\" name=\"email\"><input type=\"submit\" value=\"Subscribe\">
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class=\"container\">

    <div class=\"copyright-wrap d-md-flex py-4\">
      <div class=\"me-md-auto text-center text-md-start\">
        <div class=\"copyright\">
          &copy; Copyright <strong><span>Techie</span></strong>. All Rights Reserved
        </div>
        <div class=\"credits\">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
          Designed by <a href=\"https://bootstrapmade.com/\">BootstrapMade</a>
        </div>
      </div>
      <div class=\"social-links text-center text-md-right pt-3 pt-md-0\">
        <a href=\"#\" class=\"twitter\"><i class=\"bx bxl-twitter\"></i></a>
        <a href=\"#\" class=\"facebook\"><i class=\"bx bxl-facebook\"></i></a>
        <a href=\"#\" class=\"instagram\"><i class=\"bx bxl-instagram\"></i></a>
        <a href=\"#\" class=\"google-plus\"><i class=\"bx bxl-skype\"></i></a>
        <a href=\"#\" class=\"linkedin\"><i class=\"bx bxl-linkedin\"></i></a>
      </div>
    </div>

  </div>
</footer><!-- End Footer -->", "client/footer.html.twig", "C:\\Users\\htc\\Downloads\\PIDEV-preProd\\PIDEV-preProd\\templates\\client\\footer.html.twig");
    }
}
