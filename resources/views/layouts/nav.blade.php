<nav class="navbar is-light">
  <div class="navbar-brand">
    <a class="navbar-item" href="//syginteractive.com.au">ENTREZO Promotions</a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item @if ( Request::is('/') ) is-active @endif" href="/">Home</a>
      <a class="navbar-item @if ( Request::is('*enter*') ) is-active @endif" href="/enter">Enter Now</a>
      <a class="navbar-item @if ( Request::is('*faqs*') ) is-active @endif" href="/faqs">FAQs</a>
      <a class="navbar-item @if ( Request::is('*terms*') ) is-active @endif" href="/terms">Terms and Conditions</a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
            <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="" target="_blank" href="">
              <span class="icon">
                <i class="fab fa-twitter"></i>
              </span>
              <span>
                Twitter
              </span>
            </a>
          </p>
          <p class="control">
            <a class="button bd-fb-button" href="">
              <span class="icon">
                <i class="fab fa-facebook"></i>
              </span>
              <span>Facebook</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</nav>