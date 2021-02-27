// init code
const mongoose = require('mongoose');

// user schema

const CookieSchema = mongoose.Schema(
    {
        quality: String,
        url: String,
      width: String,
      height: String
    }
  )

  

const videoSchema = mongoose.Schema({
    videoId:{
        type : String,
        required : true,
        unique : true
    },
    title : {
        type : String,
        required : true
    },
    type : {
        type : String,
        required : true
       
    },
    author : {
        type : String,
        required : true
    },
    authorId : {
        type : String,
        required : true
    },
    authorUrl : {
        type : String,
        required : true
    },
    // videoThumbnails:{
    //     type : String,
    //     required : true
    // },
    videoThumbnails:{
        cookieSummary: [CookieSchema]
    },
    description: {
        type : String,
        required : true
       
    },
    viewCount : {
        type : String,
        required : true
    },
    published : {
        type : String,
        required : true
    },
    publishedText : {
        type : String,
        required : true
    },

    lengthSeconds : {
        type : String,
        required : true
    },
    liveNow : {
        type : String,
        required : true
    },

    paid : {
        type : String,
        required : true
    },
    timeText : {
        type : String,
        required : true
    },

    isCreatorOnRise :{
        type : Boolean,
        default : true
    }

});


// user model
mongoose.model('video', videoSchema);

// module exports
module.exports = mongoose.model('video');

