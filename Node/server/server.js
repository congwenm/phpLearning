var http = require('http');
var fs = require('fs');

console.log('starting');

var config = JSON.parse(fs.readFileSync('../fileIO/config.json'))
/*var host = "127.0.0.1";
var port = 1337;*/
var host = config.host, 
	port = config.port;

var server = http.createServer(function(request, response){
	console.log('Received request: ' + request.url);

	fs.readFile('./' + request.url, function(error, data){ //read file
		fs.writeFileSync('./request.json', request);
		fs.writeFileSync('./response.json', response);
		if (error){
			response.writeHead(404, {"Content-type": "text/plain"});
			response.end("Sorry the page was not found");
		} else{
			response.writeHead(200, {"Content-type": "text/html"})
			response.end(data);
		}
	});


	//Sample response
	/*response.writeHead(200, {
		"Content-type": "text/plain"
	});
	// resposne.write(); //uneeded
	response.end('Hello World')*/
});

server.listen(port, host, function(){
	console.log('Server is Listening' + host + ":" + port);
})

fs.watchFile('../fileIO/config.json', function(current, previous){
	var config = JSON.parse(fs.readFileSync('../fileIO/config.json'))
	server.close();


	var host = config.host, 
		port = config.port;
	server.listen(port,host, function(){
		console.log('Server is changed to listen to ' + host + ':' + port);
	})
})