<!-- Edit Modal -->
<div class="modal fade" id="edit_<?php echo $rows->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Edit Blog</h4>
                </center>
            </div>

            <div class="modal-body">
                <div class="container-fluid">

                    <form method="POST" action="edit_blog.php" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">ID:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="blog_id" readonly value="<?php echo $rows->id; ?>" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Title:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="blog_title" value="<?php echo $rows->title; ?>" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Location:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="blog_author" value="<?php echo $rows->author; ?>" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Date Published:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required readonly name="blog_date" value="<?php echo $rows->date; ?>" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Content:</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" required name="blog_content" rows="10"><?php echo $rows->content; ?></textarea>
                            </div>
                        </div>

                        <!-- New Input Fields for Restaurants, Events, and Activities -->
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Restaurants:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="blog_restaurants" value="<?php echo $rows->restaurants; ?>" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Events:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="blog_events" value="<?php echo $rows->events; ?>" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Activities:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="blog_activities" value="<?php echo $rows->activities; ?>" />
                            </div>
                        </div>

                        <!-- Image Display -->
                        <?php if (isset($rows->image)) { ?>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="control-label" style="position:relative; top:7px;">Image:</label>
                                </div>
                                <div class="col-sm-10">
                                    <img src="<?php echo $rows->image; ?>" alt="Blog Image" style="max-width: 200px;" />
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Image Delete Option -->
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Delete Image:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="checkbox" name="delete_image" value="1" /> Delete image
                            </div>
                        </div>

                        <!-- Image Upload Option -->
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Update Image:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" name="blog_image" />
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit_blog" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $rows->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Are you sure you want to delete blog:</h4></center>
            </div>
            <div class="modal-body">    
                <p class="text-center text-danger"> This action is irreversable! </p>
                <h3 class="text-center"><?php echo $rows->title; ?></h3>
                <p class="text-center"><?php echo $rows->content; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                <a href="delete_blog.php?id=<?php echo $rows->id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
