var fs = require('fs');
console.log('starting');
// fs.writeFileSync('./write_sync.txt', 'helloworld! Synchronous');

fs.writeFile('write_sync.txt', 'helloworld! Asynchronous', function(error){
	console.log('Written File');
}) //async

console.log('finished');