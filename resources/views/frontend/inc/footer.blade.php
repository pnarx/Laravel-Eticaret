
<footer class="site-footer border-top">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-3 mb-4 mb-lg-0">
          <h3 class="footer-heading mb-6">{{$settings['Site Başlık']}}</h3>
          <a href="#" class="block-6">
            <img src="{{asset('/')}}images/hero_1.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
            <h3 class="font-weight-light  mb-0">İletişim Sayfası</h3>
            <p>{{$settings['E-Mail']}}- {{$settings['Telefon']}}</p>
          </a>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="block-5 mb-5">
            <h3 class="footer-heading mb-4">İletişim</h3>
            <ul class="list-unstyled">
              <li class="address">{{$settings['Adres']}}</li>
              <li class="phone"><a href="tel://{{$settings['Telefon']}}">{{$settings['Telefon']}}</a></li>
              <li class="email">{{$settings['E-Mail']}}</li>
            </ul>
          </div>


        </div>
        <div class="col-md-4 col-lg-4">

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">İletişime Geç</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Gönder">
                </div>
              </form>
            </div>
          </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> {{$settings['Copyright']}} <i class="icon-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank" class="text-primary"></a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>

      </div>
    </div>
  </footer>
