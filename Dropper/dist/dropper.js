/**
 * Dropper
 * Compact drop menu (plain JS)
 * @author Paul Woods (http://github.com/woodscreative)
 * @version 1.0.0
 */
var Dropper = {};
/**
 * object
 * Configuration options
 */
Dropper.config = {
  // If true, when a dropper is opened close all
  collapseAllEnabled : true
};
/**
 * Initialise
 */
Dropper.init = function()
{
  // Iterate all dropper attributes and bind click events
  var el = document.querySelectorAll("[data-dropper]");
  for (i=0;i<el.length;i++) {
    el[i].onclick = function(e) {
      e.preventDefault();
      Dropper.toggle(this.parentElement);
    };
  };
};
/**
 * Toggle
 * @param element $el
 */
Dropper.toggle = function($el)
{
  if ($el.className === "dropper dropper--is-closed")
  {
    Dropper.open($el);
  } else {
    Dropper.close($el);
  }; 
};
/**
 * Open
 * @param element $el
 */
Dropper.open = function($el)
{
  // Close all
  if (this.config.collapseAllEnabled)
  {
    this.close();
  };
  $el.className = "dropper dropper--is-open";  
};
/**
 * Close
 * @param element $el
 */
Dropper.close = function($el)
{
  // If $el is not defined close all
  if (!$el) {
    var els = document.querySelectorAll(".dropper");
    for (i=0;i<els.length;i++) {
      Dropper.close(els[i]);
    };
    return;
  };
  $el.className = "dropper dropper--is-closed";    
};