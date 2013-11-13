var fs = require('fs');
console.log('Starting');
var contents = fs.readFileSync('./config.json');
console.log('contents: ' + contents);
var config = JSON.parse(contents);
console.log(config.name);