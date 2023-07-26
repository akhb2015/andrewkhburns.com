"use strict";(self.webpackChunknewfold_Onboarding=self.webpackChunknewfold_Onboarding||[]).push([[858],{4401:function(e,t,r){r.d(t,{V:function(){return l}});var a=r(9307),n=r(5791),o=r(4316),s=r(950),l=e=>{let{title:t,subtitle:r,error:l}=e;return(0,a.createElement)(n.Z,{className:"step-error-state",isVerticallyCentered:!0},(0,a.createElement)(o.Z,{title:t,subtitle:r}),(0,a.createElement)("div",{className:"step-error-state__logo"}),(0,a.createElement)("h3",{className:"step-error-state__error"},l),(0,a.createElement)(s.Z,null))}},4316:function(e,t,r){var a=r(9307),n=r(5736);t.Z=e=>{let{title:t,subtitle:r}=e;return(0,a.createElement)("div",{className:"nfd-main-heading"},(0,a.createElement)("h2",{className:"nfd-main-heading__title"},(0,n.__)(t,"wp-module-onboarding")),(0,a.createElement)("h3",{className:"nfd-main-heading__subtitle"},(0,n.__)(r,"wp-module-onboarding")))}},5791:function(e,t,r){r.d(t,{Z:function(){return g}});var a=r(9307),n=r(4184),o=r.n(n),s=r(5158),l=r(6974),i=r(2200),u=r(6989),d=r.n(u),c=r(4704),m=e=>{let{className:t="nfd-onboarding-layout__base",children:r}=e;const n=(0,l.TH)(),u=document.querySelector(".nfd-onboard-content");return(0,a.useEffect)((()=>{null==u||u.focus({preventScroll:!0}),function(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"Showing new Onboarding Page";(0,s.speak)(t,"assertive")}(n,"Override"),new class{constructor(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};this.eventSlug=e,this.eventData=t}send(){d()({url:(0,c.F)("events"),method:"POST",data:{slug:this.eventSlug,data:this.eventData}}).catch((e=>{console.error(e)}))}}(`${i.Db}-pageview`,{stepID:n.pathname,previousStepID:window.nfdOnboarding.previousStepID}).send(),window.nfdOnboarding.previousStepID=n.pathname}),[n.pathname]),(0,a.createElement)("div",{className:o()("nfd-onboarding-layout",t)},r)},h=r(682);const p=e=>{let{children:t}=e;return(0,a.createElement)("section",{className:"is-contained"},t)};var g=e=>{let{className:t="",children:r,isBgPrimary:n=!1,isCentered:s=!1,isVerticallyCentered:l=!1,isContained:i=!1,isPadded:u=!1,isFadeIn:d=!0}=e;const c=i?p:a.Fragment;return(0,a.createElement)(h.Z,{type:d&&"fade-in",duration:"233ms",timingFunction:"ease-in-out"},(0,a.createElement)(m,{className:o()("nfd-onboarding-layout__common",t,{"is-bg-primary":n},{"is-centered":s},{"is-vertically-centered":l},{"is-padded":u})},(0,a.createElement)(c,null,r)))}},7004:function(e,t,r){r.d(t,{L:function(){return u},Y:function(){return l}});var a=r(9307),n=r(5791),o=r(4316),s=r(950),l=e=>{let{title:t,subtitle:r}=e;return(0,a.createElement)(n.Z,{className:"step-loader",isVerticallyCentered:!0},(0,a.createElement)(o.Z,{title:t,subtitle:r}),(0,a.createElement)("div",{className:"step-loader__logo-container"},(0,a.createElement)("div",{className:"step-loader__logo"})),(0,a.createElement)(s.Z,null))},i=r(682),u=()=>(0,a.createElement)("div",{className:"image-upload-loader--loading-box"},(0,a.createElement)(i.Z,{type:"load",className:"image-upload-loader--loading-box__loader"}))},950:function(e,t,r){var a=r(9307),n=r(9685),o=r(9818),s=r(5736);t.Z=e=>{let{question:t=(0,s.__)("Need Help?","wp-module-onboarding"),urlLabel:r=(0,s.__)("Hire our Experts","wp-module-onboarding")}=e;const l=(0,o.select)(n.h).getHireExpertsUrl();return(0,a.createElement)("div",{className:"nfd-card-need-help-tag"},t,(0,a.createElement)("a",{href:l,target:"_blank"},r))}},1340:function(e,t,r){r.d(t,{U:function(){return h},g:function(){return w}});var a=r(9307),n=r(9818),o=r(4333),s=r(5736),l=r(7004),i=r(9685),u=r(7625),d=r(2200),c=r(4401),m=r(1589),h=e=>{let{children:t,navigationStateCallback:r=!1}=e;const h=(0,o.useViewportMatch)("medium"),{storedThemeStatus:p,brandName:g}=(0,n.useSelect)((e=>({storedThemeStatus:e(i.h).getThemeStatus(),brandName:e(i.h).getNewfoldBrandName()})),[]),w=(e=>({loader:{title:(0,s.sprintf)(
/* translators: %s: Brand */
(0,s.__)("Preparing your %s design studio","wp-module-onboarding"),e),subtitle:(0,s.__)("Hang tight while we show you some of the best WordPress has to offer!","wp-module-onboarding")},errorState:{title:(0,s.sprintf)(
/* translators: %s: Brand */
(0,s.__)("Preparing your %s design studio","wp-module-onboarding"),e),subtitle:(0,s.__)("Hang tight while we show you some of the best WordPress has to offer!","wp-module-onboarding"),error:(0,s.__)("Uh-oh, something went wrong. Please contact support.","wp-module-onboarding")}}))(g),{updateThemeStatus:b,setIsDrawerOpened:f,setIsDrawerSuppressed:_,setIsHeaderNavigationEnabled:v}=(0,n.useDispatch)(i.h),E=async()=>{const e=await(0,u.YL)(d.DY);return null!=e&&e.error?d.vv:e.body.status},y=()=>{switch(p){case d.Rq:case d.GV:return(()=>{if("function"==typeof r)return r();h&&f(!0),_(!1),v(!0)})();default:f(!1),_(!0),v(!1)}};(0,a.useEffect)((()=>{y(),p===d.a0&&(async()=>{const e=await E();switch(e){case d.Zh:setTimeout((async()=>{if(await E()!==d.GV)return b(d.vv);window.location.reload()}),d.YU);break;case d.GV:window.location.reload();break;default:b(e)}})()}),[p]);const S=async()=>(b(d.Zh),(await(0,u.N9)(d.DY,!0,!1)).error?b(d.Rq):window.location.reload());return(0,a.createElement)(a.Fragment,null,(()=>{switch(p){case d.vv:return(0,a.createElement)(m.Z,{showButton:!1,isModalOpen:!0,modalTitle:(0,s.__)("It looks like you may have an existing website","wp-module-onboarding"),modalText:(0,s.__)("Going through this setup will change your active theme, WordPress settings, add content – would you like to continue?","wp-module-onboarding"),modalOnClose:S,modalExitButtonText:(0,s.__)("Exit to WordPress","wp-module-onboarding")});case d.Rq:return(0,a.createElement)(c.V,{title:w.errorState.title,subtitle:w.errorState.subtitle,error:w.errorState.error});case d.GV:return t;default:return(0,a.createElement)(l.Y,{title:w.loader.title,subtitle:w.loader.subtitle})}})())},p=r(3421),g=r(1392),w=e=>{let{children:t,navigationStateCallback:r=!1}=e;const u=(0,o.useViewportMatch)("medium"),[m,h]=(0,a.useState)(d.Sr),{storedPluginsStatus:w,brandName:b}=(0,n.useSelect)((e=>({storedPluginsStatus:e(i.h).getPluginsStatus(),brandName:e(i.h).getNewfoldBrandName()})),[]),f=(e=>({loader:{title:(0,s.sprintf)(
/* translators: 1: Brand 2: Site */
(0,s.__)("Making the keys to your %s Online %s","wp-module-onboarding"),e,(0,g.I)("Site")),subtitle:(0,s.__)("We’re installing WooCommerce for you to fill with your amazing products & services!","wp-module-onboarding")},errorState:{title:(0,s.sprintf)(
/* translators: 1: Brand 2: Site */
(0,s.__)("Making the keys to your %s Online %s","wp-module-onboarding"),e,(0,g.I)("Site")),subtitle:(0,s.__)("We’re installing WooCommerce for you to fill with your amazing products & services!","wp-module-onboarding"),error:(0,s.__)("Uh-oh, something went wrong. Please contact support.","wp-module-onboarding")}}))(b),{updatePluginsStatus:_,setIsDrawerOpened:v,setIsDrawerSuppressed:E,setIsHeaderNavigationEnabled:y}=(0,n.useDispatch)(i.h),S=async()=>{const e=await(0,p.qC)(d.Gv);return null!=e&&e.error?d.sG:e.body.status},N=e=>{switch(e){case d.sG:case d.ye:return(()=>{if("function"==typeof r)return r();u&&v(!0),E(!1),y(!0)})();default:v(!1),E(!0),y(!1)}};(0,a.useEffect)((()=>{N(m)}),[m]);return(0,a.useEffect)((()=>{h(w[d.Gv]),w[d.Gv]===d.Ck&&(async e=>{const t=await S();switch(t){case d.Sr:setTimeout((async()=>{if(await S()!==d.ye)return w[d.Gv]=d.sG,_(w),h(d.sG);window.location.reload()}),d.sr);break;case d.ye:window.location.reload();break;default:e[d.Gv]=t,h(t),_(e)}})(w)}),[w]),(0,a.createElement)(a.Fragment,null,(()=>{switch(m){case d.sG:return(0,a.createElement)(c.V,{title:f.errorState.title,subtitle:f.errorState.subtitle,error:f.errorState.error});case d.ye:return t;default:return(0,a.createElement)(l.Y,{title:f.loader.title,subtitle:f.loader.subtitle})}})())}},8858:function(e,t,r){r.r(t);var a=r(9307),n=r(6974),o=r(9818),s=r(6138),l=r(9685),i=r(5791),u=r(2200),d=r(1340),c=r(6332);t.default=()=>{const e=(0,n.TH)(),[t,r]=(0,a.useState)(),{currentStep:m,themeStatus:h}=(0,o.useSelect)((t=>({currentStep:t(l.h).getStepFromPath(e.pathname),themeStatus:t(l.h).getThemeStatus()})),[]),{updateThemeStatus:p,setDrawerActiveView:g,setSidebarActiveView:w}=(0,o.useDispatch)(l.h);return(0,a.useEffect)((()=>{w(u.Jq),g(u.jN)}),[]),(0,a.useEffect)((()=>{u.GV===h&&(async()=>{const e=await(0,s.C)(m.patternId,!0);if(null!=e&&e.error)return p(u.a0);r(null==e?void 0:e.body)})()}),[h]),(0,a.createElement)(d.U,null,(0,a.createElement)(c.V3,null,(0,a.createElement)(i.Z,{className:"theme-fonts-preview"},(0,a.createElement)("div",{className:"theme-fonts-preview__title-bar"},(0,a.createElement)("div",{className:"theme-fonts-preview__title-bar__browser"},(0,a.createElement)("span",{className:"theme-fonts-preview__title-bar__browser__dot"}),(0,a.createElement)("span",{className:"theme-fonts-preview__title-bar__browser__dot"}),(0,a.createElement)("span",{className:"theme-fonts-preview__title-bar__browser__dot"}))),!t&&(0,a.createElement)(c.i5,{blockGrammer:"",styling:"large",viewportWidth:1300}),t&&(0,a.createElement)(c.i5,{blockGrammer:t,styling:"large",viewportWidth:1300}))))}}}]);