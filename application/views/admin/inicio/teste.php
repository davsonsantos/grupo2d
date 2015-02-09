<?php
$this->load->view('layout/header');
?>

<section id="content" class="container">
                <header class="p-header">
                    <h2>Content Widgets</h2>
                </header>
                <p></p>

                <div class="alert alert-info alert-dismissable fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    For Chart Widgets, please refer the Chart section using the left menu.
                </div>
                
                <div class="row m-container">
                    <!-- Recent Posts -->
                    <div class="col-md-6 masonry listview-block">
                        <div class="block">
                            <h2>Latest Blog Posts</h2>
                            <div class="config">                        
                                <a href="#" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                     <i class="icon-loop-2"></i>
                                </a>
                              
                                <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                     <i class="icon-wrench"></i>
                                </a>
                            </div>
                              
                            <div class="listview">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img src="img/profile-pics/1.jpg" alt="" class="poster-pic">
                                    </a>
                                    <div class="media-body">
                                        <small>2 Hours before by <a href="#">Jhon Beeber</a></small>
                                        <a href="#" class="post-title">Lorem ipsum dolor sit amet, consectetur adip...</a>
                                        <div class="btn-group controls">
                                            <a href="#" data-toggle="tooltip" data-original-title="Edit" class="ttips btn btn-gr-gray btn-xs"><i class="icon-pencil"></i></a>
                                            <a href="#" data-toggle="tooltip" data-original-title="Delete" class="ttips btn btn-gr-gray btn-xs"><i class="icon-close"></i></a>
                                            <a href="#" data-toggle="tooltip" data-original-title="View" class="ttips btn btn-gr-gray btn-xs"><i class="icon-arrow-right"></i></a> 
                                        </div>
                                    </div>
                                </div>
                                   
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img src="img/profile-pics/2.jpg" alt="" class="poster-pic">
                                    </a>
                                    <div class="media-body">
                                        <small>4 Hours before by <a href="#">David Melon</a></small>
                                        <a href="#" class="post-title">Sed scelerisque sapien dapibus sollicitudin...</a>
                                        <div class="btn-group controls">
                                            <a href="#" data-toggle="tooltip" data-original-title="Edit" class="ttips btn btn-gr-gray btn-xs"><i class="icon-pencil"></i></a>
                                            <a href="#" data-toggle="tooltip" data-original-title="Delete" class="ttips btn btn-gr-gray btn-xs"><i class="icon-close"></i></a>
                                            <a href="#" data-toggle="tooltip" data-original-title="View" class="ttips btn btn-gr-gray btn-xs"><i class="icon-arrow-right"></i></a> 
                                        </div>
                                    </div>
                                </div>
                                   
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img src="img/profile-pics/3.jpg" alt="" class="poster-pic">
                                    </a>
                                    <div class="media-body">
                                        <small>2 Days ago by <a href="#">Stathon Max</a></small>
                                        <a href="#" class="post-title">Fusce eros turpis, ultrices aliquam aliquet eget...</a>
                                        <div class="btn-group controls">
                                            <a href="#" data-toggle="tooltip" data-original-title="Edit" class="ttips btn btn-gr-gray btn-xs"><i class="icon-pencil"></i></a>
                                            <a href="#" data-toggle="tooltip" data-original-title="Delete" class="ttips btn btn-gr-gray btn-xs"><i class="icon-close"></i></a>
                                            <a href="#" data-toggle="tooltip" data-original-title="View" class="ttips btn btn-gr-gray btn-xs"><i class="icon-arrow-right"></i></a> 
                                        </div>
                                    </div>
                                </div>
                                   
                                <div class="media">
                                    <a class="pull-left" href="#">
                                         <img src="img/profile-pics/4.jpg" alt="" class="poster-pic">
                                    </a>
                                    <div class="media-body">
                                         <small>5 Days ago by <a href="#">Malinda Hollaway</a></small>
                                         <a href="#" class="post-title">Vivamus interdum massa diam, sit amet posuere...</a>
                                         <div class="btn-group controls">
                                              <a href="#" data-toggle="tooltip" data-original-title="Edit" class="ttips btn btn-gr-gray btn-xs"><i class="icon-pencil"></i></a>
                                              <a href="#" data-toggle="tooltip" data-original-title="Delete" class="ttips btn btn-gr-gray btn-xs"><i class="icon-close"></i></a>
                                              <a href="#" data-toggle="tooltip" data-original-title="View" class="ttips btn btn-gr-gray btn-xs"><i class="icon-arrow-right"></i></a> 
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Post -->
                    <div class="col-md-6 masonry">
                        <div class="block">
                            <h2>Post an Article</h2>
                            <div class="config">                        
                                <a href="#" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                    <i class="icon-loop-2"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                    <i class="icon-wrench"></i>
                                </a>
                            </div>
                            <form id="quick-post" class="block-body">
                                <div class="form-group">
                                    <label>Article Title</label>
                                    <input type="text" class="form-control input-sm" id="articleTitle" placeholder="eg: My first post">
                                </div>
                                   
                                <div class="form-group">
                                    <label>Alias</label>
                                    <input type="text" class="form-control input-sm" placeholder="eg: My-first-post">
                                </div>
                                     
                                <div class="form-group">
                                    <label>Category</label><br/>
                                    <select class="select" data-style="btn-gr-gray">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                        <option>Category 4</option>
                                        <option>Category 5</option>
                                        <option>Category 6</option>
                                    </select>
                                </div>
                                   
                                <div class="form-group">
                                    <label>Post</label>
                                    <textarea class="form-control input-sm" id="post" placeholder="eg. Lorem ipsum dolor sit amet, consectetur adipiscing elit..."></textarea>
                                </div>
    
                                <input type="submit" class="btn btn-primary btn-xs" value="PUBLISH">
                                <input type="submit" class="btn btn-success btn-xs" value="SAVE">  
                            </form>
                        </div>
                    </div>
                    
                    <!-- Pictures -->
                    <div class="col-md-6 masonry">
                        <div class="block">          
                            <h2>Pictures</h2>
                            <div class="config">                        
                                <a href="#" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                    <i class="icon-loop-2"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                    <i class="icon-wrench"></i>
                                </a>
                            </div>      
                            
                            <div class="box-view">
                                <a href="img/gallery/1.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis"><i class="icon-expand"></i>
                                    <i class="icon-expand"></i>
                                    <img src="img/gallery/thumbs/30.jpg" alt="">
                                </a>
                                <a href="img/gallery/1.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis"><i class="icon-expand"></i>
                                    <i class="icon-expand"></i>
                                    <img src="img/gallery/thumbs/1.jpg" alt="">
                                </a>
                                <a href="img/gallery/1.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis"><i class="icon-expand"></i>
                                    <i class="icon-expand"></i>
                                    <img src="img/gallery/thumbs/3.jpg" alt="">
                                </a>
                                <a href="img/gallery/1.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis"><i class="icon-expand"></i>
                                    <i class="icon-expand"></i>
                                    <img src="img/gallery/thumbs/4.jpg" alt="">
                                </a>
                                <a href="img/gallery/1.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis"><i class="icon-expand"></i>
                                    <i class="icon-expand"></i>
                                    <img src="img/gallery/thumbs/5.jpg" alt="">
                                </a>
                                <a href="img/gallery/1.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis"><i class="icon-expand"></i>
                                    <i class="icon-expand"></i>
                                    <img src="img/gallery/thumbs/2.jpg" alt="">
                                </a>
                            </div>
                            
                        </div>	
		    </div>
            
                    <!-- Today's Activity -->
                    <div class="col-md-6 masonry listview-block">
                        <div class="block">
                            <h2>Today's Activity</h2>
                            <div class="config">                        
                                <a href="#" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                    <i class="icon-loop-2"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                    <i class="icon-wrench"></i>
                                </a>
                            </div>
                             
                            <div class="listview activity">
                                <div class="media">
                                    <div class="number red pull-left">640</div>
                                    <div class="media-body">
                                        <span>Facebook Likes</span>
                                    </div>
                                </div>

                                <div class="media">
                                    <div class="number green pull-left">101</div>
                                    <div class="media-body">
                                        <span>Twitter Followers</span>
                                    </div>
                                </div>
                                        
                                <div class="media">
                                    <div class="number blue pull-left">12K</div>
                                    <div class="media-body">
                                        <span>Page Impressions</span>
                                    </div>
                                </div>
                                        
                                <div class="media">
                                    <div class="number yellow pull-left">20K</div>
                                    <div class="media-body">
                                        <span>Youtube Views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- List View -->
                    <div class="col-md-6 masonry">
                        <div class="block">
                            <h2>List View</h2>
                            <div class="config">                        
                                <a href="#" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                    <i class="icon-loop-2"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                    <i class="icon-wrench"></i>
                                </a>
                            </div>
                             
                            <div class="listview">
                                <div class="media">
                                    <div class="media-body">
                                        Nulla vel metus scelerisque ante sollicitudin commodo purus odio
                                        <div class="list-options">
                                            <button class="btn btn-gr-gray btn-sm">Delete</button>
                                            <button class="btn btn-gr-gray btn-sm">View</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="media">
                                    <div class="media-body">
                                        Per an error perpetua, fierent fastidii recteque ad pro. Mei id brute intellegam<br/>
                                        <div class="block attrs">
                                            Members: 78954
                                        </div>
                                        <div class="block attrs">
                                            Published: No
                                        </div>
                                    </div>
                                    <div class="list-options">
                                        <button class="btn btn-gr-gray btn-sm">Delete</button>
                                        <button class="btn btn-gr-gray btn-sm">View</button>
                                    </div>
                                </div>
                                
                                <div class="media">
                                    <a class="pull-left" href="#">
                                      <img class="media-object" src="img/profile-pics/1.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        Nulla vel metus scelerisque ante sollicitudin commodo purus odio <br/>
                                        <small>Lorem ipsum dolor sit amet, per cu solet docendi</small>
                                    </div>
                                    <div class="list-options">
                                        <button class="btn btn-gr-gray btn-sm">Delete</button>
                                        <button class="btn btn-gr-gray btn-sm">View</button>
                                    </div>
                                </div>
                                 
                                <div class="media">
                                    <div class="media-body">
                                        Wel ea elit iuvaret. Mea labitur definitiones ex <br/>
                                        <small>Create ipsum dolor sit amet, per cu solet docendi ntoenstion</small>
                                        <div class="list-options">
                                            <button class="btn btn-gr-gray btn-sm">Delete</button>
                                            <button class="btn btn-gr-gray btn-sm">View</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="media">
                                    <div class="media-body">
                                        Ipsum sunthom win vallaus binto munso leberations
                                        <div class="list-options">
                                            <button class="btn btn-gr-gray btn-sm">Delete</button>
                                            <button class="btn btn-gr-gray btn-sm">View</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="media">
                                    <a class="pull-left" href="#">
                                      <img class="media-object" src="img/profile-pics/2.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        Lotem Ipsum kandy mnsoo wen deiasel boomerag <br/>
                                        <div class="block attrs">
                                            Members: 190
                                        </div>
                                        <div class="block attrs">
                                            Published: No
                                        </div>
                                    </div>
                                    <div class="list-options">
                                        <button class="btn btn-gr-gray btn-sm">Delete</button>
                                        <button class="btn btn-gr-gray btn-sm">View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Todo List -->
                    <div class="col-md-6 masonry">
                        <div class="block">
                            <h2>Todo Lists</h2>
                            <div class="config">
                                <a href="#" data-original-title="Add&nbsp;New" class="ttips" data-toggle="modal" data-target="#addNew-todo">
                                    <i class="icon-plus add-new-todo"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                    <i class="icon-loop-2"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                    <i class="icon-wrench"></i>
                                </a>
                            </div>
                            <div class="listview todo-list">
                                <div class="media">
                                    <label class="pull-left">
                                          <input class="check-all" type="checkbox" value="" checked>
                                    </label>
                                    <div class="media-body">
                                        Nulla vel metus scelerisque ante sollicitudin commodo purus
                                        <div class="list-options">
                                            <button class="btn btn-gr-gray btn-sm">Delete</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="media">
                                    <label class="pull-left">
                                          <input class="check-all" type="checkbox" value="">
                                    </label>
                                    <div class="media-body">
                                        Per an error perpetua, fierent fastidii recteque ad pro. Mei id brute intellegam<br/>
                                        <small> An erant explicari salutatus duo, sumo doming delicata in cum. Eos at augue viderer principes</small><br/>
                                    </div>
                                    <div class="list-options">
                                        <button class="btn btn-gr-gray btn-sm">Delete</button>
                                    </div>
                                </div>
                                
                                <div class="media">
                                    <label class="pull-left">
                                          <input class="check-all" type="checkbox" value="">
                                    </label>
                                    <div class="media-body">
                                        Inermis patrioque temporibus at ius, eos ei case partem blandit<br/>
                                        <small>Sumo doming delicata in cum. Eos at augue viderer principes</small>
                                    </div>
                                    <div class="list-options">
                                        <button class="btn btn-gr-gray btn-sm">Delete</button>
                                    </div>
                                </div>
                                
                                <div class="media">
                                    <label class="pull-left">
                                          <input class="check-all" type="checkbox" value="">
                                    </label>
                                    <div class="media-body">
                                        Billa vel metus scelerisque ante sollicitudin commodo<br/>
                                        <small>Lorem ipsum dolor sit amet, per cu solet docendi</small>
                                    </div>
                                    <div class="list-options">
                                        <button class="btn btn-gr-gray btn-sm">Delete</button>
                                    </div>
                                </div>
                                
                                <div class="media">
                                    <label class="pull-left">
                                          <input class="check-all" type="checkbox" value="">
                                    </label>

                                    <div class="media-body">
                                        Per an urbanitas elaboraret qui, et dicit sadipscing vel
                                    </div>
                                    <div class="list-options">
                                        <button class="btn btn-gr-gray btn-sm">Delete</button>
                                    </div>
                                </div>
                                
                                <div class="media">
                                    <label class="pull-left">
                                          <input class="check-all" type="checkbox" value="">
                                    </label>
                                    <div class="media-body">
                                        Per an error perpetua, fierent fastidii recteque ad pro<br/>
                                        <small> An erant explicari salutatus duo, sumo doming delicata in cum. Eos at augue viderer principes</small><br/>
                                    </div>
                                    <div class="list-options">
                                        <button class="btn btn-gr-gray btn-sm">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Add new todo list modal -->
                        <div class="modal fade" id="addNew-todo">
                            <div class="modal-dialog modal-narrow">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add New Todo List</h4>
                                    </div>
                                    <form class="form-horizontal form-validation" role="form">
                                        <div class="modal-body"> 
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control validate[required] input-sm" placeholder="...">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Detail</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control auto-size input-sm" placeholder="Optional"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm" data-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-sm" value="Add">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Text -->
                    <div class="col-md-6 masonry">
                        <div class="block">          
                            <h2>Text</h2>
                            <div class="config">                           
                                <a href="#" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                    <i class="icon-loop-2"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                    <i class="icon-wrench"></i>
                                </a>
                            </div>      
                            
                            <div class="block-body">
                                <div class="overflow" style="height: 300px;">
                                    <p>Vestibulum quis quam velit. Aenean id libero nisl. Nullam sed tristique tellus, in ultrices lacus. Nullam porttitor dapibus mauris sed hendrerit. Aliquam pretium convallis egestas. In a purus diam. Donec et est vitae mauris luctus scelerisque sit amet ut ipsum.</p>
                                    <p>Curabitur tincidunt facilisis tincidunt. Suspendisse pulvinar semper elit in pharetra. Integer at ligula quis lacus varius rutrum venenatis quis ipsum. Ut nulla nibh, elementum et pharetra volutpat, feugiat at orci. Sed nec semper urna. In at justo et velit molestie sollicitudin vitae ut diam. Fusce sit amet fringilla turpis. Ut felis turpis, aliquet a euismod id, interdum eget est. Praesent id elementum libero, in sagittis libero.</p>
                                    <p>Tincidunt facilisis tincidunt. Suspendisse pulvinar semper elit in pharetra. Integer at ligula quis lacus varius rutrum venenatis quis ipsum. Ut nulla nibh, elementum et pharetra volutpat, feugiat at orci. Sed nec semper urna. In at justo et velit molestie sollicitudin vitae ut diam. Fusce sit amet fringilla turpis. Ut felis turpis, aliquet a euismod id, interdum eget est. Praesent id elementum libero, in sagittis libero.</p>
                                    <p>Vestibulum quis quam velit. Aenean id libero nisl. Nullam sed tristique tellus, in ultrices lacus. Nullam porttitor dapibus mauris sed hendrerit. Aliquam pretium convallis egestas. In a purus diam. Donec et est vitae mauris luctus scelerisque sit amet ut ipsum.</p>
                                </div>
                            </div>
                            
                        </div>	
		    </div>

                    <!-- Calendar -->
                    <div class="col-md-6 masonry">
                        <div class="block">
                            <h2>Calendar</h2>
                            <div class="config">  
                                <a href="#" data-toggle="tooltip" data-original-title="Refresh" class="ttips">
                                    <i class="icon-loop-2"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                                    <i class="icon-wrench"></i>
                                </a>
                                
                            </div>
                            
                            <div class="calendar-widget">
                                <div id="calendar-widget"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
            </section>
<?php
$this->load->view('layout/footer');
