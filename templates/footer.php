 <!-- BEGIN FOOTER.PHP -->
         </div>
      </div>
      <footer>
        <div class="bottom-ad"><p><img src="http://i1210.photobucket.com/albums/cc408/ninjapotamuspics/banner.png" width="100%" height="100%"></p></div>
        <p style="font-size: 11px;">rog1121 & g2x3k &copy; 2011-2012 source: <a href='https://github.com/rog1121/litecoin-instawallet-simple'>Github</a> - exec: <?=round(timer()-$start,5)?> sec - Donate to: <?=$btclient->getaccountaddress($don_account);?> (recv: <?=$btclient->getbalance($don_account,0)?> DOGE)</p>
      </footer>

    </div> <!-- /container -->

  </body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-9676762-3', 'instadoge.com');
  ga('send', 'pageview');

</script>
</html>