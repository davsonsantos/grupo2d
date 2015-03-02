<?php
$this->load->view('admin/layout/header');
?>
<section id="content">

    <div class="cover">
        <img class="banner-img" src="<?= GD_IMG ?>cover-bg.jpg" alt="" />
        <img class="profile-pic" src="<?= GD_IMG ?>profile-pics/profile-page.jpg" alt="" />

        <div class="profile-btn">
            <h3 class="block-title"><?=$this->session->userdata('user_nome')?>  </h3>
            
        </div>
    </div>

	<div class="row m-container">
    	<div class="col-md-12 simple-list masonry">	
    			<?php echo get_msg('msgerro') ?>
    	</div>
	</div>
	
    <div class="row m-container">
        <!-- About me -->
        <div class="col-md-6 simple-list masonry">	      
            <div class="block">          
                <h2><a href="#">Aboue me </a></h2>
                <div class="config">                        
                    <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                        <i class="icon-wrench"></i>
                    </a>
                </div>           

                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="media">
                            <i class="icon icon-briefcase pull-left"></i> 
                            <div class="media-body">
                                Software Developer at Google Inc.
                                
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media">
                            <i class="icon icon-stack pull-left"></i>
                            <div class="media-body">
                                Studied at Oxford University
                                

                            </div>
                        </div> 
                    </li>
                    <li class="list-group-item">
                        <div class="media">
                            <i class="icon icon-home-2 pull-left"></i>
                            <div class="media-body">
                                Lives in Dubai, UAE
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="media">
                            <i class="icon icon-compass pull-left"></i>
                            <div class="media-body">
                                From Manchester
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Summary -->
        <div class="col-md-6 masonry">
            <div class="block">          
                <h2>Summary</h2>
                <div class="config">                        
                    <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                        <i class="icon-wrench"></i>
                    </a>
                </div>           

                <div class="block-body">
                    <p>Vestibulum quis quam velit. Aenean id libero nisl. Nullam sed tristique tellus, in ultrices lacus. Nullam porttitor dapibus mauris sed hendrerit. Aliquam pretium convallis egestas. In a purus diam. Donec et est vitae mauris luctus scelerisque sit amet ut ipsum.</p>
                    <p>Curabitur tincidunt facilisis tincidunt. Suspendisse pulvinar semper elit in pharetra. Integer at ligula quis lacus varius rutrum venenatis quis ipsum. Ut nulla nibh, elementum et pharetra volutpat, feugiat at orci. Sed nec semper urna. In at justo et velit molestie sollicitudin vitae ut diam. Fusce sit amet fringilla turpis. Ut felis turpis, aliquet a euismod id, interdum eget est. Praesent id elementum libero, in sagittis libero.</p>
                </div>

            </div>	
        </div>

        <!-- Pictures -->
        <div class="col-md-6 masonry">
            <div class="block">          
                <h2><a href="#">Pictures</a></h2>
                <div class="config">                        
                    <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                        <i class="icon-wrench"></i>
                    </a>
                </div>           

                <div class="box-view">
                    <a href="<?= GD_IMG ?>gallery/preview.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis">
                        <i class="icon-expand"></i>
                        <img src="<?= GD_IMG ?>gallery/thumbs/30.jpg" alt="" />
                    </a>
                    <a href="<?= GD_IMG ?>gallery/preview.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis">
                        <i class="icon-expand"></i>
                        <img src="img/gallery/thumbs/1.jpg" alt="" />
                    </a>
                    <a href="<?= GD_IMG ?>gallery/preview.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis">
                        <i class="icon-expand"></i>
                        <img src="<?= GD_IMG ?>gallery/thumbs/3.jpg" alt="" />
                    </a>
                    <a href="<?= GD_IMG ?>gallery/preview.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis">
                        <i class="icon-expand"></i>
                        <img src="<?= GD_IMG ?>gallery/thumbs/4.jpg" alt="" />
                    </a>
                    <a href="<?= GD_IMG ?>gallery/preview.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis">
                        <i class="icon-expand"></i>
                        <img src="<?= GD_IMG ?>gallery/thumbs/5.jpg" alt="" />
                    </a>
                    <a href="<?= GD_IMG ?>gallery/preview.jpg" data-rel="shadowbox[sample]" class="img-popup box-item col-xs-4" title="Fusce sagittis porta porttitor aliquam tincidunt auctor nibh non convallis">
                        <i class="icon-expand"></i>
                        <img src="<?= GD_IMG ?>gallery/thumbs/2.jpg" alt="" />
                    </a>
                </div>

            </div>	
        </div>

        <!-- Friends -->
        <div class="col-md-6 masonry">
            <div class="block">          
                <h2><a href="#">Friends</a></h2>
                <div class="config">                        
                    <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                        <i class="icon-wrench"></i>
                    </a>
                </div>           

                <div class="box-view">
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/1.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/3.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/5.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/2.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/4.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/1.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/5.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/2.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/3.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/4.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/2.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/5.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/1.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/3.jpg" alt="" />
                    </a>
                    <a href="#" class="box-item">
                        <img src="<?= GD_IMG ?>profile-pics/2.jpg" alt="" />
                    </a>
                </div>

            </div>	
        </div>

        <!-- Projects -->
        <div class="col-md-6 masonry">
            <div class="block">
                <h2><a href="#">My Projects</a></h2>
                <div class="config">                        
                    <a href="#" data-toggle="tooltip" data-original-title="Settings" class="ttips">
                        <i class="icon-wrench"></i>
                    </a>
                </div>

                <div class="listview">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="<?= GD_IMG ?>profile-pics/1.jpg" alt="">
                        </a>
                        <div class="media-body">
                            Lotem Ipsum kandy mnsoo wen deiasel boomerag <br/>
                            <div class="block attrs">
                                Status: Completed
                            </div>
                            <div class="block attrs">
                                Published: No
                            </div>
                        </div>
                        <div class="list-options">
                            <button class="btn btn-gr-gray btn-sm">View</button>
                        </div>
                    </div>

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="<?= GD_IMG ?>profile-pics/2.jpg" alt="">
                        </a>
                        <div class="media-body">
                            Curabitur tincidunt facilisis tincidunt. Suspendisse pulvinar semper elit in <br/>
                            <div class="block attrs">
                                Status: Completed
                            </div>
                            <div class="block attrs">
                                Published: Yes
                            </div>
                        </div>
                        <div class="list-options">
                            <button class="btn btn-gr-gray btn-sm">View</button>
                        </div>
                    </div>

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="<?= GD_IMG ?>profile-pics/3.jpg" alt="">
                        </a>
                        <div class="media-body">
                            Fusce sit amet fringilla turpis. Ut felis turpis, aliquet a euismod <br/>
                            <div class="block attrs">
                                Status: Ongoing
                            </div>
                            <div class="block attrs">
                                Published: No
                            </div>
                        </div>
                        <div class="list-options">
                            <button class="btn btn-gr-gray btn-sm">View</button>
                        </div>
                    </div>

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="<?= GD_IMG ?>profile-pics/4.jpg" alt="">
                        </a>
                        <div class="media-body">
                            Suspendisse pulvinar semper elit in pharetra <br/>
                            <div class="block attrs">
                                Status: Pending
                            </div>
                            <div class="block attrs">
                                Published: No
                            </div>
                        </div>
                        <div class="list-options">
                            <button class="btn btn-gr-gray btn-sm">View</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</section>

<div class="modal fade" id="modalNarrower" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-narrow">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm">Save changes</button>
               <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/layout/footer');
