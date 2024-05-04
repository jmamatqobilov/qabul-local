/*! crit-tech v0.0.1 | (c) 2020 RUSTAM KHASANOV | https://github.com/icid5post */
!(function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?exports.AOS=t():e.AOS=t()})(this,(function(){return (function(e){function t(o){if(n[o])return n[o].exports;var i=n[o]={exports:{},id:o,loaded:!1};return e[o].call(i.exports,i,i.exports,t),i.loaded=!0,i.exports}var n={};return t.m=e,t.c=n,t.p="dist/",t(0)})([(function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}var i=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e},r=n(1),a=(o(r),n(6)),u=o(a),c=n(7),f=o(c),s=n(8),d=o(s),l=n(9),p=o(l),m=n(10),b=o(m),v=n(11),y=o(v),g=n(14),h=o(g),w=[],k=!1,x={offset:120,delay:0,easing:"ease",duration:400,disable:!1,once:!1,startEvent:"DOMContentLoaded",throttleDelay:99,debounceDelay:50,disableMutationObserver:!1},j=function(){var e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];if(e&&(k=!0),k)return w=(0,y.default)(w,x),(0,b.default)(w,x.once),w},O=function(){w=(0,h.default)(),j()},_=function(){w.forEach((function(e,t){e.node.removeAttribute("data-aos"),e.node.removeAttribute("data-aos-easing"),e.node.removeAttribute("data-aos-duration"),e.node.removeAttribute("data-aos-delay")}))},S=function(e){return e===!0||"mobile"===e&&p.default.mobile()||"phone"===e&&p.default.phone()||"tablet"===e&&p.default.tablet()||"function"==typeof e&&e()===!0},z=function(e){x=i(x,e),w=(0,h.default)();var t=document.all&&!window.atob;return S(x.disable)||t?_():(document.querySelector("body").setAttribute("data-aos-easing",x.easing),document.querySelector("body").setAttribute("data-aos-duration",x.duration),document.querySelector("body").setAttribute("data-aos-delay",x.delay),"DOMContentLoaded"===x.startEvent&&["complete","interactive"].indexOf(document.readyState)>-1?j(!0):"load"===x.startEvent?window.addEventListener(x.startEvent,(function(){j(!0)})):document.addEventListener(x.startEvent,(function(){j(!0)})),window.addEventListener("resize",(0,f.default)(j,x.debounceDelay,!0)),window.addEventListener("orientationchange",(0,f.default)(j,x.debounceDelay,!0)),window.addEventListener("scroll",(0,u.default)((function(){(0,b.default)(w,x.once)}),x.throttleDelay)),x.disableMutationObserver||(0,d.default)("[data-aos]",O),w)};e.exports={init:z,refresh:j,refreshHard:O}}),(function(e,t){}),,,,,(function(e,t){(function(t){"use strict";function n(e,t,n){function o(t){var n=b,o=v;return b=v=void 0,k=t,g=e.apply(o,n)}function r(e){return k=e,h=setTimeout(s,t),_?o(e):g}function a(e){var n=e-w,o=e-k,i=t-n;return S?j(i,y-o):i}function c(e){var n=e-w,o=e-k;return void 0===w||n>=t||n<0||S&&o>=y}function s(){var e=O();return c(e)?d(e):void(h=setTimeout(s,a(e)))}function d(e){return h=void 0,z&&b?o(e):(b=v=void 0,g)}function l(){void 0!==h&&clearTimeout(h),k=0,b=w=v=h=void 0}function p(){return void 0===h?g:d(O())}function m(){var e=O(),n=c(e);if(b=arguments,v=this,w=e,n){if(void 0===h)return r(w);if(S)return h=setTimeout(s,t),o(w)}return void 0===h&&(h=setTimeout(s,t)),g}var b,v,y,g,h,w,k=0,_=!1,S=!1,z=!0;if("function"!=typeof e)throw new TypeError(f);return t=u(t)||0,i(n)&&(_=!!n.leading,S="maxWait"in n,y=S?x(u(n.maxWait)||0,t):y,z="trailing"in n?!!n.trailing:z),m.cancel=l,m.flush=p,m}function o(e,t,o){var r=!0,a=!0;if("function"!=typeof e)throw new TypeError(f);return i(o)&&(r="leading"in o?!!o.leading:r,a="trailing"in o?!!o.trailing:a),n(e,t,{leading:r,maxWait:t,trailing:a})}function i(e){var t="undefined"==typeof e?"undefined":c(e);return!!e&&("object"==t||"function"==t)}function r(e){return!!e&&"object"==("undefined"==typeof e?"undefined":c(e))}function a(e){return"symbol"==("undefined"==typeof e?"undefined":c(e))||r(e)&&k.call(e)==d}function u(e){if("number"==typeof e)return e;if(a(e))return s;if(i(e)){var t="function"==typeof e.valueOf?e.valueOf():e;e=i(t)?t+"":t}if("string"!=typeof e)return 0===e?e:+e;e=e.replace(l,"");var n=m.test(e);return n||b.test(e)?v(e.slice(2),n?2:8):p.test(e)?s:+e}var c="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},f="Expected a function",s=NaN,d="[object Symbol]",l=/^\s+|\s+$/g,p=/^[-+]0x[0-9a-f]+$/i,m=/^0b[01]+$/i,b=/^0o[0-7]+$/i,v=parseInt,y="object"==("undefined"==typeof t?"undefined":c(t))&&t&&t.Object===Object&&t,g="object"==("undefined"==typeof self?"undefined":c(self))&&self&&self.Object===Object&&self,h=y||g||Function("return this")(),w=Object.prototype,k=w.toString,x=Math.max,j=Math.min,O=function(){return h.Date.now()};e.exports=o}).call(t,(function(){return this})())}),(function(e,t){(function(t){"use strict";function n(e,t,n){function i(t){var n=b,o=v;return b=v=void 0,O=t,g=e.apply(o,n)}function r(e){return O=e,h=setTimeout(s,t),_?i(e):g}function u(e){var n=e-w,o=e-O,i=t-n;return S?x(i,y-o):i}function f(e){var n=e-w,o=e-O;return void 0===w||n>=t||n<0||S&&o>=y}function s(){var e=j();return f(e)?d(e):void(h=setTimeout(s,u(e)))}function d(e){return h=void 0,z&&b?i(e):(b=v=void 0,g)}function l(){void 0!==h&&clearTimeout(h),O=0,b=w=v=h=void 0}function p(){return void 0===h?g:d(j())}function m(){var e=j(),n=f(e);if(b=arguments,v=this,w=e,n){if(void 0===h)return r(w);if(S)return h=setTimeout(s,t),i(w)}return void 0===h&&(h=setTimeout(s,t)),g}var b,v,y,g,h,w,O=0,_=!1,S=!1,z=!0;if("function"!=typeof e)throw new TypeError(c);return t=a(t)||0,o(n)&&(_=!!n.leading,S="maxWait"in n,y=S?k(a(n.maxWait)||0,t):y,z="trailing"in n?!!n.trailing:z),m.cancel=l,m.flush=p,m}function o(e){var t="undefined"==typeof e?"undefined":u(e);return!!e&&("object"==t||"function"==t)}function i(e){return!!e&&"object"==("undefined"==typeof e?"undefined":u(e))}function r(e){return"symbol"==("undefined"==typeof e?"undefined":u(e))||i(e)&&w.call(e)==s}function a(e){if("number"==typeof e)return e;if(r(e))return f;if(o(e)){var t="function"==typeof e.valueOf?e.valueOf():e;e=o(t)?t+"":t}if("string"!=typeof e)return 0===e?e:+e;e=e.replace(d,"");var n=p.test(e);return n||m.test(e)?b(e.slice(2),n?2:8):l.test(e)?f:+e}var u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},c="Expected a function",f=NaN,s="[object Symbol]",d=/^\s+|\s+$/g,l=/^[-+]0x[0-9a-f]+$/i,p=/^0b[01]+$/i,m=/^0o[0-7]+$/i,b=parseInt,v="object"==("undefined"==typeof t?"undefined":u(t))&&t&&t.Object===Object&&t,y="object"==("undefined"==typeof self?"undefined":u(self))&&self&&self.Object===Object&&self,g=v||y||Function("return this")(),h=Object.prototype,w=h.toString,k=Math.max,x=Math.min,j=function(){return g.Date.now()};e.exports=n}).call(t,(function(){return this})())}),(function(e,t){"use strict";function n(e,t){var n=window.document,r=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver,a=new r(o);i=t,a.observe(n.documentElement,{childList:!0,subtree:!0,removedNodes:!0})}function o(e){e&&e.forEach((function(e){var t=Array.prototype.slice.call(e.addedNodes),n=Array.prototype.slice.call(e.removedNodes),o=t.concat(n).filter((function(e){return e.hasAttribute&&e.hasAttribute("data-aos")})).length;o&&i()}))}Object.defineProperty(t,"__esModule",{value:!0});var i=function(){};t.default=n}),(function(e,t){"use strict";function n(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(){return navigator.userAgent||navigator.vendor||window.opera||""}Object.defineProperty(t,"__esModule",{value:!0});var i=(function(){function e(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}})(),r=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i,a=/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,u=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i,c=/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,f=(function(){function e(){n(this,e)}return i(e,[{key:"phone",value:function(){var e=o();return!(!r.test(e)&&!a.test(e.substr(0,4)))}},{key:"mobile",value:function(){var e=o();return!(!u.test(e)&&!c.test(e.substr(0,4)))}},{key:"tablet",value:function(){return this.mobile()&&!this.phone()}}]),e})();t.default=new f}),(function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(e,t,n){var o=e.node.getAttribute("data-aos-once");t>e.position?e.node.classList.add("aos-animate"):"undefined"!=typeof o&&("false"===o||!n&&"true"!==o)&&e.node.classList.remove("aos-animate")},o=function(e,t){var o=window.pageYOffset,i=window.innerHeight;e.forEach((function(e,r){n(e,i+o,t)}))};t.default=o}),(function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var i=n(12),r=o(i),a=function(e,t){return e.forEach((function(e,n){e.node.classList.add("aos-init"),e.position=(0,r.default)(e.node,t.offset)})),e};t.default=a}),(function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var i=n(13),r=o(i),a=function(e,t){var n=0,o=0,i=window.innerHeight,a={offset:e.getAttribute("data-aos-offset"),anchor:e.getAttribute("data-aos-anchor"),anchorPlacement:e.getAttribute("data-aos-anchor-placement")};switch(a.offset&&!isNaN(a.offset)&&(o=parseInt(a.offset)),a.anchor&&document.querySelectorAll(a.anchor)&&(e=document.querySelectorAll(a.anchor)[0]),n=(0,r.default)(e).top,a.anchorPlacement){case"top-bottom":break;case"center-bottom":n+=e.offsetHeight/2;break;case"bottom-bottom":n+=e.offsetHeight;break;case"top-center":n+=i/2;break;case"bottom-center":n+=i/2+e.offsetHeight;break;case"center-center":n+=i/2+e.offsetHeight/2;break;case"top-top":n+=i;break;case"bottom-top":n+=e.offsetHeight+i;break;case"center-top":n+=e.offsetHeight/2+i}return a.anchorPlacement||a.offset||isNaN(t)||(o=t),n+o};t.default=a}),(function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(e){for(var t=0,n=0;e&&!isNaN(e.offsetLeft)&&!isNaN(e.offsetTop);)t+=e.offsetLeft-("BODY"!=e.tagName?e.scrollLeft:0),n+=e.offsetTop-("BODY"!=e.tagName?e.scrollTop:0),e=e.offsetParent;return{top:n,left:t}};t.default=n}),(function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(e){return e=e||document.querySelectorAll("[data-aos]"),Array.prototype.map.call(e,(function(e){return{node:e}}))};t.default=n})])}));
/*!
 * Datepicker for Bootstrap v1.9.0 (https://github.com/uxsolutions/bootstrap-datepicker)
 *
 * Licensed under the Apache License v2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 */

!(function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)})((function(a,b){function c(){return new Date(Date.UTC.apply(Date,arguments))}function d(){var a=new Date;return c(a.getFullYear(),a.getMonth(),a.getDate())}function e(a,b){return a.getUTCFullYear()===b.getUTCFullYear()&&a.getUTCMonth()===b.getUTCMonth()&&a.getUTCDate()===b.getUTCDate()}function f(c,d){return function(){return d!==b&&a.fn.datepicker.deprecated(d),this[c].apply(this,arguments)}}function g(a){return a&&!isNaN(a.getTime())}function h(b,c){function d(a,b){return b.toLowerCase()}var e,f=a(b).data(),g={},h=new RegExp("^"+c.toLowerCase()+"([A-Z])");c=new RegExp("^"+c.toLowerCase());for(var i in f)c.test(i)&&(e=i.replace(h,d),g[e]=f[i]);return g}function i(b){var c={};if(q[b]||(b=b.split("-")[0],q[b])){var d=q[b];return a.each(p,(function(a,b){b in d&&(c[b]=d[b])})),c}}var j=(function(){var b={get:function(a){return this.slice(a)[0]},contains:function(a){for(var b=a&&a.valueOf(),c=0,d=this.length;c<d;c++)if(0<=this[c].valueOf()-b&&this[c].valueOf()-b<864e5)return c;return-1},remove:function(a){this.splice(a,1)},replace:function(b){b&&(a.isArray(b)||(b=[b]),this.clear(),this.push.apply(this,b))},clear:function(){this.length=0},copy:function(){var a=new j;return a.replace(this),a}};return function(){var c=[];return c.push.apply(c,arguments),a.extend(c,b),c}})(),k=function(b,c){a.data(b,"datepicker",this),this._events=[],this._secondaryEvents=[],this._process_options(c),this.dates=new j,this.viewDate=this.o.defaultViewDate,this.focusDate=null,this.element=a(b),this.isInput=this.element.is("input"),this.inputField=this.isInput?this.element:this.element.find("input"),this.component=!!this.element.hasClass("date")&&this.element.find(".add-on, .input-group-addon, .input-group-append, .input-group-prepend, .btn"),this.component&&0===this.component.length&&(this.component=!1),this.isInline=!this.component&&this.element.is("div"),this.picker=a(r.template),this._check_template(this.o.templates.leftArrow)&&this.picker.find(".prev").html(this.o.templates.leftArrow),this._check_template(this.o.templates.rightArrow)&&this.picker.find(".next").html(this.o.templates.rightArrow),this._buildEvents(),this._attachEvents(),this.isInline?this.picker.addClass("datepicker-inline").appendTo(this.element):this.picker.addClass("datepicker-dropdown dropdown-menu"),this.o.rtl&&this.picker.addClass("datepicker-rtl"),this.o.calendarWeeks&&this.picker.find(".datepicker-days .datepicker-switch, thead .datepicker-title, tfoot .today, tfoot .clear").attr("colspan",(function(a,b){return Number(b)+1})),this._process_options({startDate:this._o.startDate,endDate:this._o.endDate,daysOfWeekDisabled:this.o.daysOfWeekDisabled,daysOfWeekHighlighted:this.o.daysOfWeekHighlighted,datesDisabled:this.o.datesDisabled}),this._allow_update=!1,this.setViewMode(this.o.startView),this._allow_update=!0,this.fillDow(),this.fillMonths(),this.update(),this.isInline&&this.show()};k.prototype={constructor:k,_resolveViewName:function(b){return a.each(r.viewModes,(function(c,d){if(b===c||-1!==a.inArray(b,d.names))return b=c,!1})),b},_resolveDaysOfWeek:function(b){return a.isArray(b)||(b=b.split(/[,\s]*/)),a.map(b,Number)},_check_template:function(c){try{if(c===b||""===c)return!1;if((c.match(/[<>]/g)||[]).length<=0)return!0;return a(c).length>0}catch(a){return!1}},_process_options:function(b){this._o=a.extend({},this._o,b);var e=this.o=a.extend({},this._o),f=e.language;q[f]||(f=f.split("-")[0],q[f]||(f=o.language)),e.language=f,e.startView=this._resolveViewName(e.startView),e.minViewMode=this._resolveViewName(e.minViewMode),e.maxViewMode=this._resolveViewName(e.maxViewMode),e.startView=Math.max(this.o.minViewMode,Math.min(this.o.maxViewMode,e.startView)),!0!==e.multidate&&(e.multidate=Number(e.multidate)||!1,!1!==e.multidate&&(e.multidate=Math.max(0,e.multidate))),e.multidateSeparator=String(e.multidateSeparator),e.weekStart%=7,e.weekEnd=(e.weekStart+6)%7;var g=r.parseFormat(e.format);e.startDate!==-1/0&&(e.startDate?e.startDate instanceof Date?e.startDate=this._local_to_utc(this._zero_time(e.startDate)):e.startDate=r.parseDate(e.startDate,g,e.language,e.assumeNearbyYear):e.startDate=-1/0),e.endDate!==1/0&&(e.endDate?e.endDate instanceof Date?e.endDate=this._local_to_utc(this._zero_time(e.endDate)):e.endDate=r.parseDate(e.endDate,g,e.language,e.assumeNearbyYear):e.endDate=1/0),e.daysOfWeekDisabled=this._resolveDaysOfWeek(e.daysOfWeekDisabled||[]),e.daysOfWeekHighlighted=this._resolveDaysOfWeek(e.daysOfWeekHighlighted||[]),e.datesDisabled=e.datesDisabled||[],a.isArray(e.datesDisabled)||(e.datesDisabled=e.datesDisabled.split(",")),e.datesDisabled=a.map(e.datesDisabled,(function(a){return r.parseDate(a,g,e.language,e.assumeNearbyYear)}));var h=String(e.orientation).toLowerCase().split(/\s+/g),i=e.orientation.toLowerCase();if(h=a.grep(h,(function(a){return/^auto|left|right|top|bottom$/.test(a)})),e.orientation={x:"auto",y:"auto"},i&&"auto"!==i)if(1===h.length)switch(h[0]){case"top":case"bottom":e.orientation.y=h[0];break;case"left":case"right":e.orientation.x=h[0]}else i=a.grep(h,(function(a){return/^left|right$/.test(a)})),e.orientation.x=i[0]||"auto",i=a.grep(h,(function(a){return/^top|bottom$/.test(a)})),e.orientation.y=i[0]||"auto";else;if(e.defaultViewDate instanceof Date||"string"==typeof e.defaultViewDate)e.defaultViewDate=r.parseDate(e.defaultViewDate,g,e.language,e.assumeNearbyYear);else if(e.defaultViewDate){var j=e.defaultViewDate.year||(new Date).getFullYear(),k=e.defaultViewDate.month||0,l=e.defaultViewDate.day||1;e.defaultViewDate=c(j,k,l)}else e.defaultViewDate=d()},_applyEvents:function(a){for(var c,d,e,f=0;f<a.length;f++)c=a[f][0],2===a[f].length?(d=b,e=a[f][1]):3===a[f].length&&(d=a[f][1],e=a[f][2]),c.on(e,d)},_unapplyEvents:function(a){for(var c,d,e,f=0;f<a.length;f++)c=a[f][0],2===a[f].length?(e=b,d=a[f][1]):3===a[f].length&&(e=a[f][1],d=a[f][2]),c.off(d,e)},_buildEvents:function(){var b={keyup:a.proxy((function(b){-1===a.inArray(b.keyCode,[27,37,39,38,40,32,13,9])&&this.update()}),this),keydown:a.proxy(this.keydown,this),paste:a.proxy(this.paste,this)};!0===this.o.showOnFocus&&(b.focus=a.proxy(this.show,this)),this.isInput?this._events=[[this.element,b]]:this.component&&this.inputField.length?this._events=[[this.inputField,b],[this.component,{click:a.proxy(this.show,this)}]]:this._events=[[this.element,{click:a.proxy(this.show,this),keydown:a.proxy(this.keydown,this)}]],this._events.push([this.element,"*",{blur:a.proxy((function(a){this._focused_from=a.target}),this)}],[this.element,{blur:a.proxy((function(a){this._focused_from=a.target}),this)}]),this.o.immediateUpdates&&this._events.push([this.element,{"changeYear changeMonth":a.proxy((function(a){this.update(a.date)}),this)}]),this._secondaryEvents=[[this.picker,{click:a.proxy(this.click,this)}],[this.picker,".prev, .next",{click:a.proxy(this.navArrowsClick,this)}],[this.picker,".day:not(.disabled)",{click:a.proxy(this.dayCellClick,this)}],[a(window),{resize:a.proxy(this.place,this)}],[a(document),{"mousedown touchstart":a.proxy((function(a){this.element.is(a.target)||this.element.find(a.target).length||this.picker.is(a.target)||this.picker.find(a.target).length||this.isInline||this.hide()}),this)}]]},_attachEvents:function(){this._detachEvents(),this._applyEvents(this._events)},_detachEvents:function(){this._unapplyEvents(this._events)},_attachSecondaryEvents:function(){this._detachSecondaryEvents(),this._applyEvents(this._secondaryEvents)},_detachSecondaryEvents:function(){this._unapplyEvents(this._secondaryEvents)},_trigger:function(b,c){var d=c||this.dates.get(-1),e=this._utc_to_local(d);this.element.trigger({type:b,date:e,viewMode:this.viewMode,dates:a.map(this.dates,this._utc_to_local),format:a.proxy((function(a,b){0===arguments.length?(a=this.dates.length-1,b=this.o.format):"string"==typeof a&&(b=a,a=this.dates.length-1),b=b||this.o.format;var c=this.dates.get(a);return r.formatDate(c,b,this.o.language)}),this)})},show:function(){if(!(this.inputField.is(":disabled")||this.inputField.prop("readonly")&&!1===this.o.enableOnReadonly))return this.isInline||this.picker.appendTo(this.o.container),this.place(),this.picker.show(),this._attachSecondaryEvents(),this._trigger("show"),(window.navigator.msMaxTouchPoints||"ontouchstart"in document)&&this.o.disableTouchKeyboard&&a(this.element).blur(),this},hide:function(){return this.isInline||!this.picker.is(":visible")?this:(this.focusDate=null,this.picker.hide().detach(),this._detachSecondaryEvents(),this.setViewMode(this.o.startView),this.o.forceParse&&this.inputField.val()&&this.setValue(),this._trigger("hide"),this)},destroy:function(){return this.hide(),this._detachEvents(),this._detachSecondaryEvents(),this.picker.remove(),delete this.element.data().datepicker,this.isInput||delete this.element.data().date,this},paste:function(b){var c;if(b.originalEvent.clipboardData&&b.originalEvent.clipboardData.types&&-1!==a.inArray("text/plain",b.originalEvent.clipboardData.types))c=b.originalEvent.clipboardData.getData("text/plain");else{if(!window.clipboardData)return;c=window.clipboardData.getData("Text")}this.setDate(c),this.update(),b.preventDefault()},_utc_to_local:function(a){if(!a)return a;var b=new Date(a.getTime()+6e4*a.getTimezoneOffset());return b.getTimezoneOffset()!==a.getTimezoneOffset()&&(b=new Date(a.getTime()+6e4*b.getTimezoneOffset())),b},_local_to_utc:function(a){return a&&new Date(a.getTime()-6e4*a.getTimezoneOffset())},_zero_time:function(a){return a&&new Date(a.getFullYear(),a.getMonth(),a.getDate())},_zero_utc_time:function(a){return a&&c(a.getUTCFullYear(),a.getUTCMonth(),a.getUTCDate())},getDates:function(){return a.map(this.dates,this._utc_to_local)},getUTCDates:function(){return a.map(this.dates,(function(a){return new Date(a)}))},getDate:function(){return this._utc_to_local(this.getUTCDate())},getUTCDate:function(){var a=this.dates.get(-1);return a!==b?new Date(a):null},clearDates:function(){this.inputField.val(""),this.update(),this._trigger("changeDate"),this.o.autoclose&&this.hide()},setDates:function(){var b=a.isArray(arguments[0])?arguments[0]:arguments;return this.update.apply(this,b),this._trigger("changeDate"),this.setValue(),this},setUTCDates:function(){var b=a.isArray(arguments[0])?arguments[0]:arguments;return this.setDates.apply(this,a.map(b,this._utc_to_local)),this},setDate:f("setDates"),setUTCDate:f("setUTCDates"),remove:f("destroy","Method `remove` is deprecated and will be removed in version 2.0. Use `destroy` instead"),setValue:function(){var a=this.getFormattedDate();return this.inputField.val(a),this},getFormattedDate:function(c){c===b&&(c=this.o.format);var d=this.o.language;return a.map(this.dates,(function(a){return r.formatDate(a,c,d)})).join(this.o.multidateSeparator)},getStartDate:function(){return this.o.startDate},setStartDate:function(a){return this._process_options({startDate:a}),this.update(),this.updateNavArrows(),this},getEndDate:function(){return this.o.endDate},setEndDate:function(a){return this._process_options({endDate:a}),this.update(),this.updateNavArrows(),this},setDaysOfWeekDisabled:function(a){return this._process_options({daysOfWeekDisabled:a}),this.update(),this},setDaysOfWeekHighlighted:function(a){return this._process_options({daysOfWeekHighlighted:a}),this.update(),this},setDatesDisabled:function(a){return this._process_options({datesDisabled:a}),this.update(),this},place:function(){if(this.isInline)return this;var b=this.picker.outerWidth(),c=this.picker.outerHeight(),d=a(this.o.container),e=d.width(),f="body"===this.o.container?a(document).scrollTop():d.scrollTop(),g=d.offset(),h=[0];this.element.parents().each((function(){var b=a(this).css("z-index");"auto"!==b&&0!==Number(b)&&h.push(Number(b))}));var i=Math.max.apply(Math,h)+this.o.zIndexOffset,j=this.component?this.component.parent().offset():this.element.offset(),k=this.component?this.component.outerHeight(!0):this.element.outerHeight(!1),l=this.component?this.component.outerWidth(!0):this.element.outerWidth(!1),m=j.left-g.left,n=j.top-g.top;"body"!==this.o.container&&(n+=f),this.picker.removeClass("datepicker-orient-top datepicker-orient-bottom datepicker-orient-right datepicker-orient-left"),"auto"!==this.o.orientation.x?(this.picker.addClass("datepicker-orient-"+this.o.orientation.x),"right"===this.o.orientation.x&&(m-=b-l)):j.left<0?(this.picker.addClass("datepicker-orient-left"),m-=j.left-10):m+b>e?(this.picker.addClass("datepicker-orient-right"),m+=l-b):this.o.rtl?this.picker.addClass("datepicker-orient-right"):this.picker.addClass("datepicker-orient-left");var o,p=this.o.orientation.y;if("auto"===p&&(o=-f+n-c,p=o<0?"bottom":"top"),this.picker.addClass("datepicker-orient-"+p),"top"===p?n-=c+parseInt(this.picker.css("padding-top")):n+=k,this.o.rtl){var q=e-(m+l);this.picker.css({top:n,right:q,zIndex:i})}else this.picker.css({top:n,left:m,zIndex:i});return this},_allow_update:!0,update:function(){if(!this._allow_update)return this;var b=this.dates.copy(),c=[],d=!1;return arguments.length?(a.each(arguments,a.proxy((function(a,b){b instanceof Date&&(b=this._local_to_utc(b)),c.push(b)}),this)),d=!0):(c=this.isInput?this.element.val():this.element.data("date")||this.inputField.val(),c=c&&this.o.multidate?c.split(this.o.multidateSeparator):[c],delete this.element.data().date),c=a.map(c,a.proxy((function(a){return r.parseDate(a,this.o.format,this.o.language,this.o.assumeNearbyYear)}),this)),c=a.grep(c,a.proxy((function(a){return!this.dateWithinRange(a)||!a}),this),!0),this.dates.replace(c),this.o.updateViewDate&&(this.dates.length?this.viewDate=new Date(this.dates.get(-1)):this.viewDate<this.o.startDate?this.viewDate=new Date(this.o.startDate):this.viewDate>this.o.endDate?this.viewDate=new Date(this.o.endDate):this.viewDate=this.o.defaultViewDate),d?(this.setValue(),this.element.change()):this.dates.length&&String(b)!==String(this.dates)&&d&&(this._trigger("changeDate"),this.element.change()),!this.dates.length&&b.length&&(this._trigger("clearDate"),this.element.change()),this.fill(),this},fillDow:function(){if(this.o.showWeekDays){var b=this.o.weekStart,c="<tr>";for(this.o.calendarWeeks&&(c+='<th class="cw">&#160;</th>');b<this.o.weekStart+7;)c+='<th class="dow',-1!==a.inArray(b,this.o.daysOfWeekDisabled)&&(c+=" disabled"),c+='">'+q[this.o.language].daysMin[b++%7]+"</th>";c+="</tr>",this.picker.find(".datepicker-days thead").append(c)}},fillMonths:function(){for(var a,b=this._utc_to_local(this.viewDate),c="",d=0;d<12;d++)a=b&&b.getMonth()===d?" focused":"",c+='<span class="month'+a+'">'+q[this.o.language].monthsShort[d]+"</span>";this.picker.find(".datepicker-months td").html(c)},setRange:function(b){b&&b.length?this.range=a.map(b,(function(a){return a.valueOf()})):delete this.range,this.fill()},getClassNames:function(b){var c=[],f=this.viewDate.getUTCFullYear(),g=this.viewDate.getUTCMonth(),h=d();return b.getUTCFullYear()<f||b.getUTCFullYear()===f&&b.getUTCMonth()<g?c.push("old"):(b.getUTCFullYear()>f||b.getUTCFullYear()===f&&b.getUTCMonth()>g)&&c.push("new"),this.focusDate&&b.valueOf()===this.focusDate.valueOf()&&c.push("focused"),this.o.todayHighlight&&e(b,h)&&c.push("today"),-1!==this.dates.contains(b)&&c.push("active"),this.dateWithinRange(b)||c.push("disabled"),this.dateIsDisabled(b)&&c.push("disabled","disabled-date"),-1!==a.inArray(b.getUTCDay(),this.o.daysOfWeekHighlighted)&&c.push("highlighted"),this.range&&(b>this.range[0]&&b<this.range[this.range.length-1]&&c.push("range"),-1!==a.inArray(b.valueOf(),this.range)&&c.push("selected"),b.valueOf()===this.range[0]&&c.push("range-start"),b.valueOf()===this.range[this.range.length-1]&&c.push("range-end")),c},_fill_yearsView:function(c,d,e,f,g,h,i){for(var j,k,l,m="",n=e/10,o=this.picker.find(c),p=Math.floor(f/e)*e,q=p+9*n,r=Math.floor(this.viewDate.getFullYear()/n)*n,s=a.map(this.dates,(function(a){return Math.floor(a.getUTCFullYear()/n)*n})),t=p-n;t<=q+n;t+=n)j=[d],k=null,t===p-n?j.push("old"):t===q+n&&j.push("new"),-1!==a.inArray(t,s)&&j.push("active"),(t<g||t>h)&&j.push("disabled"),t===r&&j.push("focused"),i!==a.noop&&(l=i(new Date(t,0,1)),l===b?l={}:"boolean"==typeof l?l={enabled:l}:"string"==typeof l&&(l={classes:l}),!1===l.enabled&&j.push("disabled"),l.classes&&(j=j.concat(l.classes.split(/\s+/))),l.tooltip&&(k=l.tooltip)),m+='<span class="'+j.join(" ")+'"'+(k?' title="'+k+'"':"")+">"+t+"</span>";o.find(".datepicker-switch").text(p+"-"+q),o.find("td").html(m)},fill:function(){var e,f,g=new Date(this.viewDate),h=g.getUTCFullYear(),i=g.getUTCMonth(),j=this.o.startDate!==-1/0?this.o.startDate.getUTCFullYear():-1/0,k=this.o.startDate!==-1/0?this.o.startDate.getUTCMonth():-1/0,l=this.o.endDate!==1/0?this.o.endDate.getUTCFullYear():1/0,m=this.o.endDate!==1/0?this.o.endDate.getUTCMonth():1/0,n=q[this.o.language].today||q.en.today||"",o=q[this.o.language].clear||q.en.clear||"",p=q[this.o.language].titleFormat||q.en.titleFormat,s=d(),t=(!0===this.o.todayBtn||"linked"===this.o.todayBtn)&&s>=this.o.startDate&&s<=this.o.endDate&&!this.weekOfDateIsDisabled(s);if(!isNaN(h)&&!isNaN(i)){this.picker.find(".datepicker-days .datepicker-switch").text(r.formatDate(g,p,this.o.language)),this.picker.find("tfoot .today").text(n).css("display",t?"table-cell":"none"),this.picker.find("tfoot .clear").text(o).css("display",!0===this.o.clearBtn?"table-cell":"none"),this.picker.find("thead .datepicker-title").text(this.o.title).css("display","string"==typeof this.o.title&&""!==this.o.title?"table-cell":"none"),this.updateNavArrows(),this.fillMonths();var u=c(h,i,0),v=u.getUTCDate();u.setUTCDate(v-(u.getUTCDay()-this.o.weekStart+7)%7);var w=new Date(u);u.getUTCFullYear()<100&&w.setUTCFullYear(u.getUTCFullYear()),w.setUTCDate(w.getUTCDate()+42),w=w.valueOf();for(var x,y,z=[];u.valueOf()<w;){if((x=u.getUTCDay())===this.o.weekStart&&(z.push("<tr>"),this.o.calendarWeeks)){var A=new Date(+u+(this.o.weekStart-x-7)%7*864e5),B=new Date(Number(A)+(11-A.getUTCDay())%7*864e5),C=new Date(Number(C=c(B.getUTCFullYear(),0,1))+(11-C.getUTCDay())%7*864e5),D=(B-C)/864e5/7+1;z.push('<td class="cw">'+D+"</td>")}y=this.getClassNames(u),y.push("day");var E=u.getUTCDate();this.o.beforeShowDay!==a.noop&&(f=this.o.beforeShowDay(this._utc_to_local(u)),f===b?f={}:"boolean"==typeof f?f={enabled:f}:"string"==typeof f&&(f={classes:f}),!1===f.enabled&&y.push("disabled"),f.classes&&(y=y.concat(f.classes.split(/\s+/))),f.tooltip&&(e=f.tooltip),f.content&&(E=f.content)),y=a.isFunction(a.uniqueSort)?a.uniqueSort(y):a.unique(y),z.push('<td class="'+y.join(" ")+'"'+(e?' title="'+e+'"':"")+' data-date="'+u.getTime().toString()+'">'+E+"</td>"),e=null,x===this.o.weekEnd&&z.push("</tr>"),u.setUTCDate(u.getUTCDate()+1)}this.picker.find(".datepicker-days tbody").html(z.join(""));var F=q[this.o.language].monthsTitle||q.en.monthsTitle||"Months",G=this.picker.find(".datepicker-months").find(".datepicker-switch").text(this.o.maxViewMode<2?F:h).end().find("tbody span").removeClass("active");if(a.each(this.dates,(function(a,b){b.getUTCFullYear()===h&&G.eq(b.getUTCMonth()).addClass("active")})),(h<j||h>l)&&G.addClass("disabled"),h===j&&G.slice(0,k).addClass("disabled"),h===l&&G.slice(m+1).addClass("disabled"),this.o.beforeShowMonth!==a.noop){var H=this;a.each(G,(function(c,d){var e=new Date(h,c,1),f=H.o.beforeShowMonth(e);f===b?f={}:"boolean"==typeof f?f={enabled:f}:"string"==typeof f&&(f={classes:f}),!1!==f.enabled||a(d).hasClass("disabled")||a(d).addClass("disabled"),f.classes&&a(d).addClass(f.classes),f.tooltip&&a(d).prop("title",f.tooltip)}))}this._fill_yearsView(".datepicker-years","year",10,h,j,l,this.o.beforeShowYear),this._fill_yearsView(".datepicker-decades","decade",100,h,j,l,this.o.beforeShowDecade),this._fill_yearsView(".datepicker-centuries","century",1e3,h,j,l,this.o.beforeShowCentury)}},updateNavArrows:function(){if(this._allow_update){var a,b,c=new Date(this.viewDate),d=c.getUTCFullYear(),e=c.getUTCMonth(),f=this.o.startDate!==-1/0?this.o.startDate.getUTCFullYear():-1/0,g=this.o.startDate!==-1/0?this.o.startDate.getUTCMonth():-1/0,h=this.o.endDate!==1/0?this.o.endDate.getUTCFullYear():1/0,i=this.o.endDate!==1/0?this.o.endDate.getUTCMonth():1/0,j=1;switch(this.viewMode){case 4:j*=10;case 3:j*=10;case 2:j*=10;case 1:a=Math.floor(d/j)*j<=f,b=Math.floor(d/j)*j+j>h;break;case 0:a=d<=f&&e<=g,b=d>=h&&e>=i}this.picker.find(".prev").toggleClass("disabled",a),this.picker.find(".next").toggleClass("disabled",b)}},click:function(b){b.preventDefault(),b.stopPropagation();var e,f,g,h;e=a(b.target),e.hasClass("datepicker-switch")&&this.viewMode!==this.o.maxViewMode&&this.setViewMode(this.viewMode+1),e.hasClass("today")&&!e.hasClass("day")&&(this.setViewMode(0),this._setDate(d(),"linked"===this.o.todayBtn?null:"view")),e.hasClass("clear")&&this.clearDates(),e.hasClass("disabled")||(e.hasClass("month")||e.hasClass("year")||e.hasClass("decade")||e.hasClass("century"))&&(this.viewDate.setUTCDate(1),f=1,1===this.viewMode?(h=e.parent().find("span").index(e),g=this.viewDate.getUTCFullYear(),this.viewDate.setUTCMonth(h)):(h=0,g=Number(e.text()),this.viewDate.setUTCFullYear(g)),this._trigger(r.viewModes[this.viewMode-1].e,this.viewDate),this.viewMode===this.o.minViewMode?this._setDate(c(g,h,f)):(this.setViewMode(this.viewMode-1),this.fill())),this.picker.is(":visible")&&this._focused_from&&this._focused_from.focus(),delete this._focused_from},dayCellClick:function(b){var c=a(b.currentTarget),d=c.data("date"),e=new Date(d);this.o.updateViewDate&&(e.getUTCFullYear()!==this.viewDate.getUTCFullYear()&&this._trigger("changeYear",this.viewDate),e.getUTCMonth()!==this.viewDate.getUTCMonth()&&this._trigger("changeMonth",this.viewDate)),this._setDate(e)},navArrowsClick:function(b){var c=a(b.currentTarget),d=c.hasClass("prev")?-1:1;0!==this.viewMode&&(d*=12*r.viewModes[this.viewMode].navStep),this.viewDate=this.moveMonth(this.viewDate,d),this._trigger(r.viewModes[this.viewMode].e,this.viewDate),this.fill()},_toggle_multidate:function(a){var b=this.dates.contains(a);if(a||this.dates.clear(),-1!==b?(!0===this.o.multidate||this.o.multidate>1||this.o.toggleActive)&&this.dates.remove(b):!1===this.o.multidate?(this.dates.clear(),this.dates.push(a)):this.dates.push(a),"number"==typeof this.o.multidate)for(;this.dates.length>this.o.multidate;)this.dates.remove(0)},_setDate:function(a,b){b&&"date"!==b||this._toggle_multidate(a&&new Date(a)),(!b&&this.o.updateViewDate||"view"===b)&&(this.viewDate=a&&new Date(a)),this.fill(),this.setValue(),b&&"view"===b||this._trigger("changeDate"),this.inputField.trigger("change"),!this.o.autoclose||b&&"date"!==b||this.hide()},moveDay:function(a,b){var c=new Date(a);return c.setUTCDate(a.getUTCDate()+b),c},moveWeek:function(a,b){return this.moveDay(a,7*b)},moveMonth:function(a,b){if(!g(a))return this.o.defaultViewDate;if(!b)return a;var c,d,e=new Date(a.valueOf()),f=e.getUTCDate(),h=e.getUTCMonth(),i=Math.abs(b);if(b=b>0?1:-1,1===i)d=-1===b?function(){return e.getUTCMonth()===h}:function(){return e.getUTCMonth()!==c},c=h+b,e.setUTCMonth(c),c=(c+12)%12;else{for(var j=0;j<i;j++)e=this.moveMonth(e,b);c=e.getUTCMonth(),e.setUTCDate(f),d=function(){return c!==e.getUTCMonth()}}for(;d();)e.setUTCDate(--f),e.setUTCMonth(c);return e},moveYear:function(a,b){return this.moveMonth(a,12*b)},moveAvailableDate:function(a,b,c){do{if(a=this[c](a,b),!this.dateWithinRange(a))return!1;c="moveDay"}while(this.dateIsDisabled(a));return a},weekOfDateIsDisabled:function(b){return-1!==a.inArray(b.getUTCDay(),this.o.daysOfWeekDisabled)},dateIsDisabled:function(b){return this.weekOfDateIsDisabled(b)||a.grep(this.o.datesDisabled,(function(a){return e(b,a)})).length>0},dateWithinRange:function(a){return a>=this.o.startDate&&a<=this.o.endDate},keydown:function(a){if(!this.picker.is(":visible"))return void(40!==a.keyCode&&27!==a.keyCode||(this.show(),a.stopPropagation()));var b,c,d=!1,e=this.focusDate||this.viewDate;switch(a.keyCode){case 27:this.focusDate?(this.focusDate=null,this.viewDate=this.dates.get(-1)||this.viewDate,this.fill()):this.hide(),a.preventDefault(),a.stopPropagation();break;case 37:case 38:case 39:case 40:if(!this.o.keyboardNavigation||7===this.o.daysOfWeekDisabled.length)break;b=37===a.keyCode||38===a.keyCode?-1:1,0===this.viewMode?a.ctrlKey?(c=this.moveAvailableDate(e,b,"moveYear"))&&this._trigger("changeYear",this.viewDate):a.shiftKey?(c=this.moveAvailableDate(e,b,"moveMonth"))&&this._trigger("changeMonth",this.viewDate):37===a.keyCode||39===a.keyCode?c=this.moveAvailableDate(e,b,"moveDay"):this.weekOfDateIsDisabled(e)||(c=this.moveAvailableDate(e,b,"moveWeek")):1===this.viewMode?(38!==a.keyCode&&40!==a.keyCode||(b*=4),c=this.moveAvailableDate(e,b,"moveMonth")):2===this.viewMode&&(38!==a.keyCode&&40!==a.keyCode||(b*=4),c=this.moveAvailableDate(e,b,"moveYear")),c&&(this.focusDate=this.viewDate=c,this.setValue(),this.fill(),a.preventDefault());break;case 13:if(!this.o.forceParse)break;e=this.focusDate||this.dates.get(-1)||this.viewDate,this.o.keyboardNavigation&&(this._toggle_multidate(e),d=!0),this.focusDate=null,this.viewDate=this.dates.get(-1)||this.viewDate,this.setValue(),this.fill(),this.picker.is(":visible")&&(a.preventDefault(),a.stopPropagation(),this.o.autoclose&&this.hide());break;case 9:this.focusDate=null,this.viewDate=this.dates.get(-1)||this.viewDate,this.fill(),this.hide()}d&&(this.dates.length?this._trigger("changeDate"):this._trigger("clearDate"),this.inputField.trigger("change"))},setViewMode:function(a){this.viewMode=a,this.picker.children("div").hide().filter(".datepicker-"+r.viewModes[this.viewMode].clsName).show(),this.updateNavArrows(),this._trigger("changeViewMode",new Date(this.viewDate))}};var l=function(b,c){a.data(b,"datepicker",this),this.element=a(b),this.inputs=a.map(c.inputs,(function(a){return a.jquery?a[0]:a})),delete c.inputs,this.keepEmptyValues=c.keepEmptyValues,delete c.keepEmptyValues,n.call(a(this.inputs),c).on("changeDate",a.proxy(this.dateUpdated,this)),this.pickers=a.map(this.inputs,(function(b){return a.data(b,"datepicker")})),this.updateDates()};l.prototype={updateDates:function(){this.dates=a.map(this.pickers,(function(a){return a.getUTCDate()})),this.updateRanges()},updateRanges:function(){var b=a.map(this.dates,(function(a){return a.valueOf()}));a.each(this.pickers,(function(a,c){c.setRange(b)}))},clearDates:function(){a.each(this.pickers,(function(a,b){b.clearDates()}))},dateUpdated:function(c){if(!this.updating){this.updating=!0;var d=a.data(c.target,"datepicker");if(d!==b){var e=d.getUTCDate(),f=this.keepEmptyValues,g=a.inArray(c.target,this.inputs),h=g-1,i=g+1,j=this.inputs.length;if(-1!==g){if(a.each(this.pickers,(function(a,b){b.getUTCDate()||b!==d&&f||b.setUTCDate(e)})),e<this.dates[h])for(;h>=0&&e<this.dates[h];)this.pickers[h--].setUTCDate(e);else if(e>this.dates[i])for(;i<j&&e>this.dates[i];)this.pickers[i++].setUTCDate(e);this.updateDates(),delete this.updating}}}},destroy:function(){a.map(this.pickers,(function(a){a.destroy()})),a(this.inputs).off("changeDate",this.dateUpdated),delete this.element.data().datepicker},remove:f("destroy","Method `remove` is deprecated and will be removed in version 2.0. Use `destroy` instead")};var m=a.fn.datepicker,n=function(c){var d=Array.apply(null,arguments);d.shift();var e;if(this.each((function(){var b=a(this),f=b.data("datepicker"),g="object"==typeof c&&c;if(!f){var j=h(this,"date"),m=a.extend({},o,j,g),n=i(m.language),p=a.extend({},o,n,j,g);b.hasClass("input-daterange")||p.inputs?(a.extend(p,{inputs:p.inputs||b.find("input").toArray()}),f=new l(this,p)):f=new k(this,p),b.data("datepicker",f)}"string"==typeof c&&"function"==typeof f[c]&&(e=f[c].apply(f,d))})),e===b||e instanceof k||e instanceof l)return this;if(this.length>1)throw new Error("Using only allowed for the collection of a single element ("+c+" function)");return e};a.fn.datepicker=n;var o=a.fn.datepicker.defaults={assumeNearbyYear:!1,autoclose:!1,beforeShowDay:a.noop,beforeShowMonth:a.noop,beforeShowYear:a.noop,beforeShowDecade:a.noop,beforeShowCentury:a.noop,calendarWeeks:!1,clearBtn:!1,toggleActive:!1,daysOfWeekDisabled:[],daysOfWeekHighlighted:[],datesDisabled:[],endDate:1/0,forceParse:!0,format:"mm/dd/yyyy",keepEmptyValues:!1,keyboardNavigation:!0,language:"en",minViewMode:0,maxViewMode:4,multidate:!1,multidateSeparator:",",orientation:"auto",rtl:!1,startDate:-1/0,startView:0,todayBtn:!1,todayHighlight:!1,updateViewDate:!0,weekStart:0,disableTouchKeyboard:!1,enableOnReadonly:!0,showOnFocus:!0,zIndexOffset:10,container:"body",immediateUpdates:!1,title:"",templates:{leftArrow:"&#x00AB;",rightArrow:"&#x00BB;"},showWeekDays:!0},p=a.fn.datepicker.locale_opts=["format","rtl","weekStart"];a.fn.datepicker.Constructor=k;var q=a.fn.datepicker.dates={en:{days:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],daysShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],daysMin:["Su","Mo","Tu","We","Th","Fr","Sa"],months:["January","February","March","April","May","June","July","August","September","October","November","December"],monthsShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],today:"Today",clear:"Clear",titleFormat:"MM yyyy"}},r={viewModes:[{names:["days","month"],clsName:"days",e:"changeMonth"},{names:["months","year"],clsName:"months",e:"changeYear",navStep:1},{names:["years","decade"],clsName:"years",e:"changeDecade",navStep:10},{names:["decades","century"],clsName:"decades",e:"changeCentury",navStep:100},{names:["centuries","millennium"],clsName:"centuries",e:"changeMillennium",navStep:1e3}],validParts:/dd?|DD?|mm?|MM?|yy(?:yy)?/g,nonpunctuation:/[^ -\/:-@\u5e74\u6708\u65e5\[-`{-~\t\n\r]+/g,parseFormat:function(a){if("function"==typeof a.toValue&&"function"==typeof a.toDisplay)return a;var b=a.replace(this.validParts,"\0").split("\0"),c=a.match(this.validParts);if(!b||!b.length||!c||0===c.length)throw new Error("Invalid date format.");return{separators:b,parts:c}},parseDate:function(c,e,f,g){function h(a,b){return!0===b&&(b=10),a<100&&(a+=2e3)>(new Date).getFullYear()+b&&(a-=100),a}function i(){var a=this.slice(0,j[n].length),b=j[n].slice(0,a.length);return a.toLowerCase()===b.toLowerCase()}if(!c)return b;if(c instanceof Date)return c;if("string"==typeof e&&(e=r.parseFormat(e)),e.toValue)return e.toValue(c,e,f);var j,l,m,n,o,p={d:"moveDay",m:"moveMonth",w:"moveWeek",y:"moveYear"},s={yesterday:"-1d",today:"+0d",tomorrow:"+1d"};if(c in s&&(c=s[c]),/^[\-+]\d+[dmwy]([\s,]+[\-+]\d+[dmwy])*$/i.test(c)){for(j=c.match(/([\-+]\d+)([dmwy])/gi),c=new Date,n=0;n<j.length;n++)l=j[n].match(/([\-+]\d+)([dmwy])/i),m=Number(l[1]),o=p[l[2].toLowerCase()],c=k.prototype[o](c,m);return k.prototype._zero_utc_time(c)}j=c&&c.match(this.nonpunctuation)||[];var t,u,v={},w=["yyyy","yy","M","MM","m","mm","d","dd"],x={yyyy:function(a,b){return a.setUTCFullYear(g?h(b,g):b)},m:function(a,b){if(isNaN(a))return a;for(b-=1;b<0;)b+=12;for(b%=12,a.setUTCMonth(b);a.getUTCMonth()!==b;)a.setUTCDate(a.getUTCDate()-1);return a},d:function(a,b){return a.setUTCDate(b)}};x.yy=x.yyyy,x.M=x.MM=x.mm=x.m,x.dd=x.d,c=d();var y=e.parts.slice();if(j.length!==y.length&&(y=a(y).filter((function(b,c){return-1!==a.inArray(c,w)})).toArray()),j.length===y.length){var z;for(n=0,z=y.length;n<z;n++){if(t=parseInt(j[n],10),l=y[n],isNaN(t))switch(l){case"MM":u=a(q[f].months).filter(i),t=a.inArray(u[0],q[f].months)+1;break;case"M":u=a(q[f].monthsShort).filter(i),t=a.inArray(u[0],q[f].monthsShort)+1}v[l]=t}var A,B;for(n=0;n<w.length;n++)(B=w[n])in v&&!isNaN(v[B])&&(A=new Date(c),x[B](A,v[B]),isNaN(A)||(c=A))}return c},formatDate:function(b,c,d){if(!b)return"";if("string"==typeof c&&(c=r.parseFormat(c)),c.toDisplay)return c.toDisplay(b,c,d);var e={d:b.getUTCDate(),D:q[d].daysShort[b.getUTCDay()],DD:q[d].days[b.getUTCDay()],m:b.getUTCMonth()+1,M:q[d].monthsShort[b.getUTCMonth()],MM:q[d].months[b.getUTCMonth()],yy:b.getUTCFullYear().toString().substring(2),yyyy:b.getUTCFullYear()};e.dd=(e.d<10?"0":"")+e.d,e.mm=(e.m<10?"0":"")+e.m,b=[];for(var f=a.extend([],c.separators),g=0,h=c.parts.length;g<=h;g++)f.length&&b.push(f.shift()),b.push(e[c.parts[g]]);return b.join("")},
headTemplate:'<thead><tr><th colspan="7" class="datepicker-title"></th></tr><tr><th class="prev">'+o.templates.leftArrow+'</th><th colspan="5" class="datepicker-switch"></th><th class="next">'+o.templates.rightArrow+"</th></tr></thead>",contTemplate:'<tbody><tr><td colspan="7"></td></tr></tbody>',footTemplate:'<tfoot><tr><th colspan="7" class="today"></th></tr><tr><th colspan="7" class="clear"></th></tr></tfoot>'};r.template='<div class="datepicker"><div class="datepicker-days"><table class="table-condensed">'+r.headTemplate+"<tbody></tbody>"+r.footTemplate+'</table></div><div class="datepicker-months"><table class="table-condensed">'+r.headTemplate+r.contTemplate+r.footTemplate+'</table></div><div class="datepicker-years"><table class="table-condensed">'+r.headTemplate+r.contTemplate+r.footTemplate+'</table></div><div class="datepicker-decades"><table class="table-condensed">'+r.headTemplate+r.contTemplate+r.footTemplate+'</table></div><div class="datepicker-centuries"><table class="table-condensed">'+r.headTemplate+r.contTemplate+r.footTemplate+"</table></div></div>",a.fn.datepicker.DPGlobal=r,a.fn.datepicker.noConflict=function(){return a.fn.datepicker=m,this},a.fn.datepicker.version="1.9.0",a.fn.datepicker.deprecated=function(a){var b=window.console;b&&b.warn&&b.warn("DEPRECATED: "+a)},a(document).on("focus.datepicker.data-api click.datepicker.data-api",'[data-provide="datepicker"]',(function(b){var c=a(this);c.data("datepicker")||(b.preventDefault(),n.call(c,"show"))})),a((function(){n.call(a('[data-provide="datepicker-inline"]'))}))}));
!(function(a){a.fn.datepicker.dates.ru={days:["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],daysShort:["Вск","Пнд","Втр","Срд","Чтв","Птн","Суб"],daysMin:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],months:["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],monthsShort:["Янв","Фев","Мар","Апр","Май","Июн","Июл","Авг","Сен","Окт","Ноя","Дек"],today:"Сегодня",clear:"Очистить",format:"dd.mm.yyyy",weekStart:1,monthsTitle:"Месяцы"}})(jQuery);
// jQuery Mask Plugin v1.14.16
// github.com/igorescobar/jQuery-Mask-Plugin
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(a,n,f){a instanceof String&&(a=String(a));for(var p=a.length,k=0;k<p;k++){var b=a[k];if(n.call(f,b,k,a))return{i:k,v:b}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(a,n,f){a!=Array.prototype&&a!=Object.prototype&&(a[n]=f.value)};$jscomp.getGlobal=function(a){return"undefined"!=typeof window&&window===a?a:"undefined"!=typeof global&&null!=global?global:a};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.polyfill=function(a,n,f,p){if(n){f=$jscomp.global;a=a.split(".");for(p=0;p<a.length-1;p++){var k=a[p];k in f||(f[k]={});f=f[k]}a=a[a.length-1];p=f[a];n=n(p);n!=p&&null!=n&&$jscomp.defineProperty(f,a,{configurable:!0,writable:!0,value:n})}};$jscomp.polyfill("Array.prototype.find",(function(a){return a?a:function(a,f){return $jscomp.findInternal(this,a,f).v}}),"es6","es3");
(function(a,n,f){"function"===typeof define&&define.amd?define(["jquery"],a):"object"===typeof exports&&"undefined"===typeof Meteor?module.exports=a(require("jquery")):a(n||f)})((function(a){var n=function(b,d,e){var c={invalid:[],getCaret:function(){try{var a=0,r=b.get(0),h=document.selection,d=r.selectionStart;if(h&&-1===navigator.appVersion.indexOf("MSIE 10")){var e=h.createRange();e.moveStart("character",-c.val().length);a=e.text.length}else if(d||"0"===d)a=d;return a}catch(C){}},setCaret:function(a){try{if(b.is(":focus")){var c=
b.get(0);if(c.setSelectionRange)c.setSelectionRange(a,a);else{var g=c.createTextRange();g.collapse(!0);g.moveEnd("character",a);g.moveStart("character",a);g.select()}}}catch(B){}},events:function(){b.on("keydown.mask",(function(a){b.data("mask-keycode",a.keyCode||a.which);b.data("mask-previus-value",b.val());b.data("mask-previus-caret-pos",c.getCaret());c.maskDigitPosMapOld=c.maskDigitPosMap})).on(a.jMaskGlobals.useInput?"input.mask":"keyup.mask",c.behaviour).on("paste.mask drop.mask",(function(){setTimeout((function(){b.keydown().keyup()}),
100)})).on("change.mask",(function(){b.data("changed",!0)})).on("blur.mask",(function(){f===c.val()||b.data("changed")||b.trigger("change");b.data("changed",!1)})).on("blur.mask",(function(){f=c.val()})).on("focus.mask",(function(b){!0===e.selectOnFocus&&a(b.target).select()})).on("focusout.mask",(function(){e.clearIfNotMatch&&!k.test(c.val())&&c.val("")}))},getRegexMask:function(){for(var a=[],b,c,e,t,f=0;f<d.length;f++)(b=l.translation[d.charAt(f)])?(c=b.pattern.toString().replace(/.{1}$|^.{1}/g,""),e=b.optional,
(b=b.recursive)?(a.push(d.charAt(f)),t={digit:d.charAt(f),pattern:c}):a.push(e||b?c+"?":c)):a.push(d.charAt(f).replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&"));a=a.join("");t&&(a=a.replace(new RegExp("("+t.digit+"(.*"+t.digit+")?)"),"($1)?").replace(new RegExp(t.digit,"g"),t.pattern));return new RegExp(a)},destroyEvents:function(){b.off("input keydown keyup paste drop blur focusout ".split(" ").join(".mask "))},val:function(a){var c=b.is("input")?"val":"text";if(0<arguments.length){if(b[c]()!==a)b[c](a);
c=b}else c=b[c]();return c},calculateCaretPosition:function(a){var d=c.getMasked(),h=c.getCaret();if(a!==d){var e=b.data("mask-previus-caret-pos")||0;d=d.length;var g=a.length,f=a=0,l=0,k=0,m;for(m=h;m<d&&c.maskDigitPosMap[m];m++)f++;for(m=h-1;0<=m&&c.maskDigitPosMap[m];m--)a++;for(m=h-1;0<=m;m--)c.maskDigitPosMap[m]&&l++;for(m=e-1;0<=m;m--)c.maskDigitPosMapOld[m]&&k++;h>g?h=10*d:e>=h&&e!==g?c.maskDigitPosMapOld[h]||(e=h,h=h-(k-l)-a,c.maskDigitPosMap[h]&&(h=e)):h>e&&(h=h+(l-k)+f)}return h},behaviour:function(d){d=
d||window.event;c.invalid=[];var e=b.data("mask-keycode");if(-1===a.inArray(e,l.byPassKeys)){e=c.getMasked();var h=c.getCaret(),g=b.data("mask-previus-value")||"";setTimeout((function(){c.setCaret(c.calculateCaretPosition(g))}),a.jMaskGlobals.keyStrokeCompensation);c.val(e);c.setCaret(h);return c.callbacks(d)}},getMasked:function(a,b){var h=[],f=void 0===b?c.val():b+"",g=0,k=d.length,n=0,p=f.length,m=1,r="push",u=-1,w=0;b=[];if(e.reverse){r="unshift";m=-1;var x=0;g=k-1;n=p-1;var A=function(){return-1<
g&&-1<n}}else x=k-1,A=function(){return g<k&&n<p};for(var z;A();){var y=d.charAt(g),v=f.charAt(n),q=l.translation[y];if(q)v.match(q.pattern)?(h[r](v),q.recursive&&(-1===u?u=g:g===x&&g!==u&&(g=u-m),x===u&&(g-=m)),g+=m):v===z?(w--,z=void 0):q.optional?(g+=m,n-=m):q.fallback?(h[r](q.fallback),g+=m,n-=m):c.invalid.push({p:n,v:v,e:q.pattern}),n+=m;else{if(!a)h[r](y);v===y?(b.push(n),n+=m):(z=y,b.push(n+w),w++);g+=m}}a=d.charAt(x);k!==p+1||l.translation[a]||h.push(a);h=h.join("");c.mapMaskdigitPositions(h,
b,p);return h},mapMaskdigitPositions:function(a,b,d){a=e.reverse?a.length-d:0;c.maskDigitPosMap={};for(d=0;d<b.length;d++)c.maskDigitPosMap[b[d]+a]=1},callbacks:function(a){var g=c.val(),h=g!==f,k=[g,a,b,e],l=function(a,b,c){"function"===typeof e[a]&&b&&e[a].apply(this,c)};l("onChange",!0===h,k);l("onKeyPress",!0===h,k);l("onComplete",g.length===d.length,k);l("onInvalid",0<c.invalid.length,[g,a,b,c.invalid,e])}};b=a(b);var l=this,f=c.val(),k;d="function"===typeof d?d(c.val(),void 0,b,e):d;l.mask=
d;l.options=e;l.remove=function(){var a=c.getCaret();l.options.placeholder&&b.removeAttr("placeholder");b.data("mask-maxlength")&&b.removeAttr("maxlength");c.destroyEvents();c.val(l.getCleanVal());c.setCaret(a);return b};l.getCleanVal=function(){return c.getMasked(!0)};l.getMaskedVal=function(a){return c.getMasked(!1,a)};l.init=function(g){g=g||!1;e=e||{};l.clearIfNotMatch=a.jMaskGlobals.clearIfNotMatch;l.byPassKeys=a.jMaskGlobals.byPassKeys;l.translation=a.extend({},a.jMaskGlobals.translation,e.translation);
l=a.extend(!0,{},l,e);k=c.getRegexMask();if(g)c.events(),c.val(c.getMasked());else{e.placeholder&&b.attr("placeholder",e.placeholder);b.data("mask")&&b.attr("autocomplete","off");g=0;for(var f=!0;g<d.length;g++){var h=l.translation[d.charAt(g)];if(h&&h.recursive){f=!1;break}}f&&b.attr("maxlength",d.length).data("mask-maxlength",!0);c.destroyEvents();c.events();g=c.getCaret();c.val(c.getMasked());c.setCaret(g)}};l.init(!b.is("input"))};a.maskWatchers={};var f=function(){var b=a(this),d={},e=b.attr("data-mask");
b.attr("data-mask-reverse")&&(d.reverse=!0);b.attr("data-mask-clearifnotmatch")&&(d.clearIfNotMatch=!0);"true"===b.attr("data-mask-selectonfocus")&&(d.selectOnFocus=!0);if(p(b,e,d))return b.data("mask",new n(this,e,d))},p=function(b,d,e){e=e||{};var c=a(b).data("mask"),f=JSON.stringify;b=a(b).val()||a(b).text();try{return"function"===typeof d&&(d=d(b)),"object"!==typeof c||f(c.options)!==f(e)||c.mask!==d}catch(w){}},k=function(a){var b=document.createElement("div");a="on"+a;var e=a in b;e||(b.setAttribute(a,
"return;"),e="function"===typeof b[a]);return e};a.fn.mask=function(b,d){d=d||{};var e=this.selector,c=a.jMaskGlobals,f=c.watchInterval;c=d.watchInputs||c.watchInputs;var k=function(){if(p(this,b,d))return a(this).data("mask",new n(this,b,d))};a(this).each(k);e&&""!==e&&c&&(clearInterval(a.maskWatchers[e]),a.maskWatchers[e]=setInterval((function(){a(document).find(e).each(k)}),f));return this};a.fn.masked=function(a){return this.data("mask").getMaskedVal(a)};a.fn.unmask=function(){clearInterval(a.maskWatchers[this.selector]);
delete a.maskWatchers[this.selector];return this.each((function(){var b=a(this).data("mask");b&&b.remove().removeData("mask")}))};a.fn.cleanVal=function(){return this.data("mask").getCleanVal()};a.applyDataMask=function(b){b=b||a.jMaskGlobals.maskElements;(b instanceof a?b:a(b)).filter(a.jMaskGlobals.dataMaskAttr).each(f)};k={maskElements:"input,td,span,div",dataMaskAttr:"*[data-mask]",dataMask:!0,watchInterval:300,watchInputs:!0,keyStrokeCompensation:10,useInput:!/Chrome\/[2-4][0-9]|SamsungBrowser/.test(window.navigator.userAgent)&&
k("input"),watchDataMask:!1,byPassKeys:[9,16,17,18,36,37,38,39,40,91],translation:{0:{pattern:/\d/},9:{pattern:/\d/,optional:!0},"#":{pattern:/\d/,recursive:!0},A:{pattern:/[a-zA-Z0-9]/},S:{pattern:/[a-zA-Z]/}}};a.jMaskGlobals=a.jMaskGlobals||{};k=a.jMaskGlobals=a.extend(!0,{},k,a.jMaskGlobals);k.dataMask&&a.applyDataMask();setInterval((function(){a.jMaskGlobals.watchDataMask&&a.applyDataMask()}),k.watchInterval)}),window.jQuery,window.Zepto);

/*!
 * SmartWizard v4.4.1
 * The awesome jQuery step wizard plugin with Bootstrap support
 * http://www.techlaboratory.net/smartwizard
 *
 * Created by Dipu Raj
 * http://dipuraj.me
 *
 * Licensed under the terms of the MIT License
 * https://github.com/techlab/SmartWizard/blob/master/LICENSE
 */
!(function(h,i,t){"use strict";var e={selected:0,keyNavigation:!0,autoAdjustHeight:!0,cycleSteps:!1,backButtonSupport:!0,useURLhash:!0,showStepURLhash:!0,lang:{next:"Next",previous:"Previous"},toolbarSettings:{toolbarPosition:"bottom",toolbarButtonPosition:"end",showNextButton:!0,showPreviousButton:!0,toolbarExtraButtons:[]},anchorSettings:{anchorClickable:!0,enableAllAnchors:!1,markDoneStep:!0,markAllPreviousStepsAsDone:!0,removeDoneStepOnNavigateBack:!1,enableAnchorOnDoneStep:!0},contentURL:null,contentCache:!0,ajaxSettings:{},disabledSteps:[],errorSteps:[],hiddenSteps:[],theme:"default",transitionEffect:"none",transitionSpeed:"400"};function n(t,s){this.options=h.extend(!0,{},e,s),this.main=h(t),this.nav=this.main.children("ul"),this.steps=h("li > a",this.nav),this.container=this.main.children("div"),this.pages=this.container.children("div"),this.current_index=null,this.options.toolbarSettings.toolbarButtonPosition="right"===this.options.toolbarSettings.toolbarButtonPosition?"end":this.options.toolbarSettings.toolbarButtonPosition,this.options.toolbarSettings.toolbarButtonPosition="left"===this.options.toolbarSettings.toolbarButtonPosition?"start":this.options.toolbarSettings.toolbarButtonPosition,this.options.theme=null===this.options.theme||""===this.options.theme?"default":this.options.theme,this.init()}h.extend(n.prototype,{init:function(){this._setElements(),this._setToolbar(),this._setEvents();var t=this.options.selected;if(this.options.useURLhash){var s=i.location.hash;if(s&&0<s.length){var e=h("a[href*='"+s+"']",this.nav);if(0<e.length){var n=this.steps.index(e);t=0<=n?n:t}}}0<t&&this.options.anchorSettings.markDoneStep&&this.options.anchorSettings.markAllPreviousStepsAsDone&&this.steps.eq(t).parent("li").prevAll().addClass("done"),this._showStep(t)},_setElements:function(){this.main.addClass("sw-main sw-theme-"+this.options.theme),this.nav.addClass("nav nav-tabs step-anchor").children("li").addClass("nav-item").children("a").addClass("nav-link"),!1!==this.options.anchorSettings.enableAllAnchors&&!1!==this.options.anchorSettings.anchorClickable&&this.steps.parent("li").addClass("clickable"),this.container.addClass("sw-container tab-content"),this.pages.addClass("tab-pane step-content");var e=this;return this.options.disabledSteps&&0<this.options.disabledSteps.length&&h.each(this.options.disabledSteps,(function(t,s){e.steps.eq(s).parent("li").addClass("disabled")})),this.options.errorSteps&&0<this.options.errorSteps.length&&h.each(this.options.errorSteps,(function(t,s){e.steps.eq(s).parent("li").addClass("danger")})),this.options.hiddenSteps&&0<this.options.hiddenSteps.length&&h.each(this.options.hiddenSteps,(function(t,s){e.steps.eq(s).parent("li").addClass("hidden")})),!0},_setToolbar:function(){if("none"===this.options.toolbarSettings.toolbarPosition)return!0;var t,s,e=!1!==this.options.toolbarSettings.showNextButton?h("<button></button>").text(this.options.lang.next).addClass("btn btn-secondary sw-btn-next").attr("type","button"):null,n=!1!==this.options.toolbarSettings.showPreviousButton?h("<button></button>").text(this.options.lang.previous).addClass("btn btn-secondary sw-btn-prev").attr("type","button"):null,i=h("<div></div>").addClass("btn-group mr-2 sw-btn-group").attr("role","group").append(n,e),o=null;switch(this.options.toolbarSettings.toolbarExtraButtons&&0<this.options.toolbarSettings.toolbarExtraButtons.length&&(o=h("<div></div>").addClass("btn-group mr-2 sw-btn-group-extra").attr("role","group"),h.each(this.options.toolbarSettings.toolbarExtraButtons,(function(t,s){o.append(s.clone(!0))}))),this.options.toolbarSettings.toolbarPosition){case"top":(t=h("<div></div>").addClass("btn-toolbar sw-toolbar sw-toolbar-top justify-content-"+this.options.toolbarSettings.toolbarButtonPosition)).append(i),"start"===this.options.toolbarSettings.toolbarButtonPosition?t.prepend(o):t.append(o),this.container.before(t);break;case"bottom":(s=h("<div></div>").addClass("btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-"+this.options.toolbarSettings.toolbarButtonPosition)).append(i),"start"===this.options.toolbarSettings.toolbarButtonPosition?s.prepend(o):s.append(o),this.container.after(s);break;case"both":(t=h("<div></div>").addClass("btn-toolbar sw-toolbar sw-toolbar-top justify-content-"+this.options.toolbarSettings.toolbarButtonPosition)).append(i),"start"===this.options.toolbarSettings.toolbarButtonPosition?t.prepend(o):t.append(o),this.container.before(t),(s=h("<div></div>").addClass("btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-"+this.options.toolbarSettings.toolbarButtonPosition)).append(i.clone(!0)),null!==o&&("start"===this.options.toolbarSettings.toolbarButtonPosition?s.prepend(o.clone(!0)):s.append(o.clone(!0))),this.container.after(s);break;default:(s=h("<div></div>").addClass("btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-"+this.options.toolbarSettings.toolbarButtonPosition)).append(i),this.options.toolbarSettings.toolbarButtonPosition,s.append(o),this.container.after(s)}return!0},_setEvents:function(){var e=this;return h(this.steps).on("click",(function(t){if(t.preventDefault(),!1===e.options.anchorSettings.anchorClickable)return!0;var s=e.steps.index(this);if(!1===e.options.anchorSettings.enableAnchorOnDoneStep&&e.steps.eq(s).parent("li").hasClass("done"))return!0;s!==e.current_index&&(!1!==e.options.anchorSettings.enableAllAnchors&&!1!==e.options.anchorSettings.anchorClickable?e._showStep(s):e.steps.eq(s).parent("li").hasClass("done")&&e._showStep(s))})),h(".sw-btn-next",this.main).on("click",(function(t){t.preventDefault(),e._showNext()})),h(".sw-btn-prev",this.main).on("click",(function(t){t.preventDefault(),e._showPrevious()})),this.options.keyNavigation&&h(t).keyup((function(t){e._keyNav(t)})),this.options.backButtonSupport&&h(i).on("hashchange",(function(t){if(!e.options.useURLhash)return!0;if(i.location.hash){var s=h("a[href*='"+i.location.hash+"']",e.nav);s&&0<s.length&&(t.preventDefault(),e._showStep(e.steps.index(s)))}})),!0},_showNext:function(){for(var t=this.current_index+1,s=t;s<this.steps.length;s++)if(!this.steps.eq(s).parent("li").hasClass("disabled")&&!this.steps.eq(s).parent("li").hasClass("hidden")){t=s;break}if(this.steps.length<=t){if(!this.options.cycleSteps)return!1;t=0}return this._showStep(t),!0},_showPrevious:function(){for(var t=this.current_index-1,s=t;0<=s;s--)if(!this.steps.eq(s).parent("li").hasClass("disabled")&&!this.steps.eq(s).parent("li").hasClass("hidden")){t=s;break}if(t<0){if(!this.options.cycleSteps)return!1;t=this.steps.length-1}return this._showStep(t),!0},_showStep:function(t){return!!this.steps.eq(t)&&(t!=this.current_index&&(!this.steps.eq(t).parent("li").hasClass("disabled")&&!this.steps.eq(t).parent("li").hasClass("hidden")&&(this._loadStepContent(t),!0)))},_loadStepContent:function(s){var n=this,t=this.steps.eq(this.current_index),e="",i=this.steps.eq(s),o=i.data("content-url")&&0<i.data("content-url").length?i.data("content-url"):this.options.contentURL;if(null!==this.current_index&&this.current_index!==s&&(e=this.current_index<s?"forward":"backward"),null!==this.current_index&&!1===this._triggerEvent("leaveStep",[t,this.current_index,e]))return!1;if(!(o&&0<o.length)||i.data("has-content")&&this.options.contentCache)this._transitPage(s);else{var a=0<i.length?h(i.attr("href"),this.main):null,r=h.extend(!0,{},{url:o,type:"POST",data:{step_number:s},dataType:"text",beforeSend:function(){n._loader("show")},error:function(t,s,e){n._loader("hide"),h.error(e)},success:function(t){t&&0<t.length&&(i.data("has-content",!0),a.html(t)),n._loader("hide"),n._transitPage(s)}},this.options.ajaxSettings);h.ajax(r)}return!0},_transitPage:function(t){var s=this,e=this.steps.eq(this.current_index),n=0<e.length?h(e.attr("href"),this.main):null,i=this.steps.eq(t),o=0<i.length?h(i.attr("href"),this.main):null,a="";null!==this.current_index&&this.current_index!==t&&(a=this.current_index<t?"forward":"backward");var r="middle";return 0===t?r="first":t===this.steps.length-1&&(r="final"),this.options.transitionEffect=this.options.transitionEffect.toLowerCase(),this.pages.finish(),"slide"===this.options.transitionEffect?n&&0<n.length?n.slideUp("fast",this.options.transitionEasing,(function(){o.slideDown(s.options.transitionSpeed,s.options.transitionEasing)})):o.slideDown(this.options.transitionSpeed,this.options.transitionEasing):"fade"===this.options.transitionEffect?n&&0<n.length?n.fadeOut("fast",this.options.transitionEasing,(function(){o.fadeIn("fast",s.options.transitionEasing,(function(){h(this).show()}))})):o.fadeIn(this.options.transitionSpeed,this.options.transitionEasing,(function(){h(this).show()})):(n&&0<n.length&&n.hide(),o.show()),this._setURLHash(i.attr("href")),this._setAnchor(t),this._setButtons(t),this._fixHeight(t),this.current_index=t,this._triggerEvent("showStep",[i,this.current_index,a,r]),!0},_setAnchor:function(t){return this.steps.eq(this.current_index).parent("li").removeClass("active"),!1!==this.options.anchorSettings.markDoneStep&&null!==this.current_index&&(this.steps.eq(this.current_index).parent("li").addClass("done"),!1!==this.options.anchorSettings.removeDoneStepOnNavigateBack&&this.steps.eq(t).parent("li").nextAll().removeClass("done")),this.steps.eq(t).parent("li").removeClass("done").addClass("active"),!0},_setButtons:function(t){return this.options.cycleSteps||(t<=0?h(".sw-btn-prev",this.main).addClass("disabled"):h(".sw-btn-prev",this.main).removeClass("disabled"),this.steps.length-1<=t?h(".sw-btn-next",this.main).addClass("disabled"):h(".sw-btn-next",this.main).removeClass("disabled")),!0},_keyNav:function(t){switch(t.which){case 37:this._showPrevious(),t.preventDefault();break;case 39:this._showNext(),t.preventDefault();break;default:return}},_fixHeight:function(t){if(this.options.autoAdjustHeight){var s=0<this.steps.eq(t).length?h(this.steps.eq(t).attr("href"),this.main):null;this.container.finish().animate({minHeight:s.outerHeight()},this.options.transitionSpeed,(function(){}))}return!0},_triggerEvent:function(t,s){var e=h.Event(t);return this.main.trigger(e,s),!e.isDefaultPrevented()&&e.result},_setURLHash:function(t){this.options.showStepURLhash&&i.location.hash!==t&&(i.location.hash=t)},_loader:function(t){switch(t){case"show":this.main.addClass("sw-loading");break;case"hide":this.main.removeClass("sw-loading");break;default:this.main.toggleClass("sw-loading")}},goToStep:function(t){this._transitPage(t)},hiddenSteps:function(t){if(this.options.hiddenSteps=t,this.options.hiddenSteps&&0<this.options.hiddenSteps.length){var e=this;h.each(e.steps,(function(t,s){-1<h.inArray(t,e.options.hiddenSteps)?h(s).parent("li").addClass("hidden"):h(s).parent("li").removeClass("hidden")}))}},theme:function(t){if(this.options.theme===t)return!1;this.main.removeClass("sw-theme-"+this.options.theme),this.options.theme=t,this.main.addClass("sw-theme-"+this.options.theme),this._triggerEvent("themeChanged",[this.options.theme])},next:function(){this._showNext()},prev:function(){this._showPrevious()},reset:function(){if(!1===this._triggerEvent("beginReset"))return!1;this.container.stop(!0),this.pages.stop(!0),this.pages.hide(),this.current_index=null,this._setURLHash(this.steps.eq(this.options.selected).attr("href")),h(".sw-toolbar",this.main).remove(),this.steps.removeClass(),this.steps.parents("li").removeClass(),this.steps.data("has-content",!1),this.init(),this._triggerEvent("endReset")},stepState:function(e,t){e=h.isArray(e)?e:[e];var s=h.grep(this.steps,(function(t,s){return-1!==h.inArray(s,e)}));if(s&&0<s.length)switch(t){case"disable":h(s).parents("li").addClass("disabled");break;case"enable":h(s).parents("li").removeClass("disabled");break;case"hide":h(s).parents("li").addClass("hidden");break;case"show":h(s).parents("li").removeClass("hidden");break;case"error-on":h(s).parents("li").addClass("danger");break;case"error-off":h(s).parents("li").removeClass("danger")}}}),h.fn.smartWizard=function(t){var s,e=arguments;return void 0===t||"object"==typeof t?this.each((function(){h.data(this,"smartWizard")||h.data(this,"smartWizard",new n(this,t))})):"string"==typeof t&&"_"!==t[0]&&"init"!==t?(s=h.data(this[0],"smartWizard"),"destroy"===t&&h.data(this,"smartWizard",null),s instanceof n&&"function"==typeof s[t]?s[t].apply(s,Array.prototype.slice.call(e,1)):this):void 0}})(jQuery,window,document);
/*!
* metismenu https://github.com/onokumus/metismenu#readme
* A jQuery menu plugin
* @version 3.0.5
* @author Osman Nuri Okumus <onokumus@gmail.com> (https://github.com/onokumus)
* @license: MIT 
*/
!(function(e,n){"object"==typeof exports&&"undefined"!=typeof module?module.exports=n(require("jquery")):"function"==typeof define&&define.amd?define(["jquery"],n):(e=e||self).metisMenu=n(e.jQuery)})(this,(function(o){"use strict";function a(){return(a=Object.assign||function(e){for(var n=1;n<arguments.length;n++){var t=arguments[n];for(var i in t)Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i])}return e}).apply(this,arguments)}o=o&&o.hasOwnProperty("default")?o.default:o;var i,n,r,s=(n="transitionend",r={TRANSITION_END:"mmTransitionEnd",triggerTransitionEnd:function(e){i(e).trigger(n)},supportsTransitionEnd:function(){return Boolean(n)}},(i=o).fn.mmEmulateTransitionEnd=e,i.event.special[r.TRANSITION_END]={bindType:n,delegateType:n,handle:function(e){if(i(e.target).is(this))return e.handleObj.handler.apply(this,arguments)}},r);function e(e){var n=this,t=!1;return i(this).one(r.TRANSITION_END,(function(){t=!0})),setTimeout((function(){t||r.triggerTransitionEnd(n)}),e),this}var t="metisMenu",g="metisMenu",l="."+g,h=o.fn[t],f={toggle:!0,preventDefault:!0,triggerElement:"a",parentTrigger:"li",subMenu:"ul"},d={SHOW:"show"+l,SHOWN:"shown"+l,HIDE:"hide"+l,HIDDEN:"hidden"+l,CLICK_DATA_API:"click"+l+".data-api"},u="metismenu",c="mm-active",p="mm-show",m="mm-collapse",T="mm-collapsing",v=(function(){function r(e,n){this.element=e,this.config=a({},f,{},n),this.transitioning=null,this.init()}var e=r.prototype;return e.init=function(){var a=this,s=this.config,e=o(this.element);e.addClass(u),e.find(s.parentTrigger+"."+c).children(s.triggerElement).attr("aria-expanded","true"),e.find(s.parentTrigger+"."+c).parents(s.parentTrigger).addClass(c),e.find(s.parentTrigger+"."+c).parents(s.parentTrigger).children(s.triggerElement).attr("aria-expanded","true"),e.find(s.parentTrigger+"."+c).has(s.subMenu).children(s.subMenu).addClass(m+" "+p),e.find(s.parentTrigger).not("."+c).has(s.subMenu).children(s.subMenu).addClass(m),e.find(s.parentTrigger).children(s.triggerElement).on(d.CLICK_DATA_API,(function(e){var n=o(this);if("true"!==n.attr("aria-disabled")){s.preventDefault&&"#"===n.attr("href")&&e.preventDefault();var t=n.parent(s.parentTrigger),i=t.siblings(s.parentTrigger),r=i.children(s.triggerElement);t.hasClass(c)?(n.attr("aria-expanded","false"),a.removeActive(t)):(n.attr("aria-expanded","true"),a.setActive(t),s.toggle&&(a.removeActive(i),r.attr("aria-expanded","false"))),s.onTransitionStart&&s.onTransitionStart(e)}}))},e.setActive=function(e){o(e).addClass(c);var n=o(e).children(this.config.subMenu);0<n.length&&!n.hasClass(p)&&this.show(n)},e.removeActive=function(e){o(e).removeClass(c);var n=o(e).children(this.config.subMenu+"."+p);0<n.length&&this.hide(n)},e.show=function(e){var n=this;if(!this.transitioning&&!o(e).hasClass(T)){var t=o(e),i=o.Event(d.SHOW);if(t.trigger(i),!i.isDefaultPrevented()){if(t.parent(this.config.parentTrigger).addClass(c),this.config.toggle){var r=t.parent(this.config.parentTrigger).siblings().children(this.config.subMenu+"."+p);this.hide(r)}t.removeClass(m).addClass(T).height(0),this.setTransitioning(!0);t.height(e[0].scrollHeight).one(s.TRANSITION_END,(function(){n.config&&n.element&&(t.removeClass(T).addClass(m+" "+p).height(""),n.setTransitioning(!1),t.trigger(d.SHOWN))})).mmEmulateTransitionEnd(350)}}},e.hide=function(e){var n=this;if(!this.transitioning&&o(e).hasClass(p)){var t=o(e),i=o.Event(d.HIDE);if(t.trigger(i),!i.isDefaultPrevented()){t.parent(this.config.parentTrigger).removeClass(c),t.height(t.height())[0].offsetHeight,t.addClass(T).removeClass(m).removeClass(p),this.setTransitioning(!0);var r=function(){n.config&&n.element&&(n.transitioning&&n.config.onTransitionEnd&&n.config.onTransitionEnd(),n.setTransitioning(!1),t.trigger(d.HIDDEN),t.removeClass(T).addClass(m))};0===t.height()||"none"===t.css("display")?r():t.height(0).one(s.TRANSITION_END,r).mmEmulateTransitionEnd(350)}}},e.setTransitioning=function(e){this.transitioning=e},e.dispose=function(){o.removeData(this.element,g),o(this.element).find(this.config.parentTrigger).children(this.config.triggerElement).off(d.CLICK_DATA_API),this.transitioning=null,this.config=null,this.element=null},r.jQueryInterface=function(i){return this.each((function(){var e=o(this),n=e.data(g),t=a({},f,{},e.data(),{},"object"==typeof i&&i?i:{});if(n||(n=new r(this,t),e.data(g,n)),"string"==typeof i){if(void 0===n[i])throw new Error('No method named "'+i+'"');n[i]()}}))},r})();return o.fn[t]=v.jQueryInterface,o.fn[t].Constructor=v,o.fn[t].noConflict=function(){return o.fn[t]=h,v.jQueryInterface},v}));
//# sourceMappingURL=metisMenu.min.js.map
!(function(e){var t={};function n(i){if(t[i])return t[i].exports;var s=t[i]={i:i,l:!1,exports:{}};return e[i].call(s.exports,s,s.exports,n),s.l=!0,s.exports}n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var s in e)n.d(i,s,function(t){return e[t]}.bind(null,s));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)})([(function(e,t,n){"use strict";n.r(t);var i={hooks:{},extensions:[],wrappers:[],navbar:{add:!0,sticky:!0,title:"Menu",titleLink:"parent"},onClick:{close:null,preventDefault:null,setSelected:!0},slidingSubmenus:!0},s={classNames:{inset:"Inset",nolistview:"NoListview",nopanel:"NoPanel",panel:"Panel",selected:"Selected",vertical:"Vertical"},language:null,openingInterval:25,panelNodetype:["ul","ol","div"],transitionDuration:400};function a(e,t){for(var n in"object"!=o(e)&&(e={}),"object"!=o(t)&&(t={}),t)t.hasOwnProperty(n)&&(void 0===e[n]?e[n]=t[n]:"object"==o(e[n])&&a(e[n],t[n]));return e}function o(e){return{}.toString.call(e).match(/\s([a-zA-Z]+)/)[1].toLowerCase()}function r(e,t,n){if("function"==typeof t){var i=t.call(e);if(void 0!==i)return i}return null!==t&&"function"!=typeof t&&void 0!==t||void 0===n?t:n}function c(e,t,n){var i=!1,s=function(n){void 0!==n&&n.target!==e||(i||(e.removeEventListener("transitionend",s),e.removeEventListener("webkitTransitionEnd",s),t.call(e)),i=!0)};e.addEventListener("transitionend",s),e.addEventListener("webkitTransitionEnd",s),setTimeout(s,1.1*n)}function l(){return"mm-"+m++}var m=0;function d(e){return"mm-"==e.slice(0,3)?e.slice(3):e}var p={};function u(e,t){void 0===p[t]&&(p[t]={}),a(p[t],e)}var f={Menu:"منو"},h={Menu:"Menü"},v={Menu:"Меню"};function b(e){var t=e.split("."),n=document.createElement(t.shift());return t.forEach((function(e){n.classList.add(e)})),n}function g(e,t){return Array.prototype.slice.call(e.querySelectorAll(t))}function _(e,t){var n=Array.prototype.slice.call(e.children);return t?n.filter((function(e){return e.matches(t)})):n}function y(e,t){for(var n=[],i=e.parentElement;i;)n.push(i),i=i.parentElement;return t?n.filter((function(e){return e.matches(t)})):n}function L(e){return e.filter((function(e){return!e.matches(".mm-hidden")}))}function w(e){var t=[];return L(e).forEach((function(e){t.push.apply(t,_(e,"a.mm-listitem__text"))})),t.filter((function(e){return!e.matches(".mm-btn_next")}))}function E(e,t,n){e.matches("."+t)&&(e.classList.remove(t),e.classList.add(n))}var x={};function P(e,t,n){"number"==typeof e&&(e="(min-width: "+e+"px)"),x[e]=x[e]||[],x[e].push({yes:t,no:n})}function k(e,t){for(var n=t.matches?"yes":"no",i=0;i<x[e].length;i++)x[e][i][n]()}u({Menu:"Menu"},"nl"),u(f,"fa"),u(h,"de"),u(v,"ru");var S=(function(){function e(t,n,i){return this.opts=a(n,e.options),this.conf=a(i,e.configs),this._api=["bind","initPanel","initListview","openPanel","closePanel","closeAllPanels","setSelected"],this.node={},this.vars={},this.hook={},this.clck=[],this.node.menu="string"==typeof t?document.querySelector(t):t,"function"==typeof this._deprecatedWarnings&&this._deprecatedWarnings(),this._initWrappers(),this._initAddons(),this._initExtensions(),this._initHooks(),this._initAPI(),this._initMenu(),this._initPanels(),this._initOpened(),this._initAnchors(),(function(){var e=function(e){var t=window.matchMedia(e);k(e,t),t.onchange=function(n){k(e,t)}};for(var t in x)e(t)})(),this}return e.prototype.openPanel=function(e,t){var n=this;if(this.trigger("openPanel:before",[e]),e&&(e.matches(".mm-panel")||(e=e.closest(".mm-panel")),e)){if("boolean"!=typeof t&&(t=!0),e.parentElement.matches(".mm-listitem_vertical")){y(e,".mm-listitem_vertical").forEach((function(e){e.classList.add("mm-listitem_opened"),_(e,".mm-panel").forEach((function(e){e.classList.remove("mm-hidden")}))}));var i=y(e,".mm-panel").filter((function(e){return!e.parentElement.matches(".mm-listitem_vertical")}));this.trigger("openPanel:start",[e]),i.length&&this.openPanel(i[0]),this.trigger("openPanel:finish",[e])}else{if(e.matches(".mm-panel_opened"))return;var s=_(this.node.pnls,".mm-panel"),a=_(this.node.pnls,".mm-panel_opened")[0];s.filter((function(t){return t!==e})).forEach((function(e){e.classList.remove("mm-panel_opened-parent")}));for(var o=e.mmParent;o;)(o=o.closest(".mm-panel"))&&(o.parentElement.matches(".mm-listitem_vertical")||o.classList.add("mm-panel_opened-parent"),o=o.mmParent);s.forEach((function(e){e.classList.remove("mm-panel_highest")})),s.filter((function(e){return e!==a})).filter((function(t){return t!==e})).forEach((function(e){e.classList.add("mm-hidden")})),e.classList.remove("mm-hidden");var r=function(){a&&a.classList.remove("mm-panel_opened"),e.classList.add("mm-panel_opened"),e.matches(".mm-panel_opened-parent")?(a&&a.classList.add("mm-panel_highest"),e.classList.remove("mm-panel_opened-parent")):(a&&a.classList.add("mm-panel_opened-parent"),e.classList.add("mm-panel_highest")),n.trigger("openPanel:start",[e])},l=function(){a&&(a.classList.remove("mm-panel_highest"),a.classList.add("mm-hidden")),e.classList.remove("mm-panel_highest"),n.trigger("openPanel:finish",[e])};t&&!e.matches(".mm-panel_noanimation")?setTimeout((function(){c(e,(function(){l()}),n.conf.transitionDuration),r()}),this.conf.openingInterval):(r(),l())}this.trigger("openPanel:after",[e])}},e.prototype.closePanel=function(e){this.trigger("closePanel:before",[e]);var t=e.parentElement;t.matches(".mm-listitem_vertical")&&(t.classList.remove("mm-listitem_opened"),e.classList.add("mm-hidden"),this.trigger("closePanel",[e])),this.trigger("closePanel:after",[e])},e.prototype.closeAllPanels=function(e){this.trigger("closeAllPanels:before"),this.node.pnls.querySelectorAll(".mm-listitem").forEach((function(e){e.classList.remove("mm-listitem_selected"),e.classList.remove("mm-listitem_opened")}));var t=_(this.node.pnls,".mm-panel"),n=e||t[0];_(this.node.pnls,".mm-panel").forEach((function(e){e!==n&&(e.classList.remove("mm-panel_opened"),e.classList.remove("mm-panel_opened-parent"),e.classList.remove("mm-panel_highest"),e.classList.add("mm-hidden"))})),this.openPanel(n,!1),this.trigger("closeAllPanels:after")},e.prototype.togglePanel=function(e){var t=e.parentElement;t.matches(".mm-listitem_vertical")&&this[t.matches(".mm-listitem_opened")?"closePanel":"openPanel"](e)},e.prototype.setSelected=function(e){this.trigger("setSelected:before",[e]),g(this.node.menu,".mm-listitem_selected").forEach((function(e){e.classList.remove("mm-listitem_selected")})),e.classList.add("mm-listitem_selected"),this.trigger("setSelected:after",[e])},e.prototype.bind=function(e,t){this.hook[e]=this.hook[e]||[],this.hook[e].push(t)},e.prototype.trigger=function(e,t){if(this.hook[e])for(var n=0,i=this.hook[e].length;n<i;n++)this.hook[e][n].apply(this,t)},e.prototype._initAPI=function(){var e=this,t=this;this.API={},this._api.forEach((function(n){e.API[n]=function(){var e=t[n].apply(t,arguments);return void 0===e?t.API:e}})),this.node.menu.mmApi=this.API},e.prototype._initHooks=function(){for(var e in this.opts.hooks)this.bind(e,this.opts.hooks[e])},e.prototype._initWrappers=function(){this.trigger("initWrappers:before");for(var t=0;t<this.opts.wrappers.length;t++){var n=e.wrappers[this.opts.wrappers[t]];"function"==typeof n&&n.call(this)}this.trigger("initWrappers:after")},e.prototype._initAddons=function(){for(var t in this.trigger("initAddons:before"),e.addons)e.addons[t].call(this);this.trigger("initAddons:after")},e.prototype._initExtensions=function(){var e=this;this.trigger("initExtensions:before"),"array"==o(this.opts.extensions)&&(this.opts.extensions={all:this.opts.extensions}),Object.keys(this.opts.extensions).forEach((function(t){var n=e.opts.extensions[t].map((function(e){return"mm-menu_"+e}));n.length&&P(t,(function(){n.forEach((function(t){e.node.menu.classList.add(t)}))}),(function(){n.forEach((function(t){e.node.menu.classList.remove(t)}))}))})),this.trigger("initExtensions:after")},e.prototype._initMenu=function(){var e=this;this.trigger("initMenu:before"),this.node.wrpr=this.node.wrpr||this.node.menu.parentElement,this.node.wrpr.classList.add("mm-wrapper"),this.node.menu.id=this.node.menu.id||l();var t=b("div.mm-panels");_(this.node.menu).forEach((function(n){e.conf.panelNodetype.indexOf(n.nodeName.toLowerCase())>-1&&t.append(n)})),this.node.menu.append(t),this.node.pnls=t,this.node.menu.classList.add("mm-menu"),this.trigger("initMenu:after")},e.prototype._initPanels=function(){var e=this;this.trigger("initPanels:before"),this.clck.push((function(t,n){if(n.inMenu){var i=t.getAttribute("href");if(i&&i.length>1&&"#"==i.slice(0,1))try{var s=g(e.node.menu,i)[0];if(s&&s.matches(".mm-panel"))return t.parentElement.matches(".mm-listitem_vertical")?e.togglePanel(s):e.openPanel(s),!0}catch(e){}}})),_(this.node.pnls).forEach((function(t){e.initPanel(t)})),this.trigger("initPanels:after")},e.prototype.initPanel=function(e){var t=this,n=this.conf.panelNodetype.join(", ");if(e.matches(n)&&(e.matches(".mm-panel")||(e=this._initPanel(e)),e)){var i=[];i.push.apply(i,_(e,"."+this.conf.classNames.panel)),_(e,".mm-listview").forEach((function(e){_(e,".mm-listitem").forEach((function(e){i.push.apply(i,_(e,n))}))})),i.forEach((function(e){t.initPanel(e)}))}},e.prototype._initPanel=function(e){var t=this;if(this.trigger("initPanel:before",[e]),E(e,this.conf.classNames.panel,"mm-panel"),E(e,this.conf.classNames.nopanel,"mm-nopanel"),E(e,this.conf.classNames.inset,"mm-listview_inset"),e.matches(".mm-listview_inset")&&e.classList.add("mm-nopanel"),e.matches(".mm-nopanel"))return null;var n=e.id||l(),i=e.matches("."+this.conf.classNames.vertical)||!this.opts.slidingSubmenus;if(e.classList.remove(this.conf.classNames.vertical),e.matches("ul, ol")){e.removeAttribute("id");var s=b("div");e.before(s),s.append(e),e=s}e.id=n,e.classList.add("mm-panel"),e.classList.add("mm-hidden");var a=[e.parentElement].filter((function(e){return e.matches("li")}))[0];if(i?a&&a.classList.add("mm-listitem_vertical"):this.node.pnls.append(e),a&&(a.mmChild=e,e.mmParent=a,a&&a.matches(".mm-listitem")&&!_(a,".mm-btn").length)){var o=_(a,".mm-listitem__text")[0];if(o){var r=b("a.mm-btn.mm-btn_next.mm-listitem__btn");r.setAttribute("href","#"+e.id),o.matches("span")?(r.classList.add("mm-listitem__text"),r.innerHTML=o.innerHTML,a.insertBefore(r,o.nextElementSibling),o.remove()):a.insertBefore(r,_(a,".mm-panel")[0])}}return this._initNavbar(e),_(e,"ul, ol").forEach((function(e){t.initListview(e)})),this.trigger("initPanel:after",[e]),e},e.prototype._initNavbar=function(e){if(this.trigger("initNavbar:before",[e]),!_(e,".mm-navbar").length){var t=null,n=null;if(e.getAttribute("data-mm-parent")?n=g(this.node.pnls,e.getAttribute("data-mm-parent"))[0]:(t=e.mmParent)&&(n=t.closest(".mm-panel")),!t||!t.matches(".mm-listitem_vertical")){var i=b("div.mm-navbar");if(this.opts.navbar.add?this.opts.navbar.sticky&&i.classList.add("mm-navbar_sticky"):i.classList.add("mm-hidden"),n){var s=b("a.mm-btn.mm-btn_prev.mm-navbar__btn");s.setAttribute("href","#"+n.id),i.append(s)}var a=null;t?a=_(t,".mm-listitem__text")[0]:n&&(a=g(n,'a[href="#'+e.id+'"]')[0]);var o=b("a.mm-navbar__title"),r=b("span");switch(o.append(r),r.innerHTML=e.getAttribute("data-mm-title")||(a?a.textContent:"")||this.i18n(this.opts.navbar.title)||this.i18n("Menu"),this.opts.navbar.titleLink){case"anchor":a&&o.setAttribute("href",a.getAttribute("href"));break;case"parent":n&&o.setAttribute("href","#"+n.id)}i.append(o),e.prepend(i),this.trigger("initNavbar:after",[e])}}},e.prototype.initListview=function(e){var t=this;this.trigger("initListview:before",[e]),E(e,this.conf.classNames.nolistview,"mm-nolistview"),e.matches(".mm-nolistview")||(e.classList.add("mm-listview"),_(e).forEach((function(e){e.classList.add("mm-listitem"),E(e,t.conf.classNames.selected,"mm-listitem_selected"),_(e,"a, span").forEach((function(e){e.matches(".mm-btn")||e.classList.add("mm-listitem__text")}))}))),this.trigger("initListview:after",[e])},e.prototype._initOpened=function(){this.trigger("initOpened:before");var e=this.node.pnls.querySelectorAll(".mm-listitem_selected"),t=null;e.forEach((function(e){t=e,e.classList.remove("mm-listitem_selected")})),t&&t.classList.add("mm-listitem_selected");var n=t?t.closest(".mm-panel"):_(this.node.pnls,".mm-panel")[0];this.openPanel(n,!1),this.trigger("initOpened:after")},e.prototype._initAnchors=function(){var e=this;this.trigger("initAnchors:before"),document.addEventListener("click",(function(t){var n=t.target.closest("a[href]");if(n){for(var i={inMenu:n.closest(".mm-menu")===e.node.menu,inListview:n.matches(".mm-listitem > a"),toExternal:n.matches('[rel="external"]')||n.matches('[target="_blank"]')},s={close:null,setSelected:null,preventDefault:"#"==n.getAttribute("href").slice(0,1)},c=0;c<e.clck.length;c++){var l=e.clck[c].call(e,n,i);if(l){if("boolean"==typeof l)return void t.preventDefault();"object"==o(l)&&(s=a(l,s))}}i.inMenu&&i.inListview&&!i.toExternal&&(r(n,e.opts.onClick.setSelected,s.setSelected)&&e.setSelected(n.parentElement),r(n,e.opts.onClick.preventDefault,s.preventDefault)&&t.preventDefault(),r(n,e.opts.onClick.close,s.close)&&e.opts.offCanvas&&"function"==typeof e.close&&e.close())}}),!0),this.trigger("initAnchors:after")},e.prototype.i18n=function(e){return (function(e,t){return"string"==typeof t&&void 0!==p[t]&&p[t][e]||e})(e,this.conf.language)},e.version="8.4.6",e.options=i,e.configs=s,e.addons={},e.wrappers={},e.node={},e.vars={},e})(),M={blockUI:!0,moveBackground:!0};var A={clone:!1,menu:{insertMethod:"prepend",insertSelector:"body"},page:{nodetype:"div",selector:null,noSelector:[]}};function T(e){return e?e.charAt(0).toUpperCase()+e.slice(1):""}function C(e,t,n){var i=t.split(".");e[t="mmEvent"+T(i[0])+T(i[1])]=e[t]||[],e[t].push(n),e.addEventListener(i[0],n)}function N(e,t){var n=t.split(".");t="mmEvent"+T(n[0])+T(n[1]),(e[t]||[]).forEach((function(t){e.removeEventListener(n[0],t)}))}S.options.offCanvas=M,S.configs.offCanvas=A;S.prototype.open=function(){var e=this;this.trigger("open:before"),this.vars.opened||(this._openSetup(),setTimeout((function(){e._openStart()}),this.conf.openingInterval),this.trigger("open:after"))},S.prototype._openSetup=function(){var e=this,t=this.opts.offCanvas;this.closeAllOthers(),S.node.page.mmStyle=S.node.page.getAttribute("style")||"",(function(e,t,n){var i=t.split(".");(e[t="mmEvent"+T(i[0])+T(i[1])]||[]).forEach((function(e){e(n||{})}))})(window,"resize.page",{force:!0});var n=["mm-wrapper_opened"];t.blockUI&&n.push("mm-wrapper_blocking"),"modal"==t.blockUI&&n.push("mm-wrapper_modal"),t.moveBackground&&n.push("mm-wrapper_background"),n.forEach((function(t){e.node.wrpr.classList.add(t)})),setTimeout((function(){e.vars.opened=!0}),this.conf.openingInterval),this.node.menu.classList.add("mm-menu_opened")},S.prototype._openStart=function(){var e=this;c(S.node.page,(function(){e.trigger("open:finish")}),this.conf.transitionDuration),this.trigger("open:start"),this.node.wrpr.classList.add("mm-wrapper_opening")},S.prototype.close=function(){var e=this;this.trigger("close:before"),this.vars.opened&&(c(S.node.page,(function(){e.node.menu.classList.remove("mm-menu_opened");["mm-wrapper_opened","mm-wrapper_blocking","mm-wrapper_modal","mm-wrapper_background"].forEach((function(t){e.node.wrpr.classList.remove(t)})),S.node.page.setAttribute("style",S.node.page.mmStyle),e.vars.opened=!1,e.trigger("close:finish")}),this.conf.transitionDuration),this.trigger("close:start"),this.node.wrpr.classList.remove("mm-wrapper_opening"),this.trigger("close:after"))},S.prototype.closeAllOthers=function(){var e=this;g(document.body,".mm-menu_offcanvas").forEach((function(t){if(t!==e.node.menu){var n=t.mmApi;n&&n.close&&n.close()}}))},S.prototype.setPage=function(e){this.trigger("setPage:before",[e]);var t=this.conf.offCanvas;if(!e){var n="string"==typeof t.page.selector?g(document.body,t.page.selector):_(document.body,t.page.nodetype);if(n=n.filter((function(e){return!e.matches(".mm-menu, .mm-wrapper__blocker")})),t.page.noSelector.length&&(n=n.filter((function(e){return!e.matches(t.page.noSelector.join(", "))}))),n.length>1){var i=b("div");n[0].before(i),n.forEach((function(e){i.append(e)})),n=[i]}e=n[0]}e.classList.add("mm-page"),e.classList.add("mm-slideout"),e.id=e.id||l(),S.node.page=e,this.trigger("setPage:after",[e])};var H=function(){var e=this;N(document.body,"keydown.tabguard"),C(document.body,"keydown.tabguard",(function(t){9==t.keyCode&&e.node.wrpr.matches(".mm-wrapper_opened")&&t.preventDefault()}))},j=function(){var e=this;this.trigger("initBlocker:before");var t=this.opts.offCanvas,n=this.conf.offCanvas;if(t.blockUI){if(!S.node.blck){var i=b("div.mm-wrapper__blocker.mm-slideout");i.innerHTML="<a></a>",document.querySelector(n.menu.insertSelector).append(i),S.node.blck=i}var s=function(t){t.preventDefault(),t.stopPropagation(),e.node.wrpr.matches(".mm-wrapper_modal")||e.close()};S.node.blck.addEventListener("mousedown",s),S.node.blck.addEventListener("touchstart",s),S.node.blck.addEventListener("touchmove",s),this.trigger("initBlocker:after")}},D={aria:!0,text:!0};var O={text:{closeMenu:"Close menu",closeSubmenu:"Close submenu",openSubmenu:"Open submenu",toggleSubmenu:"Toggle submenu"}},I={"Close menu":"بستن منو","Close submenu":"بستن زیرمنو","Open submenu":"بازکردن زیرمنو","Toggle submenu":"سوییچ زیرمنو"},q={"Close menu":"Menü schließen","Close submenu":"Untermenü schließen","Open submenu":"Untermenü öffnen","Toggle submenu":"Untermenü wechseln"},B={"Close menu":"Закрыть меню","Close submenu":"Закрыть подменю","Open submenu":"Открыть подменю","Toggle submenu":"Переключить подменю"};u({"Close menu":"Menu sluiten","Close submenu":"Submenu sluiten","Open submenu":"Submenu openen","Toggle submenu":"Submenu wisselen"},"nl"),u(I,"fa"),u(q,"de"),u(B,"ru"),S.options.screenReader=D,S.configs.screenReader=O;var z;z=function(e,t,n){e[t]=n,n?e.setAttribute(t,n.toString()):e.removeAttribute(t)},S.sr_aria=function(e,t,n){z(e,"aria-"+t,n)},S.sr_role=function(e,t){z(e,"role",t)},S.sr_text=function(e){return'<span class="mm-sronly">'+e+"</span>"};var R={fix:!0};var U="ontouchstart"in window||!!navigator.msMaxTouchPoints||!1;S.options.scrollBugFix=R;var W={height:"default"};S.options.autoHeight=W;var Y={close:!1,open:!1};S.options.backButton=Y;var F={add:!1,visible:{min:1,max:3}};S.options.columns=F;var X={add:!1,addTo:"panels",count:!1};S.options.counters=X,S.configs.classNames.counters={counter:"Counter"};var V={add:!1,addTo:"panels"};S.options.dividers=V,S.configs.classNames.divider="Divider";var Z={open:!1,node:null};var G="ontouchstart"in window||!!navigator.msMaxTouchPoints||!1,K={top:0,right:0,bottom:0,left:0},Q={start:15,swipe:15},J={x:["Right","Left"],y:["Down","Up"]},$=0,ee=1,te=2,ne=function(e,t){return"string"==typeof e&&"%"==e.slice(-1)&&(e=t*((e=parseInt(e.slice(0,-1),10))/100)),e},ie=(function(){function e(e,t,n){this.surface=e,this.area=a(t,K),this.treshold=a(n,Q),this.surface.mmHasDragEvents||(this.surface.addEventListener(G?"touchstart":"mousedown",this.start.bind(this)),this.surface.addEventListener(G?"touchend":"mouseup",this.stop.bind(this)),this.surface.addEventListener(G?"touchleave":"mouseleave",this.stop.bind(this)),this.surface.addEventListener(G?"touchmove":"mousemove",this.move.bind(this))),this.surface.mmHasDragEvents=!0}return e.prototype.start=function(e){this.currentPosition={x:e.touches?e.touches[0].pageX:e.pageX||0,y:e.touches?e.touches[0].pageY:e.pageY||0};var t=this.surface.clientWidth,n=this.surface.clientHeight,i=ne(this.area.top,n);if(!("number"==typeof i&&this.currentPosition.y<i)){var s=ne(this.area.right,t);if(!("number"==typeof s&&(s=t-s,this.currentPosition.x>s))){var a=ne(this.area.bottom,n);if(!("number"==typeof a&&(a=n-a,this.currentPosition.y>a))){var o=ne(this.area.left,t);"number"==typeof o&&this.currentPosition.x<o||(this.startPosition={x:this.currentPosition.x,y:this.currentPosition.y},this.state=ee)}}}},e.prototype.stop=function(e){if(this.state==te){var t=this._dragDirection(),n=this._eventDetail(t);if(this._dispatchEvents("drag*End",n),Math.abs(this.movement[this.axis])>this.treshold.swipe){var i=this._swipeDirection();n.direction=i,this._dispatchEvents("swipe*",n)}}this.state=$},e.prototype.move=function(e){switch(this.state){case ee:case te:var t={x:e.changedTouches?e.touches[0].pageX:e.pageX||0,y:e.changedTouches?e.touches[0].pageY:e.pageY||0};this.movement={x:t.x-this.currentPosition.x,y:t.y-this.currentPosition.y},this.distance={x:t.x-this.startPosition.x,y:t.y-this.startPosition.y},this.currentPosition={x:t.x,y:t.y},this.axis=Math.abs(this.distance.x)>Math.abs(this.distance.y)?"x":"y";var n=this._dragDirection(),i=this._eventDetail(n);this.state==ee&&Math.abs(this.distance[this.axis])>this.treshold.start&&(this._dispatchEvents("drag*Start",i),this.state=te),this.state==te&&this._dispatchEvents("drag*Move",i)}},e.prototype._eventDetail=function(e){var t=this.distance.x,n=this.distance.y;return"x"==this.axis&&(t-=t>0?this.treshold.start:0-this.treshold.start),"y"==this.axis&&(n-=n>0?this.treshold.start:0-this.treshold.start),{axis:this.axis,direction:e,movementX:this.movement.x,movementY:this.movement.y,distanceX:t,distanceY:n}},e.prototype._dispatchEvents=function(e,t){var n=new CustomEvent(e.replace("*",""),{detail:t});this.surface.dispatchEvent(n);var i=new CustomEvent(e.replace("*",this.axis.toUpperCase()),{detail:t});this.surface.dispatchEvent(i);var s=new CustomEvent(e.replace("*",t.direction),{detail:t});this.surface.dispatchEvent(s)},e.prototype._dragDirection=function(){return J[this.axis][this.distance[this.axis]>0?0:1]},e.prototype._swipeDirection=function(){return J[this.axis][this.movement[this.axis]>0?0:1]},e})(),se=null,ae=null,oe=0,re=function(e){var t=this,n={},i=!1,s=function(){var e=Object.keys(t.opts.extensions);e.length?(P(e.join(", "),(function(){}),(function(){n=ce(n,[],t.node.menu)})),e.forEach((function(e){P(e,(function(){n=ce(n,t.opts.extensions[e],t.node.menu)}),(function(){}))}))):n=ce(n,[],t.node.menu)};ae&&(N(ae,"dragStart"),N(ae,"dragMove"),N(ae,"dragEnd")),se=new ie(ae=e),s(),s=function(){},ae&&(C(ae,"dragStart",(function(e){e.detail.direction==n.direction&&(i=!0,t.node.wrpr.classList.add("mm-wrapper_dragging"),t._openSetup(),t.trigger("open:start"),oe=t.node.menu["x"==n.axis?"clientWidth":"clientHeight"])})),C(ae,"dragMove",(function(e){if(e.detail.axis==n.axis&&i){var t=e.detail["distance"+n.axis.toUpperCase()];switch(n.position){case"right":case"bottom":t=Math.min(Math.max(t,-oe),0);break;default:t=Math.max(Math.min(t,oe),0)}if("front"==n.zposition)switch(n.position){case"right":case"bottom":t+=oe;break;default:t-=oe}n.slideOutNodes.forEach((function(e){e.style.transform="translate"+n.axis.toUpperCase()+"("+t+"px)"}))}})),C(ae,"dragEnd",(function(e){if(e.detail.axis==n.axis&&i){i=!1,t.node.wrpr.classList.remove("mm-wrapper_dragging"),n.slideOutNodes.forEach((function(e){e.style.transform=""}));var s=Math.abs(e.detail["distance"+n.axis.toUpperCase()])>=.75*oe;if(!s){var a=e.detail["movement"+n.axis.toUpperCase()];switch(n.position){case"right":case"bottom":s=a<=0;break;default:s=a>=0}}s?t._openStart():t.close()}})))},ce=function(e,t,n){switch(e.position="left",e.zposition="back",["right","top","bottom"].forEach((function(n){t.indexOf("position-"+n)>-1&&(e.position=n)})),["front","top","bottom"].forEach((function(n){t.indexOf("position-"+n)>-1&&(e.zposition="front")})),se.area={top:"bottom"==e.position?"75%":0,right:"left"==e.position?"75%":0,bottom:"top"==e.position?"75%":0,left:"right"==e.position?"75%":0},e.position){case"top":case"bottom":e.axis="y";break;default:e.axis="x"}switch(e.position){case"top":e.direction="Down";break;case"right":e.direction="Left";break;case"bottom":e.direction="Up";break;default:e.direction="Right"}switch(e.zposition){case"front":e.slideOutNodes=[n];break;default:e.slideOutNodes=g(document.body,".mm-slideout")}return e};S.options.drag=Z;var le={drop:!1,fitViewport:!0,event:"click",position:{},tip:!0};var me={offset:{button:{x:-5,y:5},viewport:{x:20,y:20}},height:{max:880},width:{max:440}};S.options.dropdown=le,S.configs.dropdown=me;var de={insertMethod:"append",insertSelector:"body"};S.configs.fixedElements=de,S.configs.classNames.fixedElements={fixed:"Fixed"};var pe={use:!1,top:[],bottom:[],position:"left",type:"default"};S.options.iconbar=pe;var ue={add:!1,blockPanel:!0,hideDivider:!1,hideNavbar:!0,visible:3};S.options.iconPanels=ue;var fe={enable:!1,enhance:!1};S.options.keyboardNavigation=fe;var he=function(e){var t=this;N(document.body,"keydown.tabguard"),N(document.body,"focusin.tabguard"),C(document.body,"focusin.tabguard",(function(e){if(t.node.wrpr.matches(".mm-wrapper_opened")){var n=e.target;if(n.matches(".mm-tabend")){var i=void 0;n.parentElement.matches(".mm-menu")&&S.node.blck&&(i=S.node.blck),n.parentElement.matches(".mm-wrapper__blocker")&&(i=g(document.body,".mm-menu_offcanvas.mm-menu_opened")[0]),i||(i=n.parentElement),i&&_(i,".mm-tabstart")[0].focus()}}})),N(document.body,"keydown.navigate"),C(document.body,"keydown.navigate",(function(t){var n=t.target,i=n.closest(".mm-menu");if(i){i.mmApi;if(!n.matches("input, textarea"))switch(t.keyCode){case 13:(n.matches(".mm-toggle")||n.matches(".mm-check"))&&n.dispatchEvent(new Event("click"));break;case 32:case 37:case 38:case 39:case 40:t.preventDefault()}if(e)if(n.matches("input"))switch(t.keyCode){case 27:n.value=""}else{var s=i.mmApi;switch(t.keyCode){case 8:var a=g(i,".mm-panel_opened")[0].mmParent;a&&s.openPanel(a.closest(".mm-panel"));break;case 27:i.matches(".mm-menu_offcanvas")&&s.close()}}}}))},ve={load:!1};S.options.lazySubmenus=ve;var be=[];var ge={breadcrumbs:{separator:"/",removeFirst:!1}};function _e(){var e=this,t=this.opts.navbars;if(void 0!==t){t instanceof Array||(t=[t]);var n={};t.length&&(t.forEach((function(t){if(!(t=(function(e){return"boolean"==typeof e&&e&&(e={}),"object"!=typeof e&&(e={}),void 0===e.content&&(e.content=["prev","title"]),e.content instanceof Array||(e.content=[e.content]),void 0===e.use&&(e.use=!0),"boolean"==typeof e.use&&e.use&&(e.use=!0),e})(t)).use)return!1;var i=b("div.mm-navbar"),s=t.position;"bottom"!==s&&(s="top"),n[s]||(n[s]=b("div.mm-navbars_"+s)),n[s].append(i);for(var a=0,o=t.content.length;a<o;a++){var r,c=t.content[a];if("string"==typeof c)if("function"==typeof(r=_e.navbarContents[c]))r.call(e,i);else{var l=b("span");l.innerHTML=c;var m=_(l);1==m.length&&(l=m[0]),i.append(l)}else i.append(c)}"string"==typeof t.type&&("function"==typeof(r=_e.navbarTypes[t.type])&&r.call(e,i));"boolean"!=typeof t.use&&P(t.use,(function(){i.classList.remove("mm-hidden"),S.sr_aria(i,"hidden",!1)}),(function(){i.classList.add("mm-hidden"),S.sr_aria(i,"hidden",!0)}))})),this.bind("initMenu:after",(function(){for(var t in n)e.node.menu["bottom"==t?"append":"prepend"](n[t])})))}}S.options.navbars=be,S.configs.navbars=ge,S.configs.classNames.navbars={panelNext:"Next",panelPrev:"Prev",panelTitle:"Title"},_e.navbarContents={breadcrumbs:function(e){var t=this,n=b("div.mm-navbar__breadcrumbs");e.append(n),this.bind("initNavbar:after",(function(e){if(!e.querySelector(".mm-navbar__breadcrumbs")){_(e,".mm-navbar")[0].classList.add("mm-hidden");for(var n=[],i=b("span.mm-navbar__breadcrumbs"),s=e,a=!0;s;){if(!(s=s.closest(".mm-panel")).parentElement.matches(".mm-listitem_vertical")){var o=g(s,".mm-navbar__title span")[0];if(o){var r=o.textContent;r.length&&n.unshift(a?"<span>"+r+"</span>":'<a href="#'+s.id+'">'+r+"</a>")}a=!1}s=s.mmParent}t.conf.navbars.breadcrumbs.removeFirst&&n.shift(),i.innerHTML=n.join('<span class="mm-separator">'+t.conf.navbars.breadcrumbs.separator+"</span>"),_(e,".mm-navbar")[0].append(i)}})),this.bind("openPanel:start",(function(e){var t=e.querySelector(".mm-navbar__breadcrumbs");n.innerHTML=t?t.innerHTML:""})),this.bind("initNavbar:after:sr-aria",(function(e){g(e,".mm-breadcrumbs a").forEach((function(e){S.sr_aria(e,"owns",e.getAttribute("href").slice(1))}))}))},close:function(e){var t=this,n=b("a.mm-btn.mm-btn_close.mm-navbar__btn");e.append(n),this.bind("setPage:after",(function(e){n.setAttribute("href","#"+e.id)})),this.bind("setPage:after:sr-text",(function(){n.innerHTML=S.sr_text(t.i18n(t.conf.screenReader.text.closeMenu)),S.sr_aria(n,"owns",n.getAttribute("href").slice(1))}))},next:function(e){var t,n,i,s=this,a=b("a.mm-btn.mm-btn_next.mm-navbar__btn");e.append(a),this.bind("openPanel:start",(function(e){t=e.querySelector("."+s.conf.classNames.navbars.panelNext),n=t?t.getAttribute("href"):"",i=t?t.innerHTML:"",n?a.setAttribute("href",n):a.removeAttribute("href"),a.classList[n||i?"remove":"add"]("mm-hidden"),a.innerHTML=i})),this.bind("openPanel:start:sr-aria",(function(e){S.sr_aria(a,"hidden",a.matches("mm-hidden")),S.sr_aria(a,"owns",(a.getAttribute("href")||"").slice(1))}))},prev:function(e){var t,n,i,s=this,a=b("a.mm-btn.mm-btn_prev.mm-navbar__btn");e.append(a),this.bind("initNavbar:after",(function(e){_(e,".mm-navbar")[0].classList.add("mm-hidden")})),this.bind("openPanel:start",(function(e){e.parentElement.matches(".mm-listitem_vertical")||((t=e.querySelector("."+s.conf.classNames.navbars.panelPrev))||(t=e.querySelector(".mm-navbar__btn.mm-btn_prev")),n=t?t.getAttribute("href"):"",i=t?t.innerHTML:"",n?a.setAttribute("href",n):a.removeAttribute("href"),a.classList[n||i?"remove":"add"]("mm-hidden"),a.innerHTML=i)})),this.bind("initNavbar:after:sr-aria",(function(e){S.sr_aria(e.querySelector(".mm-navbar"),"hidden",!0)})),this.bind("openPanel:start:sr-aria",(function(e){S.sr_aria(a,"hidden",a.matches(".mm-hidden")),S.sr_aria(a,"owns",(a.getAttribute("href")||"").slice(1))}))},searchfield:function(e){"object"!=o(this.opts.searchfield)&&(this.opts.searchfield={});var t=b("div.mm-navbar__searchfield");e.append(t),this.opts.searchfield.add=!0,this.opts.searchfield.addTo=[t]},title:function(e){var t,n,i,s,a=this,o=b("a.mm-navbar__title"),r=b("span");o.append(r),e.append(o),this.bind("openPanel:start",(function(e){e.parentElement.matches(".mm-listitem_vertical")||((i=e.querySelector("."+a.conf.classNames.navbars.panelTitle))||(i=e.querySelector(".mm-navbar__title span")),(t=i?i.getAttribute("href"):"")?o.setAttribute("href",t):o.removeAttribute("href"),n=i?i.innerHTML:"",r.innerHTML=n)})),this.bind("openPanel:start:sr-aria",(function(e){if(a.opts.screenReader.text){if(!s)_(a.node.menu,".mm-navbars_top, .mm-navbars_bottom").forEach((function(e){var t=e.querySelector(".mm-btn_prev");t&&(s=t)}));if(s){var t=!0;"parent"==a.opts.navbar.titleLink&&(t=!s.matches(".mm-hidden")),S.sr_aria(o,"hidden",t)}}}))}},_e.navbarTypes={tabs:function(e){var t=this;e.classList.add("mm-navbar_tabs"),e.parentElement.classList.add("mm-navbars_has-tabs");var n=_(e,"a");e.addEventListener("click",(function(e){var n=e.target;if(n.matches("a"))if(n.matches(".mm-navbar__tab_selected"))e.stopImmediatePropagation();else try{t.openPanel(t.node.menu.querySelector(n.getAttribute("href")),!1),e.stopImmediatePropagation()}catch(e){}})),this.bind("openPanel:start",(function e(t){n.forEach((function(e){e.classList.remove("mm-navbar__tab_selected")}));var i=n.filter((function(e){return e.matches('[href="#'+t.id+'"]')}))[0];if(i)i.classList.add("mm-navbar__tab_selected");else{var s=t.mmParent;s&&e.call(this,s.closest(".mm-panel"))}}))}};var ye={scroll:!1,update:!1};var Le={scrollOffset:0,updateOffset:50};S.options.pageScroll=ye,S.configs.pageScroll=Le;var we={add:!1,addTo:"panels",cancel:!1,noResults:"No results found.",placeholder:"Search",panel:{add:!1,dividers:!0,fx:"none",id:null,splash:null,title:"Search"},search:!0,showTextItems:!1,showSubPanels:!0};var Ee={clear:!1,form:!1,input:!1,submit:!1},xe={Search:"جستجو","No results found.":"نتیجه‌ای یافت نشد.",cancel:"انصراف"},Pe={Search:"Suche","No results found.":"Keine Ergebnisse gefunden.",cancel:"beenden"},ke={Search:"Найти","No results found.":"Ничего не найдено.",cancel:"отменить"};u({Search:"Zoeken","No results found.":"Geen resultaten gevonden.",cancel:"annuleren"},"nl"),u(xe,"fa"),u(Pe,"de"),u(ke,"ru"),S.options.searchfield=we,S.configs.searchfield=Ee;var Se=function(){var e=this.opts.searchfield,t=(this.conf.searchfield,_(this.node.pnls,".mm-panel_search")[0]);if(t)return t;t=b("div.mm-panel.mm-panel_search.mm-hidden"),e.panel.id&&(t.id=e.panel.id),e.panel.title&&t.setAttribute("data-mm-title",e.panel.title);var n=b("ul");switch(t.append(n),this.node.pnls.append(t),this.initListview(n),this._initNavbar(t),e.panel.fx){case!1:break;case"none":t.classList.add("mm-panel_noanimation");break;default:t.classList.add("mm-panel_fx-"+e.panel.fx)}if(e.panel.splash){var i=b("div.mm-panel__content");i.innerHTML=e.panel.splash,t.append(i)}return t.classList.add("mm-panel"),t.classList.add("mm-hidden"),this.node.pnls.append(t),t},Me=function(e){var t=this.opts.searchfield,n=this.conf.searchfield;if(e.parentElement.matches(".mm-listitem_vertical"))return null;if(a=g(e,".mm-searchfield")[0])return a;function i(e,t){if(t)for(var n in t)e.setAttribute(n,t[n])}var s,a=b((n.form?"form":"div")+".mm-searchfield"),o=b("div.mm-searchfield__input"),r=b("input");(r.type="text",r.autocomplete="off",r.placeholder=this.i18n(t.placeholder),o.append(r),a.append(o),e.prepend(a),i(r,n.input),n.clear)&&((s=b("a.mm-btn.mm-btn_close.mm-searchfield__btn")).setAttribute("href","#"),o.append(s));(i(a,n.form),n.form&&n.submit&&!n.clear)&&((s=b("a.mm-btn.mm-btn_next.mm-searchfield__btn")).setAttribute("href","#"),o.append(s));t.cancel&&((s=b("a.mm-searchfield__cancel")).setAttribute("href","#"),s.textContent=this.i18n("cancel"),a.append(s));return a},Ae=function(e){var t=this,n=this.opts.searchfield,i=(this.conf.searchfield,{});e.closest(".mm-panel_search")?(i.panels=g(this.node.pnls,".mm-panel"),i.noresults=[e.closest(".mm-panel")]):e.closest(".mm-panel")?(i.panels=[e.closest(".mm-panel")],i.noresults=i.panels):(i.panels=g(this.node.pnls,".mm-panel"),i.noresults=[this.node.menu]),i.panels=i.panels.filter((function(e){return!e.parentElement.matches(".mm-listitem_vertical")})),i.panels=i.panels.filter((function(e){return!e.matches(".mm-panel_search")})),i.listitems=[],i.dividers=[],i.panels.forEach((function(e){var t,n;(t=i.listitems).push.apply(t,g(e,".mm-listitem")),(n=i.dividers).push.apply(n,g(e,".mm-divider"))}));var s=_(this.node.pnls,".mm-panel_search")[0],a=g(e,"input")[0],o=g(e,".mm-searchfield__cancel")[0];a.mmSearchfield=i,n.panel.add&&n.panel.splash&&(N(a,"focus.splash"),C(a,"focus.splash",(function(e){t.openPanel(s)}))),n.cancel&&(N(a,"focus.cancel"),C(a,"focus.cancel",(function(e){o.classList.add("mm-searchfield__cancel-active")})),N(o,"click.splash"),C(o,"click.splash",(function(e){if(e.preventDefault(),o.classList.remove("mm-searchfield__cancel-active"),s.matches(".mm-panel_opened")){var n=_(t.node.pnls,".mm-panel_opened-parent");n.length&&t.openPanel(n[n.length-1])}}))),n.panel.add&&"panel"==n.addTo&&this.bind("openPanel:finish",(function(e){e===s&&a.focus()})),N(a,"input.search"),C(a,"input.search",(function(e){switch(e.keyCode){case 9:case 16:case 17:case 18:case 37:case 38:case 39:case 40:break;default:t.search(a)}})),this.search(a)},Te=function(e){if(e){var t=this.opts.searchfield;this.conf.searchfield;if(e.closest(".mm-panel")||(e=_(this.node.pnls,".mm-panel")[0]),!_(e,".mm-panel__noresultsmsg").length){var n=b("div.mm-panel__noresultsmsg.mm-hidden");n.innerHTML=this.i18n(t.noResults),e.append(n)}}};S.prototype.search=function(e,t){var n,i=this,s=this.opts.searchfield;this.conf.searchfield;t=(t=t||""+e.value).toLowerCase().trim();var a=e.mmSearchfield,o=g(e.closest(".mm-searchfield"),".mm-btn"),r=_(this.node.pnls,".mm-panel_search")[0],c=a.panels,l=a.noresults,m=a.listitems,d=a.dividers;if(m.forEach((function(e){e.classList.remove("mm-listitem_nosubitems"),e.classList.remove("mm-listitem_onlysubitems"),e.classList.remove("mm-hidden")})),r&&(_(r,".mm-listview")[0].innerHTML=""),c.forEach((function(e){e.scrollTop=0})),t.length){d.forEach((function(e){e.classList.add("mm-hidden")})),m.forEach((function(e){var n,i=_(e,".mm-listitem__text")[0],a=!1;i&&(n=i,Array.prototype.slice.call(n.childNodes).filter((function(e){return 3==e.nodeType})).map((function(e){return e.textContent})).join(" ")).toLowerCase().indexOf(t)>-1&&(i.matches(".mm-listitem__btn")?s.showSubPanels&&(a=!0):i.matches("a")?a=!0:s.showTextItems&&(a=!0)),a||e.classList.add("mm-hidden")}));var p=m.filter((function(e){return!e.matches(".mm-hidden")})).length;if(s.panel.add){var u=[];c.forEach((function(e){var t=L(g(e,".mm-listitem"));if((t=t.filter((function(e){return!e.matches(".mm-hidden")}))).length){if(s.panel.dividers){var n=b("li.mm-divider"),i=g(e,".mm-navbar__title")[0];i&&(n.innerHTML=i.innerHTML,u.push(n))}t.forEach((function(e){u.push(e.cloneNode(!0))}))}})),u.forEach((function(e){e.querySelectorAll(".mm-toggle, .mm-check").forEach((function(e){e.remove()}))})),(n=_(r,".mm-listview")[0]).append.apply(n,u),this.openPanel(r)}else s.showSubPanels&&c.forEach((function(e){L(g(e,".mm-listitem")).forEach((function(e){var t=e.mmChild;t&&g(t,".mm-listitem").forEach((function(e){e.classList.remove("mm-hidden")}))}))})),c.slice().reverse().forEach((function(t,n){var s=t.mmParent;s&&(L(g(t,".mm-listitem")).length?(s.matches(".mm-hidden")&&s.classList.remove("mm-hidden"),s.classList.add("mm-listitem_onlysubitems")):e.closest(".mm-panel")||((t.matches(".mm-panel_opened")||t.matches(".mm-panel_opened-parent"))&&setTimeout((function(){i.openPanel(s.closest(".mm-panel"))}),(n+1)*(1.5*i.conf.openingInterval)),s.classList.add("mm-listitem_nosubitems")))})),c.forEach((function(e){L(g(e,".mm-listitem")).forEach((function(e){var t=(function(e,t){for(var n=[],i=e.previousElementSibling;i;)t&&!i.matches(t)||n.push(i),i=i.previousElementSibling;return n})(e,".mm-divider")[0];t&&t.classList.remove("mm-hidden")}))}));o.forEach((function(e){return e.classList.remove("mm-hidden")})),l.forEach((function(e){g(e,".mm-panel__noresultsmsg").forEach((function(e){return e.classList[p?"add":"remove"]("mm-hidden")}))})),s.panel.add&&(s.panel.splash&&g(r,".mm-panel__content").forEach((function(e){return e.classList.add("mm-hidden")})),m.forEach((function(e){return e.classList.remove("mm-hidden")})),d.forEach((function(e){return e.classList.remove("mm-hidden")})))}else if(m.forEach((function(e){return e.classList.remove("mm-hidden")})),d.forEach((function(e){return e.classList.remove("mm-hidden")})),o.forEach((function(e){return e.classList.add("mm-hidden")})),l.forEach((function(e){g(e,".mm-panel__noresultsmsg").forEach((function(e){return e.classList.add("mm-hidden")}))})),s.panel.add)if(s.panel.splash)g(r,".mm-panel__content").forEach((function(e){return e.classList.remove("mm-hidden")}));else if(!e.closest(".mm-panel_search")){var f=_(this.node.pnls,".mm-panel_opened-parent");this.openPanel(f.slice(-1)[0])}this.trigger("updateListview")};var Ce={add:!1,addTo:"panels"};S.options.sectionIndexer=Ce;var Ne={current:!0,hover:!1,parent:!1};S.options.setSelected=Ne;var He={collapsed:{use:!1,blockMenu:!0,hideDivider:!1,hideNavbar:!0},expanded:{use:!1,initial:"open"}};S.options.sidebar=He;S.configs.classNames.toggles={toggle:"Toggle",check:"Check"};
    /*!
     * mmenu.js
     * mmenujs.com
     *
     * Copyright (c) Fred Heusschen
     * frebsite.nl
     *
     * License: CC-BY-NC-4.0
     * http://creativecommons.org/licenses/by-nc/4.0/
     */
    S.addons={offcanvas:function(){var e=this;if(this.opts.offCanvas){var t=(function(e){return"object"!=typeof e&&(e={}),e})(this.opts.offCanvas);this.opts.offCanvas=a(t,S.options.offCanvas);var n=this.conf.offCanvas;this._api.push("open","close","setPage"),this.vars.opened=!1,this.bind("initMenu:before",(function(){n.clone&&(e.node.menu=e.node.menu.cloneNode(!0),e.node.menu.id&&(e.node.menu.id="mm-"+e.node.menu.id),g(e.node.menu,"[id]").forEach((function(e){e.id="mm-"+e.id}))),e.node.wrpr=document.body,document.querySelector(n.menu.insertSelector)[n.menu.insertMethod](e.node.menu)})),this.bind("initMenu:after",(function(){j.call(e),e.setPage(S.node.page),H.call(e),e.node.menu.classList.add("mm-menu_offcanvas");var t=window.location.hash;if(t){var n=d(e.node.menu.id);n&&n==t.slice(1)&&setTimeout((function(){e.open()}),1e3)}})),this.bind("setPage:after",(function(e){S.node.blck&&_(S.node.blck,"a").forEach((function(t){t.setAttribute("href","#"+e.id)}))})),this.bind("open:start:sr-aria",(function(){S.sr_aria(e.node.menu,"hidden",!1)})),this.bind("close:finish:sr-aria",(function(){S.sr_aria(e.node.menu,"hidden",!0)})),this.bind("initMenu:after:sr-aria",(function(){S.sr_aria(e.node.menu,"hidden",!0)})),this.bind("initBlocker:after:sr-text",(function(){_(S.node.blck,"a").forEach((function(t){t.innerHTML=S.sr_text(e.i18n(e.conf.screenReader.text.closeMenu))}))})),this.clck.push((function(t,n){var i=d(e.node.menu.id);if(i&&t.matches('[href="#'+i+'"]')){if(n.inMenu)return e.open(),!0;var s=t.closest(".mm-menu");if(s){var a=s.mmApi;if(a&&a.close)return a.close(),c(s,(function(){e.open()}),e.conf.transitionDuration),!0}return e.open(),!0}if((i=S.node.page.id)&&t.matches('[href="#'+i+'"]'))return e.close(),!0}))}},screenReader:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={aria:e,text:e}),"object"!=typeof e&&(e={}),e})(this.opts.screenReader);this.opts.screenReader=a(t,S.options.screenReader);var n=this.conf.screenReader;t.aria&&(this.bind("initAddons:after",(function(){e.bind("initMenu:after",(function(){this.trigger("initMenu:after:sr-aria",[].slice.call(arguments))})),e.bind("initNavbar:after",(function(){this.trigger("initNavbar:after:sr-aria",[].slice.call(arguments))})),e.bind("openPanel:start",(function(){this.trigger("openPanel:start:sr-aria",[].slice.call(arguments))})),e.bind("close:start",(function(){this.trigger("close:start:sr-aria",[].slice.call(arguments))})),e.bind("close:finish",(function(){this.trigger("close:finish:sr-aria",[].slice.call(arguments))})),e.bind("open:start",(function(){this.trigger("open:start:sr-aria",[].slice.call(arguments))})),e.bind("initOpened:after",(function(){this.trigger("initOpened:after:sr-aria",[].slice.call(arguments))}))})),this.bind("updateListview",(function(){e.node.pnls.querySelectorAll(".mm-listitem").forEach((function(e){S.sr_aria(e,"hidden",e.matches(".mm-hidden"))}))})),this.bind("openPanel:start",(function(t){var n=g(e.node.pnls,".mm-panel").filter((function(e){return e!==t})).filter((function(e){return!e.parentElement.matches(".mm-panel")})),i=[t];g(t,".mm-listitem_vertical .mm-listitem_opened").forEach((function(e){i.push.apply(i,_(e,".mm-panel"))})),n.forEach((function(e){S.sr_aria(e,"hidden",!0)})),i.forEach((function(e){S.sr_aria(e,"hidden",!1)}))})),this.bind("closePanel",(function(e){S.sr_aria(e,"hidden",!0)})),this.bind("initPanel:after",(function(e){g(e,".mm-btn").forEach((function(e){S.sr_aria(e,"haspopup",!0);var t=e.getAttribute("href");t&&S.sr_aria(e,"owns",t.replace("#",""))}))})),this.bind("initNavbar:after",(function(e){var t=_(e,".mm-navbar")[0],n=t.matches(".mm-hidden");S.sr_aria(t,"hidden",n)})),t.text&&"parent"==this.opts.navbar.titleLink&&this.bind("initNavbar:after",(function(e){var t=_(e,".mm-navbar")[0],n=!!t.querySelector(".mm-btn_prev");S.sr_aria(g(t,".mm-navbar__title")[0],"hidden",n)}))),t.text&&(this.bind("initAddons:after",(function(){e.bind("setPage:after",(function(){this.trigger("setPage:after:sr-text",[].slice.call(arguments))})),e.bind("initBlocker:after",(function(){this.trigger("initBlocker:after:sr-text",[].slice.call(arguments))}))})),this.bind("initNavbar:after",(function(t){var i=_(t,".mm-navbar")[0];if(i){var s=_(i,".mm-btn_prev")[0];s&&(s.innerHTML=S.sr_text(e.i18n(n.text.closeSubmenu)))}})),this.bind("initListview:after",(function(t){var i=t.closest(".mm-panel").mmParent;if(i){var s=_(i,".mm-btn_next")[0];if(s){var a=e.i18n(n.text[s.parentElement.matches(".mm-listitem_vertical")?"toggleSubmenu":"openSubmenu"]);s.innerHTML+=S.sr_text(a)}}})))},scrollBugFix:function(){var e=this;if(U&&this.opts.offCanvas&&this.opts.offCanvas.blockUI){var t=(function(e){return"boolean"==typeof e&&(e={fix:e}),"object"!=typeof e&&(e={}),e})(this.opts.scrollBugFix);if(this.opts.scrollBugFix=a(t,S.options.scrollBugFix),t.fix){var n,i,s=(n=this.node.menu,i="",n.addEventListener("touchmove",(function(e){i="",e.movementY>0?i="down":e.movementY<0&&(i="up")})),{get:function(){return i}});this.node.menu.addEventListener("scroll",o,{passive:!1}),this.node.menu.addEventListener("touchmove",(function(e){var t=e.target.closest(".mm-panel");t?t.scrollHeight===t.offsetHeight?o(e):(0==t.scrollTop&&"down"==s.get()||t.scrollHeight==t.scrollTop+t.offsetHeight&&"up"==s.get())&&o(e):o(e)}),{passive:!1}),this.bind("open:start",(function(){var t=_(e.node.pnls,".mm-panel_opened")[0];t&&(t.scrollTop=0)})),window.addEventListener("orientationchange",(function(t){var n=_(e.node.pnls,".mm-panel_opened")[0];n&&(n.scrollTop=0,n.style["-webkit-overflow-scrolling"]="auto",n.style["-webkit-overflow-scrolling"]="touch")}))}}function o(e){e.preventDefault(),e.stopPropagation()}},autoHeight:function(){var e=this,t=(function(e){return"boolean"==typeof e&&e&&(e={height:"auto"}),"string"==typeof e&&(e={height:e}),"object"!=typeof e&&(e={}),e})(this.opts.autoHeight);if(this.opts.autoHeight=a(t,S.options.autoHeight),"auto"==t.height||"highest"==t.height){var n,i=(n=function(e){return e.parentElement.matches(".mm-listitem_vertical")&&(e=y(e,".mm-panel").filter((function(e){return!e.parentElement.matches(".mm-listitem_vertical")}))[0]),e},function(){if(!e.opts.offCanvas||e.vars.opened){var i,s,a=0,o=e.node.menu.offsetHeight-e.node.pnls.offsetHeight;e.node.menu.classList.add("mm-menu_autoheight-measuring"),"auto"==t.height?((s=_(e.node.pnls,".mm-panel_opened")[0])&&(s=n(s)),s||(s=_(e.node.pnls,".mm-panel")[0]),a=s.scrollHeight):"highest"==t.height&&(i=0,_(e.node.pnls,".mm-panel").forEach((function(e){e=n(e),i=Math.max(i,e.scrollHeight)})),a=i),e.node.menu.style.height=a+o+"px",e.node.menu.classList.remove("mm-menu_autoheight-measuring")}});this.bind("initMenu:after",(function(){e.node.menu.classList.add("mm-menu_autoheight")})),this.opts.offCanvas&&this.bind("open:start",i),"highest"==t.height&&this.bind("initPanels:after",i),"auto"==t.height&&(this.bind("updateListview",i),this.bind("openPanel:start",i))}},backButton:function(){var e=this;if(this.opts.offCanvas){var t=(function(e){return"boolean"==typeof e&&(e={close:e}),"object"!=typeof e&&(e={}),e})(this.opts.backButton);this.opts.backButton=a(t,S.options.backButton);var n="#"+this.node.menu.id;if(t.close){var i=[],s=function(){i=[n],_(e.node.pnls,".mm-panel_opened, .mm-panel_opened-parent").forEach((function(e){i.push("#"+e.id)}))};this.bind("open:finish",(function(){history.pushState(null,document.title,n)})),this.bind("open:finish",s),this.bind("openPanel:finish",s),this.bind("close:finish",(function(){i=[],history.back(),history.pushState(null,document.title,location.pathname+location.search)})),window.addEventListener("popstate",(function(t){if(e.vars.opened&&i.length){var s=(i=i.slice(0,-1))[i.length-1];s==n?e.close():(e.openPanel(e.node.menu.querySelector(s)),history.pushState(null,document.title,n))}}))}t.open&&window.addEventListener("popstate",(function(t){e.vars.opened||location.hash!=n||e.open()}))}},columns:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={add:e}),"number"==typeof e&&(e={add:!0,visible:e}),"object"!=typeof e&&(e={}),"number"==typeof e.visible&&(e.visible={min:e.visible,max:e.visible}),e})(this.opts.columns);if(this.opts.columns=a(t,S.options.columns),t.add){t.visible.min=Math.max(1,Math.min(6,t.visible.min)),t.visible.max=Math.max(t.visible.min,Math.min(6,t.visible.max));for(var n=[],i=[],s=["mm-panel_opened","mm-panel_opened-parent","mm-panel_highest"],o=0;o<=t.visible.max;o++)n.push("mm-menu_columns-"+o),i.push("mm-panel_columns-"+o);s.push.apply(s,i),this.bind("openPanel:before",(function(t){var n;if(t&&(n=t.mmParent),n&&(n=n.closest(".mm-panel"))){var i=n.className;if(i.length&&(i=i.split("mm-panel_columns-")[1]))for(var a=parseInt(i.split(" ")[0],10)+1;a>0;){if(!(t=_(e.node.pnls,".mm-panel_columns-"+a)[0])){a=-1;break}a++,t.classList.add("mm-hidden"),s.forEach((function(e){t.classList.remove(e)}))}}})),this.bind("openPanel:start",(function(s){var a=_(e.node.pnls,".mm-panel_opened-parent").length;s.matches(".mm-panel_opened-parent")||a++,a=Math.min(t.visible.max,Math.max(t.visible.min,a)),n.forEach((function(t){e.node.menu.classList.remove(t)})),e.node.menu.classList.add("mm-menu_columns-"+a);var o=[];_(e.node.pnls,".mm-panel").forEach((function(e){i.forEach((function(t){e.classList.remove(t)})),e.matches(".mm-panel_opened-parent")&&o.push(e)})),o.push(s),o.slice(-t.visible.max).forEach((function(e,t){e.classList.add("mm-panel_columns-"+t)}))}))}},counters:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={add:e,addTo:"panels",count:e}),"object"!=typeof e&&(e={}),"panels"==e.addTo&&(e.addTo=".mm-listview"),e})(this.opts.counters);if(this.opts.counters=a(t,S.options.counters),this.bind("initListview:after",(function(t){var n=e.conf.classNames.counters.counter;g(t,"."+n).forEach((function(e){E(e,n,"mm-counter")}))})),t.add&&this.bind("initListview:after",(function(e){if(e.matches(t.addTo)){var n=e.closest(".mm-panel").mmParent;if(n&&!g(n,".mm-counter").length){var i=_(n,".mm-btn")[0];i&&i.prepend(b("span.mm-counter"))}}})),t.count){var n=function(t){(t?[t.closest(".mm-panel")]:_(e.node.pnls,".mm-panel")).forEach((function(e){var t=e.mmParent;if(t){var n=g(t,".mm-counter")[0];if(n){var i=[];_(e,".mm-listview").forEach((function(e){i.push.apply(i,_(e))})),n.innerHTML=L(i).length.toString()}}}))};this.bind("initListview:after",n),this.bind("updateListview",n)}},dividers:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={add:e}),"object"!=typeof e&&(e={}),"panels"==e.addTo&&(e.addTo=".mm-listview"),e})(this.opts.dividers);this.opts.dividers=a(t,S.options.dividers),this.bind("initListview:after",(function(t){_(t).forEach((function(t){E(t,e.conf.classNames.divider,"mm-divider"),t.matches(".mm-divider")&&t.classList.remove("mm-listitem")}))})),t.add&&this.bind("initListview:after",(function(e){if(e.matches(t.addTo)){g(e,".mm-divider").forEach((function(e){e.remove()}));var n="";L(_(e)).forEach((function(t){var i=_(t,".mm-listitem__text")[0].textContent.trim().toLowerCase()[0];if(i.length&&i!=n){n=i;var s=b("li.mm-divider");s.textContent=i,e.insertBefore(s,t)}}))}}))},drag:function(){var e=this;if(this.opts.offCanvas){var t=(function(e){return"boolean"==typeof e&&(e={open:e}),"object"!=typeof e&&(e={}),e})(this.opts.drag);this.opts.drag=a(t,S.options.drag),t.open&&this.bind("setPage:after",(function(n){re.call(e,t.node||n)}))}},dropdown:function(){var e=this;if(this.opts.offCanvas){var t=(function(e){return"boolean"==typeof e&&e&&(e={drop:e}),"object"!=typeof e&&(e={}),"string"==typeof e.position&&(e.position={of:e.position}),e})(this.opts.dropdown);this.opts.dropdown=a(t,S.options.dropdown);var n=this.conf.dropdown;if(t.drop){var i;this.bind("initMenu:after",(function(){if(e.node.menu.classList.add("mm-menu_dropdown"),"string"!=typeof t.position.of){var n=d(e.node.menu.id);n&&(t.position.of='[href="#'+n+'"]')}if("string"==typeof t.position.of){i=g(document.body,t.position.of)[0];var s=t.event.split(" ");1==s.length&&(s[1]=s[0]),"hover"==s[0]&&i.addEventListener("mouseenter",(function(){e.open()}),{passive:!0}),"hover"==s[1]&&e.node.menu.addEventListener("mouseleave",(function(){e.close()}),{passive:!0})}})),this.bind("open:start",(function(){e.node.menu.mmStyle=e.node.menu.getAttribute("style"),e.node.wrpr.classList.add("mm-wrapper_dropdown")})),this.bind("close:finish",(function(){e.node.menu.setAttribute("style",e.node.menu.mmStyle),e.node.wrpr.classList.remove("mm-wrapper_dropdown")}));var s=function(e,s){var a,o,r,c=s[0],l=s[1],m="x"==e?"offsetWidth":"offsetHeight",d="x"==e?"left":"top",p="x"==e?"right":"bottom",u="x"==e?"width":"height",f="x"==e?"innerWidth":"innerHeight",h="x"==e?"maxWidth":"maxHeight",v=null,b=(a=d,i.getBoundingClientRect()[a]+document.body["left"===a?"scrollLeft":"scrollTop"]),g=b+i[m],_=window[f],y=n.offset.button[e]+n.offset.viewport[e];if(t.position[e])switch(t.position[e]){case"left":case"bottom":v="after";break;case"right":case"top":v="before"}return null===v&&(v=b+(g-b)/2<_/2?"after":"before"),"after"==v?(r=_-((o="x"==e?b:g)+y),c[d]=o+n.offset.button[e]+"px",c[p]="auto",t.tip&&l.push("mm-menu_tip-"+("x"==e?"left":"top"))):(r=(o="x"==e?g:b)-y,c[p]="calc( 100% - "+(o-n.offset.button[e])+"px )",c[d]="auto",t.tip&&l.push("mm-menu_tip-"+("x"==e?"right":"bottom"))),t.fitViewport&&(c[h]=Math.min(n[u].max,r)+"px"),[c,l]};this.bind("open:start",o),window.addEventListener("resize",(function(t){o.call(e)}),{passive:!0}),this.opts.offCanvas.blockUI||window.addEventListener("scroll",(function(t){o.call(e)}),{passive:!0})}}function o(){var e=this;if(this.vars.opened){this.node.menu.setAttribute("style",this.node.menu.mmStyle);var n=[{},[]];for(var i in n=s.call(this,"y",n),(n=s.call(this,"x",n))[0])this.node.menu.style[i]=n[0][i];if(t.tip){["mm-menu_tip-left","mm-menu_tip-right","mm-menu_tip-top","mm-menu_tip-bottom"].forEach((function(t){e.node.menu.classList.remove(t)})),n[1].forEach((function(t){e.node.menu.classList.add(t)}))}}}},fixedElements:function(){var e=this;if(this.opts.offCanvas){var t,n,i=this.conf.fixedElements;this.bind("setPage:after",(function(s){t=e.conf.classNames.fixedElements.fixed,n=g(document,i.insertSelector)[0],g(s,"."+t).forEach((function(e){E(e,t,"mm-slideout"),n[i.insertMethod](e)}))}))}},iconbar:function(){var e,t=this,n=(function(e){return"array"==o(e)&&(e={use:!0,top:e}),"object"!=o(e)&&(e={}),void 0===e.use&&(e.use=!0),"boolean"==typeof e.use&&e.use&&(e.use=!0),e})(this.opts.iconbar);if((this.opts.iconbar=a(n,S.options.iconbar),n.use)&&(["top","bottom"].forEach((function(t,i){var s=n[t];"array"!=o(s)&&(s=[s]);for(var a=b("div.mm-iconbar__"+t),r=0,c=s.length;r<c;r++)"string"==typeof s[r]?a.innerHTML+=s[r]:a.append(s[r]);a.children.length&&(e||(e=b("div.mm-iconbar")),e.append(a))})),e)){this.bind("initMenu:after",(function(){t.node.menu.prepend(e)}));var i="mm-menu_iconbar-"+n.position,s=function(){t.node.menu.classList.add(i),S.sr_aria(e,"hidden",!1)};if("boolean"==typeof n.use?this.bind("initMenu:after",s):P(n.use,s,(function(){t.node.menu.classList.remove(i),S.sr_aria(e,"hidden",!0)})),"tabs"==n.type){e.classList.add("mm-iconbar_tabs"),e.addEventListener("click",(function(e){var n=e.target;if(n.matches("a"))if(n.matches(".mm-iconbar__tab_selected"))e.stopImmediatePropagation();else try{var i=t.node.menu.querySelector(n.getAttribute("href"))[0];i&&i.matches(".mm-panel")&&(e.preventDefault(),e.stopImmediatePropagation(),t.openPanel(i,!1))}catch(e){}}));var r=function(t){g(e,"a").forEach((function(e){e.classList.remove("mm-iconbar__tab_selected")}));var n=g(e,'[href="#'+t.id+'"]')[0];if(n)n.classList.add("mm-iconbar__tab_selected");else{var i=t.mmParent;i&&r(i.closest(".mm-panel"))}};this.bind("openPanel:start",r)}}},iconPanels:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={add:e}),"number"!=typeof e&&"string"!=typeof e||(e={add:!0,visible:e}),"object"!=typeof e&&(e={}),e})(this.opts.iconPanels);this.opts.iconPanels=a(t,S.options.iconPanels);var n=!1;if("first"==t.visible&&(n=!0,t.visible=1),t.visible=Math.min(3,Math.max(1,t.visible)),t.visible++,t.add){this.bind("initMenu:after",(function(){var n=["mm-menu_iconpanel"];t.hideNavbar&&n.push("mm-menu_hidenavbar"),t.hideDivider&&n.push("mm-menu_hidedivider"),n.forEach((function(t){e.node.menu.classList.add(t)}))}));var i=[];if(!n)for(var s=0;s<=t.visible;s++)i.push("mm-panel_iconpanel-"+s);this.bind("openPanel:start",(function(s){var a=_(e.node.pnls,".mm-panel");if(!(s=s||a[0]).parentElement.matches(".mm-listitem_vertical"))if(n)a.forEach((function(e,t){e.classList[0==t?"add":"remove"]("mm-panel_iconpanel-first")}));else{a.forEach((function(e){i.forEach((function(t){e.classList.remove(t)}))})),a=a.filter((function(e){return e.matches(".mm-panel_opened-parent")}));var o=!1;a.forEach((function(e){s===e&&(o=!0)})),o||a.push(s),a.forEach((function(e){e.classList.remove("mm-hidden")})),(a=a.slice(-t.visible)).forEach((function(e,t){e.classList.add("mm-panel_iconpanel-"+t)}))}})),this.bind("initPanel:after",(function(e){if(t.blockPanel&&!e.parentElement.matches(".mm-listitem_vertical")&&!_(e,".mm-panel__blocker")[0]){var n=b("a.mm-panel__blocker");n.setAttribute("href","#"+e.closest(".mm-panel").id),e.prepend(n)}}))}},keyboardNavigation:function(){var e=this;if(!U){var t=(function(e){return"boolean"!=typeof e&&"string"!=typeof e||(e={enable:e}),"object"!=typeof e&&(e={}),e})(this.opts.keyboardNavigation);if(this.opts.keyboardNavigation=a(t,S.options.keyboardNavigation),t.enable){var n=b("button.mm-tabstart.mm-sronly"),i=b("button.mm-tabend.mm-sronly"),s=b("button.mm-tabend.mm-sronly");this.bind("initMenu:after",(function(){t.enhance&&e.node.menu.classList.add("mm-menu_keyboardfocus"),he.call(e,t.enhance)})),this.bind("initOpened:before",(function(){e.node.menu.prepend(n),e.node.menu.append(i),_(e.node.menu,".mm-navbars-top, .mm-navbars-bottom").forEach((function(e){e.querySelectorAll(".mm-navbar__title").forEach((function(e){e.setAttribute("tabindex","-1")}))}))})),this.bind("initBlocker:after",(function(){S.node.blck.append(s),_(S.node.blck,"a")[0].classList.add("mm-tabstart")}));var o="input, select, textarea, button, label, a[href]",r=function(n){n=n||_(e.node.pnls,".mm-panel_opened")[0];var i=null,s=document.activeElement.closest(".mm-navbar");if(!s||s.closest(".mm-menu")!=e.node.menu){if("default"==t.enable&&((i=g(n,".mm-listview a[href]:not(.mm-hidden)")[0])||(i=g(n,o+":not(.mm-hidden)")[0]),!i)){var a=[];_(e.node.menu,".mm-navbars_top, .mm-navbars_bottom").forEach((function(e){a.push.apply(a,g(e,o+":not(.mm-hidden)"))})),i=a[0]}i||(i=_(e.node.menu,".mm-tabstart")[0]),i&&i.focus()}};this.bind("open:finish",r),this.bind("openPanel:finish",r),this.bind("initOpened:after:sr-aria",(function(){[e.node.menu,S.node.blck].forEach((function(e){_(e,".mm-tabstart, .mm-tabend").forEach((function(e){S.sr_aria(e,"hidden",!0),S.sr_role(e,"presentation")}))}))}))}}},lazySubmenus:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={load:e}),"object"!=typeof e&&(e={}),e})(this.opts.lazySubmenus);this.opts.lazySubmenus=a(t,S.options.lazySubmenus),t.load&&(this.bind("initMenu:after",(function(){var t=[];g(e.node.pnls,"li").forEach((function(n){t.push.apply(t,_(n,e.conf.panelNodetype.join(", ")))})),t.filter((function(e){return!e.matches(".mm-listview_inset")})).filter((function(e){return!e.matches(".mm-nolistview")})).filter((function(e){return!e.matches(".mm-nopanel")})).forEach((function(e){["mm-panel_lazysubmenu","mm-nolistview","mm-nopanel"].forEach((function(t){e.classList.add(t)}))}))})),this.bind("initPanels:before",(function(){_(e.node.pnls,e.conf.panelNodetype.join(", ")).forEach((function(e){var t=".mm-panel_lazysubmenu",n=g(e,t);e.matches(t)&&n.unshift(e),n.filter((function(e){return!e.matches(".mm-panel_lazysubmenu .mm-panel_lazysubmenu")})).forEach((function(e){["mm-panel_lazysubmenu","mm-nolistview","mm-nopanel"].forEach((function(t){e.classList.remove(t)}))}))}))})),this.bind("initOpened:before",(function(){var t=[];g(e.node.pnls,"."+e.conf.classNames.selected).forEach((function(e){t.push.apply(t,y(e,".mm-panel_lazysubmenu"))})),t.length&&(t.forEach((function(e){["mm-panel_lazysubmenu","mm-nolistview","mm-nopanel"].forEach((function(t){e.classList.remove(t)}))})),e.initPanel(t[t.length-1]))})),this.bind("openPanel:before",(function(t){var n=".mm-panel_lazysubmenu",i=g(t,n);t.matches(n)&&i.unshift(t),(i=i.filter((function(e){return!e.matches(".mm-panel_lazysubmenu .mm-panel_lazysubmenu")}))).forEach((function(t){e.initPanel(t)}))})))},navbars:_e,pageScroll:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={scroll:e}),"object"!=typeof e&&(e={}),e})(this.opts.pageScroll);this.opts.pageScroll=a(t,S.options.pageScroll);var n,i=this.conf.pageScroll;function s(){n&&window.scrollTo({top:n.getBoundingClientRect().top+document.scrollingElement.scrollTop-i.scrollOffset,behavior:"smooth"}),n=null}function o(e){try{return"#"!=e&&"#"==e.slice(0,1)?S.node.page.querySelector(e):null}catch(e){return null}}if(t.scroll&&this.bind("close:finish",(function(){s()})),this.opts.offCanvas&&t.scroll&&this.clck.push((function(t,i){if(n=null,i.inMenu){var a=t.getAttribute("href");if(n=o(a))return e.node.menu.matches(".mm-menu_sidebar-expanded")&&e.node.wrpr.matches(".mm-wrapper_sidebar-expanded")?void s():{close:!0}}})),t.update){var r=[];this.bind("initListview:after",(function(e){w(_(e,".mm-listitem")).forEach((function(e){var t=o(e.getAttribute("href"));t&&r.unshift(t)}))}));var c=-1;window.addEventListener("scroll",(function(t){for(var n=window.scrollY,s=0;s<r.length;s++)if(r[s].offsetTop<n+i.updateOffset){if(c!==s){c=s;var a=w(g(_(e.node.pnls,".mm-panel_opened")[0],".mm-listitem"));(a=a.filter((function(e){return e.matches('[href="#'+r[s].id+'"]')}))).length&&e.setSelected(a[0].parentElement)}break}}))}},searchfield:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={add:e}),"object"!=typeof e&&(e={}),"boolean"==typeof e.panel&&(e.panel={add:e.panel}),"object"!=typeof e.panel&&(e.panel={}),"panel"==e.addTo&&(e.panel.add=!0),e.panel.add&&(e.showSubPanels=!1,e.panel.splash&&(e.cancel=!0)),e})(this.opts.searchfield);this.opts.searchfield=a(t,S.options.searchfield);this.conf.searchfield;t.add&&(this.bind("close:start",(function(){g(e.node.menu,".mm-searchfield").forEach((function(e){e.blur()}))})),this.bind("initPanel:after",(function(n){var i=null;t.panel.add&&(i=Se.call(e));var s=null;switch(t.addTo){case"panels":s=[n];break;case"panel":s=[i];break;default:"string"==typeof t.addTo?s=g(e.node.menu,t.addTo):"array"==o(t.addTo)&&(s=t.addTo)}s.forEach((function(n){n=Me.call(e,n),t.search&&n&&Ae.call(e,n)})),t.noResults&&Te.call(e,t.panel.add?i:n)})),this.clck.push((function(t,n){if(n.inMenu&&t.matches(".mm-searchfield__btn")){if(t.matches(".mm-btn_close")){var i=g(s=t.closest(".mm-searchfield"),"input")[0];return i.value="",e.search(i),!0}var s;if(t.matches(".mm-btn_next"))return(s=t.closest("form"))&&s.submit(),!0}})))},sectionIndexer:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={add:e}),"object"!=typeof e&&(e={}),e})(this.opts.sectionIndexer);this.opts.sectionIndexer=a(t,S.options.sectionIndexer),t.add&&this.bind("initPanels:after",(function(){if(!e.node.indx){var t="";"abcdefghijklmnopqrstuvwxyz".split("").forEach((function(e){t+='<a href="#">'+e+"</a>"}));var n=b("div.mm-sectionindexer");n.innerHTML=t,e.node.pnls.prepend(n),e.node.indx=n,e.node.indx.addEventListener("click",(function(e){e.target.matches("a")&&e.preventDefault()}));var i=function(t){if(t.target.matches("a")){var n=t.target.textContent,i=_(e.node.pnls,".mm-panel_opened")[0],s=-1,a=i.scrollTop;i.scrollTop=0,g(i,".mm-divider").filter((function(e){return!e.matches(".mm-hidden")})).forEach((function(e){s<0&&n==e.textContent.trim().slice(0,1).toLowerCase()&&(s=e.offsetTop)})),i.scrollTop=s>-1?s:a}};U?(e.node.indx.addEventListener("touchstart",i),e.node.indx.addEventListener("touchmove",i)):e.node.indx.addEventListener("mouseover",i)}e.bind("openPanel:start",(function(t){var n=g(t,".mm-divider").filter((function(e){return!e.matches(".mm-hidden")})).length;e.node.indx.classList[n?"add":"remove"]("mm-sectionindexer_active")}))}))},setSelected:function(){var e=this,t=(function(e){return"boolean"==typeof e&&(e={hover:e,parent:e}),"object"!=typeof e&&(e={}),e})(this.opts.setSelected);if(this.opts.setSelected=a(t,S.options.setSelected),"detect"==t.current){var n=function(t){t=t.split("?")[0].split("#")[0];var i=e.node.menu.querySelector('a[href="'+t+'"], a[href="'+t+'/"]');if(i)e.setSelected(i.parentElement);else{var s=t.split("/").slice(0,-1);s.length&&n(s.join("/"))}};this.bind("initMenu:after",(function(){n.call(e,window.location.href)}))}else t.current||this.bind("initListview:after",(function(e){_(e,".mm-listitem_selected").forEach((function(e){e.classList.remove("mm-listitem_selected")}))}));t.hover&&this.bind("initMenu:after",(function(){e.node.menu.classList.add("mm-menu_selected-hover")})),t.parent&&(this.bind("openPanel:finish",(function(t){g(e.node.pnls,".mm-listitem_selected-parent").forEach((function(e){e.classList.remove("mm-listitem_selected-parent")}));for(var n=t.mmParent;n;)n.matches(".mm-listitem_vertical")||n.classList.add("mm-listitem_selected-parent"),n=(n=n.closest(".mm-panel")).mmParent})),this.bind("initMenu:after",(function(){e.node.menu.classList.add("mm-menu_selected-parent")})))},sidebar:function(){var e=this;if(this.opts.offCanvas){var t=(function(e){return("string"==typeof e||"boolean"==typeof e&&e||"number"==typeof e)&&(e={expanded:e}),"object"!=typeof e&&(e={}),"boolean"==typeof e.collapsed&&e.collapsed&&(e.collapsed={use:!0}),"string"!=typeof e.collapsed&&"number"!=typeof e.collapsed||(e.collapsed={use:e.collapsed}),"object"!=typeof e.collapsed&&(e.collapsed={}),"boolean"==typeof e.expanded&&e.expanded&&(e.expanded={use:!0}),"string"!=typeof e.expanded&&"number"!=typeof e.expanded||(e.expanded={use:e.expanded}),"object"!=typeof e.expanded&&(e.expanded={}),e})(this.opts.sidebar);if(this.opts.sidebar=a(t,S.options.sidebar),t.collapsed.use){this.bind("initMenu:after",(function(){if(e.node.menu.classList.add("mm-menu_sidebar-collapsed"),t.collapsed.blockMenu&&e.opts.offCanvas&&!_(e.node.menu,".mm-menu__blocker")[0]){var n=b("a.mm-menu__blocker");n.setAttribute("href","#"+e.node.menu.id),e.node.menu.prepend(n)}t.collapsed.hideNavbar&&e.node.menu.classList.add("mm-menu_hidenavbar"),t.collapsed.hideDivider&&e.node.menu.classList.add("mm-menu_hidedivider")}));var n=function(){e.node.wrpr.classList.add("mm-wrapper_sidebar-collapsed")},i=function(){e.node.wrpr.classList.remove("mm-wrapper_sidebar-collapsed")};"boolean"==typeof t.collapsed.use?this.bind("initMenu:after",n):P(t.collapsed.use,n,i)}if(t.expanded.use){this.bind("initMenu:after",(function(){e.node.menu.classList.add("mm-menu_sidebar-expanded")}));n=function(){e.node.wrpr.classList.add("mm-wrapper_sidebar-expanded"),e.node.wrpr.matches(".mm-wrapper_sidebar-closed")||e.open()},i=function(){e.node.wrpr.classList.remove("mm-wrapper_sidebar-expanded"),e.close()};"boolean"==typeof t.expanded.use?this.bind("initMenu:after",n):P(t.expanded.use,n,i),this.bind("close:start",(function(){e.node.wrpr.matches(".mm-wrapper_sidebar-expanded")&&(e.node.wrpr.classList.add("mm-wrapper_sidebar-closed"),"remember"==t.expanded.initial&&window.localStorage.setItem("mmenuExpandedState","closed"))})),this.bind("open:start",(function(){e.node.wrpr.matches(".mm-wrapper_sidebar-expanded")&&(e.node.wrpr.classList.remove("mm-wrapper_sidebar-closed"),"remember"==t.expanded.initial&&window.localStorage.setItem("mmenuExpandedState","open"))}));var s=t.expanded.initial;if("remember"==t.expanded.initial){var o=window.localStorage.getItem("mmenuExpandedState");switch(o){case"open":case"closed":s=o}}"closed"==s&&this.bind("initMenu:after",(function(){e.node.wrpr.classList.add("mm-wrapper_sidebar-closed")})),this.clck.push((function(n,i){if(i.inMenu&&i.inListview&&e.node.wrpr.matches(".mm-wrapper_sidebar-expanded"))return{close:"closed"==t.expanded.initial}}))}}},toggles:function(){var e=this;this.bind("initPanel:after",(function(t){g(t,"input").forEach((function(t){E(t,e.conf.classNames.toggles.toggle,"mm-toggle"),E(t,e.conf.classNames.toggles.check,"mm-check")}))}))}},S.wrappers={angular:function(){this.opts.onClick={close:!0,preventDefault:!1,setSelected:!0}},bootstrap:function(){var e=this;if(this.node.menu.matches(".navbar-collapse")){this.conf.offCanvas&&(this.conf.offCanvas.clone=!1);var t=b("nav"),n=b("div");t.append(n),_(this.node.menu).forEach((function(t){switch(!0){case t.matches(".navbar-nav"):n.append(function(e){var t=b("ul");return g(e,".nav-item").forEach((function(e){var n=b("li");if(e.matches(".active")&&n.classList.add("Selected"),!e.matches(".nav-link")){var i=_(e,".dropdown-menu")[0];i&&n.append(o(i)),e=_(e,".nav-link")[0]}n.prepend(a(e)),t.append(n)})),t}(t));break;case t.matches(".dropdown-menu"):n.append(o(t));break;case t.matches(".form-inline"):e.conf.searchfield.form={action:t.getAttribute("action")||null,method:t.getAttribute("method")||null},e.conf.searchfield.input={name:t.querySelector("input").getAttribute("name")||null},e.conf.searchfield.clear=!1,e.conf.searchfield.submit=!0;break;default:n.append(t.cloneNode(!0))}})),this.bind("initMenu:before",(function(){document.body.prepend(t),e.node.menu=t}));var i=this.node.menu.parentElement;if(i){var s=i.querySelector(".navbar-toggler");s&&(s.removeAttribute("data-target"),s.removeAttribute("aria-controls"),s.outerHTML=s.outerHTML,(s=i.querySelector(".navbar-toggler")).addEventListener("click",(function(t){t.preventDefault(),t.stopImmediatePropagation(),e[e.vars.opened?"close":"open"]()})))}}function a(e){for(var t=b(e.matches("a")?"a":"span"),n=["href","title","target"],i=0;i<n.length;i++)void 0!==e.getAttribute(n[i])&&t.setAttribute(n[i],e.getAttribute(n[i]));return t.innerHTML=e.innerHTML,g(t,".sr-only").forEach((function(e){e.remove()})),t}function o(e){var t=b("ul");return _(e).forEach((function(e){var n=b("li");e.matches(".dropdown-divider")?n.classList.add("Divider"):e.matches(".dropdown-item")&&n.append(a(e)),t.append(n)})),t}},olark:function(){this.conf.offCanvas.page.noSelector.push("#olark")},turbolinks:function(){var e;document.addEventListener("turbolinks:before-visit",(function(t){e=document.querySelector(".mm-wrapper").className.split(" ").filter((function(e){return/mm-/.test(e)}))})),document.addEventListener("turbolinks:load",(function(t){void 0!==e&&(document.querySelector(".mm-wrapper").className=e)}))},wordpress:function(){this.conf.classNames.selected="current-menu-item";var e=document.getElementById("wpadminbar");e&&(e.style.position="fixed",e.classList.add("mm-slideout"))}};var je;t.default=S;window.Mmenu=S,(je=window.jQuery||window.Zepto||null)&&(je.fn.mmenu=function(e,t){var n=je();return this.each((function(i,s){if(!s.mmApi){var a=new S(s,e,t),o=je(a.node.menu);o.data("mmenu",a.API),n=n.add(o)}})),n})})]);
/**
 * Owl Carousel v2.3.4
 * Copyright 2013-2018 David Deutsch
 * Licensed under: SEE LICENSE IN https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE
 */
/**
 * Owl carousel
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 * @todo Lazy Load Icon
 * @todo prevent animationend bubling
 * @todo itemsScaleUp
 * @todo Test Zepto
 * @todo stagePadding calculate wrong active classes
 */
;(function($, window, document, undefined) {

	/**
	 * Creates a carousel.
	 * @class The Owl Carousel.
	 * @public
	 * @param {HTMLElement|jQuery} element - The element to create the carousel for.
	 * @param {Object} [options] - The options
	 */
	function Owl(element, options) {

		/**
		 * Current settings for the carousel.
		 * @public
		 */
		this.settings = null;

		/**
		 * Current options set by the caller including defaults.
		 * @public
		 */
		this.options = $.extend({}, Owl.Defaults, options);

		/**
		 * Plugin element.
		 * @public
		 */
		this.$element = $(element);

		/**
		 * Proxied event handlers.
		 * @protected
		 */
		this._handlers = {};

		/**
		 * References to the running plugins of this carousel.
		 * @protected
		 */
		this._plugins = {};

		/**
		 * Currently suppressed events to prevent them from being retriggered.
		 * @protected
		 */
		this._supress = {};

		/**
		 * Absolute current position.
		 * @protected
		 */
		this._current = null;

		/**
		 * Animation speed in milliseconds.
		 * @protected
		 */
		this._speed = null;

		/**
		 * Coordinates of all items in pixel.
		 * @todo The name of this member is missleading.
		 * @protected
		 */
		this._coordinates = [];

		/**
		 * Current breakpoint.
		 * @todo Real media queries would be nice.
		 * @protected
		 */
		this._breakpoint = null;

		/**
		 * Current width of the plugin element.
		 */
		this._width = null;

		/**
		 * All real items.
		 * @protected
		 */
		this._items = [];

		/**
		 * All cloned items.
		 * @protected
		 */
		this._clones = [];

		/**
		 * Merge values of all items.
		 * @todo Maybe this could be part of a plugin.
		 * @protected
		 */
		this._mergers = [];

		/**
		 * Widths of all items.
		 */
		this._widths = [];

		/**
		 * Invalidated parts within the update process.
		 * @protected
		 */
		this._invalidated = {};

		/**
		 * Ordered list of workers for the update process.
		 * @protected
		 */
		this._pipe = [];

		/**
		 * Current state information for the drag operation.
		 * @todo #261
		 * @protected
		 */
		this._drag = {
			time: null,
			target: null,
			pointer: null,
			stage: {
				start: null,
				current: null
			},
			direction: null
		};

		/**
		 * Current state information and their tags.
		 * @type {Object}
		 * @protected
		 */
		this._states = {
			current: {},
			tags: {
				'initializing': [ 'busy' ],
				'animating': [ 'busy' ],
				'dragging': [ 'interacting' ]
			}
		};

		$.each([ 'onResize', 'onThrottledResize' ], $.proxy((function(i, handler) {
			this._handlers[handler] = $.proxy(this[handler], this);
		}), this));

		$.each(Owl.Plugins, $.proxy((function(key, plugin) {
			this._plugins[key.charAt(0).toLowerCase() + key.slice(1)]
				= new plugin(this);
		}), this));

		$.each(Owl.Workers, $.proxy((function(priority, worker) {
			this._pipe.push({
				'filter': worker.filter,
				'run': $.proxy(worker.run, this)
			});
		}), this));

		this.setup();
		this.initialize();
	}

	/**
	 * Default options for the carousel.
	 * @public
	 */
	Owl.Defaults = {
		items: 3,
		loop: false,
		center: false,
		rewind: false,
		checkVisibility: true,

		mouseDrag: true,
		touchDrag: true,
		pullDrag: true,
		freeDrag: false,

		margin: 0,
		stagePadding: 0,

		merge: false,
		mergeFit: true,
		autoWidth: false,

		startPosition: 0,
		rtl: false,

		smartSpeed: 250,
		fluidSpeed: false,
		dragEndSpeed: false,

		responsive: {},
		responsiveRefreshRate: 200,
		responsiveBaseElement: window,

		fallbackEasing: 'swing',
		slideTransition: '',

		info: false,

		nestedItemSelector: false,
		itemElement: 'div',
		stageElement: 'div',

		refreshClass: 'owl-refresh',
		loadedClass: 'owl-loaded',
		loadingClass: 'owl-loading',
		rtlClass: 'owl-rtl',
		responsiveClass: 'owl-responsive',
		dragClass: 'owl-drag',
		itemClass: 'owl-item',
		stageClass: 'owl-stage',
		stageOuterClass: 'owl-stage-outer',
		grabClass: 'owl-grab'
	};

	/**
	 * Enumeration for width.
	 * @public
	 * @readonly
	 * @enum {String}
	 */
	Owl.Width = {
		Default: 'default',
		Inner: 'inner',
		Outer: 'outer'
	};

	/**
	 * Enumeration for types.
	 * @public
	 * @readonly
	 * @enum {String}
	 */
	Owl.Type = {
		Event: 'event',
		State: 'state'
	};

	/**
	 * Contains all registered plugins.
	 * @public
	 */
	Owl.Plugins = {};

	/**
	 * List of workers involved in the update process.
	 */
	Owl.Workers = [ {
		filter: [ 'width', 'settings' ],
		run: function() {
			this._width = this.$element.width();
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			cache.current = this._items && this._items[this.relative(this._current)];
		}
	}, {
		filter: [ 'items', 'settings' ],
		run: function() {
			this.$stage.children('.cloned').remove();
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var margin = this.settings.margin || '',
				grid = !this.settings.autoWidth,
				rtl = this.settings.rtl,
				css = {
					'width': 'auto',
					'margin-left': rtl ? margin : '',
					'margin-right': rtl ? '' : margin
				};

			!grid && this.$stage.children().css(css);

			cache.css = css;
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var width = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
				merge = null,
				iterator = this._items.length,
				grid = !this.settings.autoWidth,
				widths = [];

			cache.items = {
				merge: false,
				width: width
			};

			while (iterator--) {
				merge = this._mergers[iterator];
				merge = this.settings.mergeFit && Math.min(merge, this.settings.items) || merge;

				cache.items.merge = merge > 1 || cache.items.merge;

				widths[iterator] = !grid ? this._items[iterator].width() : width * merge;
			}

			this._widths = widths;
		}
	}, {
		filter: [ 'items', 'settings' ],
		run: function() {
			var clones = [],
				items = this._items,
				settings = this.settings,
				// TODO: Should be computed from number of min width items in stage
				view = Math.max(settings.items * 2, 4),
				size = Math.ceil(items.length / 2) * 2,
				repeat = settings.loop && items.length ? settings.rewind ? view : Math.max(view, size) : 0,
				append = '',
				prepend = '';

			repeat /= 2;

			while (repeat > 0) {
				// Switch to only using appended clones
				clones.push(this.normalize(clones.length / 2, true));
				append = append + items[clones[clones.length - 1]][0].outerHTML;
				clones.push(this.normalize(items.length - 1 - (clones.length - 1) / 2, true));
				prepend = items[clones[clones.length - 1]][0].outerHTML + prepend;
				repeat -= 1;
			}

			this._clones = clones;

			$(append).addClass('cloned').appendTo(this.$stage);
			$(prepend).addClass('cloned').prependTo(this.$stage);
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function() {
			var rtl = this.settings.rtl ? 1 : -1,
				size = this._clones.length + this._items.length,
				iterator = -1,
				previous = 0,
				current = 0,
				coordinates = [];

			while (++iterator < size) {
				previous = coordinates[iterator - 1] || 0;
				current = this._widths[this.relative(iterator)] + this.settings.margin;
				coordinates.push(previous + current * rtl);
			}

			this._coordinates = coordinates;
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function() {
			var padding = this.settings.stagePadding,
				coordinates = this._coordinates,
				css = {
					'width': Math.ceil(Math.abs(coordinates[coordinates.length - 1])) + padding * 2,
					'padding-left': padding || '',
					'padding-right': padding || ''
				};

			this.$stage.css(css);
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var iterator = this._coordinates.length,
				grid = !this.settings.autoWidth,
				items = this.$stage.children();

			if (grid && cache.items.merge) {
				while (iterator--) {
					cache.css.width = this._widths[this.relative(iterator)];
					items.eq(iterator).css(cache.css);
				}
			} else if (grid) {
				cache.css.width = cache.items.width;
				items.css(cache.css);
			}
		}
	}, {
		filter: [ 'items' ],
		run: function() {
			this._coordinates.length < 1 && this.$stage.removeAttr('style');
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			cache.current = cache.current ? this.$stage.children().index(cache.current) : 0;
			cache.current = Math.max(this.minimum(), Math.min(this.maximum(), cache.current));
			this.reset(cache.current);
		}
	}, {
		filter: [ 'position' ],
		run: function() {
			this.animate(this.coordinates(this._current));
		}
	}, {
		filter: [ 'width', 'position', 'items', 'settings' ],
		run: function() {
			var rtl = this.settings.rtl ? 1 : -1,
				padding = this.settings.stagePadding * 2,
				begin = this.coordinates(this.current()) + padding,
				end = begin + this.width() * rtl,
				inner, outer, matches = [], i, n;

			for (i = 0, n = this._coordinates.length; i < n; i++) {
				inner = this._coordinates[i - 1] || 0;
				outer = Math.abs(this._coordinates[i]) + padding * rtl;

				if ((this.op(inner, '<=', begin) && (this.op(inner, '>', end)))
					|| (this.op(outer, '<', begin) && this.op(outer, '>', end))) {
					matches.push(i);
				}
			}

			this.$stage.children('.active').removeClass('active');
			this.$stage.children(':eq(' + matches.join('), :eq(') + ')').addClass('active');

			this.$stage.children('.center').removeClass('center');
			if (this.settings.center) {
				this.$stage.children().eq(this.current()).addClass('center');
			}
		}
	} ];

	/**
	 * Create the stage DOM element
	 */
	Owl.prototype.initializeStage = function() {
		this.$stage = this.$element.find('.' + this.settings.stageClass);

		// if the stage is already in the DOM, grab it and skip stage initialization
		if (this.$stage.length) {
			return;
		}

		this.$element.addClass(this.options.loadingClass);

		// create stage
		this.$stage = $('<' + this.settings.stageElement + '>', {
			"class": this.settings.stageClass
		}).wrap( $( '<div/>', {
			"class": this.settings.stageOuterClass
		}));

		// append stage
		this.$element.append(this.$stage.parent());
	};

	/**
	 * Create item DOM elements
	 */
	Owl.prototype.initializeItems = function() {
		var $items = this.$element.find('.owl-item');

		// if the items are already in the DOM, grab them and skip item initialization
		if ($items.length) {
			this._items = $items.get().map((function(item) {
				return $(item);
			}));

			this._mergers = this._items.map((function() {
				return 1;
			}));

			this.refresh();

			return;
		}

		// append content
		this.replace(this.$element.children().not(this.$stage.parent()));

		// check visibility
		if (this.isVisible()) {
			// update view
			this.refresh();
		} else {
			// invalidate width
			this.invalidate('width');
		}

		this.$element
			.removeClass(this.options.loadingClass)
			.addClass(this.options.loadedClass);
	};

	/**
	 * Initializes the carousel.
	 * @protected
	 */
	Owl.prototype.initialize = function() {
		this.enter('initializing');
		this.trigger('initialize');

		this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl);

		if (this.settings.autoWidth && !this.is('pre-loading')) {
			var imgs, nestedSelector, width;
			imgs = this.$element.find('img');
			nestedSelector = this.settings.nestedItemSelector ? '.' + this.settings.nestedItemSelector : undefined;
			width = this.$element.children(nestedSelector).width();

			if (imgs.length && width <= 0) {
				this.preloadAutoWidthImages(imgs);
			}
		}

		this.initializeStage();
		this.initializeItems();

		// register event handlers
		this.registerEventHandlers();

		this.leave('initializing');
		this.trigger('initialized');
	};

	/**
	 * @returns {Boolean} visibility of $element
	 *                    if you know the carousel will always be visible you can set `checkVisibility` to `false` to
	 *                    prevent the expensive browser layout forced reflow the $element.is(':visible') does
	 */
	Owl.prototype.isVisible = function() {
		return this.settings.checkVisibility
			? this.$element.is(':visible')
			: true;
	};

	/**
	 * Setups the current settings.
	 * @todo Remove responsive classes. Why should adaptive designs be brought into IE8?
	 * @todo Support for media queries by using `matchMedia` would be nice.
	 * @public
	 */
	Owl.prototype.setup = function() {
		var viewport = this.viewport(),
			overwrites = this.options.responsive,
			match = -1,
			settings = null;

		if (!overwrites) {
			settings = $.extend({}, this.options);
		} else {
			$.each(overwrites, (function(breakpoint) {
				if (breakpoint <= viewport && breakpoint > match) {
					match = Number(breakpoint);
				}
			}));

			settings = $.extend({}, this.options, overwrites[match]);
			if (typeof settings.stagePadding === 'function') {
				settings.stagePadding = settings.stagePadding();
			}
			delete settings.responsive;

			// responsive class
			if (settings.responsiveClass) {
				this.$element.attr('class',
					this.$element.attr('class').replace(new RegExp('(' + this.options.responsiveClass + '-)\\S+\\s', 'g'), '$1' + match)
				);
			}
		}

		this.trigger('change', { property: { name: 'settings', value: settings } });
		this._breakpoint = match;
		this.settings = settings;
		this.invalidate('settings');
		this.trigger('changed', { property: { name: 'settings', value: this.settings } });
	};

	/**
	 * Updates option logic if necessery.
	 * @protected
	 */
	Owl.prototype.optionsLogic = function() {
		if (this.settings.autoWidth) {
			this.settings.stagePadding = false;
			this.settings.merge = false;
		}
	};

	/**
	 * Prepares an item before add.
	 * @todo Rename event parameter `content` to `item`.
	 * @protected
	 * @returns {jQuery|HTMLElement} - The item container.
	 */
	Owl.prototype.prepare = function(item) {
		var event = this.trigger('prepare', { content: item });

		if (!event.data) {
			event.data = $('<' + this.settings.itemElement + '/>')
				.addClass(this.options.itemClass).append(item)
		}

		this.trigger('prepared', { content: event.data });

		return event.data;
	};

	/**
	 * Updates the view.
	 * @public
	 */
	Owl.prototype.update = function() {
		var i = 0,
			n = this._pipe.length,
			filter = $.proxy((function(p) { return this[p] }), this._invalidated),
			cache = {};

		while (i < n) {
			if (this._invalidated.all || $.grep(this._pipe[i].filter, filter).length > 0) {
				this._pipe[i].run(cache);
			}
			i++;
		}

		this._invalidated = {};

		!this.is('valid') && this.enter('valid');
	};

	/**
	 * Gets the width of the view.
	 * @public
	 * @param {Owl.Width} [dimension=Owl.Width.Default] - The dimension to return.
	 * @returns {Number} - The width of the view in pixel.
	 */
	Owl.prototype.width = function(dimension) {
		dimension = dimension || Owl.Width.Default;
		switch (dimension) {
			case Owl.Width.Inner:
			case Owl.Width.Outer:
				return this._width;
			default:
				return this._width - this.settings.stagePadding * 2 + this.settings.margin;
		}
	};

	/**
	 * Refreshes the carousel primarily for adaptive purposes.
	 * @public
	 */
	Owl.prototype.refresh = function() {
		this.enter('refreshing');
		this.trigger('refresh');

		this.setup();

		this.optionsLogic();

		this.$element.addClass(this.options.refreshClass);

		this.update();

		this.$element.removeClass(this.options.refreshClass);

		this.leave('refreshing');
		this.trigger('refreshed');
	};

	/**
	 * Checks window `resize` event.
	 * @protected
	 */
	Owl.prototype.onThrottledResize = function() {
		window.clearTimeout(this.resizeTimer);
		this.resizeTimer = window.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate);
	};

	/**
	 * Checks window `resize` event.
	 * @protected
	 */
	Owl.prototype.onResize = function() {
		if (!this._items.length) {
			return false;
		}

		if (this._width === this.$element.width()) {
			return false;
		}

		if (!this.isVisible()) {
			return false;
		}

		this.enter('resizing');

		if (this.trigger('resize').isDefaultPrevented()) {
			this.leave('resizing');
			return false;
		}

		this.invalidate('width');

		this.refresh();

		this.leave('resizing');
		this.trigger('resized');
	};

	/**
	 * Registers event handlers.
	 * @todo Check `msPointerEnabled`
	 * @todo #261
	 * @protected
	 */
	Owl.prototype.registerEventHandlers = function() {
		if ($.support.transition) {
			this.$stage.on($.support.transition.end + '.owl.core', $.proxy(this.onTransitionEnd, this));
		}

		if (this.settings.responsive !== false) {
			this.on(window, 'resize', this._handlers.onThrottledResize);
		}

		if (this.settings.mouseDrag) {
			this.$element.addClass(this.options.dragClass);
			this.$stage.on('mousedown.owl.core', $.proxy(this.onDragStart, this));
			this.$stage.on('dragstart.owl.core selectstart.owl.core', (function() { return false }));
		}

		if (this.settings.touchDrag){
			this.$stage.on('touchstart.owl.core', $.proxy(this.onDragStart, this));
			this.$stage.on('touchcancel.owl.core', $.proxy(this.onDragEnd, this));
		}
	};

	/**
	 * Handles `touchstart` and `mousedown` events.
	 * @todo Horizontal swipe threshold as option
	 * @todo #261
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragStart = function(event) {
		var stage = null;

		if (event.which === 3) {
			return;
		}

		if ($.support.transform) {
			stage = this.$stage.css('transform').replace(/.*\(|\)| /g, '').split(',');
			stage = {
				x: stage[stage.length === 16 ? 12 : 4],
				y: stage[stage.length === 16 ? 13 : 5]
			};
		} else {
			stage = this.$stage.position();
			stage = {
				x: this.settings.rtl ?
					stage.left + this.$stage.width() - this.width() + this.settings.margin :
					stage.left,
				y: stage.top
			};
		}

		if (this.is('animating')) {
			$.support.transform ? this.animate(stage.x) : this.$stage.stop()
			this.invalidate('position');
		}

		this.$element.toggleClass(this.options.grabClass, event.type === 'mousedown');

		this.speed(0);

		this._drag.time = new Date().getTime();
		this._drag.target = $(event.target);
		this._drag.stage.start = stage;
		this._drag.stage.current = stage;
		this._drag.pointer = this.pointer(event);

		$(document).on('mouseup.owl.core touchend.owl.core', $.proxy(this.onDragEnd, this));

		$(document).one('mousemove.owl.core touchmove.owl.core', $.proxy((function(event) {
			var delta = this.difference(this._drag.pointer, this.pointer(event));

			$(document).on('mousemove.owl.core touchmove.owl.core', $.proxy(this.onDragMove, this));

			if (Math.abs(delta.x) < Math.abs(delta.y) && this.is('valid')) {
				return;
			}

			event.preventDefault();

			this.enter('dragging');
			this.trigger('drag');
		}), this));
	};

	/**
	 * Handles the `touchmove` and `mousemove` events.
	 * @todo #261
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragMove = function(event) {
		var minimum = null,
			maximum = null,
			pull = null,
			delta = this.difference(this._drag.pointer, this.pointer(event)),
			stage = this.difference(this._drag.stage.start, delta);

		if (!this.is('dragging')) {
			return;
		}

		event.preventDefault();

		if (this.settings.loop) {
			minimum = this.coordinates(this.minimum());
			maximum = this.coordinates(this.maximum() + 1) - minimum;
			stage.x = (((stage.x - minimum) % maximum + maximum) % maximum) + minimum;
		} else {
			minimum = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum());
			maximum = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum());
			pull = this.settings.pullDrag ? -1 * delta.x / 5 : 0;
			stage.x = Math.max(Math.min(stage.x, minimum + pull), maximum + pull);
		}

		this._drag.stage.current = stage;

		this.animate(stage.x);
	};

	/**
	 * Handles the `touchend` and `mouseup` events.
	 * @todo #261
	 * @todo Threshold for click event
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragEnd = function(event) {
		var delta = this.difference(this._drag.pointer, this.pointer(event)),
			stage = this._drag.stage.current,
			direction = delta.x > 0 ^ this.settings.rtl ? 'left' : 'right';

		$(document).off('.owl.core');

		this.$element.removeClass(this.options.grabClass);

		if (delta.x !== 0 && this.is('dragging') || !this.is('valid')) {
			this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed);
			this.current(this.closest(stage.x, delta.x !== 0 ? direction : this._drag.direction));
			this.invalidate('position');
			this.update();

			this._drag.direction = direction;

			if (Math.abs(delta.x) > 3 || new Date().getTime() - this._drag.time > 300) {
				this._drag.target.one('click.owl.core', (function() { return false; }));
			}
		}

		if (!this.is('dragging')) {
			return;
		}

		this.leave('dragging');
		this.trigger('dragged');
	};

	/**
	 * Gets absolute position of the closest item for a coordinate.
	 * @todo Setting `freeDrag` makes `closest` not reusable. See #165.
	 * @protected
	 * @param {Number} coordinate - The coordinate in pixel.
	 * @param {String} direction - The direction to check for the closest item. Ether `left` or `right`.
	 * @return {Number} - The absolute position of the closest item.
	 */
	Owl.prototype.closest = function(coordinate, direction) {
		var position = -1,
			pull = 30,
			width = this.width(),
			coordinates = this.coordinates();

		if (!this.settings.freeDrag) {
			// check closest item
			$.each(coordinates, $.proxy((function(index, value) {
				// on a left pull, check on current index
				if (direction === 'left' && coordinate > value - pull && coordinate < value + pull) {
					position = index;
				// on a right pull, check on previous index
				// to do so, subtract width from value and set position = index + 1
				} else if (direction === 'right' && coordinate > value - width - pull && coordinate < value - width + pull) {
					position = index + 1;
				} else if (this.op(coordinate, '<', value)
					&& this.op(coordinate, '>', coordinates[index + 1] !== undefined ? coordinates[index + 1] : value - width)) {
					position = direction === 'left' ? index + 1 : index;
				}
				return position === -1;
			}), this));
		}

		if (!this.settings.loop) {
			// non loop boundries
			if (this.op(coordinate, '>', coordinates[this.minimum()])) {
				position = coordinate = this.minimum();
			} else if (this.op(coordinate, '<', coordinates[this.maximum()])) {
				position = coordinate = this.maximum();
			}
		}

		return position;
	};

	/**
	 * Animates the stage.
	 * @todo #270
	 * @public
	 * @param {Number} coordinate - The coordinate in pixels.
	 */
	Owl.prototype.animate = function(coordinate) {
		var animate = this.speed() > 0;

		this.is('animating') && this.onTransitionEnd();

		if (animate) {
			this.enter('animating');
			this.trigger('translate');
		}

		if ($.support.transform3d && $.support.transition) {
			this.$stage.css({
				transform: 'translate3d(' + coordinate + 'px,0px,0px)',
				transition: (this.speed() / 1000) + 's' + (
					this.settings.slideTransition ? ' ' + this.settings.slideTransition : ''
				)
			});
		} else if (animate) {
			this.$stage.animate({
				left: coordinate + 'px'
			}, this.speed(), this.settings.fallbackEasing, $.proxy(this.onTransitionEnd, this));
		} else {
			this.$stage.css({
				left: coordinate + 'px'
			});
		}
	};

	/**
	 * Checks whether the carousel is in a specific state or not.
	 * @param {String} state - The state to check.
	 * @returns {Boolean} - The flag which indicates if the carousel is busy.
	 */
	Owl.prototype.is = function(state) {
		return this._states.current[state] && this._states.current[state] > 0;
	};

	/**
	 * Sets the absolute position of the current item.
	 * @public
	 * @param {Number} [position] - The new absolute position or nothing to leave it unchanged.
	 * @returns {Number} - The absolute position of the current item.
	 */
	Owl.prototype.current = function(position) {
		if (position === undefined) {
			return this._current;
		}

		if (this._items.length === 0) {
			return undefined;
		}

		position = this.normalize(position);

		if (this._current !== position) {
			var event = this.trigger('change', { property: { name: 'position', value: position } });

			if (event.data !== undefined) {
				position = this.normalize(event.data);
			}

			this._current = position;

			this.invalidate('position');

			this.trigger('changed', { property: { name: 'position', value: this._current } });
		}

		return this._current;
	};

	/**
	 * Invalidates the given part of the update routine.
	 * @param {String} [part] - The part to invalidate.
	 * @returns {Array.<String>} - The invalidated parts.
	 */
	Owl.prototype.invalidate = function(part) {
		if ($.type(part) === 'string') {
			this._invalidated[part] = true;
			this.is('valid') && this.leave('valid');
		}
		return $.map(this._invalidated, (function(v, i) { return i }));
	};

	/**
	 * Resets the absolute position of the current item.
	 * @public
	 * @param {Number} position - The absolute position of the new item.
	 */
	Owl.prototype.reset = function(position) {
		position = this.normalize(position);

		if (position === undefined) {
			return;
		}

		this._speed = 0;
		this._current = position;

		this.suppress([ 'translate', 'translated' ]);

		this.animate(this.coordinates(position));

		this.release([ 'translate', 'translated' ]);
	};

	/**
	 * Normalizes an absolute or a relative position of an item.
	 * @public
	 * @param {Number} position - The absolute or relative position to normalize.
	 * @param {Boolean} [relative=false] - Whether the given position is relative or not.
	 * @returns {Number} - The normalized position.
	 */
	Owl.prototype.normalize = function(position, relative) {
		var n = this._items.length,
			m = relative ? 0 : this._clones.length;

		if (!this.isNumeric(position) || n < 1) {
			position = undefined;
		} else if (position < 0 || position >= n + m) {
			position = ((position - m / 2) % n + n) % n + m / 2;
		}

		return position;
	};

	/**
	 * Converts an absolute position of an item into a relative one.
	 * @public
	 * @param {Number} position - The absolute position to convert.
	 * @returns {Number} - The converted position.
	 */
	Owl.prototype.relative = function(position) {
		position -= this._clones.length / 2;
		return this.normalize(position, true);
	};

	/**
	 * Gets the maximum position for the current item.
	 * @public
	 * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
	 * @returns {Number}
	 */
	Owl.prototype.maximum = function(relative) {
		var settings = this.settings,
			maximum = this._coordinates.length,
			iterator,
			reciprocalItemsWidth,
			elementWidth;

		if (settings.loop) {
			maximum = this._clones.length / 2 + this._items.length - 1;
		} else if (settings.autoWidth || settings.merge) {
			iterator = this._items.length;
			if (iterator) {
				reciprocalItemsWidth = this._items[--iterator].width();
				elementWidth = this.$element.width();
				while (iterator--) {
					reciprocalItemsWidth += this._items[iterator].width() + this.settings.margin;
					if (reciprocalItemsWidth > elementWidth) {
						break;
					}
				}
			}
			maximum = iterator + 1;
		} else if (settings.center) {
			maximum = this._items.length - 1;
		} else {
			maximum = this._items.length - settings.items;
		}

		if (relative) {
			maximum -= this._clones.length / 2;
		}

		return Math.max(maximum, 0);
	};

	/**
	 * Gets the minimum position for the current item.
	 * @public
	 * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
	 * @returns {Number}
	 */
	Owl.prototype.minimum = function(relative) {
		return relative ? 0 : this._clones.length / 2;
	};

	/**
	 * Gets an item at the specified relative position.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
	 */
	Owl.prototype.items = function(position) {
		if (position === undefined) {
			return this._items.slice();
		}

		position = this.normalize(position, true);
		return this._items[position];
	};

	/**
	 * Gets an item at the specified relative position.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
	 */
	Owl.prototype.mergers = function(position) {
		if (position === undefined) {
			return this._mergers.slice();
		}

		position = this.normalize(position, true);
		return this._mergers[position];
	};

	/**
	 * Gets the absolute positions of clones for an item.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @returns {Array.<Number>} - The absolute positions of clones for the item or all if no position was given.
	 */
	Owl.prototype.clones = function(position) {
		var odd = this._clones.length / 2,
			even = odd + this._items.length,
			map = function(index) { return index % 2 === 0 ? even + index / 2 : odd - (index + 1) / 2 };

		if (position === undefined) {
			return $.map(this._clones, (function(v, i) { return map(i) }));
		}

		return $.map(this._clones, (function(v, i) { return v === position ? map(i) : null }));
	};

	/**
	 * Sets the current animation speed.
	 * @public
	 * @param {Number} [speed] - The animation speed in milliseconds or nothing to leave it unchanged.
	 * @returns {Number} - The current animation speed in milliseconds.
	 */
	Owl.prototype.speed = function(speed) {
		if (speed !== undefined) {
			this._speed = speed;
		}

		return this._speed;
	};

	/**
	 * Gets the coordinate of an item.
	 * @todo The name of this method is missleanding.
	 * @public
	 * @param {Number} position - The absolute position of the item within `minimum()` and `maximum()`.
	 * @returns {Number|Array.<Number>} - The coordinate of the item in pixel or all coordinates.
	 */
	Owl.prototype.coordinates = function(position) {
		var multiplier = 1,
			newPosition = position - 1,
			coordinate;

		if (position === undefined) {
			return $.map(this._coordinates, $.proxy((function(coordinate, index) {
				return this.coordinates(index);
			}), this));
		}

		if (this.settings.center) {
			if (this.settings.rtl) {
				multiplier = -1;
				newPosition = position + 1;
			}

			coordinate = this._coordinates[position];
			coordinate += (this.width() - coordinate + (this._coordinates[newPosition] || 0)) / 2 * multiplier;
		} else {
			coordinate = this._coordinates[newPosition] || 0;
		}

		coordinate = Math.ceil(coordinate);

		return coordinate;
	};

	/**
	 * Calculates the speed for a translation.
	 * @protected
	 * @param {Number} from - The absolute position of the start item.
	 * @param {Number} to - The absolute position of the target item.
	 * @param {Number} [factor=undefined] - The time factor in milliseconds.
	 * @returns {Number} - The time in milliseconds for the translation.
	 */
	Owl.prototype.duration = function(from, to, factor) {
		if (factor === 0) {
			return 0;
		}

		return Math.min(Math.max(Math.abs(to - from), 1), 6) * Math.abs((factor || this.settings.smartSpeed));
	};

	/**
	 * Slides to the specified item.
	 * @public
	 * @param {Number} position - The position of the item.
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.to = function(position, speed) {
		var current = this.current(),
			revert = null,
			distance = position - this.relative(current),
			direction = (distance > 0) - (distance < 0),
			items = this._items.length,
			minimum = this.minimum(),
			maximum = this.maximum();

		if (this.settings.loop) {
			if (!this.settings.rewind && Math.abs(distance) > items / 2) {
				distance += direction * -1 * items;
			}

			position = current + distance;
			revert = ((position - minimum) % items + items) % items + minimum;

			if (revert !== position && revert - distance <= maximum && revert - distance > 0) {
				current = revert - distance;
				position = revert;
				this.reset(current);
			}
		} else if (this.settings.rewind) {
			maximum += 1;
			position = (position % maximum + maximum) % maximum;
		} else {
			position = Math.max(minimum, Math.min(maximum, position));
		}

		this.speed(this.duration(current, position, speed));
		this.current(position);

		if (this.isVisible()) {
			this.update();
		}
	};

	/**
	 * Slides to the next item.
	 * @public
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.next = function(speed) {
		speed = speed || false;
		this.to(this.relative(this.current()) + 1, speed);
	};

	/**
	 * Slides to the previous item.
	 * @public
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.prev = function(speed) {
		speed = speed || false;
		this.to(this.relative(this.current()) - 1, speed);
	};

	/**
	 * Handles the end of an animation.
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onTransitionEnd = function(event) {

		// if css2 animation then event object is undefined
		if (event !== undefined) {
			event.stopPropagation();

			// Catch only owl-stage transitionEnd event
			if ((event.target || event.srcElement || event.originalTarget) !== this.$stage.get(0)) {
				return false;
			}
		}

		this.leave('animating');
		this.trigger('translated');
	};

	/**
	 * Gets viewport width.
	 * @protected
	 * @return {Number} - The width in pixel.
	 */
	Owl.prototype.viewport = function() {
		var width;
		if (this.options.responsiveBaseElement !== window) {
			width = $(this.options.responsiveBaseElement).width();
		} else if (window.innerWidth) {
			width = window.innerWidth;
		} else if (document.documentElement && document.documentElement.clientWidth) {
			width = document.documentElement.clientWidth;
		} else {
			console.warn('Can not detect viewport width.');
		}
		return width;
	};

	/**
	 * Replaces the current content.
	 * @public
	 * @param {HTMLElement|jQuery|String} content - The new content.
	 */
	Owl.prototype.replace = function(content) {
		this.$stage.empty();
		this._items = [];

		if (content) {
			content = (content instanceof jQuery) ? content : $(content);
		}

		if (this.settings.nestedItemSelector) {
			content = content.find('.' + this.settings.nestedItemSelector);
		}

		content.filter((function() {
			return this.nodeType === 1;
		})).each($.proxy((function(index, item) {
			item = this.prepare(item);
			this.$stage.append(item);
			this._items.push(item);
			this._mergers.push(item.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		}), this));

		this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0);

		this.invalidate('items');
	};

	/**
	 * Adds an item.
	 * @todo Use `item` instead of `content` for the event arguments.
	 * @public
	 * @param {HTMLElement|jQuery|String} content - The item content to add.
	 * @param {Number} [position] - The relative position at which to insert the item otherwise the item will be added to the end.
	 */
	Owl.prototype.add = function(content, position) {
		var current = this.relative(this._current);

		position = position === undefined ? this._items.length : this.normalize(position, true);
		content = content instanceof jQuery ? content : $(content);

		this.trigger('add', { content: content, position: position });

		content = this.prepare(content);

		if (this._items.length === 0 || position === this._items.length) {
			this._items.length === 0 && this.$stage.append(content);
			this._items.length !== 0 && this._items[position - 1].after(content);
			this._items.push(content);
			this._mergers.push(content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		} else {
			this._items[position].before(content);
			this._items.splice(position, 0, content);
			this._mergers.splice(position, 0, content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		}

		this._items[current] && this.reset(this._items[current].index());

		this.invalidate('items');

		this.trigger('added', { content: content, position: position });
	};

	/**
	 * Removes an item by its position.
	 * @todo Use `item` instead of `content` for the event arguments.
	 * @public
	 * @param {Number} position - The relative position of the item to remove.
	 */
	Owl.prototype.remove = function(position) {
		position = this.normalize(position, true);

		if (position === undefined) {
			return;
		}

		this.trigger('remove', { content: this._items[position], position: position });

		this._items[position].remove();
		this._items.splice(position, 1);
		this._mergers.splice(position, 1);

		this.invalidate('items');

		this.trigger('removed', { content: null, position: position });
	};

	/**
	 * Preloads images with auto width.
	 * @todo Replace by a more generic approach
	 * @protected
	 */
	Owl.prototype.preloadAutoWidthImages = function(images) {
		images.each($.proxy((function(i, element) {
			this.enter('pre-loading');
			element = $(element);
			$(new Image()).one('load', $.proxy((function(e) {
				element.attr('src', e.target.src);
				element.css('opacity', 1);
				this.leave('pre-loading');
				!this.is('pre-loading') && !this.is('initializing') && this.refresh();
			}), this)).attr('src', element.attr('src') || element.attr('data-src') || element.attr('data-src-retina'));
		}), this));
	};

	/**
	 * Destroys the carousel.
	 * @public
	 */
	Owl.prototype.destroy = function() {

		this.$element.off('.owl.core');
		this.$stage.off('.owl.core');
		$(document).off('.owl.core');

		if (this.settings.responsive !== false) {
			window.clearTimeout(this.resizeTimer);
			this.off(window, 'resize', this._handlers.onThrottledResize);
		}

		for (var i in this._plugins) {
			this._plugins[i].destroy();
		}

		this.$stage.children('.cloned').remove();

		this.$stage.unwrap();
		this.$stage.children().contents().unwrap();
		this.$stage.children().unwrap();
		this.$stage.remove();
		this.$element
			.removeClass(this.options.refreshClass)
			.removeClass(this.options.loadingClass)
			.removeClass(this.options.loadedClass)
			.removeClass(this.options.rtlClass)
			.removeClass(this.options.dragClass)
			.removeClass(this.options.grabClass)
			.attr('class', this.$element.attr('class').replace(new RegExp(this.options.responsiveClass + '-\\S+\\s', 'g'), ''))
			.removeData('owl.carousel');
	};

	/**
	 * Operators to calculate right-to-left and left-to-right.
	 * @protected
	 * @param {Number} [a] - The left side operand.
	 * @param {String} [o] - The operator.
	 * @param {Number} [b] - The right side operand.
	 */
	Owl.prototype.op = function(a, o, b) {
		var rtl = this.settings.rtl;
		switch (o) {
			case '<':
				return rtl ? a > b : a < b;
			case '>':
				return rtl ? a < b : a > b;
			case '>=':
				return rtl ? a <= b : a >= b;
			case '<=':
				return rtl ? a >= b : a <= b;
			default:
				break;
		}
	};

	/**
	 * Attaches to an internal event.
	 * @protected
	 * @param {HTMLElement} element - The event source.
	 * @param {String} event - The event name.
	 * @param {Function} listener - The event handler to attach.
	 * @param {Boolean} capture - Wether the event should be handled at the capturing phase or not.
	 */
	Owl.prototype.on = function(element, event, listener, capture) {
		if (element.addEventListener) {
			element.addEventListener(event, listener, capture);
		} else if (element.attachEvent) {
			element.attachEvent('on' + event, listener);
		}
	};

	/**
	 * Detaches from an internal event.
	 * @protected
	 * @param {HTMLElement} element - The event source.
	 * @param {String} event - The event name.
	 * @param {Function} listener - The attached event handler to detach.
	 * @param {Boolean} capture - Wether the attached event handler was registered as a capturing listener or not.
	 */
	Owl.prototype.off = function(element, event, listener, capture) {
		if (element.removeEventListener) {
			element.removeEventListener(event, listener, capture);
		} else if (element.detachEvent) {
			element.detachEvent('on' + event, listener);
		}
	};

	/**
	 * Triggers a public event.
	 * @todo Remove `status`, `relatedTarget` should be used instead.
	 * @protected
	 * @param {String} name - The event name.
	 * @param {*} [data=null] - The event data.
	 * @param {String} [namespace=carousel] - The event namespace.
	 * @param {String} [state] - The state which is associated with the event.
	 * @param {Boolean} [enter=false] - Indicates if the call enters the specified state or not.
	 * @returns {Event} - The event arguments.
	 */
	Owl.prototype.trigger = function(name, data, namespace, state, enter) {
		var status = {
			item: { count: this._items.length, index: this.current() }
		}, handler = $.camelCase(
			$.grep([ 'on', name, namespace ], (function(v) { return v }))
				.join('-').toLowerCase()
		), event = $.Event(
			[ name, 'owl', namespace || 'carousel' ].join('.').toLowerCase(),
			$.extend({ relatedTarget: this }, status, data)
		);

		if (!this._supress[name]) {
			$.each(this._plugins, (function(name, plugin) {
				if (plugin.onTrigger) {
					plugin.onTrigger(event);
				}
			}));

			this.register({ type: Owl.Type.Event, name: name });
			this.$element.trigger(event);

			if (this.settings && typeof this.settings[handler] === 'function') {
				this.settings[handler].call(this, event);
			}
		}

		return event;
	};

	/**
	 * Enters a state.
	 * @param name - The state name.
	 */
	Owl.prototype.enter = function(name) {
		$.each([ name ].concat(this._states.tags[name] || []), $.proxy((function(i, name) {
			if (this._states.current[name] === undefined) {
				this._states.current[name] = 0;
			}

			this._states.current[name]++;
		}), this));
	};

	/**
	 * Leaves a state.
	 * @param name - The state name.
	 */
	Owl.prototype.leave = function(name) {
		$.each([ name ].concat(this._states.tags[name] || []), $.proxy((function(i, name) {
			this._states.current[name]--;
		}), this));
	};

	/**
	 * Registers an event or state.
	 * @public
	 * @param {Object} object - The event or state to register.
	 */
	Owl.prototype.register = function(object) {
		if (object.type === Owl.Type.Event) {
			if (!$.event.special[object.name]) {
				$.event.special[object.name] = {};
			}

			if (!$.event.special[object.name].owl) {
				var _default = $.event.special[object.name]._default;
				$.event.special[object.name]._default = function(e) {
					if (_default && _default.apply && (!e.namespace || e.namespace.indexOf('owl') === -1)) {
						return _default.apply(this, arguments);
					}
					return e.namespace && e.namespace.indexOf('owl') > -1;
				};
				$.event.special[object.name].owl = true;
			}
		} else if (object.type === Owl.Type.State) {
			if (!this._states.tags[object.name]) {
				this._states.tags[object.name] = object.tags;
			} else {
				this._states.tags[object.name] = this._states.tags[object.name].concat(object.tags);
			}

			this._states.tags[object.name] = $.grep(this._states.tags[object.name], $.proxy((function(tag, i) {
				return $.inArray(tag, this._states.tags[object.name]) === i;
			}), this));
		}
	};

	/**
	 * Suppresses events.
	 * @protected
	 * @param {Array.<String>} events - The events to suppress.
	 */
	Owl.prototype.suppress = function(events) {
		$.each(events, $.proxy((function(index, event) {
			this._supress[event] = true;
		}), this));
	};

	/**
	 * Releases suppressed events.
	 * @protected
	 * @param {Array.<String>} events - The events to release.
	 */
	Owl.prototype.release = function(events) {
		$.each(events, $.proxy((function(index, event) {
			delete this._supress[event];
		}), this));
	};

	/**
	 * Gets unified pointer coordinates from event.
	 * @todo #261
	 * @protected
	 * @param {Event} - The `mousedown` or `touchstart` event.
	 * @returns {Object} - Contains `x` and `y` coordinates of current pointer position.
	 */
	Owl.prototype.pointer = function(event) {
		var result = { x: null, y: null };

		event = event.originalEvent || event || window.event;

		event = event.touches && event.touches.length ?
			event.touches[0] : event.changedTouches && event.changedTouches.length ?
				event.changedTouches[0] : event;

		if (event.pageX) {
			result.x = event.pageX;
			result.y = event.pageY;
		} else {
			result.x = event.clientX;
			result.y = event.clientY;
		}

		return result;
	};

	/**
	 * Determines if the input is a Number or something that can be coerced to a Number
	 * @protected
	 * @param {Number|String|Object|Array|Boolean|RegExp|Function|Symbol} - The input to be tested
	 * @returns {Boolean} - An indication if the input is a Number or can be coerced to a Number
	 */
	Owl.prototype.isNumeric = function(number) {
		return !isNaN(parseFloat(number));
	};

	/**
	 * Gets the difference of two vectors.
	 * @todo #261
	 * @protected
	 * @param {Object} - The first vector.
	 * @param {Object} - The second vector.
	 * @returns {Object} - The difference.
	 */
	Owl.prototype.difference = function(first, second) {
		return {
			x: first.x - second.x,
			y: first.y - second.y
		};
	};

	/**
	 * The jQuery Plugin for the Owl Carousel
	 * @todo Navigation plugin `next` and `prev`
	 * @public
	 */
	$.fn.owlCarousel = function(option) {
		var args = Array.prototype.slice.call(arguments, 1);

		return this.each((function() {
			var $this = $(this),
				data = $this.data('owl.carousel');

			if (!data) {
				data = new Owl(this, typeof option == 'object' && option);
				$this.data('owl.carousel', data);

				$.each([
					'next', 'prev', 'to', 'destroy', 'refresh', 'replace', 'add', 'remove'
				], (function(i, event) {
					data.register({ type: Owl.Type.Event, name: event });
					data.$element.on(event + '.owl.carousel.core', $.proxy((function(e) {
						if (e.namespace && e.relatedTarget !== this) {
							this.suppress([ event ]);
							data[event].apply(this, [].slice.call(arguments, 1));
							this.release([ event ]);
						}
					}), data));
				}));
			}

			if (typeof option == 'string' && option.charAt(0) !== '_') {
				data[option].apply(data, args);
			}
		}));
	};

	/**
	 * The constructor for the jQuery Plugin
	 * @public
	 */
	$.fn.owlCarousel.Constructor = Owl;

})(window.Zepto || window.jQuery, window, document);

/**
 * AutoRefresh Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the auto refresh plugin.
	 * @class The Auto Refresh Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var AutoRefresh = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Refresh interval.
		 * @protected
		 * @type {number}
		 */
		this._interval = null;

		/**
		 * Whether the element is currently visible or not.
		 * @protected
		 * @type {Boolean}
		 */
		this._visible = null;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.settings.autoRefresh) {
					this.watch();
				}
			}), this)
		};

		// set default options
		this._core.options = $.extend({}, AutoRefresh.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	AutoRefresh.Defaults = {
		autoRefresh: true,
		autoRefreshInterval: 500
	};

	/**
	 * Watches the element.
	 */
	AutoRefresh.prototype.watch = function() {
		if (this._interval) {
			return;
		}

		this._visible = this._core.isVisible();
		this._interval = window.setInterval($.proxy(this.refresh, this), this._core.settings.autoRefreshInterval);
	};

	/**
	 * Refreshes the element.
	 */
	AutoRefresh.prototype.refresh = function() {
		if (this._core.isVisible() === this._visible) {
			return;
		}

		this._visible = !this._visible;

		this._core.$element.toggleClass('owl-hidden', !this._visible);

		this._visible && (this._core.invalidate('width') && this._core.refresh());
	};

	/**
	 * Destroys the plugin.
	 */
	AutoRefresh.prototype.destroy = function() {
		var handler, property;

		window.clearInterval(this._interval);

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.AutoRefresh = AutoRefresh;

})(window.Zepto || window.jQuery, window, document);

/**
 * Lazy Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the lazy plugin.
	 * @class The Lazy Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Lazy = function(carousel) {

		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Already loaded items.
		 * @protected
		 * @type {Array.<jQuery>}
		 */
		this._loaded = [];

		/**
		 * Event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel change.owl.carousel resized.owl.carousel': $.proxy((function(e) {
				if (!e.namespace) {
					return;
				}

				if (!this._core.settings || !this._core.settings.lazyLoad) {
					return;
				}

				if ((e.property && e.property.name == 'position') || e.type == 'initialized') {
					var settings = this._core.settings,
						n = (settings.center && Math.ceil(settings.items / 2) || settings.items),
						i = ((settings.center && n * -1) || 0),
						position = (e.property && e.property.value !== undefined ? e.property.value : this._core.current()) + i,
						clones = this._core.clones().length,
						load = $.proxy((function(i, v) { this.load(v) }), this);
					//TODO: Need documentation for this new option
					if (settings.lazyLoadEager > 0) {
						n += settings.lazyLoadEager;
						// If the carousel is looping also preload images that are to the "left"
						if (settings.loop) {
              position -= settings.lazyLoadEager;
              n++;
            }
					}

					while (i++ < n) {
						this.load(clones / 2 + this._core.relative(position));
						clones && $.each(this._core.clones(this._core.relative(position)), load);
						position++;
					}
				}
			}), this)
		};

		// set the default options
		this._core.options = $.extend({}, Lazy.Defaults, this._core.options);

		// register event handler
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	Lazy.Defaults = {
		lazyLoad: false,
		lazyLoadEager: 0
	};

	/**
	 * Loads all resources of an item at the specified position.
	 * @param {Number} position - The absolute position of the item.
	 * @protected
	 */
	Lazy.prototype.load = function(position) {
		var $item = this._core.$stage.children().eq(position),
			$elements = $item && $item.find('.owl-lazy');

		if (!$elements || $.inArray($item.get(0), this._loaded) > -1) {
			return;
		}

		$elements.each($.proxy((function(index, element) {
			var $element = $(element), image,
                url = (window.devicePixelRatio > 1 && $element.attr('data-src-retina')) || $element.attr('data-src') || $element.attr('data-srcset');

			this._core.trigger('load', { element: $element, url: url }, 'lazy');

			if ($element.is('img')) {
				$element.one('load.owl.lazy', $.proxy((function() {
					$element.css('opacity', 1);
					this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
				}), this)).attr('src', url);
            } else if ($element.is('source')) {
                $element.one('load.owl.lazy', $.proxy((function() {
                    this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
                }), this)).attr('srcset', url);
			} else {
				image = new Image();
				image.onload = $.proxy((function() {
					$element.css({
						'background-image': 'url("' + url + '")',
						'opacity': '1'
					});
					this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
				}), this);
				image.src = url;
			}
		}), this));

		this._loaded.push($item.get(0));
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Lazy.prototype.destroy = function() {
		var handler, property;

		for (handler in this.handlers) {
			this._core.$element.off(handler, this.handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Lazy = Lazy;

})(window.Zepto || window.jQuery, window, document);

/**
 * AutoHeight Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the auto height plugin.
	 * @class The Auto Height Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var AutoHeight = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		this._previousHeight = null;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel refreshed.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.settings.autoHeight) {
					this.update();
				}
			}), this),
			'changed.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.settings.autoHeight && e.property.name === 'position'){
					this.update();
				}
			}), this),
			'loaded.owl.lazy': $.proxy((function(e) {
				if (e.namespace && this._core.settings.autoHeight
					&& e.element.closest('.' + this._core.settings.itemClass).index() === this._core.current()) {
					this.update();
				}
			}), this)
		};

		// set default options
		this._core.options = $.extend({}, AutoHeight.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);
		this._intervalId = null;
		var refThis = this;

		// These changes have been taken from a PR by gavrochelegnou proposed in #1575
		// and have been made compatible with the latest jQuery version
		$(window).on('load', (function() {
			if (refThis._core.settings.autoHeight) {
				refThis.update();
			}
		}));

		// Autoresize the height of the carousel when window is resized
		// When carousel has images, the height is dependent on the width
		// and should also change on resize
		$(window).resize((function() {
			if (refThis._core.settings.autoHeight) {
				if (refThis._intervalId != null) {
					clearTimeout(refThis._intervalId);
				}

				refThis._intervalId = setTimeout((function() {
					refThis.update();
				}), 250);
			}
		}));

	};

	/**
	 * Default options.
	 * @public
	 */
	AutoHeight.Defaults = {
		autoHeight: false,
		autoHeightClass: 'owl-height'
	};

	/**
	 * Updates the view.
	 */
	AutoHeight.prototype.update = function() {
		var start = this._core._current,
			end = start + this._core.settings.items,
			lazyLoadEnabled = this._core.settings.lazyLoad,
			visible = this._core.$stage.children().toArray().slice(start, end),
			heights = [],
			maxheight = 0;

		$.each(visible, (function(index, item) {
			heights.push($(item).height());
		}));

		maxheight = Math.max.apply(null, heights);

		if (maxheight <= 1 && lazyLoadEnabled && this._previousHeight) {
			maxheight = this._previousHeight;
		}

		this._previousHeight = maxheight;

		this._core.$stage.parent()
			.height(maxheight)
			.addClass(this._core.settings.autoHeightClass);
	};

	AutoHeight.prototype.destroy = function() {
		var handler, property;

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] !== 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.AutoHeight = AutoHeight;

})(window.Zepto || window.jQuery, window, document);

/**
 * Video Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the video plugin.
	 * @class The Video Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Video = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Cache all video URLs.
		 * @protected
		 * @type {Object}
		 */
		this._videos = {};

		/**
		 * Current playing item.
		 * @protected
		 * @type {jQuery}
		 */
		this._playing = null;

		/**
		 * All event handlers.
		 * @todo The cloned content removale is too late
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy((function(e) {
				if (e.namespace) {
					this._core.register({ type: 'state', name: 'playing', tags: [ 'interacting' ] });
				}
			}), this),
			'resize.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.settings.video && this.isInFullScreen()) {
					e.preventDefault();
				}
			}), this),
			'refreshed.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.is('resizing')) {
					this._core.$stage.find('.cloned .owl-video-frame').remove();
				}
			}), this),
			'changed.owl.carousel': $.proxy((function(e) {
				if (e.namespace && e.property.name === 'position' && this._playing) {
					this.stop();
				}
			}), this),
			'prepared.owl.carousel': $.proxy((function(e) {
				if (!e.namespace) {
					return;
				}

				var $element = $(e.content).find('.owl-video');

				if ($element.length) {
					$element.css('display', 'none');
					this.fetch($element, $(e.content));
				}
			}), this)
		};

		// set default options
		this._core.options = $.extend({}, Video.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);

		this._core.$element.on('click.owl.video', '.owl-video-play-icon', $.proxy((function(e) {
			this.play(e);
		}), this));
	};

	/**
	 * Default options.
	 * @public
	 */
	Video.Defaults = {
		video: false,
		videoHeight: false,
		videoWidth: false
	};

	/**
	 * Gets the video ID and the type (YouTube/Vimeo/vzaar only).
	 * @protected
	 * @param {jQuery} target - The target containing the video data.
	 * @param {jQuery} item - The item containing the video.
	 */
	Video.prototype.fetch = function(target, item) {
			var type = (function() {
					if (target.attr('data-vimeo-id')) {
						return 'vimeo';
					} else if (target.attr('data-vzaar-id')) {
						return 'vzaar'
					} else {
						return 'youtube';
					}
				})(),
				id = target.attr('data-vimeo-id') || target.attr('data-youtube-id') || target.attr('data-vzaar-id'),
				width = target.attr('data-width') || this._core.settings.videoWidth,
				height = target.attr('data-height') || this._core.settings.videoHeight,
				url = target.attr('href');

		if (url) {

			/*
					Parses the id's out of the following urls (and probably more):
					https://www.youtube.com/watch?v=:id
					https://youtu.be/:id
					https://vimeo.com/:id
					https://vimeo.com/channels/:channel/:id
					https://vimeo.com/groups/:group/videos/:id
					https://app.vzaar.com/videos/:id

					Visual example: https://regexper.com/#(http%3A%7Chttps%3A%7C)%5C%2F%5C%2F(player.%7Cwww.%7Capp.)%3F(vimeo%5C.com%7Cyoutu(be%5C.com%7C%5C.be%7Cbe%5C.googleapis%5C.com)%7Cvzaar%5C.com)%5C%2F(video%5C%2F%7Cvideos%5C%2F%7Cembed%5C%2F%7Cchannels%5C%2F.%2B%5C%2F%7Cgroups%5C%2F.%2B%5C%2F%7Cwatch%5C%3Fv%3D%7Cv%5C%2F)%3F(%5BA-Za-z0-9._%25-%5D*)(%5C%26%5CS%2B)%3F
			*/

			id = url.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com|be\-nocookie\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);

			if (id[3].indexOf('youtu') > -1) {
				type = 'youtube';
			} else if (id[3].indexOf('vimeo') > -1) {
				type = 'vimeo';
			} else if (id[3].indexOf('vzaar') > -1) {
				type = 'vzaar';
			} else {
				throw new Error('Video URL not supported.');
			}
			id = id[6];
		} else {
			throw new Error('Missing video URL.');
		}

		this._videos[url] = {
			type: type,
			id: id,
			width: width,
			height: height
		};

		item.attr('data-video', url);

		this.thumbnail(target, this._videos[url]);
	};

	/**
	 * Creates video thumbnail.
	 * @protected
	 * @param {jQuery} target - The target containing the video data.
	 * @param {Object} info - The video info object.
	 * @see `fetch`
	 */
	Video.prototype.thumbnail = function(target, video) {
		var tnLink,
			icon,
			path,
			dimensions = video.width && video.height ? 'width:' + video.width + 'px;height:' + video.height + 'px;' : '',
			customTn = target.find('img'),
			srcType = 'src',
			lazyClass = '',
			settings = this._core.settings,
			create = function(path) {
				icon = '<div class="owl-video-play-icon"></div>';

				if (settings.lazyLoad) {
					tnLink = $('<div/>',{
						"class": 'owl-video-tn ' + lazyClass,
						"srcType": path
					});
				} else {
					tnLink = $( '<div/>', {
						"class": "owl-video-tn",
						"style": 'opacity:1;background-image:url(' + path + ')'
					});
				}
				target.after(tnLink);
				target.after(icon);
			};

		// wrap video content into owl-video-wrapper div
		target.wrap( $( '<div/>', {
			"class": "owl-video-wrapper",
			"style": dimensions
		}));

		if (this._core.settings.lazyLoad) {
			srcType = 'data-src';
			lazyClass = 'owl-lazy';
		}

		// custom thumbnail
		if (customTn.length) {
			create(customTn.attr(srcType));
			customTn.remove();
			return false;
		}

		if (video.type === 'youtube') {
			path = "//img.youtube.com/vi/" + video.id + "/hqdefault.jpg";
			create(path);
		} else if (video.type === 'vimeo') {
			$.ajax({
				type: 'GET',
				url: '//vimeo.com/api/v2/video/' + video.id + '.json',
				jsonp: 'callback',
				dataType: 'jsonp',
				success: function(data) {
					path = data[0].thumbnail_large;
					create(path);
				}
			});
		} else if (video.type === 'vzaar') {
			$.ajax({
				type: 'GET',
				url: '//vzaar.com/api/videos/' + video.id + '.json',
				jsonp: 'callback',
				dataType: 'jsonp',
				success: function(data) {
					path = data.framegrab_url;
					create(path);
				}
			});
		}
	};

	/**
	 * Stops the current video.
	 * @public
	 */
	Video.prototype.stop = function() {
		this._core.trigger('stop', null, 'video');
		this._playing.find('.owl-video-frame').remove();
		this._playing.removeClass('owl-video-playing');
		this._playing = null;
		this._core.leave('playing');
		this._core.trigger('stopped', null, 'video');
	};

	/**
	 * Starts the current video.
	 * @public
	 * @param {Event} event - The event arguments.
	 */
	Video.prototype.play = function(event) {
		var target = $(event.target),
			item = target.closest('.' + this._core.settings.itemClass),
			video = this._videos[item.attr('data-video')],
			width = video.width || '100%',
			height = video.height || this._core.$stage.height(),
			html,
			iframe;

		if (this._playing) {
			return;
		}

		this._core.enter('playing');
		this._core.trigger('play', null, 'video');

		item = this._core.items(this._core.relative(item.index()));

		this._core.reset(item.index());

		html = $( '<iframe frameborder="0" allowfullscreen mozallowfullscreen webkitAllowFullScreen ></iframe>' );
		html.attr( 'height', height );
		html.attr( 'width', width );
		if (video.type === 'youtube') {
			html.attr( 'src', '//www.youtube.com/embed/' + video.id + '?autoplay=1&rel=0&v=' + video.id );
		} else if (video.type === 'vimeo') {
			html.attr( 'src', '//player.vimeo.com/video/' + video.id + '?autoplay=1' );
		} else if (video.type === 'vzaar') {
			html.attr( 'src', '//view.vzaar.com/' + video.id + '/player?autoplay=true' );
		}

		iframe = $(html).wrap( '<div class="owl-video-frame" />' ).insertAfter(item.find('.owl-video'));

		this._playing = item.addClass('owl-video-playing');
	};

	/**
	 * Checks whether an video is currently in full screen mode or not.
	 * @todo Bad style because looks like a readonly method but changes members.
	 * @protected
	 * @returns {Boolean}
	 */
	Video.prototype.isInFullScreen = function() {
		var element = document.fullscreenElement || document.mozFullScreenElement ||
				document.webkitFullscreenElement;

		return element && $(element).parent().hasClass('owl-video-frame');
	};

	/**
	 * Destroys the plugin.
	 */
	Video.prototype.destroy = function() {
		var handler, property;

		this._core.$element.off('click.owl.video');

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Video = Video;

})(window.Zepto || window.jQuery, window, document);

/**
 * Animate Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the animate plugin.
	 * @class The Navigation Plugin
	 * @param {Owl} scope - The Owl Carousel
	 */
	var Animate = function(scope) {
		this.core = scope;
		this.core.options = $.extend({}, Animate.Defaults, this.core.options);
		this.swapping = true;
		this.previous = undefined;
		this.next = undefined;

		this.handlers = {
			'change.owl.carousel': $.proxy((function(e) {
				if (e.namespace && e.property.name == 'position') {
					this.previous = this.core.current();
					this.next = e.property.value;
				}
			}), this),
			'drag.owl.carousel dragged.owl.carousel translated.owl.carousel': $.proxy((function(e) {
				if (e.namespace) {
					this.swapping = e.type == 'translated';
				}
			}), this),
			'translate.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn)) {
					this.swap();
				}
			}), this)
		};

		this.core.$element.on(this.handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	Animate.Defaults = {
		animateOut: false,
		animateIn: false
	};

	/**
	 * Toggles the animation classes whenever an translations starts.
	 * @protected
	 * @returns {Boolean|undefined}
	 */
	Animate.prototype.swap = function() {

		if (this.core.settings.items !== 1) {
			return;
		}

		if (!$.support.animation || !$.support.transition) {
			return;
		}

		this.core.speed(0);

		var left,
			clear = $.proxy(this.clear, this),
			previous = this.core.$stage.children().eq(this.previous),
			next = this.core.$stage.children().eq(this.next),
			incoming = this.core.settings.animateIn,
			outgoing = this.core.settings.animateOut;

		if (this.core.current() === this.previous) {
			return;
		}

		if (outgoing) {
			left = this.core.coordinates(this.previous) - this.core.coordinates(this.next);
			previous.one($.support.animation.end, clear)
				.css( { 'left': left + 'px' } )
				.addClass('animated owl-animated-out')
				.addClass(outgoing);
		}

		if (incoming) {
			next.one($.support.animation.end, clear)
				.addClass('animated owl-animated-in')
				.addClass(incoming);
		}
	};

	Animate.prototype.clear = function(e) {
		$(e.target).css( { 'left': '' } )
			.removeClass('animated owl-animated-out owl-animated-in')
			.removeClass(this.core.settings.animateIn)
			.removeClass(this.core.settings.animateOut);
		this.core.onTransitionEnd();
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Animate.prototype.destroy = function() {
		var handler, property;

		for (handler in this.handlers) {
			this.core.$element.off(handler, this.handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Animate = Animate;

})(window.Zepto || window.jQuery, window, document);

/**
 * Autoplay Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author Artus Kolanowski
 * @author David Deutsch
 * @author Tom De Caluwé
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the autoplay plugin.
	 * @class The Autoplay Plugin
	 * @param {Owl} scope - The Owl Carousel
	 */
	var Autoplay = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * The autoplay timeout id.
		 * @type {Number}
		 */
		this._call = null;

		/**
		 * Depending on the state of the plugin, this variable contains either
		 * the start time of the timer or the current timer value if it's
		 * paused. Since we start in a paused state we initialize the timer
		 * value.
		 * @type {Number}
		 */
		this._time = 0;

		/**
		 * Stores the timeout currently used.
		 * @type {Number}
		 */
		this._timeout = 0;

		/**
		 * Indicates whenever the autoplay is paused.
		 * @type {Boolean}
		 */
		this._paused = true;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'changed.owl.carousel': $.proxy((function(e) {
				if (e.namespace && e.property.name === 'settings') {
					if (this._core.settings.autoplay) {
						this.play();
					} else {
						this.stop();
					}
				} else if (e.namespace && e.property.name === 'position' && this._paused) {
					// Reset the timer. This code is triggered when the position
					// of the carousel was changed through user interaction.
					this._time = 0;
				}
			}), this),
			'initialized.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.settings.autoplay) {
					this.play();
				}
			}), this),
			'play.owl.autoplay': $.proxy((function(e, t, s) {
				if (e.namespace) {
					this.play(t, s);
				}
			}), this),
			'stop.owl.autoplay': $.proxy((function(e) {
				if (e.namespace) {
					this.stop();
				}
			}), this),
			'mouseover.owl.autoplay': $.proxy((function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.pause();
				}
			}), this),
			'mouseleave.owl.autoplay': $.proxy((function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.play();
				}
			}), this),
			'touchstart.owl.core': $.proxy((function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.pause();
				}
			}), this),
			'touchend.owl.core': $.proxy((function() {
				if (this._core.settings.autoplayHoverPause) {
					this.play();
				}
			}), this)
		};

		// register event handlers
		this._core.$element.on(this._handlers);

		// set default options
		this._core.options = $.extend({}, Autoplay.Defaults, this._core.options);
	};

	/**
	 * Default options.
	 * @public
	 */
	Autoplay.Defaults = {
		autoplay: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		autoplaySpeed: false
	};

	/**
	 * Transition to the next slide and set a timeout for the next transition.
	 * @private
	 * @param {Number} [speed] - The animation speed for the animations.
	 */
	Autoplay.prototype._next = function(speed) {
		this._call = window.setTimeout(
			$.proxy(this._next, this, speed),
			this._timeout * (Math.round(this.read() / this._timeout) + 1) - this.read()
		);

		if (this._core.is('interacting') || document.hidden) {
			return;
		}
		this._core.next(speed || this._core.settings.autoplaySpeed);
	}

	/**
	 * Reads the current timer value when the timer is playing.
	 * @public
	 */
	Autoplay.prototype.read = function() {
		return new Date().getTime() - this._time;
	};

	/**
	 * Starts the autoplay.
	 * @public
	 * @param {Number} [timeout] - The interval before the next animation starts.
	 * @param {Number} [speed] - The animation speed for the animations.
	 */
	Autoplay.prototype.play = function(timeout, speed) {
		var elapsed;

		if (!this._core.is('rotating')) {
			this._core.enter('rotating');
		}

		timeout = timeout || this._core.settings.autoplayTimeout;

		// Calculate the elapsed time since the last transition. If the carousel
		// wasn't playing this calculation will yield zero.
		elapsed = Math.min(this._time % (this._timeout || timeout), timeout);

		if (this._paused) {
			// Start the clock.
			this._time = this.read();
			this._paused = false;
		} else {
			// Clear the active timeout to allow replacement.
			window.clearTimeout(this._call);
		}

		// Adjust the origin of the timer to match the new timeout value.
		this._time += this.read() % timeout - elapsed;

		this._timeout = timeout;
		this._call = window.setTimeout($.proxy(this._next, this, speed), timeout - elapsed);
	};

	/**
	 * Stops the autoplay.
	 * @public
	 */
	Autoplay.prototype.stop = function() {
		if (this._core.is('rotating')) {
			// Reset the clock.
			this._time = 0;
			this._paused = true;

			window.clearTimeout(this._call);
			this._core.leave('rotating');
		}
	};

	/**
	 * Pauses the autoplay.
	 * @public
	 */
	Autoplay.prototype.pause = function() {
		if (this._core.is('rotating') && !this._paused) {
			// Pause the clock.
			this._time = this.read();
			this._paused = true;

			window.clearTimeout(this._call);
		}
	};

	/**
	 * Destroys the plugin.
	 */
	Autoplay.prototype.destroy = function() {
		var handler, property;

		this.stop();

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.autoplay = Autoplay;

})(window.Zepto || window.jQuery, window, document);

/**
 * Navigation Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {
	'use strict';

	/**
	 * Creates the navigation plugin.
	 * @class The Navigation Plugin
	 * @param {Owl} carousel - The Owl Carousel.
	 */
	var Navigation = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Indicates whether the plugin is initialized or not.
		 * @protected
		 * @type {Boolean}
		 */
		this._initialized = false;

		/**
		 * The current paging indexes.
		 * @protected
		 * @type {Array}
		 */
		this._pages = [];

		/**
		 * All DOM elements of the user interface.
		 * @protected
		 * @type {Object}
		 */
		this._controls = {};

		/**
		 * Markup for an indicator.
		 * @protected
		 * @type {Array.<String>}
		 */
		this._templates = [];

		/**
		 * The carousel element.
		 * @type {jQuery}
		 */
		this.$element = this._core.$element;

		/**
		 * Overridden methods of the carousel.
		 * @protected
		 * @type {Object}
		 */
		this._overrides = {
			next: this._core.next,
			prev: this._core.prev,
			to: this._core.to
		};

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'prepared.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.push('<div class="' + this._core.settings.dotClass + '">' +
						$(e.content).find('[data-dot]').addBack('[data-dot]').attr('data-dot') + '</div>');
				}
			}), this),
			'added.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.splice(e.position, 0, this._templates.pop());
				}
			}), this),
			'remove.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.splice(e.position, 1);
				}
			}), this),
			'changed.owl.carousel': $.proxy((function(e) {
				if (e.namespace && e.property.name == 'position') {
					this.draw();
				}
			}), this),
			'initialized.owl.carousel': $.proxy((function(e) {
				if (e.namespace && !this._initialized) {
					this._core.trigger('initialize', null, 'navigation');
					this.initialize();
					this.update();
					this.draw();
					this._initialized = true;
					this._core.trigger('initialized', null, 'navigation');
				}
			}), this),
			'refreshed.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._initialized) {
					this._core.trigger('refresh', null, 'navigation');
					this.update();
					this.draw();
					this._core.trigger('refreshed', null, 'navigation');
				}
			}), this)
		};

		// set default options
		this._core.options = $.extend({}, Navigation.Defaults, this._core.options);

		// register event handlers
		this.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 * @todo Rename `slideBy` to `navBy`
	 */
	Navigation.Defaults = {
		nav: false,
		navText: [
			'<span aria-label="' + 'Previous' + '">&#x2039;</span>',
			'<span aria-label="' + 'Next' + '">&#x203a;</span>'
		],
		navSpeed: false,
		navElement: 'button type="button" role="presentation"',
		navContainer: false,
		navContainerClass: 'owl-nav',
		navClass: [
			'owl-prev',
			'owl-next'
		],
		slideBy: 1,
		dotClass: 'owl-dot',
		dotsClass: 'owl-dots',
		dots: true,
		dotsEach: false,
		dotsData: false,
		dotsSpeed: false,
		dotsContainer: false
	};

	/**
	 * Initializes the layout of the plugin and extends the carousel.
	 * @protected
	 */
	Navigation.prototype.initialize = function() {
		var override,
			settings = this._core.settings;

		// create DOM structure for relative navigation
		this._controls.$relative = (settings.navContainer ? $(settings.navContainer)
			: $('<div>').addClass(settings.navContainerClass).appendTo(this.$element)).addClass('disabled');

		this._controls.$previous = $('<' + settings.navElement + '>')
			.addClass(settings.navClass[0])
			.html(settings.navText[0])
			.prependTo(this._controls.$relative)
			.on('click', $.proxy((function(e) {
				this.prev(settings.navSpeed);
			}), this));
		this._controls.$next = $('<' + settings.navElement + '>')
			.addClass(settings.navClass[1])
			.html(settings.navText[1])
			.appendTo(this._controls.$relative)
			.on('click', $.proxy((function(e) {
				this.next(settings.navSpeed);
			}), this));

		// create DOM structure for absolute navigation
		if (!settings.dotsData) {
			this._templates = [ $('<button role="button">')
				.addClass(settings.dotClass)
				.append($('<span>'))
				.prop('outerHTML') ];
		}

		this._controls.$absolute = (settings.dotsContainer ? $(settings.dotsContainer)
			: $('<div>').addClass(settings.dotsClass).appendTo(this.$element)).addClass('disabled');

		this._controls.$absolute.on('click', 'button', $.proxy((function(e) {
			var index = $(e.target).parent().is(this._controls.$absolute)
				? $(e.target).index() : $(e.target).parent().index();

			e.preventDefault();

			this.to(index, settings.dotsSpeed);
		}), this));

		/*$el.on('focusin', function() {
			$(document).off(".carousel");

			$(document).on('keydown.carousel', function(e) {
				if(e.keyCode == 37) {
					$el.trigger('prev.owl')
				}
				if(e.keyCode == 39) {
					$el.trigger('next.owl')
				}
			});
		});*/

		// override public methods of the carousel
		for (override in this._overrides) {
			this._core[override] = $.proxy(this[override], this);
		}
	};

	/**
	 * Destroys the plugin.
	 * @protected
	 */
	Navigation.prototype.destroy = function() {
		var handler, control, property, override, settings;
		settings = this._core.settings;

		for (handler in this._handlers) {
			this.$element.off(handler, this._handlers[handler]);
		}
		for (control in this._controls) {
			if (control === '$relative' && settings.navContainer) {
				this._controls[control].html('');
			} else {
				this._controls[control].remove();
			}
		}
		for (override in this.overides) {
			this._core[override] = this._overrides[override];
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	/**
	 * Updates the internal state.
	 * @protected
	 */
	Navigation.prototype.update = function() {
		var i, j, k,
			lower = this._core.clones().length / 2,
			upper = lower + this._core.items().length,
			maximum = this._core.maximum(true),
			settings = this._core.settings,
			size = settings.center || settings.autoWidth || settings.dotsData
				? 1 : settings.dotsEach || settings.items;

		if (settings.slideBy !== 'page') {
			settings.slideBy = Math.min(settings.slideBy, settings.items);
		}

		if (settings.dots || settings.slideBy == 'page') {
			this._pages = [];

			for (i = lower, j = 0, k = 0; i < upper; i++) {
				if (j >= size || j === 0) {
					this._pages.push({
						start: Math.min(maximum, i - lower),
						end: i - lower + size - 1
					});
					if (Math.min(maximum, i - lower) === maximum) {
						break;
					}
					j = 0, ++k;
				}
				j += this._core.mergers(this._core.relative(i));
			}
		}
	};

	/**
	 * Draws the user interface.
	 * @todo The option `dotsData` wont work.
	 * @protected
	 */
	Navigation.prototype.draw = function() {
		var difference,
			settings = this._core.settings,
			disabled = this._core.items().length <= settings.items,
			index = this._core.relative(this._core.current()),
			loop = settings.loop || settings.rewind;

		this._controls.$relative.toggleClass('disabled', !settings.nav || disabled);

		if (settings.nav) {
			this._controls.$previous.toggleClass('disabled', !loop && index <= this._core.minimum(true));
			this._controls.$next.toggleClass('disabled', !loop && index >= this._core.maximum(true));
		}

		this._controls.$absolute.toggleClass('disabled', !settings.dots || disabled);

		if (settings.dots) {
			difference = this._pages.length - this._controls.$absolute.children().length;

			if (settings.dotsData && difference !== 0) {
				this._controls.$absolute.html(this._templates.join(''));
			} else if (difference > 0) {
				this._controls.$absolute.append(new Array(difference + 1).join(this._templates[0]));
			} else if (difference < 0) {
				this._controls.$absolute.children().slice(difference).remove();
			}

			this._controls.$absolute.find('.active').removeClass('active');
			this._controls.$absolute.children().eq($.inArray(this.current(), this._pages)).addClass('active');
		}
	};

	/**
	 * Extends event data.
	 * @protected
	 * @param {Event} event - The event object which gets thrown.
	 */
	Navigation.prototype.onTrigger = function(event) {
		var settings = this._core.settings;

		event.page = {
			index: $.inArray(this.current(), this._pages),
			count: this._pages.length,
			size: settings && (settings.center || settings.autoWidth || settings.dotsData
				? 1 : settings.dotsEach || settings.items)
		};
	};

	/**
	 * Gets the current page position of the carousel.
	 * @protected
	 * @returns {Number}
	 */
	Navigation.prototype.current = function() {
		var current = this._core.relative(this._core.current());
		return $.grep(this._pages, $.proxy((function(page, index) {
			return page.start <= current && page.end >= current;
		}), this)).pop();
	};

	/**
	 * Gets the current succesor/predecessor position.
	 * @protected
	 * @returns {Number}
	 */
	Navigation.prototype.getPosition = function(successor) {
		var position, length,
			settings = this._core.settings;

		if (settings.slideBy == 'page') {
			position = $.inArray(this.current(), this._pages);
			length = this._pages.length;
			successor ? ++position : --position;
			position = this._pages[((position % length) + length) % length].start;
		} else {
			position = this._core.relative(this._core.current());
			length = this._core.items().length;
			successor ? position += settings.slideBy : position -= settings.slideBy;
		}

		return position;
	};

	/**
	 * Slides to the next item or page.
	 * @public
	 * @param {Number} [speed=false] - The time in milliseconds for the transition.
	 */
	Navigation.prototype.next = function(speed) {
		$.proxy(this._overrides.to, this._core)(this.getPosition(true), speed);
	};

	/**
	 * Slides to the previous item or page.
	 * @public
	 * @param {Number} [speed=false] - The time in milliseconds for the transition.
	 */
	Navigation.prototype.prev = function(speed) {
		$.proxy(this._overrides.to, this._core)(this.getPosition(false), speed);
	};

	/**
	 * Slides to the specified item or page.
	 * @public
	 * @param {Number} position - The position of the item or page.
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 * @param {Boolean} [standard=false] - Whether to use the standard behaviour or not.
	 */
	Navigation.prototype.to = function(position, speed, standard) {
		var length;

		if (!standard && this._pages.length) {
			length = this._pages.length;
			$.proxy(this._overrides.to, this._core)(this._pages[((position % length) + length) % length].start, speed);
		} else {
			$.proxy(this._overrides.to, this._core)(position, speed);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Navigation = Navigation;

})(window.Zepto || window.jQuery, window, document);

/**
 * Hash Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {
	'use strict';

	/**
	 * Creates the hash plugin.
	 * @class The Hash Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Hash = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Hash index for the items.
		 * @protected
		 * @type {Object}
		 */
		this._hashes = {};

		/**
		 * The carousel element.
		 * @type {jQuery}
		 */
		this.$element = this._core.$element;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy((function(e) {
				if (e.namespace && this._core.settings.startPosition === 'URLHash') {
					$(window).trigger('hashchange.owl.navigation');
				}
			}), this),
			'prepared.owl.carousel': $.proxy((function(e) {
				if (e.namespace) {
					var hash = $(e.content).find('[data-hash]').addBack('[data-hash]').attr('data-hash');

					if (!hash) {
						return;
					}

					this._hashes[hash] = e.content;
				}
			}), this),
			'changed.owl.carousel': $.proxy((function(e) {
				if (e.namespace && e.property.name === 'position') {
					var current = this._core.items(this._core.relative(this._core.current())),
						hash = $.map(this._hashes, (function(item, hash) {
							return item === current ? hash : null;
						})).join();

					if (!hash || window.location.hash.slice(1) === hash) {
						return;
					}

					window.location.hash = hash;
				}
			}), this)
		};

		// set default options
		this._core.options = $.extend({}, Hash.Defaults, this._core.options);

		// register the event handlers
		this.$element.on(this._handlers);

		// register event listener for hash navigation
		$(window).on('hashchange.owl.navigation', $.proxy((function(e) {
			var hash = window.location.hash.substring(1),
				items = this._core.$stage.children(),
				position = this._hashes[hash] && items.index(this._hashes[hash]);

			if (position === undefined || position === this._core.current()) {
				return;
			}

			this._core.to(this._core.relative(position), false, true);
		}), this));
	};

	/**
	 * Default options.
	 * @public
	 */
	Hash.Defaults = {
		URLhashListener: false
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Hash.prototype.destroy = function() {
		var handler, property;

		$(window).off('hashchange.owl.navigation');

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Hash = Hash;

})(window.Zepto || window.jQuery, window, document);

/**
 * Support Plugin
 *
 * @version 2.3.4
 * @author Vivid Planet Software GmbH
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	var style = $('<support>').get(0).style,
		prefixes = 'Webkit Moz O ms'.split(' '),
		events = {
			transition: {
				end: {
					WebkitTransition: 'webkitTransitionEnd',
					MozTransition: 'transitionend',
					OTransition: 'oTransitionEnd',
					transition: 'transitionend'
				}
			},
			animation: {
				end: {
					WebkitAnimation: 'webkitAnimationEnd',
					MozAnimation: 'animationend',
					OAnimation: 'oAnimationEnd',
					animation: 'animationend'
				}
			}
		},
		tests = {
			csstransforms: function() {
				return !!test('transform');
			},
			csstransforms3d: function() {
				return !!test('perspective');
			},
			csstransitions: function() {
				return !!test('transition');
			},
			cssanimations: function() {
				return !!test('animation');
			}
		};

	function test(property, prefixed) {
		var result = false,
			upper = property.charAt(0).toUpperCase() + property.slice(1);

		$.each((property + ' ' + prefixes.join(upper + ' ') + upper).split(' '), (function(i, property) {
			if (style[property] !== undefined) {
				result = prefixed ? property : true;
				return false;
			}
		}));

		return result;
	}

	function prefixed(property) {
		return test(property, true);
	}

	if (tests.csstransitions()) {
		/* jshint -W053 */
		$.support.transition = new String(prefixed('transition'))
		$.support.transition.end = events.transition.end[ $.support.transition ];
	}

	if (tests.cssanimations()) {
		/* jshint -W053 */
		$.support.animation = new String(prefixed('animation'))
		$.support.animation.end = events.animation.end[ $.support.animation ];
	}

	if (tests.csstransforms()) {
		/* jshint -W053 */
		$.support.transform = new String(prefixed('transform'));
		$.support.transform3d = tests.csstransforms3d();
	}

})(window.Zepto || window.jQuery, window, document);

/*! Select2 4.1.0-beta.1 | https://github.com/select2/select2/blob/master/LICENSE.md */
!(function(n){"function"==typeof define&&define.amd?define(["jquery"],n):"object"==typeof module&&module.exports?module.exports=function(e,t){return void 0===t&&(t="undefined"!=typeof window?require("jquery"):require("jquery")(e)),n(t),t}:n(jQuery)})((function(d){var e=(function(){if(d&&d.fn&&d.fn.select2&&d.fn.select2.amd)var e=d.fn.select2.amd;var t,n,i,h,s,r,f,g,m,v,y,_,o,a,w,l;function b(e,t){return o.call(e,t)}function c(e,t){var n,i,o,s,r,a,l,c,u,d,p,h=t&&t.split("/"),f=y.map,g=f&&f["*"]||{};if(e){for(r=(e=e.split("/")).length-1,y.nodeIdCompat&&w.test(e[r])&&(e[r]=e[r].replace(w,"")),"."===e[0].charAt(0)&&h&&(e=h.slice(0,h.length-1).concat(e)),u=0;u<e.length;u++)if("."===(p=e[u]))e.splice(u,1),u-=1;else if(".."===p){if(0===u||1===u&&".."===e[2]||".."===e[u-1])continue;0<u&&(e.splice(u-1,2),u-=2)}e=e.join("/")}if((h||g)&&f){for(u=(n=e.split("/")).length;0<u;u-=1){if(i=n.slice(0,u).join("/"),h)for(d=h.length;0<d;d-=1)if(o=(o=f[h.slice(0,d).join("/")])&&o[i]){s=o,a=u;break}if(s)break;!l&&g&&g[i]&&(l=g[i],c=u)}!s&&l&&(s=l,a=c),s&&(n.splice(0,a,s),e=n.join("/"))}return e}function x(t,n){return function(){var e=a.call(arguments,0);return"string"!=typeof e[0]&&1===e.length&&e.push(null),r.apply(h,e.concat([t,n]))}}function A(t){return function(e){m[t]=e}}function D(e){if(b(v,e)){var t=v[e];delete v[e],_[e]=!0,s.apply(h,t)}if(!b(m,e)&&!b(_,e))throw new Error("No "+e);return m[e]}function u(e){var t,n=e?e.indexOf("!"):-1;return-1<n&&(t=e.substring(0,n),e=e.substring(n+1,e.length)),[t,e]}function S(e){return e?u(e):[]}return e&&e.requirejs||(e?n=e:e={},m={},v={},y={},_={},o=Object.prototype.hasOwnProperty,a=[].slice,w=/\.js$/,f=function(e,t){var n,i=u(e),o=i[0],s=t[1];return e=i[1],o&&(n=D(o=c(o,s))),o?e=n&&n.normalize?n.normalize(e,(function(t){return function(e){return c(e,t)}})(s)):c(e,s):(o=(i=u(e=c(e,s)))[0],e=i[1],o&&(n=D(o))),{f:o?o+"!"+e:e,n:e,pr:o,p:n}},g={require:function(e){return x(e)},exports:function(e){var t=m[e];return void 0!==t?t:m[e]={}},module:function(e){return{id:e,uri:"",exports:m[e],config:(function(e){return function(){return y&&y.config&&y.config[e]||{}}})(e)}}},s=function(e,t,n,i){var o,s,r,a,l,c,u,d=[],p=typeof n;if(c=S(i=i||e),"undefined"==p||"function"==p){for(t=!t.length&&n.length?["require","exports","module"]:t,l=0;l<t.length;l+=1)if("require"===(s=(a=f(t[l],c)).f))d[l]=g.require(e);else if("exports"===s)d[l]=g.exports(e),u=!0;else if("module"===s)o=d[l]=g.module(e);else if(b(m,s)||b(v,s)||b(_,s))d[l]=D(s);else{if(!a.p)throw new Error(e+" missing "+s);a.p.load(a.n,x(i,!0),A(s),{}),d[l]=m[s]}r=n?n.apply(m[e],d):void 0,e&&(o&&o.exports!==h&&o.exports!==m[e]?m[e]=o.exports:r===h&&u||(m[e]=r))}else e&&(m[e]=n)},t=n=r=function(e,t,n,i,o){if("string"==typeof e)return g[e]?g[e](t):D(f(e,S(t)).f);if(!e.splice){if((y=e).deps&&r(y.deps,y.callback),!t)return;t.splice?(e=t,t=n,n=null):e=h}return t=t||function(){},"function"==typeof n&&(n=i,i=o),i?s(h,e,t,n):setTimeout((function(){s(h,e,t,n)}),4),r},r.config=function(e){return r(e)},t._defined=m,(i=function(e,t,n){if("string"!=typeof e)throw new Error("See almond README: incorrect module build, no module name");t.splice||(n=t,t=[]),b(m,e)||b(v,e)||(v[e]=[e,t,n])}).amd={jQuery:!0},e.requirejs=t,e.require=n,e.define=i),e.define("almond",(function(){})),e.define("jquery",[],(function(){var e=d||$;return null==e&&console&&console.error&&console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."),e})),e.define("select2/utils",["jquery"],(function(s){var o={};function u(e){var t=e.prototype,n=[];for(var i in t){"function"==typeof t[i]&&"constructor"!==i&&n.push(i)}return n}o.Extend=function(e,t){var n={}.hasOwnProperty;function i(){this.constructor=e}for(var o in t)n.call(t,o)&&(e[o]=t[o]);return i.prototype=t.prototype,e.prototype=new i,e.__super__=t.prototype,e},o.Decorate=function(i,o){var e=u(o),t=u(i);function s(){var e=Array.prototype.unshift,t=o.prototype.constructor.length,n=i.prototype.constructor;0<t&&(e.call(arguments,i.prototype.constructor),n=o.prototype.constructor),n.apply(this,arguments)}o.displayName=i.displayName,s.prototype=new function(){this.constructor=s};for(var n=0;n<t.length;n++){var r=t[n];s.prototype[r]=i.prototype[r]}function a(e){var t=function(){};e in s.prototype&&(t=s.prototype[e]);var n=o.prototype[e];return function(){return Array.prototype.unshift.call(arguments,t),n.apply(this,arguments)}}for(var l=0;l<e.length;l++){var c=e[l];s.prototype[c]=a(c)}return s};function e(){this.listeners={}}e.prototype.on=function(e,t){this.listeners=this.listeners||{},e in this.listeners?this.listeners[e].push(t):this.listeners[e]=[t]},e.prototype.trigger=function(e){var t=Array.prototype.slice,n=t.call(arguments,1);this.listeners=this.listeners||{},null==n&&(n=[]),0===n.length&&n.push({}),(n[0]._type=e)in this.listeners&&this.invoke(this.listeners[e],t.call(arguments,1)),"*"in this.listeners&&this.invoke(this.listeners["*"],arguments)},e.prototype.invoke=function(e,t){for(var n=0,i=e.length;n<i;n++)e[n].apply(this,t)},o.Observable=e,o.generateChars=function(e){for(var t="",n=0;n<e;n++){t+=Math.floor(36*Math.random()).toString(36)}return t},o.bind=function(e,t){return function(){e.apply(t,arguments)}},o._convertData=function(e){for(var t in e){var n=t.split("-"),i=e;if(1!==n.length){for(var o=0;o<n.length;o++){var s=n[o];(s=s.substring(0,1).toLowerCase()+s.substring(1))in i||(i[s]={}),o==n.length-1&&(i[s]=e[t]),i=i[s]}delete e[t]}}return e},o.hasScroll=function(e,t){var n=s(t),i=t.style.overflowX,o=t.style.overflowY;return(i!==o||"hidden"!==o&&"visible"!==o)&&("scroll"===i||"scroll"===o||(n.innerHeight()<t.scrollHeight||n.innerWidth()<t.scrollWidth))},o.escapeMarkup=function(e){var t={"\\":"&#92;","&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","/":"&#47;"};return"string"!=typeof e?e:String(e).replace(/[&<>"'\/\\]/g,(function(e){return t[e]}))},o.__cache={};var n=0;return o.GetUniqueElementId=function(e){var t=e.getAttribute("data-select2-id");return null!=t||(t=e.id?"select2-data-"+e.id:"select2-data-"+(++n).toString()+"-"+o.generateChars(4),e.setAttribute("data-select2-id",t)),t},o.StoreData=function(e,t,n){var i=o.GetUniqueElementId(e);o.__cache[i]||(o.__cache[i]={}),o.__cache[i][t]=n},o.GetData=function(e,t){var n=o.GetUniqueElementId(e);return t?o.__cache[n]&&null!=o.__cache[n][t]?o.__cache[n][t]:s(e).data(t):o.__cache[n]},o.RemoveData=function(e){var t=o.GetUniqueElementId(e);null!=o.__cache[t]&&delete o.__cache[t],e.removeAttribute("data-select2-id")},o.copyNonInternalCssClasses=function(e,t){var n=e.getAttribute("class").trim().split(/\s+/);n=n.filter((function(e){return 0===e.indexOf("select2-")}));var i=t.getAttribute("class").trim().split(/\s+/);i=i.filter((function(e){return 0!==e.indexOf("select2-")}));var o=n.concat(i);e.setAttribute("class",o.join(" "))},o})),e.define("select2/results",["jquery","./utils"],(function(h,f){function i(e,t,n){this.$element=e,this.data=n,this.options=t,i.__super__.constructor.call(this)}return f.Extend(i,f.Observable),i.prototype.render=function(){var e=h('<ul class="select2-results__options" role="listbox"></ul>');return this.options.get("multiple")&&e.attr("aria-multiselectable","true"),this.$results=e},i.prototype.clear=function(){this.$results.empty()},i.prototype.displayMessage=function(e){var t=this.options.get("escapeMarkup");this.clear(),this.hideLoading();var n=h('<li role="alert" aria-live="assertive" class="select2-results__option"></li>'),i=this.options.get("translations").get(e.message);n.append(t(i(e.args))),n[0].className+=" select2-results__message",this.$results.append(n)},i.prototype.hideMessages=function(){this.$results.find(".select2-results__message").remove()},i.prototype.append=function(e){this.hideLoading();var t=[];if(null!=e.results&&0!==e.results.length){e.results=this.sort(e.results);for(var n=0;n<e.results.length;n++){var i=e.results[n],o=this.option(i);t.push(o)}this.$results.append(t)}else 0===this.$results.children().length&&this.trigger("results:message",{message:"noResults"})},i.prototype.position=function(e,t){t.find(".select2-results").append(e)},i.prototype.sort=function(e){return this.options.get("sorter")(e)},i.prototype.highlightFirstItem=function(){var e=this.$results.find(".select2-results__option--selectable"),t=e.filter(".select2-results__option--selected");0<t.length?t.first().trigger("mouseenter"):e.first().trigger("mouseenter"),this.ensureHighlightVisible()},i.prototype.setClasses=function(){var t=this;this.data.current((function(e){var i=e.map((function(e){return e.id.toString()}));t.$results.find(".select2-results__option--selectable").each((function(){var e=h(this),t=f.GetData(this,"data"),n=""+t.id;null!=t.element&&t.element.selected||null==t.element&&-1<i.indexOf(n)?(this.classList.add("select2-results__option--selected"),e.attr("aria-selected","true")):(this.classList.remove("select2-results__option--selected"),e.attr("aria-selected","false"))}))}))},i.prototype.showLoading=function(e){this.hideLoading();var t={disabled:!0,loading:!0,text:this.options.get("translations").get("searching")(e)},n=this.option(t);n.className+=" loading-results",this.$results.prepend(n)},i.prototype.hideLoading=function(){this.$results.find(".loading-results").remove()},i.prototype.option=function(e){var t=document.createElement("li");t.classList.add("select2-results__option"),t.classList.add("select2-results__option--selectable");var n={role:"option"},i=window.Element.prototype.matches||window.Element.prototype.msMatchesSelector||window.Element.prototype.webkitMatchesSelector;for(var o in(null!=e.element&&i.call(e.element,":disabled")||null==e.element&&e.disabled)&&(n["aria-disabled"]="true",t.classList.remove("select2-results__option--selectable"),t.classList.add("select2-results__option--disabled")),null==e.id&&t.classList.remove("select2-results__option--selectable"),null!=e._resultId&&(t.id=e._resultId),e.title&&(t.title=e.title),e.children&&(n.role="group",n["aria-label"]=e.text,t.classList.remove("select2-results__option--selectable"),t.classList.add("select2-results__option--group")),n){var s=n[o];t.setAttribute(o,s)}if(e.children){var r=h(t),a=document.createElement("strong");a.className="select2-results__group",this.template(e,a);for(var l=[],c=0;c<e.children.length;c++){var u=e.children[c],d=this.option(u);l.push(d)}var p=h("<ul></ul>",{class:"select2-results__options select2-results__options--nested"});p.append(l),r.append(a),r.append(p)}else this.template(e,t);return f.StoreData(t,"data",e),t},i.prototype.bind=function(t,e){var l=this,n=t.id+"-results";this.$results.attr("id",n),t.on("results:all",(function(e){l.clear(),l.append(e.data),t.isOpen()&&(l.setClasses(),l.highlightFirstItem())})),t.on("results:append",(function(e){l.append(e.data),t.isOpen()&&l.setClasses()})),t.on("query",(function(e){l.hideMessages(),l.showLoading(e)})),t.on("select",(function(){t.isOpen()&&(l.setClasses(),l.options.get("scrollAfterSelect")&&l.highlightFirstItem())})),t.on("unselect",(function(){t.isOpen()&&(l.setClasses(),l.options.get("scrollAfterSelect")&&l.highlightFirstItem())})),t.on("open",(function(){l.$results.attr("aria-expanded","true"),l.$results.attr("aria-hidden","false"),l.setClasses(),l.ensureHighlightVisible()})),t.on("close",(function(){l.$results.attr("aria-expanded","false"),l.$results.attr("aria-hidden","true"),l.$results.removeAttr("aria-activedescendant")})),t.on("results:toggle",(function(){var e=l.getHighlightedResults();0!==e.length&&e.trigger("mouseup")})),t.on("results:select",(function(){var e=l.getHighlightedResults();if(0!==e.length){var t=f.GetData(e[0],"data");e.hasClass("select2-results__option--selected")?l.trigger("close",{}):l.trigger("select",{data:t})}})),t.on("results:previous",(function(){var e=l.getHighlightedResults(),t=l.$results.find(".select2-results__option--selectable"),n=t.index(e);if(!(n<=0)){var i=n-1;0===e.length&&(i=0);var o=t.eq(i);o.trigger("mouseenter");var s=l.$results.offset().top,r=o.offset().top,a=l.$results.scrollTop()+(r-s);0===i?l.$results.scrollTop(0):r-s<0&&l.$results.scrollTop(a)}})),t.on("results:next",(function(){var e=l.getHighlightedResults(),t=l.$results.find(".select2-results__option--selectable"),n=t.index(e)+1;if(!(n>=t.length)){var i=t.eq(n);i.trigger("mouseenter");var o=l.$results.offset().top+l.$results.outerHeight(!1),s=i.offset().top+i.outerHeight(!1),r=l.$results.scrollTop()+s-o;0===n?l.$results.scrollTop(0):o<s&&l.$results.scrollTop(r)}})),t.on("results:focus",(function(e){e.element[0].classList.add("select2-results__option--highlighted"),e.element[0].setAttribute("aria-selected","true")})),t.on("results:message",(function(e){l.displayMessage(e)})),h.fn.mousewheel&&this.$results.on("mousewheel",(function(e){var t=l.$results.scrollTop(),n=l.$results.get(0).scrollHeight-t+e.deltaY,i=0<e.deltaY&&t-e.deltaY<=0,o=e.deltaY<0&&n<=l.$results.height();i?(l.$results.scrollTop(0),e.preventDefault(),e.stopPropagation()):o&&(l.$results.scrollTop(l.$results.get(0).scrollHeight-l.$results.height()),e.preventDefault(),e.stopPropagation())})),this.$results.on("mouseup",".select2-results__option--selectable",(function(e){var t=h(this),n=f.GetData(this,"data");t.hasClass("select2-results__option--selected")?l.options.get("multiple")?l.trigger("unselect",{originalEvent:e,data:n}):l.trigger("close",{}):l.trigger("select",{originalEvent:e,data:n})})),this.$results.on("mouseenter",".select2-results__option--selectable",(function(e){var t=f.GetData(this,"data");l.getHighlightedResults().removeClass("select2-results__option--highlighted").attr("aria-selected","false"),l.trigger("results:focus",{data:t,element:h(this)})}))},i.prototype.getHighlightedResults=function(){return this.$results.find(".select2-results__option--highlighted")},i.prototype.destroy=function(){this.$results.remove()},i.prototype.ensureHighlightVisible=function(){var e=this.getHighlightedResults();if(0!==e.length){var t=this.$results.find(".select2-results__option--selectable").index(e),n=this.$results.offset().top,i=e.offset().top,o=this.$results.scrollTop()+(i-n),s=i-n;o-=2*e.outerHeight(!1),t<=2?this.$results.scrollTop(0):(s>this.$results.outerHeight()||s<0)&&this.$results.scrollTop(o)}},i.prototype.template=function(e,t){var n=this.options.get("templateResult"),i=this.options.get("escapeMarkup"),o=n(e,t);null==o?t.style.display="none":"string"==typeof o?t.innerHTML=i(o):h(t).append(o)},i})),e.define("select2/keys",[],(function(){return{BACKSPACE:8,TAB:9,ENTER:13,SHIFT:16,CTRL:17,ALT:18,ESC:27,SPACE:32,PAGE_UP:33,PAGE_DOWN:34,END:35,HOME:36,LEFT:37,UP:38,RIGHT:39,DOWN:40,DELETE:46}})),e.define("select2/selection/base",["jquery","../utils","../keys"],(function(n,i,o){function s(e,t){this.$element=e,this.options=t,s.__super__.constructor.call(this)}return i.Extend(s,i.Observable),s.prototype.render=function(){var e=n('<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>');return this._tabindex=0,null!=i.GetData(this.$element[0],"old-tabindex")?this._tabindex=i.GetData(this.$element[0],"old-tabindex"):null!=this.$element.attr("tabindex")&&(this._tabindex=this.$element.attr("tabindex")),e.attr("title",this.$element.attr("title")),e.attr("tabindex",this._tabindex),e.attr("aria-disabled","false"),this.$selection=e},s.prototype.bind=function(e,t){var n=this,i=e.id+"-results";this.container=e,this.$selection.on("focus",(function(e){n.trigger("focus",e)})),this.$selection.on("blur",(function(e){n._handleBlur(e)})),this.$selection.on("keydown",(function(e){n.trigger("keypress",e),e.which===o.SPACE&&e.preventDefault()})),e.on("results:focus",(function(e){n.$selection.attr("aria-activedescendant",e.data._resultId)})),e.on("selection:update",(function(e){n.update(e.data)})),e.on("open",(function(){n.$selection.attr("aria-expanded","true"),n.$selection.attr("aria-owns",i),n._attachCloseHandler(e)})),e.on("close",(function(){n.$selection.attr("aria-expanded","false"),n.$selection.removeAttr("aria-activedescendant"),n.$selection.removeAttr("aria-owns"),n.$selection.trigger("focus"),n._detachCloseHandler(e)})),e.on("enable",(function(){n.$selection.attr("tabindex",n._tabindex),n.$selection.attr("aria-disabled","false")})),e.on("disable",(function(){n.$selection.attr("tabindex","-1"),n.$selection.attr("aria-disabled","true")}))},s.prototype._handleBlur=function(e){var t=this;window.setTimeout((function(){document.activeElement==t.$selection[0]||n.contains(t.$selection[0],document.activeElement)||t.trigger("blur",e)}),1)},s.prototype._attachCloseHandler=function(e){n(document.body).on("mousedown.select2."+e.id,(function(e){var t=n(e.target).closest(".select2");n(".select2.select2-container--open").each((function(){this!=t[0]&&i.GetData(this,"element").select2("close")}))}))},s.prototype._detachCloseHandler=function(e){n(document.body).off("mousedown.select2."+e.id)},s.prototype.position=function(e,t){t.find(".selection").append(e)},s.prototype.destroy=function(){this._detachCloseHandler(this.container)},s.prototype.update=function(e){throw new Error("The `update` method must be defined in child classes.")},s.prototype.isEnabled=function(){return!this.isDisabled()},s.prototype.isDisabled=function(){return this.options.get("disabled")},s})),e.define("select2/selection/single",["jquery","./base","../utils","../keys"],(function(e,t,n,i){function o(){o.__super__.constructor.apply(this,arguments)}return n.Extend(o,t),o.prototype.render=function(){var e=o.__super__.render.call(this);return e[0].classList.add("select2-selection--single"),e.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'),e},o.prototype.bind=function(t,e){var n=this;o.__super__.bind.apply(this,arguments);var i=t.id+"-container";this.$selection.find(".select2-selection__rendered").attr("id",i).attr("role","textbox").attr("aria-readonly","true"),this.$selection.attr("aria-labelledby",i),this.$selection.on("mousedown",(function(e){1===e.which&&n.trigger("toggle",{originalEvent:e})})),this.$selection.on("focus",(function(e){})),this.$selection.on("blur",(function(e){})),t.on("focus",(function(e){t.isOpen()||n.$selection.trigger("focus")}))},o.prototype.clear=function(){var e=this.$selection.find(".select2-selection__rendered");e.empty(),e.removeAttr("title")},o.prototype.display=function(e,t){var n=this.options.get("templateSelection");return this.options.get("escapeMarkup")(n(e,t))},o.prototype.selectionContainer=function(){return e("<span></span>")},o.prototype.update=function(e){if(0!==e.length){var t=e[0],n=this.$selection.find(".select2-selection__rendered"),i=this.display(t,n);n.empty().append(i);var o=t.title||t.text;o?n.attr("title",o):n.removeAttr("title")}else this.clear()},o})),e.define("select2/selection/multiple",["jquery","./base","../utils"],(function(o,e,d){function s(e,t){s.__super__.constructor.apply(this,arguments)}return d.Extend(s,e),s.prototype.render=function(){var e=s.__super__.render.call(this);return e[0].classList.add("select2-selection--multiple"),e.html('<ul class="select2-selection__rendered"></ul>'),e},s.prototype.bind=function(e,t){var i=this;s.__super__.bind.apply(this,arguments);var n=e.id+"-container";this.$selection.find(".select2-selection__rendered").attr("id",n),this.$selection.on("click",(function(e){i.trigger("toggle",{originalEvent:e})})),this.$selection.on("click",".select2-selection__choice__remove",(function(e){if(!i.isDisabled()){var t=o(this).parent(),n=d.GetData(t[0],"data");i.trigger("unselect",{originalEvent:e,data:n})}})),this.$selection.on("keydown",".select2-selection__choice__remove",(function(e){i.isDisabled()||e.stopPropagation()}))},s.prototype.clear=function(){var e=this.$selection.find(".select2-selection__rendered");e.empty(),e.removeAttr("title")},s.prototype.display=function(e,t){var n=this.options.get("templateSelection");return this.options.get("escapeMarkup")(n(e,t))},s.prototype.selectionContainer=function(){return o('<li class="select2-selection__choice"><button type="button" class="select2-selection__choice__remove" tabindex="-1"><span aria-hidden="true">&times;</span></button><span class="select2-selection__choice__display"></span></li>')},s.prototype.update=function(e){if(this.clear(),0!==e.length){for(var t=[],n=this.$selection.find(".select2-selection__rendered").attr("id")+"-choice-",i=0;i<e.length;i++){var o=e[i],s=this.selectionContainer(),r=this.display(o,s),a=n+d.generateChars(4)+"-";o.id?a+=o.id:a+=d.generateChars(4),s.find(".select2-selection__choice__display").append(r).attr("id",a);var l=o.title||o.text;l&&s.attr("title",l);var c=this.options.get("translations").get("removeItem"),u=s.find(".select2-selection__choice__remove");u.attr("title",c()),u.attr("aria-label",c()),u.attr("aria-describedby",a),d.StoreData(s[0],"data",o),t.push(s)}this.$selection.find(".select2-selection__rendered").append(t)}},s})),e.define("select2/selection/placeholder",[],(function(){function e(e,t,n){this.placeholder=this.normalizePlaceholder(n.get("placeholder")),e.call(this,t,n)}return e.prototype.normalizePlaceholder=function(e,t){return"string"==typeof t&&(t={id:"",text:t}),t},e.prototype.createPlaceholder=function(e,t){var n=this.selectionContainer();return n.html(this.display(t)),n[0].classList.add("select2-selection__placeholder"),n[0].classList.remove("select2-selection__choice"),n},e.prototype.update=function(e,t){var n=1==t.length&&t[0].id!=this.placeholder.id;if(1<t.length||n)return e.call(this,t);this.clear();var i=this.createPlaceholder(this.placeholder);this.$selection.find(".select2-selection__rendered").append(i)},e})),e.define("select2/selection/allowClear",["jquery","../keys","../utils"],(function(s,i,a){function e(){}return e.prototype.bind=function(e,t,n){var i=this;e.call(this,t,n),null==this.placeholder&&this.options.get("debug")&&window.console&&console.error&&console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."),this.$selection.on("mousedown",".select2-selection__clear",(function(e){i._handleClear(e)})),t.on("keypress",(function(e){i._handleKeyboardClear(e,t)}))},e.prototype._handleClear=function(e,t){if(!this.isDisabled()){var n=this.$selection.find(".select2-selection__clear");if(0!==n.length){t.stopPropagation();var i=a.GetData(n[0],"data"),o=this.$element.val();this.$element.val(this.placeholder.id);var s={data:i};if(this.trigger("clear",s),s.prevented)this.$element.val(o);else{for(var r=0;r<i.length;r++)if(s={data:i[r]},this.trigger("unselect",s),s.prevented)return void this.$element.val(o);this.$element.trigger("input").trigger("change"),this.trigger("toggle",{})}}}},e.prototype._handleKeyboardClear=function(e,t,n){n.isOpen()||t.which!=i.DELETE&&t.which!=i.BACKSPACE||this._handleClear(t)},e.prototype.update=function(e,t){if(e.call(this,t),this.$selection.find(".select2-selection__clear").remove(),!(0<this.$selection.find(".select2-selection__placeholder").length||0===t.length)){var n=this.$selection.find(".select2-selection__rendered").attr("id"),i=this.options.get("translations").get("removeAllItems"),o=s('<button type="button" class="select2-selection__clear" tabindex="-1"><span aria-hidden="true">&times;</span></button>');o.attr("title",i()),o.attr("aria-label",i()),o.attr("aria-describedby",n),a.StoreData(o[0],"data",t),this.$selection.prepend(o)}},e})),e.define("select2/selection/search",["jquery","../utils","../keys"],(function(i,l,c){function e(e,t,n){e.call(this,t,n)}return e.prototype.render=function(e){var t=i('<span class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" /></span>');this.$searchContainer=t,this.$search=t.find("input"),this.$search.prop("autocomplete",this.options.get("autocomplete"));var n=e.call(this);return this._transferTabIndex(),n.append(this.$searchContainer),n},e.prototype.bind=function(e,t,n){var i=this,o=t.id+"-results",s=t.id+"-container";e.call(this,t,n),i.$search.attr("aria-describedby",s),t.on("open",(function(){i.$search.attr("aria-controls",o),i.$search.trigger("focus")})),t.on("close",(function(){i.$search.val(""),i.resizeSearch(),i.$search.removeAttr("aria-controls"),i.$search.removeAttr("aria-activedescendant"),i.$search.trigger("focus")})),t.on("enable",(function(){i.$search.prop("disabled",!1),i._transferTabIndex()})),t.on("disable",(function(){i.$search.prop("disabled",!0)})),t.on("focus",(function(e){i.$search.trigger("focus")})),t.on("results:focus",(function(e){e.data._resultId?i.$search.attr("aria-activedescendant",e.data._resultId):i.$search.removeAttr("aria-activedescendant")})),this.$selection.on("focusin",".select2-search--inline",(function(e){i.trigger("focus",e)})),this.$selection.on("focusout",".select2-search--inline",(function(e){i._handleBlur(e)})),this.$selection.on("keydown",".select2-search--inline",(function(e){if(e.stopPropagation(),i.trigger("keypress",e),i._keyUpPrevented=e.isDefaultPrevented(),e.which===c.BACKSPACE&&""===i.$search.val()){var t=i.$selection.find(".select2-selection__choice").last();if(0<t.length){var n=l.GetData(t[0],"data");i.searchRemoveChoice(n),e.preventDefault()}}})),this.$selection.on("click",".select2-search--inline",(function(e){i.$search.val()&&e.stopPropagation()}));var r=document.documentMode,a=r&&r<=11;this.$selection.on("input.searchcheck",".select2-search--inline",(function(e){a?i.$selection.off("input.search input.searchcheck"):i.$selection.off("keyup.search")})),this.$selection.on("keyup.search input.search",".select2-search--inline",(function(e){if(a&&"input"===e.type)i.$selection.off("input.search input.searchcheck");else{var t=e.which;t!=c.SHIFT&&t!=c.CTRL&&t!=c.ALT&&t!=c.TAB&&i.handleSearch(e)}}))},e.prototype._transferTabIndex=function(e){this.$search.attr("tabindex",this.$selection.attr("tabindex")),this.$selection.attr("tabindex","-1")},e.prototype.createPlaceholder=function(e,t){this.$search.attr("placeholder",t.text)},e.prototype.update=function(e,t){var n=this.$search[0]==document.activeElement;this.$search.attr("placeholder",""),e.call(this,t),this.resizeSearch(),n&&this.$search.trigger("focus")},e.prototype.handleSearch=function(){if(this.resizeSearch(),!this._keyUpPrevented){var e=this.$search.val();this.trigger("query",{term:e})}this._keyUpPrevented=!1},e.prototype.searchRemoveChoice=function(e,t){this.trigger("unselect",{data:t}),this.$search.val(t.text),this.handleSearch()},e.prototype.resizeSearch=function(){this.$search.css("width","25px");var e="100%";""===this.$search.attr("placeholder")&&(e=.75*(this.$search.val().length+1)+"em");this.$search.css("width",e)},e})),e.define("select2/selection/selectionCss",["../utils"],(function(i){function e(){}return e.prototype.render=function(e){var t=e.call(this),n=this.options.get("selectionCssClass")||"";return-1!==n.indexOf(":all:")&&(n=n.replace(":all:",""),i.copyNonInternalCssClasses(t[0],this.$element[0])),t.addClass(n),t},e})),e.define("select2/selection/eventRelay",["jquery"],(function(r){function e(){}return e.prototype.bind=function(e,t,n){var i=this,o=["open","opening","close","closing","select","selecting","unselect","unselecting","clear","clearing"],s=["opening","closing","selecting","unselecting","clearing"];e.call(this,t,n),t.on("*",(function(e,t){if(-1!==o.indexOf(e)){t=t||{};var n=r.Event("select2:"+e,{params:t});i.$element.trigger(n),-1!==s.indexOf(e)&&(t.prevented=n.isDefaultPrevented())}}))},e})),e.define("select2/translation",["jquery","require"],(function(t,n){function i(e){this.dict=e||{}}return i.prototype.all=function(){return this.dict},i.prototype.get=function(e){return this.dict[e]},i.prototype.extend=function(e){this.dict=t.extend({},e.all(),this.dict)},i._cache={},i.loadPath=function(e){if(!(e in i._cache)){var t=n(e);i._cache[e]=t}return new i(i._cache[e])},i})),e.define("select2/diacritics",[],(function(){return{"Ⓐ":"A","Ａ":"A","À":"A","Á":"A","Â":"A","Ầ":"A","Ấ":"A","Ẫ":"A","Ẩ":"A","Ã":"A","Ā":"A","Ă":"A","Ằ":"A","Ắ":"A","Ẵ":"A","Ẳ":"A","Ȧ":"A","Ǡ":"A","Ä":"A","Ǟ":"A","Ả":"A","Å":"A","Ǻ":"A","Ǎ":"A","Ȁ":"A","Ȃ":"A","Ạ":"A","Ậ":"A","Ặ":"A","Ḁ":"A","Ą":"A","Ⱥ":"A","Ɐ":"A","Ꜳ":"AA","Æ":"AE","Ǽ":"AE","Ǣ":"AE","Ꜵ":"AO","Ꜷ":"AU","Ꜹ":"AV","Ꜻ":"AV","Ꜽ":"AY","Ⓑ":"B","Ｂ":"B","Ḃ":"B","Ḅ":"B","Ḇ":"B","Ƀ":"B","Ƃ":"B","Ɓ":"B","Ⓒ":"C","Ｃ":"C","Ć":"C","Ĉ":"C","Ċ":"C","Č":"C","Ç":"C","Ḉ":"C","Ƈ":"C","Ȼ":"C","Ꜿ":"C","Ⓓ":"D","Ｄ":"D","Ḋ":"D","Ď":"D","Ḍ":"D","Ḑ":"D","Ḓ":"D","Ḏ":"D","Đ":"D","Ƌ":"D","Ɗ":"D","Ɖ":"D","Ꝺ":"D","Ǳ":"DZ","Ǆ":"DZ","ǲ":"Dz","ǅ":"Dz","Ⓔ":"E","Ｅ":"E","È":"E","É":"E","Ê":"E","Ề":"E","Ế":"E","Ễ":"E","Ể":"E","Ẽ":"E","Ē":"E","Ḕ":"E","Ḗ":"E","Ĕ":"E","Ė":"E","Ë":"E","Ẻ":"E","Ě":"E","Ȅ":"E","Ȇ":"E","Ẹ":"E","Ệ":"E","Ȩ":"E","Ḝ":"E","Ę":"E","Ḙ":"E","Ḛ":"E","Ɛ":"E","Ǝ":"E","Ⓕ":"F","Ｆ":"F","Ḟ":"F","Ƒ":"F","Ꝼ":"F","Ⓖ":"G","Ｇ":"G","Ǵ":"G","Ĝ":"G","Ḡ":"G","Ğ":"G","Ġ":"G","Ǧ":"G","Ģ":"G","Ǥ":"G","Ɠ":"G","Ꞡ":"G","Ᵹ":"G","Ꝿ":"G","Ⓗ":"H","Ｈ":"H","Ĥ":"H","Ḣ":"H","Ḧ":"H","Ȟ":"H","Ḥ":"H","Ḩ":"H","Ḫ":"H","Ħ":"H","Ⱨ":"H","Ⱶ":"H","Ɥ":"H","Ⓘ":"I","Ｉ":"I","Ì":"I","Í":"I","Î":"I","Ĩ":"I","Ī":"I","Ĭ":"I","İ":"I","Ï":"I","Ḯ":"I","Ỉ":"I","Ǐ":"I","Ȉ":"I","Ȋ":"I","Ị":"I","Į":"I","Ḭ":"I","Ɨ":"I","Ⓙ":"J","Ｊ":"J","Ĵ":"J","Ɉ":"J","Ⓚ":"K","Ｋ":"K","Ḱ":"K","Ǩ":"K","Ḳ":"K","Ķ":"K","Ḵ":"K","Ƙ":"K","Ⱪ":"K","Ꝁ":"K","Ꝃ":"K","Ꝅ":"K","Ꞣ":"K","Ⓛ":"L","Ｌ":"L","Ŀ":"L","Ĺ":"L","Ľ":"L","Ḷ":"L","Ḹ":"L","Ļ":"L","Ḽ":"L","Ḻ":"L","Ł":"L","Ƚ":"L","Ɫ":"L","Ⱡ":"L","Ꝉ":"L","Ꝇ":"L","Ꞁ":"L","Ǉ":"LJ","ǈ":"Lj","Ⓜ":"M","Ｍ":"M","Ḿ":"M","Ṁ":"M","Ṃ":"M","Ɱ":"M","Ɯ":"M","Ⓝ":"N","Ｎ":"N","Ǹ":"N","Ń":"N","Ñ":"N","Ṅ":"N","Ň":"N","Ṇ":"N","Ņ":"N","Ṋ":"N","Ṉ":"N","Ƞ":"N","Ɲ":"N","Ꞑ":"N","Ꞥ":"N","Ǌ":"NJ","ǋ":"Nj","Ⓞ":"O","Ｏ":"O","Ò":"O","Ó":"O","Ô":"O","Ồ":"O","Ố":"O","Ỗ":"O","Ổ":"O","Õ":"O","Ṍ":"O","Ȭ":"O","Ṏ":"O","Ō":"O","Ṑ":"O","Ṓ":"O","Ŏ":"O","Ȯ":"O","Ȱ":"O","Ö":"O","Ȫ":"O","Ỏ":"O","Ő":"O","Ǒ":"O","Ȍ":"O","Ȏ":"O","Ơ":"O","Ờ":"O","Ớ":"O","Ỡ":"O","Ở":"O","Ợ":"O","Ọ":"O","Ộ":"O","Ǫ":"O","Ǭ":"O","Ø":"O","Ǿ":"O","Ɔ":"O","Ɵ":"O","Ꝋ":"O","Ꝍ":"O","Œ":"OE","Ƣ":"OI","Ꝏ":"OO","Ȣ":"OU","Ⓟ":"P","Ｐ":"P","Ṕ":"P","Ṗ":"P","Ƥ":"P","Ᵽ":"P","Ꝑ":"P","Ꝓ":"P","Ꝕ":"P","Ⓠ":"Q","Ｑ":"Q","Ꝗ":"Q","Ꝙ":"Q","Ɋ":"Q","Ⓡ":"R","Ｒ":"R","Ŕ":"R","Ṙ":"R","Ř":"R","Ȑ":"R","Ȓ":"R","Ṛ":"R","Ṝ":"R","Ŗ":"R","Ṟ":"R","Ɍ":"R","Ɽ":"R","Ꝛ":"R","Ꞧ":"R","Ꞃ":"R","Ⓢ":"S","Ｓ":"S","ẞ":"S","Ś":"S","Ṥ":"S","Ŝ":"S","Ṡ":"S","Š":"S","Ṧ":"S","Ṣ":"S","Ṩ":"S","Ș":"S","Ş":"S","Ȿ":"S","Ꞩ":"S","Ꞅ":"S","Ⓣ":"T","Ｔ":"T","Ṫ":"T","Ť":"T","Ṭ":"T","Ț":"T","Ţ":"T","Ṱ":"T","Ṯ":"T","Ŧ":"T","Ƭ":"T","Ʈ":"T","Ⱦ":"T","Ꞇ":"T","Ꜩ":"TZ","Ⓤ":"U","Ｕ":"U","Ù":"U","Ú":"U","Û":"U","Ũ":"U","Ṹ":"U","Ū":"U","Ṻ":"U","Ŭ":"U","Ü":"U","Ǜ":"U","Ǘ":"U","Ǖ":"U","Ǚ":"U","Ủ":"U","Ů":"U","Ű":"U","Ǔ":"U","Ȕ":"U","Ȗ":"U","Ư":"U","Ừ":"U","Ứ":"U","Ữ":"U","Ử":"U","Ự":"U","Ụ":"U","Ṳ":"U","Ų":"U","Ṷ":"U","Ṵ":"U","Ʉ":"U","Ⓥ":"V","Ｖ":"V","Ṽ":"V","Ṿ":"V","Ʋ":"V","Ꝟ":"V","Ʌ":"V","Ꝡ":"VY","Ⓦ":"W","Ｗ":"W","Ẁ":"W","Ẃ":"W","Ŵ":"W","Ẇ":"W","Ẅ":"W","Ẉ":"W","Ⱳ":"W","Ⓧ":"X","Ｘ":"X","Ẋ":"X","Ẍ":"X","Ⓨ":"Y","Ｙ":"Y","Ỳ":"Y","Ý":"Y","Ŷ":"Y","Ỹ":"Y","Ȳ":"Y","Ẏ":"Y","Ÿ":"Y","Ỷ":"Y","Ỵ":"Y","Ƴ":"Y","Ɏ":"Y","Ỿ":"Y","Ⓩ":"Z","Ｚ":"Z","Ź":"Z","Ẑ":"Z","Ż":"Z","Ž":"Z","Ẓ":"Z","Ẕ":"Z","Ƶ":"Z","Ȥ":"Z","Ɀ":"Z","Ⱬ":"Z","Ꝣ":"Z","ⓐ":"a","ａ":"a","ẚ":"a","à":"a","á":"a","â":"a","ầ":"a","ấ":"a","ẫ":"a","ẩ":"a","ã":"a","ā":"a","ă":"a","ằ":"a","ắ":"a","ẵ":"a","ẳ":"a","ȧ":"a","ǡ":"a","ä":"a","ǟ":"a","ả":"a","å":"a","ǻ":"a","ǎ":"a","ȁ":"a","ȃ":"a","ạ":"a","ậ":"a","ặ":"a","ḁ":"a","ą":"a","ⱥ":"a","ɐ":"a","ꜳ":"aa","æ":"ae","ǽ":"ae","ǣ":"ae","ꜵ":"ao","ꜷ":"au","ꜹ":"av","ꜻ":"av","ꜽ":"ay","ⓑ":"b","ｂ":"b","ḃ":"b","ḅ":"b","ḇ":"b","ƀ":"b","ƃ":"b","ɓ":"b","ⓒ":"c","ｃ":"c","ć":"c","ĉ":"c","ċ":"c","č":"c","ç":"c","ḉ":"c","ƈ":"c","ȼ":"c","ꜿ":"c","ↄ":"c","ⓓ":"d","ｄ":"d","ḋ":"d","ď":"d","ḍ":"d","ḑ":"d","ḓ":"d","ḏ":"d","đ":"d","ƌ":"d","ɖ":"d","ɗ":"d","ꝺ":"d","ǳ":"dz","ǆ":"dz","ⓔ":"e","ｅ":"e","è":"e","é":"e","ê":"e","ề":"e","ế":"e","ễ":"e","ể":"e","ẽ":"e","ē":"e","ḕ":"e","ḗ":"e","ĕ":"e","ė":"e","ë":"e","ẻ":"e","ě":"e","ȅ":"e","ȇ":"e","ẹ":"e","ệ":"e","ȩ":"e","ḝ":"e","ę":"e","ḙ":"e","ḛ":"e","ɇ":"e","ɛ":"e","ǝ":"e","ⓕ":"f","ｆ":"f","ḟ":"f","ƒ":"f","ꝼ":"f","ⓖ":"g","ｇ":"g","ǵ":"g","ĝ":"g","ḡ":"g","ğ":"g","ġ":"g","ǧ":"g","ģ":"g","ǥ":"g","ɠ":"g","ꞡ":"g","ᵹ":"g","ꝿ":"g","ⓗ":"h","ｈ":"h","ĥ":"h","ḣ":"h","ḧ":"h","ȟ":"h","ḥ":"h","ḩ":"h","ḫ":"h","ẖ":"h","ħ":"h","ⱨ":"h","ⱶ":"h","ɥ":"h","ƕ":"hv","ⓘ":"i","ｉ":"i","ì":"i","í":"i","î":"i","ĩ":"i","ī":"i","ĭ":"i","ï":"i","ḯ":"i","ỉ":"i","ǐ":"i","ȉ":"i","ȋ":"i","ị":"i","į":"i","ḭ":"i","ɨ":"i","ı":"i","ⓙ":"j","ｊ":"j","ĵ":"j","ǰ":"j","ɉ":"j","ⓚ":"k","ｋ":"k","ḱ":"k","ǩ":"k","ḳ":"k","ķ":"k","ḵ":"k","ƙ":"k","ⱪ":"k","ꝁ":"k","ꝃ":"k","ꝅ":"k","ꞣ":"k","ⓛ":"l","ｌ":"l","ŀ":"l","ĺ":"l","ľ":"l","ḷ":"l","ḹ":"l","ļ":"l","ḽ":"l","ḻ":"l","ſ":"l","ł":"l","ƚ":"l","ɫ":"l","ⱡ":"l","ꝉ":"l","ꞁ":"l","ꝇ":"l","ǉ":"lj","ⓜ":"m","ｍ":"m","ḿ":"m","ṁ":"m","ṃ":"m","ɱ":"m","ɯ":"m","ⓝ":"n","ｎ":"n","ǹ":"n","ń":"n","ñ":"n","ṅ":"n","ň":"n","ṇ":"n","ņ":"n","ṋ":"n","ṉ":"n","ƞ":"n","ɲ":"n","ŉ":"n","ꞑ":"n","ꞥ":"n","ǌ":"nj","ⓞ":"o","ｏ":"o","ò":"o","ó":"o","ô":"o","ồ":"o","ố":"o","ỗ":"o","ổ":"o","õ":"o","ṍ":"o","ȭ":"o","ṏ":"o","ō":"o","ṑ":"o","ṓ":"o","ŏ":"o","ȯ":"o","ȱ":"o","ö":"o","ȫ":"o","ỏ":"o","ő":"o","ǒ":"o","ȍ":"o","ȏ":"o","ơ":"o","ờ":"o","ớ":"o","ỡ":"o","ở":"o","ợ":"o","ọ":"o","ộ":"o","ǫ":"o","ǭ":"o","ø":"o","ǿ":"o","ɔ":"o","ꝋ":"o","ꝍ":"o","ɵ":"o","œ":"oe","ƣ":"oi","ȣ":"ou","ꝏ":"oo","ⓟ":"p","ｐ":"p","ṕ":"p","ṗ":"p","ƥ":"p","ᵽ":"p","ꝑ":"p","ꝓ":"p","ꝕ":"p","ⓠ":"q","ｑ":"q","ɋ":"q","ꝗ":"q","ꝙ":"q","ⓡ":"r","ｒ":"r","ŕ":"r","ṙ":"r","ř":"r","ȑ":"r","ȓ":"r","ṛ":"r","ṝ":"r","ŗ":"r","ṟ":"r","ɍ":"r","ɽ":"r","ꝛ":"r","ꞧ":"r","ꞃ":"r","ⓢ":"s","ｓ":"s","ß":"s","ś":"s","ṥ":"s","ŝ":"s","ṡ":"s","š":"s","ṧ":"s","ṣ":"s","ṩ":"s","ș":"s","ş":"s","ȿ":"s","ꞩ":"s","ꞅ":"s","ẛ":"s","ⓣ":"t","ｔ":"t","ṫ":"t","ẗ":"t","ť":"t","ṭ":"t","ț":"t","ţ":"t","ṱ":"t","ṯ":"t","ŧ":"t","ƭ":"t","ʈ":"t","ⱦ":"t","ꞇ":"t","ꜩ":"tz","ⓤ":"u","ｕ":"u","ù":"u","ú":"u","û":"u","ũ":"u","ṹ":"u","ū":"u","ṻ":"u","ŭ":"u","ü":"u","ǜ":"u","ǘ":"u","ǖ":"u","ǚ":"u","ủ":"u","ů":"u","ű":"u","ǔ":"u","ȕ":"u","ȗ":"u","ư":"u","ừ":"u","ứ":"u","ữ":"u","ử":"u","ự":"u","ụ":"u","ṳ":"u","ų":"u","ṷ":"u","ṵ":"u","ʉ":"u","ⓥ":"v","ｖ":"v","ṽ":"v","ṿ":"v","ʋ":"v","ꝟ":"v","ʌ":"v","ꝡ":"vy","ⓦ":"w","ｗ":"w","ẁ":"w","ẃ":"w","ŵ":"w","ẇ":"w","ẅ":"w","ẘ":"w","ẉ":"w","ⱳ":"w","ⓧ":"x","ｘ":"x","ẋ":"x","ẍ":"x","ⓨ":"y","ｙ":"y","ỳ":"y","ý":"y","ŷ":"y","ỹ":"y","ȳ":"y","ẏ":"y","ÿ":"y","ỷ":"y","ẙ":"y","ỵ":"y","ƴ":"y","ɏ":"y","ỿ":"y","ⓩ":"z","ｚ":"z","ź":"z","ẑ":"z","ż":"z","ž":"z","ẓ":"z","ẕ":"z","ƶ":"z","ȥ":"z","ɀ":"z","ⱬ":"z","ꝣ":"z","Ά":"Α","Έ":"Ε","Ή":"Η","Ί":"Ι","Ϊ":"Ι","Ό":"Ο","Ύ":"Υ","Ϋ":"Υ","Ώ":"Ω","ά":"α","έ":"ε","ή":"η","ί":"ι","ϊ":"ι","ΐ":"ι","ό":"ο","ύ":"υ","ϋ":"υ","ΰ":"υ","ώ":"ω","ς":"σ","’":"'"}})),e.define("select2/data/base",["../utils"],(function(i){function n(e,t){n.__super__.constructor.call(this)}return i.Extend(n,i.Observable),n.prototype.current=function(e){throw new Error("The `current` method must be defined in child classes.")},n.prototype.query=function(e,t){throw new Error("The `query` method must be defined in child classes.")},n.prototype.bind=function(e,t){},n.prototype.destroy=function(){},n.prototype.generateResultId=function(e,t){var n=e.id+"-result-";return n+=i.generateChars(4),null!=t.id?n+="-"+t.id.toString():n+="-"+i.generateChars(4),n},n})),e.define("select2/data/select",["./base","../utils","jquery"],(function(e,l,c){function n(e,t){this.$element=e,this.options=t,n.__super__.constructor.call(this)}return l.Extend(n,e),n.prototype.current=function(e){var t=this;e(Array.prototype.map.call(this.$element[0].querySelectorAll(":checked"),(function(e){return t.item(c(e))})))},n.prototype.select=function(o){var s=this;if(o.selected=!0,null!=o.element&&"option"===o.element.tagName.toLowerCase())return o.element.selected=!0,void this.$element.trigger("input").trigger("change");if(this.$element.prop("multiple"))this.current((function(e){var t=[];(o=[o]).push.apply(o,e);for(var n=0;n<o.length;n++){var i=o[n].id;-1===t.indexOf(i)&&t.push(i)}s.$element.val(t),s.$element.trigger("input").trigger("change")}));else{var e=o.id;this.$element.val(e),this.$element.trigger("input").trigger("change")}},n.prototype.unselect=function(o){var s=this;if(this.$element.prop("multiple")){if(o.selected=!1,null!=o.element&&"option"===o.element.tagName.toLowerCase())return o.element.selected=!1,void this.$element.trigger("input").trigger("change");this.current((function(e){for(var t=[],n=0;n<e.length;n++){var i=e[n].id;i!==o.id&&-1===t.indexOf(i)&&t.push(i)}s.$element.val(t),s.$element.trigger("input").trigger("change")}))}},n.prototype.bind=function(e,t){var n=this;(this.container=e).on("select",(function(e){n.select(e.data)})),e.on("unselect",(function(e){n.unselect(e.data)}))},n.prototype.destroy=function(){this.$element.find("*").each((function(){l.RemoveData(this)}))},n.prototype.query=function(i,e){var o=[],s=this;this.$element.children().each((function(){if("option"===this.tagName.toLowerCase()||"optgroup"===this.tagName.toLowerCase()){var e=c(this),t=s.item(e),n=s.matches(i,t);null!==n&&o.push(n)}})),e({results:o})},n.prototype.addOptions=function(e){this.$element.append(e)},n.prototype.option=function(e){var t;e.children?(t=document.createElement("optgroup")).label=e.text:void 0!==(t=document.createElement("option")).textContent?t.textContent=e.text:t.innerText=e.text,void 0!==e.id&&(t.value=e.id),e.disabled&&(t.disabled=!0),e.selected&&(t.selected=!0),e.title&&(t.title=e.title);var n=this._normalizeItem(e);return n.element=t,l.StoreData(t,"data",n),c(t)},n.prototype.item=function(e){var t={};if(null!=(t=l.GetData(e[0],"data")))return t;var n=e[0];if("option"===n.tagName.toLowerCase())t={id:e.val(),text:e.text(),disabled:e.prop("disabled"),selected:e.prop("selected"),title:e.prop("title")};else if("optgroup"===n.tagName.toLowerCase()){t={text:e.prop("label"),children:[],title:e.prop("title")};for(var i=e.children("option"),o=[],s=0;s<i.length;s++){var r=c(i[s]),a=this.item(r);o.push(a)}t.children=o}return(t=this._normalizeItem(t)).element=e[0],l.StoreData(e[0],"data",t),t},n.prototype._normalizeItem=function(e){e!==Object(e)&&(e={id:e,text:e});return null!=(e=c.extend({},{text:""},e)).id&&(e.id=e.id.toString()),null!=e.text&&(e.text=e.text.toString()),null==e._resultId&&e.id&&null!=this.container&&(e._resultId=this.generateResultId(this.container,e)),c.extend({},{selected:!1,disabled:!1},e)},n.prototype.matches=function(e,t){return this.options.get("matcher")(e,t)},n})),e.define("select2/data/array",["./select","../utils","jquery"],(function(e,t,f){function i(e,t){this._dataToConvert=t.get("data")||[],i.__super__.constructor.call(this,e,t)}return t.Extend(i,e),i.prototype.bind=function(e,t){i.__super__.bind.call(this,e,t),this.addOptions(this.convertToOptions(this._dataToConvert))},i.prototype.select=function(n){var e=this.$element.find("option").filter((function(e,t){return t.value==n.id.toString()}));0===e.length&&(e=this.option(n),this.addOptions(e)),i.__super__.select.call(this,n)},i.prototype.convertToOptions=function(e){var t=this,n=this.$element.find("option"),i=n.map((function(){return t.item(f(this)).id})).get(),o=[];function s(e){return function(){return f(this).val()==e.id}}for(var r=0;r<e.length;r++){var a=this._normalizeItem(e[r]);if(0<=i.indexOf(a.id)){var l=n.filter(s(a)),c=this.item(l),u=f.extend(!0,{},a,c),d=this.option(u);l.replaceWith(d)}else{var p=this.option(a);if(a.children){var h=this.convertToOptions(a.children);p.append(h)}o.push(p)}}return o},i})),e.define("select2/data/ajax",["./array","../utils","jquery"],(function(e,t,s){function n(e,t){this.ajaxOptions=this._applyDefaults(t.get("ajax")),null!=this.ajaxOptions.processResults&&(this.processResults=this.ajaxOptions.processResults),n.__super__.constructor.call(this,e,t)}return t.Extend(n,e),n.prototype._applyDefaults=function(e){var t={data:function(e){return s.extend({},e,{q:e.term})},transport:function(e,t,n){var i=s.ajax(e);return i.then(t),i.fail(n),i}};return s.extend({},t,e,!0)},n.prototype.processResults=function(e){return e},n.prototype.query=function(n,i){var o=this;null!=this._request&&(s.isFunction(this._request.abort)&&this._request.abort(),this._request=null);var t=s.extend({type:"GET"},this.ajaxOptions);function e(){var e=t.transport(t,(function(e){var t=o.processResults(e,n);o.options.get("debug")&&window.console&&console.error&&(t&&t.results&&Array.isArray(t.results)||console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")),i(t)}),(function(){"status"in e&&(0===e.status||"0"===e.status)||o.trigger("results:message",{message:"errorLoading"})}));o._request=e}"function"==typeof t.url&&(t.url=t.url.call(this.$element,n)),"function"==typeof t.data&&(t.data=t.data.call(this.$element,n)),this.ajaxOptions.delay&&null!=n.term?(this._queryTimeout&&window.clearTimeout(this._queryTimeout),this._queryTimeout=window.setTimeout(e,this.ajaxOptions.delay)):e()},n})),e.define("select2/data/tags",["jquery"],(function(t){function e(e,t,n){var i=n.get("tags"),o=n.get("createTag");void 0!==o&&(this.createTag=o);var s=n.get("insertTag");if(void 0!==s&&(this.insertTag=s),e.call(this,t,n),Array.isArray(i))for(var r=0;r<i.length;r++){var a=i[r],l=this._normalizeItem(a),c=this.option(l);this.$element.append(c)}}return e.prototype.query=function(e,c,u){var d=this;this._removeOldTags(),null!=c.term&&null==c.page?e.call(this,c,(function e(t,n){for(var i=t.results,o=0;o<i.length;o++){var s=i[o],r=null!=s.children&&!e({results:s.children},!0);if((s.text||"").toUpperCase()===(c.term||"").toUpperCase()||r)return!n&&(t.data=i,void u(t))}if(n)return!0;var a=d.createTag(c);if(null!=a){var l=d.option(a);l.attr("data-select2-tag",!0),d.addOptions([l]),d.insertTag(i,a)}t.results=i,u(t)})):e.call(this,c,u)},e.prototype.createTag=function(e,t){if(null==t.term)return null;var n=t.term.trim();return""===n?null:{id:n,text:n}},e.prototype.insertTag=function(e,t,n){t.unshift(n)},e.prototype._removeOldTags=function(e){this.$element.find("option[data-select2-tag]").each((function(){this.selected||t(this).remove()}))},e})),e.define("select2/data/tokenizer",["jquery"],(function(d){function e(e,t,n){var i=n.get("tokenizer");void 0!==i&&(this.tokenizer=i),e.call(this,t,n)}return e.prototype.bind=function(e,t,n){e.call(this,t,n),this.$search=t.dropdown.$search||t.selection.$search||n.find(".select2-search__field")},e.prototype.query=function(e,t,n){var i=this;t.term=t.term||"";var o=this.tokenizer(t,this.options,(function(e){var t=i._normalizeItem(e);if(!i.$element.find("option").filter((function(){return d(this).val()===t.id})).length){var n=i.option(t);n.attr("data-select2-tag",!0),i._removeOldTags(),i.addOptions([n])}!(function(e){i.trigger("select",{data:e})})(t)}));o.term!==t.term&&(this.$search.length&&(this.$search.val(o.term),this.$search.trigger("focus")),t.term=o.term),e.call(this,t,n)},e.prototype.tokenizer=function(e,t,n,i){for(var o=n.get("tokenSeparators")||[],s=t.term,r=0,a=this.createTag||function(e){return{id:e.term,text:e.term}};r<s.length;){var l=s[r];if(-1!==o.indexOf(l)){var c=s.substr(0,r),u=a(d.extend({},t,{term:c}));null!=u?(i(u),s=s.substr(r+1)||"",r=0):r++}else r++}return{term:s}},e})),e.define("select2/data/minimumInputLength",[],(function(){function e(e,t,n){this.minimumInputLength=n.get("minimumInputLength"),e.call(this,t,n)}return e.prototype.query=function(e,t,n){t.term=t.term||"",t.term.length<this.minimumInputLength?this.trigger("results:message",{message:"inputTooShort",args:{minimum:this.minimumInputLength,input:t.term,params:t}}):e.call(this,t,n)},e})),e.define("select2/data/maximumInputLength",[],(function(){function e(e,t,n){this.maximumInputLength=n.get("maximumInputLength"),e.call(this,t,n)}return e.prototype.query=function(e,t,n){t.term=t.term||"",0<this.maximumInputLength&&t.term.length>this.maximumInputLength?this.trigger("results:message",{message:"inputTooLong",args:{maximum:this.maximumInputLength,input:t.term,params:t}}):e.call(this,t,n)},e})),e.define("select2/data/maximumSelectionLength",[],(function(){function e(e,t,n){this.maximumSelectionLength=n.get("maximumSelectionLength"),e.call(this,t,n)}return e.prototype.bind=function(e,t,n){var i=this;e.call(this,t,n),t.on("select",(function(){i._checkIfMaximumSelected()}))},e.prototype.query=function(e,t,n){var i=this;this._checkIfMaximumSelected((function(){e.call(i,t,n)}))},e.prototype._checkIfMaximumSelected=function(e,n){var i=this;this.current((function(e){var t=null!=e?e.length:0;0<i.maximumSelectionLength&&t>=i.maximumSelectionLength?i.trigger("results:message",{message:"maximumSelected",args:{maximum:i.maximumSelectionLength}}):n&&n()}))},e})),e.define("select2/dropdown",["jquery","./utils"],(function(t,e){function n(e,t){this.$element=e,this.options=t,n.__super__.constructor.call(this)}return e.Extend(n,e.Observable),n.prototype.render=function(){var e=t('<span class="select2-dropdown"><span class="select2-results"></span></span>');return e.attr("dir",this.options.get("dir")),this.$dropdown=e},n.prototype.bind=function(){},n.prototype.position=function(e,t){},n.prototype.destroy=function(){this.$dropdown.remove()},n})),e.define("select2/dropdown/search",["jquery"],(function(s){function e(){}return e.prototype.render=function(e){var t=e.call(this),n=s('<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" /></span>');return this.$searchContainer=n,this.$search=n.find("input"),this.$search.prop("autocomplete",this.options.get("autocomplete")),t.prepend(n),t},e.prototype.bind=function(e,t,n){var i=this,o=t.id+"-results";e.call(this,t,n),this.$search.on("keydown",(function(e){i.trigger("keypress",e),i._keyUpPrevented=e.isDefaultPrevented()})),this.$search.on("input",(function(e){s(this).off("keyup")})),this.$search.on("keyup input",(function(e){i.handleSearch(e)})),t.on("open",(function(){i.$search.attr("tabindex",0),i.$search.attr("aria-controls",o),i.$search.trigger("focus"),window.setTimeout((function(){i.$search.trigger("focus")}),0)})),t.on("close",(function(){i.$search.attr("tabindex",-1),i.$search.removeAttr("aria-controls"),i.$search.removeAttr("aria-activedescendant"),i.$search.val(""),i.$search.trigger("blur")})),t.on("focus",(function(){t.isOpen()||i.$search.trigger("focus")})),t.on("results:all",(function(e){null!=e.query.term&&""!==e.query.term||(i.showSearch(e)?i.$searchContainer[0].classList.remove("select2-search--hide"):i.$searchContainer[0].classList.add("select2-search--hide"))})),t.on("results:focus",(function(e){e.data._resultId?i.$search.attr("aria-activedescendant",e.data._resultId):i.$search.removeAttr("aria-activedescendant")}))},e.prototype.handleSearch=function(e){if(!this._keyUpPrevented){var t=this.$search.val();this.trigger("query",{term:t})}this._keyUpPrevented=!1},e.prototype.showSearch=function(e,t){return!0},e})),e.define("select2/dropdown/hidePlaceholder",[],(function(){function e(e,t,n,i){this.placeholder=this.normalizePlaceholder(n.get("placeholder")),e.call(this,t,n,i)}return e.prototype.append=function(e,t){t.results=this.removePlaceholder(t.results),e.call(this,t)},e.prototype.normalizePlaceholder=function(e,t){return"string"==typeof t&&(t={id:"",text:t}),t},e.prototype.removePlaceholder=function(e,t){for(var n=t.slice(0),i=t.length-1;0<=i;i--){var o=t[i];this.placeholder.id===o.id&&n.splice(i,1)}return n},e})),e.define("select2/dropdown/infiniteScroll",["jquery"],(function(n){function e(e,t,n,i){this.lastParams={},e.call(this,t,n,i),this.$loadingMore=this.createLoadingMore(),this.loading=!1}return e.prototype.append=function(e,t){this.$loadingMore.remove(),this.loading=!1,e.call(this,t),this.showLoadingMore(t)&&(this.$results.append(this.$loadingMore),this.loadMoreIfNeeded())},e.prototype.bind=function(e,t,n){var i=this;e.call(this,t,n),t.on("query",(function(e){i.lastParams=e,i.loading=!0})),t.on("query:append",(function(e){i.lastParams=e,i.loading=!0})),this.$results.on("scroll",this.loadMoreIfNeeded.bind(this))},e.prototype.loadMoreIfNeeded=function(){var e=n.contains(document.documentElement,this.$loadingMore[0]);if(!this.loading&&e){var t=this.$results.offset().top+this.$results.outerHeight(!1);this.$loadingMore.offset().top+this.$loadingMore.outerHeight(!1)<=t+50&&this.loadMore()}},e.prototype.loadMore=function(){this.loading=!0;var e=n.extend({},{page:1},this.lastParams);e.page++,this.trigger("query:append",e)},e.prototype.showLoadingMore=function(e,t){return t.pagination&&t.pagination.more},e.prototype.createLoadingMore=function(){var e=n('<li class="select2-results__option select2-results__option--load-more"role="option" aria-disabled="true"></li>'),t=this.options.get("translations").get("loadingMore");return e.html(t(this.lastParams)),e},e})),e.define("select2/dropdown/attachBody",["jquery","../utils"],(function(f,a){function e(e,t,n){this.$dropdownParent=f(n.get("dropdownParent")||document.body),e.call(this,t,n)}return e.prototype.bind=function(e,t,n){var i=this;e.call(this,t,n),t.on("open",(function(){i._showDropdown(),i._attachPositioningHandler(t),i._bindContainerResultHandlers(t)})),t.on("close",(function(){i._hideDropdown(),i._detachPositioningHandler(t)})),this.$dropdownContainer.on("mousedown",(function(e){e.stopPropagation()}))},e.prototype.destroy=function(e){e.call(this),this.$dropdownContainer.remove()},e.prototype.position=function(e,t,n){t.attr("class",n.attr("class")),t[0].classList.remove("select2"),t[0].classList.add("select2-container--open"),t.css({position:"absolute",top:-999999}),this.$container=n},e.prototype.render=function(e){var t=f("<span></span>"),n=e.call(this);return t.append(n),this.$dropdownContainer=t},e.prototype._hideDropdown=function(e){this.$dropdownContainer.detach()},e.prototype._bindContainerResultHandlers=function(e,t){if(!this._containerResultsHandlersBound){var n=this;t.on("results:all",(function(){n._positionDropdown(),n._resizeDropdown()})),t.on("results:append",(function(){n._positionDropdown(),n._resizeDropdown()})),t.on("results:message",(function(){n._positionDropdown(),n._resizeDropdown()})),t.on("select",(function(){n._positionDropdown(),n._resizeDropdown()})),t.on("unselect",(function(){n._positionDropdown(),n._resizeDropdown()})),this._containerResultsHandlersBound=!0}},e.prototype._attachPositioningHandler=function(e,t){var n=this,i="scroll.select2."+t.id,o="resize.select2."+t.id,s="orientationchange.select2."+t.id,r=this.$container.parents().filter(a.hasScroll);r.each((function(){a.StoreData(this,"select2-scroll-position",{x:f(this).scrollLeft(),y:f(this).scrollTop()})})),r.on(i,(function(e){var t=a.GetData(this,"select2-scroll-position");f(this).scrollTop(t.y)})),f(window).on(i+" "+o+" "+s,(function(e){n._positionDropdown(),n._resizeDropdown()}))},e.prototype._detachPositioningHandler=function(e,t){var n="scroll.select2."+t.id,i="resize.select2."+t.id,o="orientationchange.select2."+t.id;this.$container.parents().filter(a.hasScroll).off(n),f(window).off(n+" "+i+" "+o)},e.prototype._positionDropdown=function(){var e=f(window),t=this.$dropdown[0].classList.contains("select2-dropdown--above"),n=this.$dropdown[0].classList.contains("select2-dropdown--below"),i=null,o=this.$container.offset();o.bottom=o.top+this.$container.outerHeight(!1);var s={height:this.$container.outerHeight(!1)};s.top=o.top,s.bottom=o.top+s.height;var r=this.$dropdown.outerHeight(!1),a=e.scrollTop(),l=e.scrollTop()+e.height(),c=a<o.top-r,u=l>o.bottom+r,d={left:o.left,top:s.bottom},p=this.$dropdownParent;"static"===p.css("position")&&(p=p.offsetParent());var h={top:0,left:0};(f.contains(document.body,p[0])||p[0].isConnected)&&(h=p.offset()),d.top-=h.top,d.left-=h.left,t||n||(i="below"),u||!c||t?!c&&u&&t&&(i="below"):i="above",("above"==i||t&&"below"!==i)&&(d.top=s.top-h.top-r),null!=i&&(this.$dropdown[0].classList.remove("select2-dropdown--below"),this.$dropdown[0].classList.remove("select2-dropdown--above"),this.$dropdown[0].classList.add("select2-dropdown--"+i),this.$container[0].classList.remove("select2-container--below"),this.$container[0].classList.remove("select2-container--above"),this.$container[0].classList.add("select2-container--"+i)),this.$dropdownContainer.css(d)},e.prototype._resizeDropdown=function(){var e={width:this.$container.outerWidth(!1)+"px"};this.options.get("dropdownAutoWidth")&&(e.minWidth=e.width,e.position="relative",e.width="auto"),this.$dropdown.css(e)},e.prototype._showDropdown=function(e){this.$dropdownContainer.appendTo(this.$dropdownParent),this._positionDropdown(),this._resizeDropdown()},e})),e.define("select2/dropdown/minimumResultsForSearch",[],(function(){function e(e,t,n,i){this.minimumResultsForSearch=n.get("minimumResultsForSearch"),this.minimumResultsForSearch<0&&(this.minimumResultsForSearch=1/0),e.call(this,t,n,i)}return e.prototype.showSearch=function(e,t){return!(function e(t){for(var n=0,i=0;i<t.length;i++){var o=t[i];o.children?n+=e(o.children):n++}return n}(t.data.results)<this.minimumResultsForSearch)&&e.call(this,t)},e})),e.define("select2/dropdown/selectOnClose",["../utils"],(function(s){function e(){}return e.prototype.bind=function(e,t,n){var i=this;e.call(this,t,n),t.on("close",(function(e){i._handleSelectOnClose(e)}))},e.prototype._handleSelectOnClose=function(e,t){if(t&&null!=t.originalSelect2Event){var n=t.originalSelect2Event;if("select"===n._type||"unselect"===n._type)return}var i=this.getHighlightedResults();if(!(i.length<1)){var o=s.GetData(i[0],"data");null!=o.element&&o.element.selected||null==o.element&&o.selected||this.trigger("select",{data:o})}},e})),e.define("select2/dropdown/closeOnSelect",[],(function(){function e(){}return e.prototype.bind=function(e,t,n){var i=this;e.call(this,t,n),t.on("select",(function(e){i._selectTriggered(e)})),t.on("unselect",(function(e){i._selectTriggered(e)}))},e.prototype._selectTriggered=function(e,t){var n=t.originalEvent;n&&(n.ctrlKey||n.metaKey)||this.trigger("close",{originalEvent:n,originalSelect2Event:t})},e})),e.define("select2/dropdown/dropdownCss",["../utils"],(function(i){function e(){}return e.prototype.render=function(e){var t=e.call(this),n=this.options.get("dropdownCssClass")||"";return-1!==n.indexOf(":all:")&&(n=n.replace(":all:",""),i.copyNonInternalCssClasses(t[0],this.$element[0])),t.addClass(n),t},e})),e.define("select2/i18n/en",[],(function(){return{errorLoading:function(){return"The results could not be loaded."},inputTooLong:function(e){var t=e.input.length-e.maximum,n="Please delete "+t+" character";return 1!=t&&(n+="s"),n},inputTooShort:function(e){return"Please enter "+(e.minimum-e.input.length)+" or more characters"},loadingMore:function(){return"Loading more results…"},maximumSelected:function(e){var t="You can only select "+e.maximum+" item";return 1!=e.maximum&&(t+="s"),t},noResults:function(){return"No results found"},searching:function(){return"Searching…"},removeAllItems:function(){return"Remove all items"},removeItem:function(){return"Remove item"}}})),e.define("select2/defaults",["jquery","./results","./selection/single","./selection/multiple","./selection/placeholder","./selection/allowClear","./selection/search","./selection/selectionCss","./selection/eventRelay","./utils","./translation","./diacritics","./data/select","./data/array","./data/ajax","./data/tags","./data/tokenizer","./data/minimumInputLength","./data/maximumInputLength","./data/maximumSelectionLength","./dropdown","./dropdown/search","./dropdown/hidePlaceholder","./dropdown/infiniteScroll","./dropdown/attachBody","./dropdown/minimumResultsForSearch","./dropdown/selectOnClose","./dropdown/closeOnSelect","./dropdown/dropdownCss","./i18n/en"],(function(l,s,r,a,c,u,d,p,h,f,g,t,m,v,y,_,w,b,$,x,A,D,S,O,E,L,C,T,q,e){function n(){this.reset()}return n.prototype.apply=function(e){if(null==(e=l.extend(!0,{},this.defaults,e)).dataAdapter&&(null!=e.ajax?e.dataAdapter=y:null!=e.data?e.dataAdapter=v:e.dataAdapter=m,0<e.minimumInputLength&&(e.dataAdapter=f.Decorate(e.dataAdapter,b)),0<e.maximumInputLength&&(e.dataAdapter=f.Decorate(e.dataAdapter,$)),0<e.maximumSelectionLength&&(e.dataAdapter=f.Decorate(e.dataAdapter,x)),e.tags&&(e.dataAdapter=f.Decorate(e.dataAdapter,_)),null==e.tokenSeparators&&null==e.tokenizer||(e.dataAdapter=f.Decorate(e.dataAdapter,w))),null==e.resultsAdapter&&(e.resultsAdapter=s,null!=e.ajax&&(e.resultsAdapter=f.Decorate(e.resultsAdapter,O)),null!=e.placeholder&&(e.resultsAdapter=f.Decorate(e.resultsAdapter,S)),e.selectOnClose&&(e.resultsAdapter=f.Decorate(e.resultsAdapter,C))),null==e.dropdownAdapter){if(e.multiple)e.dropdownAdapter=A;else{var t=f.Decorate(A,D);e.dropdownAdapter=t}0!==e.minimumResultsForSearch&&(e.dropdownAdapter=f.Decorate(e.dropdownAdapter,L)),e.closeOnSelect&&(e.dropdownAdapter=f.Decorate(e.dropdownAdapter,T)),null!=e.dropdownCssClass&&(e.dropdownAdapter=f.Decorate(e.dropdownAdapter,q)),e.dropdownAdapter=f.Decorate(e.dropdownAdapter,E)}null==e.selectionAdapter&&(e.multiple?e.selectionAdapter=a:e.selectionAdapter=r,null!=e.placeholder&&(e.selectionAdapter=f.Decorate(e.selectionAdapter,c)),e.allowClear&&(e.selectionAdapter=f.Decorate(e.selectionAdapter,u)),e.multiple&&(e.selectionAdapter=f.Decorate(e.selectionAdapter,d)),null!=e.selectionCssClass&&(e.selectionAdapter=f.Decorate(e.selectionAdapter,p)),e.selectionAdapter=f.Decorate(e.selectionAdapter,h)),e.language=this._resolveLanguage(e.language),e.language.push("en");for(var n=[],i=0;i<e.language.length;i++){var o=e.language[i];-1===n.indexOf(o)&&n.push(o)}return e.language=n,e.translations=this._processTranslations(e.language,e.debug),e},n.prototype.reset=function(){function a(e){return e.replace(/[^\u0000-\u007E]/g,(function(e){return t[e]||e}))}this.defaults={amdLanguageBase:"./i18n/",autocomplete:"off",closeOnSelect:!0,debug:!1,dropdownAutoWidth:!1,escapeMarkup:f.escapeMarkup,language:{},matcher:function e(t,n){if(null==t.term||""===t.term.trim())return n;if(n.children&&0<n.children.length){for(var i=l.extend(!0,{},n),o=n.children.length-1;0<=o;o--)null==e(t,n.children[o])&&i.children.splice(o,1);return 0<i.children.length?i:e(t,i)}var s=a(n.text).toUpperCase(),r=a(t.term).toUpperCase();return-1<s.indexOf(r)?n:null},minimumInputLength:0,maximumInputLength:0,maximumSelectionLength:0,minimumResultsForSearch:0,selectOnClose:!1,scrollAfterSelect:!1,sorter:function(e){return e},templateResult:function(e){return e.text},templateSelection:function(e){return e.text},theme:"default",width:"resolve"}},n.prototype.applyFromElement=function(e,t){var n=e.language,i=this.defaults.language,o=t.prop("lang"),s=t.closest("[lang]").prop("lang"),r=Array.prototype.concat.call(this._resolveLanguage(o),this._resolveLanguage(n),this._resolveLanguage(i),this._resolveLanguage(s));return e.language=r,e},n.prototype._resolveLanguage=function(e){if(!e)return[];if(l.isEmptyObject(e))return[];if(l.isPlainObject(e))return[e];var t;t=Array.isArray(e)?e:[e];for(var n=[],i=0;i<t.length;i++)if(n.push(t[i]),"string"==typeof t[i]&&0<t[i].indexOf("-")){var o=t[i].split("-")[0];n.push(o)}return n},n.prototype._processTranslations=function(e,t){for(var n=new g,i=0;i<e.length;i++){var o=new g,s=e[i];if("string"==typeof s)try{o=g.loadPath(s)}catch(e){try{s=this.defaults.amdLanguageBase+s,o=g.loadPath(s)}catch(e){t&&window.console&&console.warn&&console.warn('Select2: The language file for "'+s+'" could not be automatically loaded. A fallback will be used instead.')}}else o=l.isPlainObject(s)?new g(s):s;n.extend(o)}return n},n.prototype.set=function(e,t){var n={};n[l.camelCase(e)]=t;var i=f._convertData(n);l.extend(!0,this.defaults,i)},new n})),e.define("select2/options",["jquery","./defaults","./utils"],(function(d,n,p){function e(e,t){this.options=e,null!=t&&this.fromElement(t),null!=t&&(this.options=n.applyFromElement(this.options,t)),this.options=n.apply(this.options)}return e.prototype.fromElement=function(e){var t=["select2"];null==this.options.multiple&&(this.options.multiple=e.prop("multiple")),null==this.options.disabled&&(this.options.disabled=e.prop("disabled")),null==this.options.autocomplete&&e.prop("autocomplete")&&(this.options.autocomplete=e.prop("autocomplete")),null==this.options.dir&&(e.prop("dir")?this.options.dir=e.prop("dir"):e.closest("[dir]").prop("dir")?this.options.dir=e.closest("[dir]").prop("dir"):this.options.dir="ltr"),e.prop("disabled",this.options.disabled),e.prop("multiple",this.options.multiple),p.GetData(e[0],"select2Tags")&&(this.options.debug&&window.console&&console.warn&&console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'),p.StoreData(e[0],"data",p.GetData(e[0],"select2Tags")),p.StoreData(e[0],"tags",!0)),p.GetData(e[0],"ajaxUrl")&&(this.options.debug&&window.console&&console.warn&&console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."),e.attr("ajax--url",p.GetData(e[0],"ajaxUrl")),p.StoreData(e[0],"ajax-Url",p.GetData(e[0],"ajaxUrl")));var n={};function i(e,t){return t.toUpperCase()}for(var o=0;o<e[0].attributes.length;o++){var s=e[0].attributes[o].name,r="data-";if(s.substr(0,r.length)==r){var a=s.substring(r.length),l=p.GetData(e[0],a);n[a.replace(/-([a-z])/g,i)]=l}}d.fn.jquery&&"1."==d.fn.jquery.substr(0,2)&&e[0].dataset&&(n=d.extend(!0,{},e[0].dataset,n));var c=d.extend(!0,{},p.GetData(e[0]),n);for(var u in c=p._convertData(c))-1<t.indexOf(u)||(d.isPlainObject(this.options[u])?d.extend(this.options[u],c[u]):this.options[u]=c[u]);return this},e.prototype.get=function(e){return this.options[e]},e.prototype.set=function(e,t){this.options[e]=t},e})),e.define("select2/core",["jquery","./options","./utils","./keys"],(function(t,c,u,i){var d=function(e,t){null!=u.GetData(e[0],"select2")&&u.GetData(e[0],"select2").destroy(),this.$element=e,this.id=this._generateId(e),t=t||{},this.options=new c(t,e),d.__super__.constructor.call(this);var n=e.attr("tabindex")||0;u.StoreData(e[0],"old-tabindex",n),e.attr("tabindex","-1");var i=this.options.get("dataAdapter");this.dataAdapter=new i(e,this.options);var o=this.render();this._placeContainer(o);var s=this.options.get("selectionAdapter");this.selection=new s(e,this.options),this.$selection=this.selection.render(),this.selection.position(this.$selection,o);var r=this.options.get("dropdownAdapter");this.dropdown=new r(e,this.options),this.$dropdown=this.dropdown.render(),this.dropdown.position(this.$dropdown,o);var a=this.options.get("resultsAdapter");this.results=new a(e,this.options,this.dataAdapter),this.$results=this.results.render(),this.results.position(this.$results,this.$dropdown);var l=this;this._bindAdapters(),this._registerDomEvents(),this._registerDataEvents(),this._registerSelectionEvents(),this._registerDropdownEvents(),this._registerResultsEvents(),this._registerEvents(),this.dataAdapter.current((function(e){l.trigger("selection:update",{data:e})})),e[0].classList.add("select2-hidden-accessible"),e.attr("aria-hidden","true"),this._syncAttributes(),u.StoreData(e[0],"select2",this),e.data("select2",this)};return u.Extend(d,u.Observable),d.prototype._generateId=function(e){return"select2-"+(null!=e.attr("id")?e.attr("id"):null!=e.attr("name")?e.attr("name")+"-"+u.generateChars(2):u.generateChars(4)).replace(/(:|\.|\[|\]|,)/g,"")},d.prototype._placeContainer=function(e){e.insertAfter(this.$element);var t=this._resolveWidth(this.$element,this.options.get("width"));null!=t&&e.css("width",t)},d.prototype._resolveWidth=function(e,t){var n=/^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;if("resolve"==t){var i=this._resolveWidth(e,"style");return null!=i?i:this._resolveWidth(e,"element")}if("element"==t){var o=e.outerWidth(!1);return o<=0?"auto":o+"px"}if("style"!=t)return"computedstyle"!=t?t:window.getComputedStyle(e[0]).width;var s=e.attr("style");if("string"!=typeof s)return null;for(var r=s.split(";"),a=0,l=r.length;a<l;a+=1){var c=r[a].replace(/\s/g,"").match(n);if(null!==c&&1<=c.length)return c[1]}return null},d.prototype._bindAdapters=function(){this.dataAdapter.bind(this,this.$container),this.selection.bind(this,this.$container),this.dropdown.bind(this,this.$container),this.results.bind(this,this.$container)},d.prototype._registerDomEvents=function(){var t=this;this.$element.on("change.select2",(function(){t.dataAdapter.current((function(e){t.trigger("selection:update",{data:e})}))})),this.$element.on("focus.select2",(function(e){t.trigger("focus",e)})),this._syncA=u.bind(this._syncAttributes,this),this._syncS=u.bind(this._syncSubtree,this),this._observer=new window.MutationObserver(function(e){t._syncA(),t._syncS(e)}),this._observer.observe(this.$element[0],{attributes:!0,childList:!0,subtree:!1})},d.prototype._registerDataEvents=function(){var n=this;this.dataAdapter.on("*",(function(e,t){n.trigger(e,t)}))},d.prototype._registerSelectionEvents=function(){var n=this,i=["toggle","focus"];this.selection.on("toggle",(function(){n.toggleDropdown()})),this.selection.on("focus",(function(e){n.focus(e)})),this.selection.on("*",(function(e,t){-1===i.indexOf(e)&&n.trigger(e,t)}))},d.prototype._registerDropdownEvents=function(){var n=this;this.dropdown.on("*",(function(e,t){n.trigger(e,t)}))},d.prototype._registerResultsEvents=function(){var n=this;this.results.on("*",(function(e,t){n.trigger(e,t)}))},d.prototype._registerEvents=function(){var n=this;this.on("open",(function(){n.$container[0].classList.add("select2-container--open")})),this.on("close",(function(){n.$container[0].classList.remove("select2-container--open")})),this.on("enable",(function(){n.$container[0].classList.remove("select2-container--disabled")})),this.on("disable",(function(){n.$container[0].classList.add("select2-container--disabled")})),this.on("blur",(function(){n.$container[0].classList.remove("select2-container--focus")})),this.on("query",(function(t){n.isOpen()||n.trigger("open",{}),this.dataAdapter.query(t,(function(e){n.trigger("results:all",{data:e,query:t})}))})),this.on("query:append",(function(t){this.dataAdapter.query(t,(function(e){n.trigger("results:append",{data:e,query:t})}))})),this.on("keypress",(function(e){var t=e.which;n.isOpen()?t===i.ESC||t===i.TAB||t===i.UP&&e.altKey?(n.close(e),e.preventDefault()):t===i.ENTER?(n.trigger("results:select",{}),e.preventDefault()):t===i.SPACE&&e.ctrlKey?(n.trigger("results:toggle",{}),e.preventDefault()):t===i.UP?(n.trigger("results:previous",{}),e.preventDefault()):t===i.DOWN&&(n.trigger("results:next",{}),e.preventDefault()):(t===i.ENTER||t===i.SPACE||t===i.DOWN&&e.altKey)&&(n.open(),e.preventDefault())}))},d.prototype._syncAttributes=function(){this.options.set("disabled",this.$element.prop("disabled")),this.isDisabled()?(this.isOpen()&&this.close(),this.trigger("disable",{})):this.trigger("enable",{})},d.prototype._isChangeMutation=function(e){var t=this;if(e.addedNodes&&0<e.addedNodes.length)for(var n=0;n<e.addedNodes.length;n++){if(e.addedNodes[n].selected)return!0}else{if(e.removedNodes&&0<e.removedNodes.length)return!0;if(Array.isArray(e))return e.some((function(e){return t._isChangeMutation(e)}))}return!1},d.prototype._syncSubtree=function(e){var t=this._isChangeMutation(e),n=this;t&&this.dataAdapter.current((function(e){n.trigger("selection:update",{data:e})}))},d.prototype.trigger=function(e,t){var n=d.__super__.trigger,i={open:"opening",close:"closing",select:"selecting",unselect:"unselecting",clear:"clearing"};if(void 0===t&&(t={}),e in i){var o=i[e],s={prevented:!1,name:e,args:t};if(n.call(this,o,s),s.prevented)return void(t.prevented=!0)}n.call(this,e,t)},d.prototype.toggleDropdown=function(){this.isDisabled()||(this.isOpen()?this.close():this.open())},d.prototype.open=function(){this.isOpen()||this.isDisabled()||this.trigger("query",{})},d.prototype.close=function(e){this.isOpen()&&this.trigger("close",{originalEvent:e})},d.prototype.isEnabled=function(){return!this.isDisabled()},d.prototype.isDisabled=function(){return this.options.get("disabled")},d.prototype.isOpen=function(){return this.$container[0].classList.contains("select2-container--open")},d.prototype.hasFocus=function(){return this.$container[0].classList.contains("select2-container--focus")},d.prototype.focus=function(e){this.hasFocus()||(this.$container[0].classList.add("select2-container--focus"),this.trigger("focus",{}))},d.prototype.enable=function(e){this.options.get("debug")&&window.console&&console.warn&&console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'),null!=e&&0!==e.length||(e=[!0]);var t=!e[0];this.$element.prop("disabled",t)},d.prototype.data=function(){this.options.get("debug")&&0<arguments.length&&window.console&&console.warn&&console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');var t=[];return this.dataAdapter.current((function(e){t=e})),t},d.prototype.val=function(e){if(this.options.get("debug")&&window.console&&console.warn&&console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'),null==e||0===e.length)return this.$element.val();var t=e[0];Array.isArray(t)&&(t=t.map((function(e){return e.toString()}))),this.$element.val(t).trigger("input").trigger("change")},d.prototype.destroy=function(){this.$container.remove(),this._observer.disconnect(),this._observer=null,this._syncA=null,this._syncS=null,this.$element.off(".select2"),this.$element.attr("tabindex",u.GetData(this.$element[0],"old-tabindex")),this.$element[0].classList.remove("select2-hidden-accessible"),this.$element.attr("aria-hidden","false"),u.RemoveData(this.$element[0]),this.$element.removeData("select2"),this.dataAdapter.destroy(),this.selection.destroy(),this.dropdown.destroy(),this.results.destroy(),this.dataAdapter=null,this.selection=null,this.dropdown=null,this.results=null},d.prototype.render=function(){var e=t('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');return e.attr("dir",this.options.get("dir")),this.$container=e,this.$container[0].classList.add("select2-container--"+this.options.get("theme")),u.StoreData(e[0],"element",this.$element),e},d})),e.define("select2/dropdown/attachContainer",[],(function(){function e(e,t,n){e.call(this,t,n)}return e.prototype.position=function(e,t,n){n.find(".dropdown-wrapper").append(t),t[0].classList.add("select2-dropdown--below"),n[0].classList.add("select2-container--below")},e})),e.define("select2/dropdown/stopPropagation",[],(function(){function e(){}return e.prototype.bind=function(e,t,n){e.call(this,t,n);this.$dropdown.on(["blur","change","click","dblclick","focus","focusin","focusout","input","keydown","keyup","keypress","mousedown","mouseenter","mouseleave","mousemove","mouseover","mouseup","search","touchend","touchstart"].join(" "),(function(e){e.stopPropagation()}))},e})),e.define("select2/selection/stopPropagation",[],(function(){function e(){}return e.prototype.bind=function(e,t,n){e.call(this,t,n);this.$selection.on(["blur","change","click","dblclick","focus","focusin","focusout","input","keydown","keyup","keypress","mousedown","mouseenter","mouseleave","mousemove","mouseover","mouseup","search","touchend","touchstart"].join(" "),(function(e){e.stopPropagation()}))},e})),l=function(p){var h,f,e=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],t="onwheel"in document||9<=document.documentMode?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],g=Array.prototype.slice;if(p.event.fixHooks)for(var n=e.length;n;)p.event.fixHooks[e[--n]]=p.event.mouseHooks;var m=p.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var e=t.length;e;)this.addEventListener(t[--e],i,!1);else this.onmousewheel=i;p.data(this,"mousewheel-line-height",m.getLineHeight(this)),p.data(this,"mousewheel-page-height",m.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var e=t.length;e;)this.removeEventListener(t[--e],i,!1);else this.onmousewheel=null;p.removeData(this,"mousewheel-line-height"),p.removeData(this,"mousewheel-page-height")},getLineHeight:function(e){var t=p(e),n=t["offsetParent"in p.fn?"offsetParent":"parent"]();return n.length||(n=p("body")),parseInt(n.css("fontSize"),10)||parseInt(t.css("fontSize"),10)||16},getPageHeight:function(e){return p(e).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};function i(e){var t,n=e||window.event,i=g.call(arguments,1),o=0,s=0,r=0,a=0,l=0;if((e=p.event.fix(n)).type="mousewheel","detail"in n&&(r=-1*n.detail),"wheelDelta"in n&&(r=n.wheelDelta),"wheelDeltaY"in n&&(r=n.wheelDeltaY),"wheelDeltaX"in n&&(s=-1*n.wheelDeltaX),"axis"in n&&n.axis===n.HORIZONTAL_AXIS&&(s=-1*r,r=0),o=0===r?s:r,"deltaY"in n&&(o=r=-1*n.deltaY),"deltaX"in n&&(s=n.deltaX,0===r&&(o=-1*s)),0!==r||0!==s){if(1===n.deltaMode){var c=p.data(this,"mousewheel-line-height");o*=c,r*=c,s*=c}else if(2===n.deltaMode){var u=p.data(this,"mousewheel-page-height");o*=u,r*=u,s*=u}if(t=Math.max(Math.abs(r),Math.abs(s)),(!f||t<f)&&y(n,f=t)&&(f/=40),y(n,t)&&(o/=40,s/=40,r/=40),o=Math[1<=o?"floor":"ceil"](o/f),s=Math[1<=s?"floor":"ceil"](s/f),r=Math[1<=r?"floor":"ceil"](r/f),m.settings.normalizeOffset&&this.getBoundingClientRect){var d=this.getBoundingClientRect();a=e.clientX-d.left,l=e.clientY-d.top}return e.deltaX=s,e.deltaY=r,e.deltaFactor=f,e.offsetX=a,e.offsetY=l,e.deltaMode=0,i.unshift(e,o,s,r),h&&clearTimeout(h),h=setTimeout(v,200),(p.event.dispatch||p.event.handle).apply(this,i)}}function v(){f=null}function y(e,t){return m.settings.adjustOldDeltas&&"mousewheel"===e.type&&t%120==0}p.fn.extend({mousewheel:function(e){return e?this.bind("mousewheel",e):this.trigger("mousewheel")},unmousewheel:function(e){return this.unbind("mousewheel",e)}})},"function"==typeof e.define&&e.define.amd?e.define("jquery-mousewheel",["jquery"],l):"object"==typeof exports?module.exports=l:l(d),e.define("jquery.select2",["jquery","jquery-mousewheel","./select2/core","./select2/defaults","./select2/utils"],(function(o,e,s,t,r){if(null==o.fn.select2){var a=["open","close","destroy"];o.fn.select2=function(t){if("object"==typeof(t=t||{}))return this.each((function(){var e=o.extend(!0,{},t);new s(o(this),e)})),this;if("string"!=typeof t)throw new Error("Invalid arguments for Select2: "+t);var n,i=Array.prototype.slice.call(arguments,1);return this.each((function(){var e=r.GetData(this,"select2");null==e&&window.console&&console.error&&console.error("The select2('"+t+"') method was called on an element that is not using Select2."),n=e[t].apply(e,i)})),-1<a.indexOf(t)?this:n}}return null==o.fn.select2.defaults&&(o.fn.select2.defaults=t),s})),{define:e.define,require:e.require}})(),t=e.require("jquery.select2");return d.fn.select2.amd=e,t}));
!(function(t,e){"object"==typeof exports?module.exports=e(window,document):t.SimpleScrollbar=e(window,document)})(this,(function(t,e){function s(t){Object.prototype.hasOwnProperty.call(t,"data-simple-scrollbar")||Object.defineProperty(t,"data-simple-scrollbar",{value:new o(t)})}function i(t,s){function i(t){var e=t.pageY-a;a=t.pageY,n((function(){s.el.scrollTop+=e/s.scrollRatio}))}function r(){t.classList.remove("ss-grabbed"),e.body.classList.remove("ss-grabbed"),e.removeEventListener("mousemove",i),e.removeEventListener("mouseup",r)}var a;t.addEventListener("mousedown",(function(s){return a=s.pageY,t.classList.add("ss-grabbed"),e.body.classList.add("ss-grabbed"),e.addEventListener("mousemove",i),e.addEventListener("mouseup",r),!1}))}function r(t){for(this.target=t,this.direction=window.getComputedStyle(this.target).direction,this.bar='<div class="ss-scroll">',this.wrapper=e.createElement("div"),this.wrapper.setAttribute("class","ss-wrapper"),this.el=e.createElement("div"),this.el.setAttribute("class","ss-content"),"rtl"===this.direction&&this.el.classList.add("rtl"),this.wrapper.appendChild(this.el);this.target.firstChild;)this.el.appendChild(this.target.firstChild);this.target.appendChild(this.wrapper),this.target.insertAdjacentHTML("beforeend",this.bar),this.bar=this.target.lastChild,i(this.bar,this),this.moveBar(),this.el.addEventListener("scroll",this.moveBar.bind(this)),this.el.addEventListener("mouseenter",this.moveBar.bind(this)),this.target.classList.add("ss-container");var s=window.getComputedStyle(t);"0px"===s.height&&"0px"!==s["max-height"]&&(t.style.height=s["max-height"])}function a(){for(var t=e.querySelectorAll("*[ss-container]"),i=0;i<t.length;i++)s(t[i])}var n=t.requestAnimationFrame||t.setImmediate||function(t){return setTimeout(t,0)};r.prototype={moveBar:function(t){var e=this.el.scrollHeight,s=this.el.clientHeight,i=this;this.scrollRatio=s/e;var r="rtl"===i.direction,a=r?i.target.clientWidth-i.bar.clientWidth+18:-1*(i.target.clientWidth-i.bar.clientWidth);n((function(){i.scrollRatio>=1?i.bar.classList.add("ss-hidden"):(i.bar.classList.remove("ss-hidden"),i.bar.style.cssText="height:"+Math.max(100*i.scrollRatio,10)+"%; top:"+i.el.scrollTop/e*100+"%;right:"+a+"px;")}))}},e.addEventListener("DOMContentLoaded",a),r.initEl=s,r.initAll=a;var o=r;return o}));

/*!
 * Validator v0.11.5 for Bootstrap 3, by @1000hz
 * Copyright 2016 Cina Saffary
 * Licensed under http://opensource.org/licenses/MIT
 *
 * https://github.com/1000hz/bootstrap-validator
 */

+(function(a){"use strict";function b(b){return b.is('[type="checkbox"]')?b.prop("checked"):b.is('[type="radio"]')?!!a('[name="'+b.attr("name")+'"]:checked').length:b.val()}function c(b){return this.each((function(){var c=a(this),e=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b),f=c.data("bs.validator");(f||"destroy"!=b)&&(f||c.data("bs.validator",f=new d(this,e)),"string"==typeof b&&f[b]())}))}var d=function(c,e){this.options=e,this.validators=a.extend({},d.VALIDATORS,e.custom),this.$element=a(c),this.$btn=a('button[type="submit"], input[type="submit"]').filter('[form="'+this.$element.attr("id")+'"]').add(this.$element.find('input[type="submit"], button[type="submit"]')),this.update(),this.$element.on("input.bs.validator change.bs.validator focusout.bs.validator",a.proxy(this.onInput,this)),this.$element.on("submit.bs.validator",a.proxy(this.onSubmit,this)),this.$element.on("reset.bs.validator",a.proxy(this.reset,this)),this.$element.find("[data-match]").each((function(){var c=a(this),d=c.data("match");a(d).on("input.bs.validator",(function(){b(c)&&c.trigger("input.bs.validator")}))})),this.$inputs.filter((function(){return b(a(this))})).trigger("focusout"),this.$element.attr("novalidate",!0),this.toggleSubmit()};d.VERSION="0.11.5",d.INPUT_SELECTOR=':input:not([type="hidden"], [type="submit"], [type="reset"], button)',d.FOCUS_OFFSET=20,d.DEFAULTS={delay:500,html:!1,disable:!0,focus:!0,custom:{},errors:{match:"Does not match",minlength:"Not long enough"},feedback:{success:"glyphicon-ok",error:"glyphicon-remove"}},d.VALIDATORS={"native":function(a){var b=a[0];return b.checkValidity?!b.checkValidity()&&!b.validity.valid&&(b.validationMessage||"error!"):void 0},match:function(b){var c=b.data("match");return b.val()!==a(c).val()&&d.DEFAULTS.errors.match},minlength:function(a){var b=a.data("minlength");return a.val().length<b&&d.DEFAULTS.errors.minlength}},d.prototype.update=function(){return this.$inputs=this.$element.find(d.INPUT_SELECTOR).add(this.$element.find('[data-validate="true"]')).not(this.$element.find('[data-validate="false"]')),this},d.prototype.onInput=function(b){var c=this,d=a(b.target),e="focusout"!==b.type;this.$inputs.is(d)&&this.validateInput(d,e).done((function(){c.toggleSubmit()}))},d.prototype.validateInput=function(c,d){var e=(b(c),c.data("bs.validator.errors"));c.is('[type="radio"]')&&(c=this.$element.find('input[name="'+c.attr("name")+'"]'));var f=a.Event("validate.bs.validator",{relatedTarget:c[0]});if(this.$element.trigger(f),!f.isDefaultPrevented()){var g=this;return this.runValidators(c).done((function(b){c.data("bs.validator.errors",b),b.length?d?g.defer(c,g.showErrors):g.showErrors(c):g.clearErrors(c),e&&b.toString()===e.toString()||(f=b.length?a.Event("invalid.bs.validator",{relatedTarget:c[0],detail:b}):a.Event("valid.bs.validator",{relatedTarget:c[0],detail:e}),g.$element.trigger(f)),g.toggleSubmit(),g.$element.trigger(a.Event("validated.bs.validator",{relatedTarget:c[0]}))}))}},d.prototype.runValidators=function(c){function d(a){return c.data(a+"-error")}function e(){var a=c[0].validity;return a.typeMismatch?c.data("type-error"):a.patternMismatch?c.data("pattern-error"):a.stepMismatch?c.data("step-error"):a.rangeOverflow?c.data("max-error"):a.rangeUnderflow?c.data("min-error"):a.valueMissing?c.data("required-error"):null}function f(){return c.data("error")}function g(a){return d(a)||e()||f()}var h=[],i=a.Deferred();return c.data("bs.validator.deferred")&&c.data("bs.validator.deferred").reject(),c.data("bs.validator.deferred",i),a.each(this.validators,a.proxy((function(a,d){var e=null;(b(c)||c.attr("required"))&&(c.data(a)||"native"==a)&&(e=d.call(this,c))&&(e=g(a)||e,!~h.indexOf(e)&&h.push(e))}),this)),!h.length&&b(c)&&c.data("remote")?this.defer(c,(function(){var d={};d[c.attr("name")]=b(c),a.get(c.data("remote"),d).fail((function(a,b,c){h.push(g("remote")||c)})).always((function(){i.resolve(h)}))})):i.resolve(h),i.promise()},d.prototype.validate=function(){var b=this;return a.when(this.$inputs.map((function(){return b.validateInput(a(this),!1)}))).then((function(){b.toggleSubmit(),b.focusError()})),this},d.prototype.focusError=function(){if(this.options.focus){var b=a(".has-error:first :input");0!==b.length&&(a("html, body").animate({scrollTop:b.offset().top-d.FOCUS_OFFSET},250),b.focus())}},d.prototype.showErrors=function(b){var c=this.options.html?"html":"text",d=b.data("bs.validator.errors"),e=b.closest(".form-group"),f=e.find(".help-block.with-errors"),g=e.find(".form-control-feedback");d.length&&(d=a("<ul/>").addClass("list-unstyled").append(a.map(d,(function(b){return a("<li/>")[c](b)}))),void 0===f.data("bs.validator.originalContent")&&f.data("bs.validator.originalContent",f.html()),f.empty().append(d),e.addClass("has-error has-danger"),e.hasClass("has-feedback")&&g.removeClass(this.options.feedback.success)&&g.addClass(this.options.feedback.error)&&e.removeClass("has-success"))},d.prototype.clearErrors=function(a){var c=a.closest(".form-group"),d=c.find(".help-block.with-errors"),e=c.find(".form-control-feedback");d.html(d.data("bs.validator.originalContent")),c.removeClass("has-error has-danger has-success"),c.hasClass("has-feedback")&&e.removeClass(this.options.feedback.error)&&e.removeClass(this.options.feedback.success)&&b(a)&&e.addClass(this.options.feedback.success)&&c.addClass("has-success")},d.prototype.hasErrors=function(){function b(){return!!(a(this).data("bs.validator.errors")||[]).length}return!!this.$inputs.filter(b).length},d.prototype.isIncomplete=function(){function c(){var c=b(a(this));return!("string"==typeof c?a.trim(c):c)}return!!this.$inputs.filter("[required]").filter(c).length},d.prototype.onSubmit=function(a){this.validate(),(this.isIncomplete()||this.hasErrors())&&a.preventDefault()},d.prototype.toggleSubmit=function(){this.options.disable&&this.$btn.toggleClass("disabled",this.isIncomplete()||this.hasErrors())},d.prototype.defer=function(b,c){return c=a.proxy(c,this,b),this.options.delay?(window.clearTimeout(b.data("bs.validator.timeout")),void b.data("bs.validator.timeout",window.setTimeout(c,this.options.delay))):c()},d.prototype.reset=function(){return this.$element.find(".form-control-feedback").removeClass(this.options.feedback.error).removeClass(this.options.feedback.success),this.$inputs.removeData(["bs.validator.errors","bs.validator.deferred"]).each((function(){var b=a(this),c=b.data("bs.validator.timeout");window.clearTimeout(c)&&b.removeData("bs.validator.timeout")})),this.$element.find(".help-block.with-errors").each((function(){var b=a(this),c=b.data("bs.validator.originalContent");b.removeData("bs.validator.originalContent").html(c)})),this.$btn.removeClass("disabled"),this.$element.find(".has-error, .has-danger, .has-success").removeClass("has-error has-danger has-success"),this},d.prototype.destroy=function(){return this.reset(),this.$element.removeAttr("novalidate").removeData("bs.validator").off(".bs.validator"),this.$inputs.off(".bs.validator"),this.options=null,this.validators=null,this.$element=null,this.$btn=null,this};var e=a.fn.validator;a.fn.validator=c,a.fn.validator.Constructor=d,a.fn.validator.noConflict=function(){return a.fn.validator=e,this},a(window).on("load",(function(){a('form[data-toggle="validator"]').each((function(){var b=a(this);c.call(b,b.data())}))}))})(jQuery);