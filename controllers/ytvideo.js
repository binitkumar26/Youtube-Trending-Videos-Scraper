// init code
const router = require('express').Router();
const bodyParser = require('body-parser');
const { Mongoose } = require('mongoose');
const ytrend = require("yt-trending-scraper");
const video = require('../models/ytvideo');


// middleware setup
router.use(bodyParser.json());
router.use(bodyParser.urlencoded({ extended: true }));


// Save new video route
router.post(
    '/createVideo',

   function (req, res) {   
        
      ytrend.scrape_trending_page('IN', false).then((data) =>{

        var datavideos=data;
        
        datavideos.forEach(async element => {
                //console.log(element);
            
                const query = { videoId: element.videoId };
                let update = { title: element.title, type: element.type, author: element.author, authorId: element.authorId, authorUrl: element.authorUrl, videoThumbnails: element.videoThumbnails, description: element.description, viewCount: element.viewCount, published: element.published, publishedText: element.publishedText, lengthSeconds: element.lengthSeconds, timeText: element.timeText };

                let options = {upsert: true, new: true, setDefaultsOnInsert: true};
                await video.findOneAndUpdate(query, update , options ,function(err, result){
                    if(err){
                        console.log(err);
                    }else{
                        
                        res.result;
                        
                    }
                
                });


        });
        

     })

    }
);


router.get(
    "/list", 
    
    function(req, res, next) {
   
    video.find({}, function(err, data) {
        if (err) {
          console.log(err);
          return res.send(500, 'Something Went wrong with Retrieving data');
        } else {
          
          res.json(data);
        }
      });


  });

  router.post(
    '/find',

   function (req, res) { 
    
    var id = req.body._id;

    video.find({ _id: id }, async (err, docs) => {
        if (err) {
        console.log(err);
        } else { 

            res.json(docs);
        }

    });

});


// module exports 
module.exports = router;

