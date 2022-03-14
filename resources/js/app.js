window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default;

require('bootstrap');
require('imagesloaded');

var jQueryBridget = require('jquery-bridget');
var Isotope = require('isotope-layout');
jQueryBridget( 'isotope', Isotope, $ );
