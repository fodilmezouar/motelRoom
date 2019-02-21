/*
Document: app-custom.js
Author: Rustheme
Description: Write your custom code here
*/

// Below is an example of function and its initialization
var AppCustom = function() {
	var showAppName = function() {

	};

	return {
		init: function() {
			showAppName();
		}
	}
}();

// Initialize AppCustom when page loads
jQuery( function() {
	AppCustom.init();
});
