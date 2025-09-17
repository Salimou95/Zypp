// Gestion nav fixe jusqu'à la fin de la première section
(function(){
  function initStickyUntilFirstSectionEnd(){
    var nav = document.querySelector('.navbar');
    if(!nav) return;
    // première section après la nav
    var firstSection = nav.nextElementSibling && nav.nextElementSibling.tagName.toLowerCase()==='section'
        ? nav.nextElementSibling
        : document.querySelector('main section, body > section');
    if(!firstSection) return; // rien à faire

    function applyFixed(){
      if(!nav.classList.contains('navbar-fixed')){
        nav.classList.add('navbar-fixed');
        document.body.classList.add('has-fixed-nav');
        document.body.style.setProperty('--nav-height', nav.offsetHeight + 'px');
        document.body.style.paddingTop = nav.offsetHeight + 'px';
      }
    }
    function removeFixed(){
      if(nav.classList.contains('navbar-fixed')){
        nav.classList.remove('navbar-fixed');
        document.body.classList.remove('has-fixed-nav');
        document.body.style.paddingTop='';
      }
    }

    function update(){
      var rect = firstSection.getBoundingClientRect();
      // tant que bas de la première section est visible ( > 0 ), on fixe
      if(rect.bottom > 0){
        applyFixed();
      } else {
        removeFixed();
      }
    }
    window.addEventListener('scroll', update, {passive:true});
    window.addEventListener('resize', update);
    // init
    applyFixed();
    update();
  }
  if(document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', initStickyUntilFirstSectionEnd);
  } else {
    initStickyUntilFirstSectionEnd();
  }
})();
