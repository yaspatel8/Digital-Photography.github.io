<?php
include("hhh.php");
?>
<!--End Page header-->

<!-- Row -->
<div class="row">
    <div class="col-sm-2">
        <!--div-->
        <div class="card" id="modal">
            <button class="btn btn-primary" data-bs-target="#modaldemo1" data-bs-toggle="modal">View Live Demo
        </div>
    </div>
    <!--/div-->
    <!--div-->
    <!-- small Modal -->

</div>
<!-- BASIC MODAL -->
<div class="modal fade" id="modaldemo1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Add New Terms & Conditions</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <label>Enter Topic</label>
                    <input type="text" class="form-control" name="topic" id="topic"><br>
                    <label>Enter Descripition</label>
                    <textarea name="detail" id="detail" class="form-control">HIII</textarea>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Insert" name="btnsub">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- End Page -->

</div>
</div>

</div>

<!--Footer-->
<?php
include("fff.php");
?>