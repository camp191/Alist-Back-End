<?php
    mysqli_close($con);

    // check package conditon for show project function
    

    echo "</div>
    <!-- /#wrapper -->

    <!-- Add list Modal -->
    <div class='modal fade' id='addListModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
        <div class='modal-dialog' role='document'>
            <form action='./server/lists/addList.php' method='post'>
            <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>Add List</h4>
            </div>
            <div class='modal-body'>

            <div class='row'>
                <div class='col-md-10 col-md-push-1'>
                    
                        <div class='form-group'>
                            <label>List Topic:</label>
                            <input class='form-control' name='listTopic' value=''>
                        </div>

                        <div class='form-group'>
                            <label>List Description:</label>
                            <textarea rows='4' class='form-control' name='listDescription' value=''></textarea>
                        </div>

                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label>End Date:</label>
                                    <input class='form-control' id='date' name='date' value='$dateNow'>
                                </div>
                            </div>
                            <div class='col-md-6 important-group'>
                                <div class='form-group'>
                                    <label>Important:</label>
                                    <div class='btn-group' data-toggle='buttons'>
                                        <label class='btn btn-danger'>
                                            <input type='radio' name='listImportant' id='listImportant' value='Yes'> Yes
                                        </label>
                                        <label class='btn btn-danger'>
                                            <input type='radio' name='listImportant' id='listImportant' value='No'> No
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label>Project Name:</label>
                            <select class='form-control' name='listProjectName'>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    
                </div>
            </div>


                

            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                <button class='btn btn-primary'>Add List</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Function Package Modal -->
    <div class='modal fade' id='packageModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>Wrong Package</h4>
            </div>
            <div class='modal-body'>
                Can't use this feature. Please subscribe right package before use this feature. :)
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                <a type='button' href='./package.php' class='btn btn-primary'>Subscribe Package</a>
            </div>
            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script src='js/jquery.js'></script>

    <!-- Date and Time Plugin Javascript -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js'></script>
    <script>
    $(document).ready(function(){
      var date_input=$('input[name=\"date\"]');
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : 'body';
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
    </script>

    <script src='js/custom/custom.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='js/bootstrap.min.js'></script>

    <!-- Morris Charts JavaScript -->
    <script src='js/plugins/morris/raphael.min.js'></script>
    <script src='js/plugins/morris/morris.min.js'></script>
    <script src='js/plugins/morris/morris-data.js'></script>


</body>

</html>";



?>