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

// app.get("/",(req,res) => {
//      res.render("index")
// })

// app.post('/',(req,res) => {
//      var url = req.body.url
//      console.log(url)

//      var id = youtubeid(url)

//      console.log(id);

     

//      // var data = youtubeinfo.videoInfo(url,options = { detailedChannelData: true })

//      //       console.log(data)

//      //       data.then(function(data){
//      //            console.log(data)
//      //            res.render("data",{data:data})
//      //       })
 
//      ytrend.scrape_trending_page('IN', false).then((data) =>{
//           console.log(data[0].title);

//          // res.render("data",{data:data});
//       }).catch((error)=>{
//           console.log(error);
//       });


// });


server.listen(PORT,console.log('Server is running '+ PORT));

// app.listen(5000,() => {
//      console.log("App is listening on Port 5000")
// })