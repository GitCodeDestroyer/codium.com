!function(t){"object"==typeof exports&&"object"==typeof module?t(require("../../lib/codemirror")):"function"==typeof define&&define.amd?define(["../../lib/codemirror"],t):t(CodeMirror)}(function(l){"use strict";function a(t){t.parentNode&&t.parentNode.removeChild(t)}function c(t,e,n){function o(){var t;l.off(n,"mouseout",o),r&&((t=r).parentNode&&(null==t.style.opacity&&a(t),t.style.opacity=0,setTimeout(function(){a(t)},600)),r=null)}var r=function(t,e){function n(t){if(!o.parentNode)return l.off(document,"mousemove",n);o.style.top=Math.max(0,t.clientY-o.offsetHeight-5)+"px",o.style.left=t.clientX+5+"px"}var o=document.createElement("div");return o.className="CodeMirror-lint-tooltip",o.appendChild(e.cloneNode(!0)),document.body.appendChild(o),l.on(document,"mousemove",n),n(t),null!=o.style.opacity&&(o.style.opacity=.9),o}(t,e),i=setInterval(function(){if(r)for(var t=n;;t=t.parentNode){if(t&&11==t.nodeType&&(t=t.host),t==document.body)return;if(!t){o();break}}if(!r)return clearInterval(i)},400);l.on(n,"mouseout",o)}function u(e,t,n){this.marked=[],this.options=t,this.timeout=null,this.hasGutter=n,this.onMouseOver=function(t){!function(t,e){var n=e.target||e.srcElement;if(!/\bCodeMirror-lint-mark-/.test(n.className))return;for(var o=n.getBoundingClientRect(),r=(o.left+o.right)/2,i=(o.top+o.bottom)/2,a=t.findMarksAt(t.coordsChar({left:r,top:i},"client")),s=[],l=0;l<a.length;++l){var u=a[l].__annotation;u&&s.push(u)}s.length&&function(t,e){for(var n=e.target||e.srcElement,o=document.createDocumentFragment(),r=0;r<t.length;r++){var i=t[r];o.appendChild(v(i))}c(e,o,n)}(s,e)}(e,t)},this.waitingFor=0}function p(t){var e=t.state.lint;e.hasGutter&&t.clearGutter(g);for(var n=0;n<e.marked.length;++n)e.marked[n].clear();e.marked.length=0}function h(e,t,n,o){var r=document.createElement("div"),i=r;return r.className="CodeMirror-lint-marker-"+t,n&&((i=r.appendChild(document.createElement("div"))).className="CodeMirror-lint-marker-multiple"),0!=o&&l.on(i,"mouseover",function(t){c(t,e,i)}),r}function v(t){var e=t.severity;e||(e="error");var n=document.createElement("div");return n.className="CodeMirror-lint-message-"+e,void 0!==t.messageHTML?n.innerHTML=t.messageHTML:n.appendChild(document.createTextNode(t.message)),n}function f(e){var t=e.state.lint.options,n=t.options||t,o=t.getAnnotations||e.getHelper(l.Pos(0,0),"lint");if(o)if(t.async||o.async)!function(n,t,e){function o(){i=-1,n.off("change",o)}var r=n.state.lint,i=++r.waitingFor;n.on("change",o),t(n.getValue(),function(t,e){n.off("change",o),r.waitingFor==i&&(e&&t instanceof l&&(t=e),n.operation(function(){s(n,t)}))},e,n)}(e,o,n);else{var r=o(e.getValue(),n,e);if(!r)return;r.then?r.then(function(t){e.operation(function(){s(e,t)})}):e.operation(function(){s(e,r)})}}function s(t,e){p(t);for(var n,o,r=t.state.lint,i=r.options,a=function(t){for(var e=[],n=0;n<t.length;++n){var o=t[n],r=o.from.line;(e[r]||(e[r]=[])).push(o)}return e}(e),s=0;s<a.length;++s){var l=a[s];if(l){for(var u=null,c=r.hasGutter&&document.createDocumentFragment(),f=0;f<l.length;++f){var m=l[f],d=m.severity;d||(d="error"),o=d,u="error"==(n=u)?n:o,i.formatAnnotation&&(m=i.formatAnnotation(m)),r.hasGutter&&c.appendChild(v(m)),m.to&&r.marked.push(t.markText(m.from,m.to,{className:"CodeMirror-lint-mark-"+d,__annotation:m}))}r.hasGutter&&t.setGutterMarker(s,g,h(c,u,1<l.length,r.options.tooltips))}}i.onUpdateLinting&&i.onUpdateLinting(e,a,t)}function m(t){var e=t.state.lint;e&&(clearTimeout(e.timeout),e.timeout=setTimeout(function(){f(t)},e.options.delay||500))}var g="CodeMirror-lint-markers";l.defineOption("lint",!1,function(t,e,n){if(n&&n!=l.Init&&(p(t),!1!==t.state.lint.options.lintOnChange&&t.off("change",m),l.off(t.getWrapperElement(),"mouseover",t.state.lint.onMouseOver),clearTimeout(t.state.lint.timeout),delete t.state.lint),e){for(var o=t.getOption("gutters"),r=!1,i=0;i<o.length;++i)o[i]==g&&(r=!0);var a=t.state.lint=new u(t,(s=e)instanceof Function?{getAnnotations:s}:(s&&!0!==s||(s={}),s),r);!1!==a.options.lintOnChange&&t.on("change",m),0!=a.options.tooltips&&"gutter"!=a.options.tooltips&&l.on(t.getWrapperElement(),"mouseover",a.onMouseOver),f(t)}var s}),l.defineExtension("performLint",function(){this.state.lint&&f(this)})});