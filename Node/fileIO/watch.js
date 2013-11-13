var fs = require('fs');
console.log('Started');
var config = JSON.parse(fs.readFileSync('config.json'));
console.log('initial config', config);

fs.watchFile('config.json', function(currentStatistics, previousStatistics){
	console.log('Config changed');
	var config = JSON.parse(fs.readFileSync('config.json'));
	console.log('new config file: ', config);
})