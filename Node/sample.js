var fs =  require("fs");
console.log('Starting');
fs.readFile('./sample.php', function(error, data){
	console.log('Content of file: ' + data);
})
console.log('Carry on executing');