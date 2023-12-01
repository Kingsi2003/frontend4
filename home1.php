<?php
include('config.php');
include('session.php');
if(empty($_SESSION['email'])){
    header("Location:index.php");
}
else{

    

    if(isset( $_POST['load'])){
        $query ="SELECT * FROM postnoimg";
        $send = $conn->query($query);
        $resultnum = mysqli_num_rows($send);

        for($i=0;$i<$resultnum;$i++){

        
        $result = mysqli_fetch_assoc($send);
        $postmessage = $result['post'];
        $comments = $result['comments'];
        $likes = $result['likes'];
        $share = $result['share'];
        if($comments == 0){
           $comments = 'no';
           $comments2 = 0;


           echo '<!--86129925  -->
           <!--img post  -->
           <div class="card2">
                  <div class="prof">
                      <div class="topic">
                          <figure class="topic_pic_small">
                              <img src="res/img/tail2.png" alt="">
              
                          </figure>
                          <figcaption><h4 class="cap">politics</h4></figcaption>
                      </div>
                  </div>
                  <div class="profp">
                      <p class="ptext">'.
                         $postmessage
                      .'</p>
                  </div>
                  <div class="proimg">
                      <div class="frame"></div>
                      <div class="frame"></div>
                  </div>
                  <div id="proff">
                      <div class="lef">
  
                        <span><i class="fa fa-hand-o-right"></i>'.$likes.'&nbsp; likes </span>
                        <span><i class="fa fa-comment-o"></i>'.$comments2.'&nbsp;  comments </span>
  
                         
                       
                      </div>
                      <div class="rit">
                         <i class="fa fa-share-alt"></i>
                        '.$share.' &nbsp; share
                      </div>
                  </div>
  
                  <div class="w-100 com">
                      
                        <!--  <figure class="profile_pic_small">
                              <img src="res/img/people.jpg" alt="">
              
                          </figure>-->
                          <div class="follow2">
                              <h4 class="at"><span><!--@kingsley--></span><small class="gray"><!--30 min--></small></h4>
                              <p class=""> <span class="gray"><!--awesome--></span> <!-- <i class="fa fa-heart lov"></i><small class="gray">4</small>--></p>
                              <p class="gray reply"><span><!--Reply--></span>  <span><!--Like--></span></p>
                          </div>
                      
                      
                  </div>
  
  
                  
                 
  
                 <a href="" class="nodeco"><h4 class="followme"> '.$comments.' comments</h4></a> 
  
                 <div class="type">
                  <input type="text" class="yourc" placeholder="Type your comment">
                  <span class="ib gray">
                      <i class="fa fa-picture-o"></i>
                      <i class="fa fa-tags"></i>
                      <i class="fa fa-video-camera"></i>
                      <i class="fa fa-share"></i>
                  </span>
                
                 </div>
  
              </div>
              <!-- img post e -->
               <!-- post no image e -->';
    };
}
  exit();
}
    
  
    if(isset($_POST['posttext'])){
    
        if($_POST['posttext']!=''){
    
          $post = htmlspecialchars($_POST['posttext']);
          $email = $_SESSION['email'];
          $firstname = $_SESSION['firstname'];
          $lastname = $_SESSION['lastname'];
          $uniqid = bin2hex(random_bytes(4)).time();
             $query ="INSERT INTO postnoimg ( email,firstname,lastname,post,`uniqid`) VALUES ('$email','$firstname','$lastname','$post','$uniqid')";
             $conn->query($query);
             $query ="SELECT * FROM postnoimg WHERE uniqid = '$uniqid'";
             $send = $conn->query($query);
             $result = mysqli_fetch_assoc($send);
             $resultnumber = mysqli_num_rows($send);
             $postmessage = $result['post'];
             $comments = $result['comments'];
             $likes = $result['likes'];
             $share = $result['share'];
             if($comments == 0){
                $comments = 'no';
                


                exit('    <!--86129925  -->
                <!--img post  -->
                <div class="card2">
                       <div class="prof">
                           <div class="topic">
                               <figure class="topic_pic_small">
                                   <img src="res/img/tail2.png" alt="">
                   
                               </figure>
                               <figcaption><h4 class="cap">politics</h4></figcaption>
                           </div>
                       </div>
                       <div class="profp">
                           <p class="ptext">'.
                              $postmessage
                           .'</p>
                       </div>
                       <div class="proimg">
                           <div class="frame"></div>
                           <div class="frame"></div>
                       </div>
                       <div id="proff">
                           <div class="lef">
       
                             <span><i class="fa fa-hand-o-right"></i>'.$likes.'&nbsp; likes </span>
                             <span><i class="fa fa-comment-o"></i>'.$comments2.'&nbsp;  comments </span>
       
                              
                            
                           </div>
                           <div class="rit">
                              <i class="fa fa-share-alt"></i>
                             '.$share.' &nbsp; share
                           </div>
                       </div>
       
                       <div class="w-100 com">
                           
                             <!--  <figure class="profile_pic_small">
                                   <img src="res/img/people.jpg" alt="">
                   
                               </figure>-->
                               <div class="follow2">
                                   <h4 class="at"><span><!--@kingsley--></span><small class="gray"><!--30 min--></small></h4>
                                   <p class=""> <span class="gray"><!--awesome--></span> <!-- <i class="fa fa-heart lov"></i><small class="gray">4</small>--></p>
                                   <p class="gray reply"><span><!--Reply--></span>  <span><!--Like--></span></p>
                               </div>
                           
                           
                       </div>
       
       
                       
                      
       
                      <a href="" class="nodeco"><h4 class="followme"> '.$comments.' comments</h4></a> 
       
                      <div class="type">
                       <input type="text" class="yourc" placeholder="Type your comment">
                       <span class="ib gray">
                           <i class="fa fa-picture-o"></i>
                           <i class="fa fa-tags"></i>
                           <i class="fa fa-video-camera"></i>
                           <i class="fa fa-share"></i>
                       </span>
                     
                      </div>
       
                   </div>
                   <!-- img post e -->
                    <!-- post no image e -->');
             }
             else{
                $comments ='see'.$comments;
              
           echo '<!--86129925  -->
           <!--img post  -->
           <div class="card2">
                  <div class="prof">
                      <div class="topic">
                          <figure class="topic_pic_small">
                              <img src="res/img/tail2.png" alt="">
              
                          </figure>
                          <figcaption><h4 class="cap">politics</h4></figcaption>
                      </div>
                  </div>
                  <div class="profp">
                      <p class="ptext">'.
                         $postmessage
                      .'</p>
                  </div>
                  <div class="proimg">
                      <div class="frame"></div>
                      <div class="frame"></div>
                  </div>
                  <div id="proff">
                      <div class="lef">
  
                        <span><i class="fa fa-hand-o-right"></i>'.$likes.'&nbsp; likes </span>
                        <span><i class="fa fa-comment-o"></i>'.$comments2.'&nbsp;  comments </span>
  
                         
                       
                      </div>
                      <div class="rit">
                         <i class="fa fa-share-alt"></i>
                        '.$share.' &nbsp; share
                      </div>
                  </div>
  
                  <div class="w-100 com">
                      
                        <!--  <figure class="profile_pic_small">
                              <img src="res/img/people.jpg" alt="">
              
                          </figure>-->
                          <div class="follow2">
                              <h4 class="at"><span><!--@kingsley--></span><small class="gray"><!--30 min--></small></h4>
                              <p class=""> <span class="gray"><!--awesome--></span> <!-- <i class="fa fa-heart lov"></i><small class="gray">4</small>--></p>
                              <p class="gray reply"><span><!--Reply--></span>  <span><!--Like--></span></p>
                          </div>
                      
                      
                  </div>
  
  
                  
                 
  
                 <a href="" class="nodeco"><h4 class="followme"> '.$comments.' comments</h4></a> 
  
                 <div class="type">
                  <input type="text" class="yourc" placeholder="Type your comment">
                  <span class="ib gray">
                      <i class="fa fa-picture-o"></i>
                      <i class="fa fa-tags"></i>
                      <i class="fa fa-video-camera"></i>
                      <i class="fa fa-share"></i>
                  </span>
                
                 </div>
  
              </div>
              <!-- img post e -->
               <!-- post no image e -->';
    };
}
  exit();
}
    
  
    if(isset($_POST['posttext'])){
    
        if($_POST['posttext']!=''){
    
          $post = htmlspecialchars($_POST['posttext']);
          $email = $_SESSION['email'];
          $firstname = $_SESSION['firstname'];
          $lastname = $_SESSION['lastname'];
          $uniqid = bin2hex(random_bytes(4)).time();
             $query ="INSERT INTO postnoimg ( email,firstname,lastname,post,`uniqid`) VALUES ('$email','$firstname','$lastname','$post','$uniqid')";
             $conn->query($query);
             $query ="SELECT * FROM postnoimg WHERE uniqid = '$uniqid'";
             $send = $conn->query($query);
             $result = mysqli_fetch_assoc($send);
             $postmessage = $result['post'];
             $comments = $result['comments'];
             $likes = $result['likes'];
             $share = $result['share'];
             if($comments == 0){
                $comments = 'no';
                


                exit('    <!--86129925  -->
                <!--img post  -->
                <div class="card2">
                       <div class="prof">
                           <div class="topic">
                               <figure class="topic_pic_small">
                                   <img src="res/img/tail2.png" alt="">
                   
                               </figure>
                               <figcaption><h4 class="cap">politics</h4></figcaption>
                           </div>
                       </div>
                       <div class="profp">
                           <p class="ptext">'.
                              $postmessage
                           .'</p>
                       </div>
                       <div class="proimg">
                           <div class="frame"></div>
                           <div class="frame"></div>
                       </div>
                       <div id="proff">
                           <div class="lef">
       
                             <span><i class="fa fa-hand-o-right"></i>'.$likes.'&nbsp; likes </span>
                             <span><i class="fa fa-comment-o"></i>'.$comments2.'&nbsp;  comments </span>
       
                              
                            
                           </div>
                           <div class="rit">
                              <i class="fa fa-share-alt"></i>
                             '.$share.' &nbsp; share
                           </div>
                       </div>
       
                       <div class="w-100 com">
                           
                             <!--  <figure class="profile_pic_small">
                                   <img src="res/img/people.jpg" alt="">
                   
                               </figure>-->
                               <div class="follow2">
                                   <h4 class="at"><span><!--@kingsley--></span><small class="gray"><!--30 min--></small></h4>
                                   <p class=""> <span class="gray"><!--awesome--></span> <!-- <i class="fa fa-heart lov"></i><small class="gray">4</small>--></p>
                                   <p class="gray reply"><span><!--Reply--></span>  <span><!--Like--></span></p>
                               </div>
                           
                           
                       </div>
       
       
                       
                      
       
                      <a href="" class="nodeco"><h4 class="followme"> '.$comments.' comments</h4></a> 
       
                      <div class="type">
                       <input type="text" class="yourc" placeholder="Type your comment">
                       <span class="ib gray">
                           <i class="fa fa-picture-o"></i>
                           <i class="fa fa-tags"></i>
                           <i class="fa fa-video-camera"></i>
                           <i class="fa fa-share"></i>
                       </span>
                     
                      </div>
       
                   </div>
                   <!-- img post e -->
                    <!-- post no image e -->');  
             }


            
        }

        if($_FILES['pimg']['size']!=0){
            $filename = $_FILES['pimg']['name'];
            $imgtype = array('png','jpg');

            if($_FILES['pimg']['error']==0){
             
                if(in_array(pathinfo($filename ,PATHINFO_EXTENSION),$imgtype)){
                    $filename = $filename.time();
                    
                    $destination = __DIR__."/res/postimg/$filename";
                    move_uploaded_file( $_FILES['pimg']['tmp_name'],$destination );

                    $post = htmlspecialchars($_POST['posttext']);
                    $email = $_SESSION['email'];
                    $firstname = $_SESSION['firstname'];
                    $lastname = $_SESSION['lastname'];
                    $uniqid = bin2hex(random_bytes(4)).time();
                       $query ="INSERT INTO postnoimg ( email,firstname,lastname,post,`uniqid`) VALUES ('$email','$firstname','$lastname','$post','$uniqid')";
                       $conn->query($query);
                       $query ="SELECT * FROM postnoimg WHERE uniqid = '$uniqid'";
                       $send = $conn->query($query);
                       $result = mysqli_fetch_assoc($send);
                       $postmessage = $result['post'];
                       $comments = $result['comments'];
                       $likes = $result['likes'];
                       $share = $result['share'];

                    exit('    <!--86129925  -->
                <!--img post  -->
                <div class="card2">
                       <div class="prof">
                           <div class="topic">
                               <figure class="topic_pic_small">
                                   <img src="res/postimg/'.$filename.'"  alt="">
                   
                               </figure>
                               <figcaption><h4 class="cap">politics</h4></figcaption>
                           </div>
                       </div>
                       <div class="profp">
                           <p class="ptext">'.
                              $postmessage
                           .'</p>
                       </div>
                       <div class="proimg">
                           <div class="frame"> <img src="res/postimg/'.$filename.'"  alt=""></div>
                           <div class="frame"></div>
                       </div>
                       <div id="proff">
                           <div class="lef">
       
                             <span><i class="fa fa-hand-o-right"></i>'.$likes.'&nbsp; likes </span>
                             <span><i class="fa fa-comment-o"></i>'.$comments.'&nbsp;  comments </span>
       
                              
                            
                           </div>
                           <div class="rit">
                              <i class="fa fa-share-alt"></i>
                             '.$share.' &nbsp; share
                           </div>
                       </div>
       
                       <div class="w-100 com">
                           
                              <figure class="profile_pic_small">
                                   <img src="res/postimg/'.$filename.'" alt="">
                   
                               </figure>
                               <div class="follow2">
                                   <h4 class="at"><span><!--@kingsley--></span><small class="gray"><!--30 min--></small></h4>
                                   <p class=""> <span class="gray"><!--awesome--></span> <!-- <i class="fa fa-heart lov"></i><small class="gray">4</small>--></p>
                                   <p class="gray reply"><span><!--Reply--></span>  <span><!--Like--></span></p>
                               </div>
                           
                           
                       </div>
       
       
                       
                      
       
                      <a href="" class="nodeco"><h4 class="followme"> '.$comments.' comments</h4></a> 
       
                      <div class="type">
                       <input type="text" class="yourc" placeholder="Type your comment">
                       <span class="ib gray">
                           <i class="fa fa-picture-o"></i>
                           <i class="fa fa-tags"></i>
                           <i class="fa fa-video-camera"></i>
                           <i class="fa fa-share"></i>
                       </span>
                     
                      </div>
       
                   </div>
                   <!-- img post e -->
                    <!-- post no image e -->');
                }



                
            }

            

        }
        else{
            echo"nooooooooooooooooo";
        }
      
     }
  

            
        
      
     
}

 
 
 ?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/framework/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/tale_home.css">
    <script defer src="res/framework/jquery.js"></script>
    <script defer src="javascript/main.js"></script>

    <title>Document</title>
</head>
<body>
    <form action="" id="hidd">
    <input type="hidden"  name="load" value="">
    </form>
   <!-- nav -->
   <div class="nav">
    <!-- sub1 -->
   <div class="subnav">
    <div class="logo">
        <img src="res/img/tail2.png" alt="">
    </div>

   </div>
   <!--sub1e  -->
   <div class="subnav">
    <button class="search"><i class="fa fa-search"></i></button>
    <input type="search" class=" hsearch" placeholder="Search">

   </div>
   <div class="subnav g ">
    <div>
      <i class="fa fa-th-large font"></i>
      <i class="fa fa-comments font izx"></i>
      <i class="fa fa-bell font izx" ></i>
    </div>
    <div id="izx"> 
        <figure class="profile_pic_small">
            <img src="res/img/people.jpg" alt="">

        </figure>
        <figcaption>kingsley</figcaption>
        <fa class="fa fa-caret-down font3"></fa>

    </div>
   </div>

</div>
<!-- nave -->
    <!-- body -->
    <div class="container">

        <!-- left -->
        <div class="left">
           
                
            <div class="child1">
                <a href="home1.html" class="llo">
                    <section class="left_logo active">
                        <fa class="fa fa-home font2"></fa>
        
                       </section>
                </a>
              <a href="groups.html" class="llo">
                <section class="left_logo ">
                    <fa class="fa fa-group font2"></fa>
    
                   </section>
              </a>
              <a href="market.html" class="llo">
                <section class="left_logo ">
                    <fa class="fa fa-shopping-bag font2"></fa>
    
                   </section>
              </a>
              <a href="friends.html" class="llo">
                <section class="left_logo ">
                    <fa class="fa fa-user-secret font2"></fa>
    
                   </section>
              </a>
              <a href="message.html" class="llo">
                <section class="left_logo">
                    <fa class="fa fa-commenting font2"></fa>
    
                   </section>
              </a>
              <a href="video.html" class="llo">
                <section class="left_logo">
                    <fa class="fa fa-video-camera font2"></fa>
    
                   </section>
              </a>
              <a href="saved_content.html" class="llo">
                <section class="left_logo">
                    <fa class="fa fa-calendar font2"></fa>
    
                   </section>
              </a>
              <a href="music.html" class="llo">
                <section class="left_logo">
                    <fa class="fa fa-music font2"></fa>
    
                   </section>
              </a>
             
              
              
            </div>
            <div class="child2">
            
                <div class="profile">
                    <figure class="profile_pic_small">
                        <img src="res/img/people.jpg" alt="">
        
                    </figure>
                    <figcaption><h5>kingsley samuel</h5></figcaption>
                </div>
                <h4 class="subtopic">popular topics</h4>
                <div class="topic">
                    <figure class="topic_pic_small">
                        <img src="res/img/tail2.png" alt="">
        
                    </figure>
                    <figcaption><h4 class="cap">sports</h4></figcaption>
                </div>
                <div class="topic">
                    <figure class="topic_pic_small">
                        <img src="res/img/tail2.png" alt="">
        
                    </figure>
                    <figcaption><h4 class="cap">entertainment</h4></figcaption>
                </div>
                <div class="topic">
                    <figure class="topic_pic_small">
                        <img src="res/img/tail2.png" alt="">
        
                    </figure>
                    <figcaption><h4 class="cap">politics</h4></figcaption>
                </div>
                <div class="topic">
                    <figure class="topic_pic_small">
                        <img src="res/img/tail2.png" alt="">
        
                    </figure>
                    <figcaption><h4 class="cap">health</h4></figcaption>
                </div>
                <div class="topic">
                    <figure class="topic_pic_small">
                        <img src="res/img/tail2.png" alt="">
        
                    </figure>
                    <figcaption><h4 class="cap">more topics</h4></figcaption>
                </div>
                <h4 class="subtopic">trends for you</h4>
                <div class="trend">
                    <h4 class="cap trendh4"><span>wash hands</span> <i class="fa fa-ellipsis-h gray"></i></h4>
                    <p class="numcount">4349 post</p>
                </div>
                <div class="trend">
                    <h4 class="cap trendh4"><span>wash hands</span> <i class="fa fa-ellipsis-h gray"></i></h4>
                    <p class="numcount">4349 post</p>
                </div>
                <div class="trend">
                    <h4 class="cap trendh4"><span>wash hands</span> <i class="fa fa-ellipsis-h gray"></i></h4>
                    <p class="numcount">4349 post</p>
                </div>
                <div class="trend">
                    <h4 class="cap trendh4"><span>wash hands</span> <i class="fa fa-ellipsis-h gray"></i></h4>
                    <p class="numcount">4349 post</p>
                </div>
                <div class="trend">
                    <h4 class="cap trendh4"><span>wash hands</span> <i class="fa fa-ellipsis-h gray"></i></h4>
                    <p class="numcount">4349 post</p>
                </div>
                <a href="" class="link"><h4 class="subtopic">see more....</h4></a>
                <h4 class="subtopic">you might to follow</h4>
                <div class="profile">
                    <figure class="profile_pic_small">
                        <img src="res/img/people.jpg" alt="">
        
                    </figure>
                    <div class="follow">
                        <h4 class="cap follow"><span>great page</span></h4>
                        <p class="numcount">4349 post</p>
                        <h4 class="followme"><i class="fa fa-user-plus"></i> follow</h4>

                    </div>
                </div>
                <div class="profile">
                    <figure class="profile_pic_small">
                        <img src="res/img/people.jpg" alt="">
        
                    </figure>
                    <div class="follow">
                        <h4 class="cap follow"><span>great page</span></h4>
                        <p class="numcount">4349 post</p>
                        <h4 class="followme"><i class="fa fa-user-plus"></i> follow</h4>

                    </div>
                </div>
                <div class="profile">
                    <figure class="profile_pic_small">
                        <img src="res/img/people.jpg" alt="">
        
                    </figure>
                    <div class="follow">
                        <h4 class="cap follow"><span>great page</span></h4>
                        <p class="numcount">4349 post</p>
                        <h4 class="followme"><i class="fa fa-user-plus"></i> follow</h4>

                    </div>
                </div>
                <div class="profile">
                    <figure class="profile_pic_small">
                        <img src="res/img/people.jpg" alt="">
        
                    </figure>
                    <div class="follow">
                        <h4 class="cap follow"><span>great page</span></h4>
                        <p class="numcount">4349 post</p>
                        <h4 class="followme"><i class="fa fa-user-plus"></i> follow</h4>

                    </div>
                </div>
            </div>
        </div>
        <!-- lefte -->
        <!-- middle -->
        <div class="middle">
            <form action="" id="postf" method=''>
            <div class="card2">
                <div class="sharesomething">
                    <div class="profilesharesometing">
                        <figure class="profile_pic_small">
                            <img src="res/img/people.jpg" alt="">
            
                        </figure>
                        <textarea name="posttext" id="sharesomethingtext" cols="30" rows="10" placeholder="Share something" class="r"></textarea>
                       
                    </div>
                  
                    <div id="postbut">
                        <div class="postc">
                            <input type="file" name="pimg" style="display: none;" id="pimg">
                            <label for="pimg"> <i class="fa fa-picture-o"></i></label>
                            <input type="file" name="pvid" style="display: none;" id="pvid">
                            <label for="pvid">   <i class="fa fa-video-camera"></i></label>
                           
                            <i class="fa fa-tags"></i>
                          
                            <i class="fa fa-share"></i>
                        </div>
                        <div class="postc">
                            <button class="postb">post</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

          
         <div class="aap">



        <!--  -->
        
        <!--  -->



         </div>




          
        </div>
        <!-- middle e-->
        <!-- right -->
        <div class="right">
          <div class="card">
               <div class="groups">
                   <section class="left_logo">
                    <fa class="fa fa-video-camera font2"></fa>
    
                    </section>
                   <h4 class="followme cap">groups for you</h4>


                </div>


                <div class="groupimglarge">
                    <img src="" alt="">
                </div>
                <h4 class="groupcaption cap">
                    <span>3d modeling texturing rendering raging animation</span>
                    
                    <p class="gray groupcount">145000 members</p>
                </h4>
                <button class="joingrouplarge">join group</button>
                
          </div>

          <div class="card">
               <div class="groups">
                   <section class="left_logo">
                    <fa class="fa fa-video-camera font2"></fa>
    
                    </section>
                   <h4 class="followme cap">friend request</h4>


                </div>


                <div class="profile">
                    <figure class="profile_pic_small">
                        <img src="res/img/people.jpg" alt="">
        
                    </figure>
                    <div class="follow">
                        <h4 class="cap follow"><span>joshua samuel</span></h4>
                        <p class="numcount">47 mutual friends</p>

                    </div>
                </div>
                <small>wants to be your friend</small>

                <div class="buth">
                    <button class="comfirm b">comfirm</button>
                    <button class="delete b">delete</button>
                </div>

          </div>
          <h4 class="subtopicright">9+ more activities</h4>


          <div class="card ">
            <div class="groupscontactsearch">
              
                <h4 class="followme cap">contacts</h4>

                <input type="search" class="searchcontact">
                <i class="fa fa-search"></i>
             </div>
                <p class="onlinecount">online 25+</p>

             <div class="contactonline">
                <figure class="topic_pic_small useronline">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
             <div class="contactonline">
                <figure class="topic_pic_small useronline">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
             <div class="contactonline">
                <figure class="topic_pic_small useronline">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
             <div class="contactonline">
                <figure class="topic_pic_small useronline">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
             <div class="contactonline">
                <figure class="topic_pic_small useronline">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
             <div class="contactonline">
                <figure class="topic_pic_small useronline">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
             <div class="contactonline">
                <figure class="topic_pic_small useronline ">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
             <div class="contactonline">
                <figure class="topic_pic_small useronline">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
             <div class="contactonline">
                <figure class="topic_pic_small useronline">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
             <div class="contactonline">
                <figure class="topic_pic_small useronline">
                    <img src="res/img/tail2.png" alt="">
    
                </figure>
                <figcaption><h4 class="cap">kingsley samuel</h4></figcaption>
            </div>
       </div>


        </div>
        <!-- righte -->

    </div>
    <script>
        function loadpost(){

let data = document.querySelector('#hidd');
let xml = new XMLHttpRequest;
xml.open('POST','home1.php');
xml.onreadystatechange =()=>{

 if(xml.readyState == 4 && xml.status==200){
   
     console.log(xml.responseText)
  
     $('.aap').prepend(xml.responseText);
   
   
 }
}
xml.send(new FormData(data))
console.log('loaded');
}
window.onload=loadpost()

    </script>
</body>
</html>