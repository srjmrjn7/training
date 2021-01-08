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
                                <i class="fa fa-plus-circle"></i> <?php echo "Exam"; ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <style>

                .editable-table .search_form {
                    border: 0px solid #ccc !important;
                    padding: 0px !important;
                    background: none !important;
                    float: right;
                    margin-right: 14px !important;
                }


                .editable-table .search_form input {
                    padding: 6px !important;
                    width: 250px !important;
                    background: #fff !important;
                    border-radius: none !important;
                }

                .editable-table .search_row {
                    margin-bottom: 20px !important;
                }

                .panel-body {
                    padding: 15px 0px 15px 0px;
                    background: transparent;
                }

            </style>
            <div class="panel-body">
                <div class="adv-table editable-table ">

                    <!--start editing-->
                    <?php $score=0;?>


                    <!--end editing-->
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script>


</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
