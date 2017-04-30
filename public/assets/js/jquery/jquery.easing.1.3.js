jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(t,e,n,i,o){return jQuery.easing[jQuery.easing.def](t,e,n,i,o)},easeInQuad:function(t,e,n,i,o){return i*(e/=o)*e+n},easeOutQuad:function(t,e,n,i,o){return-i*(e/=o)*(e-2)+n},easeInOutQuad:function(t,e,n,i,o){return(e/=o/2)<1?i/2*e*e+n:-i/2*(--e*(e-2)-1)+n},easeInCubic:function(t,e,n,i,o){return i*(e/=o)*e*e+n},easeOutCubic:function(t,e,n,i,o){return i*((e=e/o-1)*e*e+1)+n},easeInOutCubic:function(t,e,n,i,o){return(e/=o/2)<1?i/2*e*e*e+n:i/2*((e-=2)*e*e+2)+n},easeInQuart:function(t,e,n,i,o){return i*(e/=o)*e*e*e+n},easeOutQuart:function(t,e,n,i,o){return-i*((e=e/o-1)*e*e*e-1)+n},easeInOutQuart:function(t,e,n,i,o){return(e/=o/2)<1?i/2*e*e*e*e+n:-i/2*((e-=2)*e*e*e-2)+n},easeInQuint:function(t,e,n,i,o){return i*(e/=o)*e*e*e*e+n},easeOutQuint:function(t,e,n,i,o){return i*((e=e/o-1)*e*e*e*e+1)+n},easeInOutQuint:function(t,e,n,i,o){return(e/=o/2)<1?i/2*e*e*e*e*e+n:i/2*((e-=2)*e*e*e*e+2)+n},easeInSine:function(t,e,n,i,o){return-i*Math.cos(e/o*(Math.PI/2))+i+n},easeOutSine:function(t,e,n,i,o){return i*Math.sin(e/o*(Math.PI/2))+n},easeInOutSine:function(t,e,n,i,o){return-i/2*(Math.cos(Math.PI*e/o)-1)+n},easeInExpo:function(t,e,n,i,o){return 0==e?n:i*Math.pow(2,10*(e/o-1))+n},easeOutExpo:function(t,e,n,i,o){return e==o?n+i:i*(-Math.pow(2,-10*e/o)+1)+n},easeInOutExpo:function(t,e,n,i,o){return 0==e?n:e==o?n+i:(e/=o/2)<1?i/2*Math.pow(2,10*(e-1))+n:i/2*(-Math.pow(2,-10*--e)+2)+n},easeInCirc:function(t,e,n,i,o){return-i*(Math.sqrt(1-(e/=o)*e)-1)+n},easeOutCirc:function(t,e,n,i,o){return i*Math.sqrt(1-(e=e/o-1)*e)+n},easeInOutCirc:function(t,e,n,i,o){return(e/=o/2)<1?-i/2*(Math.sqrt(1-e*e)-1)+n:i/2*(Math.sqrt(1-(e-=2)*e)+1)+n},easeInElastic:function(t,e,n,i,o){var r=1.70158,a=0,s=i;if(0==e)return n;if(1==(e/=o))return n+i;if(a||(a=.3*o),s<Math.abs(i)){s=i;var r=a/4}else var r=a/(2*Math.PI)*Math.asin(i/s);return-(s*Math.pow(2,10*(e-=1))*Math.sin(2*(e*o-r)*Math.PI/a))+n},easeOutElastic:function(t,e,n,i,o){var r=1.70158,a=0,s=i;if(0==e)return n;if(1==(e/=o))return n+i;if(a||(a=.3*o),s<Math.abs(i)){s=i;var r=a/4}else var r=a/(2*Math.PI)*Math.asin(i/s);return s*Math.pow(2,-10*e)*Math.sin(2*(e*o-r)*Math.PI/a)+i+n},easeInOutElastic:function(t,e,n,i,o){var r=1.70158,a=0,s=i;if(0==e)return n;if(2==(e/=o/2))return n+i;if(a||(a=.3*o*1.5),s<Math.abs(i)){s=i;var r=a/4}else var r=a/(2*Math.PI)*Math.asin(i/s);return 1>e?-.5*s*Math.pow(2,10*(e-=1))*Math.sin(2*(e*o-r)*Math.PI/a)+n:s*Math.pow(2,-10*(e-=1))*Math.sin(2*(e*o-r)*Math.PI/a)*.5+i+n},easeInBack:function(t,e,n,i,o,r){return void 0==r&&(r=1.70158),i*(e/=o)*e*((r+1)*e-r)+n},easeOutBack:function(t,e,n,i,o,r){return void 0==r&&(r=1.70158),i*((e=e/o-1)*e*((r+1)*e+r)+1)+n},easeInOutBack:function(t,e,n,i,o,r){return void 0==r&&(r=1.70158),(e/=o/2)<1?i/2*e*e*(((r*=1.525)+1)*e-r)+n:i/2*((e-=2)*e*(((r*=1.525)+1)*e+r)+2)+n},easeInBounce:function(t,e,n,i,o){return i-jQuery.easing.easeOutBounce(t,o-e,0,i,o)+n},easeOutBounce:function(t,e,n,i,o){return(e/=o)<1/2.75?7.5625*i*e*e+n:2/2.75>e?i*(7.5625*(e-=1.5/2.75)*e+.75)+n:2.5/2.75>e?i*(7.5625*(e-=2.25/2.75)*e+.9375)+n:i*(7.5625*(e-=2.625/2.75)*e+.984375)+n},easeInOutBounce:function(t,e,n,i,o){return o/2>e?.5*jQuery.easing.easeInBounce(t,2*e,0,i,o)+n:.5*jQuery.easing.easeOutBounce(t,2*e-o,0,i,o)+.5*i+n}});