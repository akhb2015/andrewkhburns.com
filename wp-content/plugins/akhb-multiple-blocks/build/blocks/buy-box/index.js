!function(){"use strict";var e,t={344:function(){var e=window.wp.blocks,t=window.wp.element,n=(window.wp.i18n,window.wp.blockEditor),o=window.wp.components;function r(){return r=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e},r.apply(this,arguments)}var l=JSON.parse('{"u2":"create-block/buy-box"}');(0,e.registerBlockType)(l.u2,{edit:function(e){let{attributes:r,setAttributes:l}=e;const a=(0,n.useBlockProps)();return(0,t.createElement)(t.Fragment,null,(0,t.createElement)(n.InspectorControls,a,(0,t.createElement)(o.PanelBody,{title:"Color Options"},(0,t.createElement)("div",{className:"components-base-control"},(0,t.createElement)("div",{className:"components-base-control__field"},(0,t.createElement)("label",{className:"components-base-control__label"},"Buy Box Text Color"),(0,t.createElement)(n.ColorPalette,{onChange:e=>{l({buyBoxTextColor:e})},value:r.buyBoxTextColor}))))),(0,t.createElement)("div",{className:"buy-box",style:{color:r.buyBoxTextColor}},(0,t.createElement)("div",{className:"content"},(0,t.createElement)("h1",null,(0,t.createElement)(n.RichText,{placeholder:"Type your heading",onChange:e=>{l({buyBoxHeading:e})},value:r.buyBoxHeading})),(0,t.createElement)("p",null,(0,t.createElement)(n.RichText,{placeholder:"Type your text",onChange:e=>{l({buyBoxText:e})},value:r.buyBoxText})),(0,t.createElement)("a",{href:"#",className:"button"},"Download"))))},save:function(e){let{attributes:o}=e;const l=n.useBlockProps.save(),{buyBoxTextColor:a,buyBoxHeading:c,buyBoxText:u}=o;return(0,t.createElement)("div",r({className:"buy-box",style:{color:a}},l),(0,t.createElement)("div",{className:"content"},(0,t.createElement)("h1",null,c),(0,t.createElement)("p",null,u),(0,t.createElement)("a",{href:"#",className:"button"},"Download")))}})}},n={};function o(e){var r=n[e];if(void 0!==r)return r.exports;var l=n[e]={exports:{}};return t[e](l,l.exports,o),l.exports}o.m=t,e=[],o.O=function(t,n,r,l){if(!n){var a=1/0;for(i=0;i<e.length;i++){n=e[i][0],r=e[i][1],l=e[i][2];for(var c=!0,u=0;u<n.length;u++)(!1&l||a>=l)&&Object.keys(o.O).every((function(e){return o.O[e](n[u])}))?n.splice(u--,1):(c=!1,l<a&&(a=l));if(c){e.splice(i--,1);var s=r();void 0!==s&&(t=s)}}return t}l=l||0;for(var i=e.length;i>0&&e[i-1][2]>l;i--)e[i]=e[i-1];e[i]=[n,r,l]},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={415:0,824:0};o.O.j=function(t){return 0===e[t]};var t=function(t,n){var r,l,a=n[0],c=n[1],u=n[2],s=0;if(a.some((function(t){return 0!==e[t]}))){for(r in c)o.o(c,r)&&(o.m[r]=c[r]);if(u)var i=u(o)}for(t&&t(n);s<a.length;s++)l=a[s],o.o(e,l)&&e[l]&&e[l][0](),e[l]=0;return o.O(i)},n=self.webpackChunkmultiple_blocks=self.webpackChunkmultiple_blocks||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))}();var r=o.O(void 0,[824],(function(){return o(344)}));r=o.O(r)}();