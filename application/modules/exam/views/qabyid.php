<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo Exam; ?>
                <div class="clearfix search_row col-md-4 pull-right">
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right"> 
                            <button class="btn-xs green">
                                <i class="fa fa-plus-circle"></i>  <?php echo "Add New Question"; ?>
                            </button>
                        </div>
                    </a>  
                </div>
            </header>
            <style>

                .editable-table .search_form{
                    border: 0px solid #ccc !important;
                    padding: 0px !important;
                    background: none !important;
                    float: right;
                    margin-right: 14px !important;
                }


                .editable-table .search_form input{
                    padding: 6px !important;
                    width: 250px !important;
                    background: #fff !important;
                    border-radius: none !important;
                }

                .editable-table .search_row{
                    margin-bottom: 20px !important;
                }

                .panel-body {
                    padding: 15px 0px 15px 0px;
                    background: transparent;
                }

            </style>
            <div class="panel-body">
                <div class="adv-table editable-table ">


                    <table class="table table-striped table-hover table-bordered" id="editable-sample1">
                        <thead>
                            <tr>
                                <th> <?php echo 'ID'; ?></th>
                                <th> <?php echo 'Exam ID'; ?></th>
                                <th> <?php echo 'Question'; ?></th>
                                <th> <?php echo 'Option 1'; ?></th>
                                <th> <?php echo 'Option 2'; ?></th>
                                <th> <?php echo 'Option 3'; ?></th>
                                <th> <?php echo 'Option 4'; ?></th>
                                <th> <?php echo 'Answer'; ?></th>
                                <th> <?php echo 'Action'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }

                        </style>
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->



<!-- Add Exam Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">   <?php echo 'Add New Question'; ?></h4>
            </div>
            <div class="modal-body clearfix">
                <form role="form" action="exam/addNew" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo 'Exam ID'; ?></label>
                        <input type="text" class="form-control" name="exam_id" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo 'Question'; ?></label>
                        <input type="text" class="form-control" name="question" id="exampleInputEmail1" placeholder="">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo 'Option 1'; ?></label>
                        <input type="text" class="form-control" name="option1" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo 'Option 2'; ?></label>
                        <input type="text" class="form-control" name="option2" id="exampleInputEmail1" value='' placeholder="">
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo 'Option 3'; ?></label>
                        <input type="text" class="form-control" name="option3" id="exampleInputEmail1" value='' placeholder="">
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo 'Option 4'; ?></label>
                        <input type="text" class="form-control" name="option4" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo 'Correct Answer'; ?></label>
                        <input type="text" class="form-control" name="answer" id="exampleInputEmail1" value='' placeholder="">
                    </div>




                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info row pull-right"> <?php echo lang('submit'); ?></button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Exam Modal-->

<script>
    

    $(document).ready(function () {
        var table = $('#editable-sample1').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "exam/getQuestionById",
                type: 'GET',
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    exportOptions: {
                       columns: [1, 2,3,4],
                    }
                },
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            },
        });
        table.buttons().container()
                .appendTo('.custom_buttons');
    });
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
