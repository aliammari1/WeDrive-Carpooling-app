<?php
include('header.php');
?>
<title>WeDrive</title>
<script src="vote.js"></script>

<style>
  body {
    background-image: url('images/lahmar.png');
    background-repeat: repeat;




  }

  .post-options {
    width: 100%;
    text-align: right;
    margin-top: 01;
    padding: 1em 0;
  }

  .post-options a.options {
    clear: both;
    background: #eee;
    -moz-box-shadow: 0 1px 0 #fff inset, 0 1px 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    padding: 8px;
    font-size: .85em;
    text-transform: uppercase;
    margin: 0 0 0 px;
    cursor: pointer;
  }

  .post-body {
    margin-top: 10px;
    border: #cdcdcd 1px solid;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    margin-left: 50px;
  }

  .post-content {
    margin-top: 10px;
  }

  /* Generated using nucleoapp.com */
  /* --------------------------------

Icon colors

-------------------------------- */

  .icon {
    display: inline-block;
    /* icon primary color */
    color: #111111;
    height: 1em;
    width: 1em;
  }

  .icon use {
    /* icon secondary color - fill */
    fill: #7ea6f6;
  }

  .icon.icon-outline use {
    /* icon secondary color - stroke */
    stroke: #7ea6f6;
  }

  /* --------------------------------

Change icon size

-------------------------------- */

  .icon-xs {
    height: 0.5em;
    width: 0.5em;
  }

  .icon-sm {
    height: 0.8em;
    width: 0.8em;
  }

  .icon-lg {
    height: 1.6em;
    width: 1.6em;
  }

  .icon-xl {
    height: 2em;
    width: 2em;
  }

  /* -------------------------------- 

Align icon and text 

-------------------------------- */

  .icon-text-aligner {
    /* add this class to parent element that contains icon + text */
    display: flex;
    align-items: center;
  }

  .icon-text-aligner .icon {
    color: inherit;
    margin-right: 0.4em;
  }

  .icon-text-aligner .icon use {
    color: inherit;
    fill: currentColor;
  }

  .icon-text-aligner .icon.icon-outline use {
    stroke: currentColor;
  }

  /* -------------------------------- 

Icon reset values - used to enable color customizations

-------------------------------- */

  .icon {
    fill: currentColor;
    stroke: none;
  }

  .icon.icon-outline {
    fill: none;
    stroke: currentColor;
  }

  .icon use {
    stroke: none;
  }

  .icon.icon-outline use {
    fill: none;
  }

  /* -------------------------------- 

Stroke effects - Nucleo outline icons

- 16px icons -> up to 1px stroke (16px outline icons do not support stroke changes)
- 24px, 32px icons -> up to 2px stroke
- 48px, 64px icons -> up to 4px stroke

-------------------------------- */

  .icon-outline.icon-stroke-1 {
    stroke-width: 1px;
  }

  .icon-outline.icon-stroke-2 {
    stroke-width: 2px;
  }

  .icon-outline.icon-stroke-3 {
    stroke-width: 3px;
  }

  .icon-outline.icon-stroke-4 {
    stroke-width: 4px;
  }

  .icon-outline.icon-stroke-1 use,
  .icon-outline.icon-stroke-3 use {
    -webkit-transform: translateX(0.5px) translateY(0.5px);
    -moz-transform: translateX(0.5px) translateY(0.5px);
    -ms-transform: translateX(0.5px) translateY(0.5px);
    -o-transform: translateX(0.5px) translateY(0.5px);
    transform: translateX(0.5px) translateY(0.5px);
  }

  /*!

=========================================================
* Argon Dashboard 2 Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/

  /*! tailwindcss v3.1.6 | MIT License | https://tailwindcss.com

*/

  /*
1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
*/

  *,
  ::before,
  ::after {
    box-sizing: border-box;
    /* 1 */
    border-width: 0;
    /* 2 */
    border-style: solid;
    /* 2 */
    border-color: #e9ecef;
    /* 2 */
  }

  ::before,
  ::after {
    --tw-content: '';
  }

  /*
1. Use a consistent sensible line-height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
3. Use a more readable tab size.
4. Use the user's configured `sans` font-family by default.
*/

  html {
    line-height: 1.5;
    /* 1 */
    -webkit-text-size-adjust: 100%;
    /* 2 */
    -moz-tab-size: 4;
    /* 3 */
    -o-tab-size: 4;
    tab-size: 4;
    /* 3 */
    font-family: Open Sans;
    /* 4 */
  }

  /*
1. Remove the margin in all browsers.
2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
*/

  body {
    margin: 0;
    /* 1 */
    line-height: inherit;
    /* 2 */
  }

  /*
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
3. Ensure horizontal rules are visible by default.
*/

  hr {
    height: 0;
    /* 1 */
    color: inherit;
    /* 2 */
    border-top-width: 1px;
    /* 3 */
  }

  /*
Add the correct text decoration in Chrome, Edge, and Safari.
*/

  abbr:where([title]) {
    -webkit-text-decoration: underline dotted;
    text-decoration: underline dotted;
  }

  /*
Remove the default font size and weight for headings.
*/

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-size: inherit;
    font-weight: inherit;
  }

  /*
Reset links to optimize for opt-in styling instead of opt-out.
*/

  a {
    color: inherit;
    text-decoration: inherit;
  }

  /*
Add the correct font weight in Edge and Safari.
*/

  b,
  strong {
    font-weight: bolder;
  }

  /*
1. Use the user's configured `mono` font family by default.
2. Correct the odd `em` font sizing in all browsers.
*/

  code,
  kbd,
  samp,
  pre {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    /* 1 */
    font-size: 1em;
    /* 2 */
  }

  /*
Add the correct font size in all browsers.
*/

  small {
    font-size: 80%;
  }

  /*
Prevent `sub` and `sup` elements from affecting the line height in all browsers.
*/

  sub,
  sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline;
  }

  sub {
    bottom: -0.25em;
  }

  sup {
    top: -0.5em;
  }

  /*
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
3. Remove gaps between table borders by default.
*/

  table {
    text-indent: 0;
    /* 1 */
    border-color: inherit;
    /* 2 */
    border-collapse: collapse;
    /* 3 */
  }

  /*
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
3. Remove default padding in all browsers.
*/

  button,
  input,
  optgroup,
  select,
  textarea {
    font-family: inherit;
    /* 1 */
    font-size: 100%;
    /* 1 */
    font-weight: inherit;
    /* 1 */
    line-height: inherit;
    /* 1 */
    color: inherit;
    /* 1 */
    margin: 0;
    /* 2 */
    padding: 0;
    /* 3 */
  }

  /*
Remove the inheritance of text transform in Edge and Firefox.
*/

  button,
  select {
    text-transform: none;
  }

  /*
1. Correct the inability to style clickable types in iOS and Safari.
2. Remove default button styles.
*/

  button,
  [type='button'],
  [type='reset'],
  [type='submit'] {
    -webkit-appearance: button;
    /* 1 */
    background-color: transparent;
    /* 2 */
    background-image: none;
    /* 2 */
  }

  /*
Use the modern Firefox focus style for all focusable elements.
*/

  :-moz-focusring {
    outline: auto;
  }

  /*
Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
*/

  :-moz-ui-invalid {
    box-shadow: none;
  }

  /*
Add the correct vertical alignment in Chrome and Firefox.
*/

  progress {
    vertical-align: baseline;
  }

  /*
Correct the cursor style of increment and decrement buttons in Safari.
*/

  ::-webkit-inner-spin-button,
  ::-webkit-outer-spin-button {
    height: auto;
  }

  /*
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

  [type='search'] {
    -webkit-appearance: textfield;
    /* 1 */
    outline-offset: -2px;
    /* 2 */
  }

  /*
Remove the inner padding in Chrome and Safari on macOS.
*/

  ::-webkit-search-decoration {
    -webkit-appearance: none;
  }

  /*
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to `inherit` in Safari.
*/

  ::-webkit-file-upload-button {
    -webkit-appearance: button;
    /* 1 */
    font: inherit;
    /* 2 */
  }

  /*
Add the correct display in Chrome and Safari.
*/

  summary {
    display: list-item;
  }

  /*
Removes the default spacing and border for appropriate elements.
*/

  blockquote,
  dl,
  dd,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  hr,
  figure,
  p,
  pre {
    margin: 0;
  }

  fieldset {
    margin: 0;
    padding: 0;
  }

  legend {
    padding: 0;
  }

  ol,
  ul,
  menu {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  /*
Prevent resizing textareas horizontally by default.
*/

  textarea {
    resize: vertical;
  }

  /*
1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
2. Set the default placeholder color to the user's configured gray 400 color.
*/

  input::-moz-placeholder,
  textarea::-moz-placeholder {
    opacity: 1;
    /* 1 */
    color: #ced4da;
    /* 2 */
  }

  input::placeholder,
  textarea::placeholder {
    opacity: 1;
    /* 1 */
    color: #ced4da;
    /* 2 */
  }

  /*
Set the default cursor for buttons.
*/

  button,
  [role="button"] {
    cursor: pointer;
  }

  /*
Make sure disabled buttons don't get the pointer cursor.
*/

  :disabled {
    cursor: default;
  }

  /*
1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
   This can trigger a poorly considered lint error in some tools but is included by design.
*/

  img,
  svg,
  video,
  canvas,
  audio,
  iframe,
  embed,
  object {
    display: block;
    /* 1 */
    vertical-align: middle;
    /* 2 */
  }

  /*
Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
*/

  img,
  video {
    max-width: 100%;
    height: auto;
  }

  *,
  ::before,
  ::after {
    --tw-border-spacing-x: 0;
    --tw-border-spacing-y: 0;
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    --tw-scale-x: 1;
    --tw-scale-y: 1;
    --tw-pan-x: ;
    --tw-pan-y: ;
    --tw-pinch-zoom: ;
    --tw-scroll-snap-strictness: proximity;
    --tw-ordinal: ;
    --tw-slashed-zero: ;
    --tw-numeric-figure: ;
    --tw-numeric-spacing: ;
    --tw-numeric-fraction: ;
    --tw-ring-inset: ;
    --tw-ring-offset-width: 0px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: rgba(94, 228, 188, 0.5);
    --tw-ring-offset-shadow: 0 0 #0000;
    --tw-ring-shadow: 0 0 #0000;
    --tw-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    --tw-blur: ;
    --tw-brightness: ;
    --tw-contrast: ;
    --tw-grayscale: ;
    --tw-hue-rotate: ;
    --tw-invert: ;
    --tw-saturate: ;
    --tw-sepia: ;
    --tw-drop-shadow: ;
    --tw-backdrop-blur: ;
    --tw-backdrop-brightness: ;
    --tw-backdrop-contrast: ;
    --tw-backdrop-grayscale: ;
    --tw-backdrop-hue-rotate: ;
    --tw-backdrop-invert: ;
    --tw-backdrop-opacity: ;
    --tw-backdrop-saturate: ;
    --tw-backdrop-sepia: ;
  }

  ::-webkit-backdrop {
    --tw-border-spacing-x: 0;
    --tw-border-spacing-y: 0;
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    --tw-scale-x: 1;
    --tw-scale-y: 1;
    --tw-pan-x: ;
    --tw-pan-y: ;
    --tw-pinch-zoom: ;
    --tw-scroll-snap-strictness: proximity;
    --tw-ordinal: ;
    --tw-slashed-zero: ;
    --tw-numeric-figure: ;
    --tw-numeric-spacing: ;
    --tw-numeric-fraction: ;
    --tw-ring-inset: ;
    --tw-ring-offset-width: 0px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: rgb(94 114 228 / 0.5);
    --tw-ring-offset-shadow: 0 0 #0000;
    --tw-ring-shadow: 0 0 #0000;
    --tw-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    --tw-blur: ;
    --tw-brightness: ;
    --tw-contrast: ;
    --tw-grayscale: ;
    --tw-hue-rotate: ;
    --tw-invert: ;
    --tw-saturate: ;
    --tw-sepia: ;
    --tw-drop-shadow: ;
    --tw-backdrop-blur: ;
    --tw-backdrop-brightness: ;
    --tw-backdrop-contrast: ;
    --tw-backdrop-grayscale: ;
    --tw-backdrop-hue-rotate: ;
    --tw-backdrop-invert: ;
    --tw-backdrop-opacity: ;
    --tw-backdrop-saturate: ;
    --tw-backdrop-sepia: ;
  }

  ::backdrop {
    --tw-border-spacing-x: 0;
    --tw-border-spacing-y: 0;
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    --tw-scale-x: 1;
    --tw-scale-y: 1;
    --tw-pan-x: ;
    --tw-pan-y: ;
    --tw-pinch-zoom: ;
    --tw-scroll-snap-strictness: proximity;
    --tw-ordinal: ;
    --tw-slashed-zero: ;
    --tw-numeric-figure: ;
    --tw-numeric-spacing: ;
    --tw-numeric-fraction: ;
    --tw-ring-inset: ;
    --tw-ring-offset-width: 0px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: rgba(94, 228, 168, 0.5);
    --tw-ring-offset-shadow: 0 0 #0000;
    --tw-ring-shadow: 0 0 #0000;
    --tw-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    --tw-blur: ;
    --tw-brightness: ;
    --tw-contrast: ;
    --tw-grayscale: ;
    --tw-hue-rotate: ;
    --tw-invert: ;
    --tw-saturate: ;
    --tw-sepia: ;
    --tw-drop-shadow: ;
    --tw-backdrop-blur: ;
    --tw-backdrop-brightness: ;
    --tw-backdrop-contrast: ;
    --tw-backdrop-grayscale: ;
    --tw-backdrop-hue-rotate: ;
    --tw-backdrop-invert: ;
    --tw-backdrop-opacity: ;
    --tw-backdrop-saturate: ;
    --tw-backdrop-sepia: ;
  }

  .container {
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    padding-right: 1.5rem;
    padding-left: 1.5rem;
  }

  @media (min-width: 576px) {
    .container {
      max-width: 576px;
    }
  }

  @media (min-width: 768px) {
    .container {
      max-width: 768px;
    }
  }

  @media (min-width: 992px) {
    .container {
      max-width: 992px;
    }
  }

  @media (min-width: 1200px) {
    .container {
      max-width: 1200px;
    }
  }

  @media (min-width: 1320px) {
    .container {
      max-width: 1320px;
    }
  }

  a {
    letter-spacing: -0.025rem;
  }

  hr {
    margin: 1rem 0;
    border: 0;
    opacity: .25;
  }

  img {
    max-width: none;
  }

  label {
    display: inline-block;
  }

  p {
    line-height: 1.625;
    font-weight: 400;
    margin-bottom: 1rem;
  }

  small {
    font-size: .875em;
  }

  svg {
    display: inline;
  }

  table {
    border-collapse: inherit;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    margin-bottom: .5rem;
    color: #344767;
  }

  h1,
  h2,
  h3,
  h4 {
    letter-spacing: -0.05rem;
  }

  h1,
  h2,
  h3 {
    font-weight: 700;
  }

  h4,
  h5,
  h6 {
    font-weight: 600;
  }

  h1 {
    font-size: 3rem;
    line-height: 1.25;
  }

  h2 {
    font-size: 2.25rem;
    line-height: 1.3;
  }

  h3 {
    font-size: 1.875rem;
    line-height: 1.375;
  }

  h4 {
    font-size: 1.5rem;
    line-height: 1.375;
  }

  h5 {
    font-size: 1.25rem;
    line-height: 1.375;
  }

  h6 {
    font-size: 1rem;
    line-height: 1.625;
  }

  .pointer-events-none {
    pointer-events: none;
  }

  .visible {
    visibility: visible;
  }

  .invisible {
    visibility: hidden;
  }

  .fixed {
    position: fixed;
  }

  .absolute {
    position: absolute;
  }

  .relative {
    position: relative;
  }

  .sticky {
    position: -webkit-sticky;
    position: sticky;
  }

  .inset-y-0 {
    top: 0px;
    bottom: 0px;
  }

  .top-0 {
    top: 0px;
  }

  .right-0 {
    right: 0px;
  }

  .top-3\.5 {
    top: 0.875rem;
  }

  .top-3 {
    top: 0.75rem;
  }

  .left-0 {
    left: 0px;
  }

  .bottom-0 {
    bottom: 0px;
  }

  .right-\[15\%\] {
    right: 15%;
  }

  .top-0\.75 {
    top: 0.2rem;
  }

  .top-6 {
    top: 1.5rem;
  }

  .right-4 {
    right: 1rem;
  }

  .right-16 {
    right: 4rem;
  }

  .bottom-8 {
    bottom: 2rem;
  }

  .right-8 {
    right: 2rem;
  }

  .-right-90 {
    right: -22.5rem;
  }

  .left-auto {
    left: auto;
  }

  .top-auto {
    top: auto;
  }

  .top-31\/100 {
    top: 31%;
  }

  .-top-1\.5 {
    top: -0.375rem;
  }

  .-top-1 {
    top: -0.25rem;
  }

  .right-auto {
    right: auto;
  }

  .left-8 {
    left: 2rem;
  }

  .-left-90 {
    left: -22.5rem;
  }

  .top-\[1\%\] {
    top: 1%;
  }

  .z-990 {
    z-index: 990;
  }

  .z-50 {
    z-index: 50;
  }

  .z-20 {
    z-index: 20;
  }

  .z-10 {
    z-index: 10;
  }

  .z-sticky {
    z-index: 1020;
  }

  .z-30 {
    z-index: 30;
  }

  .z-100 {
    z-index: 100;
  }

  .z-0 {
    z-index: 0;
  }

  .z-110 {
    z-index: 110;
  }

  .float-right {
    float: right;
  }

  .float-left {
    float: left;
  }

  .clear-both {
    clear: both;
  }

  .m-0 {
    margin: 0px;
  }

  .m-6 {
    margin: 1.5rem;
  }

  .m-4 {
    margin: 1rem;
  }

  .my-4 {
    margin-top: 1rem;
    margin-bottom: 1rem;
  }

  .my-0 {
    margin-top: 0px;
    margin-bottom: 0px;
  }

  .mx-2 {
    margin-left: 0.5rem;
    margin-right: 0.5rem;
  }

  .mx-4 {
    margin-left: 1rem;
    margin-right: 1rem;
  }

  .mx-auto {
    margin-left: auto;
    margin-right: auto;
  }

  .mx-6 {
    margin-left: 1.5rem;
    margin-right: 1.5rem;
  }

  .my-auto {
    margin-top: auto;
    margin-bottom: auto;
  }

  .-mx-3 {
    margin-left: -0.75rem;
    margin-right: -0.75rem;
  }

  .mx-0 {
    margin-left: 0px;
    margin-right: 0px;
  }

  .my-1 {
    margin-top: 0.25rem;
    margin-bottom: 0.25rem;
  }

  .my-2 {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
  }

  .my-6 {
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
  }

  .my-56 {
    margin-top: 14rem;
    margin-bottom: 14rem;
  }

  .ml-1 {
    margin-left: 0.25rem;
  }

  .mt-0 {
    margin-top: 0px;
  }

  .mb-0 {
    margin-bottom: 0px;
  }

  .mt-0\.5 {
    margin-top: 0.125rem;
  }

  .mr-2 {
    margin-right: 0.5rem;
  }

  .mt-4 {
    margin-top: 1rem;
  }

  .ml-2 {
    margin-left: 0.5rem;
  }

  .mb-4 {
    margin-bottom: 1rem;
  }

  .mr-12 {
    margin-right: 3rem;
  }

  .mt-2 {
    margin-top: 0.5rem;
  }

  .-ml-px {
    margin-left: -1px;
  }

  .mr-4 {
    margin-right: 1rem;
  }

  .mb-0\.75 {
    margin-bottom: 0.2rem;
  }

  .mb-2 {
    margin-bottom: 0.5rem;
  }

  .mb-1 {
    margin-bottom: 0.25rem;
  }

  .mr-1 {
    margin-right: 0.25rem;
  }

  .mb-6 {
    margin-bottom: 1.5rem;
  }

  .mt-6 {
    margin-top: 1.5rem;
  }

  .ml-12 {
    margin-left: 3rem;
  }

  .ml-6 {
    margin-left: 1.5rem;
  }

  .mr-1\.25 {
    margin-right: 0.3125rem;
  }

  .ml-auto {
    margin-left: auto;
  }

  .mt-1 {
    margin-top: 0.25rem;
  }

  .mb-12 {
    margin-bottom: 3rem;
  }

  .mr-6 {
    margin-right: 1.5rem;
  }

  .-mt-56 {
    margin-top: -14rem;
  }

  .mt-60 {
    margin-top: 15rem;
  }

  .-mt-6 {
    margin-top: -1.5rem;
  }

  .-mr-px {
    margin-right: -1px;
  }

  .ml-0 {
    margin-left: 0px;
  }

  .mr-auto {
    margin-right: auto;
  }

  .ml-4 {
    margin-left: 1rem;
  }

  .mt-auto {
    margin-top: auto;
  }

  .mt-12 {
    margin-top: 3rem;
  }

  .-mt-0\.4 {
    margin-top: -0.1rem;
  }

  .-mt-0 {
    margin-top: -0px;
  }

  .-mr-34 {
    margin-right: -8.5rem;
  }

  .-mr-4 {
    margin-right: -1rem;
  }

  .mr-11 {
    margin-right: 2.75rem;
  }

  .mb-0\.5 {
    margin-bottom: 0.125rem;
  }

  .mt-1\.75 {
    margin-top: 0.4375rem;
  }

  .-ml-12 {
    margin-left: -3rem;
  }

  .-mt-48 {
    margin-top: -12rem;
  }

  .-ml-7 {
    margin-left: -1.75rem;
  }

  .-mt-2 {
    margin-top: -0.5rem;
  }

  .mb-8 {
    margin-bottom: 2rem;
  }

  .-ml-4 {
    margin-left: -1rem;
  }

  .mt-0\.75 {
    margin-top: 0.2rem;
  }

  .block {
    display: block;
  }

  .inline-block {
    display: inline-block;
  }

  .inline {
    display: inline;
  }

  .flex {
    display: flex;
  }

  .inline-flex {
    display: inline-flex;
  }

  .table {
    display: table;
  }

  .grid {
    display: grid;
  }

  .hidden {
    display: none;
  }

  .h-19 {
    height: 4.75rem;
  }

  .h-full {
    height: 100%;
  }

  .h-px {
    height: 1px;
  }

  .h-sidenav {
    height: calc(100vh - 360px);
  }

  .h-8 {
    height: 2rem;
  }

  .h-0\.5 {
    height: 0.125rem;
  }

  .h-0 {
    height: 0px;
  }

  .h-9 {
    height: 2.25rem;
  }

  .h-12 {
    height: 3rem;
  }

  .h-10 {
    height: 2.5rem;
  }

  .h-6\.5 {
    height: 1.625rem;
  }

  .h-6 {
    height: 1.5rem;
  }

  .h-5\.6 {
    height: 1.4rem;
  }

  .h-5 {
    height: 1.25rem;
  }

  .h-\[80vh\] {
    height: 80vh;
  }

  .h-16 {
    height: 4rem;
  }

  .h-2 {
    height: 0.5rem;
  }

  .h-auto {
    height: auto;
  }

  .h-0\.75 {
    height: 0.2rem;
  }

  .h-1\.5 {
    height: 0.375rem;
  }

  .h-1 {
    height: 0.25rem;
  }

  .h-4\.8 {
    height: 1.2rem;
  }

  .h-4 {
    height: 1rem;
  }

  .max-h-8 {
    max-height: 2rem;
  }

  .max-h-screen {
    max-height: 100vh;
  }

  .min-h-75 {
    min-height: 18.75rem;
  }

  .min-h-6 {
    min-height: 1.5rem;
  }

  .min-h-screen {
    min-height: 100vh;
  }

  .min-h-50-screen {
    min-height: 50vh;
  }

  .min-h-85-screen {
    min-height: 85vh;
  }

  .w-full {
    width: 100%;
  }

  .w-auto {
    width: auto;
  }

  .w-8 {
    width: 2rem;
  }

  .w-1\/2 {
    width: 50%;
  }

  .w-1\/100 {
    width: 1%;
  }

  .w-4\.5 {
    width: 1.125rem;
  }

  .w-4 {
    width: 1rem;
  }

  .w-9 {
    width: 2.25rem;
  }

  .w-2\/3 {
    width: 66.666667%;
  }

  .w-12 {
    width: 3rem;
  }

  .w-10 {
    width: 2.5rem;
  }

  .w-3\/10 {
    width: 30%;
  }

  .w-6\.5 {
    width: 1.625rem;
  }

  .w-6 {
    width: 1.5rem;
  }

  .w-90 {
    width: 22.5rem;
  }

  .w-5\.6 {
    width: 1.4rem;
  }

  .w-5 {
    width: 1.25rem;
  }

  .w-1\/5 {
    width: 20%;
  }

  .w-3\/5 {
    width: 60%;
  }

  .w-16 {
    width: 4rem;
  }

  .w-1\/10 {
    width: 10%;
  }

  .w-2 {
    width: 0.5rem;
  }

  .w-19 {
    width: 4.75rem;
  }

  .w-4\/12 {
    width: 33.333333%;
  }

  .w-1\/4 {
    width: 25%;
  }

  .w-3\/4 {
    width: 75%;
  }

  .w-9\/10 {
    width: 90%;
  }

  .w-7\/12 {
    width: 58.333333%;
  }

  .w-5\/12 {
    width: 41.666667%;
  }

  .w-30 {
    width: 7.5rem;
  }

  .w-2\/5 {
    width: 40%;
  }

  .w-5\.5 {
    width: 1.375rem;
  }

  .w-6\/12 {
    width: 50%;
  }

  .w-8\/12 {
    width: 66.666667%;
  }

  .w-3\/12 {
    width: 25%;
  }

  .w-4\.8 {
    width: 1.2rem;
  }

  .w-0 {
    width: 0px;
  }

  .w-4\/5 {
    width: 80%;
  }

  .min-w-0 {
    min-width: 0px;
  }

  .min-w-44 {
    min-width: 11rem;
  }

  .max-w-64 {
    max-width: 16rem;
  }

  .max-w-full {
    max-width: 100%;
  }

  .max-w-none {
    max-width: none;
  }

  .max-w-screen-2xl {
    max-width: 1320px;
  }

  .flex-auto {
    flex: 1 1 auto;
  }

  .flex-none {
    flex: none;
  }

  .flex-1 {
    flex: 1 1 0%;
  }

  .flex-0 {
    flex: 0 0 auto;
  }

  .flex-shrink-0 {
    flex-shrink: 0;
  }

  .shrink-0 {
    flex-shrink: 0;
  }

  .flex-grow {
    flex-grow: 1;
  }

  .grow {
    flex-grow: 1;
  }

  .basis-full {
    flex-basis: 100%;
  }

  .basis-1\/3 {
    flex-basis: 33.333333%;
  }

  .border-collapse {
    border-collapse: collapse;
  }

  .origin-top {
    transform-origin: top;
  }

  .origin-10-10 {
    transform-origin: 10% 10%;
  }

  .origin-10-90 {
    transform-origin: 10% 90%;
  }

  .-translate-x-full {
    --tw-translate-x: -100%;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .translate-x-full {
    --tw-translate-x: 100%;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .translate-x-1\/2 {
    --tw-translate-x: 50%;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .translate-x-0 {
    --tw-translate-x: 0px;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .-translate-x-\[5px\] {
    --tw-translate-x: -5px;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .translate-x-\[5px\] {
    --tw-translate-x: 5px;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .rotate-45 {
    --tw-rotate: 45deg;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .-rotate-45 {
    --tw-rotate: -45deg;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .transform {
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .cursor-pointer {
    cursor: pointer;
  }

  .select-none {
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  .resize {
    resize: both;
  }

  .list-none {
    list-style-type: none;
  }

  .appearance-none {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  }

  .flex-row {
    flex-direction: row;
  }

  .flex-col {
    flex-direction: column;
  }

  .flex-wrap {
    flex-wrap: wrap;
  }

  .items-start {
    align-items: flex-start;
  }

  .items-end {
    align-items: flex-end;
  }

  .items-center {
    align-items: center;
  }

  .items-stretch {
    align-items: stretch;
  }

  .justify-end {
    justify-content: flex-end;
  }

  .justify-center {
    justify-content: center;
  }

  .justify-between {
    justify-content: space-between;
  }

  .overflow-auto {
    overflow: auto;
  }

  .overflow-hidden {
    overflow: hidden;
  }

  .overflow-visible {
    overflow: visible;
  }

  .overflow-x-auto {
    overflow-x: auto;
  }

  .overflow-y-auto {
    overflow-y: auto;
  }

  .whitespace-nowrap {
    white-space: nowrap;
  }

  .break-words {
    overflow-wrap: break-word;
  }

  .rounded-2xl {
    border-radius: 1rem;
  }

  .rounded-lg {
    border-radius: 0.5rem;
  }

  .rounded-xl {
    border-radius: 0.75rem;
  }

  .rounded-sm {
    border-radius: 0.125rem;
  }

  .rounded-circle {
    border-radius: 50%;
  }

  .rounded-3\.5xl {
    border-radius: 1.875rem;
  }

  .rounded-3 {
    border-radius: 0.75rem;
  }

  .rounded-none {
    border-radius: 0px;
  }

  .rounded-10 {
    border-radius: 2.5rem;
  }

  .rounded {
    border-radius: 0.25rem;
  }

  .rounded-full {
    border-radius: 9999px;
  }

  .rounded-xs {
    border-radius: 0.0625rem;
  }

  .rounded-1\.4 {
    border-radius: 0.35rem;
  }

  .rounded-1 {
    border-radius: 0.25rem;
  }

  .rounded-1\.8 {
    border-radius: 0.45rem;
  }

  .rounded-t-2xl {
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
  }

  .rounded-t-4 {
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
  }

  .rounded-t-lg {
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
  }

  .rounded-b-lg {
    border-bottom-right-radius: 0.5rem;
    border-bottom-left-radius: 0.5rem;
  }

  .rounded-t-inherit {
    border-top-left-radius: inherit;
    border-top-right-radius: inherit;
  }

  .rounded-b-inherit {
    border-bottom-right-radius: inherit;
    border-bottom-left-radius: inherit;
  }

  .rounded-b-2xl {
    border-bottom-right-radius: 1rem;
    border-bottom-left-radius: 1rem;
  }

  .rounded-tr-none {
    border-top-right-radius: 0px;
  }

  .rounded-br-none {
    border-bottom-right-radius: 0px;
  }

  .rounded-tl-none {
    border-top-left-radius: 0px;
  }

  .rounded-bl-none {
    border-bottom-left-radius: 0px;
  }

  .border-0 {
    border-width: 0px;
  }

  .border {
    border-width: 1px;
  }

  .border-2 {
    border-width: 2px;
  }

  .border-r-0 {
    border-right-width: 0px;
  }

  .border-b-0 {
    border-bottom-width: 0px;
  }

  .border-b {
    border-bottom-width: 1px;
  }

  .border-t-0 {
    border-top-width: 0px;
  }

  .border-l-0 {
    border-left-width: 0px;
  }

  .border-t {
    border-top-width: 1px;
  }

  .border-solid {
    border-style: solid;
  }

  .border-none {
    border-style: none;
  }

  .border-transparent {
    border-color: transparent;
  }

  .border-gray-300 {
    --tw-border-opacity: 1;
    border-color: rgb(210 214 218 / var(--tw-border-opacity));
  }

  /*background here 2*/
  .border-blue-500 {
    --tw-border-opacity: 1;
    border-color: rgb(74 139 96/ var(--tw-border-opacity));
  }

  .border-black\/12\.5 {
    border-color: rgb(0 0 0 / 0.125);
  }

  .border-gray-200 {
    --tw-border-opacity: 1;
    border-color: rgb(233 236 239 / var(--tw-border-opacity));
  }

  .border-slate-700 {
    --tw-border-opacity: 1;
    border-color: rgb(52 71 103 / var(--tw-border-opacity));
  }

  .border-white {
    --tw-border-opacity: 1;
    border-color: rgb(255 255 255 / var(--tw-border-opacity));
  }

  .border-slate-100 {
    --tw-border-opacity: 1;
    border-color: rgb(222 226 230 / var(--tw-border-opacity));
  }

  .border-red-600 {
    --tw-border-opacity: 1;
    border-color: rgb(245 54 92 / var(--tw-border-opacity));
  }

  .border-emerald-500 {
    --tw-border-opacity: 1;
    border-color: rgb(45 206 137 / var(--tw-border-opacity));
  }

  .border-white\/75 {
    border-color: rgb(255 255 255 / 0.75);
  }

  .border-slate-200 {
    --tw-border-opacity: 1;
    border-color: rgb(203 211 218 / var(--tw-border-opacity));
  }

  .border-b-transparent {
    border-bottom-color: transparent;
  }

  .border-b-gray-200 {
    --tw-border-opacity: 1;
    border-bottom-color: rgb(233 236 239 / var(--tw-border-opacity));
  }

  .bg-gray-50 {
    --tw-bg-opacity: 1;
    background-color: rgb(248 249 250 / var(--tw-bg-opacity));
  }

  /*background here color*/
  .bg-blue-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(74 139 96 / var(--tw-bg-opacity));
  }

  .bg-white {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
  }

  .bg-transparent {
    background-color: transparent;
  }

  .bg-blue-500\/13 {
    background-color: rgba(210, 228, 94, 0.13);
  }

  .bg-gray-500\/30 {
    background-color: rgb(173 181 189 / 0.3);
  }

  .bg-cyan-500\/30 {
    background-color: rgba(17, 239, 172, 0.3);
  }

  .bg-emerald-500\/30 {
    background-color: rgb(45 206 137 / 0.3);
  }

  .bg-orange-500\/30 {
    background-color: rgb(251 99 64 / 0.3);
  }

  .bg-red-500\/30 {
    background-color: rgb(245 57 57 / 0.3);
  }

  .bg-slate-700 {
    --tw-bg-opacity: 1;
    background-color: rgb(52 71 103 / var(--tw-bg-opacity));
  }

  .bg-white\/80 {
    background-color: rgb(255 255 255 / 0.8);
  }

  .bg-slate-800\/10 {
    background-color: rgb(58 65 111 / 0.1);
  }

  .bg-black {
    --tw-bg-opacity: 1;
    background-color: rgb(0 0 0 / var(--tw-bg-opacity));
  }

  .bg-inherit {
    background-color: inherit;
  }

  .bg-slate-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(103 116 142 / var(--tw-bg-opacity));
  }

  .bg-white\/10 {
    background-color: rgb(255 255 255 / 0.1);
  }

  .bg-cyan-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(17 205 239 / var(--tw-bg-opacity));
  }

  .bg-gray-200 {
    --tw-bg-opacity: 1;
    background-color: rgb(233 236 239 / var(--tw-bg-opacity));
  }

  .bg-gray-600 {
    --tw-bg-opacity: 1;
    background-color: rgb(108 117 125 / var(--tw-bg-opacity));
  }

  .bg-zinc-700\/10 {
    background-color: rgb(33 37 41 / 0.1);
  }

  .bg-slate-850 {
    --tw-bg-opacity: 1;
    background-color: rgb(17 28 68 / var(--tw-bg-opacity));
  }

  .bg-\[hsla\(0\2c 0\%\2c 100\%\2c 0\.8\)\] {
    background-color: hsla(0, 0%, 100%, 0.8);
  }

  .bg-gradient-to-r {
    background-image: linear-gradient(to right, var(--tw-gradient-stops));
  }

  .bg-gradient-to-tl {
    background-image: linear-gradient(to top left, var(--tw-gradient-stops));
  }

  .bg-none {
    background-image: none;
  }

  .bg-\[url\(\'https\:\/\/raw\.githubusercontent\.com\/creativetimofficial\/public-assets\/master\/argon-dashboard-pro\/assets\/img\/profile-layout-header\.jpg\'\)\] {
    background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg');
  }

  .bg-\[url\(\'https\:\/\/raw\.githubusercontent\.com\/creativetimofficial\/public-assets\/master\/argon-dashboard-pro\/assets\/img\/signin-ill\.jpg\'\)\] {
    background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
  }

  .bg-\[url\(\'https\:\/\/raw\.githubusercontent\.com\/creativetimofficial\/public-assets\/master\/argon-dashboard-pro\/assets\/img\/signup-cover\.jpg\'\)\] {
    background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg');
  }

  .from-transparent {
    --tw-gradient-from: transparent;
    --tw-gradient-to: rgb(0 0 0 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .from-zinc-800 {
    --tw-gradient-from: #212229;
    --tw-gradient-to: rgb(33 34 41 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .from-slate-600 {
    --tw-gradient-from: #627594;
    --tw-gradient-to: rgb(98 117 148 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .from-blue-500 {
    --tw-gradient-from: #5e72e4;
    --tw-gradient-to: rgb(94 114 228 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .from-red-600 {
    --tw-gradient-from: #f5365c;
    --tw-gradient-to: rgb(245 54 92 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .from-emerald-500 {
    --tw-gradient-from: #2dce89;
    --tw-gradient-to: rgb(45 206 137 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .from-orange-500 {
    --tw-gradient-from: #fb6340;
    --tw-gradient-to: rgb(251 99 64 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .from-blue-700 {
    --tw-gradient-from: #1171ef;
    --tw-gradient-to: rgb(17 113 239 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .from-green-600 {
    --tw-gradient-from: #17ad37;
    --tw-gradient-to: rgb(23 173 55 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .from-gray-400 {
    --tw-gradient-from: #ced4da;
    --tw-gradient-to: rgb(206 212 218 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .via-black\/40 {
    --tw-gradient-to: rgb(0 0 0 / 0);
    --tw-gradient-stops: var(--tw-gradient-from), rgb(0 0 0 / 0.4), var(--tw-gradient-to);
  }

  .to-transparent {
    --tw-gradient-to: transparent;
  }

  .to-zinc-700 {
    --tw-gradient-to: #212529;
  }

  .to-slate-300 {
    --tw-gradient-to: #a8b8d8;
  }

  .to-violet-500 {
    --tw-gradient-to: #825ee4;
  }

  .to-orange-600 {
    --tw-gradient-to: #f56036;
  }

  .to-teal-400 {
    --tw-gradient-to: #2dcecc;
  }

  .to-yellow-500 {
    --tw-gradient-to: #fbb140;
  }

  .to-cyan-500 {
    --tw-gradient-to: #11cdef;
  }

  .to-lime-400 {
    --tw-gradient-to: #98ec2d;
  }

  .to-gray-100 {
    --tw-gradient-to: #ebeff4;
  }

  .bg-150 {
    background-size: 150%;
  }

  .bg-contain {
    background-size: contain;
  }

  .bg-cover {
    background-size: cover;
  }

  .bg-clip-border {
    background-clip: border-box;
  }

  .bg-clip-padding {
    background-clip: padding-box;
  }

  .bg-clip-text {
    -webkit-background-clip: text;
    background-clip: text;
  }

  .bg-center {
    background-position: center;
  }

  .bg-x-25 {
    background-position: 25% 0;
  }

  .bg-left {
    background-position: left;
  }

  .bg-y-50 {
    background-position: 0 50%;
  }

  .bg-right {
    background-position: right;
  }

  .bg-top {
    background-position: top;
  }

  .bg-no-repeat {
    background-repeat: no-repeat;
  }

  .fill-current {
    fill: currentColor;
  }

  .fill-transparent {
    fill: transparent;
  }

  .stroke-0 {
    stroke-width: 0;
  }

  .object-cover {
    -o-object-fit: cover;
    object-fit: cover;
  }

  .p-0 {
    padding: 0px;
  }

  .p-4 {
    padding: 1rem;
  }

  .p-6 {
    padding: 1.5rem;
  }

  .p-2 {
    padding: 0.5rem;
  }

  .p-1\.2 {
    padding: 0.3rem;
  }

  .p-1 {
    padding: 0.25rem;
  }

  .p-3 {
    padding: 0.75rem;
  }

  .px-8 {
    padding-left: 2rem;
    padding-right: 2rem;
  }

  .py-6 {
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
  }

  .py-2\.7 {
    padding-top: 0.675rem;
    padding-bottom: 0.675rem;
  }

  .px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  .py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }

  .px-0 {
    padding-left: 0px;
    padding-right: 0px;
  }

  .py-1 {
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
  }

  .px-2\.5 {
    padding-left: 0.625rem;
    padding-right: 0.625rem;
  }

  .px-2 {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }

  .py-4 {
    padding-top: 1rem;
    padding-bottom: 1rem;
  }

  .py-1\.2 {
    padding-top: 0.3rem;
    padding-bottom: 0.3rem;
  }

  .px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
  }

  .px-3 {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
  }

  .py-2\.2 {
    padding-top: 0.55rem;
    padding-bottom: 0.55rem;
  }

  .py-2\.5 {
    padding-top: 0.625rem;
    padding-bottom: 0.625rem;
  }

  .px-5 {
    padding-left: 1.25rem;
    padding-right: 1.25rem;
  }

  .px-16 {
    padding-left: 4rem;
    padding-right: 4rem;
  }

  .py-3\.5 {
    padding-top: 0.875rem;
    padding-bottom: 0.875rem;
  }

  .py-3 {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
  }

  .py-1\.75 {
    padding-top: 0.4375rem;
    padding-bottom: 0.4375rem;
  }

  .px-1 {
    padding-left: 0.25rem;
    padding-right: 0.25rem;
  }

  .px-24 {
    padding-left: 6rem;
    padding-right: 6rem;
  }

  .py-12 {
    padding-top: 3rem;
    padding-bottom: 3rem;
  }

  .py-0 {
    padding-top: 0px;
    padding-bottom: 0px;
  }

  .py-1\.4 {
    padding-top: 0.35rem;
    padding-bottom: 0.35rem;
  }

  .pl-0 {
    padding-left: 0px;
  }

  .pl-6 {
    padding-left: 1.5rem;
  }

  .pt-0 {
    padding-top: 0px;
  }

  .pt-1 {
    padding-top: 0.25rem;
  }

  .pl-2 {
    padding-left: 0.5rem;
  }

  .pl-9 {
    padding-left: 2.25rem;
  }

  .pr-3 {
    padding-right: 0.75rem;
  }

  .pl-4 {
    padding-left: 1rem;
  }

  .pr-2 {
    padding-right: 0.5rem;
  }

  .pt-4 {
    padding-top: 1rem;
  }

  .pb-0 {
    padding-bottom: 0px;
  }

  .pt-5 {
    padding-top: 1.25rem;
  }

  .pb-5 {
    padding-bottom: 1.25rem;
  }

  .pr-4 {
    padding-right: 1rem;
  }

  .pb-1 {
    padding-bottom: 0.25rem;
  }

  .pr-0 {
    padding-right: 0px;
  }

  .pb-2 {
    padding-bottom: 0.5rem;
  }

  .pt-6 {
    padding-top: 1.5rem;
  }

  .pb-6 {
    padding-bottom: 1.5rem;
  }

  .pr-6 {
    padding-right: 1.5rem;
  }

  .pr-9 {
    padding-right: 2.25rem;
  }

  .pr-10 {
    padding-right: 2.5rem;
  }

  .pt-2 {
    padding-top: 0.5rem;
  }

  .pr-1 {
    padding-right: 0.25rem;
  }

  .pl-3 {
    padding-left: 0.75rem;
  }

  .pt-1\.4 {
    padding-top: 0.35rem;
  }

  .pl-12 {
    padding-left: 3rem;
  }

  .pt-12 {
    padding-top: 3rem;
  }

  .pb-56 {
    padding-bottom: 14rem;
  }

  .pl-7 {
    padding-left: 1.75rem;
  }

  .pt-48 {
    padding-top: 12rem;
  }

  .text-left {
    text-align: left;
  }

  .text-center {
    text-align: center;
  }

  .text-right {
    text-align: right;
  }

  .text-start {
    text-align: start;
  }

  .align-baseline {
    vertical-align: baseline;
  }

  .align-top {
    vertical-align: top;
  }

  .align-middle {
    vertical-align: middle;
  }

  .align-bottom {
    vertical-align: bottom;
  }

  .font-sans {
    font-family: Open Sans;
  }

  .text-base {
    font-size: 1rem;
    line-height: 1.5rem;
  }

  .text-sm {
    font-size: 0.875rem;
    line-height: 1.5rem;
  }

  .text-xs {
    font-size: 0.75rem;
    line-height: 1rem;
  }

  .text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem;
  }

  .text-xxs {
    font-size: 0.65rem;
    line-height: 1rem;
  }

  .text-xl {
    font-size: 1.25rem;
    line-height: 1.75rem;
  }

  .text-3xs {
    font-size: 0.5rem;
    line-height: 1rem;
  }

  .text-2\.8 {
    font-size: 0.7rem;
  }

  .text-2 {
    font-size: 0.5rem;
  }

  .text-banner-calculate {
    font-size: calc(1.625rem+4.5vw);
  }

  .font-normal {
    font-weight: 400;
  }

  .font-semibold {
    font-weight: 600;
  }

  .font-bold {
    font-weight: 700;
  }

  .font-light {
    font-weight: 300;
  }

  .uppercase {
    text-transform: uppercase;
  }

  .capitalize {
    text-transform: capitalize;
  }

  .leading-default {
    line-height: 1.6;
  }

  .leading-normal {
    line-height: 1.5;
  }

  .leading-tight {
    line-height: 1.25;
  }

  .leading-5\.6 {
    line-height: 1.4rem;
  }

  .leading-5 {
    line-height: 1.25rem;
  }

  .leading-pro {
    line-height: 1.4;
  }

  .leading-none {
    line-height: 1;
  }

  .leading-relaxed {
    line-height: 1.625;
  }

  .leading-tighter {
    line-height: 1.2;
  }

  .tracking-tight-rem {
    letter-spacing: -0.025rem;
  }

  .tracking-normal {
    letter-spacing: 0em;
  }

  .tracking-none {
    letter-spacing: 0;
  }

  .tracking-tight {
    letter-spacing: -0.025em;
  }

  .text-slate-500 {
    --tw-text-opacity: 1;
    color: rgb(103 116 142 / var(--tw-text-opacity));
  }

  .text-slate-400 {
    --tw-text-opacity: 1;
    color: rgb(131 146 171 / var(--tw-text-opacity));
  }

  .text-slate-700 {
    --tw-text-opacity: 1;
    color: rgb(52 71 103 / var(--tw-text-opacity));
  }

  .text-blue-500 {
    --tw-text-opacity: 1;
    color: rgb(94 114 228 / var(--tw-text-opacity));
  }

  .text-orange-500 {
    --tw-text-opacity: 1;
    color: rgb(251 99 64 / var(--tw-text-opacity));
  }

  .text-emerald-500 {
    --tw-text-opacity: 1;
    color: rgb(45 206 137 / var(--tw-text-opacity));
  }

  .text-cyan-500 {
    --tw-text-opacity: 1;
    color: rgb(17 205 239 / var(--tw-text-opacity));
  }

  .text-red-600 {
    --tw-text-opacity: 1;
    color: rgb(245 54 92 / var(--tw-text-opacity));
  }

  .text-gray-800 {
    --tw-text-opacity: 1;
    color: rgb(37 47 64 / var(--tw-text-opacity));
  }

  .text-red-500 {
    --tw-text-opacity: 1;
    color: rgb(245 57 57 / var(--tw-text-opacity));
  }

  .text-white {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
  }

  .text-gray-700 {
    --tw-text-opacity: 1;
    color: rgb(73 80 87 / var(--tw-text-opacity));
  }

  .text-black {
    --tw-text-opacity: 1;
    color: rgb(0 0 0 / var(--tw-text-opacity));
  }

  .text-inherit {
    color: inherit;
  }

  .text-transparent {
    color: transparent;
  }

  .text-neutral-900 {
    --tw-text-opacity: 1;
    color: rgb(17 17 17 / var(--tw-text-opacity));
  }

  .text-slate-800 {
    --tw-text-opacity: 1;
    color: rgb(58 65 111 / var(--tw-text-opacity));
  }

  .text-gray-200 {
    --tw-text-opacity: 1;
    color: rgb(233 236 239 / var(--tw-text-opacity));
  }

  .underline {
    -webkit-text-decoration-line: underline;
    text-decoration-line: underline;
  }

  .antialiased {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  .opacity-50 {
    opacity: 0.5;
  }

  .opacity-100 {
    opacity: 1;
  }

  .opacity-60 {
    opacity: 0.6;
  }

  .opacity-0 {
    opacity: 0;
  }

  .opacity-80 {
    opacity: 0.8;
  }

  .opacity-25 {
    opacity: 0.25;
  }

  .opacity-70 {
    opacity: 0.7;
  }

  .shadow-xl {
    --tw-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15);
    --tw-shadow-colored: 0 0 2rem 0 var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .shadow-none {
    --tw-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .shadow-md {
    --tw-shadow: 0 4px 6px rgba(50, 50, 93, .1), 0 1px 3px rgba(0, 0, 0, .08);
    --tw-shadow-colored: 0 4px 6px var(--tw-shadow-color), 0 1px 3px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .shadow-sm {
    --tw-shadow: 0 .25rem .375rem -.0625rem hsla(0, 0%, 8%, .12), 0 .125rem .25rem -.0625rem hsla(0, 0%, 8%, .07);
    --tw-shadow-colored: 0 .25rem .375rem -.0625rem var(--tw-shadow-color), 0 .125rem .25rem -.0625rem var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .shadow-lg {
    --tw-shadow: 0 2px 12px 0 rgba(0, 0, 0, .16);
    --tw-shadow-colored: 0 2px 12px 0 var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .shadow-3xl {
    --tw-shadow: 0 8px 26px -4px hsla(0, 0%, 8%, .15), 0 8px 9px -5px hsla(0, 0%, 8%, .06);
    --tw-shadow-colored: 0 8px 26px -4px var(--tw-shadow-color), 0 8px 9px -5px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .shadow-2xl {
    --tw-shadow: 0 .3125rem .625rem 0 rgba(0, 0, 0, .12);
    --tw-shadow-colored: 0 .3125rem .625rem 0 var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .shadow-blur {
    --tw-shadow: inset 0 0 1px 1px hsla(0, 0%, 100%, .9), 0 20px 27px 0 rgba(0, 0, 0, .05);
    --tw-shadow-colored: inset 0 0 1px 1px var(--tw-shadow-color), 0 20px 27px 0 var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .shadow-transparent {
    --tw-shadow-color: transparent;
    --tw-shadow: var(--tw-shadow-colored);
  }

  .outline-none {
    outline: 2px solid transparent;
    outline-offset: 2px;
  }

  .blur {
    --tw-blur: blur(8px);
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
  }

  .filter {
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
  }

  .backdrop-blur-2xl {
    --tw-backdrop-blur: blur(30px);
    -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
    backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
  }

  .backdrop-saturate-200 {
    --tw-backdrop-saturate: saturate(2);
    -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
    backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
  }

  .transition-transform {
    transition-property: transform;
    transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
    transition-duration: 150ms;
  }

  .transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
    transition-duration: 150ms;
  }

  .transition-colors {
    transition-property: color, background-color, border-color, fill, stroke, -webkit-text-decoration-color;
    transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
    transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;
    transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
    transition-duration: 150ms;
  }

  .transition {
    transition-property: color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
    transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
    transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
    transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
    transition-duration: 150ms;
  }

  .duration-200 {
    transition-duration: 200ms;
  }

  .duration-300 {
    transition-duration: 300ms;
  }

  .duration-250 {
    transition-duration: 250ms;
  }

  .duration-500 {
    transition-duration: 500ms;
  }

  .duration-600 {
    transition-duration: 600ms;
  }

  .duration-350 {
    transition-duration: 350ms;
  }

  .ease-in {
    transition-timing-function: cubic-bezier(0.42, 0, 1, 1);
  }

  .ease-in-out {
    transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
  }

  .ease-bounce {
    transition-timing-function: cubic-bezier(0.34, 1.61, 0.7, 1.3);
  }

  .ease-out {
    transition-timing-function: cubic-bezier(0, 0, 0.58, 1);
  }

  .transform3d {
    transform: perspective(999px) rotateX(0deg) translateZ(0);
  }

  .transform-dropdown {
    transform: perspective(999px) rotateX(-10deg) translateZ(0) translate3d(0, 37px, 0);
  }

  .transform-dropdown-show {
    transform: perspective(999px) rotateX(0deg) translateZ(0) translate3d(0, 37px, 5px);
  }

  .flex-wrap-inherit {
    flex-wrap: inherit;
  }

  .placeholder\:text-gray-500::-moz-placeholder {
    --tw-text-opacity: 1;
    color: rgb(173 181 189 / var(--tw-text-opacity));
  }

  .placeholder\:text-gray-500::placeholder {
    --tw-text-opacity: 1;
    color: rgb(173 181 189 / var(--tw-text-opacity));
  }

  .before\:visible::before {
    content: var(--tw-content);
    visibility: visible;
  }

  .before\:absolute::before {
    content: var(--tw-content);
    position: absolute;
  }

  .before\:right-2::before {
    content: var(--tw-content);
    right: 0.5rem;
  }

  .before\:left-auto::before {
    content: var(--tw-content);
    left: auto;
  }

  .before\:top-0::before {
    content: var(--tw-content);
    top: 0px;
  }

  .before\:right-auto::before {
    content: var(--tw-content);
    right: auto;
  }

  .before\:left-2::before {
    content: var(--tw-content);
    left: 0.5rem;
  }

  .before\:left-7::before {
    content: var(--tw-content);
    left: 1.75rem;
  }

  .before\:right-4::before {
    content: var(--tw-content);
    right: 1rem;
  }

  .before\:-top-5::before {
    content: var(--tw-content);
    top: -1.25rem;
  }

  .before\:z-50::before {
    content: var(--tw-content);
    z-index: 50;
  }

  .before\:z-40::before {
    content: var(--tw-content);
    z-index: 40;
  }

  .before\:float-right::before {
    content: var(--tw-content);
    float: right;
  }

  .before\:float-left::before {
    content: var(--tw-content);
    float: left;
  }

  .before\:inline-block::before {
    content: var(--tw-content);
    display: inline-block;
  }

  .before\:h-2::before {
    content: var(--tw-content);
    height: 0.5rem;
  }

  .before\:h-full::before {
    content: var(--tw-content);
    height: 100%;
  }

  .before\:w-2::before {
    content: var(--tw-content);
    width: 0.5rem;
  }

  .before\:rotate-45::before {
    content: var(--tw-content);
    --tw-rotate: 45deg;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .before\:border-l-2::before {
    content: var(--tw-content);
    border-left-width: 2px;
  }

  .before\:border-l-slate-100::before {
    content: var(--tw-content);
    --tw-border-opacity: 1;
    border-left-color: rgb(222 226 230 / var(--tw-border-opacity));
  }

  .before\:bg-inherit::before {
    content: var(--tw-content);
    background-color: inherit;
  }

  .before\:pr-2::before {
    content: var(--tw-content);
    padding-right: 0.5rem;
  }

  .before\:pl-2::before {
    content: var(--tw-content);
    padding-left: 0.5rem;
  }

  .before\:font-awesome::before {
    content: var(--tw-content);
    font-family: FontAwesome;
  }

  .before\:text-5\.5::before {
    content: var(--tw-content);
    font-size: 1.375rem;
  }

  .before\:text-5::before {
    content: var(--tw-content);
    font-size: 1.25rem;
  }

  .before\:font-normal::before {
    content: var(--tw-content);
    font-weight: 400;
  }

  .before\:leading-default::before {
    content: var(--tw-content);
    line-height: 1.6;
  }

  .before\:text-white::before {
    content: var(--tw-content);
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
  }

  .before\:text-gray-600::before {
    content: var(--tw-content);
    --tw-text-opacity: 1;
    color: rgb(108 117 125 / var(--tw-text-opacity));
  }

  .before\:antialiased::before {
    content: var(--tw-content);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  .before\:transition-all::before {
    content: var(--tw-content);
    transition-property: all;
    transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
    transition-duration: 150ms;
  }

  .before\:duration-350::before {
    content: var(--tw-content);
    transition-duration: 350ms;
  }

  .before\:content-\[\'\/\'\]::before {
    --tw-content: '/';
    content: var(--tw-content);
  }

  .before\:content-\[\'\\f0d8\'\]::before {
    --tw-content: '\f0d8';
    content: var(--tw-content);
  }



  .dark .dark\:text-white\/80 {
    color: rgb(255 255 255 / 0.8);
  }

  .dark .dark\:text-white\/60 {
    color: rgb(255 255 255 / 0.6);
  }

  .dark .dark\:opacity-80 {
    opacity: 0.8;
  }

  .dark .dark\:opacity-60 {
    opacity: 0.6;
  }

  .dark .dark\:opacity-65 {
    opacity: 0.65;
  }

  .dark .dark\:shadow-none {
    --tw-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .dark .dark\:shadow-dark-xl {
    --tw-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
    --tw-shadow-colored: 0 2px 2px 0 var(--tw-shadow-color), 0 3px 1px -2px var(--tw-shadow-color), 0 1px 5px 0 var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .dark .dark\:shadow-dark-blur {
    --tw-shadow: inset 0 0 1px 1px hsla(0, 0%, 100%, .4), 0 20px 27px 0 rgba(0, 0, 0, .05);
    --tw-shadow-colored: inset 0 0 1px 1px var(--tw-shadow-color), 0 20px 27px 0 var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  }

  .dark .dark\:backdrop-blur-2xl {
    --tw-backdrop-blur: blur(30px);
    -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
    backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
  }

  .dark .dark\:backdrop-saturate-200 {
    --tw-backdrop-saturate: saturate(2);
    -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
    backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
  }

  .dark .dark\:placeholder\:text-white\/80::-moz-placeholder {
    color: rgb(255 255 255 / 0.8);
  }

  .dark .dark\:placeholder\:text-white\/80::placeholder {
    color: rgb(255 255 255 / 0.8);
  }

  .dark .dark\:before\:text-white::before {
    content: var(--tw-content);
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
  }

  .dark .dark\:hover\:bg-slate-900:hover {
    --tw-bg-opacity: 1;
    background-color: rgb(5 17 57 / var(--tw-bg-opacity));
  }

  @media (min-width: 576px) {
    .sm\:my-auto {
      margin-top: auto;
      margin-bottom: auto;
    }

    .sm\:my-6 {
      margin-top: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .sm\:mr-16 {
      margin-right: 4rem;
    }

    .sm\:mt-0 {
      margin-top: 0px;
    }

    .sm\:mr-6 {
      margin-right: 1.5rem;
    }

  }
</style>


<div class="container">
  <h2>Like and Dislike System </h2>
  <div class="row" id="post-list">
    <?php
    require_once('Posts.php');
    $posts = new Posts();
    $postsData = $posts->getPosts();
    foreach ($postsData as $post) {
    ?>
      <div class="col-sm-4 col-lg-4 col-md-4 post-body">
        <div class="post-content"><?php echo isset($post['post_id']) ? $post['post_id'] : ''; ?></div>
        <div class="post-content"><?php echo isset($post['message']) ? $post['message'] : ''; ?></div>
        <div class="post-options pull-right">
          <a class="options" onclick="vote(<?= isset($post['comment_id']) ? $post['comment_id'] : '';  ?>)" data-vote-type="1" id="post_note_up_<?php echo isset($post['comment_id']) ? $post['comment_id'] : ''; ?>"><i class="glyphicon glyphicon-thumbs-up" data-original-title="Like this post"></i></a>
          <span class="counter" id="note_up_count_<?php echo isset($post['comment_id']) ? $post['comment_id'] : ''; ?>">&nbsp;&nbsp;<?php echo isset($post['note_up']) ? $post['note_up'] : ''; ?></span>&nbsp;&nbsp;&nbsp;
          <a class="options" data-vote-type="0" id="post_note_down_<?php echo isset($post['comment_id']) ? $post['comment_id'] : ''; ?>"><i class="glyphicon glyphicon-thumbs-down" data-original-title="Dislike this post"></i></a>
          <span class="counter" id="note_down_count_<?php echo isset($post['comment_id']) ? $post['comment_id'] : ''; ?>">&nbsp;&nbsp;<?php echo isset($post['note_down']) ? $post['note_down'] : ''; ?></span>
        </div>
      </div>
    <?php } ?>
  </div>
  <div style="margin:50px 0px 0px 0px;">
    <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://localhost/gestionavis/back/view/page.php" title="">Back to home</a>
  </div>
</div>

<script>
  function vote(comment_id) {
    fetch("vote.php?comment_id=" + comment_id)
      .then(response => response.text())
      .then(data => {
        console.log(data);
      })
  }
</script>