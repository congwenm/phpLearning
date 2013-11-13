var fs = require('fs');
console.log('starting');

/*fs.readFile('./app.js', function(error, data){
	console.log('Contents: '+data);
})*/



var content=fs.readFileSync('./app.js'); //wait until this is finished
console.log('contents: ' + content);

console.log('Carry on executing');