/*!
 * Font Awesome Free 5.0.13 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */
!function(){"use strict";var t=function(){},e={},n={},i=null,r={mark:t,measure:t};try{"undefined"!=typeof window&&(e=window),"undefined"!=typeof document&&(n=document),"undefined"!=typeof MutationObserver&&(i=MutationObserver),"undefined"!=typeof performance&&(r=performance)}catch(t){}var a=(e.navigator||{}).userAgent,o=void 0===a?"":a,s=e,c=n,f=i,l=r,u=!!s.document,m=!!c.documentElement&&!!c.head&&"function"==typeof c.addEventListener&&"function"==typeof c.createElement,k=~o.indexOf("MSIE")||~o.indexOf("Trident/"),d="___FONT_AWESOME___",z=16,g="svg-inline--fa",C="data-fa-i2svg",h="data-fa-pseudo-element",p="fontawesome-i2svg",v=function(){try{return!0}catch(t){return!1}}(),b=[1,2,3,4,5,6,7,8,9,10],y=b.concat([11,12,13,14,15,16,17,18,19,20]),w=["class","data-prefix","data-icon","data-fa-transform","data-fa-mask"],x=["xs","sm","lg","fw","ul","li","border","pull-left","pull-right","spin","pulse","rotate-90","rotate-180","rotate-270","flip-horizontal","flip-vertical","stack","stack-1x","stack-2x","inverse","layers","layers-text","layers-counter"].concat(b.map(function(t){return t+"x"})).concat(y.map(function(t){return"w-"+t})),N=function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")},A=function(){function i(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(t,e,n){return e&&i(t.prototype,e),n&&i(t,n),t}}(),O=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var i in n)Object.prototype.hasOwnProperty.call(n,i)&&(t[i]=n[i])}return t},M=function(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return Array.from(t)},L=s.FontAwesomeConfig||{},E=Object.keys(L),j=O({familyPrefix:"fa",replacementClass:g,autoReplaceSvg:!0,autoAddCss:!0,autoA11y:!0,searchPseudoElements:!1,observeMutations:!0,keepOriginalSource:!0,measurePerformance:!1,showMissingIcons:!0},L);j.autoReplaceSvg||(j.observeMutations=!1);var S=O({},j);function P(e){var t=(1<arguments.length&&void 0!==arguments[1]?arguments[1]:{}).asNewDefault,n=void 0!==t&&t,i=Object.keys(S),r=n?function(t){return~i.indexOf(t)&&!~E.indexOf(t)}:function(t){return~i.indexOf(t)};Object.keys(e).forEach(function(t){r(t)&&(S[t]=e[t])})}s.FontAwesomeConfig=S;var T=s||{};T[d]||(T[d]={}),T[d].styles||(T[d].styles={}),T[d].hooks||(T[d].hooks={}),T[d].shims||(T[d].shims=[]);var R=T[d],H=[],F=!1;m&&((F=(c.documentElement.doScroll?/^loaded|^c/:/^loaded|^i|^c/).test(c.readyState))||c.addEventListener("DOMContentLoaded",function t(){c.removeEventListener("DOMContentLoaded",t),F=1,H.map(function(t){return t()})}));var I=function(t){m&&(F?setTimeout(t,0):H.push(t))},_=z,B={size:16,x:0,y:0,rotate:0,flipX:!1,flipY:!1};function D(t){if(t&&m){var e=c.createElement("style");e.setAttribute("type","text/css"),e.innerHTML=t;for(var n=c.head.childNodes,i=null,r=n.length-1;-1<r;r--){var a=n[r],o=(a.tagName||"").toUpperCase();-1<["STYLE","LINK"].indexOf(o)&&(i=a)}return c.head.insertBefore(e,i),t}}var W=0;function X(){return++W}function Y(t){for(var e=[],n=(t||[]).length>>>0;n--;)e[n]=t[n];return e}function U(t){return t.classList?Y(t.classList):(t.getAttribute("class")||"").split(" ").filter(function(t){return t})}function V(t,e){var n,i=e.split("-"),r=i[0],a=i.slice(1).join("-");return r!==t||""===a||(n=a,~x.indexOf(n))?null:a}function q(t){return(""+t).replace(/&/g,"&amp;").replace(/"/g,"&quot;").replace(/'/g,"&#39;").replace(/</g,"&lt;").replace(/>/g,"&gt;")}function K(n){return Object.keys(n||{}).reduce(function(t,e){return t+(e+": ")+n[e]+";"},"")}function G(t){return t.size!==B.size||t.x!==B.x||t.y!==B.y||t.rotate!==B.rotate||t.flipX||t.flipY}function J(t){var e=t.transform,n=t.containerWidth,i=t.iconWidth;return{outer:{transform:"translate("+n/2+" 256)"},inner:{transform:"translate("+32*e.x+", "+32*e.y+") "+" "+("scale("+e.size/16*(e.flipX?-1:1)+", "+e.size/16*(e.flipY?-1:1)+") ")+" "+("rotate("+e.rotate+" 0 0)")},path:{transform:"translate("+i/2*-1+" -256)"}}}var Q={x:0,y:0,width:"100%",height:"100%"},Z=function(t){var e=t.children,n=t.attributes,i=t.main,r=t.mask,a=t.transform,o=i.width,s=i.icon,f=r.width,l=r.icon,c=J({transform:a,containerWidth:f,iconWidth:o}),u={tag:"rect",attributes:O({},Q,{fill:"white"})},m={tag:"g",attributes:O({},c.inner),children:[{tag:"path",attributes:O({},s.attributes,c.path,{fill:"black"})}]},d={tag:"g",attributes:O({},c.outer),children:[m]},g="mask-"+X(),h="clip-"+X(),p={tag:"defs",children:[{tag:"clipPath",attributes:{id:h},children:[l]},{tag:"mask",attributes:O({},Q,{id:g,maskUnits:"userSpaceOnUse",maskContentUnits:"userSpaceOnUse"}),children:[u,d]}]};return e.push(p,{tag:"rect",attributes:O({fill:"currentColor","clip-path":"url(#"+h+")",mask:"url(#"+g+")"},Q)}),{children:e,attributes:n}},$=function(t){var e=t.children,n=t.attributes,i=t.main,r=t.transform,a=K(t.styles);if(0<a.length&&(n.style=a),G(r)){var o=J({transform:r,containerWidth:i.width,iconWidth:i.width});e.push({tag:"g",attributes:O({},o.outer),children:[{tag:"g",attributes:O({},o.inner),children:[{tag:i.icon.tag,children:i.icon.children,attributes:O({},i.icon.attributes,o.path)}]}]})}else e.push(i.icon);return{children:e,attributes:n}},tt=function(t){var e=t.children,n=t.main,i=t.mask,r=t.attributes,a=t.styles,o=t.transform;if(G(o)&&n.found&&!i.found){var s=n.width/n.height/2,f=.5;r.style=K(O({},a,{"transform-origin":s+o.x/16+"em "+(f+o.y/16)+"em"}))}return[{tag:"svg",attributes:r,children:e}]},et=function(t){var e=t.prefix,n=t.iconName,i=t.children,r=t.attributes,a=t.symbol,o=!0===a?e+"-"+S.familyPrefix+"-"+n:a;return[{tag:"svg",attributes:{style:"display: none;"},children:[{tag:"symbol",attributes:O({},r,{id:o}),children:i}]}]};function nt(t){var e=t.icons,n=e.main,i=e.mask,r=t.prefix,a=t.iconName,o=t.transform,s=t.symbol,f=t.title,l=t.extra,c=t.watchable,u=void 0!==c&&c,m=i.found?i:n,d=m.width,g=m.height,h="fa-w-"+Math.ceil(d/g*16),p=[S.replacementClass,a?S.familyPrefix+"-"+a:"",h].concat(l.classes).join(" "),v={children:[],attributes:O({},l.attributes,{"data-prefix":r,"data-icon":a,class:p,role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 "+d+" "+g})};u&&(v.attributes[C]=""),f&&v.children.push({tag:"title",attributes:{id:v.attributes["aria-labelledby"]||"title-"+X()},children:[f]});var b=O({},v,{prefix:r,iconName:a,main:n,mask:i,transform:o,symbol:s,styles:l.styles}),y=i.found&&n.found?Z(b):$(b),w=y.children,x=y.attributes;return b.children=w,b.attributes=x,s?et(b):tt(b)}function it(t){var e=t.content,n=t.width,i=t.height,r=t.transform,a=t.title,o=t.extra,s=t.watchable,f=void 0!==s&&s,l=O({},o.attributes,a?{title:a}:{},{class:o.classes.join(" ")});f&&(l[C]="");var c,u,m,d,g,h,p,v,b,y=O({},o.styles);G(r)&&(y.transform=(u=(c={transform:r,startCentered:!0,width:n,height:i}).transform,m=c.width,d=void 0===m?z:m,g=c.height,h=void 0===g?z:g,p=c.startCentered,b="",b+=(v=void 0!==p&&p)&&k?"translate("+(u.x/_-d/2)+"em, "+(u.y/_-h/2)+"em) ":v?"translate(calc(-50% + "+u.x/_+"em), calc(-50% + "+u.y/_+"em)) ":"translate("+u.x/_+"em, "+u.y/_+"em) ",b+="scale("+u.size/_*(u.flipX?-1:1)+", "+u.size/_*(u.flipY?-1:1)+") ",b+="rotate("+u.rotate+"deg) "),y["-webkit-transform"]=y.transform);var w=K(y);0<w.length&&(l.style=w);var x=[];return x.push({tag:"span",attributes:l,children:[e]}),a&&x.push({tag:"span",attributes:{class:"sr-only"},children:[a]}),x}var rt=function(){},at=S.measurePerformance&&l&&l.mark&&l.measure?l:{mark:rt,measure:rt},ot='FA "5.0.13"',st=function(t){at.mark(ot+" "+t+" ends"),at.measure(ot+" "+t,ot+" "+t+" begins",ot+" "+t+" ends")},ft={begin:function(t){return at.mark(ot+" "+t+" begins"),function(){return st(t)}},end:st},lt=function(t,e,n,i){var r,a,o,s,f,l=Object.keys(t),c=l.length,u=void 0!==i?(s=e,f=i,function(t,e,n,i){return s.call(f,t,e,n,i)}):e;for(void 0===n?(r=1,o=t[l[0]]):(r=0,o=n);r<c;r++)o=u(o,t[a=l[r]],a,t);return o},ct=R.styles,ut=R.shims,mt={},dt={},gt={},ht=function(){var t=function(i){return lt(ct,function(t,e,n){return t[n]=lt(e,i,{}),t},{})};mt=t(function(t,e,n){return t[e[3]]=n,t}),dt=t(function(e,t,n){var i=t[2];return e[n]=n,i.forEach(function(t){e[t]=n}),e});var a="far"in ct;gt=lt(ut,function(t,e){var n=e[0],i=e[1],r=e[2];return"far"!==i||a||(i="fas"),t[n]={prefix:i,iconName:r},t},{})};ht();var pt=R.styles,vt=function(){return{prefix:null,iconName:null,rest:[]}};function bt(t){return t.reduce(function(t,e){var n=V(S.familyPrefix,e);if(pt[e])t.prefix=e;else if(n){var i="fa"===t.prefix?gt[n]||{prefix:null,iconName:null}:{};t.iconName=i.iconName||n,t.prefix=i.prefix||t.prefix}else e!==S.replacementClass&&0!==e.indexOf("fa-w-")&&t.rest.push(e);return t},vt())}function yt(t,e,n){if(t&&t[e]&&t[e][n])return{prefix:e,iconName:n,icon:t[e][n]}}function wt(t){var n,e=t.tag,i=t.attributes,r=void 0===i?{}:i,a=t.children,o=void 0===a?[]:a;return"string"==typeof t?q(t):"<"+e+" "+(n=r,Object.keys(n||{}).reduce(function(t,e){return t+(e+'="')+q(n[e])+'" '},"").trim())+">"+o.map(wt).join("")+"</"+e+">"}var xt=function(){};function kt(t){return"string"==typeof(t.getAttribute?t.getAttribute(C):null)}var zt={replace:function(t){var e=t[0],n=t[1].map(function(t){return wt(t)}).join("\n");if(e.parentNode&&e.outerHTML)e.outerHTML=n+(S.keepOriginalSource&&"svg"!==e.tagName.toLowerCase()?"\x3c!-- "+e.outerHTML+" --\x3e":"");else if(e.parentNode){var i=document.createElement("span");e.parentNode.replaceChild(i,e),i.outerHTML=n}},nest:function(t){var e=t[0],n=t[1];if(~U(e).indexOf(S.replacementClass))return zt.replace(t);var i=new RegExp(S.familyPrefix+"-.*");delete n[0].attributes.style;var r=n[0].attributes.class.split(" ").reduce(function(t,e){return e===S.replacementClass||e.match(i)?t.toSvg.push(e):t.toNode.push(e),t},{toNode:[],toSvg:[]});n[0].attributes.class=r.toSvg.join(" ");var a=n.map(function(t){return wt(t)}).join("\n");e.setAttribute("class",r.toNode.join(" ")),e.setAttribute(C,""),e.innerHTML=a}};function Ct(n,t){var i="function"==typeof t?t:xt;0===n.length?i():(s.requestAnimationFrame||function(t){return t()})(function(){var t=!0===S.autoReplaceSvg?zt.replace:zt[S.autoReplaceSvg]||zt.replace,e=ft.begin("mutate");n.map(t),e(),i()})}var Nt=!1;var At=null;var Ot=function(t){var e=t.getAttribute("style"),n=[];return e&&(n=e.split(";").reduce(function(t,e){var n=e.split(":"),i=n[0],r=n.slice(1);return i&&0<r.length&&(t[i]=r.join(":").trim()),t},{})),n};var Mt=function(t){var e,n,i,r,a=t.getAttribute("data-prefix"),o=t.getAttribute("data-icon"),s=void 0!==t.innerText?t.innerText.trim():"",f=bt(U(t));return a&&o&&(f.prefix=a,f.iconName=o),f.prefix&&1<s.length?f.iconName=(i=f.prefix,r=t.innerText,dt[i][r]):f.prefix&&1===s.length&&(f.iconName=(e=f.prefix,n=function(t){for(var e="",n=0;n<t.length;n++)e+=("000"+t.charCodeAt(n).toString(16)).slice(-4);return e}(t.innerText),mt[e][n])),f},Lt=function(t){var e={size:16,x:0,y:0,flipX:!1,flipY:!1,rotate:0};return t?t.toLowerCase().split(" ").reduce(function(t,e){var n=e.toLowerCase().split("-"),i=n[0],r=n.slice(1).join("-");if(i&&"h"===r)return t.flipX=!0,t;if(i&&"v"===r)return t.flipY=!0,t;if(r=parseFloat(r),isNaN(r))return t;switch(i){case"grow":t.size=t.size+r;break;case"shrink":t.size=t.size-r;break;case"left":t.x=t.x-r;break;case"right":t.x=t.x+r;break;case"up":t.y=t.y-r;break;case"down":t.y=t.y+r;break;case"rotate":t.rotate=t.rotate+r}return t},e):e},Et=function(t){return Lt(t.getAttribute("data-fa-transform"))},jt=function(t){var e=t.getAttribute("data-fa-symbol");return null!==e&&(""===e||e)},St=function(t){var e=Y(t.attributes).reduce(function(t,e){return"class"!==t.name&&"style"!==t.name&&(t[e.name]=e.value),t},{}),n=t.getAttribute("title");return S.autoA11y&&(n?e["aria-labelledby"]=S.replacementClass+"-title-"+X():e["aria-hidden"]="true"),e},Pt=function(t){var e=t.getAttribute("data-fa-mask");return e?bt(e.split(" ").map(function(t){return t.trim()})):vt()};function Tt(t){this.name="MissingIcon",this.message=t||"Icon unavailable",this.stack=(new Error).stack}(Tt.prototype=Object.create(Error.prototype)).constructor=Tt;var Rt={fill:"currentColor"},Ht={attributeType:"XML",repeatCount:"indefinite",dur:"2s"},Ft={tag:"path",attributes:O({},Rt,{d:"M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z"})},It=O({},Ht,{attributeName:"opacity"}),_t={tag:"g",children:[Ft,{tag:"circle",attributes:O({},Rt,{cx:"256",cy:"364",r:"28"}),children:[{tag:"animate",attributes:O({},Ht,{attributeName:"r",values:"28;14;28;28;14;28;"})},{tag:"animate",attributes:O({},It,{values:"1;0;1;1;0;1;"})}]},{tag:"path",attributes:O({},Rt,{opacity:"1",d:"M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z"}),children:[{tag:"animate",attributes:O({},It,{values:"1;0;0;0;0;1;"})}]},{tag:"path",attributes:O({},Rt,{opacity:"0",d:"M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z"}),children:[{tag:"animate",attributes:O({},It,{values:"0;0;1;1;0;0;"})}]}]},Bt=R.styles,Dt="fa-layers-text",Wt=/Font Awesome 5 (Solid|Regular|Light|Brands)/,Xt={Solid:"fas",Regular:"far",Light:"fal",Brands:"fab"};function Yt(t,e){var n={found:!1,width:512,height:512,icon:_t};if(t&&e&&Bt[e]&&Bt[e][t]){var i=Bt[e][t];n={found:!0,width:i[0],height:i[1],icon:{tag:"path",attributes:{fill:"currentColor",d:i.slice(4)[0]}}}}else if(t&&e&&!S.showMissingIcons)throw new Tt("Icon is missing for prefix "+e+" with icon name "+t);return n}function Ut(t){var e,n,i,r,a,o,s,f,l,c,u,m,d,g,h,p,v,b,y,w=(n=Mt(e=t),i=n.iconName,r=n.prefix,a=n.rest,o=Ot(e),s=Et(e),f=jt(e),l=St(e),c=Pt(e),{iconName:i,title:e.getAttribute("title"),prefix:r,transform:s,symbol:f,mask:c,extra:{classes:a,styles:o,attributes:l}});return~w.extra.classes.indexOf(Dt)?function(t,e){var n=e.title,i=e.transform,r=e.extra,a=null,o=null;if(k){var s=parseInt(getComputedStyle(t).fontSize,10),f=t.getBoundingClientRect();a=f.width/s,o=f.height/s}return S.autoA11y&&!n&&(r.attributes["aria-hidden"]="true"),[t,it({content:t.innerHTML,width:a,height:o,transform:i,title:n,extra:r,watchable:!0})]}(t,w):(u=t,d=(m=w).iconName,g=m.title,h=m.prefix,p=m.transform,v=m.symbol,b=m.mask,y=m.extra,[u,nt({icons:{main:Yt(d,h),mask:Yt(b.iconName,b.prefix)},prefix:h,iconName:d,transform:p,symbol:v,mask:b,title:g,extra:y,watchable:!0})])}function Vt(t){"function"==typeof t.remove?t.remove():t&&t.parentNode&&t.parentNode.removeChild(t)}function qt(t){if(m){var e=ft.begin("searchPseudoElements");Nt=!0,function(){Y(t.querySelectorAll("*")).forEach(function(o){[":before",":after"].forEach(function(e){var t=s.getComputedStyle(o,e),n=t.getPropertyValue("font-family").match(Wt),i=Y(o.children).filter(function(t){return t.getAttribute(h)===e})[0];if(i&&(i.nextSibling&&-1<i.nextSibling.textContent.indexOf(h)&&Vt(i.nextSibling),Vt(i),i=null),n&&!i){var r=t.getPropertyValue("content"),a=c.createElement("i");a.setAttribute("class",""+Xt[n[1]]),a.setAttribute(h,e),a.innerText=3===r.length?r.substr(1,1):r,":before"===e?o.insertBefore(a,o.firstChild):o.appendChild(a)}})})}(),Nt=!1,e()}}function Kt(t){var e=1<arguments.length&&void 0!==arguments[1]?arguments[1]:null;if(m){var n=c.documentElement.classList,i=function(t){return n.add(p+"-"+t)},r=function(t){return n.remove(p+"-"+t)},a=Object.keys(Bt),o=["."+Dt+":not(["+C+"])"].concat(a.map(function(t){return"."+t+":not(["+C+"])"})).join(", ");if(0!==o.length){var s=Y(t.querySelectorAll(o));if(0<s.length){i("pending"),r("complete");var f=ft.begin("onTree"),l=s.reduce(function(t,e){try{var n=Ut(e);n&&t.push(n)}catch(t){v||t instanceof Tt&&console.error(t)}return t},[]);f(),Ct(l,function(){i("active"),i("complete"),r("pending"),"function"==typeof e&&e()})}}}}function Gt(t){var e=1<arguments.length&&void 0!==arguments[1]?arguments[1]:null,n=Ut(t);n&&Ct([n],e)}var Jt=function(){var t=g,e=S.familyPrefix,n=S.replacementClass,i="svg:not(:root).svg-inline--fa{overflow:visible}.svg-inline--fa{display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em}.svg-inline--fa.fa-lg{vertical-align:-.225em}.svg-inline--fa.fa-w-1{width:.0625em}.svg-inline--fa.fa-w-2{width:.125em}.svg-inline--fa.fa-w-3{width:.1875em}.svg-inline--fa.fa-w-4{width:.25em}.svg-inline--fa.fa-w-5{width:.3125em}.svg-inline--fa.fa-w-6{width:.375em}.svg-inline--fa.fa-w-7{width:.4375em}.svg-inline--fa.fa-w-8{width:.5em}.svg-inline--fa.fa-w-9{width:.5625em}.svg-inline--fa.fa-w-10{width:.625em}.svg-inline--fa.fa-w-5{width:.6875em}.svg-inline--fa.fa-w-12{width:.75em}.svg-inline--fa.fa-w-13{width:.8125em}.svg-inline--fa.fa-w-14{width:.875em}.svg-inline--fa.fa-w-15{width:.9375em}.svg-inline--fa.fa-w-16{width:1em}.svg-inline--fa.fa-w-17{width:1.0625em}.svg-inline--fa.fa-w-18{width:1.125em}.svg-inline--fa.fa-w-19{width:1.1875em}.svg-inline--fa.fa-w-20{width:1.25em}.svg-inline--fa.fa-pull-left{margin-right:.3em;width:auto}.svg-inline--fa.fa-pull-right{margin-left:.3em;width:auto}.svg-inline--fa.fa-border{height:1.5em}.svg-inline--fa.fa-li{width:2em}.svg-inline--fa.fa-fw{width:1.25em}.fa-layers svg.svg-inline--fa{bottom:0;left:0;margin:auto;position:absolute;right:0;top:0}.fa-layers{display:inline-block;height:1em;position:relative;text-align:center;vertical-align:-.125em;width:1em}.fa-layers svg.svg-inline--fa{-webkit-transform-origin:center center;transform-origin:center center}.fa-layers-counter,.fa-layers-text{display:inline-block;position:absolute;text-align:center}.fa-layers-text{left:50%;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-transform-origin:center center;transform-origin:center center}.fa-layers-counter{background-color:#ff253a;border-radius:1em;-webkit-box-sizing:border-box;box-sizing:border-box;color:#fff;height:1.5em;line-height:1;max-width:5em;min-width:1.5em;overflow:hidden;padding:.25em;right:0;text-overflow:ellipsis;top:0;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:top right;transform-origin:top right}.fa-layers-bottom-right{bottom:0;right:0;top:auto;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:bottom right;transform-origin:bottom right}.fa-layers-bottom-left{bottom:0;left:0;right:auto;top:auto;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:bottom left;transform-origin:bottom left}.fa-layers-top-right{right:0;top:0;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:top right;transform-origin:top right}.fa-layers-top-left{left:0;right:auto;top:0;-webkit-transform:scale(.25);transform:scale(.25);-webkit-transform-origin:top left;transform-origin:top left}.fa-lg{font-size:1.33333em;line-height:.75em;vertical-align:-.0667em}.fa-xs{font-size:.75em}.fa-sm{font-size:.875em}.fa-1x{font-size:1em}.fa-2x{font-size:2em}.fa-3x{font-size:3em}.fa-4x{font-size:4em}.fa-5x{font-size:5em}.fa-6x{font-size:6em}.fa-7x{font-size:7em}.fa-8x{font-size:8em}.fa-9x{font-size:9em}.fa-10x{font-size:10em}.fa-fw{text-align:center;width:1.25em}.fa-ul{list-style-type:none;margin-left:2.5em;padding-left:0}.fa-ul>li{position:relative}.fa-li{left:-2em;position:absolute;text-align:center;width:2em;line-height:inherit}.fa-border{border:solid .08em #eee;border-radius:.1em;padding:.2em .25em .15em}.fa-pull-left{float:left}.fa-pull-right{float:right}.fa.fa-pull-left,.fab.fa-pull-left,.fal.fa-pull-left,.far.fa-pull-left,.fas.fa-pull-left{margin-right:.3em}.fa.fa-pull-right,.fab.fa-pull-right,.fal.fa-pull-right,.far.fa-pull-right,.fas.fa-pull-right{margin-left:.3em}.fa-spin{-webkit-animation:fa-spin 2s infinite linear;animation:fa-spin 2s infinite linear}.fa-pulse{-webkit-animation:fa-spin 1s infinite steps(8);animation:fa-spin 1s infinite steps(8)}@-webkit-keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}.fa-rotate-90{-webkit-transform:rotate(90deg);transform:rotate(90deg)}.fa-rotate-180{-webkit-transform:rotate(180deg);transform:rotate(180deg)}.fa-rotate-270{-webkit-transform:rotate(270deg);transform:rotate(270deg)}.fa-flip-horizontal{-webkit-transform:scale(-1,1);transform:scale(-1,1)}.fa-flip-vertical{-webkit-transform:scale(1,-1);transform:scale(1,-1)}.fa-flip-horizontal.fa-flip-vertical{-webkit-transform:scale(-1,-1);transform:scale(-1,-1)}:root .fa-flip-horizontal,:root .fa-flip-vertical,:root .fa-rotate-180,:root .fa-rotate-270,:root .fa-rotate-90{-webkit-filter:none;filter:none}.fa-stack{display:inline-block;height:2em;position:relative;width:2em}.fa-stack-1x,.fa-stack-2x{bottom:0;left:0;margin:auto;position:absolute;right:0;top:0}.svg-inline--fa.fa-stack-1x{height:1em;width:1em}.svg-inline--fa.fa-stack-2x{height:2em;width:2em}.fa-inverse{color:#fff}.sr-only{border:0;clip:rect(0,0,0,0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.sr-only-focusable:active,.sr-only-focusable:focus{clip:auto;height:auto;margin:0;overflow:visible;position:static;width:auto}";if("fa"!==e||n!==t){var r=new RegExp("\\.fa\\-","g"),a=new RegExp("\\."+t,"g");i=i.replace(r,"."+e+"-").replace(a,"."+n)}return i};var Qt=function(){function t(){N(this,t),this.definitions={}}return A(t,[{key:"add",value:function(){for(var e=this,t=arguments.length,n=Array(t),i=0;i<t;i++)n[i]=arguments[i];var r=n.reduce(this._pullDefinitions,{});Object.keys(r).forEach(function(t){e.definitions[t]=O({},e.definitions[t]||{},r[t]),function t(e,i){var n=Object.keys(i).reduce(function(t,e){var n=i[e];return n.icon?t[n.iconName]=n.icon:t[e]=n,t},{});"function"==typeof R.hooks.addPack?R.hooks.addPack(e,n):R.styles[e]=O({},R.styles[e]||{},n),"fas"===e&&t("fa",i)}(t,r[t])})}},{key:"reset",value:function(){this.definitions={}}},{key:"_pullDefinitions",value:function(a,t){var o=t.prefix&&t.iconName&&t.icon?{0:t}:t;return Object.keys(o).map(function(t){var e=o[t],n=e.prefix,i=e.iconName,r=e.icon;a[n]||(a[n]={}),a[n][i]=r}),a}}]),t}();function Zt(t){return{found:!0,width:t[0],height:t[1],icon:{tag:"path",attributes:{fill:"currentColor",d:t.slice(4)[0]}}}}var $t=!1;function te(){S.autoAddCss&&($t||D(Jt()),$t=!0)}function ee(e,t){return Object.defineProperty(e,"abstract",{get:t}),Object.defineProperty(e,"html",{get:function(){return e.abstract.map(function(t){return wt(t)})}}),Object.defineProperty(e,"node",{get:function(){if(m){var t=c.createElement("div");return t.innerHTML=e.html,t.children}}}),e}function ne(t){var e=t.prefix,n=void 0===e?"fa":e,i=t.iconName;if(i)return yt(re.definitions,n,i)||yt(R.styles,n,i)}var ie,re=new Qt,ae=(ie=function(t){var e=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{},n=e.transform,i=void 0===n?B:n,r=e.symbol,a=void 0!==r&&r,o=e.mask,s=void 0===o?null:o,f=e.title,l=void 0===f?null:f,c=e.classes,u=void 0===c?[]:c,m=e.attributes,d=void 0===m?{}:m,g=e.styles,h=void 0===g?{}:g;if(t){var p=t.prefix,v=t.iconName,b=t.icon;return ee(O({type:"icon"},t),function(){return te(),S.autoA11y&&(l?d["aria-labelledby"]=S.replacementClass+"-title-"+X():d["aria-hidden"]="true"),nt({icons:{main:Zt(b),mask:s?Zt(s.icon):{found:!1,width:null,height:null,icon:{}}},prefix:p,iconName:v,transform:O({},B,i),symbol:a,title:l,extra:{attributes:d,styles:h,classes:u}})})}},function(t){var e=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{},n=(t||{}).icon?t:ne(t||{}),i=e.mask;return i&&(i=(i||{}).icon?i:ne(i||{})),ie(n,O({},e,{mask:i}))}),oe={noAuto:function(){var t;P({autoReplaceSvg:t=!1,observeMutations:t}),At&&At.disconnect()},dom:{i2svg:function(){var t=0<arguments.length&&void 0!==arguments[0]?arguments[0]:{};if(m){te();var e=t.node,n=void 0===e?c:e,i=t.callback,r=void 0===i?function(){}:i;S.searchPseudoElements&&qt(n),Kt(n,r)}},css:Jt,insertCss:function(){D(Jt())}},library:re,parse:{transform:function(t){return Lt(t)}},findIconDefinition:ne,icon:ae,text:function(t){var e=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{},n=e.transform,i=void 0===n?B:n,r=e.title,a=void 0===r?null:r,o=e.classes,s=void 0===o?[]:o,f=e.attributes,l=void 0===f?{}:f,c=e.styles,u=void 0===c?{}:c;return ee({type:"text",content:t},function(){return te(),it({content:t,transform:O({},B,i),title:a,extra:{attributes:l,styles:u,classes:[S.familyPrefix+"-layers-text"].concat(M(s))}})})},layer:function(t){return ee({type:"layer"},function(){te();var e=[];return t(function(t){Array.isArray(t)?t.map(function(t){e=e.concat(t.abstract)}):e=e.concat(t.abstract)}),[{tag:"span",attributes:{class:S.familyPrefix+"-layers"},children:e}]})}},se=function(){m&&S.autoReplaceSvg&&oe.dom.i2svg({node:c})};Object.defineProperty(oe,"config",{get:function(){return S},set:function(t){P(t)}}),function(t){try{t()}catch(t){if(!v)throw t}}(function(){u&&(s.FontAwesome||(s.FontAwesome=oe),I(function(){0<Object.keys(R.styles).length&&se(),S.observeMutations&&"function"==typeof MutationObserver&&function(t){if(f){var r=t.treeCallback,a=t.nodeCallback,o=t.pseudoElementsCallback;At=new f(function(t){Nt||Y(t).forEach(function(t){if("childList"===t.type&&0<t.addedNodes.length&&!kt(t.addedNodes[0])&&(S.searchPseudoElements&&o(t.target),r(t.target)),"attributes"===t.type&&t.target.parentNode&&S.searchPseudoElements&&o(t.target.parentNode),"attributes"===t.type&&kt(t.target)&&~w.indexOf(t.attributeName))if("class"===t.attributeName){var e=bt(U(t.target)),n=e.prefix,i=e.iconName;n&&t.target.setAttribute("data-prefix",n),i&&t.target.setAttribute("data-icon",i)}else a(t.target)})}),m&&At.observe(c.getElementsByTagName("body")[0],{childList:!0,attributes:!0,characterData:!0,subtree:!0})}}({treeCallback:Kt,nodeCallback:Gt,pseudoElementsCallback:qt})})),R.hooks=O({},R.hooks,{addPack:function(t,e){R.styles[t]=O({},R.styles[t]||{},e),ht(),se()},addShims:function(t){var e;(e=R.shims).push.apply(e,M(t)),ht(),se()}})})}();