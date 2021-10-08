var app = require('http')
var chat = require('chat')

chat.init({
    host: 'localhost',
    user: 'root',
    password: 'admin',
    database: 'jobportal',
    assets: 'assets'
});

app.listen(8080);