console.log("app.js loaded");

require(['models/app'], function(App) {
	console.log("Inside the require block");

	var app = new AppModel();

	console.log(app);
});