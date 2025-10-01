(function(){
  const hamburger = document.getElementById('hamburger');
  if (hamburger) hamburger.addEventListener('click', ()=>document.body.classList.toggle('mobile-open'));
})();
// Cookie banner logic
(function(){
  function ready(fn){ if(document.readyState!='loading'){fn()} else document.addEventListener('DOMContentLoaded', fn) }
  ready(function(){
    var k='demiri_cookies_ok';
    if(!localStorage.getItem(k)){
      var b=document.createElement('div');
      b.className='cookie-banner';
      b.innerHTML='<div>We use cookies for essential site functions and to improve your experience. See our <a href="/cookie-policy">Cookie Policy</a>.</div><div class="actions"><button class="accept">Accept</button><button class="decline">No thanks</button></div>';
      document.body.appendChild(b);
      b.style.display='block';
      b.querySelector('.accept').addEventListener('click', function(){localStorage.setItem(k,'1'); b.remove();});
      b.querySelector('.decline').addEventListener('click', function(){ b.remove(); });
    }
  })
})();