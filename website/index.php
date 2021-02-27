<?php include 'include/header.php'; ?>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<style type="text/css">

.navbar .container {
    width: 77%;
}
form {
  margin: 0 0 0px; 
}

@media (max-width: 767px){
body {
   padding-left: 0px; 
    padding-right: 0px; 
}
}
.masonry{
  display: block;
/*-webkit-column-gap: 2.25rem;
-moz-column-gap: 2.25rem;
column-gap: 12.25rem;*/
}

/* 5 columns */
.btn-success
{
      border-radius: 20px;
    font-size: 17px;
    font-family: inherit;
  }

.masonry.masonry-columns-5{
-webkit-column-count: 5;
-moz-column-count: 5;
column-count: 5;
}
@media(max-width: 1170px){
  .masonry.masonry-columns-5{
-webkit-column-count: 4;
-moz-column-count: 4;
column-count: 4;
}
}
/* .mansonry-columns-4{
    width: 300px;
    height: 300px;
} */

/*-4 columns------*/
.masonry.masonry-columns-4{
-webkit-column-count: 4;
-moz-column-count: 4;
column-count: 4;
}

/*-3 columns------*/
.masonry.masonry-columns-3{
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
}

/*-2 columns------*/
.masonry.masonry-columns-2{
-webkit-column-count: 2;
-moz-column-count: 2;
column-count: 2;
}

/*-1 columns------*/
.masonry.masonry-columns-1{
-webkit-column-count: 1;
-moz-column-count: 1;
column-count: 1;
}


/*--------Responsive---------*/
@media(max-width: 991px){
  .masonry.masonry-columns-4, 
  .masonry.masonry-columns-5{
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
}
}

@media(max-width: 767px){
  .masonry.masonry-columns-4, 
  .masonry.masonry-columns-5,
  .masonry.masonry-columns-3{
-webkit-column-count: 2;
-moz-column-count: 2;
column-count: 2;
}
}

@media(max-width: 540px){
  .masonry.masonry-columns-4, 
  .masonry.masonry-columns-5,
  .masonry.masonry-columns-3,
  .masonry.masonry-columns-2{
-webkit-column-count: 1;
-moz-column-count: 1;
column-count: 1;
}
}

.masonry .masonry-item{
    display: inline-block !important;
    width: 100% !important;
    max-width: 100% !important;
    position: relative;
    display: block;
    /*padding: 3px;
    background-color: #fff;*/
    border: 1px solid #e5e5e5;
    border-radius: .25rem;
float: none !important;
margin-right: 0 !important;
margin-bottom: 0 !important;
/*margin-bottom: 2.25rem !important;*/
}

.masonry .masonry-item {
    display: inline-block;
    margin-bottom: 20px;
    width: 100%;
    /*padding: 10px;*/
    border: 1px solid transparent;
    transition: all 0.4s ease-in-out; }
    .masonry .masonry-item:hover {
     /* border: 1px solid #f0f0f0;*/ }
    .masonry .masonry-item .post-title {
      font-size: 20px; }
    .masonry .masonry-item .post-info {
      color: #999;
      text-transform: uppercase; }
    .masonry .masonry-item p {
      color: #666; }
    .masonry .masonry-item .read-more {
      color: #27c2aa; }
    .masonry .masonry-item .tag-comment {
      border-top: 1px solid #f0f0f0;
      margin-top: 10px;
      padding: 5px 0;
      color: #999; }

/*=====  End of masonry Page  ======*/

</style>



<?php


$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;

$message ='';

if($flag){

  $message = $messages[$flag];

}

$filter = [];

$options = [
    'sort' => ['_id' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);

$cursor = $manager->executeQuery('youtubescraper.videos', $query);

?>





<form method="POST" action="">

<section id="add-listing" class="details-heading heading p_b70 p_t70 bg_lightgry">

        <div class="container-fluid">

            <div class="row">


      <div class="col-sm-12">


        <div class="masonry masonry-columns-4">


        <?php         
$i =1;
foreach ($cursor as $document) { ?>
      
      <a href="video-details.php?id=<?= $document->_id; ?>" target="_blank">
          <div class="masonry-item">
             <div class="details-heading-review ">
                          

                                <div class="media">
                                    <div class="media-left">
                                       
                                         <h4>   <span class="username"><?php echo $document->author;  ?></span></h4>
                                       
                                    </div>
                                    <div class="media-right">
                                        <span class="time"><?php echo $document->publishedText; ?></span>
                                    </div>     
                                </div>

                                <div class="media-body">
                                    <div class="review-detail">
                                            <h6><?php echo $document->title;?></h6></a><br>  
                                            <img src="<?= $document->videoThumbnails[4]->url;?>" alt="image">
                                    </div>
                                </div>

                            </div>

                        </div>

                        </a>
                    <?php $i++;  } ?>

                    
                    </div>     

                 
        </div>

      
      </div>
     
      
      </div>
    </div>
</section>
</form>
<?php include 'include/footer.php'; ?>