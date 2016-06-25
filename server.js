//This will create the server and set it to listen on port 80.

var site_root = './site';  // Site root.
var port = 80; // The port to listen on.

var connect = require('connect');
var serveStatic = require('serve-static');
connect().use(serveStatic(document_root)).listen(port, function(){
    console.log('Server running on 8080...');
});
