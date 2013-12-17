 <!-- BEGIN FOOTER.PHP -->
         </div>
      </div>
      <footer>
        <p style="font-size: 11px;">rog1121 & g2x3k &copy; 2011-2012 source: <a href='https://github.com/rog1121/litecoin-instawallet-simple'>Github</a> - exec: <?=round(timer()-$start,5)?> sec - Donate to: <?=$btclient->getaccountaddress($don_account);?> (recv: <?=$btclient->getbalance($don_account,0)?> DOGE)</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>