<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="col-md-6 row">
            <header class="panel-heading">
                <?php
                if (!empty($student->id))
                    echo lang('edit_student');
                else
                    echo lang('add_student');
                ?>
            </header>
            <div class="">
                <div class="adv-table editable-table ">
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="col-lg-3"></div>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('feedback'); ?>                              
                            <div class="col-lg-3"></div>
                        </div>
                        <form role="form" action="student/addNew" method="post" enctype="multipart/form-data">
                            <div class="form-group">


                                <label for="exampleInputEmail1"> <?php echo lang('name'); ?></label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                if (!empty($student->name)) {
                                    echo $student->name;
                                } if (!empty($setval)) {
                                    echo set_value('name');
                                }
                                ?>' placeholder="">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('email'); ?></label>
                                <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                if (!empty($student->email)) {
                                    echo $student->email;
                                }
                                if (!empty($setval)) {
                                    echo set_value('email');
                                }
                                ?>' placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('password'); ?></label>
                                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('address'); ?></label>
                                <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                if (!empty($student->address)) {
                                    echo $student->address;
                                }
                                if (!empty($setval)) {
                                    echo set_value('address');
                                }
                                ?>' placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                if (!empty($student->phone)) {
                                    echo $student->phone;
                                }
                                if (!empty($setval)) {
                                    echo set_value('phone');
                                }
                                ?>' placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('image'); ?></label>
                                <input type="file" name="img_url">
                            </div>

                            <input type="hidden" name="id" value='<?php
                            if (!empty($student->id)) {
                                echo $student->id;
                            }
                            ?>'>

                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-info row pull-right"> <?php echo lang('submit'); ?></button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
