 <!-- BEGIN FOOTER.PHP -->
         </div>
      </div>
      <footer>
              
        <p style="font-size: 11px;">rog1121 & g2x3k &copy; 2011-2012 source: <a href='https://github.com/rog1121/litecoin-instawallet-simple'>Github</a> - exec: <?=round(timer()-$start,5)?> sec - Donate to: <?=$btclient->getaccountaddress($don_account);?> (recv: <?=$btclient->getbalance($don_account,0)?> DGC)</p>
      </footer>

    </div> <!-- /container -->

  </body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-9676762-2', 'nissowebs.com');
  ga('send', 'pageview');

</script>
</html>