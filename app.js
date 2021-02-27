const express = require('express');

const bodyParser = require('body-parser');

const app = express();

require('dotenv').config();
const http=require('http');
const PORT=process.env.PORT;
const server =  http.createServer(app);
const database=require('./database');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));


const ytvideo = require('./controllers/ytvideo');


// middleware setup
app.use('/api', ytvideo);



app.set("view engine","ejs")

server.listen(PORT,console.log('Server is running '+ PORT));
