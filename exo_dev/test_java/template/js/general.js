'use strict';
var isMobile = false;
var isTablet = false;
var isDesktop = false;


function detectdevice() {
    if (navigator.userAgent.match(/Tablet/i)) {
        isTablet = true;
    } else if (navigator.userAgent.match(/Mobile|Phone/i)) {
        isMobile = true;
    } else {
        isDesktop = true;
    }

}
/*function detectdevice () {
  if ((screen.width <= 800  ) &&
    (screen.height <= 1024 )
)
  {
    isTablet = true;
  } if (isTablet == true && (screen.width <= 420) &&(screen.height <=700)){
    isMobile = true;
    isTablet = false;


  }else {
    isDesktop = true;
  }
}*/
detectdevice();
document.write(screen.width + 'x' + screen.height);
document.write(isTablet);
document.write(isMobile);
document.write(isDesktop);