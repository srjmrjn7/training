<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="col-md-6 row">
            <header class="panel-heading">
                <?php
                if (!empty($course->id))
                    echo lang('edit_course');
                else
                    echo lang('add_course');
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
                        <form role="form" action="course/addNew" class="clearfix" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo "Subject"; ?> <?php echo lang('id'); ?></label>
                                <input type="text" class="form-control" name="subject_id" id="exampleInputEmail1" value='<?php
                                if (!empty($course->subject_id)) {
                                    echo $course->subject_id;
                                }
                                ?>' placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo "Subject"; ?>  <?php echo lang('name'); ?></label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                if (!empty($course->name)) {
                                    echo $course->name;
                                }
                                ?>' placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo "Chapter"; ?></label>
                                <input type="text" class="form-control" name="topic" id="exampleInputEmail1" value='<?php
                                if (!empty($course->topic)) {
                                    echo $course->topic;
                                }
                                ?>' placeholder="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo "Instructor"; ?></label>
                                <select class="form-control" id='selUser2' name="instructor" style="width: 100% !important;">
                                    <!--   <option value='0'><?php //echo lang('select_course');         ?></option>-->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('course_fee'); ?></label>
                                <input type="text" class="form-control" name="subject_fee" value='<?php
                                if (!empty($course->subject_fee)) {
                                    echo $course->subject_fee;
                                }
                                ?>' id="exampleInputEmail1" placeholder="">
                            </div>


                            <input type="hidden" name="id" value='<?php
                            if (!empty($course->id)) {
                                echo $course->id;
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

<script>
    $(document).ready(function () {
        $("#selUser1").select2({
            placeholder: '<?php echo lang('select_course'); ?>',
            allowClear: true,
            ajax: {
                url: 'batch/getCourseList',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#selUser3").select2({
            placeholder: '<?php echo lang('select_course'); ?>',
            allowClear: true,
            ajax: {
                url: 'batch/getCourseList',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#selUser2").select2({
            placeholder: '<?php echo lang('select_instructor'); ?>',
            allowClear: true,
            ajax: {
                url: 'batch/getInstructorinfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#selUser4").select2({
            placeholder: '<?php echo lang('select_instructor'); ?>',
            allowClear: true,
            ajax: {
                url: 'batch/getInstructorinfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });
</script>