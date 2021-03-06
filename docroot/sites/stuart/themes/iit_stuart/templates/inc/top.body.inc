<!-- Quantcast Tag -->
<script type="text/javascript">
var _qevents = _qevents || [];
 
(function() {
  var elem = document.createElement('script');
  elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
  elem.async = true;
  elem.type = "text/javascript";
  var scpt = document.getElementsByTagName('script')[0];
  scpt.parentNode.insertBefore(elem, scpt);
})();
 
function p2l(pathname,query,hash){
  pathname = pathname.replace(/\//gi,"-slash-")
  if(pathname === "-slash-") {
    pathname = "homepage";
  }
  pathname = pathname.replace(/\./gi,"_");
  query = query.replace(/\?/gi,'-');
  params = query.split('&');
  args = []
  for(arg = 0; arg < params.length; arg++){
    args.push(params[arg].split('=')[0]);
  }
  pathname += args.join('-');
  pathname += hash.replace(/#/gi,"-");
  return pathname;
};
 
_qevents.push({
  qacct:"p-ssR0DC5-0B2AE",
  labels: "_fp.event." + p2l(document.location.pathname,
  document.location.search, document.location.hash)
});
</script>
 
<noscript>
  <div style="display:none;">
    <img src="//pixel.quantserve.com/pixel/p-ssR0DC5-0B2AE.gif" border="0" height="1" width="1" alt="Quantcast"/>
  </div>
</noscript>
<!-- End Quantcast tag -->