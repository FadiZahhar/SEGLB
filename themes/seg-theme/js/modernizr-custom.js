/*! modernizr 3.2.0 (Custom Build) | MIT *
 * http://modernizr.com/download/?-lastchild-mediaqueries-nthchild-opacity-svg-svgasimg-svgfilters !*/
!function(e,t,n){function s(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):c?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}var a={_version:"3.2.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){o.push({name:e,fn:t,options:n})},addAsyncTest:function(e){o.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=a,Modernizr=new Modernizr,Modernizr.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var o=[];Modernizr.addTest("svgfilters",function(){var t=!1;try{t="SVGFEColorMatrixElement"in e&&2==SVGFEColorMatrixElement.SVG_FECOLORMATRIX_TYPE_SATURATE}catch(n){}return t});var r=t.documentElement,c="svg"===r.nodeName.toLowerCase(),i=a._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):[];a._prefixes=i,Modernizr.addTest("opacity",function(){var e=s("a").style;return e.cssText=i.join("opacity:.55;"),/^0.55$/.test(e.opacity)})}(window,document);