<?php
	/* Template Name: Cost Savings Calculator */
	get_header();
?>

<script>
  
  const queryString = window.location.search

  if(queryString.length > 0){
    const urlParams = new URLSearchParams(queryString)

    const source = urlParams.get('utm_source')
    const medium = urlParams.get('utm_medium')
    const campaign = urlParams.get('utm_campaign')

    localStorage.setItem('vf_source',source)
    localStorage.setItem('vf_medium',medium)
    localStorage.setItem('vf_campaign',campaign)

  }

</script>


<section class="b-section SAVINGS-CALCULATOR">
<link rel="preload" href="/savings-calculator/_next/static/css/9defb1205b61bcc82ed0.css" as="style"/><link rel="stylesheet" href="/savings-calculator/_next/static/css/9defb1205b61bcc82ed0.css" data-n-g=""/><noscript data-n-css=""></noscript><script defer="" nomodule="" src="/savings-calculator/_next/static/chunks/polyfills-b3a69a2f13c2329aa269.js"></script><script src="/savings-calculator/_next/static/chunks/webpack-bd6f02b7d384fb86b96f.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/framework-2f612445bd50b211f15a.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/main-7beb5af946699a79d8e4.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/pages/_app-c5ffabeef37aa4a54af3.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/29107295-62449f6ab50432c0efef.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/228-2b9263d00865cbc4037a.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/547-e317c73aa444e51ab38b.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/326-662a2e664b08199a1ca8.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/57-37c9d01ec299930055e3.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/495-521439a4affd53e07dcd.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/28-29c77419fe36f132b50a.js" defer=""></script><script src="/savings-calculator/_next/static/chunks/pages/pageinputs-bdab658a43511ffbaa52.js" defer=""></script><script src="/savings-calculator/_next/static/7lpGg-FSbWhQ9M-is1yjU/_buildManifest.js" defer=""></script><script src="/savings-calculator/_next/static/7lpGg-FSbWhQ9M-is1yjU/_ssgManifest.js" defer=""></script><style id="jss-server-side">.MuiSvgIcon-root {
  fill: currentColor;
  width: 1em;
  height: 1em;
  display: inline-block;
  font-size: 24px;
  transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  flex-shrink: 0;
  user-select: none;
}
.MuiSvgIcon-colorPrimary {
  color: ##00abd8;
}
.MuiSvgIcon-colorSecondary {
  color: #76BC21;
}
.MuiSvgIcon-colorAction {
  color: rgba(0, 0, 0, 0.54);
}
.MuiSvgIcon-colorError {
  color: #f44336;
}
.MuiSvgIcon-colorDisabled {
  color: rgba(0, 0, 0, 0.26);
}
.MuiSvgIcon-fontSizeInherit {
  font-size: inherit;
}
.MuiSvgIcon-fontSizeSmall {
  font-size: 20px;
}
.MuiSvgIcon-fontSizeLarge {
  font-size: 35px;
}
.MuiPaper-root {
  color: rgba(0, 0, 0, 0.87);
  transition: box-shadow 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  background-color: #fff;
}
.MuiPaper-rounded {
  border-radius: 4px;
}
.MuiPaper-outlined {
  border: 1px solid rgba(0, 0, 0, 0.12);
}
.MuiPaper-elevation0 {
  box-shadow: none;
}
.MuiPaper-elevation1 {
  box-shadow: 0px 2px 1px -1px rgba(0,0,0,0.2),0px 1px 1px 0px rgba(0,0,0,0.14),0px 1px 3px 0px rgba(0,0,0,0.12);
}
.MuiPaper-elevation2 {
  box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2),0px 2px 2px 0px rgba(0,0,0,0.14),0px 1px 5px 0px rgba(0,0,0,0.12);
}
.MuiPaper-elevation3 {
  box-shadow: 0px 3px 3px -2px rgba(0,0,0,0.2),0px 3px 4px 0px rgba(0,0,0,0.14),0px 1px 8px 0px rgba(0,0,0,0.12);
}
.MuiPaper-elevation4 {
  box-shadow: 0px 2px 4px -1px rgba(0,0,0,0.2),0px 4px 5px 0px rgba(0,0,0,0.14),0px 1px 10px 0px rgba(0,0,0,0.12);
}
.MuiPaper-elevation5 {
  box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.2),0px 5px 8px 0px rgba(0,0,0,0.14),0px 1px 14px 0px rgba(0,0,0,0.12);
}
.MuiPaper-elevation6 {
  box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.2),0px 6px 10px 0px rgba(0,0,0,0.14),0px 1px 18px 0px rgba(0,0,0,0.12);
}
.MuiPaper-elevation7 {
  box-shadow: 0px 4px 5px -2px rgba(0,0,0,0.2),0px 7px 10px 1px rgba(0,0,0,0.14),0px 2px 16px 1px rgba(0,0,0,0.12);
}
.MuiPaper-elevation8 {
  box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2),0px 8px 10px 1px rgba(0,0,0,0.14),0px 3px 14px 2px rgba(0,0,0,0.12);
}
.MuiPaper-elevation9 {
  box-shadow: 0px 5px 6px -3px rgba(0,0,0,0.2),0px 9px 12px 1px rgba(0,0,0,0.14),0px 3px 16px 2px rgba(0,0,0,0.12);
}
.MuiPaper-elevation10 {
  box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.2),0px 10px 14px 1px rgba(0,0,0,0.14),0px 4px 18px 3px rgba(0,0,0,0.12);
}
.MuiPaper-elevation11 {
  box-shadow: 0px 6px 7px -4px rgba(0,0,0,0.2),0px 11px 15px 1px rgba(0,0,0,0.14),0px 4px 20px 3px rgba(0,0,0,0.12);
}
.MuiPaper-elevation12 {
  box-shadow: 0px 7px 8px -4px rgba(0,0,0,0.2),0px 12px 17px 2px rgba(0,0,0,0.14),0px 5px 22px 4px rgba(0,0,0,0.12);
}
.MuiPaper-elevation13 {
  box-shadow: 0px 7px 8px -4px rgba(0,0,0,0.2),0px 13px 19px 2px rgba(0,0,0,0.14),0px 5px 24px 4px rgba(0,0,0,0.12);
}
.MuiPaper-elevation14 {
  box-shadow: 0px 7px 9px -4px rgba(0,0,0,0.2),0px 14px 21px 2px rgba(0,0,0,0.14),0px 5px 26px 4px rgba(0,0,0,0.12);
}
.MuiPaper-elevation15 {
  box-shadow: 0px 8px 9px -5px rgba(0,0,0,0.2),0px 15px 22px 2px rgba(0,0,0,0.14),0px 6px 28px 5px rgba(0,0,0,0.12);
}
.MuiPaper-elevation16 {
  box-shadow: 0px 8px 10px -5px rgba(0,0,0,0.2),0px 16px 24px 2px rgba(0,0,0,0.14),0px 6px 30px 5px rgba(0,0,0,0.12);
}
.MuiPaper-elevation17 {
  box-shadow: 0px 8px 11px -5px rgba(0,0,0,0.2),0px 17px 26px 2px rgba(0,0,0,0.14),0px 6px 32px 5px rgba(0,0,0,0.12);
}
.MuiPaper-elevation18 {
  box-shadow: 0px 9px 11px -5px rgba(0,0,0,0.2),0px 18px 28px 2px rgba(0,0,0,0.14),0px 7px 34px 6px rgba(0,0,0,0.12);
}
.MuiPaper-elevation19 {
  box-shadow: 0px 9px 12px -6px rgba(0,0,0,0.2),0px 19px 29px 2px rgba(0,0,0,0.14),0px 7px 36px 6px rgba(0,0,0,0.12);
}
.MuiPaper-elevation20 {
  box-shadow: 0px 10px 13px -6px rgba(0,0,0,0.2),0px 20px 31px 3px rgba(0,0,0,0.14),0px 8px 38px 7px rgba(0,0,0,0.12);
}
.MuiPaper-elevation21 {
  box-shadow: 0px 10px 13px -6px rgba(0,0,0,0.2),0px 21px 33px 3px rgba(0,0,0,0.14),0px 8px 40px 7px rgba(0,0,0,0.12);
}
.MuiPaper-elevation22 {
  box-shadow: 0px 10px 14px -6px rgba(0,0,0,0.2),0px 22px 35px 3px rgba(0,0,0,0.14),0px 8px 42px 7px rgba(0,0,0,0.12);
}
.MuiPaper-elevation23 {
  box-shadow: 0px 11px 14px -7px rgba(0,0,0,0.2),0px 23px 36px 3px rgba(0,0,0,0.14),0px 9px 44px 8px rgba(0,0,0,0.12);
}
.MuiPaper-elevation24 {
  box-shadow: 0px 11px 15px -7px rgba(0,0,0,0.2),0px 24px 38px 3px rgba(0,0,0,0.14),0px 9px 46px 8px rgba(0,0,0,0.12);
}
.MuiButtonBase-root {
  color: inherit;
  border: 0;
  cursor: pointer;
  margin: 0;
  display: inline-flex;
  outline: 0;
  padding: 0;
  position: relative;
  align-items: center;
  user-select: none;
  border-radius: 0;
  vertical-align: middle;
  -moz-appearance: none;
  justify-content: center;
  text-decoration: none;
  background-color: transparent;
  -webkit-appearance: none;
  -webkit-tap-highlight-color: transparent;
}
.MuiButtonBase-root::-moz-focus-inner {
  border-style: none;
}
.MuiButtonBase-root.Mui-disabled {
  cursor: default;
  pointer-events: none;
}
@media print {
  .MuiButtonBase-root {
    color-adjust: exact;
  }
}
  .MuiIconButton-root {
    flex: 0 0 auto;
    color: rgba(0, 0, 0, 0.54);
    padding: 12px;
    overflow: visible;
    font-size: 24px;
    text-align: center;
    transition: background-color 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    border-radius: 50%;
  }
  .MuiIconButton-root:hover {
    background-color: rgba(0, 0, 0, 0.04);
  }
  .MuiIconButton-root.Mui-disabled {
    color: rgba(0, 0, 0, 0.26);
    background-color: transparent;
  }
@media (hover: none) {
  .MuiIconButton-root:hover {
    background-color: transparent;
  }
}
  .MuiIconButton-edgeStart {
    margin-left: -12px;
  }
  .MuiIconButton-sizeSmall.MuiIconButton-edgeStart {
    margin-left: -3px;
  }
  .MuiIconButton-edgeEnd {
    margin-right: -12px;
  }
  .MuiIconButton-sizeSmall.MuiIconButton-edgeEnd {
    margin-right: -3px;
  }
  .MuiIconButton-colorInherit {
    color: inherit;
  }
  .MuiIconButton-colorPrimary {
    color: ##00abd8;
  }
  .MuiIconButton-colorPrimary:hover {
    background-color: rgba(NaN, 10, 189, 0.04);
  }
@media (hover: none) {
  .MuiIconButton-colorPrimary:hover {
    background-color: transparent;
  }
}
  .MuiIconButton-colorSecondary {
    color: #76BC21;
  }
  .MuiIconButton-colorSecondary:hover {
    background-color: rgba(118, 188, 33, 0.04);
  }
@media (hover: none) {
  .MuiIconButton-colorSecondary:hover {
    background-color: transparent;
  }
}
  .MuiIconButton-sizeSmall {
    padding: 3px;
    font-size: 18px;
  }
  .MuiIconButton-label {
    width: 100%;
    display: flex;
    align-items: inherit;
    justify-content: inherit;
  }
  .MuiTypography-root {
    margin: 0;
  }
  .MuiTypography-body2 {
    font-size: 14px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.43;
    letter-spacing: 0.01071em;
  }
  .MuiTypography-body1 {
    font-size: 16px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.5;
    letter-spacing: 0.00938em;
  }
  .MuiTypography-caption {
    font-size: 12px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.66;
    letter-spacing: 0.03333em;
  }
  .MuiTypography-button {
    font-size: 14px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 500;
    line-height: 1.75;
    letter-spacing: 0.02857em;
    text-transform: uppercase;
  }
  .MuiTypography-h1 {
    font-size: 96px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 300;
    line-height: 1.167;
    letter-spacing: -0.01562em;
  }
  .MuiTypography-h2 {
    font-size: 60px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 300;
    line-height: 1.2;
    letter-spacing: -0.00833em;
  }
  .MuiTypography-h3 {
    font-size: 48px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.167;
    letter-spacing: 0em;
  }
  .MuiTypography-h4 {
    font-size: 34px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.235;
    letter-spacing: 0.00735em;
  }
  .MuiTypography-h5 {
    font-size: 24px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.334;
    letter-spacing: 0em;
  }
  .MuiTypography-h6 {
    font-size: 20px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 500;
    line-height: 1.6;
    letter-spacing: 0.0075em;
  }
  .MuiTypography-subtitle1 {
    font-size: 16px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.75;
    letter-spacing: 0.00938em;
  }
  .MuiTypography-subtitle2 {
    font-size: 14px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 500;
    line-height: 1.57;
    letter-spacing: 0.00714em;
  }
  .MuiTypography-overline {
    font-size: 12px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 2.66;
    letter-spacing: 0.08333em;
    text-transform: uppercase;
  }
  .MuiTypography-srOnly {
    width: 1px;
    height: 1px;
    overflow: hidden;
    position: absolute;
  }
  .MuiTypography-alignLeft {
    text-align: left;
  }
  .MuiTypography-alignCenter {
    text-align: center;
  }
  .MuiTypography-alignRight {
    text-align: right;
  }
  .MuiTypography-alignJustify {
    text-align: justify;
  }
  .MuiTypography-noWrap {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
  .MuiTypography-gutterBottom {
    margin-bottom: 0.35em;
  }
  .MuiTypography-paragraph {
    margin-bottom: 16px;
  }
  .MuiTypography-colorInherit {
    color: inherit;
  }
  .MuiTypography-colorPrimary {
    color: ##00abd8;
  }
  .MuiTypography-colorSecondary {
    color: #76BC21;
  }
  .MuiTypography-colorTextPrimary {
    color: rgba(0, 0, 0, 0.87);
  }
  .MuiTypography-colorTextSecondary {
    color: rgba(0, 0, 0, 0.54);
  }
  .MuiTypography-colorError {
    color: #f44336;
  }
  .MuiTypography-displayInline {
    display: inline;
  }
  .MuiTypography-displayBlock {
    display: block;
  }
  .MuiButton-root {
    color: rgba(0, 0, 0, 0.87);
    padding: 6px 16px;
    font-size: 14px;
    min-width: 64px;
    box-sizing: border-box;
    transition: background-color 250ms cubic-bezier(0.4, 0, 0.2, 1) 0ms,box-shadow 250ms cubic-bezier(0.4, 0, 0.2, 1) 0ms,border 250ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 500;
    line-height: 1.75;
    border-radius: 4px;
    letter-spacing: 0.02857em;
    text-transform: uppercase;
  }
  .MuiButton-root:hover {
    text-decoration: none;
    background-color: rgba(0, 0, 0, 0.04);
  }
  .MuiButton-root.Mui-disabled {
    color: rgba(0, 0, 0, 0.26);
  }
@media (hover: none) {
  .MuiButton-root:hover {
    background-color: transparent;
  }
}
  .MuiButton-root:hover.Mui-disabled {
    background-color: transparent;
  }
  .MuiButton-label {
    width: 100%;
    display: inherit;
    align-items: inherit;
    justify-content: inherit;
  }
  .MuiButton-text {
    padding: 6px 8px;
  }
  .MuiButton-textPrimary {
    color: ##00abd8;
  }
  .MuiButton-textPrimary:hover {
    background-color: rgba(NaN, 10, 189, 0.04);
  }
@media (hover: none) {
  .MuiButton-textPrimary:hover {
    background-color: transparent;
  }
}
  .MuiButton-textSecondary {
    color: #76BC21;
  }
  .MuiButton-textSecondary:hover {
    background-color: rgba(118, 188, 33, 0.04);
  }
@media (hover: none) {
  .MuiButton-textSecondary:hover {
    background-color: transparent;
  }
}
  .MuiButton-outlined {
    border: 1px solid rgba(0, 0, 0, 0.23);
    padding: 5px 15px;
  }
  .MuiButton-outlined.Mui-disabled {
    border: 1px solid rgba(0, 0, 0, 0.12);
  }
  .MuiButton-outlinedPrimary {
    color: ##00abd8;
    border: 1px solid rgba(NaN, 10, 189, 0.5);
  }
  .MuiButton-outlinedPrimary:hover {
    border: 1px solid ##00abd8;
    background-color: rgba(NaN, 10, 189, 0.04);
  }
@media (hover: none) {
  .MuiButton-outlinedPrimary:hover {
    background-color: transparent;
  }
}
  .MuiButton-outlinedSecondary {
    color: #76BC21;
    border: 1px solid rgba(118, 188, 33, 0.5);
  }
  .MuiButton-outlinedSecondary:hover {
    border: 1px solid #76BC21;
    background-color: rgba(118, 188, 33, 0.04);
  }
  .MuiButton-outlinedSecondary.Mui-disabled {
    border: 1px solid rgba(0, 0, 0, 0.26);
  }
@media (hover: none) {
  .MuiButton-outlinedSecondary:hover {
    background-color: transparent;
  }
}
  .MuiButton-contained {
    color: rgba(0, 0, 0, 0.87);
    box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2),0px 2px 2px 0px rgba(0,0,0,0.14),0px 1px 5px 0px rgba(0,0,0,0.12);
    background-color: #e0e0e0;
  }
  .MuiButton-contained:hover {
    box-shadow: 0px 2px 4px -1px rgba(0,0,0,0.2),0px 4px 5px 0px rgba(0,0,0,0.14),0px 1px 10px 0px rgba(0,0,0,0.12);
    background-color: #d5d5d5;
  }
  .MuiButton-contained.Mui-focusVisible {
    box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.2),0px 6px 10px 0px rgba(0,0,0,0.14),0px 1px 18px 0px rgba(0,0,0,0.12);
  }
  .MuiButton-contained:active {
    box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2),0px 8px 10px 1px rgba(0,0,0,0.14),0px 3px 14px 2px rgba(0,0,0,0.12);
  }
  .MuiButton-contained.Mui-disabled {
    color: rgba(0, 0, 0, 0.26);
    box-shadow: none;
    background-color: rgba(0, 0, 0, 0.12);
  }
@media (hover: none) {
  .MuiButton-contained:hover {
    box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2),0px 2px 2px 0px rgba(0,0,0,0.14),0px 1px 5px 0px rgba(0,0,0,0.12);
    background-color: #e0e0e0;
  }
}
  .MuiButton-contained:hover.Mui-disabled {
    background-color: rgba(0, 0, 0, 0.12);
  }
  .MuiButton-containedPrimary {
    color: rgba(0, 0, 0, 0.87);
    background-color: ##00abd8;
  }
  .MuiButton-containedPrimary:hover {
    background-color: rgba(NaN, 7, 132, 0.031);
  }
@media (hover: none) {
  .MuiButton-containedPrimary:hover {
    background-color: ##00abd8;
  }
}
  .MuiButton-containedSecondary {
    color: rgba(0, 0, 0, 0.87);
    background-color: #76BC21;
  }
  .MuiButton-containedSecondary:hover {
    background-color: rgb(82, 131, 23);
  }
@media (hover: none) {
  .MuiButton-containedSecondary:hover {
    background-color: #76BC21;
  }
}
  .MuiButton-disableElevation {
    box-shadow: none;
  }
  .MuiButton-disableElevation:hover {
    box-shadow: none;
  }
  .MuiButton-disableElevation.Mui-focusVisible {
    box-shadow: none;
  }
  .MuiButton-disableElevation:active {
    box-shadow: none;
  }
  .MuiButton-disableElevation.Mui-disabled {
    box-shadow: none;
  }
  .MuiButton-colorInherit {
    color: inherit;
    border-color: currentColor;
  }
  .MuiButton-textSizeSmall {
    padding: 4px 5px;
    font-size: 13px;
  }
  .MuiButton-textSizeLarge {
    padding: 8px 11px;
    font-size: 15px;
  }
  .MuiButton-outlinedSizeSmall {
    padding: 3px 9px;
    font-size: 13px;
  }
  .MuiButton-outlinedSizeLarge {
    padding: 7px 21px;
    font-size: 15px;
  }
  .MuiButton-containedSizeSmall {
    padding: 4px 10px;
    font-size: 13px;
  }
  .MuiButton-containedSizeLarge {
    padding: 8px 22px;
    font-size: 15px;
  }
  .MuiButton-fullWidth {
    width: 100%;
  }
  .MuiButton-startIcon {
    display: inherit;
    margin-left: -4px;
    margin-right: 8px;
  }
  .MuiButton-startIcon.MuiButton-iconSizeSmall {
    margin-left: -2px;
  }
  .MuiButton-endIcon {
    display: inherit;
    margin-left: 8px;
    margin-right: -4px;
  }
  .MuiButton-endIcon.MuiButton-iconSizeSmall {
    margin-right: -2px;
  }
  .MuiButton-iconSizeSmall > *:first-child {
    font-size: 18px;
  }
  .MuiButton-iconSizeMedium > *:first-child {
    font-size: 20px;
  }
  .MuiButton-iconSizeLarge > *:first-child {
    font-size: 22px;
  }
  .MuiButtonGroup-root {
    display: inline-flex;
    border-radius: 4px;
  }
  .MuiButtonGroup-contained {
    box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2),0px 2px 2px 0px rgba(0,0,0,0.14),0px 1px 5px 0px rgba(0,0,0,0.12);
  }
  .MuiButtonGroup-disableElevation {
    box-shadow: none;
  }
  .MuiButtonGroup-fullWidth {
    width: 100%;
  }
  .MuiButtonGroup-vertical {
    flex-direction: column;
  }
  .MuiButtonGroup-grouped {
    min-width: 40px;
  }
  .MuiButtonGroup-groupedHorizontal:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  .MuiButtonGroup-groupedHorizontal:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  .MuiButtonGroup-groupedVertical:not(:first-child) {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  .MuiButtonGroup-groupedVertical:not(:last-child) {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
  }
  .MuiButtonGroup-groupedTextHorizontal:not(:last-child) {
    border-right: 1px solid rgba(0, 0, 0, 0.23);
  }
  .MuiButtonGroup-groupedTextVertical:not(:last-child) {
    border-bottom: 1px solid rgba(0, 0, 0, 0.23);
  }
  .MuiButtonGroup-groupedTextPrimary:not(:last-child) {
    border-color: rgba(NaN, 10, 189, 0.5);
  }
  .MuiButtonGroup-groupedTextSecondary:not(:last-child) {
    border-color: rgba(118, 188, 33, 0.5);
  }
  .MuiButtonGroup-groupedOutlinedHorizontal:not(:first-child) {
    margin-left: -1px;
  }
  .MuiButtonGroup-groupedOutlinedHorizontal:not(:last-child) {
    border-right-color: transparent;
  }
  .MuiButtonGroup-groupedOutlinedVertical:not(:first-child) {
    margin-top: -1px;
  }
  .MuiButtonGroup-groupedOutlinedVertical:not(:last-child) {
    border-bottom-color: transparent;
  }
  .MuiButtonGroup-groupedOutlinedPrimary:hover {
    border-color: ##00abd8;
  }
  .MuiButtonGroup-groupedOutlinedSecondary:hover {
    border-color: #76BC21;
  }
  .MuiButtonGroup-groupedContained {
    box-shadow: none;
  }
  .MuiButtonGroup-groupedContainedHorizontal:not(:last-child) {
    border-right: 1px solid #bdbdbd;
  }
  .MuiButtonGroup-groupedContainedHorizontal:not(:last-child).Mui-disabled {
    border-right: 1px solid rgba(0, 0, 0, 0.26);
  }
  .MuiButtonGroup-groupedContainedVertical:not(:last-child) {
    border-bottom: 1px solid #bdbdbd;
  }
  .MuiButtonGroup-groupedContainedVertical:not(:last-child).Mui-disabled {
    border-bottom: 1px solid rgba(0, 0, 0, 0.26);
  }
  .MuiButtonGroup-groupedContainedPrimary:not(:last-child) {
    border-color: rgba(NaN, 7, 132, 0.031);
  }
  .MuiButtonGroup-groupedContainedSecondary:not(:last-child) {
    border-color: rgb(82, 131, 23);
  }
  .MuiContainer-root {
    width: 100%;
    display: block;
    box-sizing: border-box;
    margin-left: auto;
    margin-right: auto;
    padding-left: 16px;
    padding-right: 16px;
  }
@media (min-width:600px) {
  .MuiContainer-root {
    padding-left: 24px;
    padding-right: 24px;
  }
}
  .MuiContainer-disableGutters {
    padding-left: 0;
    padding-right: 0;
  }
@media (min-width:600px) {
  .MuiContainer-fixed {
    max-width: 600px;
  }
}
@media (min-width:960px) {
  .MuiContainer-fixed {
    max-width: 960px;
  }
}
@media (min-width:1280px) {
  .MuiContainer-fixed {
    max-width: 1280px;
  }
}
@media (min-width:1920px) {
  .MuiContainer-fixed {
    max-width: 1920px;
  }
}
@media (min-width:0px) {
  .MuiContainer-maxWidthXs {
    max-width: 444px;
  }
}
@media (min-width:600px) {
  .MuiContainer-maxWidthSm {
    max-width: 600px;
  }
}
@media (min-width:960px) {
  .MuiContainer-maxWidthMd {
    max-width: 960px;
  }
}
@media (min-width:1280px) {
  .MuiContainer-maxWidthLg {
    max-width: 1280px;
  }
}
@media (min-width:1920px) {
  .MuiContainer-maxWidthXl {
    max-width: 1920px;
  }
}
  .MuiDivider-root {
    border: none;
    height: 1px;
    margin: 0;
    flex-shrink: 0;
    background-color: rgba(0, 0, 0, 0.12);
  }
  .MuiDivider-absolute {
    left: 0;
    width: 100%;
    bottom: 0;
    position: absolute;
  }
  .MuiDivider-inset {
    margin-left: 72px;
  }
  .MuiDivider-light {
    background-color: rgba(0, 0, 0, 0.08);
  }
  .MuiDivider-middle {
    margin-left: 16px;
    margin-right: 16px;
  }
  .MuiDivider-vertical {
    width: 1px;
    height: 100%;
  }
  .MuiDivider-flexItem {
    height: auto;
    align-self: stretch;
  }
@keyframes mui-auto-fill {}
@keyframes mui-auto-fill-cancel {}
  .MuiInputBase-root {
    color: rgba(0, 0, 0, 0.87);
    cursor: text;
    display: inline-flex;
    position: relative;
    font-size: 16px;
    box-sizing: border-box;
    align-items: center;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.1876em;
    letter-spacing: 0.00938em;
  }
  .MuiInputBase-root.Mui-disabled {
    color: rgba(0, 0, 0, 0.38);
    cursor: default;
  }
  .MuiInputBase-multiline {
    padding: 6px 0 7px;
  }
  .MuiInputBase-multiline.MuiInputBase-marginDense {
    padding-top: 3px;
  }
  .MuiInputBase-fullWidth {
    width: 100%;
  }
  .MuiInputBase-input {
    font: inherit;
    color: currentColor;
    width: 100%;
    border: 0;
    height: 1.1876em;
    margin: 0;
    display: block;
    padding: 6px 0 7px;
    min-width: 0;
    background: none;
    box-sizing: content-box;
    animation-name: mui-auto-fill-cancel;
    letter-spacing: inherit;
    animation-duration: 10ms;
    -webkit-tap-highlight-color: transparent;
  }
  .MuiInputBase-input::-webkit-input-placeholder {
    color: currentColor;
    opacity: 0.42;
    transition: opacity 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  }
  .MuiInputBase-input::-moz-placeholder {
    color: currentColor;
    opacity: 0.42;
    transition: opacity 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  }
  .MuiInputBase-input:-ms-input-placeholder {
    color: currentColor;
    opacity: 0.42;
    transition: opacity 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  }
  .MuiInputBase-input::-ms-input-placeholder {
    color: currentColor;
    opacity: 0.42;
    transition: opacity 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  }
  .MuiInputBase-input:focus {
    outline: 0;
  }
  .MuiInputBase-input:invalid {
    box-shadow: none;
  }
  .MuiInputBase-input::-webkit-search-decoration {
    -webkit-appearance: none;
  }
  .MuiInputBase-input.Mui-disabled {
    opacity: 1;
  }
  .MuiInputBase-input:-webkit-autofill {
    animation-name: mui-auto-fill;
    animation-duration: 5000s;
  }
  label[data-shrink=false] + .MuiInputBase-formControl .MuiInputBase-input::-webkit-input-placeholder {
    opacity: 0 !important;
  }
  label[data-shrink=false] + .MuiInputBase-formControl .MuiInputBase-input::-moz-placeholder {
    opacity: 0 !important;
  }
  label[data-shrink=false] + .MuiInputBase-formControl .MuiInputBase-input:-ms-input-placeholder {
    opacity: 0 !important;
  }
  label[data-shrink=false] + .MuiInputBase-formControl .MuiInputBase-input::-ms-input-placeholder {
    opacity: 0 !important;
  }
  label[data-shrink=false] + .MuiInputBase-formControl .MuiInputBase-input:focus::-webkit-input-placeholder {
    opacity: 0.42;
  }
  label[data-shrink=false] + .MuiInputBase-formControl .MuiInputBase-input:focus::-moz-placeholder {
    opacity: 0.42;
  }
  label[data-shrink=false] + .MuiInputBase-formControl .MuiInputBase-input:focus:-ms-input-placeholder {
    opacity: 0.42;
  }
  label[data-shrink=false] + .MuiInputBase-formControl .MuiInputBase-input:focus::-ms-input-placeholder {
    opacity: 0.42;
  }
  .MuiInputBase-inputMarginDense {
    padding-top: 3px;
  }
  .MuiInputBase-inputMultiline {
    height: auto;
    resize: none;
    padding: 0;
  }
  .MuiInputBase-inputTypeSearch {
    -moz-appearance: textfield;
    -webkit-appearance: textfield;
  }
  .MuiFormControl-root {
    border: 0;
    margin: 0;
    display: inline-flex;
    padding: 0;
    position: relative;
    min-width: 0;
    flex-direction: column;
    vertical-align: top;
  }
  .MuiFormControl-marginNormal {
    margin-top: 16px;
    margin-bottom: 8px;
  }
  .MuiFormControl-marginDense {
    margin-top: 8px;
    margin-bottom: 4px;
  }
  .MuiFormControl-fullWidth {
    width: 100%;
  }
  .MuiGrid-container {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
  }
  .MuiGrid-item {
    margin: 0;
    box-sizing: border-box;
  }
  .MuiGrid-zeroMinWidth {
    min-width: 0;
  }
  .MuiGrid-direction-xs-column {
    flex-direction: column;
  }
  .MuiGrid-direction-xs-column-reverse {
    flex-direction: column-reverse;
  }
  .MuiGrid-direction-xs-row-reverse {
    flex-direction: row-reverse;
  }
  .MuiGrid-wrap-xs-nowrap {
    flex-wrap: nowrap;
  }
  .MuiGrid-wrap-xs-wrap-reverse {
    flex-wrap: wrap-reverse;
  }
  .MuiGrid-align-items-xs-center {
    align-items: center;
  }
  .MuiGrid-align-items-xs-flex-start {
    align-items: flex-start;
  }
  .MuiGrid-align-items-xs-flex-end {
    align-items: flex-end;
  }
  .MuiGrid-align-items-xs-baseline {
    align-items: baseline;
  }
  .MuiGrid-align-content-xs-center {
    align-content: center;
  }
  .MuiGrid-align-content-xs-flex-start {
    align-content: flex-start;
  }
  .MuiGrid-align-content-xs-flex-end {
    align-content: flex-end;
  }
  .MuiGrid-align-content-xs-space-between {
    align-content: space-between;
  }
  .MuiGrid-align-content-xs-space-around {
    align-content: space-around;
  }
  .MuiGrid-justify-content-xs-center {
    justify-content: center;
  }
  .MuiGrid-justify-content-xs-flex-end {
    justify-content: flex-end;
  }
  .MuiGrid-justify-content-xs-space-between {
    justify-content: space-between;
  }
  .MuiGrid-justify-content-xs-space-around {
    justify-content: space-around;
  }
  .MuiGrid-justify-content-xs-space-evenly {
    justify-content: space-evenly;
  }
  .MuiGrid-spacing-xs-1 {
    width: calc(100% + 8px);
    margin: -4px;
  }
  .MuiGrid-spacing-xs-1 > .MuiGrid-item {
    padding: 4px;
  }
  .MuiGrid-spacing-xs-2 {
    width: calc(100% + 16px);
    margin: -8px;
  }
  .MuiGrid-spacing-xs-2 > .MuiGrid-item {
    padding: 8px;
  }
  .MuiGrid-spacing-xs-3 {
    width: calc(100% + 24px);
    margin: -12px;
  }
  .MuiGrid-spacing-xs-3 > .MuiGrid-item {
    padding: 12px;
  }
  .MuiGrid-spacing-xs-4 {
    width: calc(100% + 32px);
    margin: -16px;
  }
  .MuiGrid-spacing-xs-4 > .MuiGrid-item {
    padding: 16px;
  }
  .MuiGrid-spacing-xs-5 {
    width: calc(100% + 40px);
    margin: -20px;
  }
  .MuiGrid-spacing-xs-5 > .MuiGrid-item {
    padding: 20px;
  }
  .MuiGrid-spacing-xs-6 {
    width: calc(100% + 48px);
    margin: -24px;
  }
  .MuiGrid-spacing-xs-6 > .MuiGrid-item {
    padding: 24px;
  }
  .MuiGrid-spacing-xs-7 {
    width: calc(100% + 56px);
    margin: -28px;
  }
  .MuiGrid-spacing-xs-7 > .MuiGrid-item {
    padding: 28px;
  }
  .MuiGrid-spacing-xs-8 {
    width: calc(100% + 64px);
    margin: -32px;
  }
  .MuiGrid-spacing-xs-8 > .MuiGrid-item {
    padding: 32px;
  }
  .MuiGrid-spacing-xs-9 {
    width: calc(100% + 72px);
    margin: -36px;
  }
  .MuiGrid-spacing-xs-9 > .MuiGrid-item {
    padding: 36px;
  }
  .MuiGrid-spacing-xs-10 {
    width: calc(100% + 80px);
    margin: -40px;
  }
  .MuiGrid-spacing-xs-10 > .MuiGrid-item {
    padding: 40px;
  }
  .MuiGrid-grid-xs-auto {
    flex-grow: 0;
    max-width: none;
    flex-basis: auto;
  }
  .MuiGrid-grid-xs-true {
    flex-grow: 1;
    max-width: 100%;
    flex-basis: 0;
  }
  .MuiGrid-grid-xs-1 {
    flex-grow: 0;
    max-width: 8.333333%;
    flex-basis: 8.333333%;
  }
  .MuiGrid-grid-xs-2 {
    flex-grow: 0;
    max-width: 16.666667%;
    flex-basis: 16.666667%;
  }
  .MuiGrid-grid-xs-3 {
    flex-grow: 0;
    max-width: 25%;
    flex-basis: 25%;
  }
  .MuiGrid-grid-xs-4 {
    flex-grow: 0;
    max-width: 33.333333%;
    flex-basis: 33.333333%;
  }
  .MuiGrid-grid-xs-5 {
    flex-grow: 0;
    max-width: 41.666667%;
    flex-basis: 41.666667%;
  }
  .MuiGrid-grid-xs-6 {
    flex-grow: 0;
    max-width: 50%;
    flex-basis: 50%;
  }
  .MuiGrid-grid-xs-7 {
    flex-grow: 0;
    max-width: 58.333333%;
    flex-basis: 58.333333%;
  }
  .MuiGrid-grid-xs-8 {
    flex-grow: 0;
    max-width: 66.666667%;
    flex-basis: 66.666667%;
  }
  .MuiGrid-grid-xs-9 {
    flex-grow: 0;
    max-width: 75%;
    flex-basis: 75%;
  }
  .MuiGrid-grid-xs-10 {
    flex-grow: 0;
    max-width: 83.333333%;
    flex-basis: 83.333333%;
  }
  .MuiGrid-grid-xs-11 {
    flex-grow: 0;
    max-width: 91.666667%;
    flex-basis: 91.666667%;
  }
  .MuiGrid-grid-xs-12 {
    flex-grow: 0;
    max-width: 100%;
    flex-basis: 100%;
  }
@media (min-width:600px) {
  .MuiGrid-grid-sm-auto {
    flex-grow: 0;
    max-width: none;
    flex-basis: auto;
  }
  .MuiGrid-grid-sm-true {
    flex-grow: 1;
    max-width: 100%;
    flex-basis: 0;
  }
  .MuiGrid-grid-sm-1 {
    flex-grow: 0;
    max-width: 8.333333%;
    flex-basis: 8.333333%;
  }
  .MuiGrid-grid-sm-2 {
    flex-grow: 0;
    max-width: 16.666667%;
    flex-basis: 16.666667%;
  }
  .MuiGrid-grid-sm-3 {
    flex-grow: 0;
    max-width: 25%;
    flex-basis: 25%;
  }
  .MuiGrid-grid-sm-4 {
    flex-grow: 0;
    max-width: 33.333333%;
    flex-basis: 33.333333%;
  }
  .MuiGrid-grid-sm-5 {
    flex-grow: 0;
    max-width: 41.666667%;
    flex-basis: 41.666667%;
  }
  .MuiGrid-grid-sm-6 {
    flex-grow: 0;
    max-width: 50%;
    flex-basis: 50%;
  }
  .MuiGrid-grid-sm-7 {
    flex-grow: 0;
    max-width: 58.333333%;
    flex-basis: 58.333333%;
  }
  .MuiGrid-grid-sm-8 {
    flex-grow: 0;
    max-width: 66.666667%;
    flex-basis: 66.666667%;
  }
  .MuiGrid-grid-sm-9 {
    flex-grow: 0;
    max-width: 75%;
    flex-basis: 75%;
  }
  .MuiGrid-grid-sm-10 {
    flex-grow: 0;
    max-width: 83.333333%;
    flex-basis: 83.333333%;
  }
  .MuiGrid-grid-sm-11 {
    flex-grow: 0;
    max-width: 91.666667%;
    flex-basis: 91.666667%;
  }
  .MuiGrid-grid-sm-12 {
    flex-grow: 0;
    max-width: 100%;
    flex-basis: 100%;
  }
}
@media (min-width:960px) {
  .MuiGrid-grid-md-auto {
    flex-grow: 0;
    max-width: none;
    flex-basis: auto;
  }
  .MuiGrid-grid-md-true {
    flex-grow: 1;
    max-width: 100%;
    flex-basis: 0;
  }
  .MuiGrid-grid-md-1 {
    flex-grow: 0;
    max-width: 8.333333%;
    flex-basis: 8.333333%;
  }
  .MuiGrid-grid-md-2 {
    flex-grow: 0;
    max-width: 16.666667%;
    flex-basis: 16.666667%;
  }
  .MuiGrid-grid-md-3 {
    flex-grow: 0;
    max-width: 25%;
    flex-basis: 25%;
  }
  .MuiGrid-grid-md-4 {
    flex-grow: 0;
    max-width: 33.333333%;
    flex-basis: 33.333333%;
  }
  .MuiGrid-grid-md-5 {
    flex-grow: 0;
    max-width: 41.666667%;
    flex-basis: 41.666667%;
  }
  .MuiGrid-grid-md-6 {
    flex-grow: 0;
    max-width: 50%;
    flex-basis: 50%;
  }
  .MuiGrid-grid-md-7 {
    flex-grow: 0;
    max-width: 58.333333%;
    flex-basis: 58.333333%;
  }
  .MuiGrid-grid-md-8 {
    flex-grow: 0;
    max-width: 66.666667%;
    flex-basis: 66.666667%;
  }
  .MuiGrid-grid-md-9 {
    flex-grow: 0;
    max-width: 75%;
    flex-basis: 75%;
  }
  .MuiGrid-grid-md-10 {
    flex-grow: 0;
    max-width: 83.333333%;
    flex-basis: 83.333333%;
  }
  .MuiGrid-grid-md-11 {
    flex-grow: 0;
    max-width: 91.666667%;
    flex-basis: 91.666667%;
  }
  .MuiGrid-grid-md-12 {
    flex-grow: 0;
    max-width: 100%;
    flex-basis: 100%;
  }
}
@media (min-width:1280px) {
  .MuiGrid-grid-lg-auto {
    flex-grow: 0;
    max-width: none;
    flex-basis: auto;
  }
  .MuiGrid-grid-lg-true {
    flex-grow: 1;
    max-width: 100%;
    flex-basis: 0;
  }
  .MuiGrid-grid-lg-1 {
    flex-grow: 0;
    max-width: 8.333333%;
    flex-basis: 8.333333%;
  }
  .MuiGrid-grid-lg-2 {
    flex-grow: 0;
    max-width: 16.666667%;
    flex-basis: 16.666667%;
  }
  .MuiGrid-grid-lg-3 {
    flex-grow: 0;
    max-width: 25%;
    flex-basis: 25%;
  }
  .MuiGrid-grid-lg-4 {
    flex-grow: 0;
    max-width: 33.333333%;
    flex-basis: 33.333333%;
  }
  .MuiGrid-grid-lg-5 {
    flex-grow: 0;
    max-width: 41.666667%;
    flex-basis: 41.666667%;
  }
  .MuiGrid-grid-lg-6 {
    flex-grow: 0;
    max-width: 50%;
    flex-basis: 50%;
  }
  .MuiGrid-grid-lg-7 {
    flex-grow: 0;
    max-width: 58.333333%;
    flex-basis: 58.333333%;
  }
  .MuiGrid-grid-lg-8 {
    flex-grow: 0;
    max-width: 66.666667%;
    flex-basis: 66.666667%;
  }
  .MuiGrid-grid-lg-9 {
    flex-grow: 0;
    max-width: 75%;
    flex-basis: 75%;
  }
  .MuiGrid-grid-lg-10 {
    flex-grow: 0;
    max-width: 83.333333%;
    flex-basis: 83.333333%;
  }
  .MuiGrid-grid-lg-11 {
    flex-grow: 0;
    max-width: 91.666667%;
    flex-basis: 91.666667%;
  }
  .MuiGrid-grid-lg-12 {
    flex-grow: 0;
    max-width: 100%;
    flex-basis: 100%;
  }
}
@media (min-width:1920px) {
  .MuiGrid-grid-xl-auto {
    flex-grow: 0;
    max-width: none;
    flex-basis: auto;
  }
  .MuiGrid-grid-xl-true {
    flex-grow: 1;
    max-width: 100%;
    flex-basis: 0;
  }
  .MuiGrid-grid-xl-1 {
    flex-grow: 0;
    max-width: 8.333333%;
    flex-basis: 8.333333%;
  }
  .MuiGrid-grid-xl-2 {
    flex-grow: 0;
    max-width: 16.666667%;
    flex-basis: 16.666667%;
  }
  .MuiGrid-grid-xl-3 {
    flex-grow: 0;
    max-width: 25%;
    flex-basis: 25%;
  }
  .MuiGrid-grid-xl-4 {
    flex-grow: 0;
    max-width: 33.333333%;
    flex-basis: 33.333333%;
  }
  .MuiGrid-grid-xl-5 {
    flex-grow: 0;
    max-width: 41.666667%;
    flex-basis: 41.666667%;
  }
  .MuiGrid-grid-xl-6 {
    flex-grow: 0;
    max-width: 50%;
    flex-basis: 50%;
  }
  .MuiGrid-grid-xl-7 {
    flex-grow: 0;
    max-width: 58.333333%;
    flex-basis: 58.333333%;
  }
  .MuiGrid-grid-xl-8 {
    flex-grow: 0;
    max-width: 66.666667%;
    flex-basis: 66.666667%;
  }
  .MuiGrid-grid-xl-9 {
    flex-grow: 0;
    max-width: 75%;
    flex-basis: 75%;
  }
  .MuiGrid-grid-xl-10 {
    flex-grow: 0;
    max-width: 83.333333%;
    flex-basis: 83.333333%;
  }
  .MuiGrid-grid-xl-11 {
    flex-grow: 0;
    max-width: 91.666667%;
    flex-basis: 91.666667%;
  }
  .MuiGrid-grid-xl-12 {
    flex-grow: 0;
    max-width: 100%;
    flex-basis: 100%;
  }
}
  .MuiLinearProgress-root {
    height: 4px;
    overflow: hidden;
    position: relative;
  }
@media print {
  .MuiLinearProgress-root {
    color-adjust: exact;
  }
}
  .MuiLinearProgress-colorPrimary {
    background-color: rgba(NaN, 161, 229, 0.031);
  }
  .MuiLinearProgress-colorSecondary {
    background-color: rgb(202, 229, 170);
  }
  .MuiLinearProgress-buffer {
    background-color: transparent;
  }
  .MuiLinearProgress-query {
    transform: rotate(180deg);
  }
  .MuiLinearProgress-dashed {
    width: 100%;
    height: 100%;
    position: absolute;
    animation: MuiLinearProgress-keyframes-buffer 3s infinite linear;
    margin-top: 0;
  }
  .MuiLinearProgress-dashedColorPrimary {
    background-size: 10px 10px;
    background-image: radial-gradient(rgba(NaN, 161, 229, 0.031) 0%, rgba(NaN, 161, 229, 0.031) 16%, transparent 42%);
    background-position: 0 -23px;
  }
  .MuiLinearProgress-dashedColorSecondary {
    background-size: 10px 10px;
    background-image: radial-gradient(rgb(202, 229, 170) 0%, rgb(202, 229, 170) 16%, transparent 42%);
    background-position: 0 -23px;
  }
  .MuiLinearProgress-bar {
    top: 0;
    left: 0;
    width: 100%;
    bottom: 0;
    position: absolute;
    transition: transform 0.2s linear;
    transform-origin: left;
  }
  .MuiLinearProgress-barColorPrimary {
    background-color: ##00abd8;
  }
  .MuiLinearProgress-barColorSecondary {
    background-color: #76BC21;
  }
  .MuiLinearProgress-bar1Indeterminate {
    width: auto;
    animation: MuiLinearProgress-keyframes-indeterminate1 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
  }
  .MuiLinearProgress-bar1Determinate {
    transition: transform .4s linear;
  }
  .MuiLinearProgress-bar1Buffer {
    z-index: 1;
    transition: transform .4s linear;
  }
  .MuiLinearProgress-bar2Indeterminate {
    width: auto;
    animation: MuiLinearProgress-keyframes-indeterminate2 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) 1.15s infinite;
  }
  .MuiLinearProgress-bar2Buffer {
    transition: transform .4s linear;
  }
@keyframes MuiLinearProgress-keyframes-indeterminate1 {
  0% {
    left: -35%;
    right: 100%;
  }
  60% {
    left: 100%;
    right: -90%;
  }
  100% {
    left: 100%;
    right: -90%;
  }
}
@keyframes MuiLinearProgress-keyframes-indeterminate2 {
  0% {
    left: -200%;
    right: 100%;
  }
  60% {
    left: 107%;
    right: -8%;
  }
  100% {
    left: 107%;
    right: -8%;
  }
}
@keyframes MuiLinearProgress-keyframes-buffer {
  0% {
    opacity: 1;
    background-position: 0 -23px;
  }
  50% {
    opacity: 0;
    background-position: 0 -23px;
  }
  100% {
    opacity: 1;
    background-position: -200px -23px;
  }
}
  .jss6 {
    top: -5px;
    left: 0;
    right: 0;
    bottom: 0;
    margin: 0;
    padding: 0 8px;
    overflow: hidden;
    position: absolute;
    border-style: solid;
    border-width: 1px;
    border-radius: inherit;
    pointer-events: none;
  }
  .jss7 {
    padding: 0;
    text-align: left;
    transition: width 150ms cubic-bezier(0.0, 0, 0.2, 1) 0ms;
    line-height: 11px;
  }
  .jss8 {
    width: auto;
    height: 11px;
    display: block;
    padding: 0;
    font-size: 0.75em;
    max-width: 0.01px;
    text-align: left;
    transition: max-width 50ms cubic-bezier(0.0, 0, 0.2, 1) 0ms;
    visibility: hidden;
  }
  .jss8 > span {
    display: inline-block;
    padding-left: 5px;
    padding-right: 5px;
  }
  .jss9 {
    max-width: 1000px;
    transition: max-width 100ms cubic-bezier(0.0, 0, 0.2, 1) 50ms;
  }
  .MuiOutlinedInput-root {
    position: relative;
    border-radius: 4px;
  }
  .MuiOutlinedInput-root:hover .MuiOutlinedInput-notchedOutline {
    border-color: rgba(0, 0, 0, 0.87);
  }
@media (hover: none) {
  .MuiOutlinedInput-root:hover .MuiOutlinedInput-notchedOutline {
    border-color: rgba(0, 0, 0, 0.23);
  }
}
  .MuiOutlinedInput-root.Mui-focused .MuiOutlinedInput-notchedOutline {
    border-color: ##00abd8;
    border-width: 2px;
  }
  .MuiOutlinedInput-root.Mui-error .MuiOutlinedInput-notchedOutline {
    border-color: #f44336;
  }
  .MuiOutlinedInput-root.Mui-disabled .MuiOutlinedInput-notchedOutline {
    border-color: rgba(0, 0, 0, 0.26);
  }
  .MuiOutlinedInput-colorSecondary.Mui-focused .MuiOutlinedInput-notchedOutline {
    border-color: #76BC21;
  }
  .MuiOutlinedInput-adornedStart {
    padding-left: 14px;
  }
  .MuiOutlinedInput-adornedEnd {
    padding-right: 14px;
  }
  .MuiOutlinedInput-multiline {
    padding: 18.5px 14px;
  }
  .MuiOutlinedInput-multiline.MuiOutlinedInput-marginDense {
    padding-top: 10.5px;
    padding-bottom: 10.5px;
  }
  .MuiOutlinedInput-notchedOutline {
    border-color: rgba(0, 0, 0, 0.23);
  }
  .MuiOutlinedInput-input {
    padding: 18.5px 14px;
  }
  .MuiOutlinedInput-input:-webkit-autofill {
    border-radius: inherit;
  }
  .MuiOutlinedInput-inputMarginDense {
    padding-top: 10.5px;
    padding-bottom: 10.5px;
  }
  .MuiOutlinedInput-inputMultiline {
    padding: 0;
  }
  .MuiOutlinedInput-inputAdornedStart {
    padding-left: 0;
  }
  .MuiOutlinedInput-inputAdornedEnd {
    padding-right: 0;
  }
  .jss20.jss21 .jss22 {
    transform: scale(1) translateY(-10px);
  }
  .jss22 {
    top: -34px;
    z-index: 1;
    position: absolute;
    font-size: 12px;
    transform: scale(0);
    transition: transform 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.2;
    letter-spacing: 0.01071em;
    transform-origin: bottom center;
  }
  .jss23 {
    width: 32px;
    height: 32px;
    display: flex;
    transform: rotate(-45deg);
    align-items: center;
    border-radius: 50% 50% 50% 0;
    justify-content: center;
    background-color: currentColor;
  }
  .jss24 {
    color: rgba(0, 0, 0, 0.87);
    transform: rotate(45deg);
  }
  .MuiSlider-root {
    color: ##00abd8;
    width: 100%;
    cursor: pointer;
    height: 2px;
    display: inline-block;
    padding: 13px 0;
    position: relative;
    box-sizing: content-box;
    touch-action: none;
    -webkit-tap-highlight-color: transparent;
  }
  .MuiSlider-root.Mui-disabled {
    color: #bdbdbd;
    cursor: default;
    pointer-events: none;
  }
  .MuiSlider-root.MuiSlider-vertical {
    width: 2px;
    height: 100%;
    padding: 0 13px;
  }
@media (pointer: coarse) {
  .MuiSlider-root {
    padding: 20px 0;
  }
  .MuiSlider-root.MuiSlider-vertical {
    padding: 0 20px;
  }
}
@media print {
  .MuiSlider-root {
    color-adjust: exact;
  }
}
  .MuiSlider-colorSecondary {
    color: #76BC21;
  }
  .MuiSlider-marked {
    margin-bottom: 20px;
  }
  .MuiSlider-marked.MuiSlider-vertical {
    margin-right: 20px;
    margin-bottom: auto;
  }
  .MuiSlider-rail {
    width: 100%;
    height: 2px;
    display: block;
    opacity: 0.38;
    position: absolute;
    border-radius: 1px;
    background-color: currentColor;
  }
  .MuiSlider-vertical .MuiSlider-rail {
    width: 2px;
    height: 100%;
  }
  .MuiSlider-track {
    height: 2px;
    display: block;
    position: absolute;
    border-radius: 1px;
    background-color: currentColor;
  }
  .MuiSlider-vertical .MuiSlider-track {
    width: 2px;
  }
  .MuiSlider-trackFalse .MuiSlider-track {
    display: none;
  }
  .MuiSlider-trackInverted .MuiSlider-track {
    background-color: rgba(NaN, 161, 229, 0.031);
  }
  .MuiSlider-trackInverted .MuiSlider-rail {
    opacity: 1;
  }
  .MuiSlider-thumb {
    width: 12px;
    height: 12px;
    display: flex;
    outline: 0;
    position: absolute;
    box-sizing: border-box;
    margin-top: -5px;
    transition: box-shadow 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    align-items: center;
    margin-left: -6px;
    border-radius: 50%;
    justify-content: center;
    background-color: currentColor;
  }
  .MuiSlider-thumb::after {
    top: -15px;
    left: -15px;
    right: -15px;
    bottom: -15px;
    content: "";
    position: absolute;
    border-radius: 50%;
  }
  .MuiSlider-thumb.Mui-focusVisible, .MuiSlider-thumb:hover {
    box-shadow: 0px 0px 0px 8px rgba(NaN, 10, 189, 0.16);
  }
  .MuiSlider-thumb.MuiSlider-active {
    box-shadow: 0px 0px 0px 14px rgba(NaN, 10, 189, 0.16);
  }
  .MuiSlider-thumb.Mui-disabled {
    width: 8px;
    height: 8px;
    margin-top: -3px;
    margin-left: -4px;
  }
  .MuiSlider-vertical .MuiSlider-thumb {
    margin-left: -5px;
    margin-bottom: -6px;
  }
  .MuiSlider-vertical .MuiSlider-thumb.Mui-disabled {
    margin-left: -3px;
    margin-bottom: -4px;
  }
  .MuiSlider-thumb.Mui-disabled:hover {
    box-shadow: none;
  }
@media (hover: none) {
  .MuiSlider-thumb.Mui-focusVisible, .MuiSlider-thumb:hover {
    box-shadow: none;
  }
}
  .MuiSlider-thumbColorSecondary.Mui-focusVisible, .MuiSlider-thumbColorSecondary:hover {
    box-shadow: 0px 0px 0px 8px rgba(118, 188, 33, 0.16);
  }
  .MuiSlider-thumbColorSecondary.MuiSlider-active {
    box-shadow: 0px 0px 0px 14px rgba(118, 188, 33, 0.16);
  }
  .MuiSlider-valueLabel {
    left: calc(-50% - 4px);
  }
  .MuiSlider-mark {
    width: 2px;
    height: 2px;
    position: absolute;
    border-radius: 1px;
    background-color: currentColor;
  }
  .MuiSlider-markActive {
    opacity: 0.8;
    background-color: #fff;
  }
  .MuiSlider-markLabel {
    top: 26px;
    color: rgba(0, 0, 0, 0.54);
    position: absolute;
    font-size: 14px;
    transform: translateX(-50%);
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.43;
    white-space: nowrap;
    letter-spacing: 0.01071em;
  }
  .MuiSlider-vertical .MuiSlider-markLabel {
    top: auto;
    left: 26px;
    transform: translateY(50%);
  }
@media (pointer: coarse) {
  .MuiSlider-markLabel {
    top: 40px;
  }
  .MuiSlider-vertical .MuiSlider-markLabel {
    left: 31px;
  }
}
  .MuiSlider-markLabelActive {
    color: rgba(0, 0, 0, 0.87);
  }

  .jss25 {
    color: #FFFFFF;
    border-color: #00abd8 !important;
    background-color: #00abd8;
  }
  .jss25:hover {
    background-color: #0083ad;
  }
  .jss26 {
    color: #FFFFFF;
    width: 50px;
    border-color: #00abd8 !important;
    background-color: #0083ad;
  }
  .jss26:hover {
    background-color: #0083ad;
  }
  .jss10 {
    width: calc(100% - 12px);
  }
  .jss11 {
    color: #76BC21;
    width: 100%;
    height: 12px;
    padding: 15px 0;
    position: relative !important;
    margin-top: 50px;
    border-radius: 10px;
  }
  .jss12 {
    width: 26px;
    height: 26px;
    z-index: 5;
    margin-top: -7px;
    margin-left: -7px;
    background-color: #222D33;
  }
  .jss12:focus, .jss12:hover, .jss12.jss13 {
    box-shadow: none;
  }
  .jss14 {
    left: 0;
    transform: translateX(-5px) !important;
    margin-top: 10px;
    margin-left: 5px;
  }
  .jss14:nth-child(n+6) {
    left: 100% !important;
    transform: translateX(-100%) !important;
    margin-left: 12px;
  }
  .jss15 {
    top: -52px;
    left: 50%;
    padding: 0px 20px;
    transform: translateX(-50%) !important;
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.14);
    font-weight: bold;
    background-color: white;
  }
  .jss15 * {
    color: #222D33;
    background: transparent;
  }
  .jss15:after {
    left: 50%;
    width: 0;
    bottom: -12px;
    height: 0;
    content: "";
    position: absolute;
    transform: translateX(-50%) !important;
    border-top: 13px solid white;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    -webkit-filter: drop-shadow(0 2px 2px #00000024);
  }
  .jss16 {
    height: 12px;
    border-radius: 10px;
  }
  .jss16:before {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: "";
    z-index: 1;
    position: absolute;
    background: linear-gradient(90deg, #76BC21 0%, #EF7A91 100%);
    border-radius: 10px;
  }
  .jss17 {
    width: calc(100% + 12px);
    height: 12px;
    opacity: 1;
    border-radius: 10px;
    background-color: #E5E5E5;
  }
  .jss18 {
    width: 12px;
    height: 12px;
    opacity: 1;
    z-index: 2;
    margin-top: 0;
    border-radius: 100%;
    background-color: rgba(34, 45, 51, 0.2);
  }
  .jss19 {
    opacity: 1;
    background-color: rgba(34, 45, 51, 0.2);;
  }
  .jss3 {
    height: 8px;
    border-radius: 5px;
    background-color: #FFFFFF;
  }
  .jss4 {
    background-color: #FFFFFF;
  }
  .jss5 {
    border-radius: 5px;
    background-color: #00abd8;
  }
  .jss1 {
    flex-grow: 1;
  }
  .jss2 {
    color: #efefef;
    width: 100%;
    display: block;
    font-size: 0.93em;
    text-align: right;
    margin-bottom: 5px;
  }
  .MuiAutocomplete-root.Mui-focused .MuiAutocomplete-clearIndicatorDirty {
    visibility: visible;
  }
@media (pointer: fine) {
  .MuiAutocomplete-root:hover .MuiAutocomplete-clearIndicatorDirty {
    visibility: visible;
  }
}
  .MuiAutocomplete-fullWidth {
    width: 100%;
  }
  .MuiAutocomplete-tag {
    margin: 3px;
    max-width: calc(100% - 6px);
  }
  .MuiAutocomplete-tagSizeSmall {
    margin: 2px;
    max-width: calc(100% - 4px);
  }
  .MuiAutocomplete-inputRoot {
    flex-wrap: wrap;
  }
  .MuiAutocomplete-hasPopupIcon .MuiAutocomplete-inputRoot, .MuiAutocomplete-hasClearIcon .MuiAutocomplete-inputRoot {
    padding-right: 30px;
  }
  .MuiAutocomplete-hasPopupIcon.MuiAutocomplete-hasClearIcon .MuiAutocomplete-inputRoot {
    padding-right: 56px;
  }
  .MuiAutocomplete-inputRoot .MuiAutocomplete-input {
    width: 0;
    min-width: 30px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiInput-root"] {
    padding-bottom: 1px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiOutlinedInput-root"] {
    padding: 9px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiOutlinedInput-root"][class*="MuiOutlinedInput-marginDense"] {
    padding: 6px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiFilledInput-root"] {
    padding-top: 19px;
    padding-left: 8px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiFilledInput-root"][class*="MuiFilledInput-marginDense"] {
    padding-bottom: 1px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiFilledInput-root"][class*="MuiFilledInput-marginDense"] .MuiAutocomplete-input {
    padding: 4.5px 4px;
  }
  .MuiAutocomplete-hasPopupIcon .MuiAutocomplete-inputRoot[class*="MuiFilledInput-root"], .MuiAutocomplete-hasClearIcon .MuiAutocomplete-inputRoot[class*="MuiFilledInput-root"] {
    padding-right: 39px;
  }
  .MuiAutocomplete-hasPopupIcon.MuiAutocomplete-hasClearIcon .MuiAutocomplete-inputRoot[class*="MuiFilledInput-root"] {
    padding-right: 65px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiFilledInput-root"] .MuiAutocomplete-input {
    padding: 9px 4px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiFilledInput-root"] .MuiAutocomplete-endAdornment {
    right: 9px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiOutlinedInput-root"][class*="MuiOutlinedInput-marginDense"] .MuiAutocomplete-input {
    padding: 4.5px 4px;
  }
  .MuiAutocomplete-hasPopupIcon .MuiAutocomplete-inputRoot[class*="MuiOutlinedInput-root"], .MuiAutocomplete-hasClearIcon .MuiAutocomplete-inputRoot[class*="MuiOutlinedInput-root"] {
    padding-right: 39px;
  }
  .MuiAutocomplete-hasPopupIcon.MuiAutocomplete-hasClearIcon .MuiAutocomplete-inputRoot[class*="MuiOutlinedInput-root"] {
    padding-right: 65px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiOutlinedInput-root"] .MuiAutocomplete-input {
    padding: 9.5px 4px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiOutlinedInput-root"] .MuiAutocomplete-input:first-child {
    padding-left: 6px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiOutlinedInput-root"] .MuiAutocomplete-endAdornment {
    right: 9px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiInput-root"][class*="MuiInput-marginDense"] .MuiAutocomplete-input {
    padding: 4px 4px 5px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiInput-root"][class*="MuiInput-marginDense"] .MuiAutocomplete-input:first-child {
    padding: 3px 0 6px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiInput-root"] .MuiAutocomplete-input {
    padding: 4px;
  }
  .MuiAutocomplete-inputRoot[class*="MuiInput-root"] .MuiAutocomplete-input:first-child {
    padding: 6px 0;
  }
  .MuiAutocomplete-input {
    opacity: 0;
    flex-grow: 1;
    text-overflow: ellipsis;
  }
  .MuiAutocomplete-inputFocused {
    opacity: 1;
  }
  .MuiAutocomplete-endAdornment {
    top: calc(50% - 14px);
    right: 0;
    position: absolute;
  }
  .MuiAutocomplete-clearIndicator {
    padding: 4px;
    visibility: hidden;
    margin-right: -2px;
  }
  .MuiAutocomplete-popupIndicator {
    padding: 2px;
    margin-right: -2px;
  }
  .MuiAutocomplete-popupIndicatorOpen {
    transform: rotate(180deg);
  }
  .MuiAutocomplete-popper {
    z-index: 1300;
  }
  .MuiAutocomplete-popperDisablePortal {
    position: absolute;
  }
  .MuiAutocomplete-paper {
    margin: 4px 0;
    overflow: hidden;
    font-size: 16px;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 400;
    line-height: 1.5;
    letter-spacing: 0.00938em;
  }
  .MuiAutocomplete-listbox {
    margin: 0;
    padding: 8px 0;
    overflow: auto;
    list-style: none;
    max-height: 40vh;
  }
  .MuiAutocomplete-loading {
    color: rgba(0, 0, 0, 0.54);
    padding: 14px 16px;
  }
  .MuiAutocomplete-noOptions {
    color: rgba(0, 0, 0, 0.54);
    padding: 14px 16px;
  }
  .MuiAutocomplete-option {
    cursor: pointer;
    display: flex;
    outline: 0;
    box-sizing: border-box;
    min-height: 48px;
    align-items: center;
    padding-top: 6px;
    padding-left: 16px;
    padding-right: 16px;
    padding-bottom: 6px;
    justify-content: flex-start;
    -webkit-tap-highlight-color: transparent;
  }
@media (min-width:600px) {
  .MuiAutocomplete-option {
    min-height: auto;
  }
}
  .MuiAutocomplete-option[aria-selected="true"] {
    background-color: rgba(0, 0, 0, 0.08);
  }
  .MuiAutocomplete-option[data-focus="true"] {
    background-color: rgba(0, 0, 0, 0.04);
  }
  .MuiAutocomplete-option:active {
    background-color: rgba(0, 0, 0, 0.08);
  }
  .MuiAutocomplete-option[aria-disabled="true"] {
    opacity: 0.38;
    pointer-events: none;
  }
  .MuiAutocomplete-groupLabel {
    top: -8px;
    background-color: #fff;
  }
  .MuiAutocomplete-groupUl {
    padding: 0;
  }
  .MuiAutocomplete-groupUl .MuiAutocomplete-option {
    padding-left: 24px;
  }</style><style data-styled="" data-styled-version="5.3.0">.isQMcn{display:block;min-height:calc(100vh + 22px);background-color:#d2ebeb;background-image:url(/savings-calculator/static/img/backgrounds/organization_profile.jpg);background-repeat:no-repeat;background-size:cover;background-position:center 12%;position:relative;}/*!sc*/
@media(max-width:900px){.isQMcn .global-container{padding:0;}}/*!sc*/
data-styled.g1[id="styles__LayoutContent-sc-3tb8qx-0"]{content:"isQMcn,"}/*!sc*/
.ibYRPy{display:inline-block;}/*!sc*/
.ibYRPy.full-width{display:block;width:100%;}/*!sc*/
.ibYRPy .MuiButtonGroup-groupedContainedHorizontal:not(:last-child){border-right:0 !important;}/*!sc*/
.ibYRPy button{height:50px;border-radius:0;text-transform:none;font-weight:bold;font-size:1em;}/*!sc*/
.ibYRPy button .icon{font-size:2.2em !important;}/*!sc*/
data-styled.g4[id="SplitButton__ContentButton-sc-1hqd5y9-0"]{content:"ibYRPy,"}/*!sc*/
@media (max-width:900px){.kukAYU{padding-left:20px;padding-right:20px;}}/*!sc*/
data-styled.g5[id="Slider__ContentSlider-sc-7y3udm-0"]{content:"kukAYU,"}/*!sc*/
.hlGiWv{border-left:2px solid #222D33;padding-left:15px;}/*!sc*/
.hlGiWv .resume-title{display:block;}/*!sc*/
.hlGiWv .resume-title h3{color:#222D33;text-align:left;margin:0;font-size:0.96em;font-weight:bold;}/*!sc*/
.hlGiWv .resume-body p{margin:0;text-align:left;font-size:0.9em;}/*!sc*/
data-styled.g6[id="Resume__ResumeContent-sc-1hqtvy1-0"]{content:"hlGiWv,"}/*!sc*/
.kiBUzn{min-height:100vh;background-color:#d2ebeb;background-image:linear-gradient( 270deg,rgba(12,31,44,0.9) 0%,rgba(16,42,59,0.8) 48%,rgba(20,53,75,0.5) 100% ),url(/savings-calculator/static/img/backgrounds/organization_profile.jpg);background-image:-webkit-linear-gradient( 270deg,rgba(12,31,44,0.9) 0%,rgba(16,42,59,0.8) 48%,rgba(20,53,75,0.5) 100% ),url(/savings-calculator/static/img/backgrounds/organization_profile.jpg);background-repeat:no-repeat;background-size:cover;background-position:40% 12%;position:absolute;opacity:0;left:0;right:0;top:0;bottom:0;z-index:1;-webkit-transition:opacity 1s ease-in-out;-moz-transition:opacity 1s ease-in-out;-o-transition:opacity 1s ease-in-out;-webkit-transition:opacity 1s ease-in-out;transition:opacity 1s ease-in-out;}/*!sc*/
.kiBUzn.active{opacity:1;}/*!sc*/
.sUecz{min-height:100vh;background-color:#d2ebeb;background-image:linear-gradient( 270deg,rgba(12,31,44,0.9) 0%,rgba(16,42,59,0.8) 48%,rgba(20,53,75,0.5) 100% ),url(/savings-calculator/static/img/backgrounds/solution_profile.jpg);background-image:-webkit-linear-gradient( 270deg,rgba(12,31,44,0.9) 0%,rgba(16,42,59,0.8) 48%,rgba(20,53,75,0.5) 100% ),url(/savings-calculator/static/img/backgrounds/solution_profile.jpg);background-repeat:no-repeat;background-size:cover;background-position:40% 12%;position:absolute;opacity:0;left:0;right:0;top:0;bottom:0;z-index:1;-webkit-transition:opacity 1s ease-in-out;-moz-transition:opacity 1s ease-in-out;-o-transition:opacity 1s ease-in-out;-webkit-transition:opacity 1s ease-in-out;transition:opacity 1s ease-in-out;}/*!sc*/
.sUecz.active{opacity:1;}/*!sc*/
.jgodxf{min-height:100vh;background-color:#d2ebeb;background-image:linear-gradient( 270deg,rgba(12,31,44,0.9) 0%,rgba(16,42,59,0.8) 48%,rgba(20,53,75,0.5) 100% ),url(/savings-calculator/static/img/backgrounds/management_information.jpg);background-image:-webkit-linear-gradient( 270deg,rgba(12,31,44,0.9) 0%,rgba(16,42,59,0.8) 48%,rgba(20,53,75,0.5) 100% ),url(/savings-calculator/static/img/backgrounds/management_information.jpg);background-repeat:no-repeat;background-size:cover;background-position:40% 12%;position:absolute;opacity:0;left:0;right:0;top:0;bottom:0;z-index:1;-webkit-transition:opacity 1s ease-in-out;-moz-transition:opacity 1s ease-in-out;-o-transition:opacity 1s ease-in-out;-webkit-transition:opacity 1s ease-in-out;transition:opacity 1s ease-in-out;}/*!sc*/
.jgodxf.active{opacity:1;}/*!sc*/
data-styled.g8[id="styles__BGImage-sc-1t2cv0i-0"]{content:"kiBUzn,sUecz,jgodxf,"}/*!sc*/
.yaGWu{position:relative;z-index:5;padding-top:45px;padding-bottom:50px;}/*!sc*/
.yaGWu .organization-slider .MuiSlider-rail{background-color:#76BC21 !important;}/*!sc*/
.yaGWu .organization-slider .MuiSlider-track:before{background:#76BC21 !important;}/*!sc*/
.yaGWu .overal-risk-slider .MuiSlider-rail{background:linear-gradient(90deg,#76BC21 0%,#EF7A91 100%) !important;}/*!sc*/
.yaGWu .overal-risk-slider .MuiSlider-track{background:transparent !important;}/*!sc*/
.yaGWu .overal-risk-slider .MuiSlider-track:before{background:transparent !important;}/*!sc*/
@media (max-width:900px){.yaGWu{padding-top:15px;padding-bottom:0;}}/*!sc*/
.yaGWu .grid-panels{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;}/*!sc*/
@media (max-width:900px){.yaGWu .grid-panels{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;}}/*!sc*/
.yaGWu .grid-panels .left-panel{width:41.666667%;margin-top:80px;}/*!sc*/
@media (max-width:900px){.yaGWu .grid-panels .left-panel{width:100%;}}/*!sc*/
.yaGWu .grid-panels .right-panel{width:58.333333%;}/*!sc*/
@media (max-width:900px){.yaGWu .grid-panels .right-panel{width:100%;}}/*!sc*/
.yaGWu .left-panel{padding-right:30px !important;}/*!sc*/
@media (max-width:900px){.yaGWu .left-panel{padding:15px !important;}}/*!sc*/
.yaGWu .right-panel{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;}/*!sc*/
.yaGWu .paper{margin-top:15px;padding:50px;border-radius:0;}/*!sc*/
@media (max-width:900px){.yaGWu .paper{padding:15px;padding-bottom:50px;}}/*!sc*/
.yaGWu .title{color:#ffffff;font-size:2.8em;margin:0;padding:0;}/*!sc*/
.yaGWu .description{font-size:1em;color:#efefef;}/*!sc*/
.yaGWu .paper-container{max-width:600px;}/*!sc*/
.yaGWu .paper-container .paper-header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding-top:15px;}/*!sc*/
@media (max-width:900px){.yaGWu .paper-container .paper-header{padding-right:15px;padding-bottom:15px;}}/*!sc*/
.yaGWu .paper-container .paper-header .number-badge{background-color:#00abd8;font-weight:bold;font-size:0.92em;color:#ffffff;width:25px;height:25px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:15px;}/*!sc*/
@media (max-width:900px){.yaGWu .paper-container .paper-header .number-badge{font-size:1.2em;width:40px;height:40px;}}/*!sc*/
.yaGWu .paper-container .paper-header .title-header{font-size:1.6em;margin-left:20px;}/*!sc*/
@media (max-width:900px){.yaGWu .paper-container .paper-header .title-header{margin-left:20px;}}/*!sc*/
.yaGWu .paper-container .paper-header .progress-content{width:150px;margin-left:auto;}/*!sc*/
.yaGWu .paper-container .paper-body .label{font-weight:bold;margin-bottom:5px;}/*!sc*/
.yaGWu .paper-container .paper-body .solution-type-label{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;}/*!sc*/
.yaGWu .paper-container .paper-body .solution-type-label .circle-icon{position:relative;margin-bottom:5px;z-index:999;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;background-color:#222d33;width:23px;height:23px;border-radius:100%;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin-left:auto;cursor:pointer;-webkit-transition:all 0.5s;transition:all 0.5s;}/*!sc*/
.yaGWu .paper-container .paper-body .solution-type-label .circle-icon img{width:86%;height:86%;}/*!sc*/
.yaGWu .paper-container .paper-body .solution-type-label .circle-icon:active{-webkit-transform:scale(0.9);-ms-transform:scale(0.9);transform:scale(0.9);}/*!sc*/
.yaGWu .paper-container .paper-body .solution-type-label .circle-icon .toltip-info{position:absolute;width:250px;padding:20px;height:auto;background-color:#222d33;right:calc(100% + 15px);top:-30px;}/*!sc*/
.yaGWu .paper-container .paper-body .solution-type-label .circle-icon .toltip-info:before{position:absolute;content:"";top:30px;right:-10px;width:0;height:0;border-top:10px solid transparent;border-bottom:10px solid transparent;border-left:15px solid #222d33;}/*!sc*/
.yaGWu .paper-container .paper-body .solution-type-label .circle-icon .toltip-info .description{color:#ffffff;padding:0;margin:0;}/*!sc*/
.yaGWu .paper-container .paper-body .solution-type-label .circle-icon .toltip-info.hidden{visibility:hidden;opacity:0;-webkit-transition:visibility 0s linear 300ms,opacity 300ms;transition:visibility 0s linear 300ms,opacity 300ms;}/*!sc*/
data-styled.g9[id="styles__PageContainer-sc-1t2cv0i-1"]{content:"yaGWu,"}/*!sc*/
</style><div id="__next"><div class="styles__LayoutContent-sc-3tb8qx-0 isQMcn"><div class="styles__BGImage-sc-1t2cv0i-0 kiBUzn active"></div><div class="styles__BGImage-sc-1t2cv0i-0 sUecz"></div><div class="styles__BGImage-sc-1t2cv0i-0 jgodxf"></div><div class="MuiContainer-root global-container MuiContainer-maxWidthLg"><div class="styles__PageContainer-sc-1t2cv0i-1 yaGWu"><div class="grid-panels"><div class="left-panel"><h1 class="title">Cost Savings Calculator</h1><p class="description">Most companies are not aware of the real cost it takes to manage a third-party workforce using internal resources. With Veriforce, you can experience substantial savings as early as year one. Discover your potential cost savings today.</p></div><div class="right-panel"><div class="paper-container"><div class="paper-header"><div class="progress-content"><div class="jss1"><label class="jss2">0% completed</label><div class="MuiLinearProgress-root jss3 MuiLinearProgress-colorPrimary jss4 MuiLinearProgress-determinate" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><div class="MuiLinearProgress-bar jss5 MuiLinearProgress-barColorPrimary MuiLinearProgress-bar1Determinate" style="transform:translateX(-100%)"></div></div></div></div></div><div class="paper-body"><div class="MuiPaper-root paper MuiPaper-elevation1 MuiPaper-rounded"><div class="MuiGrid-root MuiGrid-container MuiGrid-spacing-xs-4"><div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-12"><p class="MuiTypography-root label MuiTypography-body1">Industry</p><div class="MuiAutocomplete-root MuiAutocomplete-fullWidth MuiAutocomplete-hasClearIcon MuiAutocomplete-hasPopupIcon" role="combobox" aria-expanded="false" name="industry"><div class="MuiFormControl-root MuiTextField-root MuiFormControl-fullWidth"><div class="MuiInputBase-root MuiOutlinedInput-root MuiAutocomplete-inputRoot MuiInputBase-fullWidth MuiInputBase-formControl MuiInputBase-adornedEnd MuiOutlinedInput-adornedEnd MuiInputBase-marginDense MuiOutlinedInput-marginDense"><input type="text" aria-invalid="false" autoComplete="off" placeholder="Select option" value="" class="MuiInputBase-input MuiOutlinedInput-input MuiAutocomplete-input MuiAutocomplete-inputFocused MuiInputBase-inputAdornedEnd MuiOutlinedInput-inputAdornedEnd MuiInputBase-inputMarginDense MuiOutlinedInput-inputMarginDense" aria-autocomplete="list" autoCapitalize="none" spellcheck="false"/><div class="MuiAutocomplete-endAdornment"><button class="MuiButtonBase-root MuiIconButton-root MuiAutocomplete-clearIndicator MuiAutocomplete-clearIndicatorDirty" tabindex="-1" type="button" aria-label="Clear" title="Clear"><span class="MuiIconButton-label"><svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg></span></button><button class="MuiButtonBase-root MuiIconButton-root MuiAutocomplete-popupIndicator" tabindex="-1" type="button" aria-label="Open" title="Open"><span class="MuiIconButton-label"><svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 10l5 5 5-5z"></path></svg></span></button></div><fieldset aria-hidden="true" style="padding-left:8px" class="jss6 MuiOutlinedInput-notchedOutline"><legend class="jss7" style="width:0.01px"><span>&#8203;</span></legend></fieldset></div></div></div></div><div class="MuiGrid-root divider MuiGrid-item MuiGrid-grid-xs-12"><hr class="MuiDivider-root"/></div><div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-12"><p class="MuiTypography-root label MuiTypography-body1">Organization revenue bracket</p><div class="Slider__ContentSlider-sc-7y3udm-0 kukAYU jss10 organization-slider"><span class="MuiSlider-root jss11 MuiSlider-colorPrimary MuiSlider-marked"><span class="MuiSlider-rail jss17"></span><span class="MuiSlider-track jss16" style="left:0%;width:33%"></span><input type="hidden" value="33" name="organization_bracket"/><span style="left:0%" data-index="0" class="MuiSlider-mark jss18 MuiSlider-markActive jss19"></span><span aria-hidden="true" data-index="0" style="left:0%" class="MuiSlider-markLabel jss14 MuiSlider-markLabelActive">Small</span><span style="left:33%" data-index="1" class="MuiSlider-mark jss18 MuiSlider-markActive jss19"></span><span style="left:66%" data-index="2" class="MuiSlider-mark jss18"></span><span style="left:100%" data-index="3" class="MuiSlider-mark jss18"></span><span aria-hidden="true" data-index="3" style="left:100%" class="MuiSlider-markLabel jss14">Corporate</span><span class="MuiSlider-thumb jss12 MuiSlider-thumbColorPrimary jss21 jss20" tabindex="0" role="slider" style="left:33%" data-index="0" aria-label="custom slider" aria-labelledby="discrete-slider-restrict" aria-orientation="horizontal" aria-valuemax="100" aria-valuemin="0" aria-valuenow="33" aria-valuetext="Medium"><span class="jss22 MuiSlider-valueLabel jss15"><span class="jss23"><span class="jss24">Medium</span></span></span></span></span></div><div class="Resume__ResumeContent-sc-1hqtvy1-0 hlGiWv mt-2"><div class="resume-title"><h3>Medium</h3></div><div class="resume-body"><p>$100 million to $500 million</p></div></div></div><div class="MuiGrid-root divider MuiGrid-item MuiGrid-grid-xs-12"><hr class="MuiDivider-root"/></div><div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-12"><p class="MuiTypography-root label MuiTypography-body1">Overall risk profile of contractor work</p><div class="Slider__ContentSlider-sc-7y3udm-0 kukAYU jss10 overal-risk-slider"><span class="MuiSlider-root jss11 MuiSlider-colorPrimary MuiSlider-marked"><span class="MuiSlider-rail jss17"></span><span class="MuiSlider-track jss16" style="left:0%;width:100%"></span><input type="hidden" value="100" name="overal_risk"/><span style="left:0%" data-index="0" class="MuiSlider-mark jss18 MuiSlider-markActive jss19"></span><span aria-hidden="true" data-index="0" style="left:0%" class="MuiSlider-markLabel jss14 MuiSlider-markLabelActive">Low</span><span style="left:50%" data-index="1" class="MuiSlider-mark jss18 MuiSlider-markActive jss19"></span><span style="left:100%" data-index="2" class="MuiSlider-mark jss18 MuiSlider-markActive jss19"></span><span aria-hidden="true" data-index="2" style="left:100%" class="MuiSlider-markLabel jss14 MuiSlider-markLabelActive">High</span><span class="MuiSlider-thumb jss12 MuiSlider-thumbColorPrimary jss21 jss20" tabindex="0" role="slider" style="left:100%" data-index="0" aria-label="custom slider" aria-labelledby="discrete-slider-restrict" aria-orientation="horizontal" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" aria-valuetext="High"><span class="jss22 MuiSlider-valueLabel jss15"><span class="jss23"><span class="jss24">High</span></span></span></span></span></div><div class="Resume__ResumeContent-sc-1hqtvy1-0 hlGiWv mt-2"><div class="resume-title"><h3>High risk work</h3></div><div class="resume-body"><p>includes work such as working at height or in confined spaces</p></div></div></div><div class="MuiGrid-root text-right mt-5 MuiGrid-item MuiGrid-grid-xs-12"><div class="SplitButton__ContentButton-sc-1hqd5y9-0 ibYRPy  "><div role="group" class="MuiButtonGroup-root MuiButtonGroup-fullWidth" aria-label="split button" type="button"><button class="MuiButtonBase-root MuiButton-root jss25 MuiButton-outlined MuiButtonGroup-grouped MuiButtonGroup-groupedHorizontal MuiButtonGroup-groupedOutlined MuiButtonGroup-groupedOutlinedHorizontal MuiButtonGroup-groupedOutlined Mui-disabled Mui-disabled MuiButton-fullWidth Mui-disabled" tabindex="-1" type="button" disabled=""><span class="MuiButton-label">Next</span></button><button class="MuiButtonBase-root MuiButton-root jss26 MuiButton-outlined MuiButtonGroup-grouped MuiButtonGroup-groupedHorizontal MuiButtonGroup-groupedOutlined MuiButtonGroup-groupedOutlinedHorizontal MuiButtonGroup-groupedOutlined Mui-disabled MuiButton-outlinedPrimary MuiButton-outlinedSizeLarge MuiButton-sizeLarge Mui-disabled MuiButton-fullWidth Mui-disabled" tabindex="-1" type="button" disabled="" aria-label="select merge strategy" aria-haspopup="menu"><span class="MuiButton-label"><svg class="MuiSvgIcon-root icon" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path></svg></span></button></div></div></div></div></div></div></div></div></div></div></div></div></div><script id="__NEXT_DATA__" type="application/json">{"props":{"pageProps":{}},"page":"/pageinputs","query":{},"buildId":"7lpGg-FSbWhQ9M-is1yjU","assetPrefix":"/savings-calculator","nextExport":true,"isFallback":false,"appGip":true,"scriptLoader":[]}</script>

<style type="text/css">
  .MuiContainer-root {
    font-size: 16px;
  }
  .btn-content .MuiButtonGroup-groupedOutlinedHorizontal:not(:first-child),
  .table-resume-footer .MuiButtonGroup-groupedOutlinedHorizontal:not(:first-child),
  .MuiGrid-root.text-right .MuiButtonGroup-groupedOutlinedHorizontal:not(:first-child),
  .MuiGrid-root.text-left .MuiButtonGroup-groupedOutlinedHorizontal:not(:last-child) {
    flex: 0 0 47px;
    padding: 5px;
  }
  .MuiContainer-root .jss10 {
    box-sizing: border-box;
  }

</style>
</section>



<?php get_footer(); ?>
