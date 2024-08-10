<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4 justify-content-center">
        <div class="col-lg-4 col-md-12 footer-about">
          <a href="/" class="logo d-flex align-items-center">
            {{-- <span class="sitename">Append</span> --}}
            <img src="{{ asset('logo.png') }}" alt="" class="logo">
          </a>
          <p>Welcome to our education office where learning and faith converge. We are dedicated to nurturing minds and spirits through quality education rooted in Christian values.</p>

          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>Catholic Diocesan Secretariat Nnewi.</p>
          <p>Nnewi, Anambra State.</p>
          <p>Nigeria.</p>
          <p class="mt-4"><strong>Phone:</strong> <span>
            08030996195</span></p>
          <p><strong>Email:</strong> <span>eduservicescatholicdiocesnnewi@gmail.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="sitename">{{ config('app.name') }}</strong> <span>All Rights Reserved</span></p>

    </div>

  </footer>
